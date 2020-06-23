<?php


namespace Arca\Domains\Ocurrence\Http\Controllers;


use Arca\Domains\Ocurrence\Services\IncidentsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncidentsController
{
    private $service;

    public function __construct(IncidentsService $service)
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
            'title' => 'string|required',
            'description' => 'string|required',
            'value' => 'numeric|required'
        ]);

        $response = $this->service->create($request->all());

        return response()->json([
            'message' => 'Success!',
            'incident_id' => $response->incident_id,
            'code' => 1
        ]);
    }
}
