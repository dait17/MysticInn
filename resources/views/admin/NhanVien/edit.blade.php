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

    button.btn-success {
        background-color: #28a745; 
        border-color: #28a745; 
    }

    button.btn-danger {
        background-color: #dc3545; 
        border-color: #dc3545;
    }

    button.btn-success:hover, button.btn-danger:hover {
        background-color: #218838; 
        border-color: #1e7e34; 
    }

</style>
<div class="container my-5">
    <h2 class="mb-4 text-center">Chỉnh Sửa Thông Tin Nhân Viên</h2>

    <div class="form-container">
        <form action="{{ route('admin.nhanvien.update', $employee->maNV) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="hoNV" class="form-label">Họ</label>
                <input type="text" class="form-control" id="hoNV" name="hoNV" value="{{ old('hoNV', $employee->hoNV) }}" required>
            </div>

            <div class="mb-3">
                <label for="tenNV" class="form-label">Tên</label>
                <input type="text" class="form-control" id="tenNV" name="tenNV" value="{{ old('tenNV', $employee->tenNV) }}" required>
            </div>

            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', $employee->ngaySinh) }}" required>
            </div>

            <div class="mb-3">
                <label for="gioiTinh" class="form-label">Giới Tính</label>
                <select class="form-select" id="gioiTinh" name="gioiTinh">
                    <option value="1" {{ $employee->gioiTinh == 1 ? 'selected' : '' }}>Nam</option>
                    <option value="0" {{ $employee->gioiTinh == 0 ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="CCCD" class="form-label">CCCD</label>
                <input type="text" class="form-control" id="CCCD" name="CCCD" value="{{ old('CCCD', $employee->CCCD) }}">
            </div>

            <div class="mb-3">
                <label for="SDT" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="SDT" name="SDT" value="{{ old('SDT', $employee->SDT) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>

            <div class="mb-3">
                <label for="tinh" class="form-label">Tỉnh</label>
                <input type="text" class="form-control" id="tinh" name="tinh" value="{{ old('tinh', $employee->tinh) }}">
            </div>

            <div class="mb-3">
                <label for="huyen" class="form-label">Huyện</label>
                <input type="text" class="form-control" id="huyen" name="huyen" value="{{ old('huyen', $employee->huyen) }}">
            </div>

            <div class="mb-3">
                <label for="xa" class="form-label">Xã</label>
                <input type="text" class="form-control" id="xa" name="xa" value="{{ old('xa', $employee->xa) }}">
            </div>

            <div class="mb-3">
                <label for="maCV" class="form-label">Chức Vụ</label>
                <select class="form-select" id="maCV" name="maCV">
                    @foreach($positions as $position)
                        <option value="{{ $position->MACV }}" 
                            {{ $employee->maCV == $position->MACV ? 'selected' : '' }}>
                            {{ $position->TENCV }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="anhDD" class="form-label">Ảnh Đại Diện</label>
                <input type="file" class="form-control" id="anhDD" name="anhDD">
                <small class="text-muted">Ảnh hiện tại: <img src="{{ asset('admin_assets/img/' . $employee->anhDD) }}" alt="avatar" width="100"></small>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
</div>
@endsection