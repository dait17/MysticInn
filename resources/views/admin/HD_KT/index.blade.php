@extends('admin.layouts.DashboardLayout')

@section('content')

    <div class="container-fluid pt-4 mt-2">
        <div class="">
            <h5 class="text-center">Thông tin khách thuê của hợp đồng Số {{$hopdong->maHopDong}}</h5>
        </div>

        <div class="d-flex justify-content-between p-2 mb-2">
            <button onclick="window.location.href='{{route('admin.hopdong.show', $hopdong->maHopDong)}}'"
                    class="btn btn-dark"><i class="bi bi-arrow-left"></i> Quay lại
            </button>

            <!-- Nút để mở Modal -->
            <button type="button" class="btn btn-success btn-square" data-bs-toggle="modal"
                    data-bs-target="#addUserModal">
                <i class="bi bi-person-plus"></i>

            </button>
        </div>

        <div>
            <div class="table table-borderless">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày vào ở</th>
                        <th scope="col">Ngày rời đi</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php $dd = $hopdong->khachthue ?>
                        <td>1</td>
                        <td>{{$dd->hoKT.' '.$dd->tenKT}}</td>
                        <td>{{$dd->SDT}}</td>
                        <td>{{$hopdong->ngayKy}}</td>
                        <td>{{$hopdong->ngayKetThuc??'Còn cư trú'}}</td>
                        <td>
                            <div title="Chủ hợp đồng" class="px-2">
                                <i class="bi bi-person-fill"></i>
                            </div>
{{--                            <button class="btn btn-dark btn-sm-square" title="Thay đổi người đại diện hợp đồng"--}}
{{--                                    type="button" data-bs-toggle="modal"--}}
{{--                                    data-bs-target="#changeDDModal">--}}
{{--                                <i class="bi bi-person-lines-fill"></i>--}}
{{--                            </button>--}}
                        </td>
                    </tr>
                    <?php $i = 2 ?>
                    @foreach($hd_kts as $hd_kt)
                            <?php $kt = $hd_kt->khachthue; ?>
                        <tr>

                            <td>{{$i++}}</td>
                            <td>{{$kt->hoKT.' '.$kt->tenKT}}</td>
                            <td>{{$kt->SDT}}</td>
                            <td>{{$hd_kt->ngayVao}}</td>
                            <td>{{$hd_kt->ngayRoiDi?$hd_kt->ngayRoiDi:'Còn cư trú'}}</td>
                            <td>
                                <button class="btn btn-danger btn-sm mx-2" title="Cập nhật"
                                        onclick="window.location.href='{{route('admin.hd_kt.edit', ['maHopDong'=>$hopdong->maHopDong, 'maKT'=>$kt->maKT])}}'">
                                    <i class="bi bi-pencil"></i>

                                </button>
                                <button class="btn btn-danger btn-sm mx-2" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        onclick="setDeleteAction('{{ route('admin.hd_kt.destroy', ['maHopDong'=>$hopdong->maHopDong, 'maKT'=>$kt->maKT]) }}')">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </td>
                            @endforeach


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

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

        <!-- Modal add -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Thêm Người Dùng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm"
                              action="{{route('admin.hd_kt.store', ['maHopDong'=>$hopdong->maHopDong])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="selectUser" class="form-label">Chọn Người Dùng</label>
                                <!-- Trường select với chức năng tìm kiếm -->
                                <select id="selectUser" class="form-select" name="user" style="width: 100%;">
                                    <!-- Tùy chọn sẽ được tải từ server -->
                                    @foreach($khachthues as $khach)
                                        <option
                                            value="{{$khach->maKT}}">{{$khach->hoKT.' '.$khach->tenKT.' - '.$khach->SDT}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" name="ngayVao" id="ngayVao"
                                           aria-describedby="ngayVao">
                                    <label for="ngayVao">Ngày vào ở <span>*</span></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" form="addUserForm">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal add -->


    </div>

    <script>
        function setDeleteAction(actionUrl) {
            // Cập nhật action của form xóa trong modal
            document.getElementById('deleteForm').action = actionUrl;
        }
    </script>

    <script>
        function setDefaultDate(elementId) {
            const ngayVao = document.getElementById(elementId);
            const now = new Date();

            // Chuyển ngày hiện tại sang định dạng YYYY-MM-DDTHH:MM
            const formattedDate = now.toISOString().slice(0, 16);

            // Gán giá trị mặc định
            ngayVao.value = formattedDate;
        }

        setDefaultDate('ngayVao')
        setDefaultDate('ngayVaoC')

    </script>

@endsection
