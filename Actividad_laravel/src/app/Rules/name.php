<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class name implements Rule
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
        return
            // sólo letras y espacios
            preg_match('/^[a-z\s]*$/i',$value)
        ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('formulario.name_validation');
    }
}
