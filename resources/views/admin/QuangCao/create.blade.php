@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container">
    <h1 class="my-4">Thêm Quảng Cáo Mới</h1>

    <!-- Form Thêm Quảng Cáo -->
    <form action="{{ route('admin.quangcao.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="TENQC" class="form-label">Tên Quảng Cáo</label>
            <input type="text" id="TENQC" name="TENQC" class="form-control" value="{{ old('TENQC') }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYTAO" class="form-label">Ngày Tạo</label>
            <input type="date" id="NGAYTAO" name="NGAYTAO" class="form-control" value="{{ old('NGAYTAO') }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYCHAY" class="form-label">Ngày Chạy</label>
            <input type="date" id="NGAYCHAY" name="NGAYCHAY" class="form-control" value="{{ old('NGAYCHAY') }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYGO" class="form-label">Ngày Gỡ</label>
            <input type="date" id="NGAYGO" name="NGAYGO" class="form-control" value="{{ old('NGAYGO') }}">
        </div>

        <div class="mb-3">
            <label for="DUONGDAN" class="form-label">Loại quảng cáo</label>
            <select id="DUONGDAN" name="DUONGDAN" class="form-select" required>
                <option value="room" >Quảng cáo phòng</option>
                <option value="Quảng cáo phòng trống" >Quảng cáo phòng trống</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ANHQC" class="form-label">Ảnh Quảng Cáo</label>
            <input type="file" id="ANHQC" name="ANHQC" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Quảng Cáo</button>
    </form>
</div>
@endsection