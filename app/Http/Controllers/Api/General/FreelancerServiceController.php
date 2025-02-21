<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreelancerServiceRequest;
use App\Models\FreelancerService;
use Illuminate\Http\Request;

class FreelancerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FreelancerService::query()->where('general_id', auth()->user()->id)->get();
        return $this->sendResponse('Berhasil mengambil data', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FreelancerServiceRequest $request)
    {
        $data = $request->validated();
        $user = $this->getUserProfile();

        $data = ['general_id' => $user->id] + $data;

        FreelancerService::create($data);

        return $this->sendResponse('Berhasil menambahkan data', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FreelancerService $freelancerService)
    {
        return $this->sendResponse('Berhasil mengambil data', 200, $freelancerService);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FreelancerServiceRequest $request, FreelancerService $freelancerService)
    {
        $data = $request->validated();
        $freelancerService->update($data);
        return $this->sendResponse('Berhasil mengupdate data', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreelancerService $freelancerService)
    {
        $freelancerService->delete();
        return $this->sendResponse('Berhasil menghapus data', 200);
    }
}
