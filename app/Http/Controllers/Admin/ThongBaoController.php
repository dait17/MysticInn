<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ThongBaoController extends Controller
{
    public static function guiThongBao($tieuDe,$noiDung,$userId, $duongDan=null)
    {
        $data = [
            'tieuDe' => $tieuDe,
            'noiDung' => $noiDung,
            'ngayTao' => Date::now(),
            'userId' => $userId,
            'duongDan' => $duongDan
        ];
        $thongbao = ThongBao::create($data);
    }
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
        //
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
