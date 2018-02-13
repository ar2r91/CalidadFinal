<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/body', function () {
    return view('Administrador/Body');
});

///////////////////////////////////////////////////PERSONAL/////////////////////////////////////////////////////////////

Route::get('/admRegistrarPersonal', function () {
    return view('Administrador/Personal/agregar');
});
Route::get('/admBuscarPersonal', function () {
    return view('Administrador/Personal/buscar');
});

Route::post('PersonalRegistrado', 'personalController@registrarPersonal');
Route::get('PersonalBuscado', 'personalController@listarPersonal');
Route::get('PersonalCargar/{codPersonal}', 'personalController@cargarPersonal');
Route::get('PersonalEditado/{codPersonal}', 'personalController@editarPersonal');
Route::get('PersonalEliminar/{codPersonal}', 'personalController@eliminarPersonal');

Route::post('/loguear', 'personalController@loguearPersonal');
Route::get('/cerrarSesion', 'personalController@logOutPersonal');

////////////////////////////////////////////////////CLIENTE/////////////////////////////////////////////////////////////

Route::get('/admRegistrarCliente', function () {
    return view('Administrador/Cliente/agregar');
});
Route::get('/admBuscarCliente', function () {
    return view('Administrador/Cliente/buscar');
});

Route::post('ClienteRegistrado', 'clienteController@registrarCliente');
Route::get('ClientesBuscados', 'clienteController@listarCliente');
Route::get('ClienteCargar/{codPersona}', 'clienteController@cargarCliente');
Route::get('ClienteEditado/{codPersona}', 'clienteController@editarCliente');
Route::get('ClienteEliminar/{codPersona}', 'clienteController@eliminarCliente');

Route::get('/buscarClienteR', 'clienteController@buscarClienteR');
Route::get('/buscarClienteRaz', 'clienteController@buscarClienteRaz');
Route::get('buscarClienteRZ', array('as' => 'buscarClienteRZ', 'uses' => 'clienteController@autocompleteClienteRazonSocial'));

////////////////////////////////////////////////////RAYOSX//////////////////////////////////////////////////////////////

Route::get('/admRegistrarRayosX', function () {
    return view('Administrador/RayosX/agregar');
});
Route::get('/admBuscarRayosX', function () {
    return view('Administrador/RayosX/buscar');
});

Route::post('/RayosXRegistrado', 'rayosxController@registrarRayosX');
Route::get('/RayosXBuscados', 'rayosxController@listaRayosX');
Route::get('/RayosXCargar/{codRayosX}', 'rayosxController@cargarRayosX');
Route::get('/RayosXEditado/{codRayosX}/{codCliente}/{codComponentea}/{codComponenteb}/{cp1codComponentePadre}/{cp2codComponentePadre}', 'rayosxController@editarRayosX');
Route::get('/RayosXEliminar/{codRayosX}/{codComponentea}/{codComponenteb}/{cp1codComponentePadre}/{cp2codComponentePadre}', 'rayosxController@eliminarRayosX');

Route::get('/buscarRayosXRuc', 'rayosxController@buscarRayosXRuc');
Route::get('/buscarRayosXCodigo', 'rayosxController@buscarRayosXCodigo');

////////////////////////////////////////////////////MEDICION////////////////////////////////////////////////////////////

Route::get('/admRegistrarMedicion', function () {
    return view('Administrador/Medicion/agregar');
});
Route::get('/admBuscarMedicion', function () {
    return view('Administrador/Medicion/buscar');
});

Route::post('/MedicionRegistrado', 'medicionController@registrarMedicion');
Route::get('/MedicionBuscada', 'medicionController@listarMedicion');
Route::get('/MedicionCargar/{codEquipoMedicion}', 'medicionController@cargarMedicion');
Route::get('/MedicionEditado/{codEquipoMedicion}', 'medicionController@editarMedicion');
Route::get('/MedicionEliminar/{codEquipoMedicion}', 'medicionController@eliminarMedicion');

Route::get('/buscarEquipoMedicion', 'medicionController@buscarEquipoMedicion');
Route::get('buscarEquipoMedicionSerie', 'medicionController@buscarEquipoMedicionSerie');


//////////////////////////////////////////////////RXGENERAL/////////////////////////////////////////////////////////////

Route::get('/admRegistrarRXGeneral', function () {
    return view('Administrador/RXGeneral/agregar');
});
Route::get('/admBuscarRXGeneral', function () {
    return view('Administrador/RXGeneral/buscar');
});

//////////////////////////////////////////////////DENTAL-INTRAORAL//////////////////////////////////////////////////////

Route::get('/admRegistrarIntraoral', function () {
    return view('Administrador/Dental/Intraoral/agregar');
});
Route::get('/admBuscarIntraoral', function () {
    return view('Administrador/Dental/Intraoral/buscar');
});

Route::post('/RegistrarIntraoral', 'intraoralController@registrarIntraoral');
Route::get('/IntraoralBuscado', 'intraoralController@listarIntraoral');
Route::get('/IntraoralEliminar/{codParamGeometricos}/{codCalidadHaz}/{codTiempoExposicion}/{codRendimiento}/{codDosisPaciente}/{codIntraoral}', 'intraoralController@eliminarIntraoral');
Route::get('/IntraoralReportePDF/{codIntraoral}', 'PdfController@pdfReporteIntraoral');
Route::get('/IntraoralCertificadoPDF/{codIntraoral}', 'PdfController@pdfCertificadoIntraoral');

/////////////////////////////////////////////////DENTAL-PANORAMICO//////////////////////////////////////////////////////

Route::get('/admRegistrarPanoramico', function () {
    return view('Administrador/Dental/Panoramico/agregar');
});
Route::get('/admBuscarPanoramico', function () {
    return view('Administrador/Dental/Panoramico/buscar');
});

//////////////////////////////////////////////////RXTOMOGRAFIA//////////////////////////////////////////////////////////

Route::get('/admRegistrarRXTomografia', function () {
    return view('Administrador/RXTomografia/agregar');
});
Route::get('/admBuscarRXTomografia', function () {
    return view('Administrador/RXTomografia/buscar');
});

//////////////////////////////////////////////////RXMAMOGRAFIA//////////////////////////////////////////////////////////

Route::get('/admRegistrarRXMamografia', function () {
    return view('Administrador/RXMamografia/agregar');
});
Route::get('/admBuscarRXMamografia', function () {
    return view('Administrador/RXMamografia/buscar');
});

//////////////////////////////////////////////////RXFLUOROSCOPIA////////////////////////////////////////////////////////

Route::get('/admRegistrarRXFluoroscopia', function () {
    return view('Administrador/RXFluoroscopia/agregar');
});
Route::get('/admBuscarRXFluoroscopia', function () {
    return view('Administrador/RXFluoroscopia/buscar');
});

//////////////////////////////////////////////////RXDENSITOMETRO////////////////////////////////////////////////////////

Route::get('/admRegistrarRXDensitometro', function () {
    return view('Administrador/RXDensitometro/agregar');
});
Route::get('/admBuscarRXDensitometro', function () {
    return view('Administrador/RXDensitometro/buscar');
});

//////////////////////////////////////////RXGENERALFLUOROSCOPIA/////////////////////////////////////////////////////////

Route::get('/admRegistrarRXGeneralFluoroscopia', function () {
    return view('Administrador/RXGeneralFluoroscopia/agregar');
});
Route::get('/admBuscarRXGeneralFluoroscopia', function () {
    return view('Administrador/RXGeneralFluoroscopia/buscar');
});
