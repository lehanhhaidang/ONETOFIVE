<?php
    include("KetNoi.php");
    $p = new GiamDoc();

    if (isset($_REQUEST['maKeHoachSX'])) {
        $maKeHoachSX = $_REQUEST['maKeHoachSX'];
    }
 if (isset($_REQUEST['edit'])) {
        $maKeHoachSX = $_REQUEST['maKeHoachSX'];
    }
    if (isset($_REQUEST['delete'])) {
        $delete = $_REQUEST['delete'];
        
        $p->xoaDonMuaNVL($delete);

        header("Location: DonMuaNVL.php");
        exit();
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
    <link rel="stylesheet" href="./css/cssNVK.css">
    <title>Chi tiết đơn mua NVL</title>
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
</head>
<body> 
    <header>
         <?php
            include("header.php");
        ?>
    </header>
    <section>
        <div class="khung"> 
        <?php
	   if (isset($_REQUEST['maDonMuaNVL']))
			{
				$maDonMuaNVL = $_REQUEST['maDonMuaNVL'];
			}
				$p -> xuatCTDMNVL("select * from DonMuaNVL where maDonMuaNVL = '$maDonMuaNVL'");
			
			?>
            
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên nguyên vật liệu</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					   if (isset($_REQUEST['maDonMuaNVL']))
							{
								$maDonMuaNVL = $_REQUEST['maDonMuaNVL'];
                                $tinhTrang = $p->KtraTinhTrangDMNVL($maDonMuaNVL);
							}
                            if ($tinhTrang == '' || $tinhTrang == 1){
                                $p->xuatLoKHSXNVL("SELECT 
                        DATE(ngayLap) as ngay,trangThai,
                        nguyenvatlieu.tenNguyenVatLieu,
                        SUM(longuyenvatlieu.soLuong) as soLuong,
                        nguyenvatlieu.donViTinh
                    FROM  
                        DonMuaNVL
                        INNER JOIN longuyenvatlieu ON DonMuaNVL.maDonMuaNVL = longuyenvatlieu.maDonMuaNVL
                        INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = longuyenvatlieu.maNguyenVatLieu
                    WHERE 
                        DonMuaNVL.maDonMuaNVL = '$maDonMuaNVL'
                    GROUP BY 
                        ngay, nguyenvatlieu.tenNguyenVatLieu, nguyenvatlieu.donViTinh
                    ORDER BY 
                        ngay ASC");

                            } else{
                                $p->xuatLoDMNVLChua("SELECT ctdmnvl.soLuong, nguyenvatlieu.tenNguyenVatLieu,nguyenvatlieu.donViTinh
                                FROM  DonMuaNVL
                                INNER JOIN  ctdmnvl ON DonMuaNVL.maDonMuaNVL =  ctdmnvl.maDonMuaNVL
                                INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = ctdmnvl.maNguyenVatLieu
                                WHERE DonMuaNVL.maDonMuaNVL = '$maDonMuaNVL' ");
                            }
							
                    ?>
                    
                </tbody>
            </table>
        </div>
            
        <form method="post" action="">
        <div class="back">
           
                <button ><a href="DonMuaNVL.php" style="color: while;">Quay lại</a></button>
                <button style="background-color: rgb(35, 161, 92)" type="submit" name="submit" id="submit" value="Duyệt Phiếu">Xác nhận</button>
            
        </div>
    </form>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
       </div> 
    </section>
   <?php
        include("footer.php");
        
?>
<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $tenDonMuaNVL = $_REQUEST['tenDonMuaNVL'];
            $maDonMuaNVL = $_REQUEST['maDonMuaNVL'];
            $trangThai=$_REQUEST['trangThai'];
            $tinhTrang=$_REQUEST['tinhTrang'];
            $tenNCC=$_REQUEST['tenNCC'];
            
                if ($p->InsertUpdate("UPDATE donmuanvl
                SET trangThai = 'Đã xử lý', tinhTrang = ''
                WHERE maDonMuaNVL = '$maDonMuaNVL';") == 1) {
                    echo '<script language="javascript">
                        alert("Chuyển trạng thái sang đã xử lý thành công");
                        window.location="DonMuaNVL.php?maDonMuaNVL='.$maDonMuaNVL.'";
                        </script>';
                } else {
                    echo 'Lỗi trong quá trình cập nhật';
                }
           
    }
    ?>
</body>
</html>
   
