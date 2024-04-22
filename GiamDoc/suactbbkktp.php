<?php
include("KetNoi.php");
$p = new GiamDoc();

// Thêm biến để giữ giá trị maKho
$maKho = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/cssNVKK.css" />
    <script></script>
    <title>Xem bản kiểm kê</title>
</head>
<style>
       .back{
  float: right;
  margin-top: 30px;
  margin-right: 8%;
  margin-bottom: 40px;
}

    .back button a {
        color: white;
    }


.back button{
  background-color: var(--button-color);
  padding: 14px 28px;
  border: none;
  cursor: pointer;
  color: var(--while-color);
  font-size: 1.6em;
  margin-bottom: 40px;
}
    </style>
<body>
    <?php
        include("header.php");
    ?>
    
    <main style="background-color: rgb(248, 248, 248); margin-top: 110px; height: auto" class="container">
    <form action="#" method="post" enctype="multipart/form-data">
            <h2 class="title">XEM BIÊN BẢN KIỂM KÊ</h2>
            <?php
                if (isset($_REQUEST['maBBKK'])) {
                    $maBBKK = $_REQUEST['maBBKK'];
                }
                $p->xuatUPCTBBKK("SELECT
                    nv.maKho, bb.maBBKK,
                    bb.ngayLapBB, tennvkk
                FROM bienbankiemke bb
                JOIN nhanvienkiemke nv ON bb.maNVKK = nv.maNVKK
                WHERE bb.maBBKK = '$maBBKK'");
            ?>
          
            <div class="listproduct">
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn vị tính</th>
                            <th>Số lượng</th>
                            <th>Kệ</th>
                            <th>Ngày sản xuất</th>
                            <th>Hạn sử dụng</th>
                            <th>Ghi Chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_REQUEST['maBBBTNVL'])) {
                                $maBBBTNVL = $_REQUEST['maBBBTNVL'];
                            }
                            $p->xuatUPLoBBKKTP("SELECT
                            bbkk.ngayLapBB,
                            kho.maKho,
                            ke.maKe,
                            ltp.maLoTP,
                            ltp.NSX,
                            ltp.NHH,
                            ltp.soLuong,
                            tp.tenThanhPham,
                            tp.donViTinh,
                            ctb.ghiChu
                        FROM bienbankiemke bbkk
                        JOIN chitietbbtp ctb ON bbkk.maBBKK = ctb.maBBKK
                        JOIN lothanhpham ltp ON ctb.maLoTP = ltp.maLoTP
                        JOIN ke ON ltp.maKe = ke.maKe
                        JOIN kho ON ke.maKho = kho.maKho
                        JOIN thanhpham tp ON ltp.maThanhPham = tp.maThanhPham
                        WHERE bbkk.maBBKK = '$maBBKK'");
                        ?>
                        <input type="hidden" name="maBBKK" value="<?php echo $maBBKK; ?>">
                    </tbody>
                </table>
            </div>
            <div class="back" style="margin-right: 14.5%;">
            <button ><a href="xembienbankiemke.php" style="color: while;">Quay lại</a></button>
        <button type="submit" name="submitbtn" style="background-color: #39a867;">Cập nhật </button>
    </div>
</form>
    </main>
    <?php 
    if (isset($_POST['submitbtn'])) {
    $maBBKK = $_POST['maBBKK'];
    $maLoTP = $_POST['maLoTP'];
    $soLuongMoiArray = $_POST['soLuongMoi'];

    foreach ($soLuongMoiArray as $soLuongMoi) {
        // Update the quantity in the database
        $updateQuery = "UPDATE  lothanhpham l
        JOIN chitietbbtp ct ON l.maLoTP = ct.maLoTP
        JOIN bienbankiemke bbkk ON bbkk.maBBKK = ct.maBBKK
        SET l.soLuong = '$soLuongMoi'
        WHERE bbkk.maBBKK = '$maBBKK' ";
        
        if ($p->InsertUpdate($updateQuery)) {
            echo '<script language="javascript">
                    alert("Cập nhật thành phẩm thành công ");
                    window.location.href = "xembienbankiemke.php";
                  </script>';
        } else {
            echo 'Lỗi trong quá trình cập nhật';
        }
    }
}

?>  
    <script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
    <?php
        include("footer.php");
    ?>
</body>
</html>
