@extends('user.layouts.layout')

@section('content')

    <div class="container p-4 mt-4">
        <h6 class="text-center">Thêm khách thuê</h6>

        <button class="btn" onclick="window.location.href='{{route('info', Auth::user()->id)}}'">
            <i class=""></i>
            Quay lại
        </button>

        <form action="{{route('info.store', $maHopDong)}}" method="post">
            @csrf
            <div class="py-4">
                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="hoKT">Họ:</label>
                            <input class="form-control" type="text" name="hoKT" id="hoKT" value="{{ old('hoKT') }}">
                            @error('hoKT')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="tenKT">Tên:</label>
                            <input class="form-control" type="text" name="tenKT" id="tenKT" value="{{ old('tenKT') }}">
                            @error('tenKT')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="ngaySinh">Ngày sinh:</label>
                            <input class="form-control" type="datetime-local" name="ngaySinh" value="{{ old('ngaySinh') }}">
                            @error('ngaySinh')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="SDT">Số điện thoại:</label>
                            <input class="form-control" type="text" name="SDT" value="{{ old('SDT') }}">
                            @error('SDT')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <span>Giới tính:</span><br>
                            <span class="py-3">
                                <span class="ml-4 mr-4">
                                    <input class="" type="radio" name="gioiTinh" id="gt_nam" value="1" {{ (old('gioiTinh') == '1' || !old('gioiTinh')) ? 'checked' : '' }}>
                                    <label for="gt_nam">Nam</label>
                                </span>
                            </span>
                            <span class="ml-4 mr-4">
                                <span>
                                    <input type="radio" id="gt_nu" name="gioiTinh" value="0" {{ old('gioiTinh') == '0' ? 'checked' : '' }}>
                                    <label for="gt_nu">Nu</label>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="CCCD">CCCD:</label>
                            <input class="form-control" type="text" name="CCCD" value="{{ old('CCCD') }}">
                            @error('CCCD')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="tinh">Tỉnh:</label>
                            <input class="form-control" type="text" name="tinh" id="tinh" value="{{ old('tinh') }}">
                            @error('tinh')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="huyen">Huyện:</label>
                            <input class="form-control" type="text" name="huyen" id="huyen" value="{{ old('huyen') }}">
                            @error('huyen')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="xa">Xã:</label>
                            <input class="form-control" type="text" name="xa" id="xa" value="{{ old('xa') }}">
                            @error('xa')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-success" type="submit">
                    Thêm
                </button>
            </div>
        </form>


    </div>

@endsection
