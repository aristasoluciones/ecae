<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/** Definimos los márgenes reales de cada página en el PDF **/
@page {
            margin-top: 0.5cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 0.5cm;
            }
        /** Definimos los márgenes body de cada página en el PDF **/
        body {
            margin-top: 3cm;
            margin-left: 0.3cm;
            }

        /** Definimos las reglas del encabezado **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            }

        /** Defininimos las reglas del pie de página **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            }

table.inicio {
    border: 2pt solid #AD84C6;
    border-bottom: none;
    border-collapse: collapse;
    table-layout: fixed;
    width: 726px;
}
table.enmedio {
border: 2pt solid #AD84C6;
border-top: none;
border-bottom: none;
border-collapse: collapse;
table-layout: fixed;
width: 726px;
}

td.morado {
border: 2pt solid #AD84C6;
border-top: none;
border-bottom: none;
border-collapse: collapse;
background :#9925be;
table-layout: fixed;
text-align: center;
color: #ffffff;
font-size: small;
}

table.final {
    border: 2pt solid #AD84C6;
    border-top: none;
    border-collapse: collapse;
    margin-bottom: 10pt;
    table-layout: fixed;
    width: 726px;
}
td.gris{
background:#F2F2F2;
font-size: 8pt;
border-collapse: separate;
border: white 1px solid;
}
td.blanco{
background:#ffffff;
font-size: 8pt;
border-collapse: separate;
border: white 1px solid;
}
td.rosa{
    background:#EEE6F3;
    font-size: 8pt;
    border-collapse: separate;
    border: white 1px solid;
    text-align: center;
}
tr{
    border: white 1px solid;
}

table.saltopagina {
  page-break-before: always;
}
</style>
</head>
<body>

<!--LOGO Y ENCABEZADO-->
<header>
    <table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
        <tbody>
            <tr border-collapse: collapse;>
			<td style="width: 20% " rowspan="3"><img  src="../public/imgs/logoEAE2024.png" width="110px" height="80px" alt=""></td>
                <td style="width: 70%; text-align: center; font-size: 10pt; letter-spacing: -1px;">RELACIÓN DE DOCUMENTACIÓN ENTREGADA POR LA PERSONA ASPIRANTE</td>
				<td style="width: 20% " rowspan="3"><img style="text-align: right;" src="../public/imgs/logoIEPC.png" width="150px" height="80px" alt=""></td>
            </tr>
            <tr>
                <td style="width: 60%; text-align: center; font-size: 9pt; color: #808080;">SUPERVISORA/O ELECTORAL LOCAL O CAPACITADORA/O ASISTENTE ELECTORAL LOCAL(HONORARIOS)</td>
            </tr>
            <tr>
                <td style="width: 60%; text-align: center; font-size: 8pt; color: #808080;">PROCESO ELECTORAL 2023-2024</td>
            </tr>
        </tbody>
    </table>
</header>

<!--INICIA PÁGINA 01 -->

    <!--INICIA SECCION 01 -->

<table class="inicio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 18%; font-size: 8pt; text-align: center;">FECHA DE RECEPCIÓN</td>
			<td class="rosa" style="width: 15%;">{{date ("Y-m-d", strtotime($aspirante->created_at)) }}&nbsp;</td>
			<td class="blanco" style="width: 24%px; font-size: 8pt; text-align: center;">NÚM. DE CONVOCATORIA</td>
			<td class="rosa" style="width: 6%">{{mb_strtoupper ($aspirante->numero_convocatoria)}}&nbsp;</td>
			<td class="blanco" style="width: 32%; font-size: 8pt; text-align: center;" >FOLIO DE LA PERSONA ASPIRANTE</td>
			<td class="rosa" style="width: 6%;">{{mb_strtoupper ($aspirante->id)}}&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 10%; font-size: 8pt; text-align: center;">MUNICIPIO</td>
			<td class="rosa" style="width: 40%;">{{mb_strtoupper ($aspirante->municipio)}}&nbsp;</td>
			<td class="blanco" style="width: 10%; font-size: 8pt; text-align: center;">LOCALIDAD</td>
			<td class="rosa" style="width: 40%;">{{mb_strtoupper ($aspirante->localidad) }}&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15%; font-size: 7pt; text-align: center;">SEDE</td>
			<td class="rosa" style="width: 60%;">{{mb_strtoupper ($aspirante->sede)}}&nbsp;</td>
			<td class="blanco" style="width: 10%; font-size: 7pt; text-align: center;">FIJA</td>
			<td class="rosa" style="width:  10%;">
			@if ($aspirante->tipo_sede=='Fija')
                    <span style="font-weight: bold;">X</span>
                 @endif</td>
            <td class="blanco" style="width: 10%; font-size: 7pt; text-align: center;">ALTERNA</td>
			<td class="rosa" style="width:  10%;">
			@if ($aspirante->tipo_sede=='Alterna')
                    <span style="font-weight: bold;">X</span>
                    @endif</td>
		</tr>
	</tbody>
</table>

<table class="final">
	<tbody>
		<tr>
			<td class="blanco" style="width: 20%; font-size: 7pt;">LA PERSONA ASPIRANTE</td>
			<td class="rosa" style="width: 50%;">{{mb_strtoupper ($aspirante->nombre) }} {{mb_strtoupper ($aspirante->apellido1) }} {{mb_strtoupper ($aspirante->apellido2) }}</td>
			<td class="blanco" style="width: 30%; font-size: 7pt;">ENTREGÓ LA SIGUIENTE DOCUMENTACIÓN:</td>
		</tr>
	</tbody>
</table>

    <!--TERMINA SECCION 01 -->

    <!--INICIA SECCION 02 -->

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 80%; font-size: 7pt;"></td>
			<td class="blanco" style="width: 10%; text-align: center;">Mostró<br>original</td>
			<td class="blanco" style="width: 10%; text-align: center;">Entregó<br>copia</td>
        </tr>
	</tbody>
</table>
@php


@endphp

<table class="inicio">
	<tbody>
		<tr>

			<td class="rosa" style="width: 5%; font-size: 7pt; text-align: center;">1.</td>
			<td class="rosa" style="width: 75%; text-align: left;">En su caso, Solicitud correctamente llenada y firmada</td>
			<td class="rosa" style="width: 10%;">
			@if ($aspirante->expedientes[0]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="rosa" style="width: 10%;">
			@if ($aspirante->expedientes[0]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>

	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt;  text-align: center;">2.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Acta de nacimiento (original o copia certificada y copia simple), o en su caso, Carta de Naturalización.</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[1]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[1]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 5%; font-size: 7pt; text-align: center;">3.</td>
			<td class="rosa" style="width: 75%; text-align: left;">Credencial para Votar o comprobante de trámite.</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[2]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[2]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">4.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Comprobante de domicilio.</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[3]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[3]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 5%; font-size: 7pt;">5.</td>
			<td class="rosa" style="width: 75%; text-align: left;">Constancia de estudios (no tira de materias).</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[4]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[4]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">6.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Declaratoria bajo protesta de decir la verdad(firmada).</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[5]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[5]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="morado">Al momento de la contratación</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">7.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Copia de la Clave Única del Registro de Población (CURP).</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[6]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[6]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 5%; font-size: 7pt;">8.</td>
			<td class="rosa" style="width: 75%; text-align: left;">Constancia del Registro Federal de Contribuyentes(RFC).</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[7]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[7]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">9.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Tres fotografías tamaño infantil a color o en blanco y negro*</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[8]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[8]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="morado">Documentos opcionales complementarios <br>
                (el no contar con ellos no será causa de exclusión de la persona aspirante)
                </td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">10.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Carta que acredite su experiencia como docente, manejo o trato de grupos de personas (el no contar con ella no será causa de exclusión de la persona aspirante).</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[9]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[9]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 5%; font-size: 7pt;">11.</td>
			<td class="rosa" style="width: 75%; text-align: left;">Constancia de participación en algún Proceso Electoral Concurrente, Federal o Local </td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[10]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="rosa" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[10]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 5%; font-size: 7pt; text-align: center;">12.</td>
			<td class="blanco" style="width: 75%; text-align: left;">Licencia de manejo vigente (el no contar con ella no será causa de exclusión de la persona aspirante).</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[11]->mostro_original)
			<span>x</span>
			@endif
			</td>
			<td class="blanco" style="width: 10%; text-align: center;">
			@if ($aspirante->expedientes[11]->entrego_copia)
			<span>x</span>
			@endif
			</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="morado">Datos de quien recibe la documentación</td>
		</tr>
	</tbody>
</table>

<table style="height: 15pt; border: none; table-layout: fixed;  width: 726px;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 100%; font-size: 7pt; text-align: center;"></td>
		</tr>
    </tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="text-align: center; font-weight: bold;">Nombre completo, firma y <br>
                Cargo de quien recibe la documentación
            </td>
        </tr>
	</tbody>
</table>

<table class="enmedio" style="height: 30pt; border: none; table-layout: fixed;  width: 726px;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 726px; height: 50px; font-size: 7pt; text-align: center; vertical-align:bottom;">_____________________________________________________________________________</td>
		</tr>
    </tbody>
</table>

<table style="border: none; table-layout: fixed;  width: 726px;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 100%; font-size: 8pt; text-align: center; font-weight: bold;">ACUSE DE RECIBO</td>
		</tr>
	</tbody>
</table>

<table style="border: 2pt solid #AD84C6; table-layout: fixed;  width: 726px;">
	<tbody>
		<tr>
			<td class="rosa" style="width: 100%; font-size: 9pt; text-align: justify;">Del (la) C. <span><u>{{mb_strtoupper ($aspirante->nombre) }} {{mb_strtoupper ($aspirante->apellido1) }} {{mb_strtoupper ($aspirante->apellido2) }}</u>, aspirante a ocupar el cardo de Supervisor/a Electoral Local o Capacitador/a Asistente Electoral Local, inscrito(a) en el Órgano Local Electoral <u>1234</u> en el estado <u>Chiapas</u> con fecha {{date ("Y", strtotime($aspirante->created_at)) }}/{{date ("m", strtotime($aspirante->created_at)) }}/{{date ("d", strtotime($aspirante->created_at)) }}</span> se recibió la siguiente documentación.</td>
		</tr>
	</tbody>
</table>

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="blanco" style="width: 40%; font-size: 7pt; text-align: center;"></td>
			<td class="blanco" style="width: 10%; font-size: 7pt; text-align: center;">Entregó</td>
			<td class="blanco" style="width: 40%; font-size: 7pt; text-align: center;"></td>
            <td class="blanco" style="width: 10%; font-size: 7pt; text-align: center;">Entregó</td>
		</tr>
    </tbody>
</table>

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">1. Copia del acta de nacimiento (original o copia certificada y copia simple) o, en su caso, Carta de Naturalización</td>
			<td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[1]->entrego_copia)
			<span>X</span>
		@endif
		</td>
			<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">7. Copia del Registro Federal de Contribuyentes (RFC)</td>
            <td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[7]->entrego_copia)
			<span>X</span>
			@endif</td>
		</tr>
    </tbody>
</table>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">2.	Copia de la Credencial para Votar o comprobante de trámite</td>
			<td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[2]->entrego_copia)
			<span>X</span>
		@endif</td>
			<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">8. Constancia de no inhabilitación del servicio público.</td>
            <td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[8]->entrego_copia)
			<span>X</span>
		@endif</td>
		</tr>
    </tbody>
</table>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">3. Copia del comprobante de domicilio</td>
			<td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[3]->entrego_copia)
			<span>X</span>
		@endif</td>
			<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">9. Tres fotografías tamaño infantil a color o blanco y negro*.</td>
            <td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[9]->entrego_copia)
			<span>X</span>
		@endif</td>
		</tr>
    </tbody>
</table>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">4.	Constancia de estudios (no tira de materias)</td>
			<td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[4]->entrego_copia)
			<span>X</span>
		@endif</td>
			<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">10. Carta que acredita su experiencia como docente, manejo o trato con grupos de personas</td>
            <td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[10]->entrego_copia)
			<span>X</span>
		@endif</td>
		</tr>
    </tbody>
</table>
<table class="blanco" style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">5. Original de la Declaratoria bajo protesta de decir verdad (firmada)</td>
			<td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[5]->entrego_copia)
			<span>X</span>
		@endif</td>
			<td class="rosa" style="width: 40%; font-size: 7pt; text-align: left;">11. Copia de la Constancia de participación en algún Proceso Electoral Federal o Local</td>
            <td class="rosa" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[10]->entrego_copia)
			<span>X</span>
		@endif
		</td>
		</tr>
    </tbody>
</table>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
		<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">6.	Copia de la Clave Única del Registro de Población (CURP)</td>
			<td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[6]->entrego_copia)
			<span>X</span>
		@endif</td>
			<td class="blanco" style="width: 40%; font-size: 7pt; text-align: left;">12. Copia de licencia de manejo vigente</td>
            <td class="blanco" style="width: 10%; font-size: 7pt; text-align: center; border: 1pt solid #AD84C6;">
			@if ($aspirante->expedientes[8]->entrego_copia)
			<span>X</span>
		@endif</td>
		</tr>
    </tbody>
</table>

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td class="morado" style="text-align: center;">Datos de quien recibe la documentación</td>
		</tr>
	</tbody>
</table>
<table style="table-layout: fixed; width: 726px; height: 50px;  background:#EEE6F3;">
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td style="text-align: center; font-size: 8pt;">Nombre completo, firma y cargo de quien recibe la documentación. </td>
		</tr>
	</tbody>
</table>



<!--TERMINA SECCION 02 -->

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 50pt;">
        <tr>
            <td style="text-align: right; font-size: 6pt;"> LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES LOCALES <br>Y CAPACITADORES/AS-ASISTENTES ELECTORALES LOCALES.<br>| ANEXO 21.4 RELACIÓN DE DOCUMENTACIÓN ENTREGADA POR LA PERSONA ASPIRANTE

        </td>
        </tr>
    </table>
</footer>

<!-- SALTO DE PÁGINA -->
<table class="saltopagina"></table>

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td style="text-align: center; font-size: 9pt;">HE LEÍDO EL AVISO DE PRIVACIDAD Y ACEPTO LOS TÉRMINOS Y CONDICIONES</td>
		</tr>
	</tbody>
</table>
<table style="table-layout: fixed; height:200px; width:726px;">
    <td valign="bottom" style="font-size: 9pt; text-align: center; vertical-align: bottom; height: 200px;"><span style="font-size: 9pt;"><u>{{mb_strtoupper ($aspirante->nombre) }} {{mb_strtoupper ($aspirante->apellido1) }} {{mb_strtoupper ($aspirante->apellido2) }}</u></span><br><span style="font-size: 8pt;">NOMBRE Y FIRMA DE LA PERSONA ASPIRANTE</span></td>
</table>
	<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td class="gris" style="text-align: justify; font-size: 9pt;"><p>El procedimiento de reclutamiento, selección y contratación de las y los SE y CAE Locales se realizará sin discriminación alguna, por origen étnico, género, edad, discapacidades, condición social, condiciones de salud, religión, opiniones, identidad o preferencias sexuales, estado civil o cualquier otra que atente contra la dignidad humana y tenga por objeto anular o menoscabar los derechos y libertades de las personas.</p>
		<p>La ciudadanía trans tiene derecho a participar en el proceso de selección. Ningún funcionario del OPL se podrá negar a recibir la documentación cuando no coincida la expresión de género, es decir, la apariencia de mujer u hombre, con la fotografía, el nombre o el sexo que aparecen en su Credencial para Votar.</p></td>
		</tr>
	</tbody>
</table>
<table style="table-layout: fixed; height:200px; width:726px;">
    <td valign="bottom" style="font-size: 6pt; text-align: center; vertical-align: bottom; height: 200px;"><span style="font-size: 8pt;"><u>EN CASO DE PROGRAMARSE LA CÁPSULA DE INDUCCIÓN DE MANERA PRESENCIAL EN EL OPL, LLENAR EL SIGUIENTE APARTADO</u></span><br><br><span style="font-size: 8pt;">FAVOR DE PRESENTARSE A LA CÁPSULA DE INDUCCIÓN EL DÍA _____ DEL MES ___________ DEL 2024, A LAS ____: ______ HORAS</span></td>
</table>

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td style="text-align: center; font-size: 9pt; font-weight: 900;">AVISO DE PRIVACIDAD SIMPLIFICADO</td>
		</tr>
	</tbody>
</table>

<table style="table-layout: fixed; height:200px; width:726px;">
    <td valign="bottom" style="font-size: 9pt; text-align: justify; vertical-align: bottom; height: 200px; width: 726px;"><span>
	El Instituto de Elecciones podrá utilizar sus datos personales para elaborar informes; generar las constancias respectivas; establecer comunicación para dar seguimiento a la conclusión de las fases del proceso de selección y designación de las personas Supervisoras y Capacitadoras Asistentes Electorales del Instituto de Elecciones, durante el Proceso Electoral Local Ordinario 2024; difundir en medios de comunicación el seguimiento a las fases del mismo; utilizar la imagen, voz, video y/o entrevista de las personas aspirantes en plataformas digitales del Instituto; elaborar estadísticas, teniendo la certeza que es información fidedigna; aclarar dudas sobre sus datos, ya sea por error o imprecisión; notificar la cancelación o cambio de horario, fecha o sede; llevar a cabo la promoción y difusión de las actividades que el Instituto organiza en ejercicio de sus atribuciones y como parte de las actividades relativas a la construcción de la ciudadanía y el fortalecimiento de la Democracia en la entidad; en su caso, realizada la designación/contratación, vigilar y verificar el cumplimiento de las obligaciones derivadas de las disposiciones legales, reglamentos, lineamientos, manuales y diversa normatividad vigentes que regulen el funcionamiento del Instituto; dar seguimiento a las declaraciones de situación patrimonial y de intereses que deben presentar las personas servidoras públicas; así como dar seguimiento a los actos administrativos de entrega y recepción de los recursos que le fueron asignados para el desempeño de sus funciones, en los términos que establezca la normatividad aplicable. Si desea conocer nuestro aviso de privacidad integral consulte la siguiente dirección electrónica: https://www.iepc-chiapas.org.mx/avisos-de-privacidad</span>
</td>
</table>


</body>
</html>
