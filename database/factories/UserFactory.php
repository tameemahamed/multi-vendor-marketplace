<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $mail = ['yahoo', 'gmail', 'hotmail'];
        $username = str_replace(' ', '', strtolower($name));
        $email = $username.rand(1,299).'@'.$mail[array_rand($mail)].'com';
        $mobile = '+8801'.rand(3,9).rand(10000000, 99999999);

        return [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'mobile_number' => $mobile,
            'gender' => rand(false, true),
            'date_of_birth' => fake()->dateTimeBetween('1960-01-01', '2011-12-31'),
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'role_id' => 3,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
