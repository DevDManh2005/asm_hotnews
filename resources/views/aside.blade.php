<aside>
    <h2>Các Mẫu Quảng Cáo Đã Thực Hiện</h2>
    <div class="ad-sample-list">
        <div class="ad-sample-item">
            <div class="image-placeholder">
                <img src="{{ asset('storage/images/banner.jpg') }}" alt="Quảng cáo Banner">
            </div>
            <h3>Quảng cáo Banner</h3>
            <p>Mẫu quảng cáo banner hiển thị ở đầu trang web.</p>
            <a href="#">Xem chi tiết</a>
        </div>

        <div class="ad-sample-item">
            <div class="image-placeholder">
                <img src="{{ asset('storage/images/popup.jpg') }}" alt="Quảng cáo Pop-up">
            </div>
            <h3>Quảng cáo Pop-up</h3>
            <p>Mẫu quảng cáo pop-up xuất hiện khi người dùng truy cập.</p>
            <a href="#">Xem chi tiết</a>
        </div>

        <div class="ad-sample-item">
            <div class="image-placeholder">
                <img src="{{ asset('storage/images/video.jpg') }}" alt="Quảng cáo Video">
            </div>
            <h3>Quảng cáo Video</h3>
            <p>Mẫu quảng cáo video ngắn gọn, hấp dẫn.</p>
            <a href="#">Xem chi tiết</a>
        </div>

        <div class="ad-sample-item">
            <div class="image-placeholder">
                <img src="{{ asset('storage/images/social.jpg') }}" alt="Quảng cáo trên mạng xã hội">
            </div>
            <h3>Quảng cáo trên mạng xã hội</h3>
            <p>Mẫu quảng cáo tối ưu hóa cho Facebook, Instagram.</p>
            <a href="#">Xem chi tiết</a>
        </div>

        <div class="ad-sample-item">
            <div class="image-placeholder">
                <img src="{{ asset('storage/images/native.jpg') }}" alt="Quảng cáo Native">
            </div>
            <h3>Quảng cáo Native</h3>
            <p>Mẫu quảng cáo tích hợp tự nhiên vào nội dung trang web.</p>
            <a href="#">Xem chi tiết</a>
        </div>
    </div>
</aside>
<style>
    /* 🌟 Sidebar */
aside {
    width: 100%; /* Chiều rộng đầy đủ trên mobile */
    background-color: #fff; /* Nền trắng đồng nhất */
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
}

/* 🌟 Tiêu đề sidebar */
aside h2 {
    font-size: 28px;
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin-bottom: 20px;
    font-weight: 700;
    text-align: center;
}

/* 🌟 Danh sách mục quảng cáo */
.ad-sample-list {
    display: flex;
    flex-direction: column;
    gap: 25px; /* Khoảng cách giữa các mục */
}

/* 🌟 Mỗi mục quảng cáo */
.ad-sample-item {
    background-color: #f9f9f9; /* Nền sáng */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* 🌟 Hiệu ứng hover cho mỗi mục quảng cáo */
.ad-sample-item:hover {
    transform: translateY(-8px); /* Nhấc lên khi hover */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Bóng đổ đậm hơn */
}

/* 🌟 Phần hình ảnh */
.ad-sample-item .image-placeholder {
    width: 100%;
    height: 180px; /* Giảm chiều cao để phù hợp */
    background-color: #f0f0f0; /* Màu nền placeholder */
    display: flex;
    justify-content: center;
    align-items: center;
    border: 3px dashed #e0e0e0; /* Viền chấm đứt */
    border-radius: 10px;
}

.ad-sample-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
    border-radius: 10px;
}

.ad-sample-item img[src=""] {
    display: none; /* Ẩn nếu không có hình ảnh */
}

/* 🌟 Tiêu đề mỗi mục quảng cáo */
.ad-sample-item h3 {
    font-size: 20px; /* Giảm kích thước tiêu đề */
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin: 10px 0;
    font-weight: 600;
}

/* 🌟 Mô tả quảng cáo */
.ad-sample-item p {
    font-size: 14px; /* Giảm kích thước mô tả */
    color: #666; /* Màu chữ nhạt */
    margin-bottom: 15px;
}

/* 🌟 Liên kết trong mục quảng cáo */
.ad-sample-item a {
    color: #007bff; /* Màu xanh dương đồng nhất */
    text-decoration: none; /* Ẩn dấu gạch dưới */
    font-weight: bold;
    transition: color 0.3s ease;
}

.ad-sample-item a:hover {
    color: #ffcc00; /* Màu vàng nổi bật khi hover */
}

/* 🌟 Responsive Design */
@media (max-width: 1024px) {
    aside {
        width: 100%; /* Chiều rộng đầy đủ trên tablet */
    }

    .ad-sample-item .image-placeholder {
        height: 160px; /* Giảm chiều cao hình ảnh */
    }
}

@media (max-width: 768px) {
    aside {
        padding: 15px; /* Giảm padding trên mobile */
    }

    .ad-sample-item .image-placeholder {
        height: 140px; /* Giảm chiều cao hình ảnh */
    }

    .ad-sample-item h3 {
        font-size: 18px; /* Giảm kích thước tiêu đề */
    }

    .ad-sample-item p {
        font-size: 13px; /* Giảm kích thước mô tả */
    }
}
</style>