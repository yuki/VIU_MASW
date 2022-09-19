<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class telefono implements Rule
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
        /*
            Para el que lo lea: XD
            Las expresiones regulares de los teléfonos es un cristo. Intentar abarcarlo todo es muy complicado,
            que se lo digan a cualquiera que haya tocado un sistema de VoIP (Asterisk, Kamailio y demás). Así que
            esta regexp no es más que un triste ejemplo para números españoles.
            Un ejemplo del caos que podría llegar a ser esto en la vida real: https://regexpattern.com/phone-number/
        */
        return preg_match("/(\+)*\d{9,12}/",$value) || preg_match("/0034\d{9}/",$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('formulario.telefono_validation');
    }
}
