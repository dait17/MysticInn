@extends('user.layouts.layout')

@section('content')
    <div class="container py-2 mt-4">
        <h4 class="text-center">TThông tin</h4>

        <div class="d-flex justify-content-end my-4">
            @if(count($hd_kts)<=4)
                <button class="btn btn-success" onclick="window.location.href='{{route('info.create', $hopdong->maHopDong)}}'">
                    <i class="fa fa-plus"></i>
                    Thêm người mới
                </button>
            @endif
        </div>

        <div class="table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
                </thead>
                <?php $dd = $hopdong->khachthue?>
                <tr>
                    <td>{{$dd->hoKT.' '.$dd->tenKT}}</td>
                    <td>{{$dd->SDT}}</td>
                    <td>{{$dd->ngaySinh}}</td>
                    <td>{{$dd->xa.', '.$dd->huyen.', '.$dd->tinh}}</td>
                    <td>Chủ hợp đồng</td>
                    <td>

                    </td>
                </tr>

                @foreach($hd_kts as $hd_kt)
                    <?php $kt = $hd_kt->khachthue?>
                    <tr>
                        <td>{{$kt->hoKT.' '.$kt->tenKT}}</td>
                        <td>{{$kt->SDT}}</td>
                        <td>{{$kt->ngaySinh}}</td>
                        <td>{{$kt->xa.', '.$kt->huyen.', '.$kt->tinh}}</td>
                        <td>
                            @if($kt->daXacThuc)
                                <span class="px-2 py-1 rounded bg-light">
                                    <i class=""></i>
                                    Đã xác thực
                                </span>
                            @else
                                <span class="px-2 py-1 rounded bg-danger color-black">
                                    <i class=""></i>
                                    Chưa được xác thực
                                </span>

                            @endif
                        </td>
                        <td>
                            @if(!$kt->daXacThuc)
                                <a href="{{route('info.edit', $kt->maKT)}}" class="mr-2">
                                    <i class="fa fa-pen"></i>
                                    Cập nhật
                                </a>

                                <button onclick="setDeleteAction('{{ route('info.destroy', ['maHopDong'=>$hopdong->maHopDong, 'maKT'=>$kt->maKT]) }}')" class="rounded ml-2" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach

                <tbody>

                </tbody>
            </table>
        </div>

        <!-- Modal Xác nhận -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
             aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">
{{--                            <i class="bi bi-dash"></i>--}}
                        </button>
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

    <script>
        function setDeleteAction(actionUrl) {
            // Cập nhật action của form xóa trong modal
            document.getElementById('deleteForm').action = actionUrl;
        }
    </script>

@endsection

