<?php

namespace SyntheticFilters\Controllers;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Http\Request;
use SyntheticFilters\Traits\ResponseTrait;
use SyntheticFilters\Traits\FilterTrait;

class FilterController
{
    use ResponseTrait, FilterTrait;
    /**
     * Display a listing of the resource.
     */
    public function getRulesList()
    {
        try {
            $this->log('success', 'Data Fetched successfully');
            return $this->response(
                data: config('synthetic-filter.allRules'),
                status: 200
            );
        } catch (\Exception) {
            $this->log('success', 'Something went wrong');
            return $this->response(
                data: [],
                status: 500
            );
        }
    }

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
