<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 24/10/2017
 * Time: 2:47 PM
 */

namespace App;


class calidadhaz
{
    private $tensionnominal;
    private $tensionmedia;
    private $resultadotn;
    private $valoraceptabletn;
    private $tension1;
    private $tension2;
    private $tension3;
    private $resultadot;
    private $valoraceptablet;
    private $filtracion;
    private $tensionf;
    private $valoraceptablef;

    /**
     * calidadhaz constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getTensionnominal()
    {
        return $this->tensionnominal;
    }

    /**
     * @param mixed $tensionnominal
     * @return calidadhaz
     */
    public function setTensionnominal($tensionnominal)
    {
        $this->tensionnominal = $tensionnominal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTensionmedia()
    {
        return $this->tensionmedia;
    }

    /**
     * @param mixed $tensionmedia
     * @return calidadhaz
     */
    public function setTensionmedia($tensionmedia)
    {
        $this->tensionmedia = $tensionmedia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadotn()
    {
        return $this->resultadotn;
    }

    /**
     * @param mixed $resultadotn
     * @return calidadhaz
     */
    public function setResultadotn($resultadotn)
    {
        $this->resultadotn = $resultadotn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptabletn()
    {
        return $this->valoraceptabletn;
    }

    /**
     * @param mixed $valoraceptabletn
     * @return calidadhaz
     */
    public function setValoraceptabletn($valoraceptabletn)
    {
        $this->valoraceptabletn = $valoraceptabletn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTension1()
    {
        return $this->tension1;
    }

    /**
     * @param mixed $tension1
     * @return calidadhaz
     */
    public function setTension1($tension1)
    {
        $this->tension1 = $tension1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTension2()
    {
        return $this->tension2;
    }

    /**
     * @param mixed $tension2
     * @return calidadhaz
     */
    public function setTension2($tension2)
    {
        $this->tension2 = $tension2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTension3()
    {
        return $this->tension3;
    }

    /**
     * @param mixed $tension3
     * @return calidadhaz
     */
    public function setTension3($tension3)
    {
        $this->tension3 = $tension3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadot()
    {
        return $this->resultadot;
    }

    /**
     * @param mixed $resultadot
     * @return calidadhaz
     */
    public function setResultadot($resultadot)
    {
        $this->resultadot = $resultadot;
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
     * @return calidadhaz
     */
    public function setValoraceptablet($valoraceptablet)
    {
        $this->valoraceptablet = $valoraceptablet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiltracion()
    {
        return $this->filtracion;
    }

    /**
     * @param mixed $filtracion
     * @return calidadhaz
     */
    public function setFiltracion($filtracion)
    {
        $this->filtracion = $filtracion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTensionf()
    {
        return $this->tensionf;
    }

    /**
     * @param mixed $tensionf
     * @return calidadhaz
     */
    public function setTensionf($tensionf)
    {
        $this->tensionf = $tensionf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValoraceptablef()
    {
        return $this->valoraceptablef;
    }

    /**
     * @param mixed $valoraceptablef
     * @return calidadhaz
     */
    public function setValoraceptablef($valoraceptablef)
    {
        $this->valoraceptablef = $valoraceptablef;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $calidad = array('tensionnominal' => $this->tensionnominal, 'tensionmedia' => $this->tensionmedia, 'resultadotn' => $this->resultadotn, 'valoraceptabletn' => $this->valoraceptabletn,
            'tension1' => $this->tension1, 'tension2' => $this->tension2, 'tension3' => $this->tension3, 'resultadot' => $this->resultadot, 'valoraceptablet' => $this->valoraceptablet,
            'filtracion' => $this->filtracion, 'tensionf' => $this->tensionf, 'valoraceptablef' => $this->valoraceptablef);

        return $calidad;
    }
}