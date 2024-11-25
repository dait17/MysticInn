@extends('user.layouts.layout')





@section('content')

    <?php $phong = $hopdong->phong ?>
    <div class="container p-4">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card mb-4" style="max-width: 800px;">
                <div class="row no-gutters">
                    <!-- Hình ảnh của phòng -->
                    <div class="col-md-4">
                        <img src="images/AnhPhong/{{$phong->anhDD}}" class="card-img img-fluid rounded"
                             alt="Ảnh đại diện phòng">
                    </div>
                    <!-- Thông tin chi tiết -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Phòng: </strong>{{ $phong->tenPhong }}</h5>
                            <ul class="list-unstyled">
                                <li><strong>Diện tích: </strong>{{ $phong->dienTich }} m²</li>
                                <li><strong>Ngày ký hợp đồng: </strong>{{ $hopdong->ngayKy }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-4">
            <h5>Hoa Don</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Tháng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_hoadons as $hd)
                        <tr>
                            <td></td>
                            <td>{{$hd['thang'].'/'.$hd['nam']}}</td>
                            <td>{{number_format($hd['tongtien'],'0', '.', ',')}}</td>
                            <td>{{$hd['trangThai'] ? 'Đã thanh toán' : 'Chưa thanh toán'}}</td>
                            <td>
                                <a href="{{route('user.chitiethoadon', $hd['maHoaDon'])}}">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
