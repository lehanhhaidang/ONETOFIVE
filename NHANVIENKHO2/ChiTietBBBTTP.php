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
	   if (isset($_REQUEST['maBBBTTP']))
			{
				$maBBBTTP = $_REQUEST['maBBBTTP'];
			}
				 $p->xuatCTBBBTTP("SELECT *
								FROM bienbanboithuongtp
								WHERE bienbanboithuongtp.maBBBTTP = '$maBBBTTP'");
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
            if (isset($_REQUEST['maBBBTTP']))
                    {
                        $maBBBTTP = $_REQUEST['maBBBTTP'];
                    }
                        $p->xuatLoBBBTTP("SELECT ln.maLoTP, nv.tenThanhPham,
                        nv.donViTinh,
                        ln.soLuong,
                        ct.soLuongThucTe,
                        ln.NSX,
                        ln.NHH,
                        ct.lyDo
                        FROM bienbanboithuongtp AS bb
                        JOIN chitietbbbttp AS ct ON bb.maBBBTTP = ct.maBBBTTP
                        JOIN lothanhpham AS ln ON ct.maLoTP = ln.maLoTP
                        JOIN thanhpham AS nv ON ln.maThanhPham = nv.maThanhPham
                        WHERE ct.maBBBTTP = '$maBBBTTP'");

                ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
        <button>Quay lại</button>
		<?php
			echo '<a href="UPPhieuNhapTP.php?maBBBTTP='.$maBBBTTP.'"><button style="background-color: #39a867;">Cập nhật phiếu nhập</button></a>';
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
   
