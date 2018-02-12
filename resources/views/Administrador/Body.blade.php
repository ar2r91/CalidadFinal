@extends('Administrador.LayoutAdm')
@section('body')
    @if(  Session::has('tipoCuentaA') )
        <script src="{{asset('assets/js/utilidades.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <div class="navbar-default sidebar" role="navigation">
            <div class="panel-group" id="accordion">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePersonal">
                                <span class="glyphicon glyphicon-user">
                            </span> Personal</a>
                        </h4>
                    </div>
                    @yield('personal')
                    <div id="collapsePersonal" class="panel-collapse collapse">
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
                                        <a href="/admBuscarPersonal">Buscar Personal</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseCliente">
                                <span class="glyphicon glyphicon-user">
                            </span> Cliente</a>
                        </h4>
                    </div>
                    @yield('cliente')
                    <div id="collapseCliente" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarCliente">Agregar Cliente</a>
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
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRayosX">
                                <span class="glyphicon glyphicon-cog">
                            </span> Equipo Rayos X</a>
                        </h4>
                    </div>
                    @yield('rayosx')
                    <div id="collapseRayosX" class="panel-collapse collapse">
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
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseMedicion">
                                <span class="glyphicon glyphicon-cog">
                            </span> Equipo Medicion</a>
                        </h4>
                    </div>
                    @yield('medicion')
                    <div id="collapseMedicion" class="panel-collapse collapse">
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
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXG">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX General</a>
                        </h4>
                    </div>
                    @yield('rxgeneral')
                    <div id="collapseRXG" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXGeneral">Agregar RX General</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarRXGeneral">Buscar RX General</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDentalI">
                                <span class="glyphicon glyphicon-cog">
                            </span> Dental-Intraoral</a>
                        </h4>
                    </div>
                    @yield('intraoral')
                    <div id="collapseDentalI" class="panel-collapse collapse">
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
                                        <a href="/admBuscarIntraoral">Buscar Intraoral</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDentalPC">
                                <span class="glyphicon glyphicon-cog">
                            </span> Dental-Panaromico y Cefalometrico</a>
                        </h4>
                    </div>
                    @yield('panoramico')
                    <div id="collapseDentalPC" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarPanoramico">Agregar Panaromico y Cefalometrico</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarPanoramico">Buscar Panaromico y Cefalometrico</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXT">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX Tomografia</a>
                        </h4>
                    </div>
                    @yield('rxtomografia')
                    <div id="collapseRXT" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXTomografia">Agregar RX Tomografia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarRXTomografia">Buscar RX Tomografia</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXM">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX Mamografia</a>
                        </h4>
                    </div>
                    @yield('rxmamografia')
                    <div id="collapseRXM" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXMamografia">Agregar RX Mamografia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarRXMamografia">Buscar RX Mamografia</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXF">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX Fluoroscopia</a>
                        </h4>
                    </div>
                    @yield('rxfluoroscopia')
                    <div id="collapseRXF" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXFluoroscopia">Agregar RX Fluoroscopia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarRXFluoroscopia">Buscar RX Fluoroscopia</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXD">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX Densitometro</a>
                        </h4>
                    </div>
                    @yield('rxdensitometro')
                    <div id="collapseRXD" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXDensitometro">Agregar RX Densitometro</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admBuscarRXDensitometro">Buscar RX Densitometro</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseRXGF">
                                <span class="glyphicon glyphicon-cog">
                            </span> RX General Fluoroscopia</a>
                        </h4>
                    </div>
                    @yield('rxgeneralfluoroscopia')
                    <div id="collapseRXGF" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <a href="/admRegistrarRXGeneralFluoroscopia">Agregar RX General Fluoroscopia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-search"></span>
                                        <a href="/admRegistrarRXGeneralFluoroscopia">Buscar RX General Fluoroscopia</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include("index")
    @endif
@stop
