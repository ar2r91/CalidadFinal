<?php

namespace App;


use Illuminate\Support\Facades\DB;
use PDOException;
use App\Http\Controllers\util;

class logmodel
{
    private $descripcion;
    private $fecha;

    /**
     * logmodel constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     * @return logmodel
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
     * @return logmodel
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function saveLog($codPerosnal)
    {
        try {
            DB::transaction(function () use ($codPerosnal) {
                DB::table('logactividad')->insert(['fecha' => $this->fecha, 'descripcion' => $this->descripcion, 'idPersonal' => $codPerosnal]);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'saveLog/logmodel');
            return false;
        }
        return true;
    }

    public function obtenerCodigoPersonal($cuenta)
    {
        $cp = null;
        try {
            $personalbd = DB::select('select codPersonal from personal where cuenta=:cuenta', ['cuenta' => $cuenta]);

            foreach ($personalbd as $pbd) {
                $cp = $pbd->codPersonal;
            }
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'obtenerCodigoPersonal/logmodel');
            return false;
        }
        return $cp;
    }
}
