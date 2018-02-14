<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 16/10/2017
 * Time: 10:51 PM
 */

namespace App;

use App\Http\Controllers\util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class rayosxmodel
{
    private $tipo1;
    private $tipo2;
    private $equipo;

    /**
     * rayosxmodel constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getTipo1()
    {
        return $this->tipo1;
    }

    /**
     * @param mixed $tipo1
     * @return rayosxmodel
     */
    public function setTipo1($tipo1)
    {
        $this->tipo1 = $tipo1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo2()
    {
        return $this->tipo2;
    }

    /**
     * @param mixed $tipo2
     * @return rayosxmodel
     */
    public function setTipo2($tipo2)
    {
        $this->tipo2 = $tipo2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * @param mixed $equipo
     * @return rayosxmodel
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function saveRayosX($componentea, $componenteb, $ruc)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('registrarRayosX');
        try {
            DB::transaction(function () use ($componentea, $componenteb, $ruc, $log, $codPers) {

                $idpa = DB::table('componentepadre')->insertGetId(['marca' => $componentea['marca'], 'modelo' => $componentea['modelo'], 'serie' => $componentea['serie'], 'tensionmax' => $componentea['tensionmax'], 'cargamax' => $componentea['cargamax'], 'fabricacion' => $componentea['fabricacion'], 'instalacion' => $componentea['instalacion']]);
                $c1Id = DB::table('componentea')->insertGetId(['tipo3' => $componentea['tipo'], 'idComponentePadre' => $idpa]);

                $idpb = DB::table('componentepadre')->insertGetId(['marca' => $componenteb['marca'], 'modelo' => $componenteb['modelo'], 'serie' => $componenteb['serie'], 'tensionmax' => $componenteb['tensionmax'], 'cargamax' => $componenteb['cargamax'], 'fabricacion' => $componenteb['fabricacion'], 'instalacion' => $componenteb['instalacion']]);
                $c2Id = DB::table('componenteb')->insertGetId(['tipo4' => $componenteb['tipo'], 'idComponentePadre' => $idpb]);

                $cCli = DB::table('cliente')->where('ruc', $ruc)->value('codCliente');

                DB::table('rayosx')->insert(['tipo1' => $this->tipo1, 'tipo2' => $this->tipo2, 'idComponentea' => $c1Id, 'idComponenteb' => $c2Id, 'idCliente' => $cCli, 'equipo' => $this->equipo]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'saveRayosX/rayosxmodel');
            return false;
        }
        return true;
    }

    public function editarRayosX($codRayosX, $componentea, $componenteb, $codCliente, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('editarRayosX');
        try {
            DB::transaction(function () use ($codRayosX, $log, $codPers, $componentea, $componenteb, $codCliente, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre) {
                //componentea
                DB::table('componentepadre')->where('codComponentePadre', $cp1codComponentePadre)->update(['marca' => $componentea['marca'], 'modelo' => $componentea['modelo'], 'serie' => $componentea['serie'], 'tensionmax' => $componentea['tensionmax'], 'cargamax' => $componentea['cargamax'], 'fabricacion' => $componentea['fabricacion'], 'instalacion' => $componentea['instalacion']]);
                DB::table('componentea')->where('codComponentea', $codComponentea)->update(['tipo3' => $componentea['tipo'], 'idComponentePadre' => $cp1codComponentePadre]);
                //Componenteb
                DB::table('componentepadre')->where('codComponentePadre', $cp2codComponentePadre)->update(['marca' => $componenteb['marca'], 'modelo' => $componenteb['modelo'], 'serie' => $componenteb['serie'], 'tensionmax' => $componenteb['tensionmax'], 'cargamax' => $componenteb['cargamax'], 'fabricacion' => $componenteb['fabricacion'], 'instalacion' => $componenteb['instalacion']]);
                DB::table('componenteb')->where('codComponenteb', $codComponenteb)->update(['tipo4' => $componenteb['tipo'], 'idComponentePadre' => $cp2codComponentePadre]);
                //rayosx
                DB::table('rayosx')->where('codRayosX', $codRayosX)->update(['tipo1' => $this->tipo1, 'tipo2' => $this->tipo2, 'idComponentea' => $codComponentea, 'idComponenteb' => $codComponenteb, 'idCliente' => $codCliente, 'equipo' => $this->equipo]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'editarRayosXId/rayosxmodel');
            return false;
        }
        return true;
    }

    public function eliminarRayosX($codRayosX, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('EliminarRayosX');
        try {
            DB::transaction(function () use ($codRayosX, $log, $codPers, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre) {
                DB::table('rayosx')->where('codRayosX', $codRayosX)->update(['estado' => 0]);
                DB::table('componentea')->where('codComponentea', $codComponentea)->update(['estado' => 0]);
                DB::table('componenteb')->where('codComponenteb', $codComponenteb)->update(['estado' => 0]);
                DB::table('componentepadre')->where('codComponentePadre', $cp1codComponentePadre)->update(['estado' => 0]);
                DB::table('componentepadre')->where('codComponentePadre', $cp2codComponentePadre)->update(['estado' => 0]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'eliminarRayosXId/rayosxmodel');
            return false;
        }
        return true;
    }

    public function buscarRayosXRuc($ruc, $codigo)
    {
        try {
            $rayoxbd = DB::select('SELECT tipo1, tipo2, tipo3,cp1.marca AS marcat3,cp1.modelo AS modelot3,cp1.serie AS seriet3,
              cp1.tensionmax AS tensionmaxt3,cp1.cargamax AS cargamaxt3,cp1.fabricacion AS fabricaciont3,cp1.instalacion AS instalaciont3,
              tipo4,cp2.marca AS marcat4,cp2.modelo AS modelot4,cp2.serie AS seriet4, cp2.tensionmax AS tensionmaxt4,
              cp2.cargamax AS cargamaxt4,cp2.fabricacion AS fabricaciont4,cp2.instalacion AS instalaciont4 
              FROM cliente LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1
              and cp1.estado=1 and cp2.estado=1 and cliente.ruc =:ruc and codRayosX like "%' . $codigo . '%" ', ['ruc' => $ruc]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'buscarRayosXRuc/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXRazonSocial($razonSocial)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,cp1.marca AS marcat3, cp2.marca AS marcat4, cp1.modelo AS modelot3, cp2.modelo AS modelot4, cp1.serie AS seriet3, cp2.serie AS seriet4,
              cp1.codComponentePadre as cp1codComponentePadre, cp2.codComponentePadre as cp2codComponentePadre, codCliente, codComponentea, 
              codComponenteb, razonSocial, equipo
              FROM cliente
              LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and cliente.razonSocial like "%' . $razonSocial . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXRazonSocial/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXCodigo($codigo)
    {
        try {
            $rayoxbd = DB::select('SELECT ruc,codRayosX,tipo1, tipo2, tipo3,cp1.marca AS marcat3,cp1.modelo AS modelot3,cp1.serie AS seriet3,
              cp1.tensionmax AS tensionmaxt3,cp1.cargamax AS cargamaxt3,cp1.fabricacion AS fabricaciont3,cp1.instalacion AS instalaciont3, 
              cp1.codComponentePadre as cp1codComponentePadre, cp2.codComponentePadre as cp2codComponentePadre, tipo4, equipo,
              cp2.marca AS marcat4,cp2.modelo AS modelot4,cp2.serie AS seriet4, cp2.tensionmax AS tensionmaxt4, codCliente, codComponentea, codComponenteb,
              cp2.cargamax AS cargamaxt4,cp2.fabricacion AS fabricaciont4,cp2.instalacion AS instalaciont4, razonSocial, telefono, email, direccion, detalle
              FROM cliente 
              LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and rayosx.codRayosX =:codRayosX', ['codRayosX' => $codigo]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXCodigo/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXMarca($marca)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,cp1.marca AS marcat3, cp2.marca AS marcat4, cp1.modelo AS modelot3, cp2.modelo AS modelot4, cp1.serie AS seriet3, cp2.serie AS seriet4,
              cp1.codComponentePadre as cp1codComponentePadre, cp2.codComponentePadre as cp2codComponentePadre, codCliente, codComponentea, 
              codComponenteb, razonSocial, equipo
              FROM cliente
              LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and cp1.marca like "%' . $marca . '%" or cp2.marca like "%' . $marca . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXMarca/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXModelo($modelo)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,cp1.marca AS marcat3, cp2.marca AS marcat4, cp1.modelo AS modelot3, cp2.modelo AS modelot4, cp1.serie AS seriet3, cp2.serie AS seriet4,
              cp1.codComponentePadre as cp1codComponentePadre, cp2.codComponentePadre as cp2codComponentePadre, codCliente, codComponentea, 
              codComponenteb, razonSocial, equipo
              FROM cliente
              LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and cp1.modelo like "%' . $modelo . '%" or cp2.modelo like "%' . $modelo . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXModelo/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXSerie($serie)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,cp1.marca AS marcat3, cp2.marca AS marcat4, cp1.modelo AS modelot3, cp2.modelo AS modelot4, cp1.serie AS seriet3, cp2.serie AS seriet4,
              cp1.codComponentePadre as cp1codComponentePadre, cp2.codComponentePadre as cp2codComponentePadre, codCliente, codComponentea, 
              codComponenteb, razonSocial, equipo
              FROM cliente
              LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and cp1.serie like "%' . $serie . '%" or cp2.serie like "%' . $serie . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXSerie/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXRuc($ruc)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,tipo1, tipo2, equipo
              FROM cliente LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1
              and cp1.estado=1 and cp2.estado=1 and cliente.ruc =:ruc ', ['ruc' => $ruc]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'buscarRayosx/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXRazonS($razonSocial)
    {
        try {
            $rayoxbd = DB::select('SELECT codRayosX,tipo1, tipo2, equipo
              FROM cliente LEFT JOIN rayosx ON cliente.codCliente = rayosx.idCliente
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE cliente.estado=1 and componentea.estado=1 and componenteb.estado=1
              and cp1.estado=1 and cp2.estado=1 and cliente.razonSocial =:razonSocial ', ['razonSocial' => $razonSocial]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'buscarRayosx/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }

    public function rayosXId($id)
    {
        try {
            $rayoxbd = DB::select('SELECT cp1.marca AS marcat3, cp2.marca AS marcat4, cp1.modelo AS modelot3, cp2.modelo AS modelot4, 
              cp1.serie AS seriet3, cp2.serie AS seriet4, cp1.tensionmax AS tensionmaxt3, cp2.tensionmax AS tensionmaxt4, cp1.cargamax as cargamaxt3,
              cp2.cargamax as cargamaxt4, cp1.fabricacion as fabricaciont3, cp2.fabricacion as fabricaciont4, cp1.instalacion as instalaciont3, 
              cp2.instalacion as instalaciont4, tipo1, tipo2,tipo3,tipo4
              FROM rayosx
              LEFT JOIN componentea ON rayosx.idComponentea = componentea.codComponentea
              LEFT JOIN componenteb on rayosx.idComponenteb = componenteb.codComponenteb
              LEFT JOIN componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
              LEFT JOIN componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
              WHERE componentea.estado=1 and componenteb.estado=1 and rayosx.estado = 1
              and cp1.estado=1 and cp2.estado=1 and rayosx.codRayosX =:codRayosX', ['codRayosX' => $id]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'rayosXSerie/rayosxmodel');
            return false;
        }
        return $rayoxbd;
    }
}