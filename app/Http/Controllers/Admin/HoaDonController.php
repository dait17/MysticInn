<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\HopDong;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    $status = $request->input('status');
    $roomName = $request->input('roomName');

    $query = HoaDon::query()
    ->join('hopdong', 'hoadon.maHopDong', '=', 'hopdong.maHopDong')
    ->join('phong', 'hopdong.maPhong', '=', 'phong.maPhong')
    ->select(
        'hoadon.*', 
        'phong.tenPhong', 
        'phong.trangThai as phongTrangThai'
    );


    // Kiểm tra startDate và endDate
    if ($startDate && !$endDate) {
        $startYear = date('Y', strtotime($startDate));
        $startMonth = date('m', strtotime($startDate));

        // Lọc theo năm và tháng
        $query->where(function ($q) use ($startYear, $startMonth) {
            $q->where('nam', '>', $startYear)
              ->orWhere(function ($q2) use ($startYear, $startMonth) {
                  $q2->where('nam', $startYear)
                      ->where('thang', '>=', $startMonth);
              });
        });
    }
    elseif (!$startDate && $endDate) {
        // Lọc theo endDate
        $endYear = date('Y', strtotime($endDate));
        $endMonth = date('m', strtotime($endDate));

        $query->where(function ($q) use ($endYear, $endMonth) {
            $q->where('nam', '<', $endYear)
              ->orWhere(function ($q2) use ($endYear, $endMonth) {
                  $q2->where('nam', $endYear)
                      ->where('thang', '<=', $endMonth);
              });
        });
    }
    elseif ($startDate && $endDate) {
        // Lọc theo cả startDate và endDate
        $startYear = date('Y', strtotime($startDate));
        $startMonth = date('m', strtotime($startDate));
        $endYear = date('Y', strtotime($endDate));
        $endMonth = date('m', strtotime($endDate));

        $query->where(function ($q) use ($startYear, $startMonth, $endYear, $endMonth) {
            $q->where(function ($q1) use ($startYear, $startMonth) {
                $q1->where('nam', '>', $startYear)
                   ->orWhere(function ($q2) use ($startYear, $startMonth) {
                       $q2->where('nam', $startYear)
                           ->where('thang', '>=', $startMonth);
                   });
            })
            ->where(function ($q3) use ($endYear, $endMonth) {
                $q3->where('nam', '<', $endYear)
                   ->orWhere(function ($q4) use ($endYear, $endMonth) {
                       $q4->where('nam', $endYear)
                           ->where('thang', '<=', $endMonth);
                   });
            });
        });
    }

    if ($status) {
        if ($status == "set") {
            $query->where('hoadon.trangThai', 1);
        } elseif ($status == "unset") {
            $query->where('hoadon.trangThai', 0);
        }
    }
    

    if ($roomName) {
        $query->where('phong.tenPhong', 'like', '%' . $roomName . '%');
    }

    // Thực hiện truy vấn và lấy kết quả
    $hoaDons = $query->get();

    return view('admin.HoaDon.index', compact('hoaDons'));
}



    public function inds()
    {
        $hoaDons = HoaDon::all();
        return view('admin.HoaDon.inds', compact('hoaDons'));
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
