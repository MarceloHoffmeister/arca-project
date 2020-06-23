<?php


namespace Arca\Domains\Ocurrence\Http\Controllers;

use Arca\Domains\Ocurrence\Services\CompaniesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompaniesController
{
    private $service;

    public function __construct(CompaniesService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): string
    {
        return $this->service->index($request->all());
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'whatsapp' => 'string|required',
            'city' => 'string|required',
            'uf' => 'string|required',
        ]);

        $response = $this->service->create($request->all());;

        return response()->json([
            'message' => 'Success!',
            'company_id' => $response->company_id,
            'code' => 1
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'company_id' => 'uuid|exists:companies|required',
            'name' => 'string',
            'email' => 'email',
            'whatsapp' => 'string',
            'city' => 'string',
            'uf' => 'string',
        ]);

        $response = $this->service->update($request->all());

        return response()->json([
            'message' => 'Success!',
            'company_id' => $response->company_id,
            'code' => 1
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->validate([
            'company_id' => 'uuid|exists:companies',
        ]);
        $response = $this->service->delete($request->all());

        return response()->json([
            'message' => 'Success!',
            'company_id' => $response->company_id,
            'code' => 1
        ]);
    }
}
