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

    public function index(): string
    {
        return 'Hello World';
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

        $response = $this->service->create($request->all());
        $response = $response->toArray();

        return response()->json([
            'message' => 'Success!',
            'company_id' => $response['company_id'],
            'code' => 1
        ]);
    }
}
