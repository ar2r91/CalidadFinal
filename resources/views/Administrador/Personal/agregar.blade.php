@extends('Administrador.Body')
@section('personal')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarPersonal" style="color: #509f0c">Agregar Personal</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarPersonal">Buscar Personal</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3> Agregar Personal</h3></div>
            @if(session()->has('true'))
                <div class="alert alert-success" role="alert">{{session('true')}} </div>
            @endif
            @if(session()->has('false'))
                <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
            @endif
            <form name="form" action="{{url('/PersonalRegistrado')}}" role="Form" method="POST" class="Horizontal">
                {{csrf_field()}}
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos Personal</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">DNI:</span>
                                <input class="form-control input-sm" name="dni"
                                       placeholder="Ejm: 12345678" id="dni"
                                       onchange="validarNombre('','')">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Nombres:</span>
                                <input class="form-control input-sm" name="nombres" id="nombres"
                                       autocomplete="off" onchange="validarRUC('','')"
                                       placeholder="Ejm: Jose Luis">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Apellidos:</span>
                                <input class="form-control input-sm" name="apellidos" id="apellidos"
                                       autocomplete="off" onchange="validarNumeros('','')"
                                       placeholder="Ejm: Sagastegui Lescano">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">E-mail:</span>
                                <input class="form-control input-sm" name="correo" type="email" id="correo"
                                       placeholder="correo@gmail.com"
                                       autocomplete="off" onchange="validarCorreo('','')" required>
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel  panel-primary">
                    <div class="panel-heading">Datos Usuario</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Codigo Personal:</span>
                                <input class="form-control input-sm" name="codigoPersonal"
                                       placeholder="Ejm: 1" id="codigoPersonal"
                                       onchange="validarNombre('','')">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Cuenta:</span>
                                <input class="form-control input-sm" name="cuenta" id="cuenta"
                                       autocomplete="off" onchange="validarRUC('','')"
                                       placeholder="Ejm: usuario">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Contraseña:</span>
                                <input class="form-control input-sm" name="password" id="password" type="password"
                                       autocomplete="off" onchange="validarNumeros('','')" placeholder="*****">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Repita contraseña:</span>
                                <input class="form-control input-sm" name="password2" id="password2"
                                       autocomplete="off" onchange="validarNumeros('','')"
                                       type="password" placeholder="*****">
                                <span style="color: red" class=" control-label" id=""> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 row form-group" align="center">
                    <span id="mensaje" class="control-label" style="color: red"></span>
                </div>
                <div class="row">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-4">
                        <a href="{{url('/body')}}" class=" col-md-6 btn btn-sm btn-danger"><span
                                    class="glyphicon glyphicon-ban-circle"></span>
                            Regresar
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <button id="enviar"
                                name="enviar" class="col-md-6 btn btn-sm btn-success"><span
                                    class="glyphicon glyphicon-ok"></span> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop