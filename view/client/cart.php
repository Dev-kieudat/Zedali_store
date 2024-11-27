<style>
    .container{
        margin-top: 40px;
    }
    #footer {
    background-color: #f8f8f8; /* Màu nền */
    padding: 20px;
    border-top: 1px solid #ddd; /* Đường viền trên */
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}

#footer-summary {
    max-width: 800px; /* Độ rộng tối đa */
    margin: 0 auto; /* Căn giữa */
    text-align: center; /* Căn giữa nội dung */
}

.footer-content {
    display: flex;
    flex-direction: column; /* Sắp xếp theo cột */
    align-items: center; /* Căn giữa nội dung */
    gap: 10px;
}

.subtotal, .savings {
    display: flex;
    justify-content: space-between; /* Cách đều hai đầu */
    width: 100%; /* Chiều rộng đầy đủ */
    font-size: 16px;
    color: #333;
}

.subtotal .price {
    font-weight: bold;
    color: #e74c3c; /* Màu đỏ nổi bật */
}

.savings .save-amount {
    font-size: 14px;
    color: #2ecc71; /* Màu xanh nổi bật */
}

.checkout-button {
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff; /* Màu xanh nút */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.checkout-button:hover {
    background-color: #0056b3; /* Màu xanh đậm hơn khi hover */
}
</style>
<div class="container">
        <div id="main">
            <div class="item mb-4">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="images/cv-nu-kaki.webp" alt="images/cv-nu-kaki.webp">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Chân váy kaki nữ</h5>
                            <p class="card-text" style="font-weight: 500;">300.000đ</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">-</button>
                            <button type="button" class="btn btn-outline-dark">1</button>
                            <button type="button" class="btn btn-outline-dark">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;">
            <div class="item mb-4">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="images/cv-nu-kaki.webp" alt="images/cv-nu-kaki.webp">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Chân váy kaki nữ</h5>
                            <p class="card-text" style="font-weight: 500;">300.000đ</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">-</button>
                            <button type="button" class="btn btn-outline-dark">1</button>
                            <button type="button" class="btn btn-outline-dark">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;">
                <div class="item mb-4">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="images/cv-nu-kaki.webp" alt="images/cv-nu-kaki.webp">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Chân váy kaki nữ</h5>
                                <p class="card-text" style="font-weight: 500;">300.000đ</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-dark">-</button>
                                <button type="button" class="btn btn-outline-dark">1</button>
                                <button type="button" class="btn btn-outline-dark">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border: none; border-top: 1px dashed #ccc; width: 100%;">
        </div>
</div>
<div id="footer">
            <div id="footer-summary">
                <div class="footer-content">
                    <div class="subtotal">
                        <span>Tạm tính</span>
                        <span class="price">5.959.900 đ</span>
                    </div>
                    <button class="checkout-button">Thanh toán</button>
                </div>
            </div>
        </div>