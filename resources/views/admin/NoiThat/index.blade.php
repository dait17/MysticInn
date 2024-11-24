@extends('admin.layouts.DashboardLayout')

@section('content')
<style>
    .table th, .table td {
        vertical-align: middle;
    }

    .table {
        font-size: 14px;
    }

    .table thead th {
        text-align: center;
        background-color: #007bff;
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .btn {
        margin: 0 2px;
    }
    
    .pagination-wrapper {
        width: 100%;
        display: flex;
        justify-content: center; /* Căn giữa phân trang */
        margin-top: 20px;
    }

</style>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Quản Lý Nội Thất</h4>
            <a href="{{route('admin.noithat.create')}}" class="btn btn-light btn-sm">Thêm Nội Thất</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">Mã</th>
                            <th>Tên Nội Thất</th>
                            <th>Giá</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noithats as $nt)
                            <tr>
                                <td class="text-center">{{$nt->maNT}}</td>
                                <td>{{$nt->tenNT}}</td>
                                <td class="text-success">{{$nt->giaNT}} VNĐ</td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewModal" 
                                        onclick="viewFurniture('{{$nt->maNT}}', '{{$nt->tenNT}}', '{{$nt->giaNT}}')">
                                        Xem
                                    </button>
                                    <a href="{{route('admin.noithat.edit', $nt->maNT)}}" class="btn btn-warning btn-sm">Sửa</a>
                                    <button class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                        onclick="setDeleteFormAction({{ $nt->maNT }})">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>            
        </div>
    </div>
</div>
<!-- Phân trang -->
@if ($noithats->total() > 5)
    <div class="pagination-wrapper">
        {{ $noithats->links('pagination::bootstrap-4') }}
    </div>
@endif
<!-- Modal Xem -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Thông Tin Nội Thất</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Mã:</strong> <span id="furnitureID"></span></p>
                <p><strong>Tên:</strong> <span id="furnitureName"></span></p>
                <p><strong>Giá:</strong> <span id="furniturePrice"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa nội thất này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <!-- Form xóa -->
                <form id="deleteForm" action="{{ route('admin.noithat.destroy', 0) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function viewFurniture(id, name, price) {
        document.getElementById('furnitureID').textContent = id;
        document.getElementById('furnitureName').textContent = name;
        document.getElementById('furniturePrice').textContent = price;
    }

    function setDeleteFormAction(id) {
        var form = document.getElementById('deleteForm');
        form.action = '/admin/noithat/' + id;
    }
</script>
@endsection