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
            <!--col05--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">NOMBRE</th>
            <!--col06--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">RFC</th>
            <!--col07--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CURP</th>
            <!--col08--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">FECHA DE NACIMIENTO</th>
            <!--col09--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">GENERO</th>
            <!--col10--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">EDAD</th>
            <!--col11--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MUNICIPIO</th>
            <!--col12--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">LOCALIDAD</th>
            <!--col13--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">SEDE(CONSEJO ELECTORAL)</th>
            <!--col14--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">TIPO DE SEDE</th>
            <!--col15--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CORREO ELECTRÓNICO</th>
            <!--col16--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">DOMICILIO</th>
            <!--col17--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ULTIMO GRADO DE ESTUDIOS</th>
            <!--col18--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿REALIZA ESTUDIOS ACTUALMENTE?</th>
            <!--col19--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MEDIO POR EL QUE SE ENTERO DE LA CONVOCATORIA</th>
            <!--col20--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿CUAL ES EL MOTIVO POR EL QUE QUIERE PARTICIPAR COMO SE O CAE LOCAL? ESPECIFIQUE:</th>
            <!--col21--><th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ESTATUS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr>
            <!--col01--><td>{{ $row->id }}</td>
            <!--col02--><td>{{ mb_strtoupper($row->created_at) }}</td>
            <!--col03--><td>{{ mb_strtoupper($row->clave_elector) }}</td>
            <!--col04--><td>{{ mb_strtoupper($row->seccion_electoral) }}</td>
            <!--col05--><td>{{ mb_strtoupper($row->nombre ." ".$row->apellido1." ".$row->apellido2) }}</td>
            <!--col06--><td>{{ mb_strtoupper($row->rfc.$row->homoclave) }}</td>
            <!--col07--><td>{{ mb_strtoupper($row->curp) }}</td>
            <!--col08--><td>{{ mb_strtoupper($row->fecha_nacimiento) }}</td>
            <!--col09--><td>{{ mb_strtoupper($row->genero) }}</td>
            <!--col10--><td>{{ mb_strtoupper($row->edad) }}</td>
            <!--col11--><td>{{ mb_strtoupper($row->municipio) }}</td>
            <!--col12--><td>{{ mb_strtoupper($row->localidad) }}</td>
            <!--col13--><td>{{ mb_strtoupper($row->sede) }}</td>
            <!--col14--><td>{{ mb_strtoupper($row->tipo_sede) }}</td>
            <!--col15--><td>{{ mb_strtoupper($row->email) }}</td>
            <!--col16--><td>{{ mb_strtoupper($row->dom_calle." ".$row->dom_num_exterior." ".$row->dom_num_interior." ".$row->dom_colonia." ".$row->dom_localidad." ".$row->dom_municipio." ".$row->dom_postal) }}</td>
            <!--col17--><td>{{ mb_strtoupper($row->ultimo_grado_estudio) }}</td>
            <!--col18--> <td>{{ mb_strtoupper($row->realiza_estudios) }}</td>
            <!--col19--><td>{{ mb_strtoupper($row->medio_convocatoria) }}</td>
            <!--col20--><td>{{ mb_strtoupper($row->motivo_secae) }}</td>
            <!--col21--><td>{{ mb_strtoupper($row->estatus) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
