<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class password implements Rule
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
            // https://www.php.net/manual/en/regexp.reference.unicode.php
            preg_match('/(.*\d){2,}/u',$value) // dígitos
            && preg_match("/(.*\p{Ll}){2,}/u",$value)  //letras minúsculas
            && preg_match("/(.*\p{Lu}){2,}/u",$value) //letras mayúsculas
            && preg_match('/(.*\W){1,}/u',$value) // \W -> signos de puntuación
        ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('formulario.password_validation');
    }
}
