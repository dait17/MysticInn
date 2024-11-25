@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Chi Tiết Quảng Cáo</h1>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông Tin Quảng Cáo</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Tên Quảng Cáo:</div>
                <div class="col-md-9">{{ $quangcao->TENQC }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Ngày Tạo:</div>
                <div class="col-md-9">{{ $quangcao->NGAYTAO }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Ngày Chạy:</div>
                <div class="col-md-9">{{ $quangcao->NGAYCHAY }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Ngày Gỡ:</div>
                <div class="col-md-9">{{ $quangcao->NGAYGO ?? 'Chưa gỡ' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Đường Dẫn:</div>
                <div class="col-md-9">
                    <a href="{{ $quangcao->DUONGDAN }}" >
                        @if ($quangcao->DUONGDAN == 'room')
                            Quảng cáo phòng
                        @else
                            Quảng cáo phòng trống
                        @endif
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Ảnh Quảng Cáo:</div>
                <div class="col-md-9">
                    <img src="{{ asset('admin_assets/img_qc/' . $quangcao->ANHQC) }}" alt="Ảnh Quảng Cáo" class="img-fluid rounded" style="max-width: 300px;">
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('admin.quangcao.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại danh sách
        </a>
        <div>
            <a href="{{ route('admin.quangcao.edit', $quangcao->MAQC) }}" class="btn btn-warning">
                <i class="bi bi-pencil-fill"></i> Sửa
            </a>
            <form action="{{ route('admin.quangcao.destroy', $quangcao->MAQC) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                    <i class="bi bi-trash-fill"></i> Xóa
                </button>
            </form>
        </div>
    </div>
</div>
@endsection