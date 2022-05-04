<?php

namespace Database\Factories;

use App\Models\Company;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class CompanyFactory
*/
class CompanyFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Company::class;

    /**
     * @return array
     */
    #[ArrayShape(['title' => "string", 'description' => "string", 'phone' => "string", "creator_id" => "int"])]
    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
            'description' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'creator_id' => 1
        ];
    }
}
