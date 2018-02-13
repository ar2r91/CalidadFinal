@if(isset($intraoral))
    @foreach($intraoral as $i)
        <head>
            <div align="right">Nº {{$i->codIntraoral}} - (Pagina 1 de 3)</div>
            <table style="width:100%">
                <tr>
                    <th align="left"><img src="assets/img/aleph.png"></th>
                    <th align="right"><img src="assets/img/sgs.png"></th>
                </tr>
            </table>
            <BR>
            <div ALIGN="CENTER">INFORME DE CONTROL DE CALIDAD</div>
            <br>
            <div ALIGN="CENTER">EQUIPO DE RAYOS X DENTAL INTRAORAL</div>
        </head>
        <body>
        <BR>
        <div>1. Fecha: {{$i->dfecha}}</div>
        <br>
        <div>2. DATOS DEL SOLICITANTE</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Razon Social: {{$i->razonSocial}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;RUC: {{$i->ruc}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Direccion: {{$i->direccion}}</div>
        <br>
        <div>3. UBICACION DE LA INSTALACION</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Dirección: {{$i->ubicacion}}
        </div>
        <br>
        <div>4. DATOS DEL EQUIPO</div>
        <br>
        <table style="width:100%" border="1">
            <tr>
                <th align="left">Tipo: {{$i->tipo1}}</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th></th>
                <th align="center">{{$i->tipo3}}</th>
                <th align="center">{{$i->tipo4}}</th>
            </tr>
            <tr>
                <td>Marca:</td>
                <td align="center">{{$i->cp1marca}}</td>
                <td align="center">{{$i->cp2marca}}</td>
            </tr>
            <tr>
                <td>Serie:</td>
                <td align="center">{{$i->cp1serie}}</td>
                <td align="center">{{$i->cp2serie}}</td>
            </tr>
            <tr>
                <td>kVp maximo:</td>
                <td align="center">{{$i->cp1cargamax}} kV</td>
                <td align="center">{{$i->cp2cargamax}} kV</td>
            </tr>
            <tr>
                <td>mA o mAs maximo:</td>
                <td align="center">{{$i->cp1tensionmax}} mA</td>
                <td align="center">{{$i->cp2tensionmax}} mA</td>
            </tr>
            <tr>
                <td>Antiguedad:</td>
                <td align="center">{{$i->cp1fabricacion}}</td>
                <td align="center">{{$i->cp2fabricacion}}</td>
            </tr>
            <tr>
                <td>Año de instalacion:</td>
                <td align="center">{{$i->cp1instalacion}}</td>
                <td align="center">{{$i->cp2instalacion}}</td>
            </tr>
        </table>
        <br>
        <div>5. PROTOCOLO EMPLEADO: Protocolo Español de Control de Calidad en Radiodiagnostico</div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
        <div align="right">Nº {{$i->codIntraoral}} - (Pagina 2 de 3)</div>
        <div>6. EQUIPO EMPLEADO</div>
        <br>
        <table style="width:100%" border="1">
            <tr>
                <th></th>
                <th align="center">{{$i->tipo}}</th>
            </tr>
            <tr>
                <th>Marca:</th>
                <th align="center">{{$i->mmarca}}</th>
            </tr>
            <tr>
                <th>Modelo:</th>
                <th align="center">{{$i->mmodelo}}</th>
            </tr>
            <tr>
                <th>Serie:</th>
                <th align="center">{{$i->mserie}}</th>
            </tr>
            <tr>
                <th>Fecha de calibracion:</th>
                <th align="center">{{Carbon\Carbon::parse($i->mfecha)->format('d-m-Y')}}</th>
            </tr>
        </table>
        <br>
        <div>7. RESULTADOS</div>
        <br>
        <div>7.1. INSPECCION FISICA</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Estabilidad mecanica: {{$i->estabilidadmecanica}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Movimientos adecuados del equipo: {{$i->movimientoequipo}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Buen estado de los cables (alta tencion y
            alimentacion): {{$i->estadocables}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Existe indicador de punto focal: {{$i->grantygira}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Los indicadores de tecnicas de exposcion en el panel de control funcionan
            adecuadamente: {{$i->indicadoresoperativos}}
        </div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Existe señal audible durante y/o al final de la
            exposicion: {{$i->sistemaaudible}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;El interruptor de exposicion es del tipo hombre-muerto: Si</div>
        <br>
        <div>7.2. PRUEBAS</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.1. Minima distancia foco-piel</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->pdistancia}} cm</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &gt;= 20 cm</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptabled ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.2. Tamaño del campo en el extremo del localizador</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->tamanio}} cm</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt;= 6 cm</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptablet ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.3. Exactitud de la tension</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultadotn}}%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt;= ± 10%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptabletn ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.4. Repetibilidad de la tension</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultadot}}%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt;= 10 %</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->cvaloraceptablet ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.5. Filtracion</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->filtracion}} mm equivalente de aluminio
        </div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &gt;= 1.5 mm aluminio</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptablef ==1)Si @else
                No @endif</div>
        <br>
        <div align="right">Nº {{$i->codIntraoral}} - (Pagina 3 de 3)</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.6. Exactitud del tiempo de aluminio</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultadoti}}%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt;= ±20%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptableti ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.7. Repetibilidad del tiempo de exposicion</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultadotie}}%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt;= ±10%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptabletie ==1)Si @else
                No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.8. Variacion del rendimiento</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultador}}%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: &lt; 10%</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->aceptabler ==1)Si @else No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.9. Variacion del rendimiento con el tiempo de exposicion
        </div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->resultadoc}}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tolerancia: Coeficiente de linealidad &lt; 0.1</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->aceptablec ==1)Si @else No @endif</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.2.10. Dosis en la superficie del paciente</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exploracion: Molar Superior Adulto</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia Foco-Piel: {{$i->ddistancia}} cm/
            Tensión: {{$i->dtension}} kV/ Corriente: {{$i->dcorriente}} mA/ Tiempo de
            Exposición: {{$i->dtiempoexposicion}} ms
        </div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: {{$i->dosis}} mGy</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Referencia: 7 mGy</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptable: @if($i->valoraceptable ==1)Si @else
                No @endif</div>
        <br>
        <div>8. CONCLUSIONES</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;{{$i->conclusiones}}
        </div>
        <br>
        <div>9. RECOMENDACIONES</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;{{$i->recomendaciones}} – Norma
            técnica
            IR.003.2013 (R.P. 123-13-IPEN/PRES)
        </div>
        <br>
        <div>10. VIGENCIA</div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;{{$i->vigencia}}
        </div>
        </body>
        <br><br><br><br><br>
        <table style="width:100%">
            <tr>
                <th align="center" colspan="2">Dr. Rolando Paucar Jáuregui</th>
                <th align="center" colspan="2">Rita Peñaherrera Rengifo</th>
            </tr>
            <tr>
                <th align="center" colspan="2">Lic. IPEN Nº 0022-11</th>
                <th align="center" colspan="2">Gerente General</th>
            </tr>
        </table>
        <br>
    @endforeach
    <footer>
        <div align="center"> Av. Rafael Escardo 154, San Miguel 15087, Lima - Telf.6287782/ 6287752 Cel.:984123230/
            984123233 RPM:
            956965418 www.alephsac.com informes@alephsac.com
        </div>
    </footer>
@endif