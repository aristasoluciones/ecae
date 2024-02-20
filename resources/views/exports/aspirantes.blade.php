<table>
    <thead>
        <tr>
            <th colspan="21" style="background: #0c84ff; color: #ffffff; font-weight: bold;">REPORTE DE ASPIRANTES REGISTRADOS</th>
        </tr>
        <tr>
            <!--col01--> <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ID</th>
            <!--col02--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">FECHA DE RECEPPCIÓN</th>
            <!--col03--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CLAVE DE ELECTOR</th>
            <!--col04--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">SECCION ELECTORAL</th>
            <!--col05--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">APELLIDO PATERNO</th>
            <!--col06--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">APELLIDO MATERNO</th>
            <!--col07--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">NOMBRE(S)</th>
            <!--col08--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">RFC</th>
            <!--col09--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CURP</th>
            <!--col10--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">FECHA DE NACIMIENTO</th>
            <!--col11--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">GENERO</th>
            <!--col12--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿SE IDENTIFICA COMO UNA PERSONA LGBTTTIQ+?</th>
            <!--col13--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿TIENE ALGUNA DISCAPACIDAD?</th>
            <!--col14--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">DESCRIBIR TIPO DE DISCAPACIDAD</th>
            <!--col15--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">HABLA ALGUNA LENGUA INDIGENA</th>
            <!--col16--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">DESCRIBIR TIPO DE LENGUA</th>
            <!--col17--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">EDAD</th>
            <!--col18--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MUNICIPIO</th>
            <!--col19--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">LOCALIDAD</th>
            <!--col20--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">SEDE(CONSEJO ELECTORAL)</th>
            <!--col21--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CORREO ELECTRÓNICO</th>
            <!--col22--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">DOMICILIO</th>
            <!--col23--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ULTIMO GRADO DE ESTUDIOS</th>
            <!--col24--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿REALIZA ESTUDIOS ACTUALMENTE?</th>
            <!--col25--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MEDIO POR EL QUE SE ENTERO DE LA CONVOCATORIA</th>
            <!--col26--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿CUAL ES EL MOTIVO POR EL QUE QUIERE PARTICIPAR COMO SE O CAE LOCAL? ESPECIFIQUE:</th>
            <!--col27--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ESTATUS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr>
            <!--col01--><td>{{ $row->id }}</td>
            <!--col02--><td>{{ ($row->created_at) }}</td>
            <!--col03--><td>{{ mb_strtoupper($row->clave_elector) }}</td>
            <!--col04--><td>{{ mb_strtoupper($row->seccion_electoral) }}</td>
            <!--col05--><td>{{ mb_strtoupper(str_replace("Ñ","N",$row->apellido1)) }}</td>
            <!--col06--><td>{{ mb_strtoupper(str_replace("Ñ","N",$row->apellido2)) }}</td>
            <!--col07--><td>{{ mb_strtoupper(str_replace("Ñ","N",$row->nombre)) }}</td>            
            <!--col08--><td>{{ mb_strtoupper($row->rfc.$row->homoclave) }}</td>
            <!--col09--><td>{{ mb_strtoupper($row->curp) }}</td>
            <!--col10--><td>{{ mb_strtoupper($row->fecha_nacimiento) }}</td>
            <!--col11--><td>{{ mb_strtoupper($row->genero) }}</td>
            <!--col12--><td>{{ mb_strtoupper($row->persona_lgbtttiq) }}</td>
            <!--col13--><td>{{ mb_strtoupper($row->p15_discapacidad) }}</td>
            <!--col14--><td>{{ mb_strtoupper($row->p15_1_tipodiscapacidad) }}</td>
            <!--col15--><td>{{ mb_strtoupper($row->p11_habla_lindigena) }}</td>
            <!--col16--><td>{{ mb_strtoupper($row->p11_1_cual) }}</td>
            <!--col17--><td>{{ mb_strtoupper($row->edad) }}</td>
            <!--col18--><td>{{ mb_strtoupper($row->municipio) }}</td>
            <!--col19--><td>{{ mb_strtoupper($row->localidad) }}</td>
            <!--col20--><td>{{ mb_strtoupper($row->sede) }}</td>
            <!--col21--><td>{{ mb_strtoupper($row->email) }}</td>
            <!--col22--><td>{{ mb_strtoupper($row->dom_calle." ".$row->dom_num_exterior." ".$row->dom_num_interior." ".$row->dom_colonia." ".$row->dom_localidad." ".$row->dom_municipio." ".$row->dom_postal) }}</td>
            <!--col23--><td>{{ mb_strtoupper($row->ultimo_grado_estudio) }}</td>
            <!--col24--> <td>{{ mb_strtoupper($row->realiza_estudios) }}</td>
            <!--col25--><td>{{ mb_strtoupper($row->medio_convocatoria) }}</td>
            <!--col26--><td>{{ mb_strtoupper($row->motivo_secae) }}</td>
            <!--col27--><td>{{ mb_strtoupper($row->estatus) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
