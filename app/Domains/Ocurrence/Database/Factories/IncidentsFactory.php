<?php

namespace Arca\Domains\Ocurrence\Database\Factories;

use Arca\Domains\Ocurrence\Database\Models\Incident;
use Arca\Domains\Ocurrence\Models\Company;
use Arca\Support\Database\Factories\ModelFactory;

class IncidentsFactory extends ModelFactory
{
    /**
     * @var string
     */
    protected $model = Incident::class;

    /**
     * @return array<mixed>
     */
    protected function fields(): array
    {
        $company_id = Company::firstOr('company_id')->company_id;

        return [
            'company_id' => $company_id,
            'incident_id' => $this->faker->uuid,
            'title' => $this->faker->name,
            'description' => $this->faker->text(60),
            'value' => $this->faker->randomNumber(2),
        ];
    }
}
