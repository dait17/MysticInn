@extends('admin.layouts.DashboardLayout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

    h2{
        font-weight: bold;
        color: #4a90e2;
    }

    .card {
        position: relative;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        height: 250px;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3); /* Lớp phủ bán trong suốt */
        z-index: 1;
    }

    .card-body {
        color: white; /* Màu chữ sáng để nổi bật */
        position: relative;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Bóng chữ */
    }

    .action-buttons button {
        display: none; /* Ẩn nút mặc định */
        transition: opacity 0.3s ease; /* Hiệu ứng chuyển đổi */
    }

    .card:hover .action-buttons button {
        display: block; /* Hiển thị nút khi hover */
    }

    .btn-info:hover {
        background-color: #17a2b8;
        color: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn-success {
        background-color: #28a745;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .pagination-wrapper {
        width: 100%;
        display: flex;
        justify-content: center; /* Căn giữa phân trang */
        margin-top: 20px;
    }

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.getElementById("toggleFilter");
        const filterContent = document.getElementById("filterContent");
        const icon = toggleButton.querySelector("i");

        toggleButton.addEventListener("click", function () {
            if (filterContent.style.display === "none") {
                filterContent.style.display = "block";
                toggleButton.innerHTML = '<i class="fa-solid fa-sort-up"></i>';
            } else {
                filterContent.style.display = "none";
                toggleButton.innerHTML = '<i class="fa-solid fa-sort-down"></i>';
            }
        });

        filterContent.style.display = "none";
    });

    //xem chi tiêt
    function getRoomDetails(button) {
    const roomId = button.getAttribute('data-id');

    // Gửi yêu cầu Ajax đến controller
    fetch(`/admin/phong/${roomId}`)
        .then(response => response.json())
        .then(data => {
            // Cập nhật thông tin phòng vào modal
            document.getElementById('roomName').innerText = "phòng" + " " + data.tenPhong;
            document.getElementById('roomArea').innerText = data.dienTich + " " + "(m²)";
            document.getElementById('roomPrice').innerText = data.giaPhong + " " + "(VNĐ)";
            document.getElementById('roomNote').innerText = data.ghiChu;
            let roomStatus = '';
            if (data.trangThai === 0) {
                roomStatus = 'Đã thuê';
            } else if (data.trangThai === 1) {
                roomStatus = 'Còn trống';
            } else if (data.trangThai === 2) {
                roomStatus = 'Sửa chữa';
            }
            document.getElementById('roomStatus').innerText = roomStatus;
        })
        .catch(error => console.error('Error:', error));
    }

    // xóa
    function setDeleteFormAction(id) {
        var form = document.getElementById('deleteForm');
        form.action = '/admin/phong/' + id;
    }


</script>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Chi tiết phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tên phòng:</strong>  <span id="roomName"></span></p>
                <p><strong>Diện tích:</strong> <span id="roomArea"></span></p>
                <p><strong>Giá:</strong> <span id="roomPrice"></span></p>
                <p><strong>Ghi chú:</strong> <span id="roomNote"></span></p>
                <p><strong>Tình trạng:</strong> <span id="roomStatus"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

  
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteModalLabel">Xóa phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa phòng này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <!-- Form xóa phòng -->
                <form id="deleteForm" action="{{ route('admin.phong.destroy', 0) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<h2 align = center class="mt-4">Quản Lý Phòng</h2>  
<div class="container mt-4">
    <!-- Bộ lọc -->
<div class="mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Bộ lọc</h5>
        <button id="toggleFilter">
            <i class="fa-solid fa-sort-down"></i>
        </button>
    </div>
    <div class="card-body-filter" id="filterContent" style="display: none">
        <form method="GET" action="{{ url()->current() }}">
            <div class="row">
                <!-- Bộ lọc theo Diện tích -->
                <div class="col-md-3">
                    <label for="area" class="form-label"><b>Diện tích</b></label>
                    <input type="text" name="area" id="area" class="form-control" placeholder="Nhập Diện tích" value="{{ request()->get('area') }}">
                </div>
        
                <!-- Bộ lọc theo giá -->
                <div class="col-md-3">
                    <label for="price" class="form-label"><b>Giá (tối đa)</b></label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá tối đa" value="{{ request()->get('price') }}">
                </div>
        
                <!-- Bộ lọc theo tình trạng -->
                <div class="col-md-3">
                    <label for="status" class="form-label"><b>Tình trạng</b></label>
                    <select name="status" id="status" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="0" {{ request()->get('status') == 0 ? 'selected' : '' }}>Đã thuê</option>
                        <option value="1" {{ request()->get('status') == 1 ? 'selected' : '' }}>Còn trống</option>
                        <option value="2" {{ request()->get('status') == 2 ? 'selected' : '' }}>Sửa chữa</option>
                    </select>
                </div>
        
                <!-- Nút tìm kiếm -->
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                </div>
            </div>
        </form>
        
    </div>
</div>


    <div class="mb-4">
        <a href="{{ route('admin.phong.create') }}" class="btn btn-success">Thêm phòng</a>
    </div>

    <!-- Hiển thị các phòng -->
    <div class="row">
        @foreach ($phongs as $phong)
            <div class="col-md-4 mb-4">
                <div class="card" style="
                    background-image: url('{{asset('Images/'.$phong->anhDD)}}'); 
                    background-size: cover; 
                    background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{$phong->tenPhong}}</h5>
                        <p class="card-text">
                            <strong>Diện tích:</strong> {{$phong->dienTich}}(m²)<br>
                            <strong>Giá:</strong> {{$phong->giaPhong}} VND<br>
                            <strong>Tình trạng:</strong>
                            @if ($phong->trangThai == 0)
                                Đã thuê
                            @elseif ($phong->trangThai == 1)
                                Còn trống
                            @elseif ($phong->trangThai == 2)
                                Sửa chữa
                            @else
                                Không xác định
                            @endif
                        </p>
                        <div class="action-buttons d-flex justify-content-around mt-5 ">
                            <button class="btn btn-info w-100 mb-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailModal" 
                                onclick="getRoomDetails(this)" 
                                data-id="{{ $phong->maPhong }}">
                                Xem
                            </button>
                            <button onclick="window.location.href='{{route('admin.phong.edit', $phong->maPhong)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                            <button class="btn btn-danger w-100 mb-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#DeleteModal" 
                                onclick="setDeleteFormAction({{ $phong->maPhong }})"> 
                                Xóa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

</div>
<!-- Phân trang -->
@if ($phongs->total() > 6)
    <div class="pagination-wrapper">
        {{ $phongs->links('pagination::bootstrap-4') }}
    </div>
@endif

@endsection
