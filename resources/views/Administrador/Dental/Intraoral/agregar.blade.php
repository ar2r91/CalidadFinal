@extends('Administrador.Body')
@section('intraoral')
    <div class="collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-plus"></span>
                        <a href="/admRegistrarIntraoral" style="color: #509f0c">Agregar Intraoral</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-search"></span>
                        <a href="/admBuscarIntraoral">Buscar Intraoral</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="panel-heading"><h3>Agregar Dental-Intraoral</h3></div>
            <form name="form" action="{{url('RegistrarIntraoral')}}" role="Form" method="POST" class="Horizontal">
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
                <div class="panel panel-primary">
                    <div class="panel-heading">UBICACION</div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Ubicacion de la Instalacion:</span>
                                <input class="form-control input-sm" name="ubicacion"
                                       autocomplete="off" placeholder="Ejem: Ubicacion" required id="ubicacion">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">DATOS DEL EQUIPO DE RAYOS X</div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <a href="#" class="btn btn-primary" data-toggle="modal" onclick="listar()" id="equiporx"
                                   data-target="#myModal">Buscar</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Codigo:</span>
                                <input class="form-control input-sm" name="codigo"
                                       autocomplete="off" placeholder="#" required id="codigo" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo 1:</span>
                                <input class="form-control input-sm" name="tipo1"
                                       autocomplete="off" placeholder="Fijo" required id="tipo1" readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo 2:</span>
                                <input class="form-control input-sm" name="tipo2" placeholder="Tipo 2"
                                       autocomplete="off" required id="tipo2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo 3:</span>
                                <input class="form-control input-sm" name="tipo3"
                                       autocomplete="off" placeholder="Ejem: Consola" required id="tipo3" readonly>
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Marca:</span>
                                <input class="form-control input-sm" name="marcat3" readonly
                                       autocomplete="off" placeholder="Ejem: Marca" required id="marcat3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Modelo:</span>
                                <input class="form-control input-sm" name="modelot3" readonly
                                       autocomplete="off" placeholder="Ejem: Marca" required id="modelot3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Serie:</span>
                                <input class="form-control input-sm" name="seriet3" readonly
                                       autocomplete="off" placeholder="Ejem: Serie" required
                                       id="seriet3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tension Maxima:</span>
                                <input class="form-control input-sm" name="tensionmaxt3" readonly
                                       autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                       id="tensionmaxt3">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Corriente o Carga Maxima:</span>
                                <input class="form-control input-sm" name="cargamaxt3" readonly
                                       autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                       id="cargamaxt3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Fabricacion:</span>
                                <input class="form-control input-sm" name="fabricaciont3" readonly
                                       autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                       id="fabricaciont3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Instalacion:</span>
                                <input class="form-control input-sm" name="instalaciont3" readonly
                                       autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                       id="instalaciont3">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo 4</span>
                                <input class="form-control input-sm" name="tipo4" placeholder="Tubo"
                                       autocomplete="off" required readonly id="tipo4">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Marca:</span>
                                <input class="form-control input-sm" name="marcat4" readonly
                                       autocomplete="off" placeholder="Ejem: Marca" required id="marcat4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Modelo:</span>
                                <input class="form-control input-sm" name="modelot4" readonly
                                       autocomplete="off" placeholder="Ejem: Marca" required id="modelot4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Serie:</span>
                                <input class="form-control input-sm" name="seriet4" readonly
                                       autocomplete="off" placeholder="Ejem: Serie" required
                                       id="seriet4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tension Maxima:</span>
                                <input class="form-control input-sm" name="tensionmaxt4" readonly
                                       autocomplete="off" placeholder="Ejem: Tension Maxima" required
                                       id="tensionmaxt4">
                            </div>
                        </div>
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Corriente o Carga Maxima:</span>
                                <input class="form-control input-sm" name="cargamaxt4" readonly
                                       autocomplete="off" placeholder="Ejem: Corriente o Carga Maxima" required
                                       id="cargamaxt4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Fabricacion:</span>
                                <input class="form-control input-sm" name="fabricaciont4" readonly
                                       autocomplete="off" placeholder="Ejem: Año de Fabricacion" required
                                       id="fabricaciont4">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Año de Instalacion:</span>
                                <input class="form-control input-sm" name="instalaciont4" readonly
                                       autocomplete="off" placeholder="Ejem: Año de Instalacion" required
                                       id="instalaciont4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">DATOS DEL EQUIPO DE MEDICION</div>
                    <div class="panel-body">
                        <div class=" row ">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <a href="#" class="btn btn-primary" data-toggle="modal" onclick="listarM()"
                                   id="equiporx"
                                   data-target="#myModal2">Buscar</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Serie:</span>
                                <input class="form-control input-sm" name="serie" readonly
                                       autocomplete="off" placeholder="Ejem: Serie" required id="serie">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tipo:</span>
                                <input class="form-control input-sm" name="tipo" readonly
                                       autocomplete="off" placeholder="Ejem: Electrometro" required id="tipo">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Marca:</span>
                                <input class="form-control input-sm" name="marca" readonly
                                       autocomplete="off" placeholder="Ejem: Marca" required id="marca">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Modelo:</span>
                                <input class="form-control input-sm" name="modelo" readonly
                                       autocomplete="off" placeholder="Ejem: Modelo" required id="modelo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Fecha:</span>
                                <input name="fechacalibracion" class="form-control input-sm"
                                       id="fechacalibracion"
                                       required placeholder="aaaa/mm/dd" readonly>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#serie').change(function () {
                            $.ajax({
                                url: "/buscarMaquinaMedicion",
                                type: "get",
                                data: {serie: $('#serie').val()},
                                success: function (data) {
                                    if (data !== false) {
                                        $('#tipo').val(data[2]);
                                        $('#marca').val(data[3]);
                                        $('#modelo').val(data[4]);
                                        $('#fechacalibracion').val(data[5]);
                                    }
                                }
                            });
                        });
                    </script>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">RESULTADOS</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Estabilidad Mecánica:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="estabilidadmecanica"
                                                id="estabilidadmecanica">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Movimientos Adecuados del Equipo:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="movimientoequipo" id="movimientoequipo">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Buen Estado de los Cables:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="estadocables" id="estadocables">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">BGantry gira libremente:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="grantygira" id="grantygira">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Indicadores de posición operativos:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="indicadoresoperativos"
                                                id="indicadoresoperativos">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Aire acondicionado en el ambiente:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="aireacondicionado"
                                                id="aireacondicionado">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Sistema audible comunicación claro:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="sistemaaudible" id="sistemaaudible">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Manual del equipo accesible:</span>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <select class="form-control " name="manualequipo" id="manualequipo">
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">PARAMETROS GEOMETRICOS</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Tamaño del campo</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tamanio"
                                       autocomplete="off" placeholder="Tamaño (cm)" required id="tamanio">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptablet"
                                       autocomplete="off" placeholder="Si/No" required id="valoraceptablet"
                                       readonly>
                            </div>
                            <script>
                                $('#tamanio').change(function () {
                                    if ($('#tamanio').val() <= 6) {
                                        $('#valoraceptablet').val('SI');
                                    }
                                    else {
                                        $('#valoraceptablet').val('NO');
                                    }
                                    if ($('#tamanio').val() === '') {
                                        $('#valoraceptablet').val('');
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Mínima distancia Foco-piel:</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="distancia"
                                       autocomplete="off" placeholder="Distancia (cm)" required id="distancia">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptabled"
                                       autocomplete="off" placeholder="Si/No" required id="valoraceptabled"
                                       readonly>
                            </div>
                            <script>
                                $('#distancia').change(function () {
                                    if ($('#distancia').val() >= 20) {
                                        $('#valoraceptabled').val('SI');
                                    }
                                    else {
                                        $('#valoraceptabled').val('NO');
                                    }
                                    if ($('#distancia').val() === '') {
                                        $('#valoraceptabled').val('');
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">CALIDAD DEL HAZ</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Exactitud de la Tensión</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tensionnominal"
                                       autocomplete="off" placeholder="T. Nominal (kV)" required
                                       id="tensionnominal">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tensionmedia"
                                       autocomplete="off" placeholder="T. Medido (kV)" required id="tensionmedia">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultadotn" readonly
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultadotn">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptabletn" required
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" id="valoraceptabletn"
                                       readonly>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#tensionnominal,#tensionmedia').change(function () {
                            var v1 = $('#tensionnominal').val();
                            var v2 = $('#tensionmedia').val();
                            var r = ((Math.abs(v1 - v2) / v1)) * 100;
                            $('#resultadotn').val(r.toFixed(2));
                            if (r < 10) {
                                $('#valoraceptabletn').val('SI');
                            }
                            else {
                                $('#valoraceptabletn').val('NO');
                            }
                            if ($('#tensionnominal').val() === '' && $('#tensionmedia').val() === '') {
                                $('#resultadotn').val('');
                                $('#valoraceptabletn').val('');
                            }
                        });
                    </script>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Repetibilidad de la Tensión</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tension1"
                                       autocomplete="off" placeholder="T1 (kV)" required id="tension1">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tension2"
                                       autocomplete="off" placeholder="TT2 (kV)" required id="tension2">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tension3"
                                       autocomplete="off" placeholder="T3 (kV)" required id="tension3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultadot"
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultadot"
                                       readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptabletns"
                                       autocomplete="off" placeholder="¿Aceptable?: SI/NO" required
                                       id="valoraceptabletns" readonly>
                            </div>
                        </div>
                        <script>
                            $('#tension1,#tension2,#tension3').change(function () {
                                var v1 = $('#tension1').val();
                                var v2 = $('#tension2').val();
                                var v3 = $('#tension3').val();
                                var r1 = (parseFloat(v1) + parseFloat(v2) + parseFloat(v3)) / 3;
                                var p1 = ((Math.sqrt((Math.pow((v1 - r1), 2) + Math.pow((v2 - r1), 2) + Math.pow((v3 - r1), 2)) / 3)) / r1) * 100;
                                $('#resultadot').val(p1.toFixed(2));
                                if (p1 < 10) {
                                    $('#valoraceptabletns').val('SI');
                                } else {
                                    $('#valoraceptabletns').val('NO');
                                }
                                if ($('#tension1').val() === '' && $('#tension2').val() === '' && $('#tension3').val() === '') {
                                    $('#resultadot').val('');
                                    $('#valoraceptabletns').val('');
                                }
                            });
                        </script>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Filtracion</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="filtracion"
                                       autocomplete="off" placeholder="Filtración (mm Al)" required id="filtracion">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tensionf"
                                       autocomplete="off" placeholder="Tensión (kV)" required id="tensionf">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptablef" required
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" id="valoraceptablef"
                                       READONLY>
                            </div>
                        </div>
                        <script>
                            $('#filtracion,#tensionf').change(function () {
                                var v1 = $('#filtracion').val();
                                var v2 = $('#tensionf').val();
                                if (v1 >= 2.5 && v2 > 70) {
                                    $('#valoraceptablef').val('SI');
                                }
                                else {
                                    if (v1 >= 1.5 && v2 <= 70) {
                                        $('#valoraceptablef').val('SI');
                                    }
                                    else {
                                        $('#valoraceptablef').val('NO');
                                    }
                                }
                                if (v1 === '' && v2 === '') {
                                    $('#valoraceptablef').val('');
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">TIEMPO DE EXPOSICION</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Exactitud tiempo(tiempos>100ms)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tiemponominal"
                                       autocomplete="off" placeholder="T. Nominal (ms)" required id="tiemponominal">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tiempomedio"
                                       autocomplete="off" placeholder="T. Medido (ms)" required id="tiempomedio">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultadoti"
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultadoti"
                                       readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptableti" required
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" id="valoraceptableti"
                                       readonly>
                            </div>
                        </div>
                        <script>
                            $('#tiemponominal,#tiempomedio').change(function () {
                                var v1 = $('#tiemponominal').val();
                                var v2 = $('#tiempomedio').val();
                                var r = ((Math.abs(v1 - v2) / v1)) * 100;
                                $('#resultadoti').val(r.toFixed(2));
                                if (v1 > 100 && r <= 20) {
                                    $('#valoraceptableti').val('SI');
                                }
                                else {
                                    $('#valoraceptableti').val('NO');
                                }
                                if ($('#tiemponominal').val() === '' && $('#tiempomedio').val() === '') {
                                    $('#resultadoti').val('');
                                    $('#valoraceptableti').val('');
                                }
                            });
                        </script>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Repetibilidad tiempo exposición</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tiempo1"
                                       autocomplete="off" placeholder="t1 (ms)" required id="tiempo1">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tiempo2"
                                       autocomplete="off" placeholder="t2 (ms)" required id="tiempo2">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="tiempo3"
                                       autocomplete="off" placeholder="t3 (ms)" required id="tiempo3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultadotie"
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultadotie"
                                       readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptabletie"
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" required
                                       id="valoraceptabletie" readonly>
                            </div>
                        </div>
                        <script>
                            $('#tiempo1,#tiempo2,#tiempo3').change(function () {
                                var v1 = $('#tiempo1').val();
                                var v2 = $('#tiempo2').val();
                                var v3 = $('#tiempo3').val();
                                var r1 = (parseFloat(v1) + parseFloat(v2) + parseFloat(v3)) / 3;
                                var p1 = ((Math.sqrt((Math.pow((v1 - r1), 2) + Math.pow((v2 - r1), 2) + Math.pow((v3 - r1), 2)) / 3)) / r1) * 100;
                                $('#resultadotie').val(p1.toFixed(2));
                                if (p1 <= 10) {
                                    $('#valoraceptabletie').val('SI');
                                } else {
                                    $('#valoraceptabletie').val('NO');
                                }
                                if ($('#tiempo1').val() === '' && $('#tiempo2').val() === '' && $('#tiempo3').val() === '') {
                                    $('#resultadotie').val('');
                                    $('#valoraceptabletie').val('');
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">RENDIMIENTO (para equipos entre 60-70kV)</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Repetibilidad del Rendimiento</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosisr1"
                                       autocomplete="off" placeholder="Dosis 1 (µGy)" required id="dosisr1">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosisr2"
                                       autocomplete="off" placeholder="Dosis 2 (µGy)" required id="dosisr2">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosisr3"
                                       autocomplete="off" placeholder="Dosis 3 (µGy)" required id="dosisr3">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultador"
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultador"
                                       readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="aceptabler"
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" required id="aceptabler"
                                       readonly>
                            </div>
                        </div>
                        <script>
                            $('#dosisr1,#dosisr2,#dosisr3').change(function () {
                                var v1 = $('#dosisr1').val();
                                var v2 = $('#dosisr2').val();
                                var v3 = $('#dosisr3').val();
                                var r1 = (parseFloat(v1) + parseFloat(v2) + parseFloat(v3)) / 3;
                                var p1 = ((Math.sqrt((Math.pow((v1 - r1), 2) + Math.pow((v2 - r1), 2) + Math.pow((v3 - r1), 2)) / 3)) / r1) * 100;
                                $('#resultador').val(p1.toFixed(2));
                                if (p1 < 10) {
                                    $('#aceptabler').val('SI');
                                } else {
                                    $('#aceptabler').val('NO');
                                }
                                if ($('#dosisr1').val() === '' && $('#dosisr2').val() === '' && $('#dosisr3').val() === '') {
                                    $('#resultador').val('');
                                    $('#aceptabler').val('');
                                }
                            });
                        </script>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-4 form-group-sm ">
                                <span class="control-label glyphicon glyphicon-ok"> Variacion del rendimiento carga</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="carga1"
                                       autocomplete="off" placeholder="Carga 1 (mAs)" required id="carga1">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosisc1"
                                       autocomplete="off" placeholder="Dosis 1 (µGy)" required id="dosisc1">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="carga2"
                                       autocomplete="off" placeholder="Carga 2 (mAs)" required id="carga2">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosisc2"
                                       autocomplete="off" placeholder="Dosis 2 (µGy)" required id="dosisc2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="resultadoc"
                                       autocomplete="off" placeholder="Resultado (%)" required id="resultadoc"
                                       readonly>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="aceptablec"
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" required id="aceptablec"
                                       readonly>
                            </div>
                        </div>
                        <script>
                            $('#carga1,#dosisc1,#carga2,#dosisc2').change(function () {
                                var v1 = $('#carga1').val();
                                var v2 = $('#dosisc1').val();
                                var v3 = $('#carga2').val();
                                var v4 = $('#dosisc2').val();
                                var p1 = Math.abs(((v2 / v1) - (v4 / v3)) / ((v2 / v1) + (v4 / v3)));
                                $('#resultadoc').val(p1.toFixed(2));
                                if (p1 <= 0.1) {
                                    $('#aceptablec').val('SI');
                                } else {
                                    $('#aceptablec').val('NO');
                                }
                                if ($('#carga1').val() === '' && $('#dosisc1').val() === '' && $('#carga2').val() === '' && $('#dosisc2').val() === '') {
                                    $('#resultadoc').val('');
                                    $('#aceptablec').val('');
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">DOSIS EN LA SUPERFICIE DEL PACIENTE</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Exploracion:</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control " name="exploracion" id="exploracion">
                                            <option>Molar Superior Adulto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="dosis"
                                       autocomplete="off" placeholder="Dosis (µGy)" required id="dosis">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">.</span>
                                <input class="form-control input-sm" name="valoraceptable"
                                       autocomplete="off" placeholder="¿Aceptable? SI/NO" required
                                       id="valoraceptable"
                                       readonly>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Distancia Foco-Piel:</span>
                                <input class="form-control input-sm" name="ddistancia"
                                       autocomplete="off" placeholder="cm" required
                                       id="ddistancia">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tensión:</span>
                                <input class="form-control input-sm" name="dtension"
                                       autocomplete="off" placeholder="kV" required
                                       id="dtension">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Corriente:</span>
                                <input class="form-control input-sm" name="dcorriente"
                                       autocomplete="off" placeholder="mA" required
                                       id="dcorriente">
                            </div>
                            <div class="col-sm-10 col-xs-5 col-lg-3 form-group-sm ">
                                <span class="control-label">Tiempo de Exposicion:</span>
                                <input class="form-control input-sm" name="dtiempoexposicion"
                                       autocomplete="off" placeholder="ms" required
                                       id="dtiempoexposicion">
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#dosis').change(function () {
                            var v1 = $('#dosis').val();
                            if (v1 <= 4000) {
                                $('#valoraceptable').val('SI');
                            } else {
                                $('#valoraceptable').val('NO');
                            }
                            if ($('#dosis').val() === '') {
                                $('#valoraceptable').val('');
                            }
                        });
                    </script>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">&nbsp;</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-6 form-group-sm ">
                                <span class="control-label">CONCLUSIONES:</span>
                                <textarea class="form-control input-sm" name="conclusiones" id="conclusiones"
                                          autocomplete="off" placeholder="Ejm: Conclusion"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-6 form-group-sm ">
                                <span class="control-label">RECOMENDACIONES:</span>
                                <textarea class="form-control input-sm" name="recomendaciones" id="recomendaciones"
                                          autocomplete="off" placeholder="Ejm: Recomendaciones"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-5 col-lg-6 form-group-sm ">
                                <span class="control-label">VIGENCIA:</span>
                                <textarea class="form-control input-sm" name="vigencia" id="vigencia"
                                          autocomplete="off" placeholder="Ejm: Vigencia"></textarea>
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
    <!-- Modal Equipo Rayos X -->
    <div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>codRayosX</th>
                            <th>equipo</th>
                            <th>tipo1</th>
                            <th>tipo2</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Equipo de Medicion -->
    <div id="myModal2" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <table id="example2" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>serie</th>
                            <th>tipo</th>
                            <th>marca</th>
                            <th>modelo</th>
                            <th>fecha</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function listar() {
            $.ajax({
                type: 'get',
                url: 'buscarRayosXRuc',
                dataType: 'json',
                data: {buscar: $('#buscar').val()},
                success: function (result) {
                    var table = $('#example').DataTable({
                        "destroy": true,
                        "data": result,
                        "columns": [
                            {"data": "codRayosX"},
                            {"data": "equipo"},
                            {"data": "tipo1"},
                            {"data": "tipo2"},
                            {"defaultContent": "<button type=\"button\" class=\"btn btn-success glyphicon glyphicon-ok\" onclick='cerrar()'>Añadir</button>"}
                        ]
                    });
                    $('#example tbody').on('click', 'button', function () {
                        var data = table.row($(this).parents('tr')).data();
                        $.ajax({
                            type: 'get',
                            url: '/buscarRayosXCodigo',
                            dataType: 'json',
                            data: {id: data.codRayosX},
                            success: function (result) {
                                $('#codigo').val(result[0]);
                                $('#tipo1').val(result[1]);
                                $('#tipo2').val(result[2]);
                                $('#tipo3').val(result[3]);
                                $('#marcat3').val(result[4]);
                                $('#modelot3').val(result[5]);
                                $('#seriet3').val(result[6]);
                                $('#tensionmaxt3').val(result[7]);
                                $('#cargamaxt3').val(result[8]);
                                $('#fabricaciont3').val(result[9]);
                                $('#instalaciont3').val(result[10]);
                                $('#tipo4').val(result[11]);
                                $('#marcat4').val(result[12]);
                                $('#modelot4').val(result[13]);
                                $('#seriet4').val(result[14]);
                                $('#tensionmaxt4').val(result[15]);
                                $('#cargamaxt4').val(result[16]);
                                $('#fabricaciont4').val(result[17]);
                                $('#instalaciont4').val(result[18]);
                            }
                        });
                    });
                }
            });
        }

        function cerrar() {
            $('#myModal').modal('hide');
        }
    </script>
    <script>
        function listarM() {
            $.ajax({
                type: 'get',
                url: 'buscarEquipoMedicion',
                dataType: 'json',
                success: function (result) {
                    var table = $('#example2').DataTable({
                        "destroy": true,
                        "data": result,
                        "columns": [
                            {"data": "serie"},
                            {"data": "tipo"},
                            {"data": "marca"},
                            {"data": "modelo"},
                            {"data": "fecha"},
                            {"defaultContent": "<button type=\"button\" class=\"btn btn-success glyphicon glyphicon-ok\" onclick='cerrar2()'>Añadir</button>"}
                        ]
                    });

                    $('#example2 tbody').on('click', 'button', function () {
                        var data = table.row($(this).parents('tr')).data();
                        $.ajax({
                            type: 'get',
                            url: '/buscarEquipoMedicionSerie',
                            dataType: 'json',
                            data: {serie: data.serie},
                            success: function (result) {
                                $('#serie').val(result[0]);
                                $('#tipo').val(result[1]);
                                $('#marca').val(result[2]);
                                $('#modelo').val(result[3]);
                                $('#fechacalibracion').val(result[4]);
                            }
                        });
                    });
                }
            });
        }

        function cerrar2() {
            $('#myModal2').modal('hide');
        }
    </script>
@stop