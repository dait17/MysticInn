@extends('admin.layouts.DashboardLayout')

@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 min-vh-100">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6>Hop Dong</h6>

                    <div class="d-flex justify-content-end">
                        <button onclick="window.location.href='{{ route('admin.hopDong.create') }}';" type="button" class="btn btn-primary m-2">
                            <i class="fas fa-plus"> Thêm hợp đồng </i>
                        </button>
                    </div>
                    <form class="my-4">
                        <div class="container d-flex justify-content-center">
                            <div class="row g-2">
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="i_maHD" placeholder="Ma Hop Dong"
                                           title="Ma Hop Dong">
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="i_maPhong" placeholder="Ma Phong"
                                           title="Ma Phong">
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="datetime-local" name="i_ngayKy"
                                           placeholder="Ngay Ky" title="Ngay Ky">
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" type="datetime-local" name="i_ngayHetHan"
                                           placeholder="Ngay Het Han" title="Ngay Het Han">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="i_giaThue" placeholder="Gia Thue"
                                               title="Gia Thue">
                                        <span class="input-group-text">Vnđ</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-dark mx-2"><i class="fas fa-search"> Duyet </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- Start Table -->
                    <div class="d-flex flex-column">
                        <div class="table-responsive top">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã hợp đồng</th>
                                    <th scope="col">Mã phòng</th>
                                    <th scope="col">Ngày ký</th>
                                    <th scope="col">Ngày hết hạn</th>
                                    <th scope="col">Giá Thuê</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>jhon@email.com</td>
                                    <td>USA</td>
                                    <td>123</td>
                                    <td>
                                        <a href="" class="mx-2">
                                            <i class="bi bi-pencil" title="Cập nhật"></i>
                                        </a>
                                        <a href="" class="mx-2">
                                            <i class="bi bi-trash" title="Xoá"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>mark@email.com</td>
                                    <td>UK</td>
                                    <td>456</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>jacob@email.com</td>
                                    <td>AU</td>
                                    <td>789</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                        <div class="mt-auto bottom">
                            <div class="col-sm-12 col-xl-12 d-flex justify-content-center">
                                <div class="bg-light rounded h-100 p-4">
                                    <div class="btn-group" role="group">
                                        <input type="button" class="btn btn-outline-dark" value="Prev">
                                        <input type="button" class="btn btn-outline-dark" value="1">
                                        <input type="button" class="btn btn-outline-dark" value="Next">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection
