<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 17/10/2017
 * Time: 1:37 PM
 */

namespace App;

class componentea extends componentepadre
{
    private $tipo3;

    /**
     * componentea constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getTipo3()
    {
        return $this->tipo3;
    }

    /**
     * @param mixed $tipo3
     * @return componentea
     */
    public function setTipo3($tipo3)
    {
        $this->tipo3 = $tipo3;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $componentea = array('tipo' => $this->tipo3, 'marca' => $this->getMarca(), 'modelo' => $this->getModelo(), 'serie' => $this->getSerie(),
            'tensionmax' => $this->getTensionmax(), 'cargamax' => $this->getCargamax(), 'fabricacion' => $this->getFabricacion(), 'instalacion' => $this->getInstalacion());

        return $componentea;
    }
}