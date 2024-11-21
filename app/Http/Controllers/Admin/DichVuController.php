<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dvName = $request->input('dvName');
        $query = DichVu::query();

        if ($dvName) {
            $query->where('tenDV', 'like', '%' . $dvName . '%');
        }

        $dichVus = $query->get();
        return view('admin.DichVu.index',compact('dichVus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastDichVu = DichVu::latest('maDV')->first();
        $newId = $lastDichVu ? $lastDichVu->maDV + 1 : 1;
        $dichvu = new DichVu();
        $dichvu->maDV = $newId;
        $dichvu->tenDV = $request->tenDV;
        $dichvu->giaDV = $request->giaDV;
        if($request->batBuoc)
            $dichvu->batBuoc = 1;
        else $dichvu->batBuoc = 0;
        //$dichvu->batBuoc = $request->batBuoc;
        $dichvu->donViTinh = $request->donViTinh;
        //$dichvu->dvThang = $request->dvThang;
        if($request->dvThang)
            $dichvu->dvThang = 1;
        else $dichvu->dvThang = 0;
        $dichvu->save();
        return redirect()->route('admin.dichvu.index');
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
        $dichvu = DichVu::find($id);
        $dichvu->maDV = $request->maDV;
        $dichvu->tenDV = $request->tenDV;
        $dichvu->giaDV = $request->giaDV;
        $dichvu->batBuoc = $request->batBuoc;
        $dichvu->donViTinh = $request->donViTinh;
        $dichvu->dvThang = $request->dvThang;
        $dichvu->save();
        return redirect()->route('admin.dichvu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dichvu = DichVu::find($id);
        $dichvu->delete();
        return redirect()->route('admin.dichvu.index');
    }
}
