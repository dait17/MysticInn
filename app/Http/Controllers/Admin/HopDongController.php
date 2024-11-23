<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangKyDV;
use App\Models\DichVu;
use App\Models\HD_KT;
use App\Models\HD_NT;
use App\Models\HopDong;
use App\Models\KhachThue;
use App\Models\NoiThat;
use App\Models\Phong;
use App\Models\Phong_NT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpWord\PhpWord;

class HopDongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy dữ liệu lọc từ view (request)
        $filData = $request->only(['i_maHopDong', 'i_tenPhong', 'i_ngayKy', 'i_giaThue']);

        // Xây dựng truy vấn Eloquent
        $query = HopDong::with(['phong', 'khachThue']); // Eager load các mối quan hệ nếu cần

        // Lọc theo mã hợp đồng (nếu có)
        if (!empty($filData['i_maHopDong'])) {
            $query->where('maHopDong', $filData['i_maHopDong']);
        }

        // Lọc theo tên phòng (nếu có)
        if (!empty($filData['i_tenPhong'])) {
            $query->whereHas('phong', function ($query) use ($filData) {
                $query->where('tenPhong', 'like', '%' . $filData['i_tenPhong'] . '%');
            });
        }

        // Lọc theo ngày ký (nếu có)
        if (!empty($filData['i_ngayKy'])) {
            $query->whereDate('ngayKy', '=', $filData['i_ngayKy']);
        }

        // Lọc theo ngày hết hạn (nếu có)
        if (!empty($filData['i_giaThue'])) {
            $query->where('giaThue', '=', $filData['i_giaThue']);
        }

        $hopdongs = $query->paginate(2);
        return view('admin.HopDong.index', compact('hopdongs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phongs = Phong::where('trangThai', 0)->get();
        $khachThues = KhachThue::all();
        $dichvus = DichVu::all();
        $noithats = Phong_NT::all();
        return view('admin.HopDong.create', compact('phongs', 'khachThues', 'dichvus', 'noithats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allData = $request->all();
        $username = $this->generateUserName($allData['maPhong']);
        $userId = $this->storeUser($username, '123', $allData['email']);
        $maHopDong = $this->storeHopDong($allData, $userId);
//        $this->storeHD_KT($maHopDong, $allData['maKT']);
        $this->storeDKDV($maHopDong, $allData['chonDV']);
        return $this->createNoiThats($maHopDong, $allData['maPhong']);
    }

    public function createNoiThats($maHopDong, $maPhong)
    {
        $noithats = Phong_NT::all();
        $tenphong = Phong::find($maPhong)->tenPhong;
        return view('admin.HopDong.createNoiThat', compact('noithats', 'maHopDong', 'tenphong'));
    }

    public function storeNoiThat(Request $request)
    {
        $allData = $request->all();
        $maHopDong = $allData['maHopDong'];
        $noiThats = $allData['noithat'];
        foreach ($noiThats as $maNT => $values) {
            $data = [
                'maHopDong' => $maHopDong,
                'maNT' => $maNT,
                'trangThai' => $values['trangThai'],
                'giaNT' => NoiThat::find($maNT)->giaNT,
            ];
            HD_NT::create($data);
        }
        return redirect()->route('admin.hopdong.show', $maHopDong);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hopdong = HopDong::find((int)$id);
        $hd_kts = HD_KT::where('maHopDong', $id)->whereNull('ngayRoiDi')->get();
        $dkdvs = DangKyDV::where('maHopDong', $id)->whereNull('ngayHuy')->get();
        $hd_nts = HD_NT::where('maHopDong', $id)->get();

        return view('admin.HopDong.details', compact('hopdong', 'hd_kts', 'dkdvs', 'hd_nts'));
    }

    public function traPhong(string $maHopDong)
    {
        $hopdong = HopDong::find($maHopDong);
        $hopdong->ngayKetThuc = Date::now();
        $hopdong->save();
        return redirect()->route('admin.hopdong.show', $maHopDong);
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
        $hopdong = HopDong::find((int)$id);
        if ($hopdong) {
            // cap nhat lai trang thai cho phong
            $phong = Phong::find($hopdong->maPhong);
            $phong->trangThai = 0;
            $phong->save();

            // Xoa tai khoan, cac ban ghi khac tu dong xoa
            $user = User::where('id', $hopdong->userId)->first();
            $user->delete();
        }

        return redirect()->route('admin.hopdong.index');
    }

    public function layGiaPhong(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'maPhong' => 'required|exists:phong,maPhong' // Kiểm tra mã phòng tồn tại
        ]);

        // Lấy thông tin giá phòng
        $phong = Phong::find($request->maPhong);

        // Trả về JSON chứa giá phòng
        return response()->json([
            'success' => true,
            'giaPhong' => number_format((int)$phong->giaPhong, '0', '.', ','),
        ]);
    }

    private function generateUserName($maPhong)
    {
        $tenPhong = Phong::find($maPhong)->tenPhong;
        $maxUsername = User::where('userType', 2)->max('username');
        if (!$maxUsername) {
            return 'phong' . $tenPhong . '00001';
        }
        $num = filter_var($maxUsername, FILTER_SANITIZE_NUMBER_INT);

        $num = (int)$num + 1;
        return 'phong' . $tenPhong . $num;
    }

    private function storeUser($username, $password, $email)
    {
        $data = [
            'userType' => 2,
            'username' => $username,
            'password' => Hash::make($password),
            'email' => $email
        ];
        $user = User::create($data);
        return $user->id;
    }

    private function storeHopDong($allData, $userId)
    {
        $data = [
            'maPhong' => $allData['maPhong'],
            'maKT' => $allData['maKT'],
            'userId' => $userId,
            'ngayKy' => $allData['ngayKy'],
            'ngayHH' => $allData['ngayHH'],
            'giaThue' => $allData['giaThue'],
            'tienCoc' => $allData['tienCoc']
        ];
        $hopdong = HopDong::create($data);

        $phong = Phong::find($data['maPhong']);
        $phong->trangThai = 1;
        $phong->save();

        return $hopdong->maHopDong;
    }

    private function storeHD_KT($maHopDong, $maKT)
    {
        $data = [
            'maHopDong' => $maHopDong,
            'maKT' => $maKT,
            'ngayVao' => Date::now(),
            'ngayRoiDi' => null
        ];
        HD_KT::create($data);
    }

    public function storeDKDV($maHopDong, $dvs)
    {
        foreach ($dvs as $dv) {
            $data = [
                'maHopDong' => $maHopDong,
                'maDV' => $dv,
                'ngayDK' => Date::now(),
            ];
            DangKyDV::create($data);
        }
    }

    public function xacThucKT($maKT)
    {
        $kt = KhachThue::find($maKT);
        $kt->daXacThuc = 1;
        $kt->save();
//        dd($kt);
        return redirect()->back();
    }

    public function exportToWord($maHopDong)
    {
        // Lấy dữ liệu hợp đồng từ cơ sở dữ liệu
        $hopDong = HopDong::with(['phong', 'khachthue'])->where('maHopDong', $maHopDong)->first();

        if (!$hopDong) {
            return back()->with('error', 'Hợp đồng không tồn tại.');
        }

        // Khởi tạo đối tượng PhpWord
        $phpWord = new PhpWord();

        // Thêm một section vào file Word
        $section = $phpWord->addSection();

        // Thêm tiêu đề
        $section->addTitle("Thông Tin Hợp Đồng", 1);

        // Thêm thông tin hợp đồng vào file
        $section->addText("Mã Hợp Đồng: " . $hopDong->maHopDong);
        $section->addText("Mã Khách Thuê: " . $hopDong->maKT);
        $section->addText("Tên Khách Thuê: " . $hopDong->khachThue->tenKT);
        $section->addText("Mã Phòng: " . $hopDong->maPhong);
        $section->addText("Tên Phòng: " . $hopDong->phong->tenPhong);
        $section->addText("Ngày Ký Hợp Đồng: " . $hopDong->ngayKy);
        $section->addText("Ngày Hết Hạn: " . ($hopDong->ngayHetHan??'Không thời hạn'));

        // Đặt tên file và lưu file
        $fileName = 'hop_dong_' . $hopDong->maHopDong . '.docx';
        $filePath = storage_path('app/public/' . $fileName);

        // Lưu file Word
        $phpWord->save($filePath, 'Word2007');

        // Trả file về cho người dùng
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
