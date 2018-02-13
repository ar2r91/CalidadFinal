@if(isset($intraoral))
    @foreach($intraoral as $i)
        <head>
            <div align="right">Nº {{$i->codIntraoral}} - (Pagina 1 de 1)</div>
            <table style="width:100%">
                <tr>
                    <th align="left"><img src="assets/img/aleph.png"></th>
                    <th align="right"><img src="assets/img/sgs.png"></th>
                </tr>
            </table>
            <BR>
            <div ALIGN="CENTER">CERTIFICADO DE CONTROL DE CALIDAD</div>
            <div ALIGN="CENTER">EQUIPO DE RAYOS X DENTAL</div>
            <div ALIGN="CENTER">La empresa ALEPH SAC certifica que el equipo de:</div>
            <div ALIGN="CENTER">{{$i->razonSocial}}</div>
            <div ALIGN="CENTER">ha APROBADO el control de calidad.</div>
        </head>
        <body>
        <br>
        <div>1. INFORME: {{$i->codIntraoral}}</div>
        <br>
        <div>2. Fecha: {{Carbon\Carbon::parse($i->fecha)->format('d-m-Y')}}</div>
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
        </body>
        <br>
        <div>5. PROTOCOLO EMPLEADO: Protocolo Español de Control de Calidad en Radiodiagnostico</div>
        <br>
        <div>6. AUTORIZACION DE SERVICIOS: S0009.E3-IPEN/OTAN</div>
        <br>
        <div>7. VIGENCIA: {{$i->vigencia}}
        </div>
        <br><br><br><br>
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
    @endforeach
    <br>
    <footer>
        <div align="center"> Av. Rafael Escardo 154, San Miguel 15087, Lima - Telf.6287782/ 6287752 Cel.:984123230/
            984123233 RPM:
            956965418 www.alephsac.com informes@alephsac.com
        </div>
    </footer>
@endif