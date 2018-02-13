<?php

namespace App\Http\Controllers;

use App\calidadhaz;
use App\dosiscliente;
use App\intraoral;
use App\paramgeometrico;
use App\rendimiento;
use App\tiempoexposicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class intraoralController extends Controller
{
    public function registrarIntraoral(Request $request)
    {
        //PARAMETROS GEOMETRICOS
        $paramgeometricos = new paramgeometrico();
        $paramgeometricos->setTamanio($request->tamanio);
        if ($request->valoraceptablet == 'SI') {
            $paramgeometricos->setValoraceptablet(1);
        } else {
            $paramgeometricos->setValoraceptablet(0);
        }
        $paramgeometricos->setDistancia($request->distancia);
        if ($request->valoraceptabled == 'SI') {
            $paramgeometricos->setValoraceptabled(1);

        } else {
            $paramgeometricos->setValoraceptabled(0);
        }
        $param = $paramgeometricos->guardarArreglo();

        //CALIDAD DEL HAZ
        $calidadhaz = new calidadhaz();
        $calidadhaz->setTensionnominal($request->tensionnominal);
        $calidadhaz->setTensionmedia($request->tensionmedia);
        $calidadhaz->setResultadotn($request->resultadotn);
        if ($request->valoraceptabletn == 'SI') {
            $calidadhaz->setValoraceptabletn(1);

        } else {
            $calidadhaz->setValoraceptabletn(0);
        }
        $calidadhaz->setTension1($request->tension1);
        $calidadhaz->setTension2($request->tension2);
        $calidadhaz->setTension3($request->tension3);
        $calidadhaz->setResultadot($request->resultadot);
        if ($request->valoraceptabletns == 'SI') {
            $calidadhaz->setValoraceptablet(1);

        } else {
            $calidadhaz->setValoraceptablet(0);
        }
        $calidadhaz->setFiltracion($request->filtracion);
        $calidadhaz->setTensionf($request->tensionf);
        if ($request->valoraceptablef == 'SI') {
            $calidadhaz->setValoraceptablef(1);

        } else {
            $calidadhaz->setValoraceptablef(0);
        }
        $calidad = $calidadhaz->guardarArreglo();

        //TIEMPO DE EXPOSICION
        $tiempoexposicion = new tiempoexposicion();
        $tiempoexposicion->setTiemponominal($request->tiemponominal);
        $tiempoexposicion->setTiempomedio($request->tiempomedio);
        $tiempoexposicion->setResultadoti($request->resultadoti);
        if ($request->valoraceptableti == 'SI') {
            $tiempoexposicion->setValoraceptableti(1);
        } else {
            $tiempoexposicion->setValoraceptableti(0);
        }

        $tiempoexposicion->setTiempo1($request->tiempo1);
        $tiempoexposicion->setTiempo2($request->tiempo2);
        $tiempoexposicion->setTiempo3($request->tiempo3);
        $tiempoexposicion->setResultadotie($request->resultadotie);
        if ($request->valoraceptabletie == 'SI') {
            $tiempoexposicion->setValoraceptabletie(1);
        } else {
            $tiempoexposicion->setValoraceptabletie(0);
        }
        $tiempo = $tiempoexposicion->guardarArreglo();

        //RENDIMIENTO
        $redimiento = new rendimiento();
        $redimiento->setDosisr1($request->dosisr1);
        $redimiento->setDosisr2($request->dosisr2);
        $redimiento->setDosisr3($request->dosisr3);
        $redimiento->setResultador($request->resultador);
        if ($request->aceptabler == 'SI') {
            $redimiento->setAceptabler(1);
        } else {
            $redimiento->setAceptabler(0);
        }
        $redimiento->setCarga1($request->carga1);
        $redimiento->setDosisc1($request->dosisc1);
        $redimiento->setCarga2($request->carga2);
        $redimiento->setDosisc2($request->dosisc2);
        $redimiento->setResultadoc($request->resultadoc);
        if ($request->aceptablec == 'SI') {
            $redimiento->setAceptablec(1);
        } else {
            $redimiento->setAceptablec(0);
        }
        $rendim = $redimiento->guardarArreglo();

        //DOSIS DE LA SUPERFICIE DEL CLIENTE
        $dosis = new dosiscliente();
        $dosis->setExploracion($request->exploracion);
        $dosis->setDosis($request->dosis);
        if ($request->valoraceptable == 'SI') {
            $dosis->setValoraceptable(1);
        } else {
            $dosis->setValoraceptable(0);
        }
        $dosis->setDistancia($request->ddistancia);
        $dosis->setTension($request->dtension);
        $dosis->setCorriente($request->dcorriente);
        $dosis->setTiempoexposicion($request->dtiempoexposicion);
        $dosi = $dosis->guardarArreglo();

        //INTRAORAL
        $intaoral = new intraoral();
        $intaoral->setUbicacion($request->ubicacion);
        $intaoral->setConclusiones($request->conclusiones);
        $intaoral->setRecomendaciones($request->recomendaciones);
        $intaoral->setVigencia($request->vigencia);
        date_default_timezone_set('Etc/GMT+5');
        $fecha = date('Y-m-d');
        $intaoral->setFecha($fecha);

        if ($request->estabilidadmecanica == 'SI') {
            $intaoral->setEstablidadmecanica(1);
        } else {
            $intaoral->setEstablidadmecanica(0);
        }
        if ($request->movimientoequipo == 'SI') {
            $intaoral->setMovimientoequipo(1);
        } else {
            $intaoral->setMovimientoequipo(0);
        }
        if ($request->estadocables == 'SI') {
            $intaoral->setEstadocables(1);
        } else {
            $intaoral->setEstadocables(0);
        }
        if ($request->grantygira == 'SI') {
            $intaoral->setGrantygira(1);
        } else {
            $intaoral->setGrantygira(0);
        }
        if ($request->indicadoresoperativos == 'SI') {
            $intaoral->setIndicadoresoperativos(1);
        } else {
            $intaoral->setIndicadoresoperativos(0);
        }
        if ($request->aireacondicionado == 'SI') {
            $intaoral->setAireacondicionado(1);
        } else {
            $intaoral->setAireacondicionado(0);
        }
        if ($request->sistemaaudible == 'SI') {
            $intaoral->setSistemaaudible(1);
        } else {
            $intaoral->setSistemaaudible(0);
        }
        if ($request->manualequipo == 'SI') {
            $intaoral->setManualequipo(1);
        } else {
            $intaoral->setManualequipo(0);
        }

        if ($request->valoraceptablet == 'SI' && $request->valoraceptabled == 'SI' && $request->valoraceptabletn == 'SI' &&
            $request->valoraceptabletns == 'SI' && $request->valoraceptablef == 'SI' && $request->valoraceptableti == 'SI' &&
            $request->valoraceptabletie == 'SI' && $request->aceptabler == 'SI' && $request->aceptablec == 'SI' && $request->valoraceptable == 'SI') {
            $intaoral->setCertificado(1);
        } else {
            $intaoral->setCertificado(0);
        }

        $intaoral = $intaoral->saveintraoral($request->ruc, $request->codigo, $request->serie, $param, $calidad, $tiempo, $rendim, $dosi);

        if ($intaoral == true) {
            return back()->with('true', 'Registro guardado con exito')->withInput();
        } else {
            return back()->with('false', 'Registro no guardado');
        }
    }

    public function eliminarIntraoral($codParamGeometricos, $codCalidadHaz, $codTiempoExposicion, $codRendimiento, $codDosisPaciente, $codIntraoral)
    {
        $valueA = Session::get('tipoCuentaA');
        $intra = null;
        $intraoral = new intraoral();
        $intra = $intraoral->eliminarIntraoral($codParamGeometricos, $codCalidadHaz, $codTiempoExposicion, $codRendimiento, $codDosisPaciente, $codIntraoral);

        if ($valueA == 'Administrador') {
            if ($intra == true) {
                    return redirect('/admBuscarIntraoral')->with('true', 'El registro # ' . $codIntraoral . ' fue eliminada con exito');
            } else {
                return redirect('/admBuscarIntraoral')->with('false', 'El registro # ' . $codIntraoral . ' no se elimino');
            }
        }
    }

    public function listarIntraoral(Request $request)
    {
        $valueA = Session::get('tipoCuentaA');
        $intra = null;
        $intraoral = new intraoral();
        if ($request->select == 'RUC') {
            $intra = $intraoral->consultarIntraoralRUC($request->text);
        } else {
            if ($request->select == 'Codigo Cliente') {
                $intra = $intraoral->consultarIntraoralCodigoCliente($request->text);
            } else {
                if ($request->select == 'Codigo Registro') {
                    $intra = $intraoral->consultarIntraoralCodigoRegistro($request->text);
                } else {
                    if ($request->select == 'Codigo Rayos X') {
                        $intra = $intraoral->consultarIntraoralCodigoRayosX($request->text);
                    } else {
                        if ($request->select == 'Razon Social') {
                            $intra = $intraoral->consultarIntraoralRazonSocial($request->text);
                        }
                    }
                }
            }
        }
        if ($valueA == 'Administrador')
            return view('Administrador/Dental/Intraoral/buscar')->with(['intraoral' => $intra, 'txt' => $request->text, 'select' => $request->select]);
    }
}
