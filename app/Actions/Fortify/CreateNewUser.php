<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
//        In development mode, In production it will be stored in database
        $countries = implode(',', ['ghana', 'uk', 'usa', 'togo', 'nigeria']);

//       Validate user input
        /*        Validator::make($input, [
                    'name' => ['required', 'string', 'max:50'],
                    'username' => ['required', 'alpha_num', 'unique:users,username', 'max:50'], //The username can only allow numbers and alphabets
                    'dob' => ['required', 'before:-18 years'], // must be 18 years and above
                    'nationality' => ['required', 'string', 'in:' . $countries],
                    'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                    'phoneNumber' => ['nullable', 'numeric', 'digits_between:10,15',], // to be improved
                    'photo' => ['nullable', 'mimes:jpg,bmp,png'],
                    'bio' => ['nullable', 'max:200'],
                    'password' => $this->passwordRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                ], [
                    'dob.before' => 'You must be older than 18 and above'
                ])->validate();*/





//        Create user details and store into database
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'dob' => $input['dob'],
            'nationality' => $input['nationality'],
            'username' => $input['username'],
            'phone_number' => $input['phoneNumber'],
            'bio' => $input['bio'],
        ]);


//        Attempt to store profile photo
//        Check a file was uploaded

        if ($input['photo'] && request()->file('photo')) {
            $user->updateProfilePhoto($input['photo']);
        }

        return $user;
    }
}
