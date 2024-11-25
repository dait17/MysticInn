@extends('user.layouts.layout')

@section('title', 'Room Details Page')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
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
        <div class="content">
            <div id="carouselExampleCaptions" style="width:50%;" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Ảnh đầu tiên -->
                    <div class="carousel-item active">
                        <img src="{{ asset('Images/'.$phong->anhDD) }}" class="d-block w-100" alt="...">
                    </div>
                    <!-- Các ảnh trong $anhPhongs -->
                    @foreach ($anhPhongs as $p)
                    <div class="carousel-item">
                        <img src="{{ asset('Images/'.$p->duongDan) }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="details">
                <h2>Thông tin mô tả</h2>
                <p>
                    {{$phong->ghiChu}}
                </p>
                <p><strong>Giá:</strong> {{ number_format($phong->giaPhong, 0) }} vnđ/tháng</p>
                <p><strong>Diện tích:</strong> {{$phong->dienTich}}m²</p>
                <p><strong>Nội thất:</strong> Tủ lạnh, máy lạnh, bàn ghế, tủ quần áo, bếp...</p>
                <p><strong>Tình trạng:</strong> Cho thuê</p>
                <button class="contact">Liên hệ ngay : 0868439374</button>
            </div>
        </div>
        

        <div class="similar-posts">
            <h2>Có thể bạn quan tâm</h2>
            <div class="posts-container">
                @foreach ($randomPhongs as $item)
                <div class="post">
                    <img src="{{ asset('Images/'.$item->anhDD)}}" alt="Phòng trọ 1">
                    <p class="title">Tên phòng: {{$item->tenPhong}}</p>
                    <p class="status">{{$item->dienTich}}m²</p>
                    <p class="status">Nhà trống</p>
                    <p class="price">{{number_format($phong->giaPhong, 0) }} vnđ/tháng</p>
                </div>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button type="button" onclick="xemthem()" class="btn btn-dark">XEM THÊM</button>
            </div>
        </div>
    </div>
<script>
    function xemthem() {
        window.location.href = "{{ route('room') }}";
    }
</script>
@endsection
