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


table.header {
            table-layout: fixed;
            width: 726px;
             
}

table.body  {
            
            
            table-layout: fixed;
            width: 726px;
            border-collapse: collapse;

}
td.rojoTi01{
            background: rgb(231, 12, 117);
            font-size: 15pt;
            color: #FFFFFF;
            text-align: center;
            font-weight: bold;
                   
            }
td.rojo{
            background: rgb(231, 12, 117);
            font-size: 7pt;
            color: #FFFFFF;
            text-align: center;
            font-weight: bold;
                   
            }

td.blanco{
            
            font-size: 7pt;
            
            }

 
</style>
</head>
<body>
<header>    
    <table class="header">
        <tbody>
        <tr>
            <td style="width: 33%;" align="center" valign="middle"><img  src="../public/imgs/logoIEPC.png" width="150px" height="80px" salt=""></td>
            <td style="width: 33%;" align="center" valign="middle"><img  src="../public/imgs/logoEAE2024.png" width="140px" height="80px" alt=""></td>
            <td style="width: 33%;" align="center" valign="middle"><img  src="../public/imgs/proceso_electoral_2024.png" width="150px" height="60px" alt=""></td>
        </tr>                    
        </tbody>
    </table>
</header>

<!--CARATULA DE ENTREVISTA-->

<table class="body" border="1" frame="border" rules="groups">
    <tbody>
        <tr>
            <td class="rojoTi01" colspan="3">Caratula de entrevista para SEL</td>
        </tr>
        <tr>
            <td class="blanco" rowspan="2" style="text-align: justify; width: 60%;">PARA EL LLENADO DEBERA USAR PLUMA EN COLOR NEGRO O AZUL Y LLENAR CON LETRA MOLDE Y LEGIBLE. LA INFORMACION PRE-LLENADA DEBERA CONFIRMARSE CON LA PERSONA ASPIRANTE.</td>
            <td class="blanco" style="text-align: center; with: 15%;">FECHA DE ENTREVISTA</td>
            <td class="blanco" style="text-align: center; with: 15%;">No. FOLIO DEL ASPIRANTE:</td>
        </tr>
        <tr>
            <td class="blanco" style="text-align: center; width: 20%;">3</td>
            <td class="blanco" style="text-align: center; width: 20%;">4</td>
        </tr>
    </tbody>
</table>

<!--INFORMACION GENERAL-->
<table class="body" border="1" frame="border" rules="groups">
	<tbody>
		<tr>
			<td class="rojoTi01" colspan="7">INFORMACION GENERAL DE LA PERSONA ASPIRANTE</td>
		</tr>
		<tr>
			<td class="rojo" style="width: 25%">NOMBRE:</td>
			<td class="rojo" style="width: 25%">APELLIDO PATERNO:</td>
			<td class="rojo" style="width: 25%">APELLIDO MATERNO:</td>
			<td class="rojo" style="width: 5%">EDAD</td>
			<td class="rojo" style="width: 5%">F</td>
			<td class="rojo" style="width: 5%">M</td>
			<td class="rojo" style="width: 10%">LGBTTTIQ+</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td class="rojo" colspan="3">GÉNERO</td>
		</tr>
	</tbody>
</table>

<!--ULTIMO GRADO DE ESTUDIO-->
<table class="body" border="1" frame="border" rules="groups">
	<tbody>
        <tr>
            <td class="rojoTi01" colspan="7">INDIQUE EL ULTIMO GRADO DE ESTUDIOS CONCLUIDA</td>
        </tr>
		<tr>
			<td class="rojo" style="width: 10%">PRIMARIA</td>
			<td class="rojo" style="width: 11%">SECUNDARIA</td>
			<td class="rojo" style="width: 12%">BACHILLERATO</td>
			<td class="rojo" style="width: 15%">CARRERA TÉCNICA</td>
			<td class="rojo" style="width: 12%">LICENCIATURA</td>
			<td class="rojo" style="width: 10%">POSGRADO</td>
			<td class="rojo" style="width: 30%">NOMBRE DE LA CARRERA</td>
		</tr>
		<tr>
            <td class="rojo" style="width: 10%">&nbsp;</td>
			<td class="rojo" style="width: 11%">&nbsp;</td>
			<td class="rojo" style="width: 12%">&nbsp;</td>
			<td class="rojo" style="width: 15%">&nbsp;</td>
			<td class="rojo" style="width: 12%">&nbsp;</td>
			<td class="rojo" style="width: 10%">&nbsp;</td>
			<td class="blanco" style="width: 30%">&nbsp;</td>
		</tr>
        
	</tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
            <td class="rojo" style="width: 25%">ULTIMO EMPLEO / ACTUAL</td>
			<td class="rojo" style="width: 25%">&nbsp;</td>
			<td class="rojo" style="width: 25%">¿HABLA ALGUNA LENGUA INDIGENA?<br>Especifique:</td>
			<td class="rojo" style="width: 25%">&nbsp;</td>			
		</tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 100%;">¿Cuál es el motivo por el que quiere participar como SEL?</td>
    </tr>
    </tbody>
</table>
<table class="body" border="1" frame="border" rules="groups" >
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%;height: 50px;"></td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups" >
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 75%;">¿Tiene disponibilidad para trabajar de lunes a domingo, días festivos y en horarios fuera de lo habitual?</td>
        <td class="blanco" style="width: 10%;">Si</td>
        <td class="blanco" style="width: 10%;">No</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups" >
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 75%;">¿Podrías realizar trabajos de campo, visitas de casa en casa, recorrer distancias largas entre otras actividades de acuerdo al perfil requerido?</td>
        <td class="blanco" style="width: 10%;">Si</td>
        <td class="blanco" style="width: 10%;">No</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups" >
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 75%;">¿Has participado en algún proceso electoral?</td>
        <td class="blanco" style="width: 10%;">Si</td>
        <td class="blanco" style="width: 10%;">No</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3.1</td>
        <td class="blanco" style="width: 55%;">En caso de responder SI, que cargo, tiempo y donde ¿especifique?</td>
        <td class="blanco" style="width: 45%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 75%;">¿Has colaborado con algún partido político, organizaciones civiles?</td>
        <td class="blanco" style="width: 10%;">Si</td>
        <td class="blanco" style="width: 10%;">No</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4.1</td>
        <td class="blanco" style="width: 55%;">En caso de responder SI, que cargo, tiempo y donde ¿especifique?</td>
        <td class="blanco" style="width: 45%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 100%">COMPETENCIAS (40 %)</td>
    </tr>
    <tr>
        <td class="blanco" style="width: 100%; font-weight: bold;">1: No lo demostró, 2: Insuficiente, 3: Regular, 4: Aceptable, 5: Consolidado o excelente</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="rojoTi01" style="width: 85%">SEL</td>
        <td class="rojoTi01" style="width: 15%; font-size: 10pt;">CALIFICACIÓN</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%; text-align: center;">Liderazgo (20 PUNTOS)</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 80%;">Cuéntame algún ejemplo en el que hayas tomado la iniciativa en un proyecto difícil.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 80%;">Relata una situación en la que asumiste el papel de líder. ¿Qué desafíos afrontaste y cómo los abordaste?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 80%;">¿Qué hace para mantener a su equipo motivado y comprometido? Deme un ejemplo:</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 80%;">¿Cómo lo hace para distribuir y delegar tareas a su equipo de trabajo?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%; text-align: center;">Trabajo bajo presión (20 PUNTOS)</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 80%;">Hábleme de un problema difícil que haya podido resolver ¿cómo lo resolvió y que resultados obtuvo?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 80%;">Cuéntame alguna situación en la que hayas tenido que trabajar dentro de límites muy estrictos de tiempo.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 80%;">Cuéntanos sobre una situación en la que el conflicto generó un resultado negativo. 
     ¿Cómo manejaste la situación y qué aprendiste de ella?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 80%;">Cuéntame sobre las situaciones de cambio más importantes a las que te has enfrentado 
      ¿Cómo te las arreglaste?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%; text-align: center;">Orientación al servicio (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 80%;">¿Cómo defines el servicio a la ciudadanía?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 80%;">Dame un ejemplo de una ocasión en la que proporcionaste un servicio excepcional a un ciudadano y/o cliente.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 80%;">¿Por qué quieres trabajar en el IEPC al servicio de la ciudadanía y que te llevó a ingresar en este campo?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 80%;">Describe un escenario de servicio en el que lograste convertir a un ciudadano insatisfecho en uno satisfecho.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%; text-align: center;">Manejo y resolución de problemas (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 80%;">Describe el mayor problema relacionado con el trabajo que hayas experimentado. ¿Cómo lo solucionaste?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 80%;">Describe una ocasión en la que hayas tenido que cambiar tu estrategia en el último momento. ¿Cómo manejaste esta situación?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 80%;">¿Puedes pensar en una situación de trabajo en la que hayas visto una oportunidad en un problema potencial? ¿Qué hiciste? ¿Cuál fue el resultado?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 80%;">¿Alguna vez has tenido un plazo que no hayas podido cumplir? ¿Qué pasó? ¿Cómo lo resolviste?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 100%; text-align: center;">Planeación (20 Puntos)</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">1</td>
        <td class="blanco" style="width: 80%;">Cuéntame cómo te organizas cuando tienes mucho trabajo. ¿Por dónde empiezas? ¿Cómo te aseguras que todo se haga? ¿Cómo te sientes cuando tienes tanto que hacer?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">2</td>
        <td class="blanco" style="width: 80%;">Cuéntame un ejemplo de cuando hayas tenido que organizar un área de trabajo o un evento. ¿Qué tuviste qué hacer? ¿Cómo te organizaste y planificaste para ello? ¿Qué plazos previste? ¿Cuál fue el resultado?
.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">3</td>
        <td class="blanco" style="width: 80%;">Cuéntame una situación especial en la que demostraras eficacia organizando y controlando tu trabajo. ¿Qué ocurrió?  ¿Cuál fue el resultado final? ¿Por qué crees que lograste ser eficaz en esa ocasión?.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 5%; text-align: center;">4</td>
        <td class="blanco" style="width: 80%;">Cuéntame otra situación en la que no actuaras de forma eficaz organizando y controlando su trabajo.</td>
        <td class="blanco" style="width: 15%;"></td>        
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 85%; text-align: right;">Puntaje total:</td>
        <td class="blanco" style="width: 15%;"></td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 85%; text-align: right;">Calificación total ponderada*:</td>
        <td class="blanco" style="width: 15%;"></td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 80%;">¿SE OTORGARÁ PUNTO ADICIONAL POR SER HABLANTE DE LENGUA INDIGENA?.</td>
        <td class="blanco" style="width: 10%;">Si</td>
        <td class="blanco" style="width: 10%;">No</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 60%; height: 50px; text-align: center;"></td>
        <td class="blanco" style="width: 20%; height: 50px; text-align: center;"></td>
        <td class="blanco" style="width: 20%; height: 50px; text-align: center;"></td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="rojo" style="width: 60%; text-align: center; font-size: 10pt;">NOMBRE DE CONSEJERIA ENTREVISTADORA 1</td>
        <td class="rojo" style="width: 20%; text-align: center; font-size: 10pt;">CALIFICACION (SEL)</td>
        <td class="rojo" style="width: 20%; text-align: center; font-size: 10pt;">FIRMA</td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="blanco" style="width: 60%; height: 50px; text-align: center;"></td>
        <td class="blanco" style="width: 20%; height: 50px; text-align: center;"></td>
        <td class="blanco" style="width: 20%; height: 50px; text-align: center;"></td>
    </tr>
    </tbody>
</table>

<table class="body" border="1" frame="border" rules="groups">
	<tbody>
    <tr>
        <td class="rojo" style="width: 60%; text-align: center; font-size: 10pt;">NOMBRE DE CONSEJERIA ENTREVISTADORA 2</td>
        <td class="rojo" style="width: 20%; text-align: center; font-size: 10pt;">CALIFICACION (SEL)</td>
        <td class="rojo" style="width: 20%; text-align: center; font-size: 10pt;">FIRMA</td>
    </tr>
    </tbody>
</table>

<footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 50pt;">
        <tr>
            <td style="text-align: center; font-size: 6pt;"> LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES Y CAPACITADORES/AS-ASISTENTES ELECTORALES | ANEXO 21.1 SOLICITUD
        </td>
        </tr>
    </table>
</footer>

</body>
</html>