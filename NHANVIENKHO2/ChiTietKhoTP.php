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
    <?php
        include("header.php");
    ?>
   <main>
  		<?php
	   if (isset($_REQUEST['maKho']))
			{
				$makho = $_REQUEST['maKho'];
			}
				$p -> xuatchitietkho("select * from kho where maKho = '$makho'");
			
			?>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên kệ</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Hạn sử dụng</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					   if (isset($_REQUEST['makho']))
							{
								$makho = $_REQUEST['makho'];
							}
							 $p->xuatLoKhoTP("SELECT *
									   FROM kho
									   INNER JOIN ke ON kho.maKho = ke.maKho
									   INNER JOIN lothanhpham ON ke.maKe = lothanhpham.maKe
									   INNER JOIN thanhpham ON lothanhpham.maThanhPham = thanhpham.maThanhPham
									   WHERE kho.maKho = '$makho'  AND lothanhpham.maPXTP IS NULL");


					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
       <a href="Kho.php"><button>Quay lại</button></a> 
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
   
