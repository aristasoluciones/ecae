<html>
<head>
    <title>Cuadro de calificaciones</title>
</head>
<table >
    <thead>
        <tr>
            <th style="border-top:1px solid #000000; border-left:1px solid #000000; border-bottom: none; border-right: none"></th>
            <th style="border-top:1px solid #000000; border-left:none; border-bottom: none; border-right: none"></th>
            <th colspan="5" style="text-align: center; font-weight: bold; font-size: 13px;bor">Instituto de Elecciones y Participación Ciudadana</th>
            <th style="border:none"></th>
            <th style="border:none"></th>
        </tr>
        <tr>
            <th style="border:0px"></th>
            <th></th>
            <th colspan="5" style="text-align: center; font-weight: bold; font-size: 13px">Secretaría Ejecutiva</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th colspan="5" style="text-align: center;font-size: 13px">Dirección Ejecutiva de Organización Electoral</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th colspan="5" style="text-align: center; font-size: 13px">Cuadro de calificación SEL y CAEL para el Proceso Electoral Local Ordinario 2024</th>
            <th></th>
            <th></th>
        <tr>
            <th></th>
            <th></th>
            <th colspan="5" style="text-align: center; font-size: 13px">Consejo Municipal Electoral : <strong>{{ !$consejo ? 'Todos los consejos' : $consejo }}</strong></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th colspan="4"><strong>Fecha de consulta: </strong> {{ date('Y-m-d', strtotime(now())) }}</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <!--col01--> <th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000;">No. de Aspirante</th>
            <!--col02--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000;">Fecha</th>
            <!--col03--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">Apellido Paterno</th>
            <!--col04--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">Apellido Materno</th>
            <!--col05--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">Nombre(s)</th>
            <!--col06--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">No. de aciertos</th>
            <!--col07--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">*¿Tiene alguna discapacidad?  (agregar un punto adicional)¹</th>
            <!--col08--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">*¿Se identifica como persona LGBTTTIQ+?²</th>
            <!--col09--><th style="background: #ff0c75; color: #ffffff; font-weight: bold; vertical-align: middle;text-align: center;border:1px solid #000000">Calificación</th>
        </tr>
    </thead>
    <tbody style="">
    @foreach($rows as $row)
        <tr>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000;text-align: center">{{ $row->id }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000">{{ date('Y-m-d', strtotime($row->evaluacion?->created_at)) }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000">{{ mb_strtoupper($row->apellido1) }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000">{{ mb_strtoupper($row->apellido2) }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000">{{ mb_strtoupper($row->nombre) }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000; text-align: center">{{ $row->evaluacion?->aciertos}}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000;text-align: center">{{ $row->evaluacion?->discapacidad ? 'SI' : 'NO' }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000;text-align: center">{{ $row->evaluacion?->lgbtttiq ? 'SI' : 'NO' }}</td>
            <td style="background: {{ $loop->odd ? '#FCE4D6' : 'transparent' }};border:1px solid #000000;text-align: center">{{ $row->evaluacion?->calificacion_final }}</td>
        </tr>
    @endforeach
    <tr rowspan="4">
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <th colspan="9">
            * Siempre y cuando las personas aspirantes hayan obtenido la calificación mínima aprobatoria de éste, es decir, 6.000 (seis).
        </th>
    </tr>
    <tr>
        <th colspan="9">
            ¹ Protocolo para la inclusión de Personas con Discapacidad como funcionarios y funcionarias de Mesas Directivas de Casilla y de esta forma se otorgue bajo los mismos criterios en todos los OPL.
        </th>
    </tr>
    <tr>
        <th colspan="9">
            ² Protocolo para adoptar las medidas tendientes a garantizar a las personas trans el ejercicio del voto en igualdad de condiciones y sin discriminación en todos los tipos de elección y mecanismos de participación ciudadana.
        </th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align: center; font-weight: bold">La Presidencia</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align: center; font-weight: bold">C.___________________________________________</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align: center; font-weight: bold">Nombre y firma</th>
    </tr>
    </tbody>
</table>
</html>
