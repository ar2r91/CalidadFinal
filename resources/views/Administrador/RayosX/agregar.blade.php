@extends('Administrador.Body')
@section('rayosx')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarRayosX" style="color: #509f0c">Agregar Equipo Rayos X</a>
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
            <div class="panel-heading"><h3> Agregar Equipo Rayos X</h3></div>
            <form name="form" action="{{url('RayosXRegistrado')}}" role="Form" method="POST" class="Horizontal">
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
                            <div class="col-sm-5 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buscar:</span>
                                <select class="form-control " name="select" id="select">
                                    <option value="RUC" selected>RUC</option>
                                    <option value="Razon Social">Razon Social</option>
                                </select>
                                <script>
                                    $("#select").change(function () {
                                        var selected_option = $('#select').val();
                                        if (selected_option === 'RUC') {
                                            $("#druc").hide();
                                            $("#drazonsocial").show();
                                            $("#ruc").prop("required", false);
                                            $("#drazonsocial").prop("required", true);
                                        } else {
                                            if (selected_option === 'Razon Social') {
                                                $("#drazonsocial").hide();
                                                $("#druc").show();
                                                $("#drazonsocial").prop("required", false);
                                                $("#ruc").prop("required", true);
                                            }
                                        }
                                    });
                                </script>
                                <script>
                                    $("#select").change(function () {
                                        var selected_option = $('#select').val();
                                        $('#buscar').autocomplete({
                                            source: function (request, response) {
                                                $.ajax({
                                                    url: "/buscarClienteRZ",
                                                    type: 'get',
                                                    dataType: "json",
                                                    data: {
                                                        buscar: $('#buscar').val()
                                                    },
                                                    success: function (data) {
                                                        if (selected_option === 'Razon Social') {
                                                            response(data);
                                                        }
                                                    }
                                                });
                                            },
                                            min_length: 1
                                        });
                                    });
                                </script>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm">
                                <span class="control-label">&ensp;</span>
                                <input class="form-control" id="buscar" name="buscar"
                                       autocomplete="off" required>
                                <script>
                                    $('#buscar').change(function () {
                                        var selected_option = $('#select').val();
                                        if (selected_option === "RUC") {
                                            $.ajax({
                                                url: "/buscarClienteR",
                                                type: "get",
                                                data: {ruc: $('#buscar').val()},
                                                success: function (data) {
                                                    if (data !== false) {
                                                        $('#razonSocial').val(data[0]);
                                                        $('#ruc').val(data[1]);
                                                        $('#telefono').val(data[2]);
                                                        $('#email').val(data[3]);
                                                        $('#direccion').val(data[4]);
                                                        $('#detalle').val(data[5]);
                                                    }
                                                }
                                            });
                                        }
                                    });
                                </script>
                                <script>
                                    $('#buscar').change(function () {
                                        var selected_option = $('#select').val();
                                        if (selected_option === "Razon Social") {
                                            $.ajax({
                                                url: "/buscarClienteRaz",
                                                type: "get",
                                                data: {ruc: $('#buscar').val()},
                                                success: function (data) {
                                                    if (data !== false) {
                                                        $('#razonSocial').val(data[0]);
                                                        $('#ruc').val(data[1]);
                                                        $('#telefono').val(data[2]);
                                                        $('#email').val(data[3]);
                                                        $('#direccion').val(data[4]);
                                                        $('#detalle').val(data[5]);
                                                    }
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm" id="druc" hidden>
                                <span class="control-label">Ruc:</span>
                                <input class="form-control input-sm" name="ruc" id="ruc"
                                       autocomplete="off" required placeholder="Ejem: Ruc" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm" id="drazonsocial">
                                <span class="control-label">Razon Social</span>
                                <input class="form-control input-sm" name="razonSocial" id="razonSocial"
                                       autocomplete="off" required placeholder="Ejem: Razon Social" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Telefono:</span>
                                <input class="form-control input-sm" name="telefono" id="telefono"
                                       autocomplete="off" required placeholder="Ejem: 123456789" readonly>
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">E-mail:</span>
                                <input class="form-control input-sm" name="email" type="email" id="email"
                                       autocomplete="off" required readonly placeholder="correo@gmail.com">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Direccion:</span>
                                <input class="form-control input-sm" name="direccion" id="direccion"
                                       autocomplete="off" required placeholder="Ejem: Direccion" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Detalle:</span>
                                <textarea class="form-control input-sm" name="detalle" id="detalle"
                                          autocomplete="off" placeholder="Ejm: Detalle" readonly></textarea>
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
                                    <option selected>FIJO</option>
                                    <option>RODANTE</option>
                                    <option>PORTATIL</option>
                                    <option>UNIDAD MOVIL</option>
                                </select>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo 2:</span>
                                <input class="form-control input-sm" name="tipo2"
                                       autocomplete="off" value="Periapical" required id="tipo2" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Equipo:</span>
                                <select class="form-control " name="equipo" id="equipo">
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
                                    <option selected>CONSOLA</option>
                                    <option>GENERADOR</option>
                                    <option>SISTEMA</option>
                                </select>
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Marca:</span>
                                <input class="form-control input-sm" name="marcat3"
                                       autocomplete="off" placeholder="Ejem: Marca" required id="marcat3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Modelo:</span>
                                <input class="form-control input-sm" name="modelot3"
                                       autocomplete="off" placeholder="Ejem: Marca" required id="modelot3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Serie:</span>
                                <input class="form-control input-sm" name="seriet3"
                                       autocomplete="off" placeholder="Ejem: Serie" required
                                       id="seriet3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tension Maxima:</span>
                                <input class="form-control input-sm" name="tensionmaxt3"
                                       autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                       id="tensionmaxt3">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Corriente o Carga Maxima:</span>
                                <input class="form-control input-sm" name="cargamaxt3"
                                       autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                       id="cargamaxt3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Fabricacion:</span>
                                <input class="form-control input-sm" name="fabricaciont3"
                                       autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                       id="fabricaciont3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Instalacion:</span>
                                <input class="form-control input-sm" name="instalaciont3"
                                       autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                       id="instalaciont3">
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
                                       autocomplete="off" value="Tubo" required readonly
                                       id="tipo4">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Marca:</span>
                                <input class="form-control input-sm" name="marcat4"
                                       autocomplete="off" placeholder="Ejem: Marca" required id="marcat4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Modelo:</span>
                                <input class="form-control input-sm" name="modelot4"
                                       autocomplete="off" placeholder="Ejem: Marca" required id="modelot4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Serie:</span>
                                <input class="form-control input-sm" name="seriet4"
                                       autocomplete="off" placeholder="Ejem: Serie" required
                                       id="seriet4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tension Maxima:</span>
                                <input class="form-control input-sm" name="tensionmaxt4"
                                       autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                       id="tensionmaxt4">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Corriente o Carga Maxima:</span>
                                <input class="form-control input-sm" name="cargamaxt4"
                                       autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                       id="cargamaxt4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Fabricacion:</span>
                                <input class="form-control input-sm" name="fabricaciont4"
                                       autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                       id="fabricaciont4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Instalacion:</span>
                                <input class="form-control input-sm" name="instalaciont4"
                                       autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                       id="instalaciont4">
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
        </div>
    </div>
@stop