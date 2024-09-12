<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        
            $data = Pegawai::with(['golongan'])->get();
            $golongan = Golongan::pluck('nama_golongan', 'id');


        return view('dashboard.pegawai.index', [
            'tittle' => 'Data pegawai',
            'pegawaiTable' => $data,
            'dataGolongan' => $golongan,
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
            'nama' => 'required|string',
            'alamat' => 'required|string|min:5',
            
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'required|in:0,1',
            'id_golongan' => 'required|exists:golongan,id'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
        
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        Pegawai::create($data);
        return redirect('/dashboard/pegawai')->with('success', 'New Golongan Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
        $data = Pegawai::with(['cuti', 'golongan'])->where('id', $pegawai->id)->first();
        
            
            if (!$data){
                return redirect('/dashboard/pegawai')->with('error', 'Data not found');

            }
            return view('dashboard.pegawai.show', [
                'pegawaiTable' => $data,
            ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
        $golongan = Golongan::pluck('nama_golongan', 'id');
        if (!$pegawai){
            return redirect('/dashboard/pegawai')->with('error', 'Data not found');

        }
        return view('dashboard.pegawai.edit', [
            'pegawai' => $pegawai,
            'dataGolongan' => $golongan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
        $rules = [
            'nama' => 'string',
            'alamat' => 'string|min:5',
            
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'in:0,1',
            'id_golongan' => 'required|exists:golongan,id'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
           
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        if (!$pegawai){
            return redirect('/dashboard/pegawai')->with('error', 'Error Not Found');
            }
            $pegawai->update($data);
            $pegawai->save();
           
        return redirect('/dashboard/pegawai/')->with('success', ' pegawai Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
