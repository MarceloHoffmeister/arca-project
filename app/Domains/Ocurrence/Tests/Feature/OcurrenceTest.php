<?php

namespace Arca\Support\Tests\Feature;

use Arca\Domains\Ocurrence\Database\Models\Incident;
use Arca\Domains\Ocurrence\Models\Company;
use Arca\Support\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;

class OcurrenceTest extends TestCase
{
    use DatabaseMigrations;

    public function testStatusCreationCompanyRoute(): void
    {
        $company = factory(Company::class)->make();
        $response = $this->post('ocurrence/companies', $company->toArray());

        $response->assertStatus(200);
    }

    public function testCreationCompanyRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $search = DB::table('public.companies')
            ->select('company_id')
            ->where('company_id', '=', $company->company_id)
            ->get();
        $company_id = $search[0]->company_id;
        $this->assertEquals($company->company_id, $company_id, 'o registro não foi encontrado ou não possui o mesmo incident_id');
    }

    public function testExceptionCreationCompanyRoute(): void
    {
        $response = $this->post('ocurrence/companies', []);
        $response->assertStatus(302);
    }

    public function testStatusCreationIncidentRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $incident = factory(Incident::class)->make();
        $response = $this->post('ocurrence/incidents', $incident->toArray());

        $response->assertStatus(200);
    }

    public function testCreationIncidentRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $incident = factory(Incident::class)->make();
        $this->post('ocurrence/incidents', $incident->toArray());

        $search = DB::table('public.incidents')
            ->select('incident_id')
            ->where('incident_id', '=', $incident->incident_id)
            ->get();
        $incident_id = $search[0]->incident_id;
        $this->assertEquals($incident->incident_id, $incident_id, 'o registro não foi encontrado ou não possui o mesmo incident_id');
    }

    public function testExceptionCreationIncidentRoute(): void
    {
        $response = $this->post('ocurrence/incidents', []);
        $response->assertStatus(302);
    }
}
