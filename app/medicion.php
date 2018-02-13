<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 19/10/2017
 * Time: 9:56 PM
 */

namespace App;

use App\Http\Controllers\util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class medicion
{
    private $tipo;
    private $marca;
    private $modelo;
    private $serie;
    private $fecha;

    /**
     * medicion constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return medicion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     * @return medicion
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     * @return medicion
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     * @return medicion
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     * @return medicion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function savemedicion()
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('registrarCliente');
        try {
            DB::transaction(function () use ($log, $codPers) {
                DB::table('equipomedicion')->insert(['serie' => $this->serie, 'tipo' => $this->tipo, 'marca' => $this->marca, 'modelo' => $this->modelo, 'fecha' => $this->fecha]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'savemedicion/medicion');
            return false;
        }
        return true;
    }

    public function editarmedicion($codEquipoMedicion)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('editarCliente');
        try {
            DB::transaction(function () use ($codEquipoMedicion, $log, $codPers) {
                DB::table('equipomedicion')->where('codEquipoMedicion', $codEquipoMedicion)->update(['serie' => $this->serie, 'tipo' => $this->tipo, 'marca' => $this->marca, 'modelo' => $this->modelo, 'fecha' => $this->fecha]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'editarmedicion/medicion');
            return false;
        }
        return true;
    }

    public function eliminarmedicion($codEquipoMedicion)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('EliminarCliente');
        try {
            DB::transaction(function () use ($codEquipoMedicion, $log, $codPers) {
                DB::table('equipomedicion')->where('codEquipoMedicion', $codEquipoMedicion)->update(['estado' => 0]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'eliminarmedicion/medicion');
            return false;
        }
        return true;
    }

    public function consultarMedicionId($codEquipoMedicion)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('codEquipoMedicion', $codEquipoMedicion)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionId/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarMedicionCodigo($codigo)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('codEquipoMedicion', 'like', '%' . $codigo . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionCodigo/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarMedicionTipo($tipo)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('tipo', 'like', '%' . $tipo . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionTipo/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarMedicionMarca($marca)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('marca', 'like', '%' . $marca . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionMarca/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarMedicionModelo($modelo)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('modelo', 'like', '%' . $modelo . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionModelo/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarMedicionSerie($serie)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('serie', 'like', '%' . $serie . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionModelo/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function consultarEquipoMedicion($serie)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('serie', '=', $serie)->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionModelo/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function buscarMedicion()
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'buscarMedicion/medicion');
            return false;
        }
        return $medicionbd;
    }

    public function buscarMedicionSerie($serie)
    {
        try {
            $medicionbd = DB::table('equipomedicion')->where('serie', '=', $serie)->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarMedicionModelo/medicion');
            return false;
        }
        return $medicionbd;
    }
}