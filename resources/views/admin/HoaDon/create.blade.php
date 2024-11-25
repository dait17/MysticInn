@extends('admin.layouts.DashboardLayout')


@section('content')

    <div class="container-fluid py-4 mt-2">
        <h5 class="text-center">Tạo hoá đơn phòng {{$hopdong->phong->tenPhong}} tháng {{$thang}} năm {{$nam}}</h5>

        <div class="d-flex justify-content-between py-2 my-2">
            <button class="btn btn-dark" onclick="window.location.href='{{route('admin.hoadon.index')}}'">
                Quay lai
            </button>
        </div>
        <form action="{{route('admin.hoadon.store')}}" method="post">
            @csrf
            <input type="hidden" name="maHopDong" value="{{$hopdong->maHopDong}}">
            <input type="hidden" name="thang" value="{{$thang}}">
            <input type="hidden" name="nam" value="{{$nam}}">
            <div class="d-flex justify-content-center">
                <div class="bg-light rounded p-4">
                    <ul class="list-unstyled">
                        <li><strong>Tiền phòng:</strong> {{number_format($hopdong->giaThue, '0', '.', ',')}}</li>
                        @foreach($dkdvs as $dk)
                                <?php $dv = $dk->dichvu ?>
                            @if($dv->dvThang)
                                <li>
                                    <strong>{{$dk->dichvu->tenDV. ':'}}</strong> {{number_format($dk->dichvu->giaDV, '0', '.', ',')}}
                                </li>

                            @endif
                        @endforeach
                    </ul>
                    <div class="table-borderless">
                        <table class="table-borderless">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Số đầu</th>
                                <th scope="col">Số cuối</th>
                                <th scope="col">Số sử dụng</th>
                                <th scope="col">Đơn giá</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($dkdvs as $dk)
                                    <?php $dv = $dk->dichvu ?>
                                @if(!$dv->dvThang)
                                    <tr>
                                        <td scope="row"><strong>{{$dv->tenDV.': '}}</strong></td>
                                        <td>
                                            <input type="number" id="sd_{{$dk->maDKDV}}"
                                                   name="sddv_sd[{{ $dk->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{ old('noithat.' . $dk->maDKDV . '.giaTri', $dk->giaTri ?? 0) }}">
                                        </td>
                                        <td>
                                            <input type="number" id="sc_{{$dk->maDKDV}}"
                                                   name="sddv_sc[{{ $dk->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{ old('noithat.' . $dk->maDKDV . '.giaTri', $dk->giaTri ?? 0) }}">
                                        </td>
                                        <td>
                                            <input type="number" id="ssd_{{$dk->maDKDV}}"
                                                   name="sddv_ssd[{{ $dk->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{ old('noithat.' . $dk->maDKDV . '.giaTri', $dk->giaTri ?? 0) }}"
                                                    readonly >
                                        </td>
                                        <td>x{{number_format($dv->giaDV, '0', '.', ',')}}</td>
                                    </tr>

                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    // Lắng nghe sự kiện 'input' trên tất cả các ô input có id bắt đầu bằng 'sd' và 'sc'
                    document.querySelectorAll('input[id^="sd_"], input[id^="sc_"]').forEach(input => {
                        input.addEventListener('input', function () {
                            // Lấy id hiện tại của ô input (sd hoặc sc)
                            const id = this.id;

                            // Xác định mã Dịch Vụ từ id
                            const maDKDV = id.split('_')[1];

                            // Lấy giá trị từ các ô input tương ứng
                            const sdValue = parseFloat(document.getElementById(`sd_${maDKDV}`).value) || 0;
                            const scValue = parseFloat(document.getElementById(`sc_${maDKDV}`).value) || 0;

                            // Cập nhật giá trị tại ô ssd
                            const ssdInput = document.getElementById(`ssd_${maDKDV}`);
                            if (ssdInput) {
                                ssdInput.value = scValue - sdValue; // Tính toán giá trị
                            }
                        });
                    });
                </script>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success" type="submit">
                    Thực hiện
                </button>
            </div>
        </form>


    </div>

@endsection
