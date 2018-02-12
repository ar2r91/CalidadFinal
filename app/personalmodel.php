<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;
use App\Http\Controllers\util;

class personalmodel
{
    private $dni;
    private $nombres;
    private $apellidos;
    private $correo;
    private $codigoPersonal;
    private $cuenta;
    private $password;
    private $tipoCuenta;

    function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     * @return personalmodel
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     * @return personalmodel
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     * @return personalmodel
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     * @return personalmodel
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoPersonal()
    {
        return $this->codigoPersonal;
    }

    /**
     * @param mixed $codigoPersonal
     * @return personalmodel
     */
    public function setCodigoPersonal($codigoPersonal)
    {
        $this->codigoPersonal = $codigoPersonal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param mixed $cuenta
     * @return personalmodel
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return personalmodel
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoCuenta()
    {
        return $this->tipoCuenta;
    }

    /**
     * @param mixed $tipoCuenta
     * @return personalmodel
     */
    public function setTipoCuenta($tipoCuenta)
    {
        $this->tipoCuenta = $tipoCuenta;
        return $this;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function logear()
    {
        try {
            $personal = DB::table('personal')->where(['cuenta' => $this->cuenta, 'password' => $this->password, 'estado' => 1])->get();
        } catch
        (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'logear/personalmodel');
            return false;
        }
        return $personal;
    }

    public function savepersonal()
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('registrarPersonal');
        try {
            DB::transaction(function () use ($log, $codPers) {
                DB::table('personal')->insert(['dni' => $this->dni, 'nombres' => $this->nombres, 'apellidos' => $this->apellidos, 'codigoPersonal' => $this->codigoPersonal, 'cuenta' => $this->cuenta, 'password' => $this->password, 'tipoCuenta' => $this->tipoCuenta, 'email'=>$this->correo]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'savepersonal/personalmodel');
            return false;
        }
        return true;
    }

    public function editarPersonal($codPersonal)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('editarPersonal');
        try {
            DB::transaction(function () use ($codPersonal, $log, $codPers) {
                DB::table('personal')->where('codPersonal', $codPersonal)->update(['dni' => $this->dni, 'nombres' => $this->nombres, 'apellidos' => $this->apellidos, 'codigoPersonal' => $this->codigoPersonal, 'cuenta' => $this->cuenta, 'password' => $this->password, 'tipoCuenta' => $this->tipoCuenta]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'editarpersonal/personalmodel');
            return false;
        }
        return true;
    }

    public function eliminarPersonal($codPersonal)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('eliminarPersonal');
        try {
            DB::transaction(function () use ($codPersonal, $log, $codPers) {
                DB::table('personal')->where('codPersonal', $codPersonal)->update(['estado' => 0]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'eliminarPersonal/personalmodel');

            return false;
        }
        return true;
    }

    public function consultarPersonalid($codPersonal)
    {
        try {
            $personalbd = DB::select('select * from personal where codPersonal=:codPersonal and estado=1', ['codPersonal' => $codPersonal]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarPersonalid/personalmodel');
            return false;
        }
        return $personalbd;
    }

    public function consultarPersonalDNI($dni)
    {
        try {
            $personalbd = DB::table('personal')->where('dni', 'like', '%' . $dni . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarPersonalDNI/personalmodel');
            return false;
        }
        return $personalbd;
    }

    public function consultarPersonalApellidos($apellidos)
    {
        try {
            $personalbd = DB::table('personal')->where('apellidos', 'like', '%' . $apellidos . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarPersonalApellidos/personalmodel');
            return false;
        }
        return $personalbd;
    }

    public function consultarPersonalCodigo($codigoPersonal)
    {
        try {
            $personalbd = DB::table('personal')->where('codigoPersonal', 'like', '%' . $codigoPersonal . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarPersonalCodigo/personalmodel');
            return false;
        }
        return $personalbd;
    }

    public function consultarPersonalCuenta($cuenta)
    {
        try {
            $personalbd = DB::table('personal')->where('cuenta', 'like', '%' . $cuenta . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarPersonalCuenta/personalmodel');
            return false;
        }
        return $personalbd;
    }

    public function consultaPersonalTipoCuenta($tipoCuenta)
    {
        try {
            $personalbd = DB::table('personal')->where('tipoCuenta', 'like', '%' . $tipoCuenta . '%')->where('estado', '=', 1)->get();
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultaPersonalTipoCuenta/personalmodel');
            return false;
        }
        return $personalbd;
    }
}
