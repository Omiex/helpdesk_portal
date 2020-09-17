<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'nik' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:24'],
            'jabatan' => ['required', 'string', 'max:24'],
            'lokasi' => ['required', 'string', 'max:24'],
            'telepon' => ['required', 'string', 'max:13'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $user->forceFill([
            'nik' => $input['nik'],
            'name' => $input['name'],
            'divisi' => $input['divisi'],
            'jabatan' => $input['jabatan'],
            'lokasi' => $input['lokasi'],
            'telepon' => $input['telepon'],
            'email' => $input['email'],
        ])->save();
    }
}
