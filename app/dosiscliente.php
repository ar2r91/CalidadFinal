<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 24/10/2017
 * Time: 2:53 PM
 */

namespace App;


class dosiscliente
{
    private $exploracion;
    private $dosis;
    private $valoraceptable;
    private $distancia;
    private $tension;
    private $corriente;
    private $tiempoexposicion;

    /**
     * dosiscliente constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getExploracion()
    {
        return $this->exploracion;
    }

    /**
     * @param mixed $exploracion
     * @return dosiscliente
     */
    public function setExploracion($exploracion)
    {
        $this->exploracion = $exploracion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDosis()
    {
        return $this->dosis;
    }

    /**
     * @param mixed $dosis
     * @return dosiscliente
     */
    public function setDosis($dosis)
    {
        $this->dosis = $dosis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptable()
    {
        return $this->valoraceptable;
    }

    /**
     * @param mixed $valoraceptable
     * @return dosiscliente
     */
    public function setValoraceptable($valoraceptable)
    {
        $this->valoraceptable = $valoraceptable;
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
     * @return dosiscliente
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTension()
    {
        return $this->tension;
    }

    /**
     * @param mixed $tension
     * @return dosiscliente
     */
    public function setTension($tension)
    {
        $this->tension = $tension;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorriente()
    {
        return $this->corriente;
    }

    /**
     * @param mixed $corriente
     * @return dosiscliente
     */
    public function setCorriente($corriente)
    {
        $this->corriente = $corriente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTiempoexposicion()
    {
        return $this->tiempoexposicion;
    }

    /**
     * @param mixed $tiempoexposicion
     * @return dosiscliente
     */
    public function setTiempoexposicion($tiempoexposicion)
    {
        $this->tiempoexposicion = $tiempoexposicion;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $dosis = array('exploracion' => $this->exploracion, 'dosis' => $this->dosis, 'valoraceptable' => $this->valoraceptable, 'distancia' => $this->distancia,
            'tension' => $this->tension, 'corriente' => $this->corriente, 'tiempoexposicion' => $this->tiempoexposicion);

        return $dosis;
    }
}