<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangKyDV;
use App\Models\HoaDon;
use App\Models\HopDong;
use App\Models\Phong;
use App\Models\SDDichVu;
use App\Models\ThanhToan_DV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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
        } elseif (!$startDate && $endDate) {
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
        } elseif ($startDate && $endDate) {
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
        $phongs = Phong::where('trangThai', 1)->get();

        return view('admin.HoaDon.index', compact('hoaDons', 'phongs'));
    }


    public function inds()
    {
        $hoaDons = HoaDon::all();
        return view('admin.HoaDon.inds', compact('hoaDons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'thang' => 'required',
            'nam' => 'required',
            'maPhong' => 'required',
        ]);
        $data = $request->all();
        $nam = $data['nam'];
        $thang = $data['thang'];
        $maPhong = $data['maPhong'];
        $hopdong = HopDong::where('maPhong', $maPhong)->whereNull('ngayKetThuc')->first();
        $dkdvs = DangKyDV::where('maHopDong', $hopdong->maHopDong)->whereNull('ngayHuy')->get();
        return view('admin.HoaDon.create', compact('nam', 'thang', 'hopdong', 'dkdvs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sddv_sd.*.giaTri' => 'required|integer|min:0', // Validate số đầu
            'sddv_sc.*.giaTri' => 'required|integer|min:0', // Validate số cuối
            'sddv_ssd.*.giaTri' => 'nullable|integer|min:0', // Validate số sử dụng
        ], [
            'sddv_sd.*.giaTri.required' => 'Vui lòng nhập số đầu.',
            'sddv_sd.*.giaTri.integer' => 'Số đầu phải là số nguyên.',
            'sddv_sd.*.giaTri.min' => 'Số đầu phải lớn hơn hoặc bằng 0.',
            'sddv_sc.*.giaTri.required' => 'Vui lòng nhập số cuối.',
            'sddv_sc.*.giaTri.integer' => 'Số cuối phải là số nguyên.',
            'sddv_sc.*.giaTri.min' => 'Số cuối phải lớn hơn hoặc bằng 0.',
            'sddv_ssd.*.giaTri.integer' => 'Số sử dụng phải là số nguyên.',
            'sddv_ssd.*.giaTri.min' => 'Số sử dụng phải lớn hơn hoặc bằng 0.',
        ]);

        $data_hoadon = $request->only(['maHopDong', 'nam', 'thang']);
        $hoadon = HoaDon::create($data_hoadon);
        $dvs = DangKyDV::where('maHopDong', $data_hoadon['maHopDong'])->whereNull('ngayHuy')->get();
        $sddv_sd = $request->input('sddv_sd');
        $sddv_sc = $request->input('sddv_sc');
        $sddv_ssd = $request->input('sddv_ssd');
        $all = [];
        foreach ($dvs as $dk) {
            $soSD = 1;
            if (!$dk->dichvu->dvThang) {
                $soSD = $sddv_ssd[$dk->maDKDV]['giaTri'];
                $sd_data = [
                    'maDKDV' => $dk->maDKDV,
                    'maHoaDon' => $hoadon->maHoaDon,
                    'soDau' => $sddv_sd[$dk->maDKDV]['giaTri'],
                    'soCuoi' => $sddv_sc[$dk->maDKDV]['giaTri'],
                    'ngayDau' => Date::now(),
                    'ngayCuoi' => Date::now(),
                ];
                $all[] = $sd_data;
                SDDichVu::create($sd_data);

            }
            $tt_data = [
                'maHoaDon' => $hoadon->maHoaDon,
                'maDKDV' => $dk->maDKDV,
                'soSuDung' => $soSD,
                'donGia' => $dk->dichvu->giaDV
            ];
            ThanhToan_DV::create($tt_data);

        }
        return redirect()->route('admin.hoadon.index');
    }

    public function layThangCT_HoaDon($maPhong)
    {
        try {
            $hopdong = HopDong::where('maPhong', $maPhong)->whereNull('ngayKetThuc')->first();
            // Danh sách tất cả các tháng (1-12)
            $tongThang = range(1, 12);

            // Lấy danh sách các tháng đã có hóa đơn
            $thangDaTao = DB::table('hoadon')
                ->where('nam', date('Y'))
                ->where('maHopDong', $hopdong->maHopDong)
                ->pluck('thang') // Lấy cột "thang"
                ->toArray();

            // Tìm các tháng chưa có hóa đơn
            $thangChuaTao = array_diff($tongThang, $thangDaTao);
            // Trả về JSON response
            return response()->json([
                'success' => true,
                'months' => array_values($thangChuaTao),
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hoadon = HoaDon::find($id);
        $thanhtoan_dvs = ThanhToan_DV::where('maHoaDon', $id)->get();
        $sudungs = $this->laySDDichVuToArray($id);
//        dd($sudungs);
        return view('admin.hoadon.details', compact('hoadon', 'thanhtoan_dvs', 'sudungs'));
    }

    private function laySDDichVuToArray($maHoaDon)
    {
        $sudungs = SDDichVu::where('maHoaDon', $maHoaDon)->get()->toArray();
        $data = [];
        foreach ($sudungs as $sudung) {
            $data[$sudung['maDKDV']] = [
                'soDau' => $sudung['soDau'],
                'soCuoi' => $sudung['soCuoi']
            ];
        }
        return $data;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hoadon = HoaDon::find($id);
        $thanhtoan_dvs = ThanhToan_DV::where('maHoaDon', $id)->get();
        $sudungs = $this->laySDDichVuToArray($id);
        return view('admin.hoadon.edit', compact('hoadon', 'thanhtoan_dvs', 'sudungs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sddv_sd.*.giaTri' => 'required|integer|min:0', // Validate số đầu
            'sddv_sc.*.giaTri' => 'required|integer|min:0', // Validate số cuối
            'sddv_ssd.*.giaTri' => 'nullable|integer|min:0', // Validate số sử dụng
        ], [
            'sddv_sd.*.giaTri.required' => 'Vui lòng nhập số đầu.',
            'sddv_sd.*.giaTri.integer' => 'Số đầu phải là số nguyên.',
            'sddv_sd.*.giaTri.min' => 'Số đầu phải lớn hơn hoặc bằng 0.',
            'sddv_sc.*.giaTri.required' => 'Vui lòng nhập số cuối.',
            'sddv_sc.*.giaTri.integer' => 'Số cuối phải là số nguyên.',
            'sddv_sc.*.giaTri.min' => 'Số cuối phải lớn hơn hoặc bằng 0.',
            'sddv_ssd.*.giaTri.integer' => 'Số sử dụng phải là số nguyên.',
            'sddv_ssd.*.giaTri.min' => 'Số sử dụng phải lớn hơn hoặc bằng 0.',
        ]);
        $hoadon = HoaDon::find($id);
        $sddv_sd = $request->input('sddv_sd');
        $sddv_sc = $request->input('sddv_sc');
        $sddv_ssd = $request->input('sddv_ssd');
        $thanhtoans = ThanhToan_DV::where('maHoaDon', $hoadon->maHoaDon)->get();
        $sdd_arr = [];
        foreach ($thanhtoans as $tt) {
            if (!$tt->dangkydv->dichvu->dvThang) {
                $soSD = $sddv_ssd[$tt->maDKDV]['giaTri'];
                $sddv = SDDichVu::where('maHoaDon', $hoadon->maHoaDon)->where('maDKDV', $tt->maDKDV)->first();
                $sddv->soDau = $sddv_sd[$tt->maDKDV]['giaTri'];
                $sddv->soCuoi =$sddv_sc[$tt->maDKDV]['giaTri'];
                $sddv->save();
                $sdd_arr[] = $tt;


                $tt->soSuDung = $soSD;
                $tt->save();
            }

        }
        dd($sddv_ssd);
//        dd($request->all());
        return redirect()->route('admin.hoadon.show', $hoadon->maHoaDon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        return redirect()->route('admin.hoadon.index');
    }
}
