@extends('admin.layouts.DashboardLayout')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-4 mb-2">
        <div class="p-2 mt-4">
            <h5 class="text-center">Xác Nhận Nội Thất Phòng {{$tenphong}}</h5>
            <h5 class="text-center">Hợp Đồng {{$maHopDong}}</h5>
        </div>
        <form action="{{route('admin.hopdong.xacnhannt')}}" method="post">
            @csrf
            <input type="hidden" name="maHopDong" value="{{$maHopDong}}">
            <div class="m-4">
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                        <tr class="text-dark">
                            <th scope="col">Ten Noi That</th>
                            <th scope="col">Trang Thai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($noithats as $nt)
                            <tr>
                                <td>{{$nt->noithat->tenNT}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="noithat[{{ $nt->maNT }}][trangThai]"
                                                id="trangThaiMoi_{{ $loop->index }}"
                                                value="Mới"
                                                required
                                                checked>
                                            <label class="form-check-label"
                                                   for="trangThaiMoi_{{ $loop->index }}">Mới</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="noithat[{{ $nt->maNT }}][trangThai]"
                                                id="trangThaiCu_{{ $loop->index }}"
                                                value="Cũ"
                                                required>
                                            <label class="form-check-label"
                                                   for="trangThaiCu_{{ $loop->index }}">Cũ</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary">
                    <i class="bi bi-check"></i>
                    Xác Nhận
                </button>
            </div>
        </form>

    </div>

@endsection
