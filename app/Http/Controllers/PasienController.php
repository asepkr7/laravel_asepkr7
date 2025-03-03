<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rumahSakits = RumahSakit::all();
        $pasiens = Pasien::with('rumahSakit')->get();
        return view('pasien.index', compact('pasiens', 'rumahSakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData=$request->validate([
        'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'telepon' =>  ['required', 'regex:/^(\+62|0)[0-9]{9,13}$/'],

    ]);

    Pasien::create($validatedData);

    return redirect()->route('pasien.index')->with('success', 'Data berhasil disimpan.');
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
    public function edit(Pasien $pasien)
    {
        $rumahSakits = RumahSakit::all();
         return View('pasien.edit', compact('pasien', 'rumahSakits'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
         $validatedData=$request->validate([
        'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'telepon' =>  ['required', 'regex:/^(\+62|0)[0-9]{9,13}$/'],

    ]);

    Pasien::where('id', $pasien->id)->update($validatedData);
    return redirect()->route('pasien.index')->with('success', 'Data berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
         $pasien->delete();
        return response()->json(['success' => 'Data Berhasil dihapus']);
    }

     public function filterByRumahSakit($rumah_sakit_id)
    {
        $pasiens = Pasien::where('rumah_sakit_id', $rumah_sakit_id)->with('rumahSakit')->get();
        return response()->json($pasiens);
    }
}