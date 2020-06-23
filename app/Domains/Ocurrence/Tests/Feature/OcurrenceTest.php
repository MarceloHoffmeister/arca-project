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
        $this->assertEquals($company->company_id, $company_id, 'o registro não foi encontrado ou não possui o mesmo company_id');
    }

    public function testExceptionCreationCompanyRoute(): void
    {
        $response = $this->post('ocurrence/companies', []);
        $response->assertStatus(302);
    }

    public function testUpdateCompanyRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $search = DB::table('public.companies')
            ->select('company_id')
            ->where('company_id', '=', $company->company_id)
            ->get();
        $company_id = $search[0]->company_id;

        $newCompany = DB::table('public.companies')
            ->select('*')
            ->where('company_id', '=', $company_id)
            ->get();

        $newCompany[0]->name = 'ONG 123';
        $this->put('ocurrence/companies', collect($newCompany[0])->toArray());

        $search = DB::table('public.companies')
            ->select('name')
            ->where('company_id', '=', $newCompany[0]->company_id)
            ->get();
        $name = $search[0]->name;

        $this->assertEquals($newCompany[0]->name, $name, 'o registro não foi encontrado ou não possui o mesmo name');
    }

    public function testExceptionUpdateCompanyRoute(): void
    {
        $response = $this->put('ocurrence/companies', []);
        $response->assertStatus(302);
    }

    public function testDeleteCompanyRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $search = DB::table('public.companies')
            ->select('company_id')
            ->where('company_id', '=', $company->company_id)
            ->get();

        $this->delete('ocurrence/companies', collect($search)->toArray());

        $search = DB::table('public.companies')
            ->select('company_id')
            ->where('company_id', '=', $company->company_id)
            ->get();

        $this->assertEquals([], collect($search)->toArray(), 'o registro não foi encontrado ou não possui o company_id');
    }

    public function testExceptionDeleteCompanyRoute(): void
    {
        $response = $this->put('ocurrence/companies', []);
        $response->assertStatus(302);
    }

    public function testListCompanyRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $search = DB::table('public.companies')
            ->select('*')
            ->where('company_id', '=', $company->company_id)
            ->get();

        $response = $this->get('ocurrence/companies', collect($search)->toArray());
        $response = json_decode($response->content(), true);

        $this->assertEquals($company->company_id, $response[0]['company_id'], 'o registro não foi encontrado ou não possui o mesmo company_id');
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

    public function testUpdateIncidentRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $incident = factory(Incident::class)->make();
        $this->post('ocurrence/incidents', $incident->toArray());

        $newIncident = DB::table('public.incidents')
            ->select('*')
            ->where('incident_id', '=', $incident->incident_id)
            ->get();

        $newIncident[0]->title = 'Titulo 123';
        $this->put('ocurrence/incidents', collect($newIncident[0])->toArray());

        $search = DB::table('public.incidents')
            ->select('title')
            ->where('incident_id', '=', $newIncident[0]->incident_id)
            ->get();
        $title = $search[0]->title;

        $this->assertEquals($newIncident[0]->title, $title, 'o registro não foi encontrado ou não possui o mesmo title');
    }

    public function testExceptionUpdateIncidentRoute(): void
    {
        $response = $this->put('ocurrence/incidents', []);
        $response->assertStatus(302);
    }

    public function testDeleteIncidentRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $incident = factory(Incident::class)->make();
        $this->post('ocurrence/incidents', $incident->toArray());

        $search = DB::table('public.incidents')
            ->select('incident_id')
            ->where('incident_id', '=', $incident->incident_id)
            ->get();

        $this->delete('ocurrence/incidents', collect($search)->toArray());

        $search = DB::table('public.incidents')
            ->select('incident_id')
            ->where('incident_id', '=', $incident->incident_id)
            ->get();

        $this->assertEquals([], collect($search)->toArray(), 'o registro não foi encontrado ou não possui o incident_id');
    }

    public function testExceptionDeleteIncidentRoute(): void
    {
        $response = $this->put('ocurrence/incidents', []);
        $response->assertStatus(302);
    }

    public function testListIncidentRoute(): void
    {
        $company = factory(Company::class)->make();
        $this->post('ocurrence/companies', $company->toArray());

        $incident = factory(Incident::class)->make();
        $this->post('ocurrence/incidents', $incident->toArray());

        $search = DB::table('public.incidents')
            ->select('*')
            ->where('incident_id', '=', $incident->incident_id)
            ->get();

        $response = $this->get('ocurrence/incidents', collect($search)->toArray());
        $response = json_decode($response->content(), true);

        $this->assertEquals($incident->incident_id, $response[0]['incident_id'], 'o registro não foi encontrado ou não possui o mesmo company_id');
    }
}
