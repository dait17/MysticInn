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
        <h2 class="text-center mb-4 mt-4">Thêm Nội Thất</h2>
        <div class="card-body">
            <form action="{{route('admin.noithat.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Mã Nội Thất -->
                <div class="mb-3">
                    <label for="maNT" class="form-label"><b>Mã Nội Thất</b></label>
                    <input type="text" class="form-control" name="maNT" id="maNT" value="{{$newId}}" readonly>
                </div>
                
                <!-- Tên Nội Thất -->
                <div class="mb-3">
                    <label for="tenNT" class="form-label"><b>Tên Nội Thất</b></label>
                    <input type="text" class="form-control" name="tenNT" id="tenNT" placeholder="Nhập tên nội thất">
                </div>
                
                <!-- Giá Nội Thất -->
                <div class="mb-3">
                    <label for="giaNT" class="form-label"><b>Giá Nội Thất (VND)</b></label>
                    <input type="number" class="form-control" name ="giaNT" id="giaNT" placeholder="Nhập giá nội thất">
                </div>
                
                <!-- Nút Thêm -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
