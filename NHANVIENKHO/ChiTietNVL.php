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
    <title>Chi tiết nguyên vật liệu</title>
</head>
<body> 
    <?php
        include("header.php");
    ?>
   <main>
	    <?php
	   if (isset($_REQUEST['maNguyenVatLieu']))
			{
				$manvl = $_REQUEST['maNguyenVatLieu'];
			}
				 $p->xuatTenNVL("SELECT *
								FROM nguyenvatlieu
								WHERE nguyenvatlieu.maNguyenVatLieu = '$manvl'");
		?>
    <div class="warehouse">
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Vị trí lưu trữ</th>
                        <th>Đơn vị tính</th>
                        <th>Số Lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Ngày hết hạn</th>
                    </tr>
                </thead>
                <tbody>
					  <?php
					   if (isset($_REQUEST['maNguyenVatLieu']))
							{
								$manvl = $_REQUEST['maNguyenVatLieu'];
							}
								 $p->xuatChiTietNVL("SELECT * FROM nguyenvatlieu
									INNER JOIN longuyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = longuyenvatlieu.maNguyenVatLieu
									WHERE nguyenvatlieu.maNguyenVatLieu = '$manvl'");
						?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
        <a href="TP-NVL.php">
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
   
