<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $chucVus = ChucVu::all();
        return view('admin.chucvu.index',compact('chucVus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastcv = ChucVu::latest('MACV')->first();
        $newidcv = $lastcv ? $lastcv->MACV + 1 : 1;
        return view('admin.chucvu.create',compact('newidcv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCV = new ChucVu();

        $newCV->MACV = $request->MACV;
        $newCV->TENCV = $request->TENCV;
        $newCV->HSL = $request->HSL;

        $newCV->save();

        return redirect()->route('admin.chucvu.index');
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
        $chucvu = ChucVu::find($id);
        return view('admin.chucvu.edit', compact('chucvu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $CV = ChucVu::find($id);

        if($CV){
            
            $CV->MACV = $request->MACV;
            $CV->TENCV = $request->TENCV;
            $CV->HSL = $request->HSL;
            
            $CV->save();
        }

        return redirect()->route('admin.chucvu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChucVu::find($id)->delete();
        return redirect()->route('admin.chucvu.index');
    }
}
