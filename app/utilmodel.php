<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class utilmodel
{
    private $mensaje;
    private $funcion;
    private $codPersonal;


    /**
     * utilmodel constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param array $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getCodPersonal()
    {
        return $this->codPersonal;
    }

    /**
     * @param mixed $codPersonal
     * @return utilmodel
     */
    public function setCodPersonal($codPersonal)
    {
        $this->codPersonal = $codPersonal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFuncion()
    {
        return $this->funcion;
    }

    /**
     * @param mixed $funcion
     */
    public function setFuncion($funcion)
    {
        $this->funcion = $funcion;
    }

    public function insertarError()
    {
        $value = Session::get('personalC');
        $log = new logmodel();
        $this->setCodPersonal($log->obtenerCodigoPersonal($value));
        try {
            DB::table('log_errores')->insert(['mensaje' => $this->mensaje, 'funcion' => $this->funcion, 'idPersonal' => $this->codPersonal]);
        } catch (Exception $e) {
            $this->setFuncion('insertar error');
            $this->setMensaje($e->getMessage());
            $this->insertarError();
        }
    }

}
