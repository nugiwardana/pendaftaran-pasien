<?php

namespace App\Http\Controllers;

use App\Models\districts;
use App\Http\Requests\StoredistrictsRequest;
use App\Http\Requests\UpdatedistrictsRequest;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredistrictsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredistrictsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\districts  $districts
     * @return \Illuminate\Http\Response
     */
    public function show(districts $districts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\districts  $districts
     * @return \Illuminate\Http\Response
     */
    public function edit(districts $districts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedistrictsRequest  $request
     * @param  \App\Models\districts  $districts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedistrictsRequest $request, districts $districts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\districts  $districts
     * @return \Illuminate\Http\Response
     */
    public function destroy(districts $districts)
    {
        //
    }
}
