<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Http\Requests\TenantRequest;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Tenant::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenantRequest $request)
    {
        Tenant::create($request->validated());
        return response()->json(['message' => 'Data Tenant berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return response()->json($tenant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(TenantRequest $request, Tenant $tenant)
    {
        $tenant->update($request->validated());
        return response()->json(['message' => 'Data Tenant berhasil diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return response()->json(['message' => 'Data Tenant berhasil dihapus'], 200);
    }
}
