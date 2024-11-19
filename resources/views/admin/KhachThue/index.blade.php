@extends('admin.layouts.DashboardLayout')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-4"> 
    <form action="#" method="POST" class="mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
    <h3 class="text-center">Quản lý khách Thuê</h3>
    
    <!-- Form tìm kiếm khách thuê -->
    <div class="d-flex justify-content-between mb-3">
        <button onclick="window.location.href='{{ route('admin.khachthue.them') }}';" type="button" class="btn btn-success ml-auto">Thêm mới</button>
    </div>
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="maKT" id="maKH" class="form-control" placeholder="Mã khách thuê">
                </div>
                <div class="form-group">
                    <input type="text" name="hoKT" id="hoKH" class="form-control" placeholder="Họ">
                </div>
                <div class="form-group">
                    <input type="text" name="tenKT" id="tenKH" class="form-control" placeholder="Tên">
                </div>
                <div class="form-group">
                    <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <input type="text" name="cccd" id="cccd" class="form-control" placeholder="Căn cước công dân">
                </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6"> 
                <div class="form-group">
                    <select name="gioiTinh" id="gioiTinh" class="form-control">
                        <option value="">--Chọn giới tính--</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="tinh" id="tinh" class="form-control">
                        <option value="">--Tỉnh--</option>
                        <option value="0">Hà Nội</option>
                        <option value="1">Hồ Chí Minh</option>
                        <option value="2">Đà Nẵng</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="huyen" id="huyen" class="form-control">
                        <option value="">--Huyện--</option>
                        <option value="0">Hoàn Kiếm</option>
                        <option value="1">Ba Đình</option>
                        <option value="2">Hai Bà Trưng</option>
                    </select>
                </div>
                <div class="form-group">
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
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary mr-2">Tìm kiếm</button>
            <button type="reset" class="btn btn-danger mr-2">Reset</button>
        </div>
    </form>

    <!-- Bảng hiển thị danh sách khách thuê -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Mã KT</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>CCCD</th>
                <th>SDT</th>
                <th>Tỉnh</th>
                <th>Huyện</th>
                <th>Xã</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu mẫu -->
            <tr>
                <td>1</td>
                <td>KH001</td>
                <td>Nguyễn</td>
                <td>Văn A</td>
                <td>Nam</td>
                <td>123456789</td>
                <td>0987654321</td>
                <td>Hà Nội</td>
                <td>Hoàn Kiếm</td>
                <td>Hàng Đào</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Xem chi tiết</a>
                    <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </td>
            </tr>
            <!-- Thêm các dòng dữ liệu khác tại đây -->
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
