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


        /* Điều chỉnh để text không bị xuống dòng */
        .modal-body label {
            white-space: nowrap; /* Chắc chắn label không bị xuống dòng */
            margin-right: 10px; /* Thêm khoảng cách giữa label và select */
            margin-top: 5px;;
        }
        .headerCTHD{
            text-align: center;
        }
        .tendv{
            width: 60%;
            border-radius: 10px;
            border: 2px solid #ddd;
            line-height: 35px;
        }
        .tendv input{
            margin: 0 10px;
            width: 90%;
            border: none;
        }
        .tendv input:focus{
            outline: none;
        }
        .table {
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
                <td>Tên dịch vụ:</td>
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
        <button type="button" class="btn btn-outline-dark mr-2" data-bs-toggle="modal" data-bs-target="#ThemDichVu">
            Thêm dịch vụ
        </button>
        <!-- Modal của nút thêm dịch vụ -->
        <div class="modal fade" id="ThemDichVu" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInvoiceModalLabel">Thêm Dịch Vụ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <table .table>
                                <tr>
                                    <td>
                                        <label for="invoiceNumber" class="form-label">Tên dịch vụ:</label>
                                    </td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Giá dịch vụ:</label></td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" type="number">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Đơn vị tính:</label></td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Bắt buộc:</label></td>
                                    <td>
                                        <div class="form-check">
                                            <input style="margin-top: 8px;" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label sty class="form-check-label" for="flexCheckDefault">
                                                Có
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Dịch vụ Tháng:</label></td>
                                    <td>
                                    <div class="form-check form-check-inline">
                                        <input style="margin-top: 8px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Theo tháng</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input style="margin-top: 8px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Theo số lần sử dụng</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" >Thực Hiện</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng dữ liệu -->
    <table class="table table-hover">
        <thead>
            <tr style="background-color: lightgrey;">
                <th>Mã Dịch Vụ</th>
                <th>Tên Dịch Vụ</th>
                <th>Giá Dịch Vụ</th>
                <th>Đơn Vị Tính</th>
                <th>Bắt Buộc</th>
                <th>Dịch Vụ Tháng</th> <!-- Tính theo tháng, Tính theo số lượng !-->
                <th>Tap</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DV01</td>
                <td>Dọn Phòng</td>
                <td>20.000</td>
                <td>lần</td>
                <td></td>
                <td><i class="fa-solid fa-check"></i></td>
                <td><i data-bs-toggle="modal" data-bs-target="#EditDV" class="fa-solid fa-pencil"></i>&nbsp;|&nbsp;<i data-bs-toggle="modal" data-bs-target="#XoaDV" class="fa-solid fa-delete-left"></i></td>
                <!-- xóa dịch vụ -->
                <div class="modal fade" id="XoaDV" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addInvoiceModalLabel">Xác nhận</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="invoiceForm">
                                
                                    <div class="mb-3" style="color: red;">
                                        Bạn chắc chắn muốn xóa dịch vụ "DV01" ???
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
<!-- Sửa dịch vụ -->
<div class="modal fade" id="EditDV" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Chỉnh sửa Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <table .table>
                        <tr>
                            <td>
                                <label for="invoiceNumber" class="form-label">Tên dịch vụ:</label>
                            </td>
                            <td>
                                <div class="tendv">
                                    <input size="50" type="text">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Giá dịch vụ:</label></td>
                            <td>
                                <div class="tendv">
                                    <input size="50" type="number">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Đơn vị tính:</label></td>
                            <td>
                                <div class="tendv">
                                    <input size="50" type="text">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Bắt buộc:</label></td>
                            <td>
                                <div class="form-check">
                                    <input style="margin-top: 8px;" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label sty class="form-check-label" for="flexCheckDefault">
                                        Có
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Dịch vụ Tháng:</label></td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input style="margin-top: 8px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Theo tháng</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input style="margin-top: 8px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Theo số lần sử dụng</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" >Thực Hiện</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>
@endsection