@extends('admin.layouts.DashboardLayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="tendv">
                        <input size="20" id="dvName" type="text">
                    </div>
                </td>
            </tr>
            <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        </table>
    </div>
    <div class="reset-button" onclick="resetFilters()">Đặt lại</div>
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
                        <form action="{{route('admin.dichvu.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table .table>
                                <tr>
                                    <td>
                                        <label for="invoiceNumber" class="form-label">Tên dịch vụ:</label>
                                    </td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" name="tenDV" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Giá dịch vụ:</label></td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" name="giaDV" type="number">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Đơn vị tính:</label></td>
                                    <td>
                                        <div class="tendv">
                                            <input size="50" name="donViTinh" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Bắt buộc:</label></td>
                                    <td>
                                        <div class="form-check">
                                            <input style="margin-top: 8px;" class="form-check-input" type="checkbox" name="batBuoc" value="1" id="flexCheckDefault">
                                            <label sty class="form-check-label" for="flexCheckDefault">
                                                Có
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="invoiceNumber" class="form-label">Dịch vụ Tháng:</label></td>
                                    <td>
                                        <div class="form-check">
                                            <input style="margin-top: 8px;" class="form-check-input" type="checkbox" name="dvThang" value="1" id="flexCheckDefault">
                                            <label sty class="form-check-label" for="flexCheckDefault">
                                                Có
                                            </label>
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
    <table class="table table-index table-hover">
        <thead>
            <tr style="background-color: lightgrey;">
                <th>Mã Dịch Vụ</th>
                <th>Tên Dịch Vụ</th>
                <th>Giá Dịch Vụ</th>
                <th>Đơn Vị Tính</th>
                <th>Bắt Buộc</th>
                <th>Dịch Vụ Tháng</th>
                <th>Tap</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dichVus as $dv)
            <tr>
                <td>{{$dv->maDV}}</td>
                <td>{{$dv->tenDV}}</td>
                <td>{{$dv->giaDV == (int) $dv->giaDV ? number_format($dv->giaDV, 0) : number_format($dv->giaDV, 2)}}</td>
                <td>{{$dv->donViTinh}}</td>
                <td>
                    @if ($dv->batBuoc == 1)
                        <i class="fa-solid fa-check"></i>
                    @endif
                </td>
                <td>
                    @if ($dv->dvThang == 1)
                        <i class="fa-solid fa-check"></i>
                    @endif
                </td>
                <td><i data-bs-toggle="modal" data-bs-target="#EditDV_{{$dv->maDV}}" class="fa-solid fa-pencil"></i>&nbsp;|&nbsp;<i data-bs-toggle="modal" data-bs-target="#XoaDV_{{$dv->maDV}}" class="fa-solid fa-delete-left"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
</body>
@foreach ($dichVus as $dv)
<!-- Sửa dịch vụ -->
<div class="modal fade" id="EditDV_{{$dv->maDV}}" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Chỉnh sửa Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.dichvu.update', $dv->maDV)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table .table>
                        <tr>
                            <td>
                                <label for="invoiceNumber" class="form-label">Mã dịch vụ:</label>
                            </td>
                            <td>
                                <div class="tendv">
                                    <input size="50" name="maDV" type="text" value="{{$dv->maDV}}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="invoiceNumber" class="form-label">Tên dịch vụ:</label>
                            </td>
                            <td>
                                <div class="tendv">
                                    <input size="50" name="tenDV" type="text" value="{{$dv->tenDV}}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Giá dịch vụ:</label></td>
                            <td>
                                <div class="tendv">
                                    <input size="50" name="giaDV" type="number" value="{{$dv->giaDV}}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Đơn vị tính:</label></td>
                            <td>
                                <div class="tendv">
                                    <input size="50" name="donViTinh" type="text" value="{{$dv->donViTinh}}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Bắt buộc:</label></td>
                            <td>
                                <div class="form-check">
                                    <input style="margin-top: 8px;" name="batBuoc" class="form-check-input" type="checkbox" value="{{$dv->batBuoc}}" id="flexCheckDefault" 
                                        @if ($dv->batBuoc == 1) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Có
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="invoiceNumber" class="form-label">Dịch vụ Tháng:</label></td>
                            <td>
                                <div class="form-check">
                                    <input style="margin-top: 8px;" name="dvThang" class="form-check-input" type="checkbox" value="{{$dv->dvThang}}" id="flexCheckDefault" 
                                        @if ($dv->dvThang == 1) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Có
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" onclick="sendEditDV" class="btn btn-primary" >Thực Hiện</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</html>
<script>
function resetFilters() {
    // Reset các trường nhập liệu
    document.getElementById("dvName").value = "";
    
    let url = 'dichvu?';
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


const dvNameInput = document.getElementById('dvName');
let debounceTimer;

// Hàm gửi dữ liệu
function sendData() {
    const dvName = dvNameInput.value;

    // Xây dựng URL với các tham số
    let url = 'dichvu?';
    if (dvName) {
        url += 'dvName=' + encodeURIComponent(dvName);
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

dvNameInput.addEventListener('input', () => {
    clearTimeout(debounceTimer); 
    debounceTimer = setTimeout(sendData, 300);
});


</script>
@endsection