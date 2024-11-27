<style>
        .container {
            margin: 50px auto;
            max-width: 400px;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
<div class="container">
<form action="index.php" method="GET">
    <input type="hidden" name="API" value="add_product">
    <select id="product-type" name="product_type" required>
        <option value="" disabled selected>-- Chọn một loại sản phẩm --</option>
        <option value="Áo">Áo</option>
        <option value="Quần">Quần</option>
        <option value="Phụ kiện">Phụ kiện</option>
    </select>
    <button type="submit">Xác Nhận</button>
</form>
    </div>