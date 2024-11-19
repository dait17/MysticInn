@extends('admin.layouts.DashboardLayout')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-4">
    
    <form method="GET" action="#" class="mb-3 p-4" style="background-color: #f8f9fa; border-radius: 10px;">
        <h3 class="text-center mb-4">Thêm khách thuê</h3>
        <div class="d-flex justify-content-between mb-3">
            <button onclick="window.location.href='{{ route('admin.khachthue') }}';" type="button" class="btn btn-primary ml-auto">Trở lại</button>
        </div>
        
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="maKT">Mã khách thuê</label>
                    <input type="text" name="maKT" id="maKT" class="form-control" placeholder="KH001" readonly>
                </div>
                <div class="form-group">
                    <label for="ho">Họ khách thuê</label>
                    <input type="text" name="hoKT" id="hoKT" class="form-control" placeholder="Nhập họ" required>
                </div>
                <div class="form-group">
                    <label for="ten">Tên khách thuê</label>
                    <input type="text" name="tenKT" id="tenKT" class="form-control" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="cccd">Căn cước công dân</label>
                    <input type="text" name="cccd" id="cccd" class="form-control" placeholder="Nhập căn cước công dân" required>
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
                    <select name="tinh" id="tinh" class="form-control">
                        <option value="">--Tỉnh--</option>
                        <option value="0">Hà Nội</option>
                        <option value="1">Hồ Chí Minh</option>
                        <option value="2">Đà Nẵng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="huyen">Huyện</label>
                    <select name="huyen" id="huyen" class="form-control">
                        <option value="">--Huyện--</option>
                        <option value="0">Hoàn Kiếm</option>
                        <option value="1">Ba Đình</option>
                        <option value="2">Hai Bà Trưng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="xa">Xã</label>
                    <select name="xa" id="xa" class="form-control">
                        <option value="">--Xã--</option>
                        <option value="0">Hàng Đào</option>
                        <option value="1">Cửa Đông</option>
                        <option value="2">Tràng Tiền</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Thanh chức năng -->
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success mr-3 px-4 py-2">Thêm mới</button>
            <button type="reset" class="btn btn-danger px-4 py-2">Reset</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
