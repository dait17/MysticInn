@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Quản Lý Nội Thất</h4>
            <a href="{{route('admin.noithat.create')}}" class="btn btn-light btn-sm">Thêm Nội Thất</a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="{{route('admin.noithat.edit', 1)}}" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
                <!-- Nội Thất 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex" style="gap: 30px;">
                        <span class="fw-bold">NT01</span>
                        <span class="fw-bold">Ghế Sofa</span>
                        <span class="text-success ms-2">2,500,000 VND</span>
                    </div>
                    <div class="action-buttons d-flex gap-2">
                        <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#viewModal" 
                            onclick="viewFurniture('Ghế Sofa', '2,500,000 VND')">
                            Xem
                        </button>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <button class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal Xem -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Thông Tin Nội Thất</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                <button type="button" class="btn btn-danger">Xóa</button>
            </div>
        </div>
    </div>
</div>

<script>
    function viewFurniture(name, price) {
        document.getElementById('furnitureName').textContent = name;
        document.getElementById('furniturePrice').textContent = price;
    }
</script>
@endsection