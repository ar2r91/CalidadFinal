@extends('Administrador.Body')
@section('cliente')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarCliente" style="color: #509f0c">Agregar Cliente</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarCliente">Buscar Cliente</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3>Agregar Cliente</h3></div>
            <form name="form" action="{{url('ClienteRegistrado')}}" role="Form" method="POST" class="Horizontal">
                {{csrf_field()}}
                @if(session()->has('true'))
                    <div class="alert alert-success" role="alert">{{session('true')}} </div>
                @endif
                @if(session()->has('false'))
                    <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
                @endif
                <div class="panel  panel-primary">
                    <div class="panel-heading">Datos cliente</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Razon social:</span>
                                <input class="form-control input-sm" name="razonSocial"
                                       placeholder="Ejm: PRICEWATERHOUSE" id="razonSocial"
                                       onchange="validarNombre('razonSocial','spanrazon')">
                                <span style="color: red" class=" control-label" id="spanrazon"> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Ruc:</span>
                                <input class="form-control input-sm" name="ruc" type="text" id="ruc"
                                       autocomplete="off" onchange="validarRUC('ruc','spanruc')"
                                       placeholder="Ejm: 0729787548">
                                <span style="color: red" class=" control-label" id="spanruc"> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Telefono:</span>
                                <input class="form-control input-sm" name="telefono" type="text" id="telefono"
                                       autocomplete="off" onchange="validarNumeros('telefono','spantelefono')"
                                       placeholder="Ejm: 987654321">
                                <span style="color: red" class=" control-label" id="spanruc"> </span>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">E-mail:</span>
                                <input class="form-control input-sm" name="email" type="email" id="email"
                                       placeholder="correo@gmail.com"
                                       autocomplete="off" onchange="validarCorreo('email','spanemail')" required>
                                <span style="color: red" class=" control-label" id="spanemail"> </span>
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Direccion:</span>
                                <input class="form-control input-sm" name="direccion" type="text" id="direccion"
                                       autocomplete="off" placeholder="Ejm: 0729787548">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Detalle:</span>
                                <textarea class="form-control input-sm" name="detalle" id="detalle"
                                          autocomplete="off" placeholder="Ejm: Detalle"></textarea>
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