<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="">

body {
            margin-top: 3cm;
            margin-left: 0.3cm;
            }

header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            }

footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            }

 
</style>
</head>
<body>

<!--LOGO Y ENCABEZADO-->
<header>
<table style="table-layout: fixed; width: 726px;">
	<tbody>
		<tr border-collapse: collapse;>
        <td style="width: 20% " rowspan="3"><img  src="../public/imgs/logoEAE2024.png" width="110px" height="80px" alt=""></td>
                <td style="width: 60%; text-align: center; font-size: 12pt;">DECLARATORIA BAJO PROTESTA DE DECIR VERDAD</td>
                <td style="width: 20% " rowspan="3"><img style="text-align: right;" src="../public/imgs/logoIEPC.png" width="150px" height="80px" alt=""></td>
		</tr>
		<tr>
			<td style="width: 60%; text-align: center; font-size: 8pt; color: #808080;">SUPERVISORA/O ELECTORAL LOCAL O CAPACITADORA/O ASISTENTE ELECTORAL LOCAL(HONORARIOS)</td>
		</tr>
        <tr>
			<td style="width: 60%; text-align: center; font-size: 8pt; color: #808080;">PROCESO ELECTORAL 2023-2024</td>
		</tr>

        
	</tbody>
</table>
		</header>

<!--INICIA SECCION 01 -->

<table style="table-layout: fixed; width: 726px; font-size: 10pt;">
	<tbody>
		<tr>
			<td>C. MARÍA MAGDALENA VILA DOMÍNGUEZ</td>
		</tr>
		<tr>
			<td>CONSEJERA PRESIDENTA PROVISIONAL DEL INSTITUTO</td>
		</tr>
		<tr>
			<td>DE ELECCIONES Y PARTICIPACIÓN CIUDADANA DE CHIAPAS</td>
		</tr>
		<tr>
			<td>P R E S E N T E</td>
		</tr>
	</tbody>
</table>

<!--TERMINA SECCION 01 -->

<!--INICIA SECCION 02 -->

<table style="table-layout: fixed; width: 726px; font-size: 10pt; text-align: justify; ">
	<tbody>
		<tr>
			<td>
                Con fundamento en el artículo 303, numeral 3 de la Ley General de Instituciones y Procedimientos Electorales, con el objeto de cumplir con los requisitos legales que me permitan aspirar a participar en el Organismo Público Local como Supervisor/a Electoral Local o Capacitador/a-Asistente Electoral Local durante el Proceso Electoral 2023-2024, en el Organismo Público Local
            </td>
		</tr>
		<tr>
			<td style="text-align: center; font-size: 8pt;">DECLARO BAJO PROTESTA DE DECIR VERDAD</td>
		</tr>
    </tbody>
</table>
<!--TERMINA SECCION 02 -->

<!--INICIA SECCION 04 -->
<table style="table-layout: fixed; width: 726px; text-align: justify; font-size: 10pt;">
	<tbody>
		<tr>
			<td>
                <ul type="square">
                    <li>Ser ciudadano (a) mexicano (a) y estar en pleno goce y ejercicio de mis derechos políticos y civiles.</li>
                    <li>Tener <u>{{ $aspirante->edad }}</u> edad.</li>
                    <li> Mi domicilio se encuentra en:  Calle <u>{{mb_strtoupper ($aspirante->dom_calle)}}</u>, @if($aspirante->dom_num_exterior)<span>No. exterior <u>{{mb_strtoupper ($aspirante->dom_num_exterior)}}</u>,</span> @else<span></span>@endif @if ($aspirante->dom_num_interior)<span>No. interior <u>{{mb_strtoupper ($aspirante->dom_num_interior)}}</u>,</span>@else <span></span>@endif<span> Colonia <u>{{mb_strtoupper ($aspirante->dom_colonia)}}</u>, municipio <u>{{mb_strtoupper($aspirante->dom_municipio)}}</u>, Estado <u>CHIAPAS</u>, código postal <u>{{mb_strtoupper ($aspirante->dom_postal)}}</u>. @if($aspirante->tel_fijo)<span>Tel. casa <u>{{$aspirante->tel_fijo}}</u>,</span> @else<span></span>@endif Tel. celular <u><span>{{ $aspirante->tel_celular}}</span></u>.</li>
                    <li> Estar de acuerdo en sujetarme a las evaluaciones que determinen las autoridades del Organismo Público Local.</li>
                    <li><b>Tener disposición para dedicarme a las actividades para las que se me contrate, de tiempo completo para cubrirlas a cabalidad en las condiciones en que se requiera</b>; por lo que me obligo a cumplir completamente y de manera prioritaria los servicios y actividades objeto de la contratación, dedicando el tiempo necesario para llevarlos a cabo, <u><b>siendo incompatible cualquier otro empleo dentro del periodo y tiempo destinado para la realización de éstos.</b></u> En su caso, apoyar en las actividades que se realicen durante el cómputo local y demás relacionadas en el contrato de prestación de servicios.</li>
                    <li>Devolver las prendas de identificación, el material y/o los instrumentos de trabajo proporcionados por el Organismo Público Local, una vez concluido el periodo de contratación.</li>
                    <li>No ser familiar consanguíneo o por afinidad, hasta cuarto grado, de algún/a vocal de la Junta Local o Distrital Ejecutiva del INE o del Consejo Distrital o Local del INE o de órganos ejecutivos y directivos del OPL (consejeros/as y/o representantes de partidos políticos o candidaturas independientes del PE 2023-2024).</li>
                    <li>No estar en este momento inhabilitado en el Sistema de Registro de Servidores Públicos Sancionados de la Secretaría de la Función Pública.</li>
                    <li>De igual forma, declaro bajo protesta de decir verdad, que no he militado en ningún partido político u organización política en el último año previo a esta convocatoria, ni soy simpatizante de alguno de éstos. No fui representante de partido político, candidatura independiente que participe en el PE 2023-2024 o coalición ante casilla en los últimos tres años en procesos electorales federales o estatales, ni he participado activamente en alguna campaña electoral.</li>
                    <li>Manifiesto que no he sido persona servidora pública vinculada con programas sociales en el gobierno municipal, estatal o federal, ni ser persona operadora de programas sociales y actividades institucionales, cualquiera que sea su denominación, no ser persona servidora de la nación o haber ostentado alguno de estos cargos en el último año previo a este registro para el Proceso Electoral Concurrente 2023-2024.*</li>
                    <li>Autorizo al Organismo Público Local para que realice las investigaciones que considere pertinentes, en relación con lo manifestado y declarado en los puntos anteriores y en caso de incurrir en falsedad, se dé por terminada mi relación contractual sin responsabilidad para el Organismo Público Local.</li>
                    <li>En caso de contratación, durante las actividades de supervisión electoral, capacitación y asistencia electoral me conduciré conforme a los principios de certeza, legalidad, independencia, imparcialidad, máxima publicidad, objetividad, paridad y se realizarán con perspectiva de género.</li>
                </ul>
            </td>
		</tr>
	</tbody>
</table>
<!--TERMINA SECCION 04 -->

<!--INICIA SECCION 05 -->
<table style="table-layout: fixed; width: 726px; font-size: 8pt; margin-top: 20pt">
	<tbody>
		<tr>
			<td style="text-align: center;"><u>{{mb_strtoupper ($aspirante->nombre) }} {{mb_strtoupper ($aspirante->apellido1) }} {{mb_strtoupper ($aspirante->apellido2) }}</u><br>NOMBRE COMPLETO</td>
			<td style="text-align: center;"><u>{{date ("Y-m-d", strtotime($aspirante->created_at)) }} </u><br>FECHA</td>
			<td style="text-align: center;">_____________________ <br>FIRMA</td>
		</tr>
	</tbody>
</table>

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 5pt;">
        <tr>
            <td style="text-align: center; font-size: 8pt; text-align: justify;">* En cumplimiento al acuerdo INE/CG535/2023 por el que se emiten los Lineamientos en acatamiento a la sentencia dictada por la sala superior del TEPJF en el expediente SUP-RAP-04/2023 y acumulados, que establecen medidas preventivas para evitar la injerencia y/o participación de personas servidoras públicas que manejan programas sociales en el Proceso Electoral Federal y los Procesos Electorales Locales 2023-2024, en la Jornada Electoral.
        </td>
		<td style="text-align: center; font-size: 8pt; text-align: right;"> LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y <br>CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES <br>Y CAPACITADORES/AS-ASISTENTES ELECTORALES <br>| ANEXO 21.2. DECLARATORIA BAJO PROTESTA DE DECIR VERDAD

        </td>
        </tr>
    </table>
</footer>

</body>
</html>
<!--TERMINA SECCION 05 -->

<!--INICIA PIE DE PAGINA-->

<!--TERMINA PIE DE PAGINA -->