<?php

namespace App\Http\Controllers;

use App\componentea;
use App\componenteb;
use App\rayosxmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class rayosxController extends Controller
{
    public function registrarRayosX(Request $request)
    {
        $componente1 = new componentea();
        $componente1->setTipo3($request->tipo3);
        $componente1->setMarca($request->marcat3);
        $componente1->setModelo($request->modelot3);
        $componente1->setSerie($request->seriet3);
        $componente1->setTensionmax($request->tensionmaxt3);
        $componente1->setCargamax($request->cargamaxt3);
        $componente1->setFabricacion($request->fabricaciont3);
        $componente1->setInstalacion($request->instalaciont3);
        $componentea = $componente1->guardarArreglo();

        $componente2 = new componenteb();
        $componente2->setTipo4($request->tipo4);
        $componente2->setMarca($request->marcat4);
        $componente2->setModelo($request->modelot4);
        $componente2->setSerie($request->seriet4);
        $componente2->setTensionmax($request->tensionmaxt4);
        $componente2->setCargamax($request->cargamaxt4);
        $componente2->setFabricacion($request->fabricaciont4);
        $componente2->setInstalacion($request->instalaciont4);

        $componenteb = $componente2->guardarArreglo();

        $rayosx = new rayosxmodel();
        $rayosx->setTipo1($request->tipo1);
        $rayosx->setTipo2($request->tipo2);
        $rayosx->setEquipo($request->equipo);
        $rayo = $rayosx->saveRayosX($componentea, $componenteb, $request->ruc);

        if ($rayo == true) {
            return back()->with('true', 'Rayos X ' . $request->nombres . ' guardada con exito')->withInput();
        } else {
            return back()->with('false', 'Rayos X ' . $request->nombres . ' no guardada, puede que ya exista');
        }
    }

    public function editarRayosX(Request $request, $codRayosX, $codCliente, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre)
    {
        $valueA = Session::get('tipoCuentaA');

        $componente1 = new componentea();
        $componente1->setTipo3($request->tipo3);
        $componente1->setMarca($request->marcat3);
        $componente1->setModelo($request->modelot3);
        $componente1->setSerie($request->seriet3);
        $componente1->setTensionmax($request->tensionmaxt3);
        $componente1->setCargamax($request->cargamaxt3);
        $componente1->setFabricacion($request->fabricaciont3);
        $componente1->setInstalacion($request->instalaciont3);
        $componentea = $componente1->guardarArreglo();

        $componente2 = new componenteb();
        $componente2->setTipo4($request->tipo4);
        $componente2->setMarca($request->marcat4);
        $componente2->setModelo($request->modelot4);
        $componente2->setSerie($request->seriet4);
        $componente2->setTensionmax($request->tensionmaxt4);
        $componente2->setCargamax($request->cargamaxt4);
        $componente2->setFabricacion($request->fabricaciont4);
        $componente2->setInstalacion($request->instalaciont4);

        $componenteb = $componente2->guardarArreglo();

        $rayosx = new rayosxmodel();
        $rayosx->setTipo1($request->tipo1);
        $rayosx->setTipo2($request->tipo2);
        $rayosx->setEquipo($request->equipo);
        $rayo = $rayosx->editarRayosX($codRayosX, $componentea, $componenteb, $codCliente, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre);

        if ($valueA == 'Administrador') {
            if ($rayo == true) {
                return redirect('/admBuscarRayosX')->with('true', 'El equipo de rayos X # ' . $codRayosX . ' fue editado con exito');
            } else {
                return redirect('/admBuscarRayosX')->with('false', 'El equipo de rayos X # ' . $codRayosX . ' no fue editado con exito');
            }
        }
    }

    public function eliminarRayosX($codRayosX, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre)
    {
        $valueA = Session::get('tipoCuentaA');

        $rayosx = new rayosxmodel();
        $rayo = $rayosx->eliminarRayosX($codRayosX, $codComponentea, $codComponenteb, $cp1codComponentePadre, $cp2codComponentePadre);

        if ($valueA == 'Administrador') {
            if ($rayo == true) {
                return redirect('/admBuscarRayosX')->with('true', 'El equipo de rayos X # ' . $codRayosX . ' fue eliminado con exito');
            } else {
                return redirect('/admBuscarRayosX')->with('false', 'El equipo de rayos X # ' . $codRayosX . ' no fue eliminado con exito');
            }
        }
    }

    public function cargarRayosX($codRayosX)
    {
        $valueA = Session::get('tipoCuentaA');
        $rayosx = new rayosxmodel();
        $rayo = $rayosx->rayosXCodigo($codRayosX);

        if ($valueA == 'Administrador')
            return view('Administrador/RayosX/editar')->with(['rayosx' => $rayo]);
    }

    public function listaRayosX(Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $rayo = null;
        $rayosx = new rayosxmodel();

        if ($request->select == 'Razon Social') {
            $rayo = $rayosx->rayosXRazonSocial($request->text);
        } else {
            if ($request->select == 'Marca') {
                $rayo = $rayosx->rayosXMarca($request->text);
            } else {
                if ($request->select == 'Modelo') {
                    $rayo = $rayosx->rayosXModelo($request->text);
                } else {
                    if ($request->select == 'Serie') {
                        $rayo = $rayosx->rayosXSerie($request->text);
                    }
                }
            }
        }
        if ($valueA == 'Administrador')
            return view('Administrador/RayosX/buscar')->with(['rayo' => $rayo, 'txt' => $request->text, 'select' => $request->select]);
    }

    public function buscarRayosXRuc(Request $request)
    {
        $rayo = null;
        $rayosx = new rayosxmodel();
        if ($request->select == 'RUC') {
            $rayo = $rayosx->rayosXRuc($request->buscar);

        } elseif ($request->select == 'Razon Social') {
            $rayo = $rayosx->rayosXRazonS($request->buscar);
        }
        return response()->json($rayo);
    }

    public function buscarRayosXCodigo(Request $request)
    {
        $dato = array();
        $rayosx = new rayosxmodel();
        $rayo = $rayosx->rayosXId($request->id);
        foreach ($rayo as $r) {
            $dato[0] = $request->id;
            $dato[1] = $r->tipo1;
            $dato[2] = $r->tipo2;
            $dato[3] = $r->tipo3;
            $dato[4] = $r->marcat3;
            $dato[5] = $r->modelot3;
            $dato[6] = $r->seriet3;
            $dato[7] = $r->tensionmaxt3;
            $dato[8] = $r->cargamaxt3;
            $dato[9] = $r->fabricaciont3;
            $dato[10] = $r->instalaciont3;
            $dato[11] = $r->tipo4;
            $dato[12] = $r->marcat4;
            $dato[13] = $r->modelot4;
            $dato[14] = $r->seriet4;
            $dato[15] = $r->tensionmaxt4;
            $dato[16] = $r->cargamaxt4;
            $dato[17] = $r->fabricaciont4;
            $dato[18] = $r->instalaciont4;
        }
        return response()->json($dato);
    }
}
