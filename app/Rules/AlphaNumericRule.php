<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNumericRule implements Rule
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
        $alpha = true; $numeric = true; $specialCharacter = [ '!', '@', '#', '?', '%' ]; $special = true;

        foreach (str_split($value,1) as $item) {

            if (ctype_alpha($item)) { $alpha = false; }

            if(is_numeric($item)){ $numeric = false; }

            if(in_array($item, $specialCharacter)){ $special = false; }

        }

        return !$alpha && !$numeric && !$special;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain letters, numbers and special character from ! @ # ? %.';
    }
}
