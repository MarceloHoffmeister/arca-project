<?php


namespace Arca\Domains\Ocurrence\Http\Controllers;


use Illuminate\Http\Request;

class IncidentController
{
    public function index(): string
    {
        return 'Hello World';
    }

    public function create(Request $request)
    {
//        $request->validate([
//            'title' => 'string|required',
//            'description' => 'string|required',
//            'value' => 'decimal|required'
//        ]);


        return response()->json('success!');
    }
}
