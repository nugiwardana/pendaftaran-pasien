<?php

namespace App\Http\Controllers;

use App\Models\Subdistricts;
use App\Http\Requests\StoreSubdistrictsRequest;
use App\Http\Requests\UpdateSubdistrictsRequest;

class SubdistrictsController extends Controller
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
     * @param  \App\Http\Requests\StoreSubdistrictsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubdistrictsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subdistricts  $subdistricts
     * @return \Illuminate\Http\Response
     */
    public function show(Subdistricts $subdistricts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subdistricts  $subdistricts
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdistricts $subdistricts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubdistrictsRequest  $request
     * @param  \App\Models\Subdistricts  $subdistricts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubdistrictsRequest $request, Subdistricts $subdistricts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subdistricts  $subdistricts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdistricts $subdistricts)
    {
        //
    }
}
