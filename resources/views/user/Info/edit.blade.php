@extends('user.layouts.layout')


@section('content')
    <div class="container p-4 mt-4">
        <h6 class="text-center">Cập nhật thông tin khách thuê</h6>

        <button class="btn" onclick="window.location.href='{{route('info', Auth::user()->id)}}'">
            <i class=""></i>
            Quay lại
        </button>

        <form action="{{route('info.update')}}" method="post">
            @csrf
            <input type="hidden" name="maKT" value="{{$kt->maKT}}">
            <div class="py-4">
                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="hoKT">Họ:</label>
                            <input class="form-control" type="text" name="hoKT" id="hoKT" value="{{$kt->hoKT}}">
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="tenKT">Tên:</label>
                            <input class="form-control" type="text" name="tenKT" id="tenKT" value="{{$kt->tenKT}}">
                        </div>
                    </div>
                </div>
                <?php

                use Illuminate\Support\Carbon;

                $ns = $kt->ngaySinh ? Carbon::parse($kt->ngaySinh)->format('Y-m-d\TH:i') : '';
                ?>
                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="tenKT">Ngày sinh:</label>
                            <input class="form-control" type="datetime-local" name="ngaySinh" value="{{$ns}}">
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="SDT">Số điện thoại:</label>
                            <input class="form-control" type="text" name="SDT" value="{{$kt->SDT}}">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <span>Giới tính:</span><br>
                            <span class="py-3">
                                <span class="ml-4 mr-4">
                                    <input class="" type="radio" name="gioiTinh" id="gt_nam" value="1" {{$kt->gioiTinh?'checked':''}}>
                                    <label for="gt_nam">Nam</label>
                                </span>
                            </span>
                            <span class="ml-4 mr-4">
                                <span>
                                    <input type="radio" id="gt_nu" name="gioiTinh" value="0" {{!$kt->gioiTinh?'checked':''}}>
                                    <label for="gt_nu">Nu</label>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="CCCD">CCCD:</label>
                            <input class="form-control" type="text" name="CCCD" value="{{$kt->CCCD}}">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="tinh">Tỉnh:</label>
                            <input class="form-control" type="text" name="tinh" id="tinh" value="{{$kt->tinh}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="huyen">Huyện:</label>
                            <input class="form-control" type="text" name="huyen" id="huyen" value="{{$kt->tenKT}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="xa">Xã:</label>
                            <input class="form-control" type="text" name="xa" id="xa" value="{{$kt->tenKT}}">
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-success">
                    Xác nhận
                </button>
            </div>
        </form>


    </div>
@endsection

