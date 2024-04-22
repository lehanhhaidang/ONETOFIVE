<?php
include("class/classnvk.php");
$p = new nhanvienkho();
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
    <h1>PHIẾU XUẤT THÀNH PHẨM</h1>
   			 <?php
			   if (isset($_REQUEST['maPXTP']))
					{
						$maPXTP = $_REQUEST['maPXTP'];
					}
						 $p->xuatCTPhieuXTP("SELECT *
										FROM phieuxtp
										INNER JOIN kho ON phieuxtp.maKho = kho.maKho
										INNER JOIN nhanvienkho ON kho.maNVKho = nhanvienkho.maNhanVien
										WHERE phieuxtp.maPXTP = '$maPXTP'");
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
					   if (isset($_REQUEST['maPXTP']))
							{
								$maPXTP = $_REQUEST['maPXTP'];
							}
								 $p->xuatLoPhieuXTP("SELECT *
								FROM lothanhpham
								INNER JOIN ke ON lothanhpham.maKe = ke.maKe
								INNER JOIN thanhpham ON lothanhpham.maThanhPham = thanhpham.maThanhPham
								INNER JOIN phieuxtp ON lothanhpham.maPXTP = phieuxtp.maPXTP WHERE phieuxtp.maPXTP = '$maPXTP'
									");
					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
       <a href="PhieuXuatTP.php">
               <button>Quay lại</button>
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
   
