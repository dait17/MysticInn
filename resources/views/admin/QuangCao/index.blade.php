@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Quản lý Quảng Cáo</h1>

    <!-- Bảng hiển thị quảng cáo -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Danh sách Quảng Cáo</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tên Quảng Cáo</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Chạy</th>
                        <th>Ngày Gỡ</th>
                        <th>Loại quảng cáo</th>
                        <th>Banner</th>
                        <th class="text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quangcaos as $qc)
                        <tr>
                            <td>{{ $qc->TENQC }}</td>
                            <td>{{ $qc->NGAYTAO }}</td>
                            <td>{{ $qc->NGAYCHAY }}</td>
                            <td>{{ $qc->NGAYGO ?? 'Chưa gỡ' }}</td>
                            <td>
                                @if ($qc->DUONGDAN == 'room')
                                    Quảng cáo phòng
                                @else
                                    Quảng cáo phòng trống
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('admin_assets/img_qc/' . $qc->ANHQC) }}" alt="Ảnh Quảng Cáo" class="img-fluid rounded" style="max-width: 100px;">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.quangcao.show', $qc->MAQC) }}" class="btn btn-info btn-sm me-2">
                                    <i class="bi bi-eye"></i> xem
                                </a>
                                <a href="{{ route('admin.quangcao.edit', $qc->MAQC) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="bi bi-pencil-fill"></i> Sửa
                                </a>
                                <form action="{{ route('admin.quangcao.destroy', $qc->MAQC) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="bi bi-trash-fill"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có quảng cáo nào</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Nút thêm quảng cáo -->
    <div class="text-end mt-4">
        <a href="{{ route('admin.quangcao.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Thêm Quảng Cáo Mới
        </a>
    </div>
</div>
@endsection