@extends('admin.layouts.DashboardLayout')
@section('content')
{{--  HTML Phần Home ở đây  --}}
<style>
    #main-image {
        width: 640px;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }


    .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    }
    .content-1 {
        display: flex;
        gap: 20px;
    }

    .slideshow {
        position: relative;
        width: 100%;
        text-align: center;
    }

    .slideshow img {
        width: 100%;
        border-radius: 10px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .slideshow .prev, .slideshow .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: 2px solid transparent;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .slideshow .prev:hover, .slideshow .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        border-color: #37cfa2;
    }

    .slideshow .prev {
        left: 10px;
    }

    .slideshow .next {
        right: 10px;
    }

    .thumbnails {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .thumbnails img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        cursor: pointer;
        object-fit: cover;
        border: 2px solid transparent;
        transition: border-color 0.3s;
    }

    .thumbnails img:hover {
        border-color: #37cfa2;
    }

    .thumbnails img.active {
        transform: scale(1.1);
        border-color: #37cfa2;
        opacity: 1;
        border-color: #37cfa2;
    }

    .details {
        flex: 2;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .details h2 {
        margin-top: 0;
        color: #37cfa2;
    }

    .contact {
        background-color: #21685c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact:hover {
        background-color: #57c0ae;
    }
    .similar-posts {
        margin-top: 40px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .similar-posts h2 {
        font-size: 20px;
        margin-bottom: 20px;
        color: #37cfa2;
    }

    .posts-container {
        display: flex;
        gap: 15px;
        overflow-x: auto;
    }

    .post {
        flex: 0 0 200px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        padding: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .post img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
        
    }

    .post .title {
        font-size: 14px;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .post .status {
        font-size: 13px;
        color: #555;
        margin-bottom: 10px;
    }

    .post .price {
        font-size: 14px;
        color: red;
        font-weight: bold;
    }

    .view-more {
        display: block;
        margin: 20px auto 0;
        background-color: #21685c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .view-more:hover {
        background-color: #57c0ae;
    }
</style>
    <div class="container">
        <header class="header">
            <h1>Phòng {{$phong->tenPhong}}</h1>
            <p>{{$phong->dienTich}}m², {{$phong->giaPhong}} triệu/tháng</p>
        </header>

        <div class="content-1">
            <div class="images">
                <div class="slideshow">
                    <button class="prev" onclick="prevSlide()">&#10094;</button>
                    <img id="main-image" src="{{ asset('admin_assets/img_phong/' . $anhPhong[1]->duongDan) }}" alt="Ảnh lớn">
                    <button class="next" onclick="nextSlide()">&#10095;</button>
                </div>
                <div class="thumbnails">
                    @foreach ($anhPhong as $anh)
                        
                    <img src="{{ asset('admin_assets/img_phong/' . $anh->duongDan) }}" alt="Phòng trọ" onclick="changeSlide()">
                    @endforeach
                </div>
            </div>

            <div class="details">
                <h2>Thông tin mô tả</h2>
                <p>
                    {{$phong->ghiChu}}
                </p>
                <p><strong>Giá:</strong> {{$phong->giaPhong}} triệu/tháng</p>
                <p><strong>Diện tích:</strong> {{$phong->dienTich}}m²</p>
                <p><strong>Tình trạng:</strong> 
                    @if ($phong->trangThai == 0)
                        Đã thuê
                    @elseif ($phong->trangThai == 1)
                        Còn trống
                    @else
                        Đang sửa chữa
                    @endif
                </p>
            </div>
        </div>

        <div class="similar-posts">
            <h2>Có thể bạn quan tâm</h2>
            <div class="posts-container">
                @foreach ($take_5_phong as $p)
                    <div class="post" onclick="window.location.href='{{ url('admin/phong',$p->maPhong) }}'">
                        <img src="{{ asset('Images/' . $p->anhDD) }}" class = "w-300" alt="Phòng trọ 1">
                        <p class="title">{{$p->tenPhong}}</p>
                        <p class="status">{{$p->ghiChu}}</p>
                        <p class="price">{{$p->giaPhong}} triệu/tháng</p>
                    </div>
                @endforeach
            </div>
            <div>
                <button class="view-more" onclick="window.history.back()">Quay lại</button>
                <button class="view-more" onclick="window.location.href='{{ url('admin/phong/') }}'">Quay lại trang phòng</button>
            </div>            
        </div>
    </div>
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll(".thumbnails img");
    const mainImage = document.getElementById("main-image");

    function showSlide(index) {
        if (index < 0) {
            currentSlide = slides.length - 1;
        } else if (index >= slides.length) {
            currentSlide = 0;
        } else {
            currentSlide = index;
        }

        mainImage.src = slides[currentSlide].src;

        slides.forEach((slide, i) => {
            if (i === currentSlide) {
                slide.classList.add("active");
            } else {
                slide.classList.remove("active");
            }
        });
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    slides.forEach((slide, index) => {
        slide.addEventListener("click", () => showSlide(index));
    });

    showSlide(currentSlide);
</script>    
@endsection