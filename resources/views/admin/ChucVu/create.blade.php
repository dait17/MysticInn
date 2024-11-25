@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container mt-4">
    <h3 class="text-center">Thêm chức vụ</h3>
    <div class="d-flex justify-content-between mb-3">
        <div></div>
        <button onclick="window.location.href='{{ route('admin.chucvu.index') }}';"
         type="button" class="btn btn-primary">Quay lại</button>
    </div>
        <form class="my-4" action="{{route('admin.chucvu.store')}}" method="POST" enctype="multipart/form-data">
           @csrf 
            <div class="container py-4 rounded bg-light">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <label>Mã chức vụ</label>
                        <input class="form-control" type="text" name="MACV" value="{{ $newidcv }}" readonly>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <label>Tên chức vụ</label>
                        <input class="form-control" type="text" name="TENCV" required>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <label>Hệ số lương</label>
                        <input class="form-control" type="text" name="HSL" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success me-2">Thêm mới</button>
                <input type="reset" class="btn btn-danger" value="Reset">
            </div>
        </form>
    </div>
</div>
@endsection