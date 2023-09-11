<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paslon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\tps;

class PaslonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paslon.index')->with(['paslon' => Paslon::all(),]);
    }

    public function  input_suara_page($tps_id)
    {
        $tps = TPS::find($tps_id);
        $kabupaten = $tps->kabupaten; // Mengambil kabupaten dari TPS
        $paslon = Paslon::all();

        return view('input_suara_page', compact('tps_id', 'kabupaten', 'paslon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paslon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nourut' => 'required',
        'namapaslon' => 'required',
        'partai' => 'required',
        'gambar' => 'required|image',
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('uploads/paslon/' , $new_gambar);

        $paslon = new Paslon;
        $paslon->nourut = $request->nourut;
        $paslon->namapaslon = $request->namapaslon;
        $paslon->partai = $request->partai;
        $paslon->gambar = 'uploads/paslon/' . $new_gambar;
        $paslon->save();

        return redirect()->route('paslon.index')->with('success','Data Berhasil Ditambah');
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
        return view('paslon.edit')->with(['paslon' => Paslon::find($id),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nourut' => 'required',
            'namapaslon' => 'required',
            'partai' => 'required',
            'gambar' => 'required|image',
            ]);
    
            $gambar = $request->gambar;
            $slug = Str::slug($gambar->getClientOriginalName());
            $new_gambar = time() .'_'. $slug;
            $gambar->move('uploads/paslon/' , $new_gambar);
    
            $paslon =  Paslon::find($id);
            $paslon->nourut = $request->nourut;
            $paslon->namapaslon = $request->namapaslon;
            $paslon->partai = $request->partai;
            $paslon->gambar = 'uploads/paslon/' . $new_gambar;
            $paslon->save();
    
            return redirect()->route('paslon.index')->with('success','Data Berhasil Ditambah');
        }

       
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paslon = Paslon::find($id);
        $paslon->delete();

        return back()->with('eror','databerhasil dihapus');
    }
}
