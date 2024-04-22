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
    <title>Chi tiết đơn hàng</title>
</head>
    <style>
        section{
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
    </header>
    <section>
        <h1 style="text-align: center">ĐƠN HÀNG</h1> 
       <?php
			 if (isset($_REQUEST['maDonHang']))
				{
				$maDonHang = $_REQUEST['maDonHang'];
				}
				$p->xuatDonHang("SELECT *
								FROM donhang
								WHERE maDonHang = '$maDonHang'");                 
			?>
            
            
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        
                    </tr>
                </thead>
                <tbody>
                  <?php
					   if (isset($_REQUEST['maDonHang']))
							{
								$maPXNVL = $_REQUEST['maDonHang'];
							}
								 $p->xuatLoTP("SELECT tenThanhPham, donViTinh, lothanhpham.soLuong FROM lothanhpham join  thanhpham on lothanhpham.maThanhPham=thanhpham.maThanhPham WHERE lothanhpham.maLoTP = 'LTP01' = '$maDonHang'
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
    </section>
   <?php
        include("footer.php");
        
?>

</body>
</html>
   
