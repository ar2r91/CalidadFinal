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
                        <a href="/admBuscarRayosX">Buscar Equipo Rayos X</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3> Editar Equipo Rayos X</h3></div>
            @if($rayosx)
                @foreach($rayosx as $r)
                    <form name="form"
                          action="{{ url('/RayosXEditado/' .$r->codRayosX.'/'.$r->codCliente.'/'.$r->codComponentea.'/'.$r->codComponenteb.'/'.$r->cp1codComponentePadre.'/'.$r->cp2codComponentePadre)}}"
                          role="Form"
                          method="Get"
                          class="Horizontal">
                        {{csrf_field()}}
                        @if(session()->has('true'))
                            <div class="alert alert-success" role="alert">{{session('true')}} </div>
                        @endif
                        @if(session()->has('false'))
                            <div class="alert alert-danger" role="alert">{{session('false')}}  </div>
                        @endif
                        <div class="panel  panel-primary">
                            <div class="panel-heading">Datos del Cliente</div>
                            <div class="panel-body">
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm" id="druc" hidden>
                                        <span class="control-label">Ruc:</span>
                                        <input class="form-control input-sm" name="ruc" id="ruc"
                                               autocomplete="off" required placeholder="Ejem: Ruc" readonly
                                               value="{{$r->ruc}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm" id="drazonsocial">
                                        <span class="control-label">Razon Social</span>
                                        <input class="form-control input-sm" name="razonSocial" id="razonSocial"
                                               autocomplete="off" required placeholder="Ejem: Razon Social" readonly
                                               value="{{$r->razonSocial}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Telefono:</span>
                                        <input class="form-control input-sm" name="telefono" id="telefono"
                                               autocomplete="off" required placeholder="Ejem: 123456789" readonly
                                               value="{{$r->telefono}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">E-mail:</span>
                                        <input class="form-control input-sm" name="email" type="email" id="email"
                                               autocomplete="off" required readonly placeholder="correo@gmail.com"
                                               value="{{$r->email}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Direccion:</span>
                                        <input class="form-control input-sm" name="direccion" id="direccion"
                                               autocomplete="off" required placeholder="Ejem: Direccion" readonly
                                               value="{{$r->direccion}}">
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Detalle:</span>
                                        <textarea class="form-control input-sm" name="detalle" id="detalle"
                                                  autocomplete="off" placeholder="Ejm: Detalle"
                                                  readonly>{{$r->razonSocial}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel  panel-primary">
                            <div class="panel-heading">Equipo de Rayos X</div>
                            <div class="panel-body">
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Tipo 1:</span>
                                        <select class="form-control " name="tipo1" id="tipo1">
                                            <option selected readonly="{{$r->tipo1}}">{{$r->tipo1}}</option>
                                            <option>FIJO</option>
                                            <option>RODANTE</option>
                                            <option>PORTATIL</option>
                                            <option>UNIDAD MOVIL</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Tipo 2:</span>
                                        <input class="form-control input-sm" name="tipo2"
                                               autocomplete="off" value="{{$r->tipo2}}" required id="tipo2" readonly>
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Equipo:</span>
                                        <select class="form-control " name="equipo" id="equipo">
                                            <option selected readonly="{{$r->equipo}}">{{$r->equipo}}</option>
                                            <option>Intraoral</option>
                                            <option>Panoramico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel  panel-primary">
                            <div class="panel-heading">CONSOLA O GENERADOR</div>
                            <div class="panel-body">
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        Tipo 3:
                                        <select class="form-control" name="tipo3">
                                            <option selected readonly="{{$r->tipo3}}">{{$r->tipo3}}</option>
                                            <option>CONSOLA</option>
                                            <option>GENERADOR</option>
                                            <option>SISTEMA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Marca:</span>
                                        <input class="form-control input-sm" name="marcat3"
                                               autocomplete="off" placeholder="Ejem: Marca" required id="marcat3"
                                               value="{{$r->marcat3}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Modelo:</span>
                                        <input class="form-control input-sm" name="modelot3"
                                               autocomplete="off" placeholder="Ejem: Marca" required id="modelot3"
                                               value="{{$r->modelot3}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Serie:</span>
                                        <input class="form-control input-sm" name="seriet3"
                                               autocomplete="off" placeholder="Ejem: Serie" required
                                               id="seriet3" value="{{$r->seriet3}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Tension Maxima:</span>
                                        <input class="form-control input-sm" name="tensionmaxt3"
                                               autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                               id="tensionmaxt3" value="{{$r->tensionmaxt3}}">
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Corriente o Carga Maxima:</span>
                                        <input class="form-control input-sm" name="cargamaxt3"
                                               autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                               id="cargamaxt3" value="{{$r->cargamaxt3}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Año de Fabricacion:</span>
                                        <input class="form-control input-sm" name="fabricaciont3"
                                               autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                               id="fabricaciont3" value="{{$r->fabricaciont3}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Año de Instalacion:</span>
                                        <input class="form-control input-sm" name="instalaciont3"
                                               autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                               id="instalaciont3" value="{{$r->instalaciont3}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel  panel-primary">
                            <div class="panel-heading">TUBO</div>
                            <div class="panel-body">
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Tipo 4</span>
                                        <input class="form-control input-sm" name="tipo4"
                                               autocomplete="off" value="{{$r->tipo4}}" required readonly
                                               id="tipo4">
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Marca:</span>
                                        <input class="form-control input-sm" name="marcat4"
                                               autocomplete="off" placeholder="Ejem: Marca" required id="marcat4"
                                               value="{{$r->marcat4}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Modelo:</span>
                                        <input class="form-control input-sm" name="modelot4"
                                               autocomplete="off" placeholder="Ejem: Marca" required id="modelot4"
                                               value="{{$r->modelot4}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Serie:</span>
                                        <input class="form-control input-sm" name="seriet4"
                                               autocomplete="off" placeholder="Ejem: Serie" required
                                               id="seriet4" value="{{$r->seriet4}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Tension Maxima:</span>
                                        <input class="form-control input-sm" name="tensionmaxt4"
                                               autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                               id="tensionmaxt4" value="{{$r->tensionmaxt4}}">
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Corriente o Carga Maxima:</span>
                                        <input class="form-control input-sm" name="cargamaxt4"
                                               autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                               id="cargamaxt4" value="{{$r->cargamaxt4}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Año de Fabricacion:</span>
                                        <input class="form-control input-sm" name="fabricaciont4"
                                               autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                               id="fabricaciont4" value="{{$r->fabricaciont4}}">
                                    </div>
                                    <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                        <span class="control-label">Año de Instalacion:</span>
                                        <input class="form-control input-sm" name="instalaciont4"
                                               autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                               id="instalaciont4" value="{{$r->instalaciont4}}">
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
                        <br>
                    </form>
                @endforeach
            @endif
        </div>
    </div>
@stop