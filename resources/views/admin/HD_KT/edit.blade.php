@extends('admin.layouts.DashboardLayout')

@section('content')

    <div class="container-fluid pt-4 mt-2">
        <div>
            <h5 class="text-center">Chỉnh sửa thông tin khách thuê cho hợp đồng Số</h5>
        </div>
        <form action="{{route('admin.hd_kt.update')}}" method="post">
            @csrf
            <div class="row g-4 px-4">

                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded p-4">
                        <ul class="list-unstyled">
                            <?php $kt = $hd_kt->khachthue; ?>
                            <li class="my-2"><strong>Họ tên:</strong> {{$kt->hoKT.' '.$kt->tenKT}}</li>
                            <li class="my-2"><strong>Số điện thoại:</strong> {{$kt->SDT}}</li>
                            <li class="my-2"><strong>Ngày sinh:</strong> {{$kt->ngaySinh}}</li>
                            <li class="my-2"><strong>Địa chỉ:</strong> {{$kt->xa.', '.$kt->huyen.', '.$kt->tinh}}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-6">
                    <input type="hidden" name="maHopDong" value="{{$hd_kt->maHopDong}}">
                    <input type="hidden" name="maKT" value="{{$hd_kt->maKT}}">
                    <div class="row my-3">
                        <div class="form-floating">
                            @php
                                use Illuminate\Support\Carbon;
//                                $formattedDate = $hd_kt->ngayVao ? Carbon::parse($hd_kt->ngayVao)->format('Y-m-d\TH:i') : '';
                                function getDateFormatted($d) {
                                    return $d ? Carbon::parse($d)->format('Y-m-d\TH:i') : '';
                                }
                            @endphp
                            <input type="datetime-local" class="form-control" name="ngayVao" id="ngayVao"
                                   aria-describedby="ngayVao"
                                   value="{{getDateFormatted($hd_kt->ngayVao)}}">
                            <label for="ngayVao">Ngày vào ở <span>*</span></label>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" name="ngayRoiDi" id="ngayRoiDi"
                                   aria-describedby="ngayRoiDi"
                                   value="{{getDateFormatted($hd_kt->ngayRoiDi)}}">
                            <label for="ngayRoiDi">Ngày rời đi</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-success" type="submit">
                    Xác nhận
                </button>
            </div>
        </form>

    </div>



@endsection

