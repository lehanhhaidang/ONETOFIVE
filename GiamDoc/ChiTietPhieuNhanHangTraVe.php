<?php
include("classnvkq.php");
$p = new nhanvienkhoquoc();
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
    <script>


      </script>
    <title>Document</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>
    <h1> Xem Phiếu Nhận Hàng Trả Về </h1>
   			 <?php
			   if (isset($_REQUEST['maPNHTV']))
               {
                   $maPNHTV = $_REQUEST['maPNHTV'];
               }
                    $p->xuatpnhtv("SELECT
                    p.maPNHTV,
                    p.maDonHang,
                    p.lyDoTraHang,
                    p.ngayLapPhieu,
                    d.tenKhachHang
                FROM
                    phieunhanhangtrave p
                JOIN
                    donhang d ON p.maDonHang = d.maDonHang
                WHERE
                    p.maPNHTV = '$maPNHTV';
                ;
                
                    ");
                          
                                        
			?>
            
            
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Ngày hết hạn</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                  <?php
					   if (isset($_REQUEST['maPNHTV']))
							{
								$maPNHTV = $_REQUEST['maPNHTV'];
							}
								 $p->xuatttPNHTV("SELECT
                                 
                                 tp.tenThanhPham,
                                 tp.donViTinh,
                                 ltp.soLuong,
                                 ltp.NSX,
                                 ltp.NHH
                             FROM
                                 phieunhanhangtrave pnhtv
                             JOIN
                                 lothanhpham ltp ON pnhtv.maDonHang = ltp.maDonHang
                             JOIN
                                 thanhpham tp ON ltp.maThanhPham = tp.maThanhPham
                             WHERE
                                 pnhtv.maPNHTV = '$maPNHTV';
                             
                              
                             
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
   <?php
        include("footer.php");
    ?>
</body>
</html>
   
