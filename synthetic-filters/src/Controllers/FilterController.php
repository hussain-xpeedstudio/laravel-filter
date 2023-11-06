<?php

namespace SyntheticFilters\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SyntheticFilters\Models\Filter;
use SyntheticFilters\Traits\FilterTrait;
use SyntheticFilters\Traits\ResponseTrait;
use Validator;

class FilterController
{
    use FilterTrait;
    use ResponseTrait;

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
