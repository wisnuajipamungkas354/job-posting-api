<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyJobRequest;
use App\Models\CompanyJob;
use Illuminate\Http\Request;

class CompanyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CompanyJob::all();

        return $this->sendResponse('Berhasil mengambil data', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyJobRequest $companyJobRequest)
    {
        $data = $companyJobRequest->validated();
        $user = $this->getUserProfile();
        $data = ['company_id' => $user->id] + $data;

        CompanyJob::create($data);

        return $this->sendResponse('Job berhasil ditambahkan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyJob $companyJob)
    {
        return $this->sendResponse('Berhasil mengambil data', 200, $companyJob);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyJobRequest $companyJobRequest, CompanyJob $companyJob)
    {
        $data = $companyJobRequest->all();
        $companyJob->update($data);

        return $this->sendResponse('Job berhasil diupdate!', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyJob $companyJob)
    {
        $companyJob->delete();

        return $this->sendResponse('Job berhasil dihapus!');
    }
}
