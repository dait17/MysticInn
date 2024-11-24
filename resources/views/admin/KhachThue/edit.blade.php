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
            color: #000;
        }
        .ql-khach-thue .btn {
            margin-left: 5px;
        }
        label {
            color: #000;
            font-weight: bold;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button 
        {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class="container mt-4">
        <form action="{{ route('admin.khachthue.update',$khachThue->maKT) }}" method="POST" class="mb-3 p-3" style="background-color: #ffffff; border-radius: 8px;">
            @csrf
            @method('PUT')
            <h3 class="text-center">Chỉnh sửa thông tin khách thuê</h3>

            <div class="d-flex justify-content-between mb-3">
                <div></div> <!-- Khoảng trống bên trái -->
                <button onclick="window.location.href='{{ route('admin.khachthue.index') }}';" type="button" class="btn btn-primary">Trở lại</button>
            </div>
            <div class="row">
                <!-- Cột bên trái -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maKT">Mã khách thuê</label>
                        <input type="text" name="maKT" id="maKT" class="form-control" value="{{ $khachThue->maKT }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hoKT">Họ</label>
                        <input type="text" name="hoKT" id="hoKT" class="form-control" value="{{ $khachThue->hoKT }}">
                    </div>
                    <div class="form-group">
                        <label for="tenKT">Tên</label>
                        <input type="text" name="tenKT" id="tenKT" class="form-control" value="{{ $khachThue->tenKT }}">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="number" name="SDT" id="sdt" class="form-control" value="{{ $khachThue->SDT }}">
                    </div>
                    <div class="form-group">
                        <label for="cccd">Căn cước công dân</label>
                        <input type="number" name="CCCD" id="cccd" class="form-control" value="{{ $khachThue->CCCD }}">
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gioiTinh">Giới tính</label>
                        <select name="gioiTinh" id="gioiTinh" class="form-control">
                            <option value="Nam" {{ $khachThue->gioiTinh == 0 ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ $khachThue->gioiTinh == 1 ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ngaySinh">Ngày sinh</label>
                        <input type="date" name="ngaySinh" id="ngaySinh" class="form-control" value="{{ $khachThue->ngaySinh }}">
                    </div>
                    <div class="form-group">
                        <label for="tinh">Tỉnh</label>
                        <input type="text" name="tinh" id="tinh" class="form-control" value="{{ $khachThue->tinh }}">
                    </div>
                    <div class="form-group">
                        <label for="huyen">Huyện</label>
                        <input type="text" name="huyen" id="huyen" class="form-control" value="{{ $khachThue->huyen }}">
                    </div>
                    <div class="form-group">
                        <label for="xa">Xã</label>
                        <input type="text" name="xa" id="xa" class="form-control" value="{{ $khachThue->xa }}">
                    </div>
                    <div class="form-group">
                        <label for="daXacThuc">Xác thực</label>
                        <select name="daXacThuc" id="daXacThuc" class="form-control">
                            <option value="0" {{ $khachThue->daXacThuc == 0 ? 'selected' : '' }}>Đã xác thực</option>
                            <option value="1" {{ $khachThue->daXacThuc == 1 ? 'selected' : '' }}>Chưa xác thực</option>
                        </select>
                    </div>
                </div>
            </div>
            

            <!-- Thanh chức năng -->
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-warning mr-2">Cập nhật</button>
                <input type="reset" class="btn btn-danger" value="Reset" onclick="resetFormAndErrors()">
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>

<script>
    function resetFormAndErrors() {
    document.querySelectorAll('.alert-danger').forEach(el => el.remove());
    document.querySelector('form').reset();
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
