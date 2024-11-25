@extends('user.layouts.layout')

@section('title', 'Home Page')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .all {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-start;
            margin: 50px 100px 0 150px;
        }
        .card .tt{
            display: flex;
            justify-content: center;;
        }
        
        .sp-list {
            flex: 0 0 calc(25% - 10px);
            box-sizing: border-box;
        }
        .sp-list .card img {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            display: block;
            box-sizing: border-box;
        }
        .sp-list .card {
            border: 1px solid #ddd;
            border-top: none;
            box-sizing: border-box;
            text-align: center;
            background-color: #fff;
            transition: box-shadow 0.3s ease-in-out;
        }

        .sp-list > .card:hover {
            transition: box-shadow 0.3s ease-in-out;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            color: rgba(102,102,102,.85);
        }

        .sp-list .card .btn{
            border: 2px solid #000000;
            margin-bottom: 5px;
        }

        .sp-list .card .btn:hover{
            background-color: black;
            color: white;
        }

        .filter-container {
            position: relative;
            border: 1px solid #333;
            border-radius: 15px;
            padding: 0px 20px;
            display: block;
            width: fit-content;
            box-sizing: border-box;
            margin: 50px auto;
        }

        .filter-header {
            position: absolute;
            top: -18px;
            left: 20px;
            background-color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: none;
        }

        .filter-content {
            margin-top: 25px;
        }
        .tenphong{
            border-radius: 10px;
            border: 2px solid #ddd;
            line-height: 35px;
        }
        .tenphong input{
            margin: 0 10px;
            width: 90%;
            border: none;
        }
        .tenphong input:focus{
            outline: none;
        }
        .reset-button {
            position: absolute;
            bottom: -18px;
            right: 20px;
            background-color: #fff;
            padding: 5px 15px;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 1px;;
            color: #0194F3;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: none;
        }
        .reset-button:hover {
            color: rgb(2, 100, 200);;
        }
        .btn {
            padding: 5px 12px;
            font-size: 12px;
        }
        .sparkle {
            position: relative;
            display: inline-block;
            font-weight: bold;
            color: #000;
            background: linear-gradient(45deg, red, red, orange, orange,yellow,yellow);
            background-size: 400% 400%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: shimmer 2.5s infinite linear;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.8), 0 0 12px rgba(255, 215, 0, 0.6);
        }

        .sparkle::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0) 60%);
            transform: translate(-50%, -50%) scale(1);
            animation: glow 1.5s infinite alternate;
            pointer-events: none; /* Không ảnh hưởng đến thao tác chuột */
            z-index: -1;
        }

        @keyframes shimmer {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        @keyframes glow {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.8;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.3);
                opacity: 0.4;
            }
        }
    </style>
</head>
<body>
    <div class="filter-container">
        <div class="filter-header">Bộ lọc</div>
        <div class="filter-content">
            <table>
                <tr>
                    <td style="padding-bottom: 4px;">Trạng thái: </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ttphong" id="paidStatus" value="set">
                            <label class="form-check-label" for="paidStatus">
                                Còn trống
                            </label>
                        </div>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="ttphong" id="unpaidStatus" value="unset">
                            <label class="form-check-label" for="unpaidStatus">
                                Đã cho thuê
                            </label>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td style="padding-bottom: 4px;">Sắp xếp giá: </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ttgia" id="paidStatus" value="set">
                            <label class="form-check-label" for="paidStatus">
                                Thấp đến cao
                            </label>
                        </div>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="ttgia" id="unpaidStatus" value="unset">
                            <label class="form-check-label" for="unpaidStatus">
                                Cao đến thấp
                            </label>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td>Tên phòng:</td>
                    <td></td>
                    <td colspan="4">
                        <div class="tenphong">
                            <input type="text" id="roomName">
                        </div>
                    </td>
                </tr>
                <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
            </table>
        </div>
        <div class="reset-button" onclick="resetFilters()">Đặt lại</div>
    </div>
    <div class="all">
        @foreach ($phongs as $p)
            <div class="sp-list">
                <div class="card" style="width: 18rem;">
                    <img  src="{{ asset('Images/anhPhong/'.$p->anhDD) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Phòng: {{$p->tenPhong}}</h5>
                        <p class="card-text">Diện tích: {{$p->dienTich}} mét vuông</p>
                        <p class="card-text">Giá thuê: {{number_format($p->giaPhong, 0) }} vnđ</p>
                        <div class="tt">
                            <p class="card-text">Trạng thái:&nbsp;</p>
                            @if ($p->trangThai === 0)
                                <p class="card-text sparkle">Còn trống</p>
                            @else
                                <b style="color: lightcoral" class="card-text">Đã cho thuê</b>
                            @endif
                        </div>
                        <a href="{{route('roomdetail',$p->maPhong)}}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const statusElements = document.querySelectorAll(".card-text:nth-child(2)");
    statusElements.forEach((element) => {
        if (element.textContent.includes("Còn phòng")) {
            element.classList.add("sparkle");
        }
    });
});


function resetFilters() {
    const phong = document.querySelectorAll('input[name="ttphong"]');
    phong.forEach(radio => radio.checked = false);
    const gia = document.querySelectorAll('input[name="ttgia"]');
    gia.forEach(radio => radio.checked = false);
    document.getElementById("roomName").value = "";

    let url = 'phong?';
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(response => response.text())
    .then(html => {
        const allDiv = document.querySelector('.all');
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        const newContent = tempDiv.querySelector('.all');
        if (newContent) {
            allDiv.innerHTML = newContent.innerHTML;
        }
    })
    .catch(error => console.error('Error:', error));
}


const roomNameInput = document.getElementById('roomName');
const phongs = document.querySelectorAll('input[name="ttphong"]');
const gias = document.querySelectorAll('input[name="ttgia"]');
let debounceTimer;

// Hàm gửi dữ liệu
function sendData() {
    const roomName = roomNameInput.value;
    const phong = document.querySelector('input[name="ttphong"]:checked') ? document.querySelector('input[name="ttphong"]:checked').value : '';
    const gia = document.querySelector('input[name="ttgia"]:checked') ? document.querySelector('input[name="ttgia"]:checked').value : '';
    // Xây dựng URL với các tham số
    let url = 'phong?';
    if (phong) {
        url += 'phong=' + phong + '&';
    }
    if (gia) {
        url += 'gia=' + gia + '&';
    }
    if (roomName) {
        url += 'roomName=' + encodeURIComponent(roomName);
    }

    // Gửi dữ liệu qua fetch
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(response => response.text())
    .then(html => {
        const allDiv = document.querySelector('.all');
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;

        // Lấy các phần tử mới từ nội dung HTML trả về
        const newContent = tempDiv.querySelector('.all');
        if (newContent) {
            allDiv.innerHTML = newContent.innerHTML; // Ghi đè nội dung cũ
        }
    })
    .catch(error => console.error('Error:', error));
}

    roomNameInput.addEventListener('input', () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(sendData, 300);
    });

    phongs.forEach(radio => {
            radio.addEventListener('change', sendData);
        });
    gias.forEach(radio => {
        radio.addEventListener('change', sendData);
    });
</script>
@endsection
