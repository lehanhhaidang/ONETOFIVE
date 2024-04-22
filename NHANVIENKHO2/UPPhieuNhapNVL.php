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
	  <form action="" method="POST">
    <h1>PHIẾU NHẬP NGUYÊN VẬT LIỆU</h1>
    <?php
	   if (isset($_REQUEST['maBBBTNVL']))
			{
				$maBBBTNVL = $_REQUEST['maBBBTNVL'];
			}

				 $p->xuatCTUDPhieuNNVL("SELECT pn.maPNNVL, pn.tenNguoiGiao, pn.ngayNhap, kh.tenKho, nk.tenNVKho, pn.ngayLap, ct.maBBBTNVL
					FROM phieunnvl AS pn
					JOIN bienbanboithuongnvl AS bb ON pn.maPNNVL = bb.maPNNVL
					JOIN chitietbbbtnvl AS ct ON bb.maBBBTNVL = ct.maBBBTNVL
					JOIN longuyenvatlieu AS ln ON ct.maLoNVL = ln.maLoNVL
					JOIN nguyenvatlieu AS nv ON ln.maNguyenVatLieu = nv.maNguyenVatLieu
					JOIN ke AS k ON ln.maKe = k.maKe
					JOIN kho AS kh ON pn.maNVKho = kh.maNVKho
					JOIN nhanvienkho AS nk ON kh.maNVKho = nk.maNhanVien
					WHERE bb.maBBBTNVL = '$maBBBTNVL' limit 1");
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
                        <th>Lí do</th>
                    </tr>
                </thead>
                <tbody>
					 <?php
	   if (isset($_REQUEST['maBBBTNVL']))
			{
				$maBBBTNVL = $_REQUEST['maBBBTNVL'];
			}

				 $p->xuatLoUDBBBTNVL("SELECT nv.tenNguyenVatLieu, nv.tennguyenvatlieu, k.tenKe, ln.NSX, ln.NHH,donViTinh,soLuongThucTe,lyDo
					FROM phieunnvl AS pn
					JOIN bienbanboithuongnvl AS bb ON pn.maPNNVL = bb.maPNNVL
					JOIN chitietbbbtnvl AS ct ON bb.maBBBTNVL = ct.maBBBTNVL
					JOIN longuyenvatlieu AS ln ON ct.maLoNVL = ln.maLoNVL
					JOIN nguyenvatlieu AS nv ON ln.maNguyenVatLieu = nv.maNguyenVatLieu
					JOIN ke AS k ON ln.maKe = k.maKe
					JOIN kho AS kh ON pn.maKho = kh.maKho
					JOIN nhanvienkho AS nk ON kh.maNVKho = nk.maNhanVien
					WHERE bb.maBBBTNVL = '$maBBBTNVL'");
			?>
					 <input type="hidden" name="maBBBTNVL" value="<?php echo $maBBBTNVL; ?>">
                </tbody>
            </table>
        </div>
        
    </div>
<div class="back">
    <a id="goBackButton">
        <button>Quay lại</button>
    </a>
    <button type="submit" name="capNhat" style="margin-left: 30px; background-color: rgb(47, 120, 222);">Cập nhật</button>
</div>

<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>


<?php
if (isset($_POST['capNhat'])) {
    $maBBBTNVL = $_REQUEST['maBBBTNVL'];
    $maPNNVL = $_REQUEST['maPNNVL'];
    $maLoNVL = $_REQUEST['maLoNVL'];
    $soLuongThucTe = $_REQUEST['soLuongThucTe'];
	$tinhTrang = $row['tinhTrang'];

    $sql = "UPDATE longuyenvatlieu AS ln
            JOIN chitietbbbtnvl AS ct ON ln.maLoNVL = ct.maLoNVL
            JOIN bienbanboithuongnvl AS bb ON ct.maBBBTNVL = bb.maBBBTNVL
            JOIN phieunnvl AS pn ON bb.maPNNVL = pn.maPNNVL
            SET ln.soLuong = ct.soLuongThucTe , ln.ghiChu = ct.lyDo, bb.tinhTrang ='Đã cập nhật'
            WHERE bb.maBBBTNVL = '$maBBBTNVL'";

    if ($p->themxoasua($sql) == 1) {
        echo '<script language="javascript">
            alert("Cập nhật phiếu nhập nguyên vật liệu thành công");
            </script>';
    } else {
        echo 'Lỗi trong quá trình cập nhật';
    }
}
?>

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
   
