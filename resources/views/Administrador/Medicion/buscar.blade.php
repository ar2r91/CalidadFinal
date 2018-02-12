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
                        <a href="/admBuscarMedicion" style="color: #509f0c">Buscar Equipo Medicion</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3>Buscar Equipo Medicion</h3></div>
            @if(session()->has('true'))
                <div class="alert alert-success" role="alert">{{session('true')}} </div>
            @endif
            @if(session()->has('false'))
                <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">Datos Equipo Medicion</div>
                <div class="panel-body">
                    <div class="row">
                        <form name="form" action="{{url('MedicionBuscada')}}" role="Form" method="Get" class="Vertical">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buscar por:</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="select" id="select">
                                            <option>Codigo</option>
                                            <option>Tipo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5 col-lg-5 form-group-sm ">
                                <span class="control-label"> Ingresa datos aqui</span>
                                <span class="input-group-btn">
                            <input name="text" id="text" class="form-control"
                                   autocomplete="off" required>
                            </span>
                                <span class="input-group-btn">
                            <button class="btn btn-sm" id="buscar" name="buscar">Buscar</button>
                        </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if(isset($nombre)!=null)
                                        <div class="alert alert-success" role="alert">El personal {{$nombre}} fue
                                            actualizada!!
                                        </div>
                                    @endif
                                    <table width="100%" class="table table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID Equipo Medicion</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Serie</th>
                                            <th>Fecha Calibracion</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($medicion))
                                            <!--Contenido-->
                                            @foreach($medicion as $m)
                                                <tr>
                                                    <td>{{$m->codEquipoMedicion}}</td>
                                                    <td>{{$m->tipo}}</td>
                                                    <td>{{$m->marca}}</td>
                                                    <td>{{$m->modelo}}</td>
                                                    <td>{{$m->serie}}</td>
                                                    <td>{{Carbon\Carbon::parse($m->fecha)->format('d-m-Y')}}</td>
                                                    <td align="center">
                                                        {{ csrf_field() }}
                                                        <a title="Editar"
                                                           href="MedicionCargar/{{$m->codEquipoMedicion}}"><span
                                                                    class="glyphicon glyphicon-pencil"
                                                                    style="color: green;"></span>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a onclick="eliminar(event,'MedicionEliminar/{{$m->codEquipoMedicion}}')"
                                                           title="Eliminar"
                                                           href=""><span class="glyphicon glyphicon-trash"
                                                                         style="color: red;"></span> </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop