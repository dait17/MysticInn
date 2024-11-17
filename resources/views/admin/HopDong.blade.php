@extends('admin/layouts/DashboardLayout')

@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded vh-100 p-4">
                    <h6 class="mb-4">Hợp đồng</h6>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Hợp đồng còn hời hạn</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">Tất cả</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">Contact</button>
                        </div>
                    </nav>
                    <div class="tab-content pt-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="bg-light rounded h-100 p-4">
                                <!-- Start Table -->
                                <div class="table-responsive">
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




                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            Sanctus vero sit kasd sea gubergren takimata consetetur elitr elitr, consetetur sadipscing takimata ipsum dolores. Accusam duo accusam et labore ea elitr ipsum tempor sit, dolore aliquyam ipsum sit amet sit. Et dolore ipsum labore invidunt rebum. Sed dolore gubergren sanctus vero diam lorem rebum elitr, erat diam dolor clita.
                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            Sit consetetur eirmod lorem ea magna sadipscing ipsum elitr invidunt, dolores lorem erat ipsum ut aliquyam eos lorem sed. Nonumy aliquyam ea justo eos dolores dolores duo dolores. Aliquyam dolor sea dolores sit takimata no erat vero. At lorem justo tempor lorem duo, stet kasd aliquyam ipsum voluptua labore at.
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
