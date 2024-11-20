@extends('admin.layouts.DashboardLayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            font-family: 'Montserrat';
        }
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
        .tenphong{
            border-radius: 10px;
            border: 2px solid #ddd;
            line-height: 35px;
        }
        .tenphong input{
            margin: 0 10px;
            width: 95%;
            border: none;
        }
        .tenphong input:focus{
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
        .headerCTHD{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="filter-container">
    <div class="filter-header">Bộ lọc</div>
    <div class="filter-content">
        <table>
            <tr>
                <td>Từ ngày: </td>
                <td></td>
                <td> 
                    <input type="date">
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Đến ngày: </td>
                <td></td>
                <td>
                    <input type="date">
                </td>
            </tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr>
                <td style="padding-bottom: 4px;">Trạng thái: </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tthoadon" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Đã thanh toán
                        </label>
                    </div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="tthoadon" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chưa thanh toán
                        </label>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr>
                <td>Tên phòng:</td>
                <td></td>
                <td colspan="4">
                    <div class="tenphong">
                        <input size="20" type="text">
                    </div>
                </td>
            </tr>
            <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        </table>
    </div>
    <div class="reset-button">Đặt lại</div>
</div>
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-outline-dark mr-2" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">
            Thêm hóa đơn
        </button>
        <!-- Modal của nút thêm hóa đơn -->
        <div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInvoiceModalLabel">Thêm Hóa Đơn</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <div class="select-wrapper">
                                    <label for="invoiceNumber" class="form-label">Chọn tháng cần tạo hóa đơn</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>---tháng---</option>
                                        <option value="1">Tháng 1</option>
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option>
                                        <option value="4">Tháng 4</option>
                                        <option value="5">Tháng 5</option>
                                        <option value="6">Tháng 6</option>
                                        <option value="7">Tháng 7</option>
                                        <option value="8">Tháng 8</option>
                                        <option value="9">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                    </select>
                                </div>
                                <label style="color: red;" for="invoiceNumber" class="form-label">*Ghi chú <b>:</b></label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" >Thực Hiện</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.hoadon.in') }}" type="button" class="btn btn-outline-dark  mr-2">In danh sách</a>
    </div>

    <!-- Bảng dữ liệu -->
    <table class="table table-hover">
        <thead>
            <tr style="background-color: lightgrey;">
                <th>Mã Hóa Đơn</th>
                <th>Tên Phòng</th>
                <th>Tiền điện</th>
                <th>Tiền nước</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Tap</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>HĐ01</td>
                <td>VinPearl Vip Traditinal 7 - P05</td>
                <td>200.000</td>
                <td>40.000</td>
                <td>240.000</td>
                <td>Đã thanh toán</td>
                <td><i class="fa-solid fa-pencil"></i>&nbsp;|&nbsp;<i data-bs-toggle="modal" data-bs-target="#XemChiTietHD" class="fa-solid fa-up-right-and-down-left-from-center""></i>&nbsp;|&nbsp;<i data-bs-toggle="modal" data-bs-target="#XoaHD" class="fa-solid fa-delete-left"></i></td>
                <!-- Xem chi tiết hóa đơn -->
                <div class="modal fade" id="XemChiTietHD" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addInvoiceModalLabel">Xem Hóa Đơn</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="invoiceForm">
                                    <div class="headerCTHD">
                                        <p for="invoiceNumber" class="form-label"><b>MYSTICINN</b></p>
                                        <p for="invoiceNumber" class="form-label">Địa chỉ: Phường Lộc Thọ, TP Nha Trang, Tỉnh Khánh Hòa</p>
                                        <p for="invoiceNumber" class="form-label">Điện thoại: 0377689328</p>
                                        <p for="invoiceNumber" class="form-label"><b>HÓA ĐƠN THANH TOÁN DỊCH VỤ</b></p>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        Thông tin chi tiết hóa đơn
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- xóa hóa đơn -->
                <div class="modal fade" id="XoaHD" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addInvoiceModalLabel">Xác nhận</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="invoiceForm">
                                
                                    <div class="mb-3" style="color: red;">
                                        Bạn chắc chắn muốn xóa hóa đơn "HD01" ???
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" >Thực Hiện</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
@endsection