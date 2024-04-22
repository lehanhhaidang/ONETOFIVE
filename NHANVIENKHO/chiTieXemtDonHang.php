<?php
include("class/classnvkq.php");
$p = new nhanvienkhoquoc()
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
    <h1>  ĐƠN HÀNG </h1>
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
								$maDonHang = $_REQUEST['maDonHang'];
							}
								 $p->xuatLoTP("SELECT
    
                                 tp.tenThanhPham,
                                 tp.donViTinh,
                                 lh.soLuong
                             FROM
                                 lothanhpham lh
                             JOIN
                                 thanhpham tp ON lh.maThanhPham = tp.maThanhPham
                             JOIN
                                 donhang dh ON lh.maDonHang = dh.maDonHang
                             WHERE
                                 dh.maDonHang = '$maDonHang';

									");


					?>
                </tbody>
            </table>
            
        </div>
        
    </div>
    <div class="back">
       <a href="TrangChuNVK.php">
               <button>Quay lại</button>
        </a>

        <a href="LapPhieuNhanHangTraVe.php?maDonHang=<?php echo $_REQUEST['maDonHang'] ?>">
    <button style="background-color: red; padding: 14px 28px; border: none; cursor: pointer; color: var(--while-color); font-size: 1.6em; margin-bottom: 40px; text-decoration: none; display: inline-block;">Lập Phiếu</button>
</a>

        
    </div>
    
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
   
