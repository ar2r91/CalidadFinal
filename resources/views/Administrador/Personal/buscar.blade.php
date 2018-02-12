@extends('Administrador.Body')
@section('personal')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarPersonal">Agregar Personal</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarPersonal" style="color: #509f0c">Buscar Personal</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3> Buscar Personal</h3></div>
            @if(session()->has('true'))
                <div class="alert alert-success" role="alert">{{session('true')}} </div>
            @endif
            @if(session()->has('false'))
                <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">Datos Personal</div>
                <div class="panel-body">
                    <div class="row">
                        <form name="form" action="{{url('PersonalBuscado')}}" role="Form" method="Get" class="Vertical">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buscar por:</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control " name="select" id="select">
                                            <option>Dni</option>
                                            <option>Apellidos</option>
                                            <option>Codigo personal</option>
                                            <option>Cuenta</option>
                                            <option>Tipo de cuenta</option>
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
                                        <div class="alert alert-success" role="alert">El personal {{$nombre}} fue actualizada!!</div>
                                    @endif
                                    <table width="100%" class="table table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID Personal</th>
                                            <th>DNI</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>E-mail</th>
                                            <th>Codigo Personal</th>
                                            <th>Cuenta</th>
                                            <th>Tipo Cuenta</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($personal))
                                            <!--Contenido-->
                                            @foreach($personal as $p)
                                                <tr>
                                                    <td>{{$p->codPersonal}}</td>
                                                    <td>{{$p->dni}}</td>
                                                    <td>{{$p->nombres}}</td>
                                                    <td>{{$p->apellidos}}</td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->codigoPersonal}}</td>
                                                    <td>{{$p->cuenta}}</td>
                                                    <td>{{$p->tipoCuenta}}</td>
                                                    <td align="center">
                                                        {{ csrf_field() }}
                                                        <a title="Editar" href="PersonalCargar/{{$p->codPersonal}}"><span
                                                                    class="glyphicon glyphicon-pencil"
                                                                    style="color: green;"></span>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a onclick="eliminar(event,'PersonalEliminar/{{$p->codPersonal}}')"
                                                           title="Eliminar"
                                                           href=""><span
                                                                    class="glyphicon glyphicon-trash"
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