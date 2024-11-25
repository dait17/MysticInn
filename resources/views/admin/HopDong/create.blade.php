@extends('admin.layouts.DashboardLayout')

@section('content')

    <style>
        small {
            margin: 12px 0;
        }
    </style>
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4 pb-4 mb-2">
        <h4 class="mb-4 text-center">Thêm Hợp Đồng</h4>
        <div class="py-4 mb-4">
            <button type="button" class="btn btn-dark"
                    onclick="window.location.href='{{route('admin.hopdong.index')}}'">
                <i class="bi bi-arrow-left"></i>
                Quay lại
            </button>
        </div>
        <form action="{{ route('admin.hopdong.store') }}" method="post" name="taoHopDong" id="taoHopDong">
            @csrf
            <div class="row g-4 mb-4">
                <!-- Phòng chọn -->
                <div class="col-sm-12 col-xl-4">
                    <div class="form-floating">
                        <select class="form-select" name="maPhong" id="maPhong" aria-label="Chọn phòng">
                            <option value="-1" selected>Chọn phòng</option>
                            @foreach($phongs as $phong)
                                <option value="{{$phong->maPhong}}">{{$phong->tenPhong}}</option>

                            @endforeach

                        </select>
                        <small class="error-message text-danger" style="display: none;">* Vui lòng chọn phòng</small>
                        <label for="maPhong"> Chọn phòng <span>*</span></label>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="giaThue" id="giaThue"
                               aria-describedby="giaThue" readonly>
                        <label for="giaThue">Giá Thuê</label>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="tienCoc" id="tienCoc"
                               aria-describedby="tienCoc" placeholder="1000000">
                        <small class="error-message text-danger" style="display: none;">* Vui lòng nhập tiền cọc</small>
                        <label for="tienCoc">Tiền Cọc <span>*</span></label>
                    </div>
                </div>


            </div>

            <!-- Ngày ký và ngày hết hạn -->
            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="ngayKy" id="ngayKy"
                               aria-describedby="ngayKy">
                        <small class="error-message text-danger" style="display: none;">* Vui lòng nhập ngày ký</small>
                        <label for="ngayKy">Ngày Ký <span>*</span></label>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="ngayHetHan" id="ngayHH"
                               aria-describedby="ngayHH">
                        <small class="error-message text-danger" style="display: none;"></small>
                        <label for="ngayHH">Ngày Hết Hạn <span>*</span></label>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-sm-8 col-xl-8">
                    <div class="form-floating">
                        <select class="form-select" name="maKT" id="maKT"
                                aria-label="Chọn khách thuê">
                            <option value="-1" selected>Chọn khách thuê</option>
                            @foreach($khachThues as $kt)
                                <option
                                    value="{{$kt->maKT}}" {{($maKT&&$maKT==$kt->maKT?'selected':'')}}>{{$kt->hoKT . ' ' . $kt->tenKT . ' - '. $kt->SDT}} </option>
                            @endforeach
                        </select>
                        <small class="error-message text-danger" style="display: none;">* Vui lòng chọn khách
                            thuê</small>
                        <label for="maKT">Khách thuê <span>*</span></label>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-4 d-flex align-items-center">
                    <button title="Thêm Khách Mới" type="button"
                            class="btn btn-lg btn-lg-square btn-primary m-2"
                            onclick="window.location.href='{{route('admin.khachthue.create')}}'">
                        <i class="fa fa-user-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row g-2 mt-3">
                <div class="col-sm-12 col-xl-8">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="Email khách" aria-label="Email khách">
                        <small class="error-message text-danger" style="display: none;"></small>
                        <label for="email">Email Khách <span>*</span></label>
                    </div>
                </div>
            </div>

            <div class="pt-4 mt-4">
                <h5 class="mb-0">Dang ky dich vu</h5>
            </div>
            <div class="m-4">
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                        <tr class="text-dark">
                            <th scope="col">Ten dich vu</th>
                            <th scope="col">Gia</th>
                            <th scope="col">Dang Ky</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dichvus as $dv)
                            <tr>
                                <td>{{$dv->tenDV}}</td>
                                <td>{{ number_format($dv->giaDV, 0, ',', '.') . ' / ' .$dv->donViTinh}}</td>
                                <td>
                                    <input class="form-check-input" type="checkbox"
                                           {{$dv->batBuoc?'checked disabled':''}} name="chonDV[]"
                                           value="{{$dv->maDV}}">
                                    @if($dv->batBuoc)
                                        <input type="hidden" name="chonDV[]" value="{{$dv->maDV}}">
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Nút thực hiện -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">Thực Hiện</button>
            </div>
        </form>
    </div>

    <script>
        function letFormatMoney(e) {
            // Loại bỏ dấu phân cách cũ và ký tự không phải số
            let value = e.target.value.replace(/,/g, '').replace(/\D/g, '');

            // Thêm lại dấu phân cách hàng nghìn
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // Gán lại giá trị vào ô input
            e.target.value = value;
        }

        function formatMoney(fieldName) {
            document.getElementById(fieldName).addEventListener("input", letFormatMoney);

        }

        function deFormatMoney(fieldId) {
            // Lấy input "Tiền Cọc"
            const target = document.getElementById(fieldId);

            target.removeEventListener("input", letFormatMoney);

            // Loại bỏ dấu phẩy khỏi giá trị
            target.value = target.value.replace(/,/g, '');
        }

        formatMoney('tienCoc');
        formatMoney('giaPhong');


    </script>

    {{--      Xac thuc du lieu  --}}
    <script>
        document.getElementById("taoHopDong").addEventListener("submit", function (e) {
            e.preventDefault(); // Ngăn chặn hành vi gửi form mặc định

            let isValid = true;

            // Kiểm tra chọn phòng
            const maPhong = document.getElementById("maPhong");
            const maPhongError = maPhong.nextElementSibling;
            if (maPhong.value === "-1") {
                maPhongError.style.display = "block";
                maPhong.focus();
                isValid = false;
            } else {
                maPhongError.style.display = "none";
            }

            // Kiểm tra tiền cọc
            const tienCoc = document.getElementById("tienCoc");
            const tienCocError = tienCoc.nextElementSibling;
            if (tienCoc.value.trim() === "") {
                tienCocError.style.display = "block";
                tienCoc.focus();
                isValid = false;
            } else {
                tienCocError.style.display = "none";
            }

            // Kiểm tra khách thuê
            const maKT = document.getElementById("maKT");
            const maKTError = maKT.nextElementSibling;
            if (maKT.value === "-1") {
                maKTError.style.display = "block";
                maKT.focus();
                isValid = false;
            } else {
                maKTError.style.display = "none";
            }

            // Kiểm tra ngay ky
            const ngayKy = document.getElementById("ngayKy");
            const ngayKyError = ngayKy.nextElementSibling;
            if (!ngayKy.value) {
                ngayKyError.style.display = "block";
                ngayKy.focus();
                isValid = false;
            } else {
                ngayKyError.style.display = "none";
            }

            // Kiểm tra ngay ky
            const ngayHH = document.getElementById("ngayHH");
            const ngayHHError = ngayHH.nextElementSibling;
            if (new Date(ngayHH.value) < new Date(ngayKy.value)) {
                ngayHHError.textContent = 'Ngay HH Khong duoc be hon ngay ky';
                ngayHHError.style.display = "block";
                ngayHH.focus();
                isValid = false;
            } else {
                ngayHHError.style.display = "none";
            }

            // Kiểm tra email
            const email = document.getElementById("email");
            const emailError = email.nextElementSibling;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Biểu thức regex kiểm tra email

            if (email.value.trim() === "") {
                emailError.textContent = "* Vui lòng nhập email"; // Thông báo khi bỏ trống
                emailError.style.display = "block";
                email.focus();
                isValid = false;
            } else if (!emailRegex.test(email.value.trim())) {
                emailError.textContent = "* Vui lòng nhập email hợp lệ"; // Thông báo khi email không hợp lệ
                emailError.style.display = "none";
                email.focus();
                isValid = false;
            } else {
                emailError.style.display = "none"; // Email hợp lệ, ẩn lỗi
            }


            // Nếu tất cả hợp lệ thì submit form
            if (isValid) {
                deFormatMoney('tienCoc');
                deFormatMoney('giaThue');
                this.submit();
            } else {
                formatMoney('tienCoc');
                formatMoney('giaThue');
            }
        });
    </script>

    <script>
        const ngayKy = document.getElementById("ngayKy");
        const now = new Date();

        // Chuyển ngày hiện tại sang định dạng YYYY-MM-DD (chỉ cần ngày, không có giờ)
        const formattedDate = now.toISOString().slice(0, 10); // Chỉ lấy phần YYYY-MM-DD

        // Gán giá trị mặc định cho input type="date"
        ngayKy.value = formattedDate;
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        //AJAX Lay Gia Phong
        $(document).ready(function () {
            // Lắng nghe sự kiện thay đổi của select
            $('#maPhong').change(function () {
                let maPhong = $(this).val();

                // Kiểm tra mã phòng có hợp lệ không
                if (maPhong === '-1') {
                    $('#giaThue').val('');
                    return;
                }

                // Gửi AJAX đến server
                $.ajax({
                    url: '{{ route('admin.hopdong.laygiaphong') }}', // Route đến hàm xử lý
                    type: 'POST',
                    data: {
                        maPhong: maPhong,
                        _token: '{{ csrf_token() }}' // Token để bảo vệ form
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#giaThue').val(response.giaPhong); // Hiển thị giá phòng
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON.message); // In lỗi nếu có
                    }
                });
            });
        });
    </script>

@endsection
