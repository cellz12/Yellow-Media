<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class UserFactory
*/
class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @return array
     */
    #[ArrayShape(['first_name' => "string", 'last_name' => "string", 'phone' => "string", 'password' => "string", 'email' => "string"])]
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'password' => Hash::make('qwe123'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
