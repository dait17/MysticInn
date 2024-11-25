@extends('admin.layouts.DashboardLayout')

@section('title', 'Home Page')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Thống kê phòng</h6>
                    <canvas id="pie-chart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.onload = function() {
            var phongTrong = {{ $phongTrong }};
            var phongThue = {{ $phongThue }};

            console.log('Phong Trong:', phongTrong);
            console.log('Phong Thue:', phongThue);

            var ctx = document.getElementById('pie-chart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Phòng trống', 'Phòng đã thuê'],
                    datasets: [{
                        data: [phongTrong, phongThue],
                        backgroundColor: ['#36A2EB', '#FF6384'],
                        hoverBackgroundColor: ['#36A2EB', '#FF6384']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        };


    </script>



@endsection

