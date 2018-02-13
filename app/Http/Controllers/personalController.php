<?php

namespace App\Http\Controllers;

use App\personalmodel;
use App\personamodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class personalController extends Controller
{
    //Registrar datos del personal
    public function registrarPersonal(Request $request)
    {
        $personal = new personalmodel();
        $personal->setDni($request->dni);
        $personal->setNombres($request->nombres);
        $personal->setApellidos($request->apellidos);
        $personal->setCuenta($request->cuenta);
        $personal->setPassword($request->password);
        $personal->setTipoCuenta('Administrador');
        $personal->setCodigoPersonal($request->codigoPersonal);
        $personal->setCorreo($request->correo);
        $p = $personal->savepersonal();//SQL, insertar datos del personal

        if ($p == true) {
            return back()->with('true', 'Personal ' . $request->nombres . ' guardada con exito')->withInput();
        } else {
            return back()->with('false', 'Personal ' . $request->nombres . ' no guardada, puede que ya exista');
        }
    }

    //Modificar los datos del persnal
    public function editarPersonal($codPersonal, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');
        $personal = new personalmodel();
        $personal->setDni($request->dni);
        $personal->setNombres($request->nombres);
        $personal->setApellidos($request->apellidos);
        $personal->setCuenta($request->cuenta);
        $personal->setPassword($request->password);
        $personal->setTipoCuenta('Administrador');
        $personal->setCodigoPersonal($request->codigoPersonal);
        $personal->setCorreo($request->correo);
        $p = $personal->editarPersonal($codPersonal);//SQL, actualizar los datos del personal
        if ($valueA == 'Administrador') {
            if ($p == true) {
                return redirect('/admBuscarPersonal')->with('true', 'Personal ' . $request->nombres . ' fue editado con exito');
            } else {
                return redirect('/admBuscarPersonal')->with('false', 'Personal ' . $request->nombres . ' no fue editado con exito');
            }
        }
    }

    //Eliminar (cambiar estado de 1 a 0) el registro del personal
    public function eliminarPersonal($codPersonal, Request $request)
    {
        $valueA = Session::get('tipoCuentaA');
        $personal = new personalmodel();
        $p = $personal->eliminarPersonal($codPersonal);//SQL, eliminar registro del personal
        if ($valueA == 'Administrador') {
            if ($p == true) {
                return redirect('/admBuscarPersonal')->with('true', 'Personal ' . $request->nombres . 'fue elimino con exito');
            } else {
                return redirect('/admBuscarPersonal')->with('false', 'Personal ' . $request->nombres . 'no fue elimino con exito');
            }
        }
    }

    //Obtener los datos del personal
    public function cargarPersonal($codPersonal)
    {
        $personal = new personalmodel();
        $pers = $personal->consultarPersonalid($codPersonal);//SQL, obtener datos del personal por su id de persona
        return view('Administrador/Personal/editar')->with(['personal' => $pers]);
    }

    //Inciciar session del personal
    public function loguearPersonal(Request $request)
    {
        $personal = new personalmodel();
        $personal->setCuenta($request->cuenta);
        $personal->setPassword($request->password);
        $person = $personal->logear();//SQL, obtener datos del personal
        $codPersonal = null;

        foreach ($person as $per) {
            $personal->setCuenta($per->cuenta);
            $personal->setPassword($per->password);
            $personal->setTipoCuenta($per->tipoCuenta);
            $personal->setNombres($per->nombres);
            $personal->setApellidos($per->apellidos);
            $codPersonal = $per->codPersonal;
            Session::put('codPersonal', $per->codPersonal);//crear session del codigo del personal
        }
        Session::put(['misession' => $personal->getNombres() . ' ' . $personal->getApellidos()]);//crear sesion del personal (nombres y apellidos0
        Session::put('personalC', $personal->getCuenta());//crear sesion del personal (nombre de usuario)
        Session::put('idpersonal', $codPersonal);//crear sesion del id del personal

        if ($personal->getTipoCuenta() == 'Administrador') {//Crear session del tipo de cuenta para el administrador
            Session::put('tipoCuentaA', $personal->getTipoCuenta());
        } else {//Crear session del tipo de cuenta para ventanilla
            Session::put('tipoCuentaA', null);
        }
        //Redireccion a vista dependiendo del tipo de cuenta
        if ($personal->getTipoCuenta() == 'Administrador' && $personal->getCuenta() != '') {
            return view('Administrador/Body');
        } else {
            return back()->with('false', 'Cuenta ' . $personal->getCuenta() . ' no encontrada o contraseña incorrecta')->withInput();
        }
    }

    //Cerrar sesion del personal
    public function logOutPersonal()
    {
        Session::flush();
        return redirect()->route('index');
    }

    //Buscar personal
    public function listarPersonal(Request $request)
    {
        $valueA = Session::get('tipoCuentaA');
        $pers = null;
        $personal = new personalmodel();

        if ($request->select == 'Dni') {
            $pers = $personal->consultarPersonalDNI($request->text);//SQL, buscar personal por dni
        } else {
            if ($request->select == 'Apellidos') {
                $pers = $personal->consultarPersonalApellidos($request->text);//SQL, buscar personal por apellidos
            } else {
                if ($request->select == 'Codigo personal') {
                    $pers = $personal->consultarPersonalCodigo($request->text);//SQL, buscar personal por codigo de personal
                } else {
                    if ($request->select == 'Cuenta') {
                        $pers = $personal->consultarPersonalCuenta($request->text);//SQL, buscar personal por cuenta
                    } else {
                        if ($request->select == 'Tipo de cuenta') {
                            $pers = $personal->consultaPersonalTipoCuenta($request->text);//SQL, buscar personal por tipo de cuenta
                        }
                    }
                }
            }
        }
        if ($valueA == 'Administrador')
            return view('Administrador/Personal/buscar')->with(['personal' => $pers, 'buscar' => $request->text, 'select' => $request->select]);
    }
}