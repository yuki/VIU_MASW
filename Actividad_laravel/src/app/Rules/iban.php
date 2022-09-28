<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class iban implements Rule
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
        return preg_match("/ES\d{22}/",$value)
            // si queremos permitir espacios podríamos usar la siguiente regexp
            // || preg_match("/ES\d{2} \d{4} \d{4} \d{2} \d{10}/",$value)
        ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('formulario.iban_validation');
    }
}
