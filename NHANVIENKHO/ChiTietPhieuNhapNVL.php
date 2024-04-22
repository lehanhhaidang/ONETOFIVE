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
    <h1>PHIẾU NHẬP NGUYÊN VẬT LIỆU</h1>
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
                        <th>Ngày hết hạn</th>
						<th>Ghi Chú</th>
                    </tr>
                </thead>
                <tbody>		 
					<?php
					   if (isset($_REQUEST['maPNNVL']))
							{
								$maPNNVL = $_REQUEST['maPNNVL'];
							}
								 $p->xuatLoPhieuNNVL("SELECT 
    longuyenvatlieu.*, 
    ke.*, 
    nguyenvatlieu.*, 
    phieunnvl.*, 
    CASE 
        WHEN longuyenvatlieu.ghiChu IS NOT NULL AND longuyenvatlieu.ghiChu <> '' 
        THEN bienbanboithuongnvl.maBBBTNVL 
        ELSE NULL 
    END AS maBBBTNVL
FROM 
    longuyenvatlieu
INNER JOIN ke ON longuyenvatlieu.maKe = ke.maKe
INNER JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
INNER JOIN phieunnvl ON longuyenvatlieu.maPNNVL = phieunnvl.maPNNVL
LEFT JOIN bienbanboithuongnvl ON phieunnvl.maPNNVL = bienbanboithuongnvl.maPNNVL
WHERE phieunnvl.maPNNVL =  '$maPNNVL';");
					?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="back">
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
        <a href="LapBBBTNVL.php?maPNNVL=<?php echo $_REQUEST['maPNNVL'] ?>">
    <button style="background-color: red; padding: 14px 28px; border: none; cursor: pointer; color: var(--while-color); font-size: 1.6em; margin-bottom: 40px; text-decoration: none; display: inline-block;">Lập Phiếu</button>
</a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>

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
   
