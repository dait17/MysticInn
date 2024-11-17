@extends('user.layouts.layout')

@section('title', 'Room Details Page')

@section('content')
{{--  HTML Phần Home ở đây  --}}
<style>
    .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 24px;
    color: #37cfa2;
}

.content {
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

.map {
    margin-top: 20px;
}
.map img{
    height: 300px;
    width: 700px;
}

.map h2 {
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
            <h1>Phòng thuê tại đường 8C KĐT Lê Hồng Phong</h1>
            <p>20m², 1.6 triệu/tháng</p>
        </header>

        <div class="content">
            <div class="images">
                <div class="slideshow">
                    <button class="prev" onclick="prevSlide()">&#10094;</button>
                    <img id="main-image" src="https://via.placeholder.com/600x400" alt="Ảnh lớn">
                    <button class="next" onclick="nextSlide()">&#10095;</button>
                </div>
                <div class="thumbnails">
                    <img src="https://via.placeholder.com/600x400" alt="Phòng trọ 1" onclick="changeSlide(0)">
                    <img src="https://via.placeholder.com/600x400" alt="Phòng trọ 2" onclick="changeSlide(1)">
                    <img src="https://via.placeholder.com/600x400" alt="Phòng trọ 3" onclick="changeSlide(2)">
                    <img src="https://via.placeholder.com/600x400" alt="Phòng trọ 4" onclick="changeSlide(3)">
                </div>
            </div>

            <div class="details">
                <h2>Thông tin mô tả</h2>
                <p>
                    Nằm ngay trung tâm thành phố, khu đô thị Lê Hồng Phong 2, đường 8C, số 20.4, Phường Phước Hải,
                    khu vực yên tĩnh, môi trường thoáng mát trong lành, an ninh camera.
                </p>
                <p><strong>Giá:</strong> 1.6 triệu/tháng</p>
                <p><strong>Diện tích:</strong> 20m²</p>
                <p><strong>Nội thất:</strong> Tủ lạnh, máy lạnh, bàn ghế, tủ quần áo, bếp...</p>
                <p><strong>Tình trạng:</strong> Cho thuê</p>
                <button class="contact">Liên hệ ngay</button>
            </div>
        </div>

        <div class="similar-posts">
            <h2>Có thể bạn quan tâm</h2>
            <div class="posts-container">
                <div class="post">
                    <img src="https://via.placeholder.com/300x200" alt="Phòng trọ 1">
                    <p class="title">Phòng trọ Nha Trang trung tâm thành phố phục vụ th...</p>
                    <p class="status">Nội thất đầy đủ</p>
                    <p class="price">2,5 triệu/tháng</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300x200" alt="Phòng trọ 2">
                    <p class="title">Trọ cho thuê</p>
                    <p class="status">Nhà trống</p>
                    <p class="price">1,5 triệu/tháng</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300x200" alt="Phòng trọ 3">
                    <p class="title">Phòng trọ bình dân 32m², Phước Long, Nha Trang</p>
                    <p class="status">Nhà trống</p>
                    <p class="price">1,7 triệu/tháng</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300x200" alt="Phòng trọ 4">
                    <p class="title">Nhà trọ số 7 đường nhân vị đường 23/10, 30m²...</p>
                    <p class="status">Nội thất đầy đủ</p>
                    <p class="price">1,8 triệu/tháng</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300x200" alt="Phòng trọ 5">
                    <p class="title">[PASS PHÒNG] – Cho thuê phòng trọ tại...</p>
                    <p class="status">Nội thất đầy đủ</p>
                    <p class="price">3,6 triệu/tháng</p>
                </div>
            </div>
            <button class="view-more">Xem thêm</button>
        </div>
    </div>
<script>
    const images = [
        "https://via.placeholder.com/600x400",
        "https://via.placeholder.com/600x400?text=Phòng+2",
        "https://via.placeholder.com/600x400?text=Phòng+3",
        "https://via.placeholder.com/600x400?text=Phòng+4"
    ];
    let currentIndex = 0;

    function showSlide(index) {
        const mainImage = document.getElementById('main-image');
        const thumbnails = document.querySelectorAll('.thumbnails img');

        currentIndex = index;

        // Update main image
        mainImage.src = images[index];

        // Highlight active thumbnail
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % images.length;
        showSlide(nextIndex);
    }

    function prevSlide() {
        const prevIndex = (currentIndex - 1 + images.length) % images.length;
        showSlide(prevIndex);
    }

    function changeSlide(index) {
        showSlide(index);
    }

    // Initialize the first slide
    document.addEventListener('DOMContentLoaded', () => {
        showSlide(0);
    });
</script>
@endsection
