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
    /* Sidebar */
aside {
    width: 30%; /* Giảm chiều rộng sidebar */
    background-color: white; /* Nền trắng */
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề sidebar */
aside h2 {
    font-size: 28px;
    color: #1e3a8a;
    margin-bottom: 20px;
    font-weight: 700;
    text-align: center;
}

/* Danh sách mục quảng cáo */
.ad-sample-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

/* Mỗi mục quảng cáo */
.ad-sample-item {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.ad-sample-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Phần hình ảnh */
.ad-sample-item .image-placeholder {
    width: 100%;
    height: 200px;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 3px dashed #e0e0e0;
    border-radius: 10px;
}

.ad-sample-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.ad-sample-item img[src=""] {
    display: none;
}

/* Tiêu đề mỗi mục quảng cáo */
.ad-sample-item h3 {
    font-size: 22px;
    color: #333;
    margin: 10px 0;
    font-weight: 600;
}

/* Mô tả quảng cáo */
.ad-sample-item p {
    font-size: 15px;
    color: #666;
    margin-bottom: 15px;
}

/* Liên kết trong mục quảng cáo */
.ad-sample-item a {
    color: #1e3a8a;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.ad-sample-item a:hover {
    color: #ff9800;
}
</style>