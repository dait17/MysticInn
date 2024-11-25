@extends('admin.layouts.DashboardLayout')

@section('content')
<div class="container mt-4">
    <h3 class="text-center">Quản lí chức vụ</h3>
    <div class="d-flex justify-content-between mb-3">
        <div></div>
        <button onclick="window.location.href='{{ route('admin.chucvu.create') }}';" 
        type="button" class="btn btn-success">Thêm mới</button>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th>Mã chức vụ</th>
                <th>Tên chức vụ</th>
                <th>Hệ số lương</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($chucVus as $cv)                                
            <tr>
                <th>{{$i++}}</th>
                <td>{{ $cv -> MACV}}</td>
                <td>{{ $cv -> TENCV}}</td>
                <td>{{ $cv -> HSL}}</td>
                <td>
                    <button onclick="window.location.href='{{ route('admin.chucvu.edit',$cv->MACV) }}';" type="button" class="btn btn-warning btn-sm">Sửa</button>
                    <button class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal"
                                    onclick="setDeleteFormAction({{ $cv->MACV }})">
                                    Xóa
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa chức vụ này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <!-- Form xóa -->
                <form id="deleteForm" action="{{ route('admin.chucvu.destroy', 0) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setDeleteFormAction(id) {
        var form = document.getElementById('deleteForm');
        form.action = '/admin/chucvu/' + id;
    }
</script>
@endsection
