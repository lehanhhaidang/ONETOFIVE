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
    <h1>PHIẾU NHẬP THÀNH PHẨM</h1>
	   <?php
	   if (isset($_REQUEST['maPNTP']))
			{
				$maPNTP = $_REQUEST['maPNTP'];
			}
				 $p->xuatCTPhieuNTP("SELECT *
								FROM phieuntp
								INNER JOIN kho ON phieuntp.maKho = kho.maKho
								INNER JOIN nhanvienkho ON kho.maNVKho = nhanvienkho.maNhanVien
								WHERE phieuntp.maPNTP = '$maPNTP'");
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
                        <th>Ngày hết hạn</th>
						<th>Ghi Chú</th>
                    </tr>
                </thead>
                <tbody>		 
					<?php
					   if (isset($_REQUEST['maPNTP']))
							{
								$maPNTP = $_REQUEST['maPNTP'];
							}
								 $p->xuatLoPhieuNTP("SELECT 
    lothanhpham.*, 
    ke.*, 
    thanhpham.*, 
    phieuntp.*, 
    CASE 
        WHEN lothanhpham.ghiChu IS NOT NULL AND lothanhpham.ghiChu <> '' 
        THEN bienbanboithuongtp.maBBBTTP 
        ELSE NULL 
    END AS maBBBTTP
FROM 
   lothanhpham
INNER JOIN ke ON lothanhpham.maKe = ke.maKe
INNER JOIN thanhpham ON lothanhpham.maThanhPham = thanhpham.maThanhPham
INNER JOIN phieuntp ON lothanhpham.maPNTP = phieuntp.maPNTP
LEFT JOIN bienbanboithuongtp ON phieuntp.maPNTP = bienbanboithuongtp.maPNTP
WHERE phieuntp.maPNTP =  '$maPNTP';");
					?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="back">
		<a href="PhieuNhapTP.php">
               <button>Quay lại</button>
        </a> <a href="lapBBTP.php?maPNTP=<?php echo $_REQUEST['maPNTP'] ?>">
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
   
