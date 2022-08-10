<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperLowerCaseRule implements Rule
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
        $lower = true; $upper = true;

        foreach (str_split($value,1) as $item) {

            if (ctype_lower($item)) { $lower = false; }

            if(ctype_upper($item)){ $upper = false; }

        }

        return !$lower && !$upper;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute needs to contain at least one upper and one lower character.';
    }
}
