<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\tps;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->paginate(4);
         return view('admin.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kabupatens = Tps::whereDoesntHave('relawan')
        ->select('kabupaten')
        ->distinct()
        ->get();
        $tpsData = Tps::whereDoesntHave('relawan')
        ->get()
        ->groupBy('kabupaten');
        return view('admin.create',compact('kabupatens','tpsData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tps_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'notelpon' => 'required',
            'kabupaten' => 'required',
            ]);
    
            User::create([
            'tps_id' => $request->tps_id, // Assign the provided tps_id value
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kabupaten' => $request->kabupaten,
            'notelpon' => $request->notelpon,
            ]);
        
            return redirect()->route('admin.index')->with('success', 'Relawan added successfully.');
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
        $user = User::find($id);
        $user->delete();

        return back();
    }
}
