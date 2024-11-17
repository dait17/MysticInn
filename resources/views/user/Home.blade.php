@extends('user.layouts.layout')

@section('title', 'Home Page')

@section('content')
{{--  HTML Phần Home ở đây  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .card {
            border: none;
            font-size: 16px;
        }
        .content-box {
            width: 50%;
            margin: 150px 0 0 135px ;
            background-color: #ffffff;
            text-align: center;
        }

        .content-box h3 {
            text-transform: none;
            font-size: 27px;
            margin-bottom: 15px;
        }

        .content-box p {
            text-align: center;
            color: #555555;
            font-size: 15px;
            line-height: 1.5;
            text-align: justify;
        }

        .card-body .btn{
            color: black;
            background: white;
            border: 1px solid black;
        }

        .card-text{
            letter-spacing: 1px;
        }
        .sp-list .card {
            text-align: center;
            display: inline-flex;
            box-sizing: border-box;
            border-top: none;
        }

        .sp-list .card i {
            color: rgba(102,102,102,.85);
            font-size: 14px;
        }
        .sp-list > .card:hover {
            transition: box-shadow 0.3s ease-in-out;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            color: rgba(102,102,102,.85);
        }

        .sp-list .card .btn{
            border: 2px solid #000000;
        }

        .sp-list .card .btn:hover{
            background-color: black;
            color: white;
        }
        .main3 div{
            width: 32%;
        }
    </style>
</head>
<body>
    <div style="width: 100%; display: flex; text-align:center; justify-content: center; gap: 2rem; margin-top: 70px;">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('Images/tinhte.jpg') }}" class="card-img-top" alt="">
            <div class="card-body">
                <p class="card-text"><b>Tinh tế</b></p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text"><b>Trẻ trung</b></p>
            </div>
            <img src="{{ asset('Images/tretrung.jpg') }}" class="card-img-top" alt="">
        </div>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('Images/thanhthoat.jpg') }}" class="card-img-top" alt="">
            <div class="card-body">
                <p class="card-text"><b>Thanh thoát</b></p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text"><b>Ấm cúng</b></p>
            </div>
            <img src="{{ asset('Images/amcung.png') }}" class="card-img-top" alt="">
        </div>
    </div>
    <div style="width: 100%; display: flex; gap: 2.3rem; align-items: center;">
        <div class="content-box">
            <h3 style="text-align: justify">Sự tươi mới qua từng góc nhìn</h3>
            <hr style="width: 25%;">
            <p>
                Các căn phòng trong tòa nhà của chúng tôi được thiết kế để mang đến một không gian sống hiện đại, tiện nghi và thoải mái nhất.
            </p>
            <p>
                Chúng tôi tin rằng, sự tươi mới không chỉ đến từ không gian mà còn từ cách bạn cảm nhận sự thoải mái và yên bình trong chính căn phòng của mình.
            </p>
        </div>
        <div style="margin: 150px 0 0 0; ">
            <img src="{{ asset('Images/main21.jpg') }}" style="width:350px; height: 350px;" alt="">
        </div>
        <div style="margin: 150px 135px 0 0; ">
            <img src="{{ asset('Images/main22.jpg') }}" style="width:350px; height: 350px;" alt="">
        </div>
    </div>
    <div style="width: 100%; margin: 150px 0 0 0;">
        <h3 style="text-align: center; text-transform: none; font-size:31px; margin-bottom: 20px;">Các căn phòng còn trống</h3>
        <div style="display: flex; justify-content: center; align-items: center; gap: 2rem; flex-wrap: wrap;">
            <!-- random 4 căn phòng bất kì -->
            <div class="sp-list">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('Images/tinhte.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Tên phòng</h5>
                        <p class="card-text">Giá tiền</p>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="sp-list">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('Images/tinhte.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Tên phòng</h5>
                        <p class="card-text">Giá tiền</p>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="sp-list">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('Images/tinhte.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Tên phòng</h5>
                        <p class="card-text">Giá tiền</p>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="sp-list">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('Images/tinhte.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Tên phòng</h5>
                        <p class="card-text">Giá tiền</p>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 400px; margin-top: 150px; background: rgb(184, 146, 106); color: white;">
        <h3 style="text-align: center; text-transform: none; font-size:31px; padding-top:70px; padding-bottom:20px; ">Tại sao nên chọn chúng tôi</h3>
        <div style="display: flex; justify-content: center; gap: 2rem; margin: 0 140px" class="main3">
            <div>
                <hr style="padding: 0; margin: 0 0 10px 0; width: 26%; height: 1.5px;">
                <p style="font-size: 20px;"><b>Mẫu phòng đa dạng, độc đáo</b></p>
                <p style="font-size: 14px; text-align: justify;">Căn phòng bên chúng tôi không chỉ là sự kết hợp hoàn hảo giữa sự tiện nghi và thẩm mỹ, mà còn mang đậm dấu ấn cá nhân và sự độc đáo. Mỗi căn phòng đều được thiết kế sao cho khách hàng có thể dễ dàng cảm nhận được không gian sống thoải mái và lựa chọn những tiện ích phù hợp với sở thích và nhu cầu của riêng mình.</p>
            </div>
            <div>
                <hr style="padding: 0; margin: 0 0 10px 0; width: 26%; height: 1.5px;">
                <p style="font-size: 20px;"><b>Chất lượng vượt trội</b></p>
                <p style="font-size: 14px; text-align: justify;">Để đảm bảo chất lượng không gian sống, chúng tôi sử dụng những sản phẩm nội thất cao cấp và áp dụng quy trình thiết kế tỉ mỉ, từ việc lựa chọn nguyên vật liệu cho đến hoàn thiện từng chi tiết căn phòng. Điều này đảm bảo rằng khách hàng sẽ có một không gian sống chất lượng, bền đẹp và đáng tin cậy.</p>
            </div>
            <div>
            <hr style="padding: 0; margin: 0 0 10px 0; width: 26%; height: 1.5px;">
                <p style="font-size: 20px;"><b>Chăm sóc khách hàng tận tâm</b></p>
                <p style="font-size: 14px; text-align: justify;">Đội ngũ nhân viên được trainning kỹ càng về từng phòng của từng khu vực, luôn sẵn lòng lắng nghe và tư vấn khách hàng trong từng lựa chọn. Chúng tôi cam kết mang đến trải nghiệm tìm kiếm và thuê phòng dễ dàng, thoải mái, và hài lòng.</p>
            </div>
        </div>
    </div>
    <div style="width: 100%; margin-top: 80px; margin-bottom: 150px;">
        <h3 style="text-align: center; text-transform: none; font-size:31px; padding-top:70px; "><b>#ChiaSẻKhôngGianSống</b></h3>
        <p style="text-align: center; text-transform: none; font-size:17px; padding-top:px; padding-bottom:10px; ">Chia sẻ trải nghiệm của bạn với sản phẩm của chúng tôi thông qua Instagram cùng hashtag trên nhé!</p>
        <div style="display: flex; gap: 2rem; margin: 0 140px 0 140px;">
            <img src="{{ asset('Images/main31.jpg') }}" style="width:300px; height: 300px;" alt="">
            <img src="{{ asset('Images/main32.jpg') }}" style="width:300px; height: 300px;" alt="">
            <img src="{{ asset('Images/main33.jpg') }}" style="width:300px; height: 300px;" alt="">
            <img src="{{ asset('Images/main34.jpg') }}" style="width:300px; height: 300px;" alt="">
        </div>
    </div>
</body>
</html>

@endsection
