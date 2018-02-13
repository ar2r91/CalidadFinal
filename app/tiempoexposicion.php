<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 24/10/2017
 * Time: 2:51 PM
 */

namespace App;


class tiempoexposicion
{
    private $tiemponominal;
    private $tiempomedio;
    private $resultadoti;
    private $valoraceptableti;
    private $tiempo1;
    private $tiempo2;
    private $tiempo3;
    private $resultadotie;
    private $valoraceptabletie;

    /**
     * tiempoexposicion constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getTiemponominal()
    {
        return $this->tiemponominal;
    }

    /**
     * @param mixed $tiemponominal
     * @return tiempoexposicion
     */
    public function setTiemponominal($tiemponominal)
    {
        $this->tiemponominal = $tiemponominal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTiempomedio()
    {
        return $this->tiempomedio;
    }

    /**
     * @param mixed $tiempomedio
     * @return tiempoexposicion
     */
    public function setTiempomedio($tiempomedio)
    {
        $this->tiempomedio = $tiempomedio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadoti()
    {
        return $this->resultadoti;
    }

    /**
     * @param mixed $resultadoti
     * @return tiempoexposicion
     */
    public function setResultadoti($resultadoti)
    {
        $this->resultadoti = $resultadoti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptableti()
    {
        return $this->valoraceptableti;
    }

    /**
     * @param mixed $valoraceptableti
     * @return tiempoexposicion
     */
    public function setValoraceptableti($valoraceptableti)
    {
        $this->valoraceptableti = $valoraceptableti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTiempo1()
    {
        return $this->tiempo1;
    }

    /**
     * @param mixed $tiempo1
     * @return tiempoexposicion
     */
    public function setTiempo1($tiempo1)
    {
        $this->tiempo1 = $tiempo1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTiempo2()
    {
        return $this->tiempo2;
    }

    /**
     * @param mixed $tiempo2
     * @return tiempoexposicion
     */
    public function setTiempo2($tiempo2)
    {
        $this->tiempo2 = $tiempo2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTiempo3()
    {
        return $this->tiempo3;
    }

    /**
     * @param mixed $tiempo3
     * @return tiempoexposicion
     */
    public function setTiempo3($tiempo3)
    {
        $this->tiempo3 = $tiempo3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadotie()
    {
        return $this->resultadotie;
    }

    /**
     * @param mixed $resultadotie
     * @return tiempoexposicion
     */
    public function setResultadotie($resultadotie)
    {
        $this->resultadotie = $resultadotie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptabletie()
    {
        return $this->valoraceptabletie;
    }

    /**
     * @param mixed $valoraceptabletie
     * @return tiempoexposicion
     */
    public function setValoraceptabletie($valoraceptabletie)
    {
        $this->valoraceptabletie = $valoraceptabletie;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $tiempo = array('tiemponominal' => $this->tiemponominal, 'tiempomedio' => $this->tiempomedio, 'resultadoti' => $this->resultadoti, 'valoraceptableti' => $this->valoraceptableti,
            'tiempo1' => $this->tiempo1, 'tiempo2' => $this->tiempo2, 'tiempo3' => $this->tiempo3, 'resultadotie' => $this->resultadotie, 'valoraceptabletie' => $this->valoraceptabletie);

        return $tiempo;
    }
}