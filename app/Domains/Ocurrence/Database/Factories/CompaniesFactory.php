<?php

namespace Arca\Domains\Ocurrence\Database\Factories;

use Arca\Domains\Ocurrence\Models\Company;
use Arca\Support\Database\Factories\ModelFactory;

class CompaniesFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Company::class;

    /**
     * @return array<mixed>
     */
    protected function fields(): array
    {
        return [
            'company_id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'whatsapp' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'uf' => $this->faker->randomLetter,
        ];
    }
}
