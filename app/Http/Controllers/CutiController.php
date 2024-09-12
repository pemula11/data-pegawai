<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Cuti::with(['pegawai'])->get();
        


    return view('dashboard.cuti.index', [
        'tittle' => 'Data Cuti',
        'cutiTable' => $data
    ]);
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
        //
        $rules = [
            'id_pegawai' => 'required|exists:pegawai,id',
            'tanggal_mulai' => 'required|date',
            'lama_cuti' => 'required|integer'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }
        
        Cuti::create($data);
        return redirect()->back()->with('success', 'New Cuti Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        //
        if (!$cuti){
            return response()->json([
                'status' => 'error',
                'message' => 'golongan not found'
            ], 404);
        }

        Cuti::destroy($cuti->id);

        return redirect()->back()->with('success', ' Data Has Been Deleted');
    }
}
