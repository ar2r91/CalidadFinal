<?php

namespace App\Http\Controllers;

use App\medicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class medicionController extends Controller
{
    public function registrarMedicion(Request $request)
    {
        $medicion = new medicion();
        $medicion->setTipo($request->tipo);
        $medicion->setMarca($request->marca);
        $medicion->setModelo($request->modelo);
        $medicion->setSerie($request->serie);
        $date = date("Y-m-d", strtotime($request->fecha));
        $medicion->setFecha($date);
        $med = $medicion->savemedicion();

        if ($med == true) {
            return back()->with('true', 'Equipo de medicion ' . $request->serie . ' guardada con exito')->withInput();
        } else {
            return back()->with('false', 'Equipo de medicion ' . $request->serie . ' no guardada, puede que ya exista');
        }
    }

    public function cargarMedicion($codMedicion)
    {
        $valueA = Session::get('tipoCuentaA');

        $medicion = new medicion();
        $medicion = $medicion->consultarMedicionId($codMedicion);

        if ($valueA == 'Administrador')
            return view('Administrador/Medicion/editar')->with(['medicion' => $medicion]);
    }

    public function editarMedicion($codMedicion, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $medicion = new medicion();
        $medicion->setTipo($request->tipo);
        $medicion->setMarca($request->marca);
        $medicion->setModelo($request->modelo);
        $medicion->setSerie($request->serie);
        $date = date("Y-m-d", strtotime($request->fecha));
        $medicion->setFecha($date);
        $med = $medicion->editarmedicion($codMedicion);

        if ($valueA == 'Administrador') {
            if ($med == true) {
                return redirect('/admBuscarEquipoMedicion')->with('true', 'Equipo de medicion ' . $request->nombres . ' fue editado con exito');
            } else {
                return redirect('/admBuscarEquipoMedicion')->with('false', 'Equipo de medicion ' . $request->nombres . 'no fue editado con exito');
            }
        }
    }

    public function eliminarMedicion($codMedicion, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $medicion = new medicion();
        $med = $medicion->eliminarmedicion($codMedicion);

        if ($valueA == 'Administrador') {
            if ($med == true) {
                return redirect('/admBuscarEquipoMedicion')->with('true', 'Equipo de medicion ' . $request->nombres . 'fue elimiando con exito');
            } else {
                return redirect('/admBuscarEquipoMedicion')->with('false', 'Equipo de medicion ' . $request->nombres . 'no fue eliminado elimino');
            }
        }
    }

    public function listarMedicion(Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $med = null;
        $medicion = new medicion();

        if ($request->select == 'Codigo') {
            $med = $medicion->consultarMedicionCodigo($request->text);
        } else {
            if ($request->select == 'Tipo') {
                $med = $medicion->consultarMedicionTipo($request->text);
            } /*else {
                if ($request->select == 'Marca') {
                    $med = $medicion->consultarMedicionMarca($request->text);
                } else {
                    if ($request->select == 'Modelo') {
                        $med = $medicion->consultarMedicionModelo($request->text);
                    } else {
                        if ($request->select == 'Serie') {
                            $med = $medicion->consultarMedicionSerie($request->text);
                        }
                    }
                }
            }*/
        }
        if ($valueA == 'Administrador')
            return view('Administrador/Medicion/buscar')->with(['medicion' => $med, 'txt' => $request->text, 'select' => $request->select]);
    }

    public function buscarEquipoMedicion()
    {
        $medicion = new medicion();
        $med = $medicion->buscarMedicion();

        return response()->json($med);
    }

    public function buscarEquipoMedicionSerie(Request $request)
    {
        $dato = array();
        $medicion = new medicion();

        $med = $medicion->buscarMedicionSerie($request->serie);

        foreach ($med as $m) {
            $dato[0] = $m->serie;
            $dato[1] = $m->tipo;
            $dato[2] = $m->marca;
            $dato[3] = $m->modelo;
            $dato[4] = $m->fecha;
        }
        return response()->json($dato);
    }
}
