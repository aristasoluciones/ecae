<table>
    <thead>
        <tr>
            <th colspan="21" style="background: #0c84ff; color: #ffffff; font-weight: bold;">REPORTE DE ASPIRANTES REGISTRADOS</th>
        </tr>
        <tr>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ID</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">FECHA DE RECEPPCIÓN</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CLAVE DE ELECTOR</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">SECCION ELECTORAL</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">NOMBRE</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">RFC</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CURP</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">FECHA DE NACIMIENTO</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">GENERO</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">EDAD</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MUNICIPIO</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">LOCALIDAD</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">SEDE(CONSEJO ELECTORAL)</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">TIPO DE SEDE</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">CORREO ELECTRÓNICO</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">DOMICILIO</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ULTIMO GRADO DE ESTUDIOS</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿REALIZA ESTUDIOS ACTUALMENTE?</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">MEDIO POR EL QUE SE ENTERO DE LA CONVOCATORIA</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">¿CUAL ES EL MOTIVO POR EL QUE QUIERE PARTICIPAR COMO SE O CAE LOCAL? ESPECIFIQUE:</th>
            <th style="background: #0c84ff; color: #ffffff; font-weight: bold;">ESTATUS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ mb_strtoupper($row->created_at) }}</td>
            <td>{{ mb_strtoupper($row->clave_elector) }}</td>
            <td>{{ mb_strtoupper($row->seccion_electoral) }}</td>
            <td>{{ mb_strtoupper($row->nombre ." ".$row->apellido1." ".$row->apellido2) }}</td>
            <td>{{ mb_strtoupper($row->rfc.$row->homoclave) }}</td>
            <td>{{ mb_strtoupper($row->curp) }}</td>
            <td>{{ mb_strtoupper($row->fecha_nacimiento) }}</td>
            <td>{{ mb_strtoupper($row->genero) }}</td>
            <td>{{ mb_strtoupper($row->edad) }}</td>
            <td>{{ mb_strtoupper($row->municipio) }}</td>
            <td>{{ mb_strtoupper($row->localidad) }}</td>
            <td>{{ mb_strtoupper($row->sede) }}</td>
            <td>{{ mb_strtoupper($row->email) }}</td>
            <td>{{ mb_strtoupper($row->dom_calle." ".$row->dom_num_exterior." ".$row->dom_num_interior." ".$row->dom_colonia." ".$row->dom_localidad." ".$row->dom_municipio." ".$row->dom_postal) }}</td>
            <td>{{ mb_strtoupper($row->ultimo_grado_estudio) }}</td>
            <td>{{ mb_strtoupper($row->realiza_estudios) }}</td>
            <td>{{ mb_strtoupper($row->medio_convocatoria) }}</td>
            <td>{{ mb_strtoupper($row->motivo_secae) }}</td>
            <td>{{ mb_strtoupper($row->estatus) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
