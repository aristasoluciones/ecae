<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="">

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
font-family: Arial, Helvetica, sans-serif;
}
/** Definimos las reglas del encabezado **/
header {
position: fixed;
top: 0cm;
left: 0.3cm;
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
table.header {
table-layout: fixed;
width: 726px;
}
table.cuerpo {
table-layout: fixed;
width: 726px;
border-collapse: collapse;
border: 1px solid rgb(231, 12, 117);
}
td.rojoTi01{
background: rgb(231, 12, 117);
font-size: 12pt;
color: #FFFFFF;
text-align: center;
font-weight: bold;
border: 1px solid rgb(231, 12, 117);
}
td.rojo{
font-size: 8pt;
width: 5%;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
td.rojo2{
background: rgb(231, 12, 117);
font-size: 8pt;
color: #FFFFFF;
text-align: center;
font-weight: bold;
border: 1px solid rgb(231, 12, 117);
}
td.blanconumber {
font-size: 8pt;
width: 5%;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
td.blancocompe{
font-size: 10pt;
width: 100%;
text-align: center;
font-weight: bold;
border: 1px solid rgb(231, 12, 117);
}
td.blancotexto{
font-size: 8pt;
width: 80%;
text-align: left;
border: 1px solid rgb(231, 12, 117);
}
td.blancocali{
font-size: 8pt;
width: 15%;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
td.blancosi{
font-size: 8pt;
width: 10%;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
td.blancono{
font-size: 8pt;
width: 10%;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
td.blancognl{
font-size: 8pt;
text-align: justify;
border: 1px solid rgb(231, 12, 117);
}
td.blancognl2{
font-size: 8pt;
text-align: center;
border: 1px solid rgb(231, 12, 117);
}
table.saltopagina {
page-break-before: always;
}


 
</style>
</head>
<body>
<header>
    <table class="header">
        <tbody>
            <tr>
                <td style="width: 33%;" align="center" valign="middle"><img
                        src="../public/imgs/logoIEPC.png" width="150px"
                        height="80px" salt=""></td>
                <td style="width: 33%;" align="center" valign="middle"><img
                        src="../public/imgs/logoEAE2024.png" width="140px"
                        height="80px" alt=""></td>
                <td style="width: 33%;" align="center" valign="middle"><img
                        src="../public/imgs/pelo_2024.png" width="170px"
                        height="100px" alt=""></td>
            </tr>
        </tbody>
    </table>
</header>
<!--CARATULA DE ENTREVISTA-->

<table class="cuerpo">
    <tbody>
        <tr>
            <td class="rojoTi01" colspan="3">CARÁTULA DE ENTREVISTA PARA SEL</td>
        </tr>
        <tr>
            <td class="blancognl" rowspan="2" style="text-align: justify; width: 60%; padding: 5px;">PARA EL LLENADO DEBERA USAR PLUMA EN COLOR NEGRO O AZUL Y LLENAR CON LETRA MOLDE Y LEGIBLE. LA INFORMACION PRE-LLENADA DEBERA CONFIRMARSE CON LA PERSONA ASPIRANTE.</td>
            <td class="blancognl" style="text-align: center; with: 15%;">FECHA DE ENTREVISTA</td>
            <td class="blancognl" style="text-align: center; with: 15%;">No. FOLIO DEL ASPIRANTE:</td>
        </tr>
        <tr>
            <td class="blancognl" style="text-align: center; width: 20%;">{{date ("Y-m-d", strtotime($aspirante->entrevista->created_at))}}</td>
            <td class="blancognl" style="text-align: center; width: 20%;">{{mb_strtoupper ($aspirante->id)}}&nbsp;</td>
        </tr>
    </tbody>
</table>

<!--INFORMACION GENERAL-->
<table class="cuerpo">
	<tbody>
		<tr>
			<td class="rojoTi01" colspan="8">INFORMACION GENERAL DE LA PERSONA ASPIRANTE</td>
		</tr>
		<tr>
			<td class="rojo" style="width: 25%">NOMBRE</td>
			<td class="rojo" style="width: 25%">APELLIDO PATERNO</td>
			<td class="rojo" style="width: 25%">APELLIDO MATERNO</td>
			<td class="rojo" style="width: 5%">EDAD</td>

            @if ($aspirante->genero=='Femenino')
			        <td class="rojo" style="background: rgb(219, 215, 204); width: 3%"><span>F</span></td>
                    @else
                    <td class="rojo" style="width: 3%"><span>F</span></td>
            @endif

            @if ($aspirante->genero=='Masculino')
			        <td class="rojo" style="background: rgb(219, 215, 204); width: 3%"><span>M</span></td>
                    @else
                    <td class="rojo" style="width: 3%"><span>M</span></td>
            @endif

            @if ($aspirante->genero=='Otro')
			        <td class="rojo" style="background: rgb(219, 215, 204); width: 5%"><span>OTRO</span></td>
                    @else
                    <td class="rojo" style="width: 5%"><span>OTRO</span></td>
            @endif

            @if ($aspirante->persona_lgbtttiq=='Si')
			        <td class="rojo" style="background: rgb(219, 215, 204); width: 10%"><span>LGBTTTIQ+</span></td>
                    @else
                    <td class="rojo" style="width: 10%"><span>LGBTTTIQ+</span></td>
            @endif

			
		</tr>
		<tr>
			<td class="blancognl2">{{mb_strtoupper ($aspirante->nombre) }}</td>
			<td class="blancognl2">{{mb_strtoupper ($aspirante->apellido1) }}&nbsp;</td>
			<td class="blancognl2">{{mb_strtoupper ($aspirante->apellido2) }}&nbsp;</td>
			<td class="blancognl2">{{ $aspirante->edad }}&nbsp;</td>
			<td class="rojo" colspan="4">GÉNERO</td>
		</tr>
	</tbody>
</table>

<!--ULTIMO GRADO DE ESTUDIO-->
<table class="cuerpo">
	<tbody>
        <tr>
            <td class="rojoTi01" colspan="7">INDIQUE EL ULTIMO GRADO DE ESTUDIOS CONCLUIDA</td>
        </tr>
		<tr>
			<td class="rojo" style="width: 9%">PRIMARIA</td>
			<td class="rojo" style="width: 11%">SECUNDARIA</td>
			<td class="rojo" style="width: 13%">BACHILLERATO</td>
			<td class="rojo" style="width: 13%">LICENCIATURA</td>
			<td class="rojo" style="width: 13%">MAESTRÍA</td>
			<td class="rojo" style="width: 10%">DOCTORADO</td>
			<td class="rojo" style="width: 31%">NOMBRE DE LA CARRERA</td>
		</tr>
		<tr>
            @if (in_array($aspirante->ultimo_grado_estudio,['Primaria Primer grado','Primaria Segundo grado','Primaria Tercer grado','Primaria Cuarto grado','Primaria Quinto grado','Primaria Sexto grado']))
                <td class="rojo" style="width: 9%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 9%">&nbsp;</td>
            @endif

            @if (in_array($aspirante->ultimo_grado_estudio,['Secundaria Primer grado','Secundaria Segundo grado','Secundaria Tercero grado',]))
                <td class="rojo" style="width: 11%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 11%">&nbsp;</td>
            @endif

            @if (in_array($aspirante->ultimo_grado_estudio,['Bachillerato/preparatoria Primer grado','Bachillerato/preparatoria Segundo grado','Bachillerato/preparatoria Tercero grado']))
                <td class="rojo" style="width: 13%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 13%">&nbsp;</td>
            @endif

            @if (in_array($aspirante->ultimo_grado_estudio,['Licenciatura Primer año','Licenciatura Segundo año','Licenciatura Tercero año','Licenciatura Cuarto año','Licenciatura Quinto año','Licenciatura concluida','Licenciatura titulado']))
                <td class="rojo" style="width: 10%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 10%">&nbsp;</td>
            @endif

            @if (in_array($aspirante->ultimo_grado_estudio,['Maestria']))
                <td class="rojo" style="width: 13%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 13%">&nbsp;</td>
            @endif

            @if (in_array($aspirante->ultimo_grado_estudio,['Doctorado']))
                <td class="rojo" style="width: 10%"><span  style="font-family: DejaVu Sans, sans-serif; font-size: 18px;">&#10004;</span>&nbsp;</td>
                @else
                <td class="rojo" style="width: 10%">&nbsp;</td>
            @endif

			@if ($aspirante->carrera)
                <td class="rojo" style="width: 31%"><span>{{mb_strtoupper ($aspirante->carrera) }}</span></td>
                @else
                <td class="rojo" style="width: 31%">&nbsp;</td>
            @endif
		</tr>
        
	</tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
            
            <td class="rojo" style="width: 25%">ULTIMO EMPLEO / ACTUAL</td>
            
            @for ($i = 0; $i <= 2; $i++) {
                @if ($aspirante->experiencia_laboral)
                    <td class="rojo" style="width: 25%">{{mb_strtoupper ($aspirante->experiencia_laboral[$i]['puesto'])}}</td>
                @endif
            }
            @endfor    



			<td class="rojo" style="width: 25%">¿HABLA ALGUNA LENGUA INDIGENA?<br>Especifique:</td>
            @if ($aspirante->entrevista->habla_indigena =='SI')
			        <td class="rojo" style="width: 25%"><span>{{mb_strtoupper ($aspirante->entrevista->cual_lengua_indigena)}}</span></td>
                    @else
                    <td class="rojo" style="width: 10%"><span>&nbsp;</span></td>
            @endif				
		</tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 100%;">¿CUÁL ES EL MOTIVO POR EL QUE QUIERE PARTICIPAR COMO SEL?</td>
    </tr>
    </tbody>
</table>
<table class="cuerpo" >
	<tbody>
    <tr>
        <td class="blancognl" style="width: 100%;height: 50px;">{{mb_strtoupper ($aspirante->entrevista->motivo_participar)}}&nbsp;</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo" >
	<tbody>
    <tr>
        <td class="blanconumber">1</td>
        <td class="blancognl" style="width: 75%;">¿Tiene disponibilidad para trabajar de lunes a domingo, días festivos y en horarios fuera de lo habitual?</td>
        @if ($aspirante->entrevista->disponibilidad=='SI')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>SI</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>SI</span></td>
        @endif

        @if ($aspirante->entrevista->disponibilidad=='NO')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>NO</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>NO</span></td>
        @endif  
    </tr>
    </tbody>
</table>

<table class="cuerpo" >
	<tbody>
    <tr>
        <td class="blanconumber">2</td>
        <td class="blancognl" style="width: 75%;">¿Podrías realizar trabajos de campo, visitas de casa en casa, recorrer distancias largas entre otras actividades de acuerdo al perfil requerido?</td>
        @if ($aspirante->entrevista->trabajo_campo=='SI')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>SI</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>SI</span></td>
        @endif

        @if ($aspirante->entrevista->trabajo_campo=='NO')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>NO</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>NO</span></td>
        @endif  
    </tr>
    </tbody>
</table>

<table class="cuerpo" >
	<tbody>
    <tr>
        <td class="blanconumber">3</td>
        <td class="blancognl" style="width: 75%;">¿Has participado en algún proceso electoral?</td>
        @if ($aspirante->entrevista->participo_pe=='SI')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>SI</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>SI</span></td>
        @endif

        @if ($aspirante->entrevista->participo_pe=='NO')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>NO</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>NO</span></td>
        @endif  
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blanconumber"></td>
        <td class="blancognl" style="width: 50%;">En caso de responder SI, que cargo, tiempo y donde ¿especifique?</td>
        @if ($aspirante->entrevista->participo_pe=='SI')
            <td class="blancognl" style="width: 45%; text-align:center;"><span>{{mb_strtoupper ($aspirante->entrevista->cargo_tiempo_donde_pe)}}</span></td>
            @else
            <td class="blancosi" style="width: 45%"><span></span></td>
        @endif        
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blanconumber">4</td>
        <td class="blancognl" style="width: 75%;">¿Has colaborado con algún partido político, organizaciones civiles?</td>
        @if ($aspirante->entrevista->colaborado_pp_oc=='SI')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>SI</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>SI</span></td>
        @endif

        @if ($aspirante->entrevista->colaborado_pp_oc=='NO')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>NO</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>NO</span></td>
        @endif  
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blanconumber"></td>
        <td class="blancognl" style="width: 50%;">En caso de responder SI, que cargo, tiempo y donde ¿especifique?</td>
        @if ($aspirante->entrevista->colaborado_pp_oc=='SI')
            <td class="blancognl" style="width: 45%; text-align:center;"><span>{{mb_strtoupper ($aspirante->entrevista->cargo_tiempo_donde_pp_oc)}}</span></td>
            @else
            <td class="blancosi" style="width: 45%"><span></span></td>
        @endif     
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 100%">COMPETENCIAS (40 %)</td>
    </tr>
    <tr>
        <td class="blancognl" style="width: 100%; font-weight: bold; text-align:center;">1: No lo demostró, 2: Insuficiente, 3: Regular, 4: Aceptable, 5: Consolidado o excelente</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 85%">SEL</td>
        <td class="rojoTi01" style="width: 15%; font-size: 10pt;">CALIFICACIÓN</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancocompe">Liderazgo (20 PUNTOS)</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
    <tbody>
        <tr>
            @if($aspirante->entrevista->competencias[0]['valor_pregunta'] == 1)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">1</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame algún ejemplo en el que hayas tomado la iniciativa en un proyecto difícil.</td>
            <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[0]['valor_pregunta'] == 1 ? $aspirante->entrevista?->competencias[0]['valor_respuesta'] : '' }}</td>
            @else
            <td class="blanconumber">1</td>
            <td class="blancotexto">Cuéntame algún ejemplo en el que hayas tomado la iniciativa en un proyecto difícil.</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
            @if($aspirante->entrevista->competencias[0]['valor_pregunta'] == 2)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">2</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Relata una situación en la que asumiste el papel de líder. ¿Qué desafíos afrontaste y cómo los abordaste?</td>
            <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[0]['valor_pregunta'] == 2 ? $aspirante->entrevista?->competencias[0]['valor_respuesta'] : '' }}</td>
            @else
            <td class="blanconumber">2</td>
            <td class="blancotexto">Relata una situación en la que asumiste el papel de líder. ¿Qué desafíos afrontaste y cómo los abordaste?</td>
            <td class="blancocali"></td>
            @endif
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
            @if($aspirante->entrevista->competencias[0]['valor_pregunta'] == 3)
                <td class="blanconumber" style=" background: rgb(219, 215, 204);">3</td>
                <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Qué hace para mantener a su equipo motivado y comprometido? Deme un ejemplo:</td>
                <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[0]['valor_pregunta'] == 3 ? $aspirante->entrevista?->competencias[0]['valor_respuesta'] : '' }}</td>
                @else
                <td class="blanconumber">2</td>
                <td class="blancotexto">¿Qué hace para mantener a su equipo motivado y comprometido? Deme un ejemplo:</td>
                <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
            @if($aspirante->entrevista->competencias[0]['valor_pregunta'] == 4)
                <td class="blanconumber" style=" background: rgb(219, 215, 204);">4</td>
                <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Cómo lo hace para distribuir y delegar tareas a su equipo de trabajo?</td>
                <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[0]['valor_pregunta'] == 4 ? $aspirante->entrevista?->competencias[0]['valor_respuesta'] : '' }}</td>
                @else
                <td class="blanconumber">4</td>
                <td class="blancotexto">¿Cómo lo hace para distribuir y delegar tareas a su equipo de trabajo?</td>
                <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancocompe">Trabajo bajo presión (20 PUNTOS)</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[1]['valor_pregunta'] == 1)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">1</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Hábleme de un problema difícil que haya podido resolver ¿cómo lo resolvió y que resultados obtuvo?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[1]['valor_pregunta'] == 1 ? $aspirante->entrevista?->competencias[1]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">1</td>
            <td class="blancotexto">Hábleme de un problema difícil que haya podido resolver ¿cómo lo resolvió y que resultados obtuvo?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[1]['valor_pregunta'] == 2)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">2</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame alguna situación en la que hayas tenido que trabajar dentro de límites muy estrictos de tiempo.</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[1]['valor_pregunta'] == 2 ? $aspirante->entrevista?->competencias[1]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">2</td>
            <td class="blancotexto">Cuéntame alguna situación en la que hayas tenido que trabajar dentro de límites muy estrictos de tiempo.</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
            @if($aspirante->entrevista->competencias[1]['valor_pregunta'] == 3)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">3</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntanos sobre una situación en la que el conflicto generó un resultado negativo. ¿Cómo manejaste la situación y qué aprendiste de ella?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[1]['valor_pregunta'] == 3 ? $aspirante->entrevista?->competencias[1]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">3</td>
            <td class="blancotexto">Cuéntanos sobre una situación en la que el conflicto generó un resultado negativo. ¿Cómo manejaste la situación y qué aprendiste de ella?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[1]['valor_pregunta'] == 4)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">4</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame sobre las situaciones de cambio más importantes a las que te has enfrentado ¿Cómo te las arreglaste?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[1]['valor_pregunta'] == 4 ? $aspirante->entrevista?->competencias[1]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">4</td>
            <td class="blancotexto">Cuéntame sobre las situaciones de cambio más importantes a las que te has enfrentado ¿Cómo te las arreglaste?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancocompe">Orientación al servicio (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[2]['valor_pregunta'] == 1)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">1</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Cómo defines el servicio a la ciudadanía?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[2]['valor_pregunta'] == 1 ? $aspirante->entrevista?->competencias[2]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">1</td>
            <td class="blancotexto">¿Cómo defines el servicio a la ciudadanía?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[2]['valor_pregunta'] == 2)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">2</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Dame un ejemplo de una ocasión en la que proporcionaste un servicio excepcional a un ciudadano y/o cliente.</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[2]['valor_pregunta'] == 2 ? $aspirante->entrevista?->competencias[2]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">2</td>
            <td class="blancotexto">Dame un ejemplo de una ocasión en la que proporcionaste un servicio excepcional a un ciudadano y/o cliente.</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[2]['valor_pregunta'] == 3)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">3</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Por qué quieres trabajar en el IEPC al servicio de la ciudadanía y que te llevó a ingresar en este campo?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[2]['valor_pregunta'] == 3 ? $aspirante->entrevista?->competencias[2]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">3</td>
            <td class="blancotexto">¿Por qué quieres trabajar en el IEPC al servicio de la ciudadanía y que te llevó a ingresar en este campo?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[2]['valor_pregunta'] == 4)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">4</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Describe un escenario de servicio en el que lograste convertir a un ciudadano insatisfecho en uno satisfecho.</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[2]['valor_pregunta'] == 4 ? $aspirante->entrevista?->competencias[2]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">4</td>
            <td class="blancotexto">Describe un escenario de servicio en el que lograste convertir a un ciudadano insatisfecho en uno satisfecho.</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 20pt;">
        <tr>
        <td style="width: 33%;" align="center" valign="middle"><img  src="../public/imgs/piedepagina.png" width="100%" height="80px" alt=""></td>
        </td>
        </tr>
    </table>
</footer>

<table class="saltopagina"></table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancocompe"">Manejo y resolución de problemas (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[3]['valor_pregunta'] == 1)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">1</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Describe el mayor problema relacionado con el trabajo que hayas experimentado. ¿Cómo lo solucionaste?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[3]['valor_pregunta'] == 1 ? $aspirante->entrevista?->competencias[3]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">1</td>
            <td class="blancotexto">Describe el mayor problema relacionado con el trabajo que hayas experimentado. ¿Cómo lo solucionaste?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[3]['valor_pregunta'] == 2)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">2</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Describe una ocasión en la que hayas tenido que cambiar tu estrategia en el último momento. ¿Cómo manejaste esta situación?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[3]['valor_pregunta'] == 2 ? $aspirante->entrevista?->competencias[3]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">2</td>
            <td class="blancotexto">Describe una ocasión en la que hayas tenido que cambiar tu estrategia en el último momento. ¿Cómo manejaste esta situación?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[3]['valor_pregunta'] == 3)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">3</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Puedes pensar en una situación de trabajo en la que hayas visto una oportunidad en un problema potencial? ¿Qué hiciste? ¿Cuál fue el resultado?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[3]['valor_pregunta'] == 3 ? $aspirante->entrevista?->competencias[3]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">3</td>
            <td class="blancotexto">¿Puedes pensar en una situación de trabajo en la que hayas visto una oportunidad en un problema potencial? ¿Qué hiciste? ¿Cuál fue el resultado?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[3]['valor_pregunta'] == 4)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">4</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">¿Alguna vez has tenido un plazo que no hayas podido cumplir? ¿Qué pasó? ¿Cómo lo resolviste?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[3]['valor_pregunta'] == 4 ? $aspirante->entrevista?->competencias[3]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">4</td>
            <td class="blancotexto">¿Alguna vez has tenido un plazo que no hayas podido cumplir? ¿Qué pasó? ¿Cómo lo resolviste?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancocompe">Planeación (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[4]['valor_pregunta'] == 1)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">1</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame cómo te organizas cuando tienes mucho trabajo. ¿Por dónde empiezas? ¿Cómo te aseguras que todo se haga? ¿Cómo te sientes cuando tienes tanto que hacer?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[4]['valor_pregunta'] == 1 ? $aspirante->entrevista?->competencias[4]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">1</td>
            <td class="blancotexto">Cuéntame cómo te organizas cuando tienes mucho trabajo. ¿Por dónde empiezas? ¿Cómo te aseguras que todo se haga? ¿Cómo te sientes cuando tienes tanto que hacer?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[4]['valor_pregunta'] == 2)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">2</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame un ejemplo de cuando hayas tenido que organizar un área de trabajo o un evento. ¿Qué tuviste qué hacer? ¿Cómo te organizaste y planificaste para ello? ¿Qué plazos previste? ¿Cuál fue el resultado?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[4]['valor_pregunta'] == 2 ? $aspirante->entrevista?->competencias[4]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">2</td>
            <td class="blancotexto">Cuéntame un ejemplo de cuando hayas tenido que organizar un área de trabajo o un evento. ¿Qué tuviste qué hacer? ¿Cómo te organizaste y planificaste para ello? ¿Qué plazos previste? ¿Cuál fue el resultado?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[4]['valor_pregunta'] == 3)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">3</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame una situación especial en la que demostraras eficacia organizando y controlando tu trabajo. ¿Qué ocurrió?  ¿Cuál fue el resultado final? ¿Por qué crees que lograste ser eficaz en esa ocasión?</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[4]['valor_pregunta'] == 3 ? $aspirante->entrevista?->competencias[4]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">3</td>
            <td class="blancotexto">Cuéntame una situación especial en la que demostraras eficacia organizando y controlando tu trabajo. ¿Qué ocurrió?  ¿Cuál fue el resultado final? ¿Por qué crees que lograste ser eficaz en esa ocasión?</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
        <tr>
        @if($aspirante->entrevista->competencias[4]['valor_pregunta'] == 4)
            <td class="blanconumber" style=" background: rgb(219, 215, 204);">4</td>
            <td class="blancotexto" style=" background: rgb(219, 215, 204);">Cuéntame otra situación en la que no actuaras de forma eficaz organizando y controlando su trabajo.</td>
             <td class="blancocali" style=" background: rgb(219, 215, 204);">{{ $aspirante->entrevista?->competencias[4]['valor_pregunta'] == 4 ? $aspirante->entrevista?->competencias[4]['valor_respuesta'] : '' }}</td>
             @else
            <td class="blanconumber">4</td>
            <td class="blancotexto">Cuéntame otra situación en la que no actuaras de forma eficaz organizando y controlando su trabajo.</td>
            <td class="blancocali"></td>
            @endif
        </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blanco" style="width: 85%; text-align: right;">Puntaje total:</td>
        <td class="blancocali">{{$aspirante->entrevista->puntos}}</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blanco" style="width: 85%; text-align: right;">Calificación total ponderada*:</td>
        <td class="blancocali">{{$aspirante->entrevista->calificacion}}%</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancotexto">¿SE OTORGARÁ PUNTO ADICIONAL POR SER HABLANTE DE LENGUA INDIGENA?</td>
        @if ($aspirante->entrevista->habla_indigena =='SI')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>SI</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>SI</span></td>
        @endif

        @if ($aspirante->entrevista->habla_indigena =='NO')
            <td class="blancosi" style="background: rgb(219, 215, 204); width: 10%"><span>NO</span></td>
            @else
            <td class="blancosi" style="width: 10%"><span>NO</span></td>
        @endif  
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancognl" valign="bottom" style="width: 60%; height: 50px; text-align: center; font-weight: bold;">Consejo Municipal Electoral de {{($aspirante->municipio)}}</td>
        <td class="blancognl" style="width: 20%; height: 50px; text-align: center;">{{$aspirante->entrevista->calificacion}}%</td>
        <td class="blancognl" style="width: 20%; height: 50px; text-align: center;"></td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="rojo2" style="width: 60%;">NOMBRE DE CONSEJERIA ENTREVISTADORA 1</td>
        <td class="rojo2" style="width: 20%;">CALIFICACION (SEL)</td>
        <td class="rojo2" style="width: 20%;">FIRMA</td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="blancognl" valign="bottom" style="width: 60%; height: 50px; text-align: center; font-weight: bold;">Consejo Municipal Electoral de {{($aspirante->municipio)}}</td>
        <td class="blancognl" style="width: 20%; height: 50px; text-align: center;">{{$aspirante->entrevista->calificacion}}%</td>
        <td class="blancognl" style="width: 20%; height: 50px; text-align: center;"></td>
    </tr>
    </tbody>
</table>

<table class="cuerpo">
	<tbody>
    <tr>
        <td class="rojo2" style="width: 60%;">NOMBRE DE CONSEJERIA ENTREVISTADORA 2</td>
        <td class="rojo2" style="width: 20%;">CALIFICACION (SEL)</td>
        <td class="rojo2" style="width: 20%;">FIRMA</td>
    </tr>
    </tbody>
</table>

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 20pt;">
        <tr>
        <td style="width: 33%;" align="center" valign="middle"><img  src="../public/imgs/piedepagina.png" width="100%" height="80px" alt=""></td>
        </td>
        </tr>
    </table>
</footer>

</body>
</html>