<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Http\Requests\StoreLocaleRequest;
use App\Http\Requests\UpdateLocaleRequest;

class LocaleController extends Controller
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
     * @param  \App\Http\Requests\StoreLocaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function show(Locale $locale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function edit(Locale $locale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocaleRequest  $request
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocaleRequest $request, Locale $locale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locale $locale)
    {
        //
    }
}
