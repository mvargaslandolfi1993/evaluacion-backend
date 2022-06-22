<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponsibleRequest;
use App\Http\Resources\ResponsibleResource;
use App\Models\Responsible;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResponsibleResource::collection(
            Responsible::orderBy('created_at', 'desc')->paginate(25)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResponsibleRequest $request)
    {
        return new ResponsibleResource(
            Responsible::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Responsible $responsible)
    {
        return new ResponsibleResource(
            $responsible
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResponsibleRequest $request, Responsible $responsible)
    {
        $responsible->update($request->validated());

        return new ResponsibleResource(
            $responsible
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsible $responsible)
    {
        $responsible->delete();

        return response()->json([
            'message' => 'The responsible has been deleted'
        ], 200);
    }
}
