@extends('Administrador.Body')
@section('medicion')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarMedicion">Agregar Equipo Medicion</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarMedicion">Buscar Equipo Medicion</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3>Editar Equipo Medicion</h3></div>
            @if($medicion)
                @foreach($medicion as $m)
                    <form name="form" action="{{ url('MedicionEditado/' .$m->codEquipoMedicion)}}" role="Form"
                          class="Horizontal">
                        {{csrf_field()}}
                        @if(session()->has('true'))
                            <div class="alert alert-success" role="alert">{{session('true')}} </div>
                        @endif
                        @if(session()->has('false'))
                            <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
                        @endif
                        <div class="panel  panel-primary">
                            <div class="panel-heading">Datos de la Maquina de Medicion</div>
                            <div class="panel-body">
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        Tipo:
                                        <select class="form-control " name="tipo" id="tipo">
                                            <option selected disabled>{{$m->tipo}}</option>
                                            <option>Detector de Radiación</option>
                                            <option>Cámara de Ionización</option>
                                            <option>Electrómetro</option>
                                            <option>Monitor de Radiación</option>
                                            <option>Fantoma</option>
                                            <option>Patron de Resolucion</option>
                                            <option>Equipo para pruebas geometricas</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Marca:</span>
                                        <input class="form-control input-sm" name="marca" id="marca"
                                               autocomplete="off" onchange="validarNombre('','')"
                                               required placeholder="Ejem: Marca" value="{{$m->marca}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Modelo:</span>
                                        <input class="form-control input-sm" name="modelo" id="modelo"
                                               autocomplete="off" onchange="validarNumeros('','')"
                                               required placeholder="Ejem: Modelo" value="{{$m->modelo}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Serie:</span>
                                        <input class="form-control input-sm" name="serie" id="serie"
                                               autocomplete="off" required placeholder="Ejem: Serie"
                                               value="{{$m->serie}}">
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Fecha de Calibracion:</span>
                                        <input class="form-control input-sm" id="datepicker"
                                               autocomplete="off" required name="fecha" value="{{$m->fecha}}">
                                        <script>
                                            $(function () {
                                                $("#datepicker").datepicker();
                                            });
                                        </script>
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
                @endforeach
            @endif
        </div>
    </div>
@stop