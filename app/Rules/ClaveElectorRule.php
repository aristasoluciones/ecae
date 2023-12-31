<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClaveElectorRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $nacAnio = substr($value,6,2);
        $nacMes  = substr($value,8,2);
        $nacDia  = substr($value,10,2);

        if(!is_numeric($nacAnio) || !is_numeric($nacMes) || !is_numeric($nacDia))
            return false;

        $anio = (int)$nacAnio + 1900;
        if($anio < 1938)
            $anio +=100;

        if(!checkdate($nacMes, $nacDia,$anio))
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute no contiene un formato valido';
    }
}
