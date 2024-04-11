<?php


// app/Rules/GeorgianPhoneNumber.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GeorgianPhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Regular expression to match Georgian phone numbers
        // Modify this regex pattern according to your specific requirements
        return preg_match('/^(995)?(5|77|79|32|93|94|95|96|98)\d{7}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid Georgian phone number.';
    }
}
