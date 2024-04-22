<?php
include("class/classnvkq.php");
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
      function cancelAction() {
          alert('Hủy thành công');

          window.location = 'donhang.php';
      }
    </script>
    <title>Lập Phiếu Nhận Hàng Trả Về</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>

    
    <h1>  Lập Phiếu Nhận Hàng Trả Về </h1>
   			 <?php
			   if (isset($_REQUEST['maDonHang']))
					{
						$maDonHang = $_REQUEST['maDonHang'];
					}
						 $p->lapTrenPNHTV("SELECT tenKhachHang, maDonHang
                         FROM donhang
                         WHERE maDonHang = '$maDonHang';
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
					   if (isset($_REQUEST['maDonHang']))
							{
								$maDonHang = $_REQUEST['maDonHang'];
							}
								 $p->LapduoiPNHTV("SELECT
                                 lp.maDonHang,
                                 tp.tenThanhPham,
                                 tp.donViTinh,
                                 lp.soLuong,
                                 lp.NSX,
                                 lp.NHH
                             FROM
                                 lothanhpham lp
                             JOIN
                                 thanhpham tp ON lp.maThanhPham = tp.maThanhPham
                             WHERE
                                 lp.maDonHang = '$maDonHang';
                             

									");


					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <?php
              
              if(isset($_REQUEST["btnlapphieu"])){
                 
                 
                $lyDoTraHang = $_REQUEST["lyDoTraHang"];
                $maDonHang = $_REQUEST["maDonHang"];
                $ngayLapPhieu = $_REQUEST["ngayLapPhieu"];
                $maPNHTV = $_REQUEST["maPNHTV"];


                $p->themLappnhtv($maPNHTV, $ngayLapPhieu,$lyDoTraHang,$maDonHang);
              
               
                echo "<script> window.location='donhang.php'</script>";
              }
      

              
    ?>
    <form action="#">
        <div class="back">
            <?php
                 $maDonHang = $_REQUEST['maDonHang'];
                 $dateht = date("d-m-Y");
                $maphieu = $p->maPNHTVTuDongTang();
            ?>
            <p><b style="font-size:15px">Lý do trả hàng</b> <input required type="text" name="lyDoTraHang" id=""></p><br>
            <input type="hidden" name="maDonHang" value="<?php echo $maDonHang; ?>">
            <input type="hidden" name="ngayLapPhieu" value="<?php echo $dateht; ?>">
            <input type="hidden" name="maPNHTV" value="<?php echo $maphieu; ?>">
            <button type="reset" class="buttonCancel" onclick="cancelAction()">Hủy</button>
       
        <input type="submit" name="btnlapphieu" style="background-color: red; padding: 14px 28px; border: none; cursor: pointer; color: var(--while-color); font-size: 1.6em; margin-bottom: 40px; text-decoration: none; display: inline-block;" value="Lập phiếu">
    
        </div>
    </form>
   </main>
   <?php
        include("footer.php");
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("searchIcon").addEventListener("click", function(event) {
            event.preventDefault();

            var searchValue = document.getElementById("searchInput").value;

            if (searchValue.trim() !== "") {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        window.location.href = "search_results.php?results=" + encodeURIComponent(JSON.stringify(response));
                    }
                };
                xhr.open("GET", "search.php?search_term=" + encodeURIComponent(searchValue), true);
                xhr.send();
            }
        });
    });
</script>
</body>
</html>
   
