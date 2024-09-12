<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        
        if($request){
            $data = Golongan::where('nama_golongan', 'like', '%'.$request->search. '%')->get();
        }else{
            $data = Golongan::all();
        }
        return view('dashboard.golongan.index', [
            'tittle' => 'Login',
            'active' => 'login',
            'golonganTable' => $data,
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
            'nama_golongan' => 'required|string',
            'gaji_pokok' => 'required|integer|min:0',
            'tunjangan_jabatan' => 'required|integer|min:0'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
           
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        Golongan::create($data);
        return redirect('/dashboard/golongan')->with('success', 'New Golongan Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Golongan $golongan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Golongan $golongan)
    {
        //
        $golongans = Golongan::find($golongan);
        if (!$golongans){
            return response()->json([
                'status'=> 'error',
                'message'=> "data not found"
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail Data golongan',
            'data'    => $golongan  
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Golongan $golongan)
    {
       $rules = [
            'nama_golongan' => 'required|string',
            'gaji_pokok' => 'required|integer|min:0',
            'tunjangan_jabatan' => 'required|integer|min:0'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
       if (!$golongan){
        return response()->json([
            'status' => 'error',
            'message' => 'golongan not found'
        ], 404);
         }
        $golongan->update($data);
        $golongan->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Golongan $golongan)
    {
        if (!$golongan){
            return response()->json([
                'status' => 'error',
                'message' => 'golongan not found'
            ], 404);
        }

        Golongan::destroy($golongan->id);

        return redirect('/dashboard/golongan')->with('success', ' Post Has Been Deleted');
    }
}
