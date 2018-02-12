<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 19/01/2018
 * Time: 9:13 PM
 */

namespace App;

use App\Http\Controllers\util;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Session;

class intraoral
{
    private $establidadmecanica;
    private $movimientoequipo;
    private $estadocables;
    private $grantygira;
    private $indicadoresoperativos;
    private $aireacondicionado;
    private $sistemaaudible;
    private $manualequipo;
    private $ubicacion;
    private $fecha;
    private $certificado;
    private $conclusiones;
    private $recomendaciones;
    private $vigencia;

    /**
     * intraoral constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEstablidadmecanica()
    {
        return $this->establidadmecanica;
    }

    /**
     * @param mixed $establidadmecanica
     * @return intraoral
     */
    public function setEstablidadmecanica($establidadmecanica)
    {
        $this->establidadmecanica = $establidadmecanica;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovimientoequipo()
    {
        return $this->movimientoequipo;
    }

    /**
     * @param mixed $movimientoequipo
     * @return intraoral
     */
    public function setMovimientoequipo($movimientoequipo)
    {
        $this->movimientoequipo = $movimientoequipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadocables()
    {
        return $this->estadocables;
    }

    /**
     * @param mixed $estadocables
     * @return intraoral
     */
    public function setEstadocables($estadocables)
    {
        $this->estadocables = $estadocables;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrantygira()
    {
        return $this->grantygira;
    }

    /**
     * @param mixed $grantygira
     * @return intraoral
     */
    public function setGrantygira($grantygira)
    {
        $this->grantygira = $grantygira;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicadoresoperativos()
    {
        return $this->indicadoresoperativos;
    }

    /**
     * @param mixed $indicadoresoperativos
     * @return intraoral
     */
    public function setIndicadoresoperativos($indicadoresoperativos)
    {
        $this->indicadoresoperativos = $indicadoresoperativos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAireacondicionado()
    {
        return $this->aireacondicionado;
    }

    /**
     * @param mixed $aireacondicionado
     * @return intraoral
     */
    public function setAireacondicionado($aireacondicionado)
    {
        $this->aireacondicionado = $aireacondicionado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSistemaaudible()
    {
        return $this->sistemaaudible;
    }

    /**
     * @param mixed $sistemaaudible
     * @return intraoral
     */
    public function setSistemaaudible($sistemaaudible)
    {
        $this->sistemaaudible = $sistemaaudible;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getManualequipo()
    {
        return $this->manualequipo;
    }

    /**
     * @param mixed $manualequipo
     * @return intraoral
     */
    public function setManualequipo($manualequipo)
    {
        $this->manualequipo = $manualequipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param mixed $ubicacion
     * @return intraoral
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     * @return intraoral
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCertificado()
    {
        return $this->certificado;
    }

    /**
     * @param mixed $certificado
     * @return intraoral
     */
    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConclusiones()
    {
        return $this->conclusiones;
    }

    /**
     * @param mixed $conclusiones
     * @return intraoral
     */
    public function setConclusiones($conclusiones)
    {
        $this->conclusiones = $conclusiones;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecomendaciones()
    {
        return $this->recomendaciones;
    }

    /**
     * @param mixed $recomendaciones
     * @return intraoral
     */
    public function setRecomendaciones($recomendaciones)
    {
        $this->recomendaciones = $recomendaciones;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * @param mixed $vigencia
     * @return intraoral
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;
        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function saveintraoral($ruc, $codigo, $serie, $param, $calidad, $tiempo, $rendim, $dosi)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('registrarCliente');
        try {
            DB::transaction(function () use ($log, $ruc, $codigo, $serie, $param, $calidad, $tiempo, $rendim, $dosi, $codPers) {
                //PARAMETROS GEOMETRICOS
                $codP = DB::table('paramgeometrico')->insertGetId(['tamanio' => $param['tamanio'], 'valoraceptablet' => $param['valoraceptablet'], 'distancia' => $param['distancia'],
                    'valoraceptabled' => $param['valoraceptabled']]);

                //CALIDAD DEL HAZ
                $codC = DB::table('calidadhaz')->insertGetId(['tensionnominal' => $calidad['tensionnominal'], 'tensionmedia' => $calidad['tensionmedia'], 'resultadotn' => $calidad['resultadotn'],
                    'valoraceptabletn' => $calidad['valoraceptabletn'], 'tension1' => $calidad['tension1'], 'tension2' => $calidad['tension2'], 'tension3' => $calidad['tension3'],
                    'resultadot' => $calidad['resultadot'], 'valoraceptablet' => $calidad['valoraceptablet'], 'filtracion' => $calidad['filtracion'], 'tensionf' => $calidad['tensionf'],
                    'valoraceptablef' => $calidad['valoraceptablef']]);

                //TIEMPO DE EXPOSICION
                $codT = DB::table('tiempoexposicion')->insertGetId(['tiemponominal' => $tiempo['tiemponominal'], 'tiempomedio' => $tiempo['tiempomedio'], 'resultadoti' => $tiempo['resultadoti'],
                    'valoraceptableti' => $tiempo['valoraceptableti'], 'tiempo1' => $tiempo['tiempo1'], 'tiempo2' => $tiempo['tiempo2'], 'tiempo3' => $tiempo['tiempo3'], 'resultadotie' => $tiempo['resultadotie'],
                    'valoraceptabletie' => $tiempo['valoraceptabletie']]);

                //RENDIMIENTO
                $codR = DB::table('rendimiento')->insertGetId(['dosisr1' => $rendim['dosisr1'], 'dosisr2' => $rendim['dosisr2'], 'dosisr3' => $rendim['dosisr3'],
                    'resultador' => $rendim['resultador'], 'aceptabler' => $rendim['aceptabler'], 'carga1' => $rendim['carga1'], 'dosisc1' => $rendim['dosisc1'],
                    'carga2' => $rendim['carga2'], 'dosisc2' => $rendim['dosisc2'], 'resultadoc' => $rendim['resultadoc'], 'aceptablec' => $rendim['aceptablec']]);

                //DOSIS EN LA SUPERFICIE DEL PACIENTE
                $codD = DB::table('dosispaciente')->insertGetId(['exploracion' => $dosi['exploracion'], 'dosis' => $dosi['dosis'], 'valoraceptable' => $dosi['valoraceptable'],
                    'distancia' => $dosi['distancia'], 'tension' => $dosi['tension'], 'corriente' => $dosi['corriente'], 'tiempoexposicion' => $dosi['tiempoexposicion']]);

                //DENTAL
                $codCli = DB::table('cliente')->where('ruc', $ruc)->value('codCliente');
                $codE = DB::table('equipomedicion')->where('serie', $serie)->value('codEquipoMedicion');
                DB::table('dental')->insertGetId(['ubicacion' => $this->ubicacion, 'fecha' => $this->fecha, 'estabilidadmecanica' => $this->establidadmecanica, 'movimientoequipo' => $this->movimientoequipo,
                    'estadocables' => $this->estadocables, 'grantygira' => $this->grantygira, 'indicadoresoperativos' => $this->indicadoresoperativos, 'aireacondicionado' => $this->aireacondicionado,
                    'sistemaaudible' => $this->sistemaaudible, 'manualequipo' => $this->manualequipo, 'idCliente' => $codCli, 'idRayosX' => $codigo, 'idParamGeometricos' => $codP, 'certificado' => $this->certificado,
                    'idCalidadHaz' => $codC, 'idTiempoExposicion' => $codT, 'idRendimiento' => $codR, 'idDosisPaciente' => $codD, 'idEquipoMedicion' => $codE, 'codPersonal' => $codPers, 'conclusiones' => $this->conclusiones,
                    'recomendaciones' => $this->recomendaciones, 'vigencia' => $this->vigencia]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'saveintraoral/intraoral');
            return false;
        }
        return true;
    }

    public function consultarIntraolRUC($ruc)
    {
        try {
            $intraoral = DB::select('select ruc, razonSocial, codDental, dental.fecha, codRayosX, codEquipoMedicion, codParamGeometricos, codCalidadHaz,codTiempoExposicion,codDosisPaciente,codRendimiento, certificado from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join equipomedicion on dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
            left join paramgeometrico on dental.idParamGeometricos = paramgeometrico.codParamGeometricos
            left join calidadhaz on dental.idCalidadHaz = calidadhaz.codCalidadHaz
            left join tiempoexposicion on dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            left join rendimiento on dental.idRendimiento = rendimiento.codRendimiento
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and equipomedicion.estado=1 and paramgeometrico.estado =1 and calidadhaz.estado =1
            and tiempoexposicion.estado=1 and dosispaciente.estado=1 and rendimiento.estado=1 and cliente.ruc like "%' . $ruc . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraolRUC/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralCodigoCliente($codCliente)
    {
        try {
            $intraoral = DB::select('select ruc, razonSocial, codDental, dental.fecha, codRayosX, codEquipoMedicion, codParamGeometricos, codCalidadHaz,codTiempoExposicion,codDosisPaciente,codRendimiento,certificado from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join equipomedicion on dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
            left join paramgeometrico on dental.idParamGeometricos = paramgeometrico.codParamGeometricos
            left join calidadhaz on dental.idCalidadHaz = calidadhaz.codCalidadHaz
            left join tiempoexposicion on dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            left join rendimiento on dental.idRendimiento = rendimiento.codRendimiento
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and equipomedicion.estado=1 and paramgeometrico.estado =1 and calidadhaz.estado =1
            and tiempoexposicion.estado=1 and dosispaciente.estado=1 and rendimiento.estado=1 and cliente.codCliente like "%' . $codCliente . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralCodigoCliente/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralCodigoRegistro($codigo)
    {
        try {
            $intraoral = DB::select('select ruc, razonSocial, codDental, dental.fecha, codRayosX, codEquipoMedicion, codParamGeometricos, codCalidadHaz,codTiempoExposicion,codDosisPaciente,codRendimiento, certificado from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join equipomedicion on dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
            left join paramgeometrico on dental.idParamGeometricos = paramgeometrico.codParamGeometricos
            left join calidadhaz on dental.idCalidadHaz = calidadhaz.codCalidadHaz
            left join tiempoexposicion on dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            left join rendimiento on dental.idRendimiento = rendimiento.codRendimiento
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and equipomedicion.estado=1 and paramgeometrico.estado =1 and calidadhaz.estado =1
            and tiempoexposicion.estado=1 and dosispaciente.estado=1 and rendimiento.estado=1 and dental.codDental like "%' . $codigo . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralCodigoRegistro/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralInforme($codigo)
    {
        try {
            $intraoral = DB::select('SELECT 
            dental.fecha AS dfecha, codDental,
            razonSocial,
            ruc,
            direccion,
            ubicacion,
            tipo1,
            tipo3,
            tipo4,
            cp1.marca AS cp1marca,
            cp2.marca AS cp2marca,
            cp1.serie AS cp1serie,
            cp2.serie AS cp2serie,
            cp1.cargamax AS cp1cargamax,
            cp2.cargamax AS cp2cargamax,
            cp1.tensionmax AS cp1tensionmax,
            cp2.tensionmax AS cp2tensionmax,
            cp1.fabricacion AS cp1fabricacion,
            cp2.fabricacion AS cp2fabricacion,
            cp1.instalacion AS cp1instalacion,
            cp2.instalacion AS cp2instalacion,
            tipo,
            equipomedicion.marca AS mmarca,
            equipomedicion.modelo AS mmodelo,
            equipomedicion.serie AS mserie,
            equipomedicion.fecha AS mfecha,
            estabilidadmecanica,
            movimientoequipo,
            estadocables,
            grantygira,
            indicadoresoperativos,
            sistemaaudible,
            paramgeometrico.distancia as pdistancia,
            valoraceptabled,
            tamanio,
            paramgeometrico.valoraceptablet,
            resultadotn,
            valoraceptabletn,
            resultadot,
            calidadhaz.valoraceptablet AS cvaloraceptablet,
            filtracion,
            valoraceptablef,
            resultadoti,
            valoraceptableti,
            resultadotie,
            valoraceptabletie,
            resultador,
            aceptabler,
            resultadoc,
            aceptablec,
            dosis,
            valoraceptable,
            conclusiones,
            recomendaciones,
            vigencia,
            dosispaciente.distancia AS ddistancia,
            dosispaciente.tension AS dtension,
            dosispaciente.corriente AS dcorriente,
            dosispaciente.tiempoexposicion AS dtiempoexposicion
        FROM
            dental
                LEFT JOIN
            cliente ON dental.idCliente = cliente.codCliente
                LEFT JOIN
            rayosx ON dental.idRayosX = rayosx.codRayosX
                LEFT JOIN
            componentea ON rayosx.idComponentea = componentea.codComponentea
                LEFT JOIN
            componenteb ON rayosx.idComponenteb = componenteb.codComponenteb
                LEFT JOIN
            componentepadre AS cp1 ON componentea.idComponentePadre = cp1.codComponentePadre
                LEFT JOIN
            componentepadre AS cp2 ON componenteb.idComponentePadre = cp2.codComponentePadre
                LEFT JOIN
            equipomedicion ON dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
                LEFT JOIN
            paramgeometrico ON dental.idParamGeometricos = paramgeometrico.codParamGeometricos
                LEFT JOIN
            calidadhaz ON dental.idCalidadHaz = calidadhaz.codCalidadHaz
                LEFT JOIN
            tiempoexposicion ON dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
                LEFT JOIN
            dosispaciente ON dental.idDosisPaciente = dosispaciente.codDosisPaciente
                LEFT JOIN
            rendimiento ON dental.idRendimiento = rendimiento.codRendimiento
        WHERE
            dental.estado = 1 AND cliente.estado = 1
                AND rayosx.estado = 1
                AND componentea.estado = 1
                AND componenteb.estado = 1
                AND cp1.estado = 1
                AND cp2.estado = 1
                AND equipomedicion.estado = 1
                AND paramgeometrico.estado = 1
                AND calidadhaz.estado = 1
                AND tiempoexposicion.estado = 1
                AND dosispaciente.estado = 1
                AND rendimiento.estado = 1
                AND dental.codDental =:codDental', ['codDental' => $codigo]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralInforme/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralCertificado($codigo)
    {
        try {
            $intraoral = DB::select('select razonSocial, codDental, fecha, ubicacion, tipo1, tipo3, cp1.marca as cp1marca, cp1.serie as cp1serie, cp1.tensionmax as cp1tensionmax,
			cp1.cargamax as cp1cargamax, cp1.fabricacion as cp1fabricacion, cp1.instalacion as cp1instalacion, cp2.marca as cp2marca, cp2.serie as cp2serie, cp2.tensionmax as cp2tensionmax,
			cp2.cargamax as cp2cargamax, cp2.fabricacion as cp2fabricacion, cp2.instalacion as cp2instalacion, tipo4, vigencia from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join componentea on rayosx.idComponentea = componentea.codComponentea
            left join componenteb on rayosx.idComponenteb = componenteb.codComponenteb
            left join componentepadre as cp1 on componentea.idComponentePadre = cp1.codComponentePadre
            left join componentepadre as cp2 on componenteb.idComponentePadre = cp2.codComponentePadre
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and componentea.estado=1 and dosispaciente.estado = 1
            and componenteb.estado = 1 and cp1.estado=1 and cp2.estado = 1 and dental.codDental =:codDental', ['codDental' => $codigo]);
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralCertificado/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralCodigoRayosX($codRayosX)
    {
        try {
            $intraoral = DB::select('select ruc, razonSocial, codDental, dental.fecha, codRayosX, codEquipoMedicion, codParamGeometricos, codCalidadHaz,codTiempoExposicion,codDosisPaciente,codRendimiento,certificado from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join equipomedicion on dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
            left join paramgeometrico on dental.idParamGeometricos = paramgeometrico.codParamGeometricos
            left join calidadhaz on dental.idCalidadHaz = calidadhaz.codCalidadHaz
            left join tiempoexposicion on dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            left join rendimiento on dental.idRendimiento = rendimiento.codRendimiento
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and equipomedicion.estado=1 and paramgeometrico.estado =1 and calidadhaz.estado =1
            and tiempoexposicion.estado=1 and dosispaciente.estado=1 and rendimiento.estado=1 and rayosx.codRayosX like "%' . $codRayosX . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralCodigoRayosX/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function consultarIntraoralRazonSocial($razonSocial)
    {
        try {
            $intraoral = DB::select('select ruc, razonSocial, codDental, dental.fecha, codRayosX, codEquipoMedicion, codParamGeometricos, codCalidadHaz,codTiempoExposicion,codDosisPaciente,codRendimiento,certificado from dental 
            left join cliente on dental.idCliente = cliente.codCliente
            left join rayosx on dental.idRayosX = rayosx.codRayosX
            left join equipomedicion on dental.idEquipoMedicion = equipomedicion.codEquipoMedicion
            left join paramgeometrico on dental.idParamGeometricos = paramgeometrico.codParamGeometricos
            left join calidadhaz on dental.idCalidadHaz = calidadhaz.codCalidadHaz
            left join tiempoexposicion on dental.idTiempoExposicion = tiempoexposicion.codTiempoExposicion
            left join dosispaciente on dental.idDosisPaciente = dosispaciente.codDosisPaciente
            left join rendimiento on dental.idRendimiento = rendimiento.codRendimiento
            where dental.estado = 1 and cliente.estado = 1 and rayosx.estado=1 and equipomedicion.estado=1 and paramgeometrico.estado =1 and calidadhaz.estado =1
            and tiempoexposicion.estado=1 and dosispaciente.estado=1 and rendimiento.estado=1 and cliente.razonSocial like "%' . $razonSocial . '%"');
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'consultarIntraoralRazonSocial/intraoral');
            return false;
        }
        return $intraoral;
    }

    public function eliminarIntraoral($codParamGeometricos, $codCalidadHaz, $codTiempoExposicion, $codRendimiento, $codDosisPaciente, $codDental)
    {
        date_default_timezone_set('Etc/GMT+5');
        $date = date('Y-m-d H:i:s', time());
        $log = new logmodel();
        $value = Session::get('personalC');
        $codPers = $log->obtenerCodigoPersonal($value);
        $log->setFecha($date);
        $log->setDescripcion('EliminarRayosX');
        try {
            DB::transaction(function () use ($log, $codParamGeometricos, $codCalidadHaz, $codTiempoExposicion, $codRendimiento, $codDosisPaciente, $codDental, $codPers) {
                DB::table('paramgeometrico')->where('codParamGeometricos', $codParamGeometricos)->update(['estado' => 0]);
                DB::table('calidadhaz')->where('codCalidadHaz', $codCalidadHaz)->update(['estado' => 0]);
                DB::table('tiempoexposicion')->where('CodTiempoExposicion', $codTiempoExposicion)->update(['estado' => 0]);
                DB::table('rendimiento')->where('codRendimiento', $codRendimiento)->update(['estado' => 0]);
                DB::table('dosispaciente')->where('codDosisPaciente', $codDosisPaciente)->update(['estado' => 0]);
                DB::table('dental')->where('codDental', $codDental)->update(['estado' => 0]);
                $log->saveLog($codPers);
            });
        } catch (PDOException $e) {
            $util = new util();
            $util->insertarError($e->getMessage(), 'eliminarIntraoral/intraoral');
            return false;
        }
        return true;
    }
}