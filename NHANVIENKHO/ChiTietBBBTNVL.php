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
    <title>Biên bản bồi thường nguyên vật liệu</title>
</head>
<body> 
   <?php
        include("header.php");
?>
   <main>
    <?php
	   if (isset($_REQUEST['maBBBTNVL']))
			{
				$maBBBTNVL = $_REQUEST['maBBBTNVL'];
			}
				 $p->xuatCTBBBTNVL("SELECT *
								FROM bienbanboithuongnvl
								WHERE bienbanboithuongnvl.maBBBTNVL = '$maBBBTNVL'");
		?>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
						<th>Lô</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn Vị Tính</th>
                        <th>Số lượng</th>
                        <th>Số lượng được giao</th>
                        <th>Ngày sản xuất</th>
                        <th>Hạn sử dụng</th>
                        <th>Ghi Chú</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            if (isset($_REQUEST['maBBBTNVL']))
                    {
                        $maBBBTNVL = $_REQUEST['maBBBTNVL'];
                    }
                        $p->xuatLoBBBTNVL("SELECT ln.maLoNVL, nv.tenNguyenVatLieu,
                        nv.donViTinh,
                        ln.soLuong,
                        ct.soLuongThucTe,
                        ln.NSX,
                        ln.NHH,
                        ct.lyDo
                        FROM bienbanboithuongnvl AS bb
                        JOIN chitietbbbtnvl AS ct ON bb.maBBBTNVL = ct.maBBBTNVL
                        JOIN longuyenvatlieu AS ln ON ct.maLoNVL = ln.maLoNVL
                        JOIN nguyenvatlieu AS nv ON ln.maNguyenVatLieu = nv.maNguyenVatLieu
                        WHERE ct.maBBBTNVL = '$maBBBTNVL'");

                ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
		<a href="BienBanBoiThuong.php"><button>Quay lại</button>
		</a>
        
		<?php
			echo '<a href="UPPhieuNhapNVL.php?maBBBTNVL='.$maBBBTNVL.'"><button style="background-color: #39a867;">Cập nhật phiếu nhập</button></a>';
		?>
		

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
   
