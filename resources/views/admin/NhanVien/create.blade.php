@extends('admin.layouts.DashboardLayout')

@section('content')
<style>
    .form-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    input.form-control, select.form-select, button.btn {
        border-radius: 5px; 
        transition: box-shadow 0.3s ease;
    }

    input.form-control:hover, select.form-select:hover, button.btn:hover {
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }

    button.btn-primary {
        background-color: #007bff; 
        border-color: #007bff;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085; 
    }

</style>
<div class="container my-5">
    <h2 class="mb-4 text-center">Thêm Nhân Viên Mới</h2>

    <div class="form-container">
        <form action="{{ route('admin.nhanvien.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Trường họ -->
            <div class="mb-3">
                <label for="hoNV" class="form-label">Họ</label>
                <input type="text" class="form-control" id="hoNV" name="hoNV" value="{{ old('hoNV') }}" required>
            </div>

            <!-- Trường tên -->
            <div class="mb-3">
                <label for="tenNV" class="form-label">Tên</label>
                <input type="text" class="form-control" id="tenNV" name="tenNV" value="{{ old('tenNV') }}" required>
            </div>

            <!-- Trường ngày sinh -->
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh') }}" required>
            </div>

            <!-- Trường giới tính -->
            <div class="mb-3">
                <label for="gioiTinh" class="form-label">Giới Tính</label>
                <select class="form-select" id="gioiTinh" name="gioiTinh" required>
                    <option value="Nam" >Nam</option>
                    <option value="Nu">Nữ</option>
                </select>
            </div>

            <!-- Trường CCCD -->
            <div class="mb-3">
                <label for="CCCD" class="form-label">Số CCCD</label>
                <input type="text" class="form-control" id="CCCD" name="CCCD" value="{{ old('CCCD') }}">
            </div>

            <!-- Trường số điện thoại -->
            <div class="mb-3">
                <label for="SDT" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="SDT" name="SDT" value="{{ old('SDT') }}" required>
            </div>

            <!-- Trường email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Trường địa chỉ -->
            <div class="mb-3">
                <label for="tinh" class="form-label">Tỉnh</label>
                <input type="text" class="form-control" id="tinh" name="tinh" value="{{ old('tinh') }}" required>
            </div>

            <div class="mb-3">
                <label for="huyen" class="form-label">Huyện</label>
                <input type="text" class="form-control" id="huyen" name="huyen" value="{{ old('huyen') }}" required>
            </div>

            <div class="mb-3">
                <label for="xa" class="form-label">Xã</label>
                <input type="text" class="form-control" id="xa" name="xa" value="{{ old('xa') }}" required>
            </div>

            <!-- Trường chức vụ -->
            <div class="mb-3">
                <label for="maCV" class="form-label">Chức Vụ</label>
                <select class="form-select" id="maCV" name="maCV" required>
                    @foreach($positions as $position)
                        <option value="{{ $position->MACV }}">
                            {{ $position->TENCV }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Trường ảnh đại diện -->
            <div class="mb-3">
                <label for="anhDD" class="form-label">Ảnh Đại Diện</label>
                <input type="file" class="form-control" id="anhDD" name="anhDD" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
        </form>
    </div>
</div>
@endsection
