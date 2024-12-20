@extends('admin.layouts.DashboardLayout')

@section('content')
<style>
    body {
        background-color: #f7f9fc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: bold;
        color: #4a90e2;
    }

    .form-label {
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #dcdfe6;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    .form-select {
        border-radius: 10px;
        border: 1px solid #dcdfe6;
    }

    .form-select:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    textarea.form-control {
        resize: none;
    }

    .btn-primary {
        background-color: #4a90e2;
        border-color: #4a90e2;
        border-radius: 20px;
        padding: 10px 20px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #357abd;
        transform: translateY(-2px);
    }

    /* Hover effect for input fields */
    .form-control:hover, .form-select:hover {
        background-color: #f0f4f8;
    }

    /* Adjust spacing for mobile */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa thông tin phòng</h2>
    <form action="{{ route('admin.phong.update', $p->maPhong) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Mã phòng -->
        <div class="mb-3">
            <label for="maPhong" class="form-label"><b>Mã Phòng</b></label>
            <input type="text" class="form-control" id="maPhong" name="maPhong" value="{{$p->maPhong}}" readonly>
        </div>

        <!-- Tên phòng -->
        <div class="mb-3">
            <label for="tenPhong" class="form-label"><b>Tên Phòng</b></label>
            <input type="text" class="form-control" id="tenPhong" name="tenPhong" placeholder="Nhập tên phòng" value="{{$p->tenPhong}}" required>
        </div>

        <!-- Diện tích -->
        <div class="mb-3">
            <label for="dienTich" class="form-label"><b>Diện Tích (m²)</b></label>
            <input type="number" class="form-control" id="dienTich" name="dienTich" placeholder="Nhập diện tích" value="{{$p->dienTich}}" required>
        </div>

        <!-- Giá phòng -->
        <div class="mb-3">
            <label for="giaPhong" class="form-label"><b>Giá Phòng (VNĐ)</b></label>
            <input type="number" class="form-control" id="giaPhong" name="giaPhong" placeholder="Nhập giá phòng" min="0" value="{{$p->giaPhong}}" required>
        </div>

        <!-- Ghi chú -->
        <div class="mb-3">
            <label for="ghiChu" class="form-label"><b>Ghi Chú</b></label>
            <textarea class="form-control" id="ghiChu" name="ghiChu" rows="3" placeholder="Nhập ghi chú (nếu có)">{{$p->ghiChu}}</textarea>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
            <label for="trangThai" class="form-label"><b>Trạng Thái</b></label>
            <select class="form-select" id="trangThai" name="trangThai" required>
                <option value="0" {{ $p->trangThai == 0 ? 'selected' : '' }}>Đã thuê</option>
                <option value="1" {{ $p->trangThai == 1 ? 'selected' : '' }}>Còn trống</option>
                <option value="2" {{ $p->trangThai == 2 ? 'selected' : '' }}>Đang sửa chữa</option>
            </select>
        </div>

        <!-- Ảnh chính hiện tại -->
        <div class="mb-3">
            <label for="anhDD" class="form-label"><b>Ảnh đại diện</b></label>
            @if ($p->anhDD)
                <div class="mb-2">
                    <img src="{{ asset('Images/' . $p->anhDD) }}" alt="Ảnh Chính" style="max-width: 100%; height: auto;">
                </div>
            @endif
            <input type="file" class="form-control" id="anhDD" name="anhDD" accept="image/*">
        </div>

        <!-- Danh sách ảnh hiện tại -->
        <div class="mb-3">
            <label for="anhPhong" class="form-label"><b>Các Ảnh Bổ Sung Hiện Tại</b></label>
            <div class="row">
                @foreach ($anhPhong as $anh)
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('admin_assets/img_phong/' . $anh->duongDan) }}" alt="Ảnh Phòng" style="width: 100%; height: auto;">
                        <p class="text-center mt-2">
                            <button type="button" onclick="deleteAnhPhong({{ $p->maPhong }}, {{ $anh->maAnh }})">Xóa</button>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Thêm ảnh bổ sung mới -->
        <div class="mb-3">
            <label for="anhPhong" class="form-label"><b>Thêm Ảnh Bổ Sung</b></label>
            <input type="file" class="form-control" id="anhPhong" name="anhPhong[]" accept="image/*" multiple>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>

<script>
    function deleteAnhPhong(phongId, anhPhongId) {
        if (confirm('Bạn có chắc chắn muốn xóa ảnh này?')) {
            fetch(`/admin/phong/${phongId}/delete_anhPhong/${anhPhongId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Xóa ảnh thất bại!');
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Xóa ảnh thất bại!');
            });
        }
    }
</script>

@endsection
