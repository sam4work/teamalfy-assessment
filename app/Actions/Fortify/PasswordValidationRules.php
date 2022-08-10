<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        $password_rules = new Password();

//        The password must contain at least 1 uppercase letter, 1 lowercase letter,
//        1 symbol and 1 number with a minimum length of 6 characters
        $password_rules->length(6)->requireNumeric()->requireSpecialCharacter()->requireUppercase();
        return ['required', 'string', $password_rules, 'confirmed'];
    }
}
