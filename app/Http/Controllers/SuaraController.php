<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suara;
use App\Models\paslon;
use App\Models\tps;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    $suaraData = $request->input('suara');
    $tps_id = $request->tps_id;
    $kabupaten = $request->kabupaten;
    
    foreach ($suaraData as $paslonId => $jumlahSuara) {
        Suara::updateOrCreate(
            ['paslon_id' => $paslonId, 'kabupaten' => $kabupaten, 'tps_id' => $tps_id],
            ['jumlah_suara' => $jumlahSuara]
        );
    }   
    TPS::find($tps_id)->update(['status' => 'terisi']);
    return redirect()->route('home')->with('success', 'Data suara berhasil disimpan.');
}

    

    public function hasilquick(Request $request)
    {
        // Ambil daftar kabupaten yang memiliki suara
        $kabupatensWithSuara = Suara::distinct('kabupaten')->pluck('kabupaten');

        // Ambil data suara paslon dari setiap kabupaten
        $suaraByKabupaten = [];
        foreach ($kabupatensWithSuara as $kabupaten) {
            $suaraByKabupaten[$kabupaten] = Suara::where('kabupaten', $kabupaten)
                ->with('paslon')
                ->paginate(14);
        }
        // Mendapatkan semua paslon dengan total suara mereka
        $paslon = Paslon::with('suara', 'suara.tps')->get();
    
        // Menghitung $maxTotalSuara
        $maxTotalSuara = $paslon->sum(function($candidate) {
            return $candidate->suara->sum('jumlah_suara');
        });
    
        // Mengirimkan data ke tampilan
        return view('hasilquick', ['paslon' => $paslon, 'suaraByKabupaten' => $suaraByKabupaten, 'maxTotalSuara' => $maxTotalSuara]);
    }

    public function datasuara(Request $request)
    {
        // Ambil daftar kabupaten yang memiliki suara
        $kabupatensWithSuara = Suara::distinct('kabupaten')->pluck('kabupaten');

        // Ambil data suara paslon dari setiap kabupaten
        $suaraByKabupaten = [];
        foreach ($kabupatensWithSuara as $kabupaten) {
            $suaraByKabupaten[$kabupaten] = Suara::where('kabupaten', $kabupaten)
                ->with('paslon')
                ->paginate(14);
        }
        // Mendapatkan semua paslon dengan total suara mereka
        $paslon = Paslon::with('suara', 'suara.tps')->get();
    
        // Mengirimkan data ke tampilan
        return view('datasuara', ['paslon' => $paslon, 'suaraByKabupaten' => $suaraByKabupaten,]);
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
