@extends('admin.layouts.DashboardLayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/khach-thue.css') }}">
<div class="ql-khach-thue container mt-4">

<style>
    .ql-khach-thue {
        margin-top: 20px;
        background-color: #87CEEB;
        border-radius: 8px;
        padding: 20px;
    }
    .ql-khach-thue .form-control {
        margin-bottom: 15px;
        color: #000;
    }
    .ql-khach-thue .btn {
        margin-left: 5px;
    }
    .table-bordered {
        border: 2px solid #000;
    }
    .table-bordered th,
    .table-bordered td {
        color: #000;
        text-align: center;
        vertical-align: middle;
    }
    .table-bordered tbody tr:nth-child(odd) {
        background-color: #fff;
    }
    .table-bordered tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .table-bordered th {
        background-color: #343a40;
        color: #fff;
        font-weight: bold;
    }
    .table-bordered td {
        font-weight: 600;
    }
    .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        display: inline-block;
        padding: 8px 16px;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
    input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button 
        {
            -webkit-appearance: none;
            margin: 0;
        }
    #tinh, #huyen, #xa {
    max-height: 200px; /* Giới hạn chiều cao của select box */
    overflow-y: auto;  /* Thêm thanh cuộn dọc khi nội dung vượt quá chiều cao */
}
</style>

    <div class="container mt-4">
        <form action="{{ route('admin.khachthue.index') }}" method="GET" class="mb-3 p-3" style="background-color: #ffffff; border-radius: 8px;">
        <h3 class="text-center">Quản lý khách thuê</h3>

        <div class="d-flex justify-content-between mb-3">
            <div></div>
            <button onclick="window.location.href='{{ route('admin.khachthue.create') }}';" type="button" class="btn btn-success">Thêm mới</button>
        </div>
        <h5>Thanh tìm kiếm</h5>
            <div class="row">
                <!-- Cột bên trái -->
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="maKT" value="{{ request('maKT') }}" class="form-control" placeholder="Nhập mã khách thuê" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="hoKT" value="{{ request('hoKT') }}" class="form-control" placeholder="Nhập họ" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="tenKT" value="{{ request('tenKT') }}" class="form-control" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="SDT" value="{{ request('SDT') }}" class="form-control" placeholder="Số điện thoại" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="CCCD" value="{{ request('CCCD') }}" class="form-control" placeholder="Căn cước công dân" />
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="gioiTinh" id="gioiTinh" class="form-control">
                            <option value="" {{ is_null(request('gioiTinh')) || request('gioiTinh') === '' ? 'selected' : '' }}>--Chọn giới tính--</option>
                            <option value="Nam" {{ request('gioiTinh') === 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ request('gioiTinh') === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tinh" id="tinh" class="form-control">
                            <option value="">--Tỉnh--</option>
                            @foreach ($tinhData as $tinh)
                                <option value="{{ $tinh->tinh }}" {{ request('tinh') == $tinh->tinh ? 'selected' : '' }}>{{ $tinh->tinh }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="huyen" id="huyen" class="form-control">
                            <option value="">--Huyện--</option>
                            @foreach ($huyenData as $huyen)
                                <option value="{{ $huyen->huyen }}" {{ request('huyen') == $huyen->huyen ? 'selected' : '' }}>{{ $huyen->huyen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="xa" id="xa" class="form-control">
                            <option value="">--Xã--</option>
                            @foreach ($xaData as $xa)
                                <option value="{{ $xa->xa }}" {{ request('xa') == $xa->xa ? 'selected' : '' }}>{{ $xa->xa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="daXacThuc" id="daXacThuc" class="form-control">
                            <option value="" {{ is_null(request('daXacThuc')) || request('daXacThuc') === '' ? 'selected' : '' }}>--Xác thực--</option>
                            <option value="0" {{ request('daXacThuc') === '0' ? 'selected' : '' }}>Đã xác thực</option>
                            <option value="1" {{ request('daXacThuc') === '1' ? 'selected' : '' }}>Chưa xác thực</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Thanh chức năng -->
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary mr-2">Tìm kiếm</button>
                <input onclick="window.location.href='{{ route('admin.khachthue.index') }}';" type="reset" class="btn btn-danger" value="Reset">
            </div>
        </form>
        <h3 class="text-center">Bảng thông tin</h3>
        <!-- Bảng hiển thị danh sách khách thuê -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã KT</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>CCCD</th>
                    <th>SDT</th>
                    <th>Tỉnh</th>
                    <th>Huyện</th>
                    <th>Xã</th>
                    <th>Xác thực</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khachThues as $kt)                                
                <tr>
                    <td>{{ $kt -> maKT}}</td>
                    <td>{{ $kt -> hoKT.' '.$kt -> tenKT}}</td>
                    <td>{{ $kt->gioiTinh == 0 ? 'Nam' : 'Nữ' }}</td>
                    <td>{{ $kt -> CCCD}}</td>
                    <td>{{ $kt -> SDT}}</td>
                    <td>{{ $kt -> tinh}}</td>
                    <td>{{ $kt -> huyen}}</td>
                    <td>{{ $kt -> xa}}</td>
                    <td>{{ $kt -> daXacThuc == 0 ? 'Có' : 'Chưa' }}</td>
                    <td>
                        <button onclick="window.location.href='{{ route('admin.khachthue.edit',$kt->maKT) }}';" type="button" class="btn btn-warning btn-sm">Sửa</button>
                        <button class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                        onclick="setDeleteFormAction({{ $kt->maKT }})">
                                        Xóa
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $khachThues->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa khách thuê này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <!-- Form xóa -->
                <form id="deleteForm" action="{{ route('admin.khachthue.destroy', 0) }}" method="POST" style="display: inline-block;">
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
        form.action = '/admin/khachthue/' + id;
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
