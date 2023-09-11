<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tps;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kabupatenOptions = TPS::pluck('kabupaten')->unique(); // Ambil daftar kabupaten unik dari data TPS
        $kabupatenFilter = $request->input('kabupaten');
    
        $tps = TPS::query();
    
        if ($kabupatenFilter) {
            $tps->where('kabupaten', $kabupatenFilter);
        }
    
        $tps = $tps->paginate(4);
    
        return view('tps.index', compact('tps', 'kabupatenOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'notps' => 'required',
        'alamat' => 'required',
        'kabupaten' => 'required',
        ]);

        $tps = new Tps;
        $tps->notps = $request->notps;
        $tps->alamat = $request->alamat;
        $tps->kabupaten = $request->kabupaten;
        $tps->save();

        return redirect()->route('tps.index')->with('success','Data Berhasil Ditambah');
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
        return view('tps.edit')->with(['tps' => Tps::find($id),]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'notps' => 'required',
            'alamat' => 'required',
            'kabupaten' => 'required',
            ]);
    
            $tps = Tps::find($id);
            $tps->notps = $request->notps;
            $tps->alamat = $request->alamat;
            $tps->kabupaten = $request->kabupaten;
            $tps->save();
    
            return redirect()->route('tps.index')->with('success','Data Berhasil Diupdate');
    }

    public function home()
    {
        $relawan = auth()->user(); //fungsinya untuk cuma menampilkan tps yang sesuai dengan kabupaten
        $tpsData = Tps::where('id', $relawan->tps_id)->get();
        return view('home', compact('tpsData'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tps = Tps::find($id);
        $tps->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
