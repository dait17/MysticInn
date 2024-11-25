<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuangCao;
use Illuminate\Http\Request;

class QuangCaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quangcaos = QuangCao::all();
        return view('admin.quangcao.index', compact('quangcaos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quangcao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qc = new QuangCao();
        $qc->TENQC = $request->TENQC;
        $qc->NGAYTAO = $request->NGAYTAO;
        $qc->NGAYCHAY = $request->NGAYCHAY;
        $qc->DUONGDAN = $request->DUONGDAN;

        if($request->DUONGDAN == "Quảng cáo phòng")
            $qc->DUONGDAN = 'room';
        else{
            $qc->DUONGDAN = $request->DUONGDAN;
        }


        // Xử lý ảnh banner
        if ($request->hasFile('ANHQC')) {
            $image = $request->file('ANHQC');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('admin_assets/img_qc'), $imageName);
            $qc->ANHQC = $imageName;
        }
        $qc->save();

        return redirect()->route('admin.quangcao.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quangcao = QuangCao::find($id);
        return view('admin.quangcao.show',compact('quangcao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quangcao = QuangCao::find($id);
        return view('admin.quangcao.edit', compact('quangcao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quangcao = QuangCao::find($id);

        $quangcao->TENQC = $request->TENQC;
        $quangcao->NGAYTAO = $request->NGAYTAO;
        $quangcao->NGAYCHAY = $request->NGAYCHAY;
        $quangcao->NGAYGO = $request->NGAYGO;
        $quangcao->DUONGDAN = $request->DUONGDAN;

        if ($request->hasFile('ANHQC')) {
            $file = $request->file('ANHQC');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin_assets/img_qc'), $filename);
            $quangcao->ANHQC = $filename;
        }

        $quangcao->save();

        return redirect()->route('admin.quangcao.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qc = QuangCao::find($id);
        $qc->delete();
        return redirect()->route('admin.quangcao.index');
    }
}