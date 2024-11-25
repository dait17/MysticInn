@extends('admin.layouts.DashboardLayout')

@section('content')

    <div class="container-fluid p-4 mt-4">
        <div>
            <button class="btn btn-dark" onclick="window.location.href='{{route('admin.hoadon.index')}}'">
                back
            </button>
        </div>
        <div class="d-flex justify-content-center">
            <div class="bg-light rounded p-4 my-2">
                <h5 class="text-center">Chi tiết hoá đơn Phòng {{$hoadon->hopdong->phong->tenPhong}} </h5>
                <div class="d-flex justify-content-end">
                    Thang {{$hoadon->thang}}/{{$hoadon->nam}}
                </div>
                <?php $tong = $hoadon->hopdong->giaThue?>
                <ul class="list-unstyled">
                    <li><strong>Tiền phòng:</strong> {{number_format($hoadon->hopdong->giaThue, '0', '.', ',')}}</li>
                    @foreach($thanhtoan_dvs as $tt)
                            <?php $dv = $tt->dangkydv->dichvu ?>
                        @if($dv->dvThang)
                            <li><strong>{{$dv->tenDV}}:</strong> {{number_format($tt->donGia, '0', '.', ',')}}</li>
                            <?php $tong += $tt->donGia?>
                        @endif
                    @endforeach
                </ul>

                <div class="">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <td></td>
                            <td>Số đầu</td>
                            <td>Số cuối</td>
                            <td>Số sử dụng</td>
                            <td>Đơn giá</td>
                            <td>Thành tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($thanhtoan_dvs as $tt)
                            <?php $dv = $tt->dangkydv->dichvu ?>
                            @if(!$dv->dvThang)
                                <tr>
                                    <td><strong>{{$dv->tenDV}}:</strong></td>
                                    <td>{{$sudungs[$tt->maDKDV]['soDau']}}</td>
                                    <td>{{$sudungs[$tt->maDKDV]['soCuoi']}}</td>
                                    <td><strong>{{$tt->soSuDung}}</strong></td>
                                    <td>x <strong>{{number_format($tt->donGia, '0', '.', ',')}}</strong></td>
                                        <?php $thanhtien = $tt->soSuDung*$tt->donGia?>

                                    <td>= <strong>{{number_format($thanhtien, '0', '.', ',')}}</strong></td>
                                        <?php $tong += $thanhtien?>

                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <h6><strong>Tổng cộng:</strong> {{number_format($tong, '0', '.', ',')}}</h6>
                </div>
            </div>
        </div>
    </div>

@endsection

