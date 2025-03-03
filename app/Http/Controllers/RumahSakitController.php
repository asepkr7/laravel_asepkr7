<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rumahSakits = RumahSakit::all();
        return view('rumah_sakit.index', compact('rumahSakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rumah_sakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData=$request->validate([
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'email' => 'required|email|unique:rumah_sakits,email',
        'telepon' =>  ['required', 'regex:/^(\+62|0)[0-9]{9,13}$/'],

    ]);

    RumahSakit::create($validatedData);

    return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil disimpan.');
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
    public function edit(RumahSakit $rumah_sakit)
    {
        return View('rumah_sakit.edit', compact('rumah_sakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RumahSakit $rumah_sakit)
    {
         $validatedData=$request->validate([
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'email' => 'required|email',
        'telepon' =>  ['required', 'regex:/^(\+62|0)[0-9]{9,13}$/'],

    ]);

     RumahSakit::where('id',$rumah_sakit->id)
        ->update($validatedData);

         return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahSakit $rumah_sakit)
    {
        $rumah_sakit->delete();
        return response()->json(['success' => 'Data Berhasil dihapus']);
    }
}