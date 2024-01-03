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
            height: 2cm;
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
                <td style="width: 20% " rowspan="3"><img src="C:\laragon\www\ecae\public\imgs\LOGO_out.png" width="110px" height="80px" alt=""></td>
                <td style="width: 80%; text-align: center; font-size: 14pt; letter-spacing: 10px;">SOLICITUD</td>
            </tr>
            <tr>
                <td style="width: 80%; text-align: center; font-size: 8pt; color: #808080;">SUPERVISORA/O ELECTORAL LOCAL O CAPACITADORA/O ASISTENTE ELECTORAL LOCAL(HONORARIOS)</td>
            </tr>
            <tr>
                <td style="width: 80%; text-align: center; font-size: 8pt; color: #808080;">PROCESO ELECTORAL 2023-2024</td>
            </tr>
        </tbody>
    </table>
</header>

<!--INICIA PÁGINA 01 -->

    <!--INICIA SECCION 01 -->

<table class="inicio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 110px; font-size: 7pt;">FECHA DE RECEPCIÓN</td>
			<td class="rosa" style="width: 40%;"></td>
			<td class="blanco" style="width: 121px; font-size: 7pt;">NÚM. DE CONVOCATORIA</td>
			<td class="rosa" style="width: 20%;"></td>
			<td class="blanco" style="width: 155px; font-size: 7pt;">FOLIO DE LA PERSONA ASPIRANTE</td>
			<td class="rosa" style="width: 40%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 50px; font-size: 7pt;">MUNICIPIO</td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="blanco" style="width: 55px; font-size: 7pt;">LOCALIDAD</td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 30px; font-size: 7pt;">SEDE</td>
			<td class="rosa" style="width: 70%;"></td>
			<td class="blanco" style="width: 30px; font-size: 7pt;">FIJA</td>
			<td class="rosa" style="width:  15%;"></td>
            <td class="blanco" style="width: 50px; font-size: 7pt;">ALTERNA</td>
			<td class="rosa" style="width:  15%;"></td>
		</tr>
	</tbody>
</table>

<table class="final">
	<tbody>
		<tr>
			<td class="blanco" style="width: 110px; font-size: 7pt;">LA PERSONA ASPIRANTE</td>
			<td class="rosa" style="width: 85%;"></td>
			<td class="blanco" style="width: 200px; font-size: 7pt;">ENTREGÓ LA SIGUIENTE DOCUMENTACIÓN:</td>
			<td class="rosa" style="width:  15%;"></td>
		</tr>
	</tbody>
</table>

    <!--TERMINA SECCION 01 -->

    <!--INICIA SECCION 02 -->

<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 615px; font-size: 7pt;"></td>
			<td class="blanco" style="width: 50%; text-align: center;">Mostró<br>original</td>
			<td class="blanco" style="width: 50%; text-align: center;">Entregó<br>copia</td>
        </tr>
	</tbody>
</table>

<table class="inicio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 15px; font-size: 7pt;">1.</td>
			<td class="rosa" style="width: 600px; text-align: left;">En su caso, Solicitud correctamente llenada y firmada.</td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt;  text-align: center;">2.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Acta de nacimiento (original o copia certificada y copia simple), o en su caso, Carta de Naturalización.</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 15px; font-size: 7pt;">3.</td>
			<td class="rosa" style="width: 600px; text-align: left;">Credencial para Votar o comprobante de trámite.</td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">4.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Comprobante de domicilio.</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 15px; font-size: 7pt;">5.</td>
			<td class="rosa" style="width: 600px; text-align: left;">Constancia de estudios (no tira de materias).</td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">6.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Declaratoria bajo protesta de decir la verdad(firmada).</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
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
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">7.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Copia de la Clave Única del Registro de Población (CURP).</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 15px; font-size: 7pt;">8.</td>
			<td class="rosa" style="width: 600px; text-align: left;">Constancia del Registro Federal de Contribuyentes(RFC).</td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">9.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Tres fotografías tamaño infantil a color o en blanco y negro*</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
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
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">10.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Carta que acredite su experiencia como docente, manejo o trato de grupos de personas (el no contar con ella no será causa de exclusión de la persona aspirante).</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 15px; font-size: 7pt;">11.</td>
			<td class="rosa" style="width: 600px; text-align: left;">Constancia de participación en algún Proceso Electoral Concurrente, Federal o Local </td>
			<td class="rosa" style="width: 50%;"></td>
			<td class="rosa" style="width: 50%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">12.</td>
			<td class="blanco" style="width: 600px; text-align: left;">Licencia de manejo vigente (el no contar con ella no será causa de exclusión de la persona aspirante).</td>
			<td class="blanco" style="width: 50%;"></td>
			<td class="blanco" style="width: 50%;"></td>
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

<table class="enmedio" style="height: 15pt;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;"></td>			
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

<table class="enmedio" style="height: 30pt;">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center; vertical-align:bottom;">_____________________________________________________________________________</td>			
		</tr>
    </tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 100%; font-size: 8pt; text-align: center; font-weight: bold;">ACUSE DE RECIBO</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 50px;">Del (la) C.</td>
			<td class="rosa" style="width: 300px;"></td>
			<td class="rosa" style="width: 140px; text-align: start;">,aspirante a ocupar el cardo de</td>
			<td class="rosa" style="width: 100%;"></td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 450px; text-align: start;">Supervisor/a Electoral Local o Capacitador/a Asistente Electoral Local, inscrito (a) en el Órgano Local Electoral</td>
			<td class="rosa" style="width: 30px;"></td>
			<td class="rosa" style="width: 140px; text-align: start;">en el estado de <span style="text-decoration-line: underline;">CHIAPAS</span> con</td>
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="rosa" style="width: 500px; text-align: start;">fecha <span>&nbsp /</span> <span>&nbsp /</span> <span>&nbsp /</span>se recibió la siguiente documentación.</td>
			<td class="rosa" style="width: 30px;"></td>
			
		</tr>
	</tbody>
</table>

<table class="enmedio">
	<tbody>
		<tr>
			<td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">Entregó</td>
            <td class="blanco" style="width: 15px; font-size: 7pt; text-align: center;">Entregó</td>			
		</tr>
    </tbody>
</table>

<!--TERMINA SECCION 02 -->

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 50pt;">
        <tr>
            <td style="text-align: center; font-size: 6pt;"> LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES Y CAPACITADORES/AS-ASISTENTES ELECTORALES | ANEXO 21.1 SOLICITUD 
        </td>
        </tr>
    </table>
</footer>

<!-- SALTO DE PÁGINA -->
<table class="saltopagina"></table>



   
</body>
</html>