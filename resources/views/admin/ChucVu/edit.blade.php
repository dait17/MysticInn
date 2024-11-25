@extends('admin.layouts.DashboardLayout')

@section('title', 'Chỉnh sửa chức vụ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Chỉnh sửa chức vụ</h3>
            <form action="{{ route('admin.chucvu.update', $chucvu->MACV) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Mã chức vụ -->
                <div class="form-group">
                    <label for="ma_chuc_vu">Mã chức vụ</label>
                    <input type="text" class="form-control" id="ma_chuc_vu" name="MACV" value="{{ $chucvu->MACV }}" readonly>
                </div>
                
                <!-- Tên chức vụ -->
                <div class="form-group">
                    <label for="ten_chuc_vu">Tên chức vụ</label>
                    <input type="text" class="form-control" id="ten_chuc_vu" name="TENCV" value="{{ $chucvu->TENCV }}" required>
                </div>
                
                <!-- Hệ số lương -->
                <div class="form-group">
                    <label for="he_so_luong">Hệ số lương</label>
                    <input type="number" step="0.01" class="form-control" id="he_so_luong" name="HSL" value="{{ $chucvu->HSL }}" required>
                </div>
                
                <!-- Nút lưu thay đổi -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.chucvu.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
