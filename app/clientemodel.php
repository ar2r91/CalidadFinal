<?php

namespace App;

use App\Http\Controllers\util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class clientemodel
{
    private $razonSocial;
    private $ruc;
    private $telefono;
    private $email;
    private $direccion;
    private $detalle;

    function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param mixed $razonSocial
     * @return clientemodel
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     * @return clientemodel
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     * @return clientemodel
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return clientemodel
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     * @return clientemodel
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     * @return clientemodel
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function savecliente()
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
                DB::table('cliente')->insert(['razonSocial' => $this->razonSocial, 'ruc' => $this->ruc, 'telefono' => $this->telefono, 'email' => $this->email, 'direccion' => $this->direccion, 'detalle' => $this->detalle]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'savecliente/clientemodel');
            return false;
        }
        return true;
    }

    public function editarCliente($codCliente)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('editarCliente');
        try {
            DB::transaction(function () use ($codCliente, $log, $codPers) {
                DB::table('cliente')->where('codCliente', $codCliente)->update(['razonSocial' => $this->razonSocial, 'ruc' => $this->ruc, 'telefono' => $this->telefono, 'email' => $this->email, 'direccion' => $this->direccion, 'detalle' => $this->detalle]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'editarCliente/clientemodel');
            return false;
        }
        return true;
    }

    public function eliminarCliente($codCliente)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('EliminarCliente');
        try {
            DB::transaction(function () use ($codCliente, $log, $codPers) {
                DB::table('cliente')->where('codCliente', $codCliente)->update(['estado' => 0]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'eliminarCliente/clientemodel');
            return false;
        }
        return true;
    }

    public function consultarClienteId($codCliente)
    {
        try {
            $clientebd = DB::table('cliente')->where('codCliente', $codCliente)->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClienteid/clientemodel');
            return null;
        }
        return $clientebd;
    }

    public function consultarClientesRuc($ruc)
    {
        try {
            $clientebd = DB::table('cliente')->where('ruc', 'like', '%' . $ruc . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClientesRUC/clientemodel');
            return false;
        }
        return $clientebd;
    }

    public function consultarClientesCodigo($codigo)
    {
        try {
            $clientebd = DB::table('cliente')->where('codCliente', 'like', '%' . $codigo . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClientesRUC/clientemodel');
            return false;
        }
        return $clientebd;
    }

    public function consultarClienteRuc($ruc)
    {
        try {
            $clientebd = DB::table('cliente')->where('ruc', '=', $ruc)->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClientesRUC/clientemodel');
            return false;
        }
        return $clientebd;
    }

    public function consultarClienteRazonSocial($razonSocial)
    {
        try {
            $clientebd = DB::table('cliente')->where('razonSocial', '=', $razonSocial)->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClientesRUC/clientemodel');
            return false;
        }
        return $clientebd;
    }

    public function consultarClientesRazonSocial($razonSocial)
    {
        try {
            $clientebd = DB::table('cliente')->where('razonSocial', 'like', '%' . $razonSocial . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarClienteSocial/clientemodel');
            return false;
        }
        return $clientebd;
    }
}
