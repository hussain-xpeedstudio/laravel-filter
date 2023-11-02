<?php

namespace SyntheticFilters\Controllers;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Http\Request;
use SyntheticFilters\Traits\ResponseTrait;
use SyntheticFilters\Traits\FilterTrait;
use Illuminate\Support\Str;
class FilterController
{
    use ResponseTrait,FilterTrait;
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
