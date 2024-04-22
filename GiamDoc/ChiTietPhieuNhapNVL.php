<?php
include("KetNoi.php");
$p = new GiamDoc();
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

    <title>Document</title>
</head>
<style>
 section { 
    padding-top: 150px;
    margin-left: 50px;
    margin-right: 50px;
}
    
</style>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
        <section>
   <main>
    <h1 style="text-align: center">PHIẾU NHẬP NGUYÊN VẬT LIỆU</h1>
   			 <?php
			   if (isset($_REQUEST['maPNNVL']))
					{
						$maPNNVL = $_REQUEST['maPNNVL'];
					}
						 $p->xuatCTPhieuNNVL("SELECT *
										FROM phieunnvl
										INNER JOIN kho ON phieunnvl.maKho = kho.maKho
										INNER JOIN nhanvienkho ON kho.maNVKho = nhanvienkho.maNhanVien
										WHERE phieunnvl.maPNNVL = '$maPNNVL'");
       
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
                    </tr>
                </thead>
                <tbody>
                  <?php
					   if (isset($_REQUEST['maPNNVL']))
							{
								$maPNNVL = $_REQUEST['maPNNVL'];
							}
								 $p->xuatLoPhieuNNVL("SELECT *
								FROM longuyenvatlieu
								INNER JOIN ke ON longuyenvatlieu.maKe = ke.maKe
								INNER JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
								INNER JOIN phieunnvl ON longuyenvatlieu.maPNNVL = phieunnvl.maPNNVL WHERE phieunnvl.maPNNVL = '$maPNNVL'
									");
					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back" >
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
   </main>
    </section>
   <?php
        include("footer.php");
    ?>
</body>
</html>
   
