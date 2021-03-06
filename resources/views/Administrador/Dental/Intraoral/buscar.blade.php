@extends('Administrador.Body')
@section('intraoral')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarIntraoral">Agregar Intraoral</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarIntraoral" style="color: #509f0c">Buscar Intraoral</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3>Buscar Dental-Intraoral</h3></div>
            @if(session()->has('true'))
                <div class="alert alert-success" role="alert">{{session('true')}} </div>
            @endif
            @if(session()->has('false'))
                <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">Datos Dental-Intraoral</div>
                <div class="panel-body">
                    <div class="row">
                        <form name="form" action="{{url('IntraoralBuscado')}}" role="Form" method="Get"
                              class="Vertical">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buscar por:</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="select" id="select">
                                            <option>RUC</option>
                                            <option>Razon Social</option>
                                            <option>Codigo Cliente</option>
                                            <option>Codigo Registro</option>
                                            <option>Codigo Rayos X</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5 col-lg-5 form-group-sm ">
                                <span class="control-label"> Ingresa datos aqui</span>
                                <span class="input-group-btn">
                            <input name="text" id="text" class="form-control"
                                   autocomplete="off">
                            </span>
                                <span class="input-group-btn">
                            <button class="btn btn-sm" id="buscar">Buscar</button>
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
                                    <table width="100%" class="table table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Codigo Registro</th>
                                            <th>Fecha</th>
                                            <th>Codigo Equipo Rayos X</th>
                                            <th>Codigo Equipo Medicion</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($intraoral))
                                            @foreach($intraoral as $i)
                                                <tr>
                                                    <td>{{$i->ruc}}</td>
                                                    <td>{{$i->razonSocial}}</td>
                                                    <td>{{$i->codIntraoral}}</td>
                                                    <td>{{Carbon\Carbon::parse($i->fecha)->format('d-m-Y')}}</td>
                                                    <td>{{$i->codRayosX}}</td>
                                                    <td>{{$i->codEquipoMedicion}}</td>
                                                    <td align="center">
                                                        {{ csrf_field() }}
                                                        <a title="Reporte"
                                                           href="/IntraoralReportePDF/{{$i->codIntraoral}}"><span
                                                                    class="fa fa-file-pdf-o"
                                                                    style="color: red;">R</span>
                                                        </a>
                                                        @if($i->certificado==1)
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a title="Cetificado"
                                                               href="/IntraoralCertificadoPDF/{{$i->codIntraoral}}"><span
                                                                        class="fa fa-file-pdf-o"
                                                                        style="color: green;">C</span>
                                                            </a>
                                                        @endif
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a onclick="eliminar(event,'IntraoralEliminar/{{$i->codParamGeometricos}}/{{$i->codCalidadHaz}}/{{$i->codTiempoExposicion}}/{{$i->codRendimiento}}/{{$i->codDosisPaciente}}/{{$i->codIntraoral}}')"
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