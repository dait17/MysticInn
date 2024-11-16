@extends('user.layouts.layout')

@section('title', 'Home Page')

@section('content')
<style>

    .distance{
        display: flex;
    }

    /* style bộ lọc */
    .filter-container {
        font-family: Arial, sans-serif;
        width: 300px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    .filter-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .btn {
        padding: 8px 12px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #007bff;
        color: #fff;
    }

    .filter-select select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-range label {
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }

    .filter-price {
        display: flex;
        gap: 10px;
    }

    .filter-price input {
        width: 50%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-status select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn-clear {
        padding: 8px 16px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-apply {
        padding: 8px 16px;
        background-color: #37cfa2;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-apply:hover {
        background-color: #0056b3;
    }
    /* end style bộ lọc */

    /* style card */
    /* Container chứa các card */
    .room-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
        padding: 20px;
    }

    /* Card từng phòng trọ */
    .room-card {
        flex: 1 1 calc(33.33% - 20px);
        max-width: calc(33.33% - 20px); 
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    /* Hình ảnh trong card */
    .room-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    /* Thông tin phòng trọ */
    .room-info {
        padding: 15px;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .room-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #37cfa2;
    }

    .room-price, .room-area, .room-location, .room-status {
        font-size: 14px;
        margin: 5px 0;
    }

    /* Nút xem chi tiết */
    .room-detail-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #37cfa2;
        color: #fff;
        text-align: center;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .room-detail-btn:hover {
        background-color: #37cfa1;
    }

    @media (max-width: 768px) {
        .room-card {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }

    /* end style card */

    /* style quảng cáo */
    .advertisement {
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        position: relative;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    .ad-content h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .description {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }

    .features h3, .contact h3 {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    .features ul {
        list-style: none;
        padding-left: 0;
    }

    .features li {
        font-size: 16px;
        color: #555;
        margin-bottom: 8px;
    }

    .contact p {
        font-size: 16px;
        color: #555;
        margin-bottom: 5px;
    }

    .call-to-action {
        width: 100%;
        padding: 10px;
        background-color: #37cfa2;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
    }

    .call-to-action:hover {
        background-color: #37cfa1;
    }

    .ad-image img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    /* end style quảng cáo */
    .room-ads {
        margin: 20px auto;
        width: 100%;
        max-width: 800px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Khoảng cách giữa các quảng cáo */
        justify-content: center; /* Căn giữa các quảng cáo */
    }

    .room-ad {
        width: 100%;
        max-width: 250px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .room-ad img {
        width: 100%;
        border-radius: 8px;
    }

    .pagination-wrapper {
        width: 100%;
        display: flex;
        justify-content: center; /* Căn giữa phân trang */
        margin-top: 20px;
    }

    .pagination-buttons {
        display: flex;
        align-items: center;
    }

    .pagination-buttons button {
        padding: 8px 16px;
        margin: 0 5px;
        background-color: #37cfa2;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .pagination-buttons button:hover {
        background-color: #37cfa1;
    }

    .pagination-buttons span {
        font-size: 18px;
        margin: 0 10px;
    }
</style>
<script>
    function closeAd() {
        document.getElementById('ad-container').style.display = 'none';
    }
</script>
{{-- Bộ lọc --}}
<div class = "distance">
    <div class="filter-container">
        <h3>Tìm kiếm quanh bạn</h3>
        <input type="text" placeholder="Nhập vị trí và khoảng cách tìm kiếm" class="filter-input">

        <h3>Tìm theo khu vực</h3>
        <div class="filter-buttons">
            <button class="btn">Tp Hồ Chí Minh</button>
            <button class="btn">Hà Nội</button>
        </div>
        <div class="filter-select">
            <select>
                <option>Chọn tỉnh thành</option>
                <option>Khánh Hòa</option>
                <option>Hồ Chí Minh</option>
            </select>
            <select>
                <option>Chọn quận huyện</option>
            </select>
            <select>
                <option>Chọn phường xã</option>
            </select>
        </div>

        <div class="filter-range">
            <label>Giá thuê</label>
            <div class="filter-price">
                <input type="number" placeholder="Giá thuê tối thiểu">
                <input type="number" placeholder="Giá thuê tối đa">
            </div>
        </div>

        <div class="filter-range">
            <label>Diện tích</label>
            <div class="filter-price">
                <input type="number" placeholder="Diện tích tối thiểu">
                <input type="number" placeholder="Diện tích tối đa">
            </div>
        </div>

        <div class="filter-status">
            <label>Tình trạng nội thất</label>
            <select>
                <option>Tất cả</option>
                <option>Nội thất cao cấp</option>
                <option>Nội thất đầy đủ</option>
                <option>Nhà trống</option>
            </select>
        </div>

        <div class="filter-actions">
            <button class="btn-clear">Xóa lọc</button>
            <button class="btn-apply">Áp dụng</button>
        </div>
    </div>
{{-- end bộ lọc --}}

{{-- giao diện các phòng --}}
    <div class="room-container">
        <!-- Card 1 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 1</h3>
                <p class="room-price">Giá: 3 triệu/tháng</p>
                <p class="room-area">Diện tích: 25m²</p>
                <p class="room-location">Địa chỉ: Quận 1, TP.HCM</p>
                <p class="room-status">Nội thất: Đầy đủ</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>

        <!-- Card 2 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>

        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
        <!-- Card 3 -->
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Hình ảnh phòng trọ" class="room-image">
            <div class="room-info">
                <h3 class="room-title">Phòng trọ 2</h3>
                <p class="room-price">Giá: 5 triệu/tháng</p>
                <p class="room-area">Diện tích: 30m²</p>
                <p class="room-location">Địa chỉ: Quận 2, TP.HCM</p>
                <p class="room-status">Nội thất: Cao cấp</p>
            </div>
            <button class="room-detail-btn">Xem chi tiết</button>
        </div>
    </div>
{{-- end giao diện các phòng --}}

{{-- Quảng cáo phòng trọ --}}
    <div class="advertisement" id="ad-container">
        <div class="ad-content">
            <button class="close-btn" onclick="closeAd()">×</button>
            <div class="ad-image">
                <img src="https://via.placeholder.com/600x300" alt="Phòng trọ">
            </div>
            <h2>Cho Thuê Phòng Trọ Rẻ - Thoáng Mát, Tiện Nghi</h2>
            <p class="description">
                Bạn đang tìm một phòng trọ sạch sẽ, thoáng mát, gần trung tâm? Phòng trọ của chúng tôi có đầy đủ tiện nghi, không gian sống thoải mái, an ninh đảm bảo.
            </p>
            <div class="features">
                <h3>Tiện Nghi</h3>
                <ul>
                    <li>Phòng rộng 20m², đầy đủ ánh sáng</li>
                    <li>Điều hòa, quạt mát, máy nước nóng</li>
                    <li>Wi-Fi miễn phí tốc độ cao</li>
                    <li>Nhà vệ sinh riêng biệt, sạch sẽ</li>
                    <li>Gần các khu mua sắm, trường học, bệnh viện</li>
                </ul>
            </div>
            <div class="contact">
                <h3>Liên Hệ</h3>
                <p>Để biết thêm chi tiết, vui lòng liên hệ với chúng tôi qua:</p>
                <p>Điện thoại: <strong>0901234567</strong></p>
                <p>Email: <strong>thuephong@gmail.com</strong></p>
            </div>
            <button class="call-to-action">Liên hệ ngay</button>
        </div>
    </div>
    {{-- End Quảng cáo phòng trọ --}}
    
</div>
<div class="room-ads" id="room-ads">
    <!-- Các phòng trọ sẽ được hiển thị ở đây -->
</div>

<!-- Phân trang -->
<div class="pagination-wrapper">
    <div class="pagination-buttons" id="pagination">
        <button class="prev-btn" onclick="changePage(-1)">← Previous</button>
        <span id="page-number">Page 1</span>
        <button class="next-btn" onclick="changePage(1)">Next →</button>
    </div>
</div>
@endsection