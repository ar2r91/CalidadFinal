<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 17/10/2017
 * Time: 1:38 PM
 */

namespace App;

use App\Http\Controllers\util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class componenteb extends componentepadre
{
    private $tipo4;

    /**
     * componenteb constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getTipo4()
    {
        return $this->tipo4;
    }

    /**
     * @param mixed $tipo4
     * @return componenteb
     */
    public function setTipo4($tipo4)
    {
        $this->tipo4 = $tipo4;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function guardarArreglo()
    {
        $componentea = array('tipo' => $this->tipo4, 'marca' => $this->getMarca(), 'modelo' => $this->getModelo(), 'serie' => $this->getSerie(),
            'tensionmax' => $this->getTensionmax(), 'cargamax' => $this->getCargamax(), 'fabricacion' => $this->getFabricacion(), 'instalacion' => $this->getInstalacion());

        return $componentea;
    }
}