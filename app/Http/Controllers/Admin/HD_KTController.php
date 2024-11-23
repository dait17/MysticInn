<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HD_KT;
use App\Models\HopDong;
use App\Models\KhachThue;
use Illuminate\Http\Request;

class HD_KTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $maHopDong)
    {
        $hopdong = HopDong::find($maHopDong);
        $hd_kts = HD_KT::where('maHopDong', $maHopDong)->get();
        $khachthues = KhachThue::all();
        $maKT = $hopdong->maKT;
        $khachthues = $khachthues->reject(function ($item) use ($maKT) {
            return $item->maKT === $maKT;
        });
        return view('admin.hd_kt.index', compact('hopdong', 'hd_kts', 'khachthues'));
    }

    public function changeDD(Request $request)
    {
        dd($request->all());
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
        $maHopDong = $request->input('maHopDong');
        $data = [
            'maHopDong' => $maHopDong,
            'maKT' => $request->input("user"),
            'ngayVao' => $request->input("ngayVao"),

        ];
        HD_KT::create($data);
        return redirect()->back();
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
    public function edit(string $maHopDong, string $maKT)
    {
        $hd_kt = HD_KT::where('maHopDong', $maHopDong)->where('maKT', $maKT)->first();

        return view('admin.HD_KT.edit', compact('hd_kt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $hd_kt = HD_KT::where('maHopDong', $data['maHopDong'])->where('maKT', $data['maKT'])->first();
        if ($hd_kt) {
            $hd_kt->ngayVao = $data['ngayVao'];
            $hd_kt->ngayRoiDi = $data['ngayRoiDi'];
            $hd_kt->save();
        }

        return redirect()->route('admin.hd_kt.index', $data['maHopDong']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $maHopDong, string $maKT)
    {
        HD_KT::where('maHopDong', $maHopDong)
                        ->where('maKT', $maKT)->delete();

        return redirect()->back();
    }
}
