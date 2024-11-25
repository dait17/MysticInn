@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Chỉnh Sửa Quảng Cáo</h1>

    <!-- Form chỉnh sửa -->
    <form action="{{ route('admin.quangcao.update', $quangcao->MAQC) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="TENQC" class="form-label">Tên Quảng Cáo</label>
            <input type="text" id="TENQC" name="TENQC" class="form-control" value="{{ old('TENQC', $quangcao->TENQC) }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYTAO" class="form-label">Ngày Tạo</label>
            <input type="date" id="NGAYTAO" name="NGAYTAO" class="form-control" value="{{ old('NGAYTAO', $quangcao->NGAYTAO) }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYCHAY" class="form-label">Ngày Chạy</label>
            <input type="date" id="NGAYCHAY" name="NGAYCHAY" class="form-control" value="{{ old('NGAYCHAY', $quangcao->NGAYCHAY) }}" required>
        </div>

        <div class="mb-3">
            <label for="NGAYGO" class="form-label">Ngày Gỡ</label>
            <input type="date" id="NGAYGO" name="NGAYGO" class="form-control" value="{{ old('NGAYGO', $quangcao->NGAYGO) }}">
        </div>

        <div class="mb-3">
            <label for="DUONGDAN" class="form-label">Loại Quảng Cáo</label>
            <select id="DUONGDAN" name="DUONGDAN" class="form-select" required>
                <option value="room" {{ old('DUONGDAN', $quangcao->DUONGDAN) === 'phong' ? 'selected' : '' }}>Quảng cáo phòng</option>
                <option value="Quảng cáo phòng trống" {{ old('DUONGDAN', $quangcao->DUONGDAN) === 'phong_trong' ? 'selected' : '' }}>Quảng cáo phòng trống</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="ANHQC" class="form-label">Ảnh Quảng Cáo</label>
            <input type="file" id="ANHQC" name="ANHQC" class="form-control">
            @if ($quangcao->ANHQC)
                <div class="mt-2">
                    <img src="{{ asset('admin_assets/img_qc/' . $quangcao->ANHQC) }}" alt="Ảnh hiện tại" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.quangcao.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Quay lại
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Lưu Thay Đổi
            </button>
        </div>
    </form>
</div>
@endsection