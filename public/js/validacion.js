var vform = {
    forms: [],
    events: [],
    errors: [],
    _PATTERN: {
        // 'nombre': "([A-Za-záéíóúñÁÉÍÓÚÑ]{1}[A-Za-záéíóúñÁÉÍÓÚÑ|0-9| _']+[ ]*)+",
        'nombre': "([A-Za-záéíóúñÁÉÍÓÚÑ|0-9| _']+[ ]*)+",
        'email': "^[\\w!#$%&'*+/=?`{|}~^-]+(?:\\.[\\w!#$%&'*+/=?`{|}~^-]+)*@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,6}$",
        'edad': "^([0-9]*){1,3}",
        'sexo': "^[Hh|Mm]",
        'numero': "^[0-9]*",
        'file': "^[A-Za-záéíóúñÁÉÍÓÚÑ0-9]*)$",
        'texto': "^[A-Za-záéíóúñÁÉÍÓÚÑ0-9]*)$",
        'texto2': "([A-Za-záéíóúñÁÉÍÓÚÑ|0-9| _']*)+",
        'telefono': "^[0-9]{10,11}$",
        'password': "[A-Za-z0-9!?-]{8,12}",
        'password-confirm': "[A-Za-z0-9!?-]{8,12}",
    },
    _ERRORS: {
        'nombre': {
            'vacio': "Por favor ingrese un nombre",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de un nombre",
        },
        'email': {
            'vacio': "Por favor ingrese un email",
            'patron': "No coincide con el patrón",
            'tipo': "",
        },
        'edad': {
            'vacio': "Por favor ingrese la edad",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de edad",
        },
        'sexo': {
            'vacio': "Por favor elija una opción",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de sexo",
        },
        'numero': {
            'vacio': "Por favor ingrese un número",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de número",
        },
        'texto': {
            'vacio': "Por favor ingrese un texto",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de texto",
        },
        'telefono': {
            'vacio': "Por favor ingrese un número telefónico",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de teléfono",
        },
        'password': {
            'vacio': "Por favor ingrese una contraseña",
            'patron': "No coincide con el patrón",
            'tipo': "No coincide con el formato de contraseña",
        },
        'password-confirm': {
            'vacio': "Por favor vuelva a escribir la contraseña",
            'patron': "No coinciden las contraseñas",
            'tipo': "",
        },
    },

    inicio: function () {
        // console.clear();
        // console.log(this.forms, this.events, this.errors);
        this.getForms();
        this.setUuidForm();
        this.setEventsForm();
        // console.log(this.forms, this.events, this.errors);

        if (this.errors.length > 0) this.showErrors();
    },
    showErrors: function () {
        this.errors.forEach(element => {
            // console.log(element);
        });
    },
    crearUUID: function () {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });

    },
    setUuidForm: function () {
        this.forms.forEach(element => {
            // element.id = this.crearUUID();
            element.CLASS_ID = this.crearUUID();
            element.classList.add(element.CLASS_ID);
        });

    },
    getForms: function () {
        this.forms = document.querySelectorAll('form[role="form"]');

        return this.forms;

    },
    getTAG: function (TAG, FORM) {
        // console.log(TAG, FORM);
        // var tag = FORM.querySelector("input[name='" + TAG.name + "'] + small.error") || false;
        var tag = document.getElementById(TAG.name + "Error") || false;
        // console.log("#" + TAG.name + "Error");
        // console.log(tag);
        if (!tag) {
            this.errors.push({
                item: FORM.elements[i].name,
                form: FORM
            });
            FORM.classList.add('invalid');

        }
        return tag;
    },
    getPattern: function (TIPO) {
        return this._PATTERN[TIPO];

    },
    setPattern: function (PATTERN) {
        this._PATTERN = PATTERN;

    },
    getError: function (TIPO) {
        return this._ERRORS[TIPO];

    },
    setErrorMsg: function (TIPO) {
        return {
            _ERRORS: this._ERRORS,
            arr: function (ARGUMENTOS) {
                this._ERRORS[TIPO] = ARGUMENTOS;
            },
            vacio: function (MSG) {
                this._ERRORS[TIPO].vacio = MSG;

            },
            patron: function (MSG) {
                this._ERRORS[TIPO].patron = MSG;

            },
            tipo: function (MSG) {
                this._ERRORS[TIPO].tipo = MSG;

            }

        }

    },
    setEventsForm: function () {
        this.forms.forEach(element => {
            // console.log(element.elements);

            if (!this.events[element.CLASS_ID]) this.events[element.CLASS_ID] = {};

            for (i = 0; i < element.elements.length; i++) {
                // Disable all form controls
                if (element.elements[i].type != 'submit' && element.elements[i].type != 'button') {
                    // console.log(element.elements[i]);
                    var TAG = this.getTAG(element.elements[i], element);
                    // console.log(TAG);
                    this.events[element.CLASS_ID][element.elements[i].name] = element.elements[i];

                    var EL = this.events[element.CLASS_ID][element.elements[i].name];
                    if (EL.dataset.tipo) EL.pattern = this.getPattern(EL.dataset.tipo);
                    EL.addEventListener('input', function (event) {
                        // console.log(this.name, this.itemError);
                        var itemError = document.getElementById(this.name + 'Error');
                        // Cada vez que el usuario escribe algo, verificamos si
                        // los campos del formulario son válidos.

                        if (this.validity.valid) {
                            // console.log('EL.validity.valid', this.validity.valid);

                            // En caso de que haya un mensaje de error visible, si el campo
                            // es válido, eliminamos el mensaje de error.
                            itemError.innerHTML = ''; // Restablece el contenido del mensaje
                            itemError.className = 'error'; // Restablece el estado visual del mensaje

                        } else {
                            // console.log('else', itemError);
                            // Si todavía hay un error, muestra el error exacto
                            // console.log(itemError, this.validity);
                            if (this.validity.valueMissing) {
                                // console.log('EL.validity.valueMissing', this.validity.valueMissing);
                                // Si el campo está vacío
                                // muestra el mensaje de error siguiente.
                                // itemError.textContent = 'Debe introducir un VALOR';
                                itemError.textContent = this.dataset.tipo ? vform.getError(this.dataset.tipo).vacio : '';
                            } else if (this.validity.typeMismatch) {
                                // console.log('EL.validity.typeMismatch', this.validity.typeMismatch);
                                // Si el campo no contiene un nombre
                                // muestra el mensaje de error siguiente.
                                // console.log(this.validity.typeMismatch);
                                if (this.dataset.error) itemError.textContent = this.dataset.error;
                                else itemError.textContent = this.dataset.tipo ? vform.getError(this.dataset.tipo).tipo : '';

                            } else if (this.validity.patternMismatch) {
                                // console.log('EL.validity.patternMismatch', this.validity.patternMismatch);
                                // Si el campo no contiene un nombre
                                // muestra el mensaje de error siguiente.
                                // console.log(this.validity.typeMismatch);
                                if (this.dataset.error) itemError.textContent = this.dataset.error;
                                else itemError.textContent = this.dataset.tipo ? vform.getError(this.dataset.tipo).patron : '';

                            } else if (this.validity.tooShort) {
                                // console.log('EL.validity.tooShort', this.validity.tooShort);
                                // Si los datos son demasiado cortos
                                // muestra el mensaje de error siguiente.
                                itemError.textContent = `Debe tener al menos ${ this.minLength } caracteres; ha escrito ${ this.value.length }.`;

                            }
                        }

                        if (this.dataset.tipo == 'password-confirm') {
                            // console.log(this.dataset.tipo);
                            // console.log(vform.getError(this.dataset.tipo).patron);
                            // console.log(this.form.querySelector('[data-tipo="password"]'));
                            // console.log(this.form.querySelector('[data-tipo="password"]').value, this.value);
                            if (this.form.querySelector('[data-tipo="password"]').value === this.value) {
                                this.setCustomValidity('');
                                this.classList.remove('password-invalid');
                                // console.log('password-confirm OK');
                                itemError.innerHTML = '';
                            } else {
                                itemError.textContent = this.dataset.tipo ? vform.getError(this.dataset.tipo).patron : '';
                                this.setCustomValidity(itemError.textContent);
                                this.classList.add('password-invalid');
                                // console.log('password-confirm Fail');
                            }

                        }
                    }, false);
                    // console.log(element, EL.name);

                }
            }

        });

    }


}
vform.inicio();
