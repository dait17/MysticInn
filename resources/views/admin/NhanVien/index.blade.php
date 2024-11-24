@extends('admin.layouts.DashboardLayout')

@section('content')
<style>
    .pagination-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .card {
        border: none;
        border-radius: 8px;
    }

    .card-body {
        background-color: #f8f9fa;
        border-radius: 8px;
        color: #495057;
    }

    .card-title {
        color: #007bff;
    }

    .card-text strong {
        color: #6c757d;
    }

    .card-text {
        font-size: 14px;
    }

    .pagination-wrapper a {
        background-color: #007bff;
        color: white;
        border-radius: 5px;
    }

    .pagination-wrapper a:hover {
        background-color: #0056b3;
    }

    /* Màu sắc cho các chức vụ */
    .role-1 {
        background-color: #28a745;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .role-2 {
        background-color: #ffc107;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .role-3 {
        background-color: #17a2b8;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .role-4 {
        background-color: #dc3545;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .role-5 {
        background-color: #6f42c1;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .btn-actions {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
    }

    .btn-actions .btn {
        margin: 0;
    }

    .btn i {
        font-size: 16px;
    }

    .btn:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-add {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .btn-add:hover {
        color:#dee2e6;
        background-color: #218838;
    }

    /* Modal styling */
    .modal-content {
        padding: 20px;
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
    }

</style>

<div class="container my-5">
    <h2 class="mb-4 text-center">Danh Sách Nhân Viên</h2>

    <div class="text-center mb-4">
        <a href="{{route('admin.nhanvien.create')}}" class="btn-add">
            <i class="fas fa-plus"></i> Thêm Nhân Viên Mới
        </a>
    </div>

    <div class="row">
        @foreach($employees as $employee)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('admin_assets/img/' . $employee->anhDD) }}" class="card-img-top rounded-circle mx-auto mt-3" alt="Avatar" style="width: 100px; height: 100px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $employee->hoNV }} {{ $employee->tenNV }}</h5>
                    <p class="card-text">
                        <strong>Giới Tính:</strong> {{ $employee->gioiTinh == 1 ? 'Nam' : 'Nữ' }}<br>
                        <strong>Số Điện Thoại:</strong> {{ $employee->SDT }}<br>
                        <strong>Email:</strong> {{ $employee->email }}<br>
                        <strong>Chức Vụ:</strong>
                        <span class="role-{{$employee->maCV}}">
                            {{$employee->chucvu->TENCV}}
                        </span>
                        <br>
                    </p>

                    <div class="btn-actions">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{$employee->maNV}}" title="Xem"><i class="fas fa-eye"></i></button>
                        <a href="{{route('admin.nhanvien.edit', $employee->maNV)}}" class="btn btn-warning" title="Sửa"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$employee->maNV}}" title="Xóa"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Xem -->
        <div class="modal fade" id="viewModal{{$employee->maNV}}" tabindex="-1" aria-labelledby="viewModalLabel{{$employee->maNV}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel{{$employee->maNV}}">Thông Tin Nhân Viên</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Họ tên:</strong> {{ $employee->hoNV }} {{ $employee->tenNV }}</p>
                        <p><strong>Giới Tính:</strong> {{ $employee->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</p>
                        <p><strong>Số Điện Thoại:</strong> {{ $employee->SDT }}</p>
                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $employee->tinh}} - {{$employee->huyen}} - {{$employee->xa }}</p>

                        <p><strong>Chức Vụ:</strong> {{$employee->chucvu->TENCV}}</p>
                        <p><strong>Ngày Sinh:</strong> {{ $employee->ngaySinh }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Xóa -->
        <div class="modal fade" id="deleteModal{{$employee->maNV}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$employee->maNV}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{$employee->maNV}}">Xác Nhận Xóa Nhân Viên</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa nhân viên <strong>{{ $employee->hoNV }} {{ $employee->tenNV }}</strong> không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('admin.nhanvien.destroy', $employee->maNV) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Phân trang -->
    @if ($employees->total() > 6)
        <div class="pagination-wrapper">
            {{ $employees->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>

@endsection