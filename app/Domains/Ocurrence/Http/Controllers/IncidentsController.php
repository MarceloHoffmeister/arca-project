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

    public function index(Request $request): string
    {
        return $this->service->index($request->all());
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'company_id' => 'uuid|exists:companies',
            'title' => 'string|required',
            'description' => 'string|required',
            'value' => 'numeric|required'
        ]);

        $response = $this->service->create($request->all());
        $response = $response->attributesToArray();

        return response()->json([
            'message' => 'Success!',
            'incident_id' => $response['incident_id'],
            'code' => 1
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'incident_id' => 'uuid|exists:incidents|required',
            'title' => 'string',
            'description' => 'string',
            'value' => 'numeric'
        ]);

        $response = $this->service->update($request->all());
        $response = $response->attributesToArray();

        return response()->json([
            'message' => 'Success!',
            'incident_id' => $response['incident_id'],
            'code' => 1
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->validate([
            'incident_id' => 'uuid|exists:incidents',
        ]);

        $response = $this->service->delete($request->all());

        return response()->json([
            'message' => 'Success!',
            'status' => $response,
            'code' => 1
        ]);
    }
}
