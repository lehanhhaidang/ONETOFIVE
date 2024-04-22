<?php
session_start(); // Bắt đầu hoặc tiếp tục session

$showConfirmationButton = false; // Biến flag để kiểm soát việc hiển thị nút "Xác nhận tạo đề xuất"
$calculateClicked = false; // Biến flag để kiểm soát xem nút "Tính toán số lượng nguyên vật liệu" đã được nhấn hay chưa

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['button'])) {
        switch ($_POST['button']) {
            case "Tính toán số lượng nguyên vật liệu":
                $calculateClicked = true; // Đánh dấu rằng nút "Tính toán số lượng nguyên vật liệu" đã được nhấn
                if(isset($_POST['selected_products'])) {
                    $_SESSION['selected_products'] = $_POST['selected_products']; // Lưu danh sách sản phẩm đã chọn vào session
                }
                break;
            case "Xác nhận tạo đề xuất":
                // Thực hiện xác nhận tạo đề xuất
                if (isset($_SESSION['selected_products']) && is_array($_SESSION['selected_products'])) {
                    // Code xác nhận tạo đề xuất ở đây
                    echo "Đã xác nhận tạo đề xuất!";
                    // Thực hiện insert vào cơ sở dữ liệu ở đây
                    if(isset($_POST['expected_quantity'])) {
                        // Thực hiện insert vào bảng đề xuất
                        foreach ($_POST['expected_quantity'] as $maThanhPham => $soLuongDuKien) {
                            // Thực hiện insert vào bảng đề xuất ở đây
                        }
                    }
                } else {
                    echo "Không có sản phẩm nào được chọn!";
                }
                break;
        }
    }
}

// Hiển thị form chọn sản phẩm và nút "Tính toán số lượng nguyên vật liệu"
if(isset($_SESSION['selected_products']) && is_array($_SESSION['selected_products'])) {
    $selectedProducts = $_SESSION['selected_products'];
    // Tiếp tục xử lý và hiển thị danh sách sản phẩm đã chọn
    echo '<h1 align="center">CÁC SẢN PHẨM ĐÃ CHỌN</h1>';
    echo '<form action="" method="post">'; // Đặt action là trang hiện tại
    echo '<table class="table table-bordered table-hover">';
    echo '<thead>
            <tr>
                <th>Mã thành phẩm</th>
                <th>Tên thành phẩm</th>
                <th>Đơn vị tính</th>
                <th>Số lượng tồn</th>
                <th>Số lượng dự kiến sản xuất</th>
            </tr>
        </thead>';
    echo '<tbody>';
    foreach ($selectedProducts as $maThanhPham) {
        // Thực hiện truy vấn để lấy thông tin về sản phẩm từ cơ sở dữ liệu
        $link = $p->connect();
        $sql = "SELECT * FROM thanhpham WHERE maThanhPham = '$maThanhPham'";
        $result = mysql_query($sql, $link);
        if ($result && mysql_num_rows($result) > 0) {
            $row = mysql_fetch_assoc($result);
            $maThanhPham = $row['maThanhPham'];
            $tenThanhPham = $row['tenThanhPham'];
            $donViTinh = $row['donViTinh'];
            $soLuongTon = $row['soLuongTon'];
            echo '<tr>
                    <td>'.$maThanhPham.'</td>
                    <td>'.$tenThanhPham.'</td>
                    <td>'.$donViTinh.'</td>
                    <td>'.$soLuongTon.'</td>
                    <td><input type="number" name="expected_quantity['.$maThanhPham.']" value="0"></td>
                </tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '<div class="text-center">
    <br>
    <button type="submit" class="btn btn-primary" name="button" value="Tính toán số lượng nguyên vật liệu">Tính toán số lượng nguyên vật liệu</button>
    </div>
    <br><br>
    ';
    echo '</form>';
    $showConfirmationButton = true; // Set biến flag thành true để hiển thị nút "Xác nhận tạo đề xuất"
} else {
    echo "Bạn chưa chọn sản phẩm nào!";
}

if ($calculateClicked && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['expected_quantity'])) {
    // Thực hiện tính toán số lượng nguyên vật liệu cần thiết
    $expectedQuantities = $_POST['expected_quantity'];
    if (!empty($expectedQuantities)) {
        echo '<h1 align="center">NGUYÊN VẬT LIỆU CẦN THIẾT</h1>';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead>
                <tr>
                    <th>Mã NVL</th>
                    <th>Tên NVL</th>
                    <th>Đơn vị tính</th>
                    <th>Số lượng cần</th>
                </tr>
            </thead>';
        echo '<tbody>';
        foreach ($expectedQuantities as $maThanhPham => $soLuongDuKien) {
            // Thực hiện truy vấn để lấy thông tin về nguyên vật liệu cần thiết từ cơ sở dữ liệu
            $sql = "SELECT nvl.*, dm.soLuong * $soLuongDuKien AS soLuongCan
                    FROM nguyenvatlieu AS nvl
                    JOIN dinhmucnvl AS dm ON nvl.maNguyenVatLieu = dm.maNguyenVatLieu
                    WHERE dm.maThanhPham = '$maThanhPham'";
            $link = $p->connect();
            $result = mysql_query($sql, $link);
            if ($result && mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $maNguyenVatLieu = $row['maNguyenVatLieu'];
                    $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
                    $donViTinh = $row['donViTinh'];
                    $soLuongCan = $row['soLuongCan'];
                    echo '<tr>
                            <td>'.$maNguyenVatLieu.'</td>
                            <td>'.$tenNguyenVatLieu.'</td>
                            <td>'.$donViTinh.'</td>
                            <td>'.$soLuongCan.'</td>
                        </tr>';
                }
            }
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Không có số lượng dự kiến nào được nhập!";
    }
}
?>
