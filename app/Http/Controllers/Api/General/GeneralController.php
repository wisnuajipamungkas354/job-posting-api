<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = General::query()->where('user_id', auth()->user()->id)->get();
        return $this->sendResponse('Berhasil mengambil data', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneralRequest $request)
    {
        
        $general = $request->validated();
        
        if($request->file('resume_url')) {
            $path = $request->file('resume_url')->store('resume', 'public');
            $general['resume_url'] = $path;
        }
        
        $general['user_id'] = auth()->user()->id;
        
        General::create($general);
        
        return $this->sendResponse('Profil berhasil disimpan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(General $general)
    {
        $user = $this->getUserProfile();

        return $this->sendResponse('Berhasil mengambil data', 200, [
            'user' => $user,
            'profile' => $general,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralRequest $request, General $general)
    {
        $data = $request->validated();
        $general->update($data);

        return $this->sendResponse('Profile berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(General $general)
    {
        $general->delete();

        return $this->sendResponse('Profile berhasil dihapus', 200);
    }
}
