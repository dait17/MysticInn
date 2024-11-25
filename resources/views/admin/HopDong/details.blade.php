@extends('admin.layouts.DashboardLayout')

@section('content')
    <style>
        #myPopup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Phần nền mờ */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>

    <div class="container-fluid pt-4 px-4 pb-4 mb-2">
        <div class="pb-2 pt-1">
            <h5 class="text-center">Thông tin hợp đồng Số {{$hopdong->maHopDong}}</h5>
        </div>

        <div class="d-flex justify-content-between p-2 mb-2">
            <button type="button" class="btn btn-dark"
                    onclick="window.location.href='{{route('admin.hopdong.index')}}'">Danh sách hợp đồng
            </button>

            @if(!$hopdong->ngayKetThuc)
                <button type="button" class="btn btn-dark" onclick="window.location.href='{{route('admin.hopdong.xuatfile', $hopdong->maHopDong)}}'">
                    Xuất file
                </button>
            @else
                <div class="">
                    Đã Trả Phòng
                </div>
            @endif
        </div>

        <div class="row g-4">
            <div class="col-sm-12 col-xl-5">
                <div class="bg-light rounded h-100 px-4 py-2">
                    <h6>Thông tin cơ bản</h6>
                    <ul class="list-unstyled">
                        <li class="mt-2 p-1"><strong>Phòng:</strong> {{$hopdong->phong->tenPhong}}</li>
                        <li class="mt-2 p-1"><strong>Ngày ký:</strong> {{$hopdong->ngayKy}}</li>
                        <li class="mt-2 p-1"><strong>Ngày hết
                                hạn:</strong> {{!$hopdong->ngayHetHan?'Không thời hạn':$hopdong->ngayHetHan}}</li>
                        @if($hopdong->ngayKetThuc)
                            <li class="mt-2 p-1"><strong>Ngày trả phòng:</strong> {{$hopdong->ngayKetThuc}}</li>
                        @endif
                        <li class="mt-2 p-1"><strong>Giá
                                thuê:</strong> {{number_format($hopdong->giaThue, '0', '.', ',')}}
                            VND
                        </li>
                        <li class="mt-2 p-1"><strong>Tiền
                                cọc:</strong> {{number_format($hopdong->tienCoc, '0', '.', ',')}}
                            VND
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-xl-7">
                <div class="bg-light rounded h-100 px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h6 class="my-auto">Thông tin khách thuê</h6>
                        <button
                            onclick="window.location.href='{{route('admin.hd_kt.index',['maHopDong'=>$hopdong->maHopDong])}}'"
                            class="btn">Chi tiết <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Ngày vào</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$hopdong->khachthue->hoKT.' '.$hopdong->khachthue->tenKT}}</td>
                            <td>{{$hopdong->ngayKy}}</td>
                            <td>{{$hopdong->ngayKetThuc}}</td>
                            <td>
                                <i class="bi bi-person" title="Đại diện hợp đồng"></i>
                            </td>
                        </tr>
                        <?php $i = 2 ?>
                        @foreach($hd_kts as $hd_kt)
                                <?php $kt = $hd_kt->khachthue ?>
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$kt->hoKT.' '.$kt->tenKT}}</td>
                                <td>{{$hd_kt->ngayVao}}</td>
                                <td>
                                    @if($kt->daXacThuc)
                                        <div class="bg-light p-2 rounded" title="Đã xác thực"><i
                                                class="bi bi-check-circle"></i></div>
                                    @else
                                        <button title="Chưa được xác thực" type="button" id="popupButton"
                                                class="btn btn-sm btn-outline-danger">Xác thực <i
                                                class="bi bi-shield-check"></i></button>

                                        <div id="myPopup" style="display: none;" class="rounded">
                                            <div class="px-4 py-2">
                                                <h5 class="text-center">Thông tin khách thuê</h5>
                                                <form action="{{route('admin.hopdong.xacthuckt', $kt->maKT)}}"
                                                      method="post">
                                                    @csrf
                                                    <ul class="list-unstyled">
                                                        <li><strong>Họ tên:</strong> {{$kt->hoKT.' '.$kt->tenKT}}</li>
                                                        <li><strong>Số điện thoại:</strong> {{$kt->SDT}}</li>
                                                        <li><strong>Ngày sinh:</strong> {{$kt->ngaySinh}}</li>
                                                        <li><strong>Giới tính:</strong> {{$kt->gioiTinh?'Nam':'Nữ'}}
                                                        </li>
                                                        <li><strong>CCCD:</strong> {{$kt->CCCD}}</li>
                                                        <li><strong>Địa
                                                                chỉ:</strong> {{$kt->xa.', '.$kt->huyen.', '.$kt->tinh}}
                                                        </li>
                                                    </ul>
                                                    <div class="d-flex justify-content-around">
                                                        <button title="Chưa được xác thực" type="submit"
                                                                class="btn btn-sm btn-outline-success">Xác thực <i
                                                                class="bi bi-shield-check"></i></button>
                                                        <button id="closePopup" type="button" class="btn btn-dark">
                                                            Đóng
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-sm-12 col-xl-5">
                <div class="bg-light rounded h-100 px-4 py-3">
                    <h6>Thông tin nội thất</h6>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tên nội thất</th>
                            <th scope="col">Tình trạng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($hd_nts as $hd_nt)
                                <?php $nt = $hd_nt->noithat ?>
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$nt->tenNT}}</td>
                                <td>{{$hd_nt->trangThai}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-xl-7">
                <div class="bg-light rounded h-100 px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h6 class="my-auto">Dịch vụ đăng ký</h6>
                        <button class="btn">Chi tiết <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tên dịch vụ</th>
                            <th scope="col">Ngày đăng ký</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($dkdvs as $dkdv)
                                <?php $dv = $dkdv->dichvu ?>
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$dv->tenDV}}</td>
                                <td>{{$dkdv->ngayDK}}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(!$hopdong->ngayKetThuc)
            <div class="d-flex justify-content-end mt-3 py-3">
                <button class="btn btn-danger" onclick="window.location.href='{{route('admin.hopdong.traphong', $hopdong->maHopDong)}}'">
                    Trả Phòng
                </button>
            </div>
        @endif


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var popup = document.getElementById('myPopup');
            var overlay = document.createElement('div');
            overlay.id = 'overlay';
            document.body.appendChild(overlay);

            document.getElementById('popupButton').addEventListener('click', function () {
                popup.style.display = 'block';
                overlay.style.display = 'block';
            });

            document.getElementById('closePopup').addEventListener('click', function () {
                popup.style.display = 'none';
                overlay.style.display = 'none';
            });

            overlay.addEventListener('click', function () {
                popup.style.display = 'none';
                overlay.style.display = 'none';
            });
        });
    </script>

@endsection


