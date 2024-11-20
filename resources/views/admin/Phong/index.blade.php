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
        background-image: url("https://via.placeholder.com/300x200");
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

    .pagination-buttons {
        display: flex;
        align-items: center;
    }

    .pagination-buttons button {
        padding: 8px 16px;
        margin: 0 5px;
        background-color: #0dcaf0;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .pagination-buttons button:hover {
        background-color: #17a2b8;
    }

    .pagination-buttons span {
        font-size: 18px;
        margin: 0 10px;
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
          <p><strong>Tên phòng:</strong> <span id="roomName"></span></p>
          <p><strong>Diện tích:</strong> <span id="roomAddress"></span></p>
          <p><strong>Giá:</strong> <span id="roomPrice"></span></p>
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
                <button type="button" class="btn btn-danger">Xóa</button>
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
        <form method="GET" action="">
            <div class="row">
                <!-- Bộ lọc theo Diện tích -->
                <div class="col-md-3">
                    <label for="address" class="form-label"><b>Diện tích</b></label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Nhập Diện tích">
                </div>

                <!-- Bộ lọc theo giá -->
                <div class="col-md-3">
                    <label for="price" class="form-label"><b>Giá (tối đa)</b></label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá tối đa">
                </div>

                <!-- Bộ lọc theo tình trạng -->
                <div class="col-md-3">
                    <label for="status" class="form-label"><b>Tình trạng</b></label>
                    <select name="status" id="status" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="available">Còn trống</option>
                        <option value="occupied">Đã thuê</option>
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
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phòng 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                 
                <div class="card-body">
                    <h5 class="card-title">Phòng 101</h5>
                    <p class="card-text">
                        <strong>Diện tích:</strong> 52(m²)<br>
                        <strong>Giá:</strong> 5.000.000 VND<br>
                        <strong>Tình trạng:</strong> Còn trống
                    </p>
                    <div class="action-buttons d-flex justify-content-around mt-5 ">
                        <button class="btn btn-info w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal" 
                            onclick="">
                            Xem
                        </button>
                        <button onclick="window.location.href='{{route('admin.phong.edit', 1)}}';" class="btn btn-warning w-100 mb-2" >Sửa</button>
                        <button class="btn btn-danger w-100 mb-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#DeleteModal" 
                            onclick="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- Phân trang -->
<div class="pagination-wrapper">
    <div class="pagination-buttons" id="pagination">
        <button class="prev-btn btn-info" onclick="changePage(-1)">← Previous</button>
        <span id="page-number">Page 1</span>
        <button class="next-btn" onclick="changePage(1)">Next →</button>
    </div>
</div>
@endsection
