<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="">
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
            
            border: 1pt solid #AD84C6;
            border-bottom: none;
            border-collapse: collapse;
            table-layout: fixed;
            width: 726px;
            }

        table.enmedio {
           
            border: 1pt solid #AD84C6;
            border-top: none;
            border-bottom: none;
            border-collapse: collapse;
            table-layout: fixed;
            width: 726px;
            }

        table.final {
            
            border: 1pt solid #AD84C6;
            border-top: none;
            border-collapse: collapse;
            margin-bottom: 5pt;
            table-layout: fixed;
            width: 726px;
            }
/** Definimos reglas de columnas en la pagina 01 **/
        td.grisp1{
            background:#F2F2F2;
            font-size: 7pt;
            border-collapse: separate;
            border: white 1px solid;
            }

        td.blancop1{
            background:#ffffff;
            font-size: 7pt;
            border-collapse: separate;
            border: white 1px solid;
            }

        td.rosap1{
            background:#EEE6F3;
            font-size: 7pt;
            border-collapse: separate;
            border: white 1px solid;
            text-align: center;
            }
/** Definimos reglas de columnas en la pagina 02 **/
            td.grisp2{
            background:#F2F2F2;
            font-size: 7pt;
            border-collapse: separate;
            border: white 1px solid;
            }

        td.blancop2{
            background:#ffffff;
            font-size: 7pt;
            border-collapse: separate;
            border: white 1px solid;
            }

        td.rosap2{
            background:#EEE6F3;
            font-size: 7pt;
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

/** Se define reglas de imagen **/

img{
    display: block;
    margin: auto;
}
</style>
</head>
<body>

<!--LOGO Y ENCABEZADO-->

<header>
    <table style="table-layout: fixed; width: 726px; margin-bottom: 5pt;">
        <tbody>
            <tr border-collapse: collapse;>
                <td style="width: 20% " rowspan="3"><img src="../public/imgs/LOGO_out.png" width="110px" height="80px" alt=""></td>
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

    <!--INICIA SECCION 01-->
    <table class="inicio">
        <tbody>
            <tr>
                <td colspan="6" style="width: 100%; text-align: center;">Este
                    apartado es para uso exclusivo del
                    personal del Organismo Público Local</td>
            </tr>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp1" style="width:18.3%;">
                    Fecha de recepción</td>
                                        
                <td class="rosap1" style="width: 23%; text-align: center;">{{date ("Y-m-d", strtotime($aspirante->created_at)) }}</td>
                <td class="grisp1" style="width: 10%; text-align: center;">
                    Número de convocatoria</td>
                <td class="rosap1" style="width: 23%; text-align: center;">{{mb_strtoupper ($aspirante->numero_convocatoria)}}
                    &nbsp;
                </td>
                <td class="grisp1" style="width: 13%; text-align: center;">
                    Folio de la persona aspirante</td>
                <td class="rosap1" style="width: 20%; text-align: center;">{{mb_strtoupper ($aspirante->id)}}
                    &nbsp;</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp1" style="width: 6%; text-align: center; ">
                    Entidad</td>
                <td class="rosap1"
                    style="width: 23%; text-align: center; text-align: center;">{{mb_strtoupper ($aspirante->entidad)}}
                    &nbsp;</td>
                <td class="grisp1" style="width: 7%; text-align: center; ">Municipio</td>
                <td class="rosap1"
                    style="width: 23%; text-align: center; text-align: center;">{{mb_strtoupper ($aspirante->municipio)}}
                    &nbsp;</td>
                <td class="grisp1" style="width: 5%; text-align: center;">
                    Localidad</td>
                <td class="rosap1"
                    style="width: 23%; text-align: center; text-align: center;">{{mb_strtoupper ($aspirante->localidad) }}
                    &nbsp;</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="final">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp1"
                    style="width: 6%; text-align: center;  border-bottom: none;">
                    Sede*</td>
                <td class="rosap1" style="width: 74%; text-align: center; text-align: center; border-bottom: none;">{{mb_strtoupper ($aspirante->sede)}}&nbsp;</td>
                <td class="grisp1" style="width: 5%; text-align: center;   border-bottom: none;">Fija</td>
                <td class="rosap1" style="width: 5%; text-align: center; text-align: center;  border-bottom: none;">
                 @if ($aspirante->tipo_sede=='Fija')
                    <span style="font-weight: bold;">X</span>
                 @endif
                    </td>
                   
                <td class="grisp1" style="width: 5%; text-align: center;   border-bottom: none;"> Alterna</td>
                    <td class="rosap1" style="width: 5%; text-align: center; text-align: center;  border-bottom: none;">
                    @if ($aspirante->tipo_sede=='Alterna')
                    <span style="font-weight: bold;">X</span>
                    @endif
                    </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <!--TERMINA SECCION 01-->

    <!--INICIA SECCION 2-->
    <table class="inicio">
        <tbody>
            
                <tr>
                    <td class="blancop1" colspan="7" rowspan="2">Clave electoral o
                        FUAR:</td>
                        @if ($aspirante->clave_elector)
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[0])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[1])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[2])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[3])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[4])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[5])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[6])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[7])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[8])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[9])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[10])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[11])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[12])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[13])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[14])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[15])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[16])?? ''}}</td>
                    <td class="rosap1" rowspan="2">{{ mb_strtoupper ($aspirante->clave_elector[17])?? ''}}</td>
                    @endif
                    <td class="grisp1" colspan="2" style="text-align: center;">{{ $aspirante->seccion_electoral[0]?? ''}}</td>
                    <td class="grisp1" colspan="2" style="text-align: center;">{{ $aspirante->seccion_electoral[1]?? ''}}</td>
                    <td class="grisp1" colspan="2" style="text-align: center;">{{ $aspirante->seccion_electoral[2]?? ''}}</td>
                    <td class="grisp1" colspan="2" style="text-align: center;">{{ $aspirante->seccion_electoral[3]?? ''}}</td>
                <tr>
                    <td class="blancop1" align="center" colspan="8">Sección electoral</td>
                </tr>
            
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" align="center">RFC</td>
                @if ($aspirante->rfc)
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[0])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[1])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[2])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[3])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[4])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[5])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[6])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[7])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[8])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->rfc[9])?? ''}}</td>
                    @else
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                    <td class="rosap1"></td>
                @endif
                @if ($aspirante->homoclave)
                <td class="rosap1">{{ mb_strtoupper ($aspirante->homoclave[0])?? ''}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->homoclave[1]?? '')}}</td>
                <td class="rosap1">{{ mb_strtoupper ($aspirante->homoclave[2]?? '')}}</td>
                @endif
                <td class="blancop1" style="width: 5%" align="center">CURP</td>
                
                @for ($i = 0; $i <= 17; $i++)
                @if (isset($aspirante->curp[$i])) <td class="rosap1">{{ mb_strtoupper ($aspirante->curp[$i])?? ''}}</td> @else <td class="rosap1"></td> @endif
                @endfor
                
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" align="center; font-size: 6pt;">No contar con estos documentos
                    no será causa de exclusión en este
                    momento. En caso de ser
                    contratado/a será obligatorio.</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 33.33%; word-wrap: break-word;">{{mb_strtoupper ($aspirante->apellido1) }}</td>
                <td class="rosap1" style="width: 33.33%; word-wrap: break-word;">{{mb_strtoupper ($aspirante->apellido2) }}</td>
                <td class="rosap1" style="width: 33.33%; word-wrap: break-word;">{{mb_strtoupper ($aspirante->nombre) }}</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 33.33%; text-align: center;">
                    Primer Apellido </td>
                <td class="blancop1" style="width: 33.33%; text-align: center;">
                    Segundo Apellido </td>
                <td class="blancop1" style="width: 33.33%; text-align: center;">
                    Nombre (s)</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 10%; text-align: center;">{{date ("d", strtotime($aspirante->fecha_nacimiento)) }}</td>
                <td class="rosap1" style="width: 10%; text-align: center;">{{date ("m", strtotime($aspirante->fecha_nacimiento)) }}</td>
                <td class="rosap1" style="width: 10%; text-align: center;">{{date ("Y", strtotime($aspirante->fecha_nacimiento)) }}</td>
                <td class="rosap1" style="width: 10%; text-align: center;">{{ $aspirante->edad }}</td>
                <td class="rosap1" style="width: 10%; text-align: center; font-size: 6pt;">Género
                    <br>(marca con una X)</td>
                <td class="rosap1" style="width: 10%; text-align: center;">
                    @if ($aspirante->genero=='Femenino')
                    <span style="font-weight: bold; font-size: 9pt; position: absolute; width: 10%; text-align: center; padding: 4px;">X</span>
                    <span style="position: absolute; width: 10%; padding: 4px; text-align: center;">Femenino</span>
                    @else
                    <span>Femenino</span>
                    @endif
                </td>
                    </td>
                <td class="rosap1" style="width: 10%; text-align: center;">
                    @if ($aspirante->genero=='Masculino')
                    <span style="font-weight: bold; font-size: 9pt; position: absolute; width: 10%; text-align: center; padding: 4px;">X</span>
                    <span style="position: absolute; width: 10%; padding: 4px; text-align: center;">Masculino</span>
                    @else
                    <span>Masculino</span>
                    @endif
                </td>

                <td class="rosap1" style="width: 10%; text-align: center; position: relative;">
                @if ($aspirante->genero=='Otro')
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto; font-size: 10pt; font-weight: bold;">X</span>
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Otro (especifica)</span>
                    @else
                    <span>Otro (especifica)</span>
                    @endif
                    @if ($aspirante->genero=='Otro')
                    <td class="rosap1" style="width: 10%; text-align: center; position: relative; word-wrap: break-word;">
                    <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">{{$aspirante->otro_genero}}</span></td>
                    @else
                    <td class="rosap1"></td>
                    @endif  
                </td>

                <td class="rosap1" style="width: 10%; text-align: center; position: relative;">
                    @if ($aspirante->genero=='Prefiero no decir')
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto; font-size: 10pt;">X</span>
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Prefiero no decir</span>
                    @else
                        <span>Prefiero no decir</span>
                    @endif</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 10%; text-align: center;">Día
                </td>
                <td class="blancop1" style="width: 10%; text-align: center;">Mes
                </td>
                <td class="blancop1" style="width: 10%; text-align: center;">Año
                </td>
                <td style="width: 10%; text-align: center;"></td>
                <td class="rosap1" rowspan="2"
                    style="width: 10%; text-align: center; font-size: 6pt;">¿Se identifica como persona LGBTTTIQ+?<br>(marca con una X)</td>
                    
                <td class="rosap1" rowspan="2" style="position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">
                    @if ($aspirante->persona_lgbtttiq=='Si')
                    <span style="position: absolute; right: 0; left: 0; top: 10; bottom: 0; margin: auto; font-size: 10pt;">X</span>
                    <span style="position: absolute; right: 0; left: 0; top: 10; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif</td>

                <td class="rosap1" rowspan="2" style="position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">
                    @if ($aspirante->persona_lgbtttiq=='No')
                    <span style="position: absolute; right: 0; left: 0; top: 10; bottom: 0; margin: auto; font-size: 10pt;">X</span>
                    <span style="position: absolute; right: 0; left: 0; top: 10; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>

                <td class="rosap1" rowspan="2" style="width: 10%; text-align: center; position: relative;">
                    @if ($aspirante->persona_lgbtttiq=='Otro')
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 10; bottom: 0; margin: auto; font-size: 10pt; font-weight: bold;">X</span>
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Otro (especifica)</span>
                    @else
                    <span>Otro (especifica)</span>
                    @endif
                    @if ($aspirante->persona_lgbtttiq=='Otro')
                    <td class="rosap1" rowspan="2" style="width: 10%; text-align: center; position: relative; word-wrap: break-word;">
                    <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 10; bottom: 0; margin: auto;">{{$aspirante->otro_lgbtttiq}}</span></td>
                    @else
                    <td class="rosap1" rowspan="2" ></td>
                    @endif  
                </td>

                <td class="rosap1" rowspan="2"
                    style="width: 10%; text-align: center; position: relative;">
                    @if ($aspirante->persona_lgbtttiq=='Prefiero no decir')
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 10; bottom: 0; margin: auto; font-size: 10pt; font-weight: bold;">X</span>
                    <span style="position: absolute; text-align: center; right: 0; left: 0; top: 10; bottom: 0; margin: auto;">Prefiero no decir</span>
                    @else
                    <span>Prefiero no decir</span>
                    @endif</td>
                </td>
            
            <tr>
                <td class="blancop1" colspan="3" style="text-align: center;">Fecha de nacimiento</td>
                <td class="blancop1" style="text-align: center;">Edad</td>
            </tr>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 100%; text-align: center;">&nbsp;</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td
                    style="background-color: rgb(214, 177, 237); width: 100%; text-align: center;">
                    Domicilio</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 65%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspirante->dom_calle)}}
                @if ($aspirante->dom_num_exterior)
                <span>NO. EXTERIOR {{mb_strtoupper ($aspirante->dom_num_exterior)}}</span>
                @else <span></span> @endif
                @if ($aspirante->dom_num_interior)
                <span>NO. INTERIOR {{mb_strtoupper ($aspirante->dom_num_interior)}}</span>
                @else <span></span> @endif
                </td>
                <td class="rosap1" style="width: 35%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspirante->dom_colonia)}}&nbsp;
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 65%; text-align: center;">
                    Calle, número exterior, número interior</td>
                <td class="blancop1" style="width: 35%; text-align: center;">
                    Colonia</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 18%; text-align: center;">{{mb_strtoupper ($aspirante->dom_postal)}}&nbsp;
                </td>
                <td class="rosap1" style="width: 41%; text-align: center;">{{mb_strtoupper ($aspirante->dom_municipio)}}&nbsp;
                </td>
                <td class="rosap1" style="width: 41%; text-align: center;">{{mb_strtoupper ($aspirante->dom_localidad)}}&nbsp;
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 18%; text-align: center;">
                    Código postal</td>
                <td class="blancop1" style="width: 41%; text-align: center;">
                    Municipio</td>
                <td class="blancop1" style="width: 41%; text-align: center;">
                    Localidad</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 50%; text-align: center;">&nbsp;
                </td>
                <td class="rosap1" style="width: 25%; text-align: center;">{{ $aspirante->tel_fijo }}&nbsp;
                </td>
                <td class="rosap1" style="width: 25%; text-align: center;">{{ $aspirante->tel_celular }}&nbsp;
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="final">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" style="width: 50%; text-align: center;">
                    &nbsp;</td>
                <td class="blancop1" style="width: 25%; text-align: center;">
                    Teléfono fijo</td>
                <td class="blancop1" style="width: 25%; text-align: center;">
                    Teléfono Celular</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <!--TERMINA SECCION 02-->

    <!-- INICIA SECCION 03-->
    <table class="inicio">
        <tbody>
            
                <tr>
                    <td class="rosap1" style="width: 50%; text-align: center;">Marque con una “X”
                        su último grado
                        de estudios
                    </td>
                    <td class="rosap1" style="width: 50%; text-align: center;">Medio por el que se
                        enteró de la
                        convocatoria
                        <br>(Maque con una “X”)</br>
                    </td>
                </tr>
            
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        
            <tr>
                
                <td class="rosap1" style="width: 15%; text-align: left;">Primaria</td>

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Primer grado')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">1&ordm;</span>
                        @else
                            <span>1</span>
                        @endif
                    </td>
                   

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Segundo grado')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">2&ordm;</span>
                        @else
                            <span>2&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Tercer grado')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">3&ordm;</span>
                        @else
                            <span>3&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Cuarto grado')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">4&ordm;</span>
                        @else
                            <span>4&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Quinto grado')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">5&ordm;</span>
                        @else
                            <span>5&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Primaria Sexto grado')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">6&ordm;</span>
                            @else
                            <span>6&ordm;</span>
                        @endif
                    </td>
                    
                
                <td class="grisp1" style="width: 51px; text-align: center;">A. Cartel</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='A. Cartel')
                            <span style="font-weight: bold;">X</span>
                        @endif
                        
                    </td>

                <td class="grisp1" style="width: 51px; text-align: center;">B. Volante</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='B. Volante')
                        <span style="font-weight: bold;">X</span>
                        @endif
                        
                    </td>

                <td class="grisp1" style="width: 51px; text-align: center;">C. Televisión</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='C. Televisión')
                        <span style="font-weight: bold;">X</span>
                        @endif
                        
                    </td>
            </tr>
        
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
            <tr>
                <td class="grisp1" style="width: 15%; text-align: left;">Secundaria</td>
                
                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Secundaria Primer grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">1&ordm;</span>
                    @else
                    <span>1&ordm;</span>
                    @endif
                </td>

                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Secundaria Segundo grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">2&ordm;</span>
                    @else
                    <span>2&ordm;</span>
                    @endif
                </td>

                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Secundaria Tercero grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">3&ordm;</span>
                    @else
                    <span>3&ordm;</span>
                    @endif
                </td>

                <td class="blancop1" style="width: 5.833333333333333%;">&nbsp;</td>
                <td class="blancop1" style="width: 5.833333333333333%;">&nbsp;</td>
                <td class="blancop1" style="width: 5.833333333333333%;">&nbsp;</td>

                <td class="grisp1" style="width: 51px; text-align: center;">D. Prensa</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='D. Prensa')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>

                <td class="grisp1" style="width: 51px; text-align: center;">E. Perifoneo</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='E. Perifoneo')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>
                <td class="grisp1" style="width: 51px; text-align: center;">F. Bolsa de<br>trabajo</br></td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                    @if ($aspirante->medio_convocatoria=='F. Bolsa de trabajo')
                    <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 15%; text-align: left; font-size: 6pt;">Bachillerato o carrera técnica</td>
                
                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Bachillerato/preparatoria Primer grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">1&ordm;</span>
                    @else
                    <span>1&ordm;</span>
                    @endif
                </td>

                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Bachillerato/preparatoria Segundo grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">2&ordm;</span>
                    @else
                    <span>2&ordm;</span>
                    @endif
                </td>

                <td class="grisp1" style="width: 5.833333333333333%; text-align: center; position: relative;">
                    @if ($aspirante->ultimo_grado_estudio=='Bachillerato/preparatoria Tercero grado')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">3&ordm;</span>
                    @else
                    <span>3&ordm;</span>
                    @endif
                </td>

                <td class="blancop1" style="width: 5.833333333333333%; center;">&nbsp;</td>
                <td class="blancop1" style="width: 5.833333333333333%; center;">&nbsp;</td>
                <td class="blancop1" style="width: 5.833333333333333%; center;">&nbsp;</td>

                <td class="grisp1" style="width: 51px; text-align: center;">G. Pláticas <br>informativas</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='G. Pláticas informativas')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>

                <td class="grisp1" style="width: 51px; text-align: center;">H. Radio</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='H. Radio')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>

                <td class="grisp1" style="width: 51px; text-align: center;">I. Contacto <br>personal</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='I. Contacto personal')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                    </td>

            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
       
            <tr>
                <td class="grisp1" style="width: 15%; text-align: left;">Licenciatura</td>
                    <td class="rosap1" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura Primer año')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">1&ordm;</span>
                        @else
                            <span>1&ordm;</span>
                        @endif
                    </td>
                   

                    <td class="rosap1" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura Segundo año')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">2&ordm;</span>
                        @else
                            <span>2&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura Tercero año')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">3&ordm;</span>
                        @else
                            <span>3&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura Cuarto año')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">4&ordm;</span>
                        @else
                            <span>4&ordm;</span>
                        @endif
                    </td>
                    

                    <td class="rosap1" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura Quinto año')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">5&ordm;</span>
                        @else
                            <span>5&ordm;</span>
                        @endif
                    </td>

                    <td class="rosap1" style="width: 5%; text-align: center; font-size: 5pt; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura concluida')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 5pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Concluida</span>
                        @else
                            <span>Concluida</span>
                        @endif
                    </td>

                    <td class="rosap1" style="width: 5%; text-align: center; font-size: 5pt; position: relative;">
                        @if ($aspirante->ultimo_grado_estudio=='Licenciatura titulado')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Titulado</span>
                        @else
                            <span>Titulado</span>
                        @endif
                    </td>

                
                <td class="grisp1" style="width: 51px; text-align: center;">J. Página del INE</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='J. Página del INE')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                </td>
                <td class="grisp1" style="width: 51px; text-align: center;">K. Red Social</td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='K. Red Social')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                </td>
                <td class="grisp1" style="width: 51px; text-align: center;">L. Otro</br></td>
                    <td class="rosap1" style="width: 51px; text-align: center;">
                        @if ($aspirante->medio_convocatoria=='L. Otro')
                            <span style="font-weight: bold;">X</span>
                        @endif                        
                </td>
                </td>
                
            </tr>
        
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 15%; text-align: left;">Carrera(Especifique)</td>
                <td class="rosap1" style="width: 35%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspirante->carrera)}}</td>
                <td class="grisp1" style="width: 8.4%; text-align: center;">Especifique</td>
                <td class="rosap1" style="width: 41.6%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspirante->otro_medio_convocatoria)}}</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp1" style="width: 15%; text-align: left;">Especialidad</td>
                    <td class="grisp1" style="width: 35%; text-align: center;">
                    @if ($aspirante->ultimo_grado_estudio=='Especialidad')
                        <span style="font-weight: bold;">X</span>
                    @endif
                    </td>
                <td class="blancop1" style="width: 50%; text-align: center;">¿Cuál es el motivo por el que quiere participar como SE o CAE Local?</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table style="table-layout: fixed; height: 25px;" class="final" >
        <tbody>
        <tbody>
            <tr>
                <td class="rosap1" style="width: 15%; text-align: left;">Maestría</td>
                    <td class="rosap1" style="width: 35%; text-align: center;">
                    @if ($aspirante->ultimo_grado_estudio=='Maestria')
                        <span style="font-weight: bold;">X</span>
                    @endif
                    </td>
                <td class="rosap1" rowspan="3" style="width: 55%; text-align: justify; word-wrap: break-word;" VALIGN="top">{{ mb_strtoupper ($aspirante->motivo_secae)}}</td>
            </tr>
            <tr>
                <td class="grisp1" style="width: 15%; text-align: left;">Doctorado</td>
                <td class="rosap1" style="width: 35%; text-align: center;">
                    @if ($aspirante->ultimo_grado_estudio=='Doctorado')
                        <span style="font-weight: bold;">X</span>
                    @endif
                    </td>
            </tr>
            <tr>
                <td class="rosap1" 
                    style="width: 20%; text-align: left; word-wrap: break-word;">¿Realiza estudios actualmente?<br>Especifique: </td>
                <td class="rosap1" style="width: 30%; text-align: center; word-wrap: break-word;">{{ mb_strtoupper ($aspirante->realiza_estudios)}}</td>
                
            </tr>
        </tbody>
        </tbody>
    </table>
    
    
    <!-- TERMINA SECCION 03 -->
    <!-- INICIA SECCION 04 -->
    <table class="inicio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop1" colspan="2"
                    style="width: 100; text-align: center;">
                    EXPERIENCIA<br>(Señale los tres últimos empleos o prestaciones de servicios. El no contar con experiencia no será causa de exclusión)
                    </br></td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap1" rowspan="2" style="width: 40%; text-align: center;">Nombre de la empresa o Institución</td>
                <td class="rosap1" rowspan="2" style="width: 20%; text-align: center;">Puesto</td>
                <td class="rosap1" colspan="2" style="width: 20%; text-align: center;">Periodo en que laboró</td>
                <td class="rosap1" rowspan="2" style="width: 10%; text-align: center;">Teléfono</td>
            </tr>
            <tr>
                <td class="rosap1" style="text-align: center; width: 10%;">Inicio</td>
                <td class="rosap1" style="text-align: center; width: 10%;">Fin</td>
            </tr>
        </tbody>
    </table>
    <table class="final">
        <tbody>
        @foreach($aspirante['experiencia_laboral'] as $key => $aspi)
            <tr>
                <td class="blancop1" style="width: 5%; text-align: center;">{{$key+1}}</td>
                <td class="grisp1" style="width: 35%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspi['nombre'])}}</td>
                <td class="grisp1" style="width: 20%; text-align: center; word-wrap: break-word;">{{mb_strtoupper ($aspi['puesto'])}}</td>
                <td class="grisp1" style="width: 10%; text-align: center;">{{$aspi['inicio']}}</td>
                @if (isset($aspi['actual']))
                <td class="grisp1" style="width: 10%; text-align: center;">actualmente</td>
                @else
                <td class="grisp1" style="width: 10%; text-align: center;">{{$aspi['fin']}}</td>
                @endif
                <td class="grisp1" style="width: 10%; text-align: center;">{{$aspi['telefono']}}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- TERMINA SECCION 04 -->
    <footer>
    <table style="table-layout: fixed; width: 726px; margin-top: 50pt;">
        <tr>
            <td style="text-align: center; font-size: 6pt;"> LINEAMIENTO PARA EL RECLUTAMIENTO, SELECCIÓN Y CONTRATACIÓN DE SUPERVISORES/AS ELECTORALES Y CAPACITADORES/AS-ASISTENTES ELECTORALES | ANEXO 21.1 SOLICITUD 
        </td>
        </tr>
    </table>
</footer>
    
    <!-- TERMINA PÁGINA 01 -->

    <table class="saltopagina"></table>

    <!-- INICIA PÁGINA 02 -->

    
    <!-- INICIA SECCIÓN 01 -->
    <table class="inicio">
        <tbody>
        <tbody>
            <tr>
                <td class="blancop2" colspan="2"
                    style="width: 100; text-align: center;">OTROS
                    DATOS<br>(Marque con una
                    “X” según corresponda)</br></td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
            <tr>
            <td class="rosap2" style="width: 40%; text-align: left;">1. ¿Ha participado en algún proceso electoral?</td>
            <td class="rosap2" style="width: 5%; position: relative;">
                        @if ($aspirante->p1_proceso_electoral=='Si')
                            <span style="font-size: 9pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                            @else
                            <span>Si</span>
                        @endif
                    </td>
                    <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p1_proceso_electoral=='No')
                    <span style="font-size: 9pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                        @else
                        <span>No</span>
                        @endif
                    </td>


                <td class="rosap2" style="width: 40%; text-align: left;">12. ¿Sabe conducir automóvil?*</td>
                    <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->p12_conducir=='Si')
                        <span style="font-size: 9pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                            @else
                            <span>Si</span>
                        @endif
                    </td>
                    <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p12_conducir=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                        @else
                        <span>No</span>
                        @endif
                    </td>
            </tr>
        </tbody>
    </table>


    <table class="enmedio">
        <tbody>
            <tr>
                <td class="grisp2" style="width: 15%; text-align: left;">1.1.¿Cuál?</td>
                <td class="grisp2" style="width: 35%; text-align: center; font-weight: bold; word-wrap: break-word;">{{$aspirante->p1_1_cual}}</td>
                <td class="grisp2" style="width: 40%; text-align: left;">12.1.¿Cuenta con licencia de manejo? *</td>
                    <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                            @if ($aspirante->p12_1_licencia=='Si')
                            <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                                @else
                                <span>Si</span>
                            @endif
                        </td>
                        <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                        @if ($aspirante->p12_1_licencia=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                            @else
                            <span>No</span>
                            @endif
                        </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap2" style="width: 10; text-align: left;">1.2 ¿De qué forma</td>
                <td class="rosap2" style="width: 3%; text-align: left; position: relative;">
                    @if ($aspirante->p1_2_forma=='SE')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">SE</span>
                    @else
                        <span>SE</span>
                    @endif
                </td>

                <td class="rosap2" style="width: 4%; text-align: left; position: relative;">
                    @if ($aspirante->p1_2_forma=='CAE')
                    <span style="font-size: 9pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">CAE</span>
                    @else
                        <span>CAE</span>
                    @endif
                </td>

                
                <td class="rosap2" style="width: 4%; text-align: center; position: relative;">
                    @if ($aspirante->p1_2_forma=='Otro')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Otro</span>
                        @else
                        <span>Otro</span>
                    @endif
                </td>
                
                <td class="rosap2" style="width: 25%; text-align: left; word-wrap: break-word;">Especifique: {{$aspirante->p1_2_otra_forma}}</td>

                <td class="rosap2" style="width: 40%; text-align: left;">12.2. ¿Cuenta con vehículo propio?*</td>

                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p12_2_vehiculo=='Si')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p12_2_vehiculo=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
            <tr>
                <td class="grisp2" style="width: 40%; text-align: justify;">2. ¿Tiene disponibilidad de tiempo para prestar sus servicios en horario fuera de lo habitual?</td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p2_disponibilidad=='Si')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>

                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p2_disponibilidad=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 40; text-align: left; position: relative;">12.3.Anote marca y modelo*.</td>
                <td class="grisp2" style="width: 10%; text-align: center; font-weight: bold; font-size: 5pt; word-wrap: break-word;">{{mb_strtoupper ($aspirante->p12_3_marca)}}</td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap2" style="width: 40%; text-align: justify;">3. ¿Está dispuesta/o a prestar sus servicios en fines de semana y  días festivos?</td>

                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p3_finsemana=='Si')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p3_finsemana=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>

                <td class="rosap2" style="width: 40%; text-align: justify;">12.4. ¿Está usted dispuesta/ o utilizar su vehículo para sus actividades si el OPL le brinda un apoyo económico para combustible? *</td>

                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p12_4_prestar=='Si')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p12_4_prestar=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp2" style="width: 40%; text-align: left;">4. ¿Está dispuesta/o a realizar actividades de campo? (visitar a la ciudadanía casa por casa, trasladarse grandes distancias, entre otras)</td>

                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p4_campo=='Si')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p4_campo=='No')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>

                <td class="grisp2" style="width: 30%; text-align: left;">13. ¿Cuánto tiempo le lleva trasladarse de su domicilio al OPL? *</td>
                <td class="grisp2" style="width: 5%; text-align: center;">Horas:</td>
                <td class="grisp2" style="width: 5%; text-align: center;">{{ date("H", strtotime($aspirante->p13_tiempo_traslado))}}&nbsp;</td>
                <td class="grisp2" style="width: 5%; text-align: center;">Minutos:</td>
                <td class="grisp2" style="width: 5%; text-align: center;">{{ date("i", strtotime($aspirante->p13_tiempo_traslado))}}&nbsp;
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap2" style="width: 40%; text-align: justify;">5.¿Milita en algún partido político u organización política o ha participado activamente en alguna campaña electoral en el último año?</td>

                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p5_milita=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p5_milita=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>

                <td class="rosap2" style="width: 40%; text-align: left;">14.¿Cuenta con acceso a Internet en su casa?*</td>

                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p14_acceso_internet=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p14_acceso_internet=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    
    <table class="enmedio">
        <tbody>
            <tr>
                <td class="grisp2" style="width: 40%; text-align: justify;">6. ¿Ha participado como representante de partido
                    político con registro vigente, candidatura independiente registrada en el PE 2023-2024 o coalición en alguna elección realizada en los últimos tres años?</td>

                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p6_como_representante=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>

                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p6_como_representante=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 3; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>

                <td class="grisp2" style="width: 40%; text-align: left;">15. ¿Tiene alguna discapacidad? *</td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p15_discapacidad=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 6; bottom: 0; margin: auto;">Si</span>
                    @else
                    <span>Si</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p15_discapacidad=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 6; bottom: 0; margin: auto;">No</span>
                    @else
                    <span>No</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap2" rowspan="2"
                    style="width: 40%; text-align: justify;">7. ¿Es familiar consanguíneo o por afinidad, hasta el 4° grado, de alguna persona que ostente el cargo de Vocal de la Junta Local o Distrital Ejecutiva o del Consejo Local o Distrital INE o de órganos ejecutivos y directivos del OPL (Consejeras/os y representantes de partido político o, en su caso, candidatas/os independientes que ya estén registradas/os para el PE 2023-2024)?</td>
                <td class="rosap2" rowspan="2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p7_familiar=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 20; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 20; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>

                <td class="rosap2" rowspan="2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p7_familiar=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 20; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 20; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif
                </td>

                <td colspan="4" class="rosap2" style="width: 50%; text-align: center;">15.1 En caso de haber señalado “Sí” en la pregunta 15, marque con una “X” *</td>
            </tr>
            <tr>
                <td class="rosap2" style="width: 12.5%; text-align: center; position: relative;">
                @if ($aspirante->p15_1_tipodiscapacidad=='fisica_motora')
                <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 7; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 8; bottom: 0; margin: auto;">A) Física o motora</span>
                    @else
                        <span>A) Física o motora</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 12.5%; text-align: center; position: relative;">
                    @if ($aspirante->p15_1_tipodiscapacidad=='intelectual')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 7; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 8; bottom: 0; margin: auto;">B) Intelectual</span>
                    @else
                        <span>B) Intelectual</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 12.5%; text-align: center; position: relative;">
                    @if ($aspirante->p15_1_tipodiscapacidad=='mental_psicosocial')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 5; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 6; bottom: 0; margin: auto;">C) Mental o <br>psicosocial</span>
                    @else
                        <span>C) Mental o psicosocial</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 12.5%; text-align: center; position: relative;">
                    @if ($aspirante->p15_1_tipodiscapacidad=='sensorial')
                    <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 7; bottom: 0; margin: auto;">X</span>
                        <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 8; bottom: 0; margin: auto;">D) Sensorial</span>
                    @else
                        <span>D) Sensorial</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="grisp2" rowspan="2"
                    style="width: 40%; text-align: justify;">8. ¿Es o ha sido persona servidora pública vinculada con programas sociales
                    en el gobierno municipal, estatal o federal, persona operadora de programas sociales y actividades institucionales, cualquiera que sea su denominación, persona servidora de la nación o ha ostentado alguno de estos cargos en el último año previo a este registro para el PE 2023-2024? **</td>
                <td class="grisp2" rowspan="2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p8_servidora=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 30; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 30; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>

                <td class="grisp2" rowspan="2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p8_servidora=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 30; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 30; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif
                </td>
                
                <td colspan="4" class="grisp2" style="width: 50%; text-align: justify;">
                    A) Discapacidad física o motriz: imposibilita la movilidad y coordinación de partes del cuerpo.<br>
                    B) Mental o psicosocial: trastorno del comportamiento y limitaciones de socialización.<br>
                    C) Intelectual: limitación moderada o grave de la función cerebral.<br>
                    D) Sensorial: afecta a los órganos de la visión, audición, tacto, olfato y gusto. El uso de aparatos que ayuden a
                    corregir o compensar la debilidad visual no es considerado como discapacidad sensorial.
                </td>
            </tr>
            <tr>
                <td colspan="4" class="rosap2" style="width: 50%; text-align: left; word-wrap: break-word;">15.2 Especifique*: {{$aspirante->p15_2_otradiscapacidad}}</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
            <tr>
                <td class="rosap2" style="width: 40%; text-align: left;">9. ¿Cuenta con experiencia en manejo o trato con grupos?</td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p9_experiencia=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p9_experiencia=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 40%; text-align: left;">16. ¿Sabe utilizar el teléfono celular? *</td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p16_utilizar_celular=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p16_utilizar_celular=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="enmedio">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap2" style="width: 40%; text-align: left;">10. ¿Ha impartido capacitación presencial o virtual?</td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p10_impartido=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif
                </td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p10_impartido=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif
                </td>
                <td class="grisp2" style="width: 50%; text-align: left;">&nbsp;</td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <table class="enmedio">
        <tbody>
            <tr>s
                <td class="rosap2" style="width: 40%; text-align: left;">11. ¿Habla alguna lengua indígena?</td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p11_habla_lindigena=='Si')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">Si</span>
                    @else
                        <span>Si</span>
                    @endif</td>
                <td class="rosap2" style="width: 5%; text-align: center; position: relative;">
                    @if ($aspirante->p11_habla_lindigena=='No')
                        <span style="font-size: 10pt; font-weight: bold; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">X</span>
                            <span style="font-size: 7pt; position: absolute; text-align: center; right: 0; left: 0; top: 0; bottom: 0; margin: auto;">No</span>
                    @else
                        <span>No</span>
                    @endif</td>
                <td class="grisp2" style="width: 50%; text-align: left;">&nbsp;
                </td>
            </tr>
        </tbody>
    </table>

    <table class="final">
        <tbody>
            <tr>
                <td class="rosap2" style="width: 20%; text-align: left;" colspan="2">11.1 ¿Cuál?</td>
                <td class="rosap2" style="width: 30%; text-align: center;font-weight: bold; text-decoration: underline; text-decoration-thickness: 3px; word-wrap: break-word;">{{mb_strtoupper ($aspirante->p11_1_cual)}}</td>
                <td class="grisp2" style="width: 50%; text-align: left;">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <!-- TERMINA SECCIÓN 02 -->
    <!-- INICIA SECCIÓN 03 -->
    <table>
        <tbody>
        <tbody>
            <tr>
                <td class="blancop2" style="width: 100%; text-align: left; font-size: 6pt;">*LAS
                    PREGUNTAS DE LA 11 A LA 15 SOLAMENTE SON INFORMATIVAS Y NO
                    SON MOTIVO DE EXCLUSIÓN. <br>
                    ** En cumplimiento al acuerdo INE/CG535/2023 por el que se
                    emiten los Lineamientos en acatamiento a la sentencia
                    dictada por la sala superior del TEPJF en el expediente
                    SUP-RAP-04/2023 y acumulados, que establecen medidas
                    preventivas para evitar la injerencia y/o participación de
                    personas servidoras públicas que manejan programas sociales
                    en el Proceso Electoral Federal y los Procesos Electorales
                    Locales 2023-2024, en la Jornada Electoral.
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <!-- TERMINA PÁGINA 03 -->
    <!-- INICIA SECCIÓN 04 -->
    <table style="border: #AD84C6 solid; margin-bottom: 10pt; width: 100%;">
        <tbody>
        <tbody>
            <tr>
                <td class="rosap2" style="width: 50%; text-align: left; font-size: 5pt;">
    <p style="text-align: center;">AVISO DE PRIVACIDAD
        SIMPLIFICADO</p>
    <p style="text-align: justify;">El Organismo Público Local en el estado de Chiapas, con
        domicilio en: Periferico Sur Poniente #2185, Colonia Penipak; Tuxtla Gutiérrez, Chiapas. C.P. 29060, reciba sus datos personales y es responsable del tratamiento que les dé. Los
        datos personales reunidos s serán utilizados para corroborar que la ciudadanía interesada en participar en el proceso de reclutamiento, selección y contratación de personal eventual que colaborará con el OPL como Supervisora/or Electoral Local o Capacitadora/or-Asistente Electoral Local, cumpla con los requisitos legales y administrativos establecidos en la Convocatoria. Simultáneamente, los datos personales serán utilizados para que la autoridad electoral cuente con información respecto de los grupos en situación de vulnerabilidad en los que se sitúan las personas con autoadscripción indígena; pertenecientes a la población afromexicana; que viven con algún tipo de discapacidad; que se consideran parte de las personas LGBTTTIQ+ o si se trata de una persona mexicana migrante, con el fin de realizar análisis de datos y estadísticas como insumos para el ejercicio de sus atribuciones, para determinar lo conducente en futuros procesos electorales. Lo anterior, de conformidad con el marco normativo electoral y con base en lo establecido en los artículos 6º Base A, fracciones II y III y 16, segundo párrafo de la Constitución Política de los Estados Unidos Mexicanos, así como los artículos 3º, fracción II y IX, 16, 17, 18, 19, 20, 21, 22, 23, 25,26, 27 y 28 de la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados. Si desea conocer nuestro aviso de privacidad integral consulte la siguiente dirección electrónica: https://shorturl.at/qzADJ
    </p>
</td>
                <td class="rosap2" style="width: 40%; text-align: center; font-size: 6pt;">DECLARO
                    <br>
                    <p style="text-align: justify;">Que de comprobarse que
                        alguno de los datos asentados en esta Solicitud
                        resultara falso, el OPL puede dejar sin efecto la
                        presente solicitud o, en su caso, el compromiso que
                        estableciera para contar con mis servicios, sin que el
                        OPL incurra en responsabilidad alguna sobre el
                        particular. </p>
                    <p style="text-align: justify;">De la misma manera
                        manifiesto mantener en estricta reserva y no revelar
                        ningún tipo de información sobre el contenido del Examen
                        de conocimientos, habilidades y aptitudes, así como de
                        la Entrevista para el proceso de selección de
                        Supervisoras/es Electorales Locales y
                        Capacitadoras/es-Asistentes Electorales Locales
                        correspondiente al Proceso Electoral 2023-2024, en caso
                        de acceder a ella.</p><br>
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
    <!-- TERMINA PÁGINA 04 -->
    <!-- INICIA SECCIÓN 05 -->
    <table style="border: #AD84C6 solid; width: 100%;">
        <tbody>
        <tbody>
            <tr>
                <td align="center" style="border: #AD84C6 solid; width: 10%;">
                @if ($aspirante->acepto_aviso=='1')
                        <span  style="font-family: DejaVu Sans, sans-serif; font-size: 15px;">&#10004;</span>
                    @else
                        <span>&nbsp;</span>
                    @endif                
               </td>
                <td class="blancop2"
                    style="border: #AD84C6 1px solid; width: 90%;">He leído el
                    aviso de privacidad y acepto los términos y condiciones.
                </td>
            </tr>
            <tr>
                <td align="center" style="border: #AD84C6 solid; width: 10%;">
                @if ($aspirante->acepto_declaratoria=='1')
                        <span  style="font-family: DejaVu Sans, sans-serif; font-size: 15px;">&#10004;</span>
                    @else
                        <span>&nbsp;</span>
                    @endif                
               </td>
                <td class="blancop2"
                    style="border: #AD84C6 1px solid; width: 90%;">Acepto ser
                    contactado/a vía correo electrónico para algún seguimiento o
                    notificación de información sobre el proceso de
                    reclutamiento y selección, en el que estoy participando.
                </td>
            </tr>
            <tr>
                <td align="center" style="border: #AD84C6 solid; width: 10%;">
                @if ($aspirante->acepto_ser_contactado=='1')
                        <span  style="font-family: DejaVu Sans, sans-serif; font-size: 15px;">&#10004;</span>
                    @else
                        <span>&nbsp;</span>
                    @endif  
                </td>
                <td class="blancop2"
                    style="border: #AD84C6 1px solid; width: 90%;"> Acepto la
                    declaratoria</td>
            </tr>
        </tbody>
        </tbody>
    </table>

    <table style="table-layout: fixed; width: 726px; margin-top: 20pt;">
	<tbody>
		<tr>
			<td style="text-align: center;  font-size: 8pt"><span style="color: #AD84C6; ">________________________________</span> <br>FIRMA DE LA PERSONA ASPIRANTE</td>
		</tr>
	</tbody>
</table>
    <!-- TERMINA PÁGINA 05 -->

</body>
</html>
