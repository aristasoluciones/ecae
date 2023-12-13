<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="">
    table.inicio {
    width: 100%;
    border: 1pt solid #AD84C6;
    border-bottom: none;
    border-collapse: collapse;
    table-layout: fixed;
    width: 726px;
}
table.enmedio {
width: 100%;
border: 1pt solid #AD84C6;
border-top: none;
border-bottom: none;
border-collapse: collapse;
table-layout: fixed;
width: 726px;
}
table.final {
    width: 100%;
    border: 1pt solid #AD84C6;
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

<!--INICIA SECCION 01 -->

<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
	<tbody>
		<tr>
			<td>C. _____________________________________</td>
		</tr>
		<tr>
			<td>REPRESENTANTE DEL ORGANISMO PÚBLICO LOCAL</td>
		</tr>
		<tr>
			<td>EN EL ESTADO DE CHIAPAS</td>
		</tr>
		<tr>
			<td>PRESENTE</td>
		</tr>
	</tbody>
</table>

<!--TERMINA SECCION 01 -->

<!--INICIA SECCION 02 -->

<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
	<tbody>
		<tr>
			<td>
                <P style="text-align: justify;">Con fundamento en el artículo 303, numeral 3 de la Ley General de Instituciones y Procedimientos Electorales, con el objeto de cumplir con los requisitos legales que me permitan aspirar a participar en el Organismo Público Local como Supervisor/a Electoral Local o Capacitador/a-Asistente Electoral Local durante el Proceso Electoral 2023-2024, en el Organismo Público Local</P>
            </td>
		</tr>
    </tbody>

</table>

<!--TERMINA SECCION 02 -->

<!--INICIA SECCION 03 -->
<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
	<tbody>
		<tr>
			<td>
                <P style="text-align: center;">DECLARO BAJO PROTESTA DE DECIR VERDAD</P>
            </td>
		</tr>
    </tbody>

</table>

<!--TERMINA SECCION 03 -->

<!--INICIA SECCION 04 -->
<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt; text-align: left;">
	<tbody>
		<tr>
			<td>
                <ul type="square">
                    <li>Ser ciudadano (a) mexicano (a) y estar en pleno goce y ejercicio de mis derechos políticos y civiles.
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li>Tener {{ $aspirante->edad }} edad.
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li> <p style="text-align: justify;">Mi domicilio se encuentra en:  Calle <span style="text-decoration-line: underline;">{{mb_strtoupper ($aspirante->dom_calle)}}</span> número <span style="text-decoration-line: underline;">{{mb_strtoupper ($aspirante->dom_calle)}}</span> Colonia <span style="text-decoration-line: underline;">{{mb_strtoupper ($aspirante->dom_colonia)}}</span> municipio <span style="text-decoration-line: underline;">{{mb_strtoupper ($aspirante->dom_municipio)}}</span> Estado <span style="text-decoration-line: underline;" style="text-decoration-line: underline;">CHIAPAS</span>código postal <span style="text-decoration-line: underline;">{{mb_strtoupper ($aspirante->dom_postal)}}</span>.
                        Tel. casa <span style="text-decoration-line: underline;">{{ $aspirante->tel_fijo }}</span> Tel. celular <span style="text-decoration-line: underline;">{{ $aspirante->tel_celular }}</span></p>.
                        
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li> <p style="text-align: justify;">Estar de acuerdo en sujetarme a las evaluaciones que determinen las autoridades del Organismo Público Local.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">Tener disposición para dedicarme a las actividades para las que se me contrate, de tiempo completo para cubrirlas a cabalidad en las condiciones en que se requiera; por lo que me obligo a cumplir completamente y de manera prioritaria los servicios y actividades objeto de la contratación, dedicando el tiempo necesario para llevarlos a cabo, siendo incompatible cualquier otro empleo dentro del periodo y tiempo destinado para la realización de éstos. En su caso, apoyar en las actividades que se realicen durante el cómputo local y demás relacionadas en el contrato de prestación de servicios.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">Devolver las prendas de identificación, el material y/o los instrumentos de trabajo proporcionados por el Organismo Público Local, una vez concluido el periodo de contratación.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">No ser familiar consanguíneo o por afinidad, hasta cuarto grado, de algún/a vocal de la Junta Local o Distrital Ejecutiva del INE o del Consejo Distrital o Local del INE o de órganos ejecutivos y directivos del OPL (consejeros/as y/o representantes de partidos políticos o candidaturas independientes del PE 2023-2024).</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">No estar en este momento inhabilitado en el Sistema de Registro de Servidores Públicos Sancionados de la Secretaría de la Función Pública.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">De igual forma, declaro bajo protesta de decir verdad, que no he militado en ningún partido político u organización política en el último año previo a esta convocatoria, ni soy simpatizante de alguno de éstos. No fui representante de partido político, candidatura independiente que participe en el PE 2023-2024 o coalición ante casilla en los últimos tres años en procesos electorales federales o estatales, ni he participado activamente en alguna campaña electoral.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">Manifiesto que no he sido persona servidora pública vinculada con programas sociales en el gobierno municipal, estatal o federal, ni ser persona operadora de programas sociales y actividades institucionales, cualquiera que sea su denominación, no ser persona servidora de la nación o haber ostentado alguno de estos cargos en el último año previo a este registro para el Proceso Electoral Concurrente 2023-2024.*</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">Autorizo al Organismo Público Local para que realice las investigaciones que considere pertinentes, en relación con lo manifestado y declarado en los puntos anteriores y en caso de incurrir en falsedad, se dé por terminada mi relación contractual sin responsabilidad para el Organismo Público Local.</p>
                    </li>
                </ul>
            </td>
		</tr>
		<tr>
			<td>
                <ul type="square">
                    <li><p style="text-align: justify;">En caso de contratación, durante las actividades de supervisión electoral, capacitación y asistencia electoral me conduciré conforme a los principios de certeza, legalidad, independencia, imparcialidad, máxima publicidad, objetividad, paridad y se realizarán con perspectiva de género.</p> 
                    </li>
                </ul>
            </td>
		</tr>
	</tbody>
</table>
<!--TERMINA SECCION 04 -->

<!--INICIA SECCION 05 -->
<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
	<tbody>
		<tr>
			<td style="text-align: center;">_____________________ <br>NOMBRE COMPLETO</td>
			<td style="text-align: center;">_____________________ <br>FECHA</td>
			<td style="text-align: center;">_____________________ <br>FIRMA</td>
		</tr>
	</tbody>
</table>
<!--TERMINA SECCION 05 -->

<!--INICIA PIE DE PAGINA-->

<table style="table-layout: fixed; width: 726px; margin-bottom: 10pt;">
	<tbody>
		<tr>
			<td>
                <p style="text-align: justify; font-size: xx-small;">* En cumplimiento al acuerdo INE/CG535/2023 por el que se emiten los Lineamientos en acatamiento a la sentencia dictada por la sala superior del TEPJF en el expediente SUP-RAP-04/2023 y acumulados, que establecen medidas preventivas para evitar la injerencia y/o participación de personas servidoras públicas que manejan programas sociales en el Proceso Electoral Federal y los Procesos Electorales Locales 2023-2024, en la Jornada Electoral.</p>
            </td>
			<td>
                <p style="text-align: right; font-size: small; color: #808080;">LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y <br> CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES <br> Y CAPACITADORES/AS-ASISTENTES ELECTORALES <br>| ANEXO 21.2. DECLARATORIA BAJO PROTESTA DE DECIR VERDAD.</p>
            </td>
		</tr>
	</tbody>
</table>


<!--TERMINA PIE DE PAGINA -->