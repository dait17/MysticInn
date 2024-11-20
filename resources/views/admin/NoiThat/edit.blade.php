@extends('admin.layouts.DashboardLayout')

@section('content')
<style>
    h2{
        font-weight: bold;
        color: #4a90e2;
    }
</style>
<div class="container mt-4">
    <div class="card shadow-sm">
        <h2 class="text-center mb-4 mt-4">Sửa Nội Thất</h2>
        <div class="card-body">
            <form>
                <!-- Mã Nội Thất -->
                <div class="mb-3">
                    <label for="maNoiThat" class="form-label">Mã Nội Thất</label>
                    <input type="text" class="form-control" id="maNoiThat" placeholder="1" readonly>
                </div>
                
                <!-- Tên Nội Thất -->
                <div class="mb-3">
                    <label for="tenNoiThat" class="form-label">Tên Nội Thất</label>
                    <input type="text" class="form-control" id="tenNoiThat" placeholder="Nhập tên nội thất">
                </div>
                
                <!-- Giá Nội Thất -->
                <div class="mb-3">
                    <label for="giaNoiThat" class="form-label">Giá Nội Thất (VND)</label>
                    <input type="number" class="form-control" id="giaNoiThat" placeholder="Nhập giá nội thất">
                </div>
                
                <!-- Nút Thêm -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
