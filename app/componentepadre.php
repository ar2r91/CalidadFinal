<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 17/10/2017
 * Time: 1:09 AM
 */

namespace App;


class componentepadre
{
    private $marca;
    private $modelo;
    private $serie;
    private $tensionmax;
    private $cargamax;
    private $fabricacion;
    private $instalacion;

    /**
     * componentepadre constructor.
     */
    public function __construct()
    {
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
     * @return componentepadre
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
     * @return componentepadre
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
     * @return componentepadre
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTensionmax()
    {
        return $this->tensionmax;
    }

    /**
     * @param mixed $tensionmax
     * @return componentepadre
     */
    public function setTensionmax($tensionmax)
    {
        $this->tensionmax = $tensionmax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCargamax()
    {
        return $this->cargamax;
    }

    /**
     * @param mixed $cargamax
     * @return componentepadre
     */
    public function setCargamax($cargamax)
    {
        $this->cargamax = $cargamax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFabricacion()
    {
        return $this->fabricacion;
    }

    /**
     * @param mixed $fabricacion
     * @return componentepadre
     */
    public function setFabricacion($fabricacion)
    {
        $this->fabricacion = $fabricacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstalacion()
    {
        return $this->instalacion;
    }

    /**
     * @param mixed $instalacion
     * @return componentepadre
     */
    public function setInstalacion($instalacion)
    {
        $this->instalacion = $instalacion;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}