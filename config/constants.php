<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'grados' => [
        'Primaria',
        'Secundaria',
        'Bachillerato o carrera técnica',
        'Licenciatura',
        'Maestría',
        'Doctorado',
    ],

    'estatus_grados' => [
        'Trunca',
        'Concluida',
        'Titulado',
    ],

    'tipos_de_medio' => [
        'A. Cartel',
        'B. Volante',
        'C. Televisión',
        'D. Prensa',
        'E. Perifoneo',
        'F. Bolsa de trabajo',
        'G. Pláticas informativas',
        'H. Radio',
        'I. Contacto personal',
        'J. Página del INE',
        'K. Red Social',
        'L. Otro',

    ],

    'primaria' => [
        'Primer grado',
        'Segundo grado',
        'Tercero grado',
        'Cuarto grado',
        'Quinto grado',
        'Sexto grado',
    ],

    'secundaria' => [
        'Primer grado',
        'Segundo grado',
        'Tercero grado',
    ],

    'bachi_tecnica' => [
        'Primer grado',
        'Segundo grado',
        'Tercero grado',
    ],

    'licenciatura' => [
        'Primer año',
        'Segundo año',
        'Tercero año',
        'Cuarto año',
        'Quinto año',
        'Concluida',
        'Titulado',
    ],

    'distritos' => [
        'Tuxtla Gutiérrez Oriente',
        'Tuxtla Gutiérrez Poniente',
        'Chiapa de Corzo',
        'Yajalón',
        'San Cristóbal de las Casas',
        'Comitán de Domínguez',
        'Ocosingo',
        'Simojovel',
        'Palenque',
        'La Trinitaria',
        'Bochil',
        'Pichucalco',
        'Cintalapa',
        'Tonalá',
        'Huixtla',
        'Motozintla',
        'Tapachula',
        'Las Margaritas',
        'Venustiano Carranza',
        'Chamula',
        'Villaflores'
    ],

    'entidades' => [
        'Aguascalientes',
        'Baja California',
        'Baja California Sur',
        'Campeche',
        'Chiapas',
        'Chihuahua',
        'Coahuila de Zaragoza',
        'Colima',
        'Ciudad de México',
        'Durango',
        'Guanajuato',
        'Guerrero',
        'Hidalgo',
        'Jalisco',
        'México',
        'Michoacán de Ocampo',
        'Morelos',
        'Nayarit',
        'Nuevo León',
        'Oaxaca',
        'Puebla',
        'Querétaro',
        'Quintana Roo',
        'San Luis Potosí',
        'Sinaloa',
        'Sonora',
        'Tabasco',
        'Tamaulipas',
        'Tlaxcala',
        'Veracruz de Ignacio de la Llave',
        'Yucatán',
        'Zacatecas',
    ],

    'pueblos' => [
        'Tseltal',
        'Tsotsil',
        'Tojolabal',
        "Cho'l",
        'Lacandon',
    ],
    'tipos_candidatura' => [
        'Gubernatura',
        'Diputaciones',
        'Ayuntamientos',
        'Diputaciones RP',
    ],
    'cargos' => [
        'Gobernatura',
        'Propietario',
        'Suplente',
        'Presidencia',
        'Sindicatura Propietaria',
        'Sindicatura Suplente',
        '1er. Regiduría Propietaria',
        '2a. Regiduría Propietaria',
        '3a. Regiduría Propietaria',
        '4a. Regiduría Propietaria',
        '5a. Regiduría Propietaria',
        '1er. Suplente General',
        '2a.  Suplente General',
        '3a.  Suplente General'
    ],
    'sexos' => [
        'Femenino',
        'Masculino',
        'Prefiero no decir',
    ],
    'sexos1' => [
        'Si',
        'No',
        'Prefiero no decir',
    ],

    'distritos' => [
        'Distrito 1',
        'Distrito 2',
        'Distrito 3',
    ],

    'partidos' => [
        [
            'nombre' => 'Partido Acción Nacional',
            'sigla'  => 'PAN'
        ],
        [
            'nombre' => 'Partido Revolucionario Institucional',
            'sigla'  => 'PRI'
        ],
        [
            'nombre' => 'Partido del Trabajo',
            'sigla'  => 'PT'
        ],
        [
            'nombre' => 'Partido Verde Ecologista de México',
            'sigla'  => 'PVEM'
        ],
        [
            'nombre' => 'Movimiento Ciudadano',
            'sigla'  => 'MC'
        ],
        [
            'nombre' => 'Chiapas Unido',
            'sigla'  => 'CHU'
        ],
        [
            'nombre' => 'Partido Morena',
            'sigla'  => 'PM'
        ],
        [
            'nombre' => 'Partido Morena',
            'sigla'  => 'PM'
        ],
        [
            'nombre' => 'Podemos Mover a Chiapas',
            'sigla'  => 'PMCH'
        ],
        [
            'nombre' => 'Nueva Alianza Chiapas',
            'sigla'  => 'NACH'
        ],
        [
            'nombre' => 'Partido Popular Chiapaneco',
            'sigla'  => 'PPCH'
        ],
        [
            'nombre' => 'Fuerza por México',
            'sigla'  => 'FXM	'
        ],
        [
            'nombre' => 'Partido Encuentro Solidario Chiapas',
            'sigla'  => 'PES	'
        ],
        [
            'nombre' => 'Redes Sociales Progresistas Chiapas',
            'sigla'  => 'RSP	'
        ],
        [
            'nombre' => 'POR CHIAPAS AL FRENTE',
            'sigla'  => 'PAN_PRD	'
        ],
        [
            'nombre' => 'JUNTOS HACEMOS HISTORIA EN CHIAPAS',
            'sigla'  => 'PVEM_PM	'
        ],

    ],
    'paises' => [
        'Estados unidos',
        'Turquia',
        'Australia',
        'Rusia',
    ],
    'cuestionarios' => [
        [
            'clave' => 'autoadscripcion-indigena',
            'titulo' => 'Autoadscripción indigena',
            'preguntas' => [
                [
                    "texto" => '1- ¿Se identifica como una persona indígena o como parte de al pueblo o comunidad indígena?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => '¿Habla o entiende alguna lengua indígena?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => '¿A qué pueblo y/o comunidad indígena pertenece?',
                    "opciones" => [
                        'select' => 'pueblos',
                        'Otro',
                        'Prefiero no contestar',
                        'No aplica'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'poblacion-discapacidad',
            'titulo' => 'Población con discapacidad',
            'preguntas' => [
                [
                    "texto" => '¿Tiene algun tipo de discapacidad?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => 'En caso de haber respondido afirmativamente la pregunta anterior,  el tipo de discapacidad con el que vive es:',
                    "opciones" => [
                        'Permanente',
                        'Temporal',
                        'Otra',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => 'En caso afirmativo, ¿de qué tipo?',
                    "opciones" => [
                        'Física',
                        'Sensorial' => [
                            'subtexto' => 'Esta incluye la deficiencia estructural o funcional de los  órganos de:',
                            'subopciones' => [
                                'La audición',
                                'La visión',
                                'El olfato',
                                'El tacto',
                                'El gusto'
                            ]
                        ],
                        'Mental',
                        'Intelectual',
                        'Otra',
                        'Prefiero no contestar',
                    ]
                ],
                [
                    "texto" => 'Su tipo de discapacidad le dificulta o impide:',
                    "opciones" => [
                        'Caminar,subir o bajar escaleras con sus piernas',
                        'Mover o usar brazos y/o manos',
                        'Ver (aunque use lentes)',
                        'Escuchar (aunque use aparato auditivo)',
                        'Hablar o comunicarse',
                        'Aprender, recordar y/o concentrarse',
                        'Interactuar emocional y/o intelectualmente en un entorno social',
                        'Otra',
                        'Prefiero no contestar',
                    ]
                ]
            ]
        ],
        [
            'clave' => 'poblacion-afroamericana',
            'titulo' => 'Población afroamericana',
            'preguntas' => [
                [
                    "texto" => '¿Se considera una persona afromexicana o que forma parte de alguna comunidad afrodescendiente?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'diversidad-sexual',
            'titulo' => 'Diversidad sexual',
            'preguntas' => [
                [
                    "texto" => '¿Es usted una persona de la población LGBTTTIQ+ (Lesbiana, Gay, Bisexual, Transgénero, Travesti, Transexual, Intersexual, Queer, No Binaria, u otra)?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => 'En caso de haber respondido afirmativamente a la pregunta  anterior, usted se identifica como:',
                    "opciones" => [
                        'Hombre gay',
                        'Mujer lesbiana',
                        'Persona bisexual',
                        'Mujer trans',
                        'Hombre trans',
                        'Persona intersexual',
                        'Persona no binaria',
                        'Persona Queer',
                        'Otra',
                        'Prefiero no contestar'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'persona-mexicana-migrante',
            'titulo' => 'Personas mexicanas migrantes',
            'preguntas' => [
                [
                    "texto" => '¿Es usted migrante?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => '¿En qué país reside?',
                    "opciones" => [
                        'select' => 'paises',
                        'Prefiero no contestar',
                    ]
                ],
                [
                    "texto" => '¿Cuánto tiempo ha vivido en el extranjero?',
                    "opciones" => [
                        'De 0 a 5 años',
                        'De 6 a 15 años',
                        'Más de 15 años',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => '¿Cuál fue el motivo de la residencia en el extranjero?',
                    "opciones" => [
                        'Familiar',
                        'Estudio',
                        'Trabajo',
                        'Otro',
                        'Prefiero no contestar'
                    ]
                ],
                [
                    "texto" => 'Cuando emigró, ¿se encontraba con una situación regular de trabajo o con un lugar asegurado en alguna institución educativa del país extranjero?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'poblacion-persona-joven',
            'titulo' => 'Población de personas jóvenes: Aquella cuya edad quede comprendida entre los 21 y 29 años.',
            'preguntas' => [
                [
                    "texto" => '¿Es parte de la población joven?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'poblacion-persona-mayor',
            'titulo' => 'Población de personas mayores: Aquella cuya edad sea de 60 años o más.',
            'preguntas' => [
                [
                    "texto" => '¿Es parte de la población de personas mayores?',
                    "opciones" => [
                        'Si',
                        'No',
                        'Prefiero no contestar'
                    ]
                ]
            ]
        ],
        [
            'clave' => 'rubro-socioeconomico',
            'titulo' => 'Rubro socioeconómico:',
            'preguntas' => [
                [
                    "texto" => 'Pensando en todo lo que ganó usted el mes pasado, ¿en cuál de  los siguientes grupos de ingresos se encuentra? Por favor incluya salario, o alguna otra ganancia que generalmente recibe cada mes.',
                    "opciones" => [
                        'Menos de $11,000',
                        'De $11,001 a $25,000',
                        'De $25,001 a $50,000',
                        'De $50,001 a $75,000',
                        'De $75,001 a $112,000',
                        'Más de $112,000',
                        'No recibe ingresos',
                        'Prefiero no contestar',
                    ]
                ],
                [
                    "texto" => 'Su fuente principal de ingresos es:',
                    "opciones" => [
                        'Salario',
                        'Negocio propio' => [
                            'subtexto' => '',
                            'subopciones' => [
                                'Atendido con familiares',
                                'Con menos de 5 empleados ',
                            ]
                        ],
                        'Compañía o empresa registrada, con 5 empleados o más',
                        'No ha laborado en los 3 meses anteriores',
                        'Prefiero no contestar '
                    ]
                ]
            ]
        ],
    ],
    'campos' => [
        'nombre' => "Nombre",
    ]
];
