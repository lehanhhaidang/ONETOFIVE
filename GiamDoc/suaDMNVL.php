<?php
include("KetNoi.php");
$p = new GiamDoc();

if (isset($_REQUEST['maDonMuaNVL'])) {
    $maDonMuaNVL = $_REQUEST['maDonMuaNVL'];
    $row = $p->updateDMNVL($maDonMuaNVL);

    if (!$row) {
        echo "<script>alert('Không có dữ liệu mới để cập nhật.');</script>";
        exit();
    }

    $maDonMuaNVL = $row['maDonMuaNVL'];
    $tenDonMuaNVL = $row['tenDonMuaNVL'];
    $ngayLap = $row['ngayLap'];
    $tenNCC = $row['tenNCC'];
    $sdtNCC = $row['sdtNCC'];
    $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
    $soLuongNVL = $row['soLuongTonnvl'];
    $soLuong = $row['soLuong'];
}

// Sử dụng phương thức POST để cập nhật dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    $maDonMuaNVL = $_POST['maDonMuaNVL'];
    $tenDonMuaNVL = $_POST['tenDonMuaNVL'];
    $ngayLap = $_POST['ngayLap'];
    $tenNCC = $_POST['tenNCC'];
    $sdtNCC = $_POST['sdtNCC'];

    if ($tenNCC !== '' && !preg_match("/^[a-zA-Z0-9 ]*$/", $tenNCC)) {
        header('Content-Type: text/html; charset=utf-8');
        echo "<script>alert('Tên nhà cung cấp không được chứa ký tự đặc biệt .');
        window.history.back();</script>";
        // You may choose to redirect or take appropriate action here.
        exit();
    }
    
    // Validate Số điện thoại (Phone Number)
    if ($sdtNCC !== '' && !preg_match("/^0[0-9]{9}$/", $sdtNCC)) {
        header('Content-Type: text/html; charset=utf-8');
        echo "<script>alert('Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng 0 và có tổng cộng 10 số.');window.history.back()</script>";
        // You may choose to redirect or take appropriate action here.
        exit();
    }

    // Check if any data has been modified before attempting to update
    $hasDataChanged = (
        $tenNCC != $row['tenNCC'] ||
        $sdtNCC != $row['sdtNCC']
        // Add more conditions for other fields if needed
    );

    if ($hasDataChanged) {
        $p->InsertUpdate("UPDATE donmuanvl
            SET 
                tenNCC = '$tenNCC',
                sdtNCC = '$sdtNCC'
            WHERE maDonMuaNVL = '$maDonMuaNVL'");

        $updated = false;

        for ($i = 0; $i < count($_POST['maCTDMNVL']); $i++) {
            $currentMaCTDMNVL = $_POST['maCTDMNVL'][$i];
            $soLuong = $_POST['soLuong'][$i];

            // // Cập nhật số lượng trong bảng ctkhsxnvl
            if ($p->InsertUpdate("UPDATE ctdmnvl
                SET soLuong = '$soLuong'
                WHERE maDonMuaNVL = '$maDonMuaNVL'")) {
            } else {
                echo "<script>alert('Cập nhật không thành công');</script>";
            }
        }

        echo "<script>alert('Cập nhật thành công');</script>";
        header('Content-Type: text/html; charset=utf-8');
        echo header("refresh:0;url='DonMuaNVL.php'");
        exit();
    } else {
        echo "<script>alert('Không có dữ liệu mới để cập nhật.');</script>";
        // You may choose to redirect or take appropriate action here.
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
.btn-reset {
    background-color: #233d5a;
    padding: 10px;
    margin-right: 20px;
    color: white;
    text-decoration: none;
    font-size:0.6em;
}
.label-input-group label {
    flex: 1;
    margin-right: 10px; /* Khoảng cách giữa label và input */
}

    </style>
<script>
    function validateForm() {
   
    var soLuongNguyenVatLieuInput = document.querySelector("input[name='soluong']");
    var soLuongNguyenVatLieu = parseFloat(soLuongNguyenVatLieuInput.value);
    if (isNaN(soLuongNguyenVatLieu) || soLuongNguyenVatLieu <= 0) {
        alert("Số lượng nguyên vật liệu không được để trống.");
        return false;
    }  
        return true;
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
    <label for="maDonMuaNVL">Mã đơn mua NVL:</label>
    <input type="text" name="maDonMuaNVL" readonly value="<?php echo $maDonMuaNVL ?>">
</div>

<div class="label-input-group">
    <label for="tenDonMuaNVL">Tên đơn mua NVL:</label>
    <input type="text" name="tenDonMuaNVL" disabled value="<?php echo $tenDonMuaNVL ?>">
</div>

<div class="label-input-group">
    <label for="ngayLap">Ngày lập:</label>
    <input type="date" name="ngayLap" disabled  value="<?php echo $ngayLap ?>">
</div>

<div class="label-input-group">
    <label for="tenNCC">Nhà cung cấp:</label>
    <input type="text" name="tenNCC"  value="<?php echo $tenNCC ?>">
</div>

<div class="label-input-group">
    <label for="sdtNCC">Số điện thoại:</label>
    <input type="text" name="sdtNCC" value="<?php echo $sdtNCC ?>">
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
                <h1 style="text-align: center">Danh Sách Nguyên vật liệu</h1>
					<?php
					   if (isset($_REQUEST['maDonMuaNVL']))
							{
								$maDonMuaNVL = $_REQUEST['maDonMuaNVL'];
							
                                $p->xuatDMNVL("SELECT ctdmnvl.soLuong, nguyenvatlieu.tenNguyenVatLieu,nguyenvatlieu.donViTinh
                                FROM  DonMuaNVL
                                INNER JOIN  ctdmnvl ON DonMuaNVL.maDonMuaNVL =  ctdmnvl.maDonMuaNVL
                                INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = ctdmnvl.maNguyenVatLieu
                                WHERE DonMuaNVL.maDonMuaNVL = '$maDonMuaNVL'
                            ");
                       }
                    ?>
                    
                </tbody>

            </table>
        </div>
            <div class="btn">
            <a href="DonMuaNVL.php" class="btn-reset">Quay lại</a>
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
   
