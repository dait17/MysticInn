@extends('admin.layouts.DashboardLayout')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
          integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .filter-container {
            position: relative;
            border: 1px solid #333;
            border-radius: 15px;
            padding: 0px 20px;
            display: block;
            width: fit-content;
            box-sizing: border-box;
            margin: 20px auto;
        }

        .filter-header {
            position: absolute;
            top: -18px;
            left: 20px;
            background-color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: none;
        }

        .filter-content {
            margin-top: 25px;
        }

        input[type="date"] {
            width: 150px;
            padding: 8px 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        input[type="date"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(40%);
        }

        .tenphong {
            border-radius: 10px;
            border: 2px solid #ddd;
            line-height: 35px;
        }

        .tenphong input {
            margin: 0 10px;
            width: 95%;
            border: none;
        }

        .tenphong input:focus {
            outline: none;
        }

        .reset-button {
            position: absolute;
            bottom: -18px;
            right: 20px;
            background-color: #fff;
            padding: 5px 15px;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 1px;;
            color: #0194F3;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: none;
        }

        .reset-button:hover {
            color: rgb(2, 100, 200);;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-end {
            justify-content: flex-end;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .btn {
            padding: 5px 12px;
            font-size: 12px;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        /* Căn chỉnh độ rộng của select */
        .select-wrapper {
            display: flex;
            align-items: center;
        }

        .select-wrapper select {
            width: 150px; /* Bạn có thể thay đổi giá trị này tùy theo nhu cầu */
            padding: 0.375rem 0.3rem; /* Điều chỉnh padding cho select */
        }

        /* Điều chỉnh để text không bị xuống dòng */
        .select-wrapper label {
            white-space: nowrap; /* Chắc chắn label không bị xuống dòng */
            margin-right: 10px; /* Thêm khoảng cách giữa label và select */
            margin-top: 5px;;
        }

        .headerCTHD {
            text-align: center;
        }

        .modalct {
            max-width: 50%;
            margin: 30px auto;
        }

        .modalct .modal-content {
            font-size: 13px;
        }

        .chitietdv {
            width: 100%;
            text-align: center;
        }

        .chitietdv p {
            width: 20%;
        }
    </style>

    <div class="filter-container">
        <div class="filter-header">Bộ lọc</div>
        <div class="filter-content">
            <table>
                <tr>
                    <td>Từ ngày:</td>
                    <td></td>
                    <td>
                        <input type="date" id="startDate">
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Đến ngày:</td>
                    <td></td>
                    <td>
                        <input type="date" id="endDate">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-bottom: 4px;">Trạng thái:</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tthoadon" id="paidStatus" value="set">
                            <label class="form-check-label" for="paidStatus">
                                Đã thanh toán
                            </label>
                        </div>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tthoadon" id="unpaidStatus"
                                   value="unset">
                            <label class="form-check-label" for="unpaidStatus">
                                Chưa thanh toán
                            </label>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tên phòng:</td>
                    <td></td>
                    <td colspan="4">
                        <div class="tenphong">
                            <input size="20" type="text" id="roomName">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="reset-button" onclick="resetFilters()">Đặt lại</div>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-outline-dark mr-2" data-bs-toggle="modal"
                    data-bs-target="#addInvoiceModal">
                Thêm hóa đơn
            </button>
            <!-- Modal của nút thêm hóa đơn -->
            <!-- Modal thêm hóa đơn -->
            <div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addInvoiceModalLabel">Thêm Hóa Đơn</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.hoadon.create')}}">
                                <!-- Chọn phòng -->
                                <div class="mb-3">
                                    <label for="selectRoom" class="form-label">Chọn phòng</label>
                                    <select id="selectRoom" name="maPhong" class="form-select" aria-label="Chọn phòng">
                                        <option value="" selected>---Chọn phòng---</option>
                                        @foreach($phongs as $phong)
                                            <option value="{{$phong->phong->maPhong}}">Phòng {{$phong->phong->tenPhong}}</option>
                                        @endforeach
                                        <!-- Thêm các phòng khác -->
                                    </select>
                                </div>

                                <!-- Chọn năm (chỉ có năm hiện tại) -->
                                <div class="mb-3">
                                    <label for="selectYear" class="form-label">Chọn năm</label>
                                    <select id="selectYear" name="nam" class="form-select" aria-label="Chọn năm">
                                        <script>
                                            // Lấy năm hiện tại và tự động thêm vào <select>
                                            const currentYear = new Date().getFullYear();
                                            document.write(`<option value="${currentYear}">${currentYear}</option>`);
                                        </script>
                                    </select>
                                </div>

                                <!-- Chọn tháng -->
                                <div class="mb-3">
                                    <label for="selectMonth" class="form-label">Chọn tháng</label>
                                    <select id="selectMonth" name="thang" class="form-select" aria-label="Chọn tháng">
                                        <option value="" selected>---Chọn tháng---</option>
                                        <option value="1">Tháng 1</option>
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option>
                                        <option value="4">Tháng 4</option>
                                        <option value="5">Tháng 5</option>
                                        <option value="6">Tháng 6</option>
                                        <option value="7">Tháng 7</option>
                                        <option value="8">Tháng 8</option>
                                        <option value="9">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                    </select>
                                </div>


                                <!-- Ghi chú -->
                                <div class="mb-3">
                                    <label style="color: red; margin-top: 20px;" class="form-label">
                                        *Ghi chú: Vui lòng kiểm tra kỹ thông tin trước khi thêm hóa đơn.
                                    </label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng
                                    </button>
                                    <button type="submit" class="btn btn-primary">Thực Hiện</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

{{--            <a href="{{ route('admin.hoadon.inds') }}" type="button" class="btn btn-outline-dark  mr-2">In danh--}}
{{--                sách</a>--}}
        </div>

        <!-- Bảng dữ liệu -->
        <table class="table-index table table-hover">
            <thead>
            <tr style="background-color: lightgrey;">
                <th>Mã Hóa Đơn</th>
                <th>Tên Phòng</th>
                <th>Tháng</th>
                <th>Năm</th>
                <th>Trạng thái</th>
                <th>Tap</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hoaDons as $hd)
                <tr>
                    <td>{{ $hd->maHoaDon}}</td>
                    <td>{{ $hd->tenPhong}}</td>
                    <td>{{ $hd->thang}}</td>
                    <td>{{ $hd->nam}}</td>
                    <td>
                        @if ($hd->trangThai == 0)
                            Chưa thanh toán
                        @else
                            Đã thanh toán
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.hoadon.edit', $hd->maHoaDon)}}" class="px-2 mx-2">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{route('admin.hoadon.show', $hd->maHoaDon)}}" class="px-2 ml-2 mx-2">
                            <i
                                class="fa-solid fa-up-right-and-down-left-from-center"></i>
                        </a>
                        <i data-bs-toggle="modal" data-bs-target="#XoaHD" class="fa-solid fa-delete-left"></i></td>
                    <!-- Xem chi tiết hóa đơn -->
                    <div class="modal fade" id="XemChiTietHD_{{$hd->maHoaDon}}" tabindex="-1"
                         aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
                        <div class="modal-dialog modalct modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="font-size: 20px;" class="modal-title" id="addInvoiceModalLabel">Xem Hóa
                                        Đơn</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="invoiceForm">
                                        <div class="headerCTHD">
                                            <p class="form-label"><b>MYSTICINN</b></p>
                                            <p class="form-label">Địa chỉ: Phường Lộc Thọ, TP Nha Trang, Tỉnh
                                                Khánh
                                                Hòa</p>
                                            <p class="form-label">Điện thoại: 0377689328</p>
                                            <p class="form-label"><b>HÓA ĐƠN THANH TOÁN DỊCH VỤ</b></p>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; font-size: 14px">
                                            <p class="form-label">Tháng {{ $hd->thang}} năm {{ $hd->nam}}</p>
                                            <p class="form-label">Hóa đơn số: {{ $hd->maHoaDon}}</p>
                                        </div>
                                        <hr style="margin: 0; padding: 0; margin-bottom: 10px;">
                                        <div class="mb-3">
                                            <p class="form-label">Phòng : {{ $hd->tenPhong}}</p>
                                            <p class="form-label">Giá phòng: 200000</p>
                                            <p class="form-label">Trạng thái:
                                                @if ($hd->trangThai == 0)
                                                    Chưa thanh toán
                                                @else
                                                    Đã thanh toán
                                                @endif
                                            </p>
                                        </div>
                                        <hr style="margin: 0; padding: 0; margin-bottom: 10px;">
                                        <div class="mb-3">
                                            <p style="text-align:center;" class="form-label"><b>CHI TIẾT SỬ DỤNG
                                                    DỊCH
                                                    VỤ</b></p>
                                            <p><b>Dịch vụ bắt buộc</b></p>
                                            <div class="chitietdv"
                                                 style="display:flex; justify-content: space-between;">
                                                <p>Loại dịch vụ</p>
                                                <p>Chỉ số đầu</p>
                                                <p>Chỉ số cuối</p>
                                                <p>Đơn vị tính</p>
                                                <p>Giá tiền/đvt</p>
                                                <p>Thành tiền</p>
                                            </div>
                                            <p><b>Dịch vụ không bắt buộc</b></p>
                                            <div class="chitietdv"
                                                 style="display:flex; justify-content: space-between;">
                                                <p>Loại dịch vụ</p>
                                                <p>Ngày bắt đầu</p>
                                                <p>Ngày kết thúc</p>
                                                <p>Đơn vị tính</p>
                                                <p>Giá tiền/đvt</p>
                                                <p>Thành tiền</p>
                                            </div>
                                        </div>
                                        <hr style="margin: 0; padding: 0; margin-bottom: 10px;">
                                        <div class="chitietdv" style="display:flex; justify-content: space-between;">
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>Tổng cộng</p>
                                            <p>2tr</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Đóng
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- xóa hóa đơn -->
                    <div class="modal fade" id="XoaHD" tabindex="-1" aria-labelledby="delInvoiceModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="delInvoiceModalLabel">Xác nhận</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="mb-3" style="color: red;">
                                            Bạn chắc chắn muốn xóa hóa đơn "Thang {{$hd->thang}}/{{$hd->nam}}
                                            Phong {{$hd->hopdong->phong->tenPhong}}" ???
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('admin.hoadon.destroy', $hd->maHoaDon)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Thực Hiện</button>

                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function resetFilters() {
            // Reset các trường nhập liệu
            document.getElementById("startDate").value = "";
            document.getElementById("endDate").value = "";

            // Reset radio button selection
            const radios = document.querySelectorAll('input[name="tthoadon"]');
            radios.forEach(radio => radio.checked = false);

            // Reset room name field
            document.getElementById("roomName").value = "";

            let url = 'hoadon?';
            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(response => response.text())
                .then(html => {
                    // Cập nhật bảng với dữ liệu mới
                    const tbody = document.querySelector('.table-index tbody');
                    tbody.innerHTML = ''; // Xóa nội dung cũ
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    const newRows = tempDiv.querySelectorAll('.table-index tbody tr');
                    newRows.forEach(row => tbody.appendChild(row));
                })
                .catch(error => console.error('Error:', error));
        }


        function tickThang() {
            var selectedMonth = document.querySelector('.form-select').value;
            var monthText = '';
            const currentYear = new Date().getFullYear();
            console.log(currentYear);

            switch (selectedMonth) {
                case '1':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 1 năm ' + currentYear;
                    break;
                case '2':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 2 năm ' + currentYear;
                    break;
                case '3':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 3 năm ' + currentYear;
                    break;
                case '4':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 4 năm ' + currentYear;
                    break;
                case '5':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 5 năm ' + currentYear;
                    break;
                case '6':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 6 năm ' + currentYear;
                    break;
                case '7':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 7 năm ' + currentYear;
                    break;
                case '8':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 8 năm ' + currentYear;
                    break;
                case '9':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 9 năm ' + currentYear;
                    break;
                case '10':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 10 năm ' + currentYear;
                    break;
                case '11':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 11 năm ' + currentYear;
                    break;
                case '12':
                    monthText = 'Hóa đơn sẽ được tạo cho tháng 12 năm ' + currentYear;
                    break;
                default:
                    monthText = ' ';
                    break;
            }

            // Cập nhật giá trị vào <span> trong <label>
            document.getElementById('Mondth').textContent = monthText;
        }

        const searchDateBD = document.getElementById('startDate');
        const searchDateKT = document.getElementById('endDate');
        const statusRadios = document.querySelectorAll('input[name="tthoadon"]');
        const roomNameInput = document.getElementById('roomName');

        // Hàm gửi dữ liệu
        function sendData() {
            // Lấy các giá trị từ các input
            const startDate = searchDateBD.value;
            const endDate = searchDateKT.value;
            const selectedStatus = document.querySelector('input[name="tthoadon"]:checked') ? document.querySelector('input[name="tthoadon"]:checked').value : '';
            const roomName = roomNameInput.value;

            // Xây dựng URL với các tham số
            let url = 'hoadon?';

            if (startDate) {
                url += 'startDate=' + startDate + '&';
            }
            if (endDate) {
                url += 'endDate=' + endDate + '&';
            }
            if (selectedStatus) {
                url += 'status=' + selectedStatus + '&';
            }
            if (roomName) {
                url += 'roomName=' + encodeURIComponent(roomName);
            }

            // Gửi dữ liệu qua fetch
            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(response => response.text())
                .then(html => {
                    // Cập nhật bảng với dữ liệu mới
                    const tbody = document.querySelector('.table-index tbody');
                    tbody.innerHTML = ''; // Xóa nội dung cũ
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    const newRows = tempDiv.querySelectorAll('.table-index tbody tr');
                    newRows.forEach(row => tbody.appendChild(row));
                })
                .catch(error => console.error('Error:', error));
        }

        searchDateBD.addEventListener('input', sendData);
        searchDateKT.addEventListener('input', sendData);
        statusRadios.forEach(radio => {
            radio.addEventListener('change', sendData);
        });
        roomNameInput.addEventListener('input', sendData);

    </script>

    {{--Lay du lieu thang cho tao hoa don--}}
    <script>
        document.getElementById('selectRoom').addEventListener('change', function () {
            const roomId = this.value; // Lấy ID của phòng được chọn
            const selectMonth = document.getElementById('selectMonth'); // Thẻ select tháng

            // Xóa các option hiện tại trong selectMonth (trừ option đầu tiên)
            selectMonth.innerHTML = '<option value="" selected>---Chọn tháng---</option>';

            // Nếu người dùng không chọn phòng, dừng lại
            if (!roomId) return;

            // Gửi AJAX request đến server
            fetch(`/admin/hoadon/laythangchuatao/${roomId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const months = data.months; // Danh sách tháng trả về
                        months.forEach(month => {
                            const option = document.createElement('option');
                            option.value = month;
                            option.textContent = `Tháng ${month}`;
                            selectMonth.appendChild(option); // Thêm option vào selectMonth
                        });
                    } else {
                        alert('Không thể lấy danh sách tháng. Vui lòng thử lại sau.');
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                });
        });
    </script>

@endsection
