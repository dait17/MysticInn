@extends('admin.layouts.DashboardLayout')

@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h4 class="mb-4">Thêm Hợp Đồng</h4>
        <form action="{{ route('admin.hopDong.store') }}" method="post">
            @csrf
            <div class="row g-4 mb-4">
                <!-- Phòng chọn -->
                <div class="col-sm-12 col-xl-4">
                    <div class="form-floating">
                        <select class="form-select" name="maPhong" id="maPhong" aria-label="Chọn phòng">
                            <option value="-1" selected>Chọn phòng</option>
                            <option value="1">105</option>
                            <option value="2">201</option>
                            <option value="3">307</option>
                        </select>
                        <label for="maPhong">Chọn phòng</label>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="giaThue" id="giaThue"
                               aria-describedby="giaThue" readonly>
                        <label for="giaThue">Giá Thuê</label>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="tienCoc" id="tienCoc"
                               aria-describedby="tienCoc">
                        <label for="tienCoc">Tiền Cọc</label>
                    </div>
                </div>

                <!-- Khách thuê, email và nút thêm -->

            </div>

            <!-- Ngày ký và ngày hết hạn -->
            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="ngayKy" id="ngayKy"
                               aria-describedby="ngayKy">
                        <label for="ngayKy">Ngày Ký</label>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="ngayHH" id="ngayHH"
                               aria-describedby="ngayHH">
                        <label for="ngayHH">Ngày Hết Hạn</label>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-sm-8 col-xl-8">
                    <div class="form-floating">
                        <select class="form-select" name="maKhachThue" id="maKhachThue"
                                aria-label="Chọn khách thuê">
                            <option value="-1" selected>Chọn khách thuê</option>
                            @foreach($khachThues as $kt)
                                <option value="{{$kt->maKhachThue}}">{{$kt->hoKT . ' ' . $kt->tenKT}}</option>
                            @endforeach

{{--                            <option value="2">Võ Tấn Phong</option>--}}
{{--                            <option value="3">Trần Mạnh Hoàng</option>--}}
                        </select>
                        <label for="maKhachThue">Khách thuê</label>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-4 d-flex align-items-center">
                    <button title="Thêm Khách Mới" type="button"
                            class="btn btn-lg btn-lg-square btn-primary m-2"><i class="fa fa-user-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row g-2 mt-3">
                <div class="col-sm-12 col-xl-8">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="Email khách" aria-label="Email khách">
                        <label for="email">Email Khách</label>
                    </div>
                </div>
            </div>

            <!-- Chon Dichh Vu -->
            <div class="row mb-4">
                <div class="pt-4">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="true" aria-controls="flush-collapseOne">
                                    Dich vụ
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit. Et dolore at erat amet et diam labore lorem dolores. Erat amet stet at dolore dolor ea invidunt, justo nonumy justo takimata magna. Stet lorem vero sed eos justo diam dolores, dolor sit takimata et voluptua aliquyam gubergren tempor.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Nội thất
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam amet no invidunt invidunt et consetetur, magna ut nonumy kasd erat tempor dolor et. Diam magna dolor sed amet duo dolores magna vero. Amet sit sadipscing ea diam clita lorem sit. Vero et et et tempor diam. Ipsum eirmod sit.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nút thực hiện -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">Thực Hiện</button>
            </div>
        </form>
    </div>


    <!-- Table End -->
@endsection
