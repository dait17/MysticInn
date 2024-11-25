@extends('admin.layouts.DashboardLayout')

@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="d-flex flex-column justify-content-between h-75">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12 ">
                    <h3 class="text-center">Hợp Đồng</h3>

                    <div class="d-flex justify-content-end">
                        <button onclick="window.location.href='{{ route('admin.hopdong.create') }}';" type="button"
                                class="btn btn-primary m-2">
                            <i class="fas fa-plus"> Thêm hợp đồng </i>
                        </button>
                    </div>
                    <!-- Search -->
                    <form class="my-4" action="{{route('admin.hopdong.index')}}" method="get">
                        <div class="container py-4 rounded bg-light">
                            <div class="row g-4">
                                <div class="col-sm-12 col-xl-2">
                                    <input class="form-control" type="text" name="i_maHopDong" placeholder="Mã hợp đồng"
                                           title="Mã hợp đồng">
                                </div>
                                <div class="col-sm-12 col-xl-2">
                                    <input class="form-control" type="text" name="i_tenPhong" placeholder="Tên phòng"
                                           title="Tên phòng">
                                </div>
                                <div class="col-sm-12 col-xl-3">
                                    <input class="form-control" type="date" name="i_ngayKy"
                                           placeholder="Ngày ký" title="Ngày ký">
                                </div>

                                <div class="col-sm-12 col-xl-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="i_giaThue" placeholder="Giá thuê"
                                               title="Giá thuê">
                                        <span class="input-group-text">Vnđ</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xl-2">
                                    <button type="submit" class="btn btn-dark mx-2"><i class="fas fa-search"> Duyệt </i>
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
                                    <th scope="col">Tên phòng</th>
                                    <th scope="col">Ngày ký</th>
                                    <th scope="col">Ngày hết hạn</th>
                                    <th scope="col">Ngày trả phòng</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($hopdongs as $hopdong)
                                    <tr>

                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$hopdong->maHopDong}}</td>
                                        <td>{{$hopdong->phong->tenPhong}}</td>
                                        <td>{{$hopdong->ngayKy}}</td>
                                        <td>{{!$hopdong->ngayHetHan?'Không thời hạn':$hopdong->ngayHetHan}}</td>
                                        <td>{{$hopdong->ngayKetThuc??'Còn cư trú'}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                    onclick="window.location.href='{{route('admin.hopdong.show', $hopdong->maHopDong)}}'">
                                                <i class="bi bi-info-circle"></i></button>
                                            <span class="mx-2"></span>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal"
                                                    onclick="setDeleteAction('{{ route('admin.hopdong.destroy', $hopdong->maHopDong) }}')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table>
                            <!-- Modal Xác nhận -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                 aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa bản ghi này? Hành động này không thể hoàn tác.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <form id="deleteForm" method="POST" action="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="mt-4">--}}
                        {{--                            {{ $hopdongs->links('pagination::bootstrap-5') }}--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="mt-4 py-2">
                {{ $hopdongs->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
    <!-- Table End -->

    <script>
        function setDeleteAction(actionUrl) {
            // Cập nhật action của form xóa trong modal
            document.getElementById('deleteForm').action = actionUrl;
        }
    </script>

@endsection
