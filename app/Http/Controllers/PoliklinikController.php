<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use App\Http\Requests\StorePoliklinikRequest;
use App\Http\Requests\UpdatePoliklinikRequest;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Http\Requests\StorePoliklinikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoliklinikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePoliklinikRequest  $request
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePoliklinikRequest $request, Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliklinik $poliklinik)
    {
        //
    }
}
