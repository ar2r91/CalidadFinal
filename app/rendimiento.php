<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 26/10/2017
 * Time: 9:14 AM
 */

namespace App;


class rendimiento
{
    private $dosisr1;
    private $dosisr2;
    private $dosisr3;
    private $resultador;
    private $aceptabler;
    private $carga1;
    private $dosisc1;
    private $carga2;
    private $dosisc2;
    private $resultadoc;
    private $aceptablec;

    /**
     * rendimiento constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDosisr1()
    {
        return $this->dosisr1;
    }

    /**
     * @param mixed $dosisr1
     * @return rendimiento
     */
    public function setDosisr1($dosisr1)
    {
        $this->dosisr1 = $dosisr1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDosisr2()
    {
        return $this->dosisr2;
    }

    /**
     * @param mixed $dosisr2
     * @return rendimiento
     */
    public function setDosisr2($dosisr2)
    {
        $this->dosisr2 = $dosisr2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDosisr3()
    {
        return $this->dosisr3;
    }

    /**
     * @param mixed $dosisr3
     * @return rendimiento
     */
    public function setDosisr3($dosisr3)
    {
        $this->dosisr3 = $dosisr3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultador()
    {
        return $this->resultador;
    }

    /**
     * @param mixed $resultador
     * @return rendimiento
     */
    public function setResultador($resultador)
    {
        $this->resultador = $resultador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAceptabler()
    {
        return $this->aceptabler;
    }

    /**
     * @param mixed $aceptabler
     * @return rendimiento
     */
    public function setAceptabler($aceptabler)
    {
        $this->aceptabler = $aceptabler;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarga1()
    {
        return $this->carga1;
    }

    /**
     * @param mixed $carga1
     * @return rendimiento
     */
    public function setCarga1($carga1)
    {
        $this->carga1 = $carga1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDosisc1()
    {
        return $this->dosisc1;
    }

    /**
     * @param mixed $dosisc1
     * @return rendimiento
     */
    public function setDosisc1($dosisc1)
    {
        $this->dosisc1 = $dosisc1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarga2()
    {
        return $this->carga2;
    }

    /**
     * @param mixed $carga2
     * @return rendimiento
     */
    public function setCarga2($carga2)
    {
        $this->carga2 = $carga2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDosisc2()
    {
        return $this->dosisc2;
    }

    /**
     * @param mixed $dosisc2
     * @return rendimiento
     */
    public function setDosisc2($dosisc2)
    {
        $this->dosisc2 = $dosisc2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadoc()
    {
        return $this->resultadoc;
    }

    /**
     * @param mixed $resultadoc
     * @return rendimiento
     */
    public function setResultadoc($resultadoc)
    {
        $this->resultadoc = $resultadoc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAceptablec()
    {
        return $this->aceptablec;
    }

    /**
     * @param mixed $aceptablec
     * @return rendimiento
     */
    public function setAceptablec($aceptablec)
    {
        $this->aceptablec = $aceptablec;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $rendi = array('dosisr1' => $this->dosisr1, 'dosisr2' => $this->dosisr2, 'dosisr3' => $this->dosisr3, 'resultador' => $this->resultador,
            'aceptabler' => $this->aceptabler, 'carga1' => $this->carga1, 'dosisc1' => $this->dosisc1, 'carga2' => $this->carga2, 'dosisc2' => $this->dosisc2, 'resultadoc' => $this->resultadoc,
            'aceptablec' => $this->aceptablec);

        return $rendi;
    }
}