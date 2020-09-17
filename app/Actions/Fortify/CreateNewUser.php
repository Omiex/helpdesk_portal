<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nik' => ['required', 'numeric', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:24'],
            'jabatan' => ['required', 'string', 'max:24'],
            'lokasi' => ['required', 'string', 'max:24'],
            'telepon' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'nik' => $input['nik'],
            'name' => $input['name'],
            'divisi' => $input['divisi'],
            'jabatan' => $input['jabatan'],
            'lokasi' => $input['lokasi'],
            'telepon' => $input['telepon'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
