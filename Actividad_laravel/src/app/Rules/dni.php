<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class dni implements Rule
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
        // si por un casual quisiese entrar alguien con DNI 9999999 o menor tendrá que poner 0 por delante
        return preg_match("/\d{8}[a-z]{1}/i",$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('formulario.dni_validation');
    }
}
