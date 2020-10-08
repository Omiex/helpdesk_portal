<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->ean8,
            'name' => $this->faker->name,
            'divisi' => $this->faker->realText($maxNbChars = 20),
            'jabatan' => $this->faker->realText($maxNbChars = 20),
            'lokasi' => $this->faker->realText($maxNbChars = 20),
            'telepon' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('secret'),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
