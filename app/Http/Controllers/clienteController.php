<?php

namespace App\Http\Controllers;

use App\clientemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class clienteController extends Controller
{

    public function registrarCliente(Request $request)
    {
        $cliente = new clientemodel();
        $cliente->setRazonSocial($request->razonSocial);
        $cliente->setRuc($request->ruc);
        $cliente->setTelefono($request->telefono);
        $cliente->setEmail($request->email);
        $cliente->setDireccion($request->direccion);
        $cliente->setDetalle($request->detalle);

        $cli = $cliente->savecliente();

        if ($cli == true) {
            return back()->with('true', 'Cliente ' . $request->nombres . ' guardada con exito')->withInput();
        } else {
            return back()->with('false', 'Cliente ' . $request->nombres . ' no guardada, puede que ya exista');
        }
    }

    public function cargarCliente($codCliente)
    {
        $valueA = Session::get('tipoCuentaA');
        $cliente = new clientemodel();
        $cli = $cliente->consultarClienteId($codCliente);

        if ($valueA == 'Administrador')
            return view('Administrador/Cliente/editar')->with(['cliente' => $cli]);
    }

    public function editarCliente($codCliente, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $cliente = new clientemodel();
        $cliente->setRazonSocial($request->razonSocial);
        $cliente->setRuc($request->ruc);
        $cliente->setTelefono($request->telefono);
        $cliente->setEmail($request->email);
        $cliente->setDireccion($request->direccion);
        $cliente->setDetalle($request->detalle);

        $val = $cliente->editarCliente($codCliente);

        if ($valueA == 'Administrador') {
            if ($val == true) {
                return redirect('/admBuscarCliente')->with('true', 'Cliente ' . $request->razonSocial . ' fue editado con exito');
            } else {
                return redirect('/admBuscarCliente')->with('false', 'Cliente ' . $request->razonSocial . ' no editado con exito');
            }
        }
    }

    public function eliminarCliente($codCliente, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');

        $cliente = new clientemodel();
        $val = $cliente->eliminarCliente($codCliente);

        if ($valueA == 'Administrador') {
            if ($val == true) {
                return redirect('/admBuscarCliente')->with('true', 'Cliente ' . $request->razonSocial . ' fue eliminado con exito');
            } else {
                return redirect('/admBuscarCliente')->with('false', 'Cliente ' . $request->razonSocial . ' no fue eliminado con exito');

            }
        }
    }

    public function listarCliente(Request $request)
    {
        $valueA = Session::get('tipoCuentaA');
        $cli = null;
        $cliente = new clientemodel();

        if ($request->select == 'Razon Social') {
            $cli = $cliente->consultarClientesRazonSocial($request->text);
        } else {
            if ($request->select == 'Ruc') {
                $cli = $cliente->consultarClientesRuc($request->text);
            } else {
                if ($request->select == 'Codigo') {
                    $cli = $cliente->consultarClientesCodigo($request->text);
                }
            }
        }
        if ($valueA == 'Administrador')
            return view('Administrador/Cliente/buscar')->with(['cliente' => $cli, 'txt' => $request->text, 'select' => $request->select]);
    }

    public function buscarClienteR(Request $request)
    {
        $dato = array();

        $cliente = new clientemodel();
        $cli = $cliente->consultarClienteRuc($request->ruc);

        foreach ($cli as $c) {
            $dato[0] = $c->razonSocial;
            $dato[1] = $c->ruc;
            $dato[2] = $c->telefono;
            $dato[3] = $c->email;
            $dato[4] = $c->direccion;
            $dato[5] = $c->detalle;
        }
        return response()->json($dato);
    }

    public function buscarClienteRaz(Request $request)
    {
        $dato = array();

        $cliente = new clientemodel();
        $cli = $cliente->consultarClienteRazonSocial($request->ruc);

        foreach ($cli as $c) {
            $dato[0] = $c->razonSocial;
            $dato[1] = $c->ruc;
            $dato[2] = $c->telefono;
            $dato[3] = $c->email;
            $dato[4] = $c->direccion;
            $dato[5] = $c->detalle;
        }
        return response()->json($dato);
    }

    public function autocompleteClienteRazonSocial(Request $request)
    {
        $cliente = new clientemodel();
        $cli = $cliente->consultarClientesRazonSocial($request->buscar);

        $data = array();
        foreach ($cli as $c) {
            $data[] = array('value' => $c->razonSocial);
        }
        if (count($data))
            return $data;
        else
            return ['value' => 'No se encuentra'];
    }
}
