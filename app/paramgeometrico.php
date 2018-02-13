<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 24/10/2017
 * Time: 2:45 PM
 */

namespace App;

use App\Http\Controllers\util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class paramgeometrico
{
    private $tamanio;
    private $valoraceptablet;
    private $distancia;
    private $valoraceptabled;
    private $alineamiento;

    /**
     * paramgeometrico constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getTamanio()
    {
        return $this->tamanio;
    }

    /**
     * @param mixed $tamanio
     * @return paramgeometrico
     */
    public function setTamanio($tamanio)
    {
        $this->tamanio = $tamanio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptablet()
    {
        return $this->valoraceptablet;
    }

    /**
     * @param mixed $valoraceptablet
     * @return paramgeometrico
     */
    public function setValoraceptablet($valoraceptablet)
    {
        $this->valoraceptablet = $valoraceptablet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * @param mixed $distancia
     * @return paramgeometrico
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptabled()
    {
        return $this->valoraceptabled;
    }

    /**
     * @param mixed $valoraceptabled
     * @return paramgeometrico
     */
    public function setValoraceptabled($valoraceptabled)
    {
        $this->valoraceptabled = $valoraceptabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAlineamiento()
    {
        return $this->alineamiento;
    }

    /**
     * @param mixed $alineamiento
     * @return paramgeometrico
     */
    public function setAlineamiento($alineamiento)
    {
        $this->alineamiento = $alineamiento;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $paramgeometrico = array('tamanio' => $this->tamanio, 'valoraceptablet' => $this->valoraceptablet, 'distancia' => $this->distancia, 'valoraceptabled' => $this->valoraceptabled,
            'alineamiento'=>$this->alineamiento);

        return $paramgeometrico;
    }
}