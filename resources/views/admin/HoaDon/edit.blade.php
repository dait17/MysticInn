@extends('admin.layouts.DashboardLayout')


@section('content')

    <div class="container-fluid py-4 mt-2">
        <h5 class="text-center">Cập nhật hoá đơn phòng {{$hoadon->hopdong->phong->tenPhong}} tháng {{$hoadon->thang}} năm {{$hoadon->nam}}</h5>

        <div class="d-flex justify-content-between py-2 my-2">
            <button class="btn btn-dark" onclick="window.location.href='{{route('admin.hoadon.index')}}'">
                <i class="bi bi-arrow-left"></i>
                Quay lại
            </button>
        </div>
        <form action="{{route('admin.hoadon.update', $hoadon->maHoaDon)}}" method="post">
            @csrf
            @method('PUT') <!-- Thông báo Laravel đây là yêu cầu PUT -->
            <input type="hidden" name="maHopDong" value="{{$hoadon->maHopDong}}">
            <input type="hidden" name="thang" value="{{$hoadon->thang}}">
            <input type="hidden" name="nam" value="{{$hoadon->nam}}">
            <div class="d-flex justify-content-center">
                <div class="bg-light rounded p-4">
                    <div class="d-flex justify-content-end">
                        <div class="p-2">
                            <input id="ttHoaDon" type="checkbox" name="trangThai" value="1" {{$hoadon->trangThai?'checked':''}}>
                            <label for="ttHoaDon"> Đã thanh toán </label>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li><strong>Tiền phòng:</strong> {{number_format($hoadon->hopdong->giaThue, '0', '.', ',')}}</li>
                        @foreach($thanhtoan_dvs as $tt)
                                <?php $dv = $tt->dangkydv->dichvu ?>
                            @if($dv->dvThang)
                                <li>
                                    <strong>{{$dv->tenDV. ':'}}</strong> {{number_format($dv->giaDV, '0', '.', ',')}}
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
                            @foreach($thanhtoan_dvs as $tt)
                                    <?php $dv = $tt->dangkydv->dichvu ?>
                                @if(!$dv->dvThang)
                                    <tr>
                                        <td scope="row"><strong>{{$dv->tenDV.': '}}</strong></td>
                                        <td>
                                            <input type="number" id="sd_{{$tt->maDKDV}}"
                                                   name="sddv_sd[{{ $tt->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{ $sudungs[$tt->maDKDV]['soDau'] }}">
                                        </td>
                                        <td>
                                            <input type="number" id="sc_{{$tt->maDKDV}}"
                                                   name="sddv_sc[{{ $tt->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{ $sudungs[$tt->maDKDV]['soCuoi'] }}">
                                        </td>
                                        <td>
                                            <input type="number" id="ssd_{{$tt->maDKDV}}"
                                                   name="sddv_ssd[{{ $tt->maDKDV }}][giaTri]" class="form-control"
                                                   value="{{$tt->soSuDung}}"
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
