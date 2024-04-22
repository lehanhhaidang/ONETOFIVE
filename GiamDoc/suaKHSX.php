<?php
    include("KetNoi.php");
    $p = new GiamDoc();
if (isset($_REQUEST['maKeHoachSX'])) {
    $maKeHoachSX = $_REQUEST['maKeHoachSX'];
    $row = $p->updateKHSX($maKeHoachSX);
    
    if ($row) {
        $maKeHoachSX = $row['maKeHoachSX'];
        $tenKeHoachSX = $row['tenKeHoachSX'];
        $ngayLap = $row['ngayLap'];
        $ngayBatDau = $row['ngayBatDau'];
        $ngayKetThuc = $row['ngayKetThuc'];
        $tenThanhPham=$row['tenThanhPham'];
        $tenNguyenVatLieu=$row['tenNguyenVatLieu'];
        $soLuongTP=$row['soLuongTon'];
        $soLuongNVL=$row['soLuongTonnvl'];
        $soLuongNVLBeforeUpdate = $row['soLuongNVL'];
    }
}
// Sử dụng phương thức POST để cập nhật dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Submit'])) {
        $maKeHoachSX = $_POST['maKeHoachSX'];
        $tenKeHoachSX = $_POST['tenKeHoachSX'];
        $ngayLap = $_POST['ngayLap'];
        $ngayBatDau = $_POST['ngayBatDau'];
        $ngayKetThuc = $_POST['ngayKetThuc'];
        $soLuongNVLBeforeUpdate = $_POST['soLuongNVLBeforeUpdate']; 
        if (empty($tenKeHoachSX)) {
            echo "<script>alert('Tên kế hoạch sản xuất không được trống');</script>";
            // Thực hiện xử lý khi có lỗi, ví dụ: hiển thị thông báo lỗi và không thực hiện cập nhật
        } elseif (empty($ngayBatDau) || empty($ngayKetThuc)) {
            echo "<script>alert('Ngày bắt đầu và ngày kết thúc không được để trống');</script>";
            // Thực hiện xử lý khi có lỗi, ví dụ: hiển thị thông báo lỗi và không thực hiện cập nhật
        } 
        elseif ($ngayBatDau >= $ngayKetThuc) {
            echo "<script>alert('Ngày kết thúc phải sau ngày bắt đầu');</script>";
            // Thực hiện xử lý khi có lỗi, ví dụ: hiển thị thông báo lỗi và không thực hiện cập nhật
        } elseif ($ngayBatDau <= date("Y-m-d")) {
            echo "<script>alert('Ngày bắt đầu phải sau ngày hiện tại');</script>";
        }else {
        // Cập nhật thông tin chung của kế hoạch sản xuất
        $p->InsertUpdate("UPDATE kehoachsx
        SET tenKeHoachSX = '$tenKeHoachSX',
            ngayLap = '$ngayLap',
            ngayBatDau = '$ngayBatDau',
            ngayKetThuc = '$ngayKetThuc'
        WHERE maKeHoachSX = '$maKeHoachSX'");
// Kiểm tra số lượng thành phẩm không được để trống
for ($i = 0; $i < count($_POST['maCTKHSXNVL']); $i++) {
    $currentMaCTKHSXNVL = $_POST['maCTKHSXNVL'][$i];
    $soLuongNVL = $_POST['soLuongNVL'][$i];

    // Cập nhật số lượng trong bảng ctkhsxnvl
    $p->InsertUpdate("UPDATE ctkhsxnvl
        SET soLuongNVL = '$soLuongNVL'
        WHERE maCTKHSXNVL = '$currentMaCTKHSXNVL'");
    // Lấy mã nguyên vật liệu và số lượng đơn mua
    $resultArray = $p->get($currentMaCTKHSXNVL);

    // Lấy giá trị manguyenvatlieu
    $maNguyenVatLieu = $resultArray['maNguyenVatLieu'];
    $soLuongDonMuaHienTai = $resultArray['soLuongDonMuaHienTai'];
    $newSoLuongDonMua = $soLuongDonMuaHienTai + ($soLuongNVLBeforeUpdate-$soLuongNVL);

// Cập nhật số lượng trong bảng nguyenvatlieu
$p->InsertUpdate("UPDATE nguyenvatlieu 
SET soLuongDonMua = $newSoLuongDonMua 
WHERE maNguyenVatLieu = '$maNguyenVatLieu'");


}
for ($i = 0; $i < count($_POST['maCTKHSXTP']); $i++) {
    $currentMaCTMaCTKHSXTP = $_POST['maCTKHSXTP'][$i];
    $soLuongTP = $_POST['soLuongTP'][$i];
    $p->InsertUpdate("UPDATE ctkhsx
        SET soLuongTP = '$soLuongTP'
        WHERE maCTKHSXTP = '$currentMaCTMaCTKHSXTP'");
    
}

        echo "<script>alert('Cập nhật thành công');</script>";
        header('Content-Type: text/html; charset=utf-8');
        echo header("refresh:0;url='KeHoachSX.php'");
        exit();
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/ThemKeHoachSX.css">
    <title>Sửa KHSX</title>

</head>
    <style>
    .label-input-group {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 10px;
}

.label-input-group label {
    flex: 1;
    margin-right: 10px; /* Khoảng cách giữa label và input */
}

    .btn-reset {
    background-color: #233d5a;
    padding: 10px;
    margin-right: 20px;
    color: white;
    text-decoration: none;
    font-size:0.6em;
}

.btn-submit {
    background-color: #39a867;
    padding: 10px;
    color: white;
    
}
    
    </style>
<script>
    function validateForm() {
        var startDateInput = document.getElementById("ngayBatDau");
    var endDateInput = document.getElementById("ngayKetThuc");
    var tenKeHoachInput = document.getElementsByName("tenKeHoachSX")[0];
    var soLuongThanhPhamInput = document.querySelector("input[name='soLuongTP']"); // Corrected name
    var soLuongNguyenVatLieuInput = document.querySelector("input[name='soLuongNVL']"); // Corrected name

    // Kiểm tra xem giá trị ngày có hợp lệ không
    if (!isValidDate(startDateInput.value) || !isValidDate(endDateInput.value)) {
        alert("Ngày không hợp lệ.");
        return false;
    }

    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);
    var currentDate = new Date();

    // Kiểm tra ngày bắt đầu và ngày kết thúc
    if (startDate >= endDate) {
        alert("Ngày bắt đầu phải trước ngày kết thúc.");
        return false;
    }

    // Kiểm tra ngày bắt đầu phải là ngày trong tương lai
    if (startDate <= currentDate) {
        alert("Ngày bắt đầu phải là ngày trong tương lai.");
        return false;
    }

    // Kiểm tra xem tên kế hoạch có được nhập hay không
    if (tenKehoachInput.value.trim() === "") {
        alert("Tên kế hoạch không được để trống.");
        return false;
    }

    var tennvlInput = document.querySelector("select[name='manguyenvatlieu[]']");
    if (tennvlInput.value.trim() === "" || tennvlInput.value.trim() === "Chọn nguyên vật liệu") {
        alert("Vui lòng chọn tên nguyên vật liệu.");
        return false;
    }

    // Kiểm tra xem tên TP có được chọn hay không
    var tetpInput = document.querySelector("select[name='mathanhpham[]']");
    if (tetpInput.value.trim() === "" || tetpInput.value.trim() === "Chọn thành phẩm") {
        alert("Vui lòng chọn tên thành phẩm.");
        return false;
    }

    var soLuongNguyenVatLieu = parseFloat(soLuongNguyenVatLieuInput.value);
    if (isNaN(soLuongNguyenVatLieu) || soLuongNguyenVatLieu <= 0) {
        alert("Số lượng nguyên vật liệu không được để trống.");
        return false;
    }
    
    var soLuongThanhPham = parseFloat(soLuongThanhPhamInput.value);
    if (isNaN(soLuongThanhPham) || soLuongThanhPham <= 0) {
        alert("Số lượng thành phẩm không được để trống.");
        return false;
    }

    // Kiểm tra xem số lượng thành phẩm có được nhập hay không
    if (soLuongThanhPhamInput.value.trim() === "") {
        alert("Số lượng thành phẩm không được để trống.");
        return false;
    }

    // Kiểm tra xem tên nguyên vật liệu có được nhập hay không
    if (tenNguyenVatLieuInput.value.trim() === "") {
        alert("Tên nguyên vật liệu không được để trống.");
        return false;
    }

    return true;
}


    // Hàm kiểm tra xem giá trị ngày có hợp lệ không
    function isValidDate(dateString) {
        var regex = /^\d{4}-\d{2}-\d{2}$/;
        return regex.test(dateString);
    }
</script>
<body> 
    <header>
         <?php
            include("header.php");
        ?>
    </header>
    <section>
        <div class="khung"> 
    <h1>SỬA SẢN PHẨM</h1>
        <div class="container">
    <form action="#" method="post" enctype="multipart/form-data">
    <div class="noidung">
     <div class="label-input-group">
    <label for="maKeHoachSX">Mã kế hoạch sản xuất:</label>
    <input type="text" name="maKeHoachSX" readonly value="<?php echo $maKeHoachSX ?>">
</div>

<div class="label-input-group">
    <label for="tenKeHoachSX">Tên kế hoạch sản xuất:</label>
    <input type="text" name="tenKeHoachSX" value="<?php echo $tenKeHoachSX ?>">
</div>

<div class="label-input-group">
    <label for="now">Ngày lập:</label>
    <input type="date" name="ngayLap"  readonly value="<?php echo $ngayLap ?>">
</div>

<div class="label-input-group">
    <label for="ngayBatDau">Ngày bắt đầu:</label>
    <input type="date" name="ngayBatDau" id="ngayBatDau" value="<?php echo $ngayBatDau ?>">
</div>

<div class="label-input-group">
    <label for="ngayKetThuc">Ngày kết thúc:</label>
    <input type="date" name="ngayKetThuc" id="ngayKetThuc" value="<?php echo $ngayKetThuc ?>">
</div>

     <br> 
</div>   
        
            <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                    </tr>
                </thead>
                <tbody>
            <h1 style="text-align: center">Danh Sách Thành Phẩm</h1>
                    <?php
                    if (isset($_REQUEST['maKeHoachSX']))
				{
				    $maKeHoachSX = $_REQUEST['maKeHoachSX'];
							
                    $p->xuatKHSXTP("SELECT * FROM thanhpham AS tp
                    JOIN ctkhsx AS ct ON tp.maThanhPham= ct.maThanhPham
                    JOIN kehoachsx AS kh ON ct.maKHSX= kh.maKeHoachSX
                    WHERE kh.maKeHoachSX= '$maKeHoachSX'
                ");
                    }
                    ?>
                     </tbody>

            </table>
        </div>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                    </tr>
                </thead>
                <tbody>
                <h1 style="text-align: center">Danh Sách Nguyên vật liệu cần để sản xuất</h1>
					<?php
					   if (isset($_REQUEST['maKeHoachSX']))
							{
								$maKeHoachSX = $_REQUEST['maKeHoachSX'];
							
                                $p->xuatKHSXNVL("SELECT * FROM nguyenvatlieu AS nvl
                                JOIN ctkhsxnvl AS ct ON nvl.maNguyenVatLieu= ct.maNguyenVatLieu
                                JOIN kehoachsx AS kh ON ct.maKHSX= kh.maKeHoachSX
                                WHERE kh.maKeHoachSX= '$maKeHoachSX'
                            ");
                       }
                    ?>
                    
                </tbody>

            </table>
        </div><br>
            <div class="btn">
            <a href="KeHoachSX.php" class="btn-reset">Quay lại</a>
            <input type="submit" name="Submit" value="Cập nhật"class="btn-submit">
                   
        </div>
       </div> 
      </form>       
    </section>
   <?php
        include("footer.php");
        
?>

</body>
</html>
   
