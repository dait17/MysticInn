@extends('admin.layouts.DashboardLayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/khach-thue.css') }}">
<div class="ql-khach-thue container mt-4">
    
    <style>
        .ql-khach-thue {
            margin-top: 20px;
            background-color: #87CEEB;
            border-radius: 8px;
            padding: 20px; 
        }
        .ql-khach-thue .form-control {
            margin-bottom: 15px; 
        }
        .ql-khach-thue .btn {
            margin-left: 5px; 
        }
        label {
            color: #000;
            font-weight: bold; 
        }
    </style>

    <div class="container mt-4"> 
        <form action="#" method="GET" class="mb-3 p-3" style="background-color: #ffffff; border-radius: 8px;">
        <h3 class="text-center">Chỉnh sửa thông tin khách thuê</h3>

        <div class="d-flex justify-content-between mb-3">
            <div></div> <!-- Khoảng trống bên trái -->
            <button onclick="window.location.href='{{ route('admin.khachthue') }}';" type="button" class="btn btn-primary">Trở lại</button>
        </div>
            <div class="row">
                <!-- Cột bên trái -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maKT">Mã khách thuê</label>
                        <input type="text" name="maKT" id="maKT" class="form-control" placeholder="KT001"@readonly(true)>
                    </div>
                    <div class="form-group">
                        <label for="hoKT">Họ</label>
                        <input type="text" name="hoKT" id="hoKT" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="tenKT">Tên</label>
                        <input type="text" name="tenKT" id="tenKT" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" name="sdt" id="sdt" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="cccd">Căn cước công dân</label>
                        <input type="text" name="cccd" id="cccd" class="form-control" placeholder="">
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="gioiTinh">Giới tính</label>
                        <select name="gioiTinh" id="gioiTinh" class="form-control">
                            <option value="">--Chọn giới tính--</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tinh">Tỉnh</label>
                        <input type="text" name="tinh" id="tinh" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="huyen">Huyện</label>
                        <input type="text" name="huyen" id="huyen" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="xa">Xã</label>
                        <input type="text" name="xa" id="xa" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <!-- Thanh chức năng -->
            <div class="d-flex justify-content-center mt-3">
                <button onclick="confirm('Bạn có muốn sửa không?')" type="button"  class="btn btn-warning mr-2">Cập nhật</button>
                <button onclick="window.location.href='{{ route('admin.khachthue.sua') }}';" type="button" class="btn btn-danger">Reset</button>
            </div>
        </form>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection