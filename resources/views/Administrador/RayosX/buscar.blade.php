@extends('Administrador.Body')
@section('rayosx')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarRayosX">Agregar Equipo Rayos X</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarRayosX" style="color: #509f0c">Buscar Equipo Rayos X</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3> Buscar Equipo Rayos X</h3></div>
            @if(session()->has('true'))
                <div class="alert alert-success" role="alert">{{session('true')}} </div>
            @endif
            @if(session()->has('false'))
                <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">Datos Equipo Rayos X</div>
                <div class="panel-body">
                    <div class="row">
                        <form name="form" action="{{url('RayosXBuscados')}}" role="Form" method="Get" class="Vertical">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buscar por:</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control " name="select" id="select">
                                            <option>Razon Social</option>
                                            <option>Marca</option>
                                            <option>Modelo</option>
                                            <option>Serie</option>
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
                                            <th colspan="3"></th>
                                            <th colspan="3">
                                                <div align="center">Datos del Sistema</div>
                                            </th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Razon Social</th>
                                            <th>Equipo Rayos X</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Serie</th>
                                            <th>Control Calidad</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($rayo))
                                            @foreach($rayo as $r)
                                                <tr>
                                                    <td align="center">{{$r->codRayosX}}</td>
                                                    <td align="center">{{$r->razonSocial}}</td>
                                                    <td align="center">{{$r->equipo}}</td>
                                                    <td align="center">CONSOLA O GENERADOR: {{$r->marcat3}}, TUBO: {{$r->marcat4}}</td>
                                                    <td align="center">CONSOLA O GENERADOR: {{$r->modelot3}}, TUBO: {{$r->modelot4}}</td>
                                                    <td align="center">CONSOLA O GENERADOR: {{$r->seriet3}},
                                                        TUBO: {{$r->seriet4}}</td>
                                                    <td align="center"> @if(isset($r->fecha)){{Carbon\Carbon::parse($r->fecha)->format('d-m-Y')}} @else
                                                            Sin Control de Calidad @endif</td>
                                                    <td align="center">
                                                        {{ csrf_field() }}
                                                        <a title="Editar" href="/RayosXCargar/{{$r->codRayosX}}"><span
                                                                    class="glyphicon glyphicon-pencil"
                                                                    style="color: green;"></span>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a onclick="eliminar(event,'RayosXEliminar/{{$r->codRayosX}}/{{$r->codComponentea}}/{{$r->codComponenteb}}/{{$r->cp1codComponentePadre}}/{{$r->cp2codComponentePadre}}')"
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