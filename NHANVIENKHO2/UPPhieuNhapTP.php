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
    <title>Cập nhật phiếu nhập thành phẩm</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>
	  <form action="" method="POST">
    <h1>PHIẾU NHẬP THANH PHẨM</h1>
    <?php
	   if (isset($_REQUEST['maBBBTTP']))
			{
				$maBBBTTP = $_REQUEST['maBBBTTP'];
			}

				 $p->xuatCTUDPhieuNTP("SELECT pn.maPNTP, pn.tenNguoiGiao, pn.ngayNhap, kh.tenKho, nk.tenNVKho, pn.ngayLap, ct.maBBBTTP
					FROM phieuntp AS pn
					JOIN bienbanboithuongtp AS bb ON pn.maPNTP = bb.maPNTP
					JOIN chitietbbbttp AS ct ON bb.maBBBTTP = ct.maBBBTTP
					JOIN lothanhpham AS ln ON ct.maLoTP = ln.maLoTP
					JOIN thanhpham AS nv ON ln.maThanhPham = nv.maThanhPham
					JOIN ke AS k ON ln.maKe = k.maKe
					JOIN kho AS kh ON pn.maNVKho = kh.maNVKho
					JOIN nhanvienkho AS nk ON kh.maNVKho = nk.maNhanVien
					WHERE bb.maBBBTTP = '$maBBBTTP' limit 1");
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
	   if (isset($_REQUEST['maBBBTTP']))
			{
				$maBBBTTP = $_REQUEST['maBBBTTP'];
			}

				 $p->xuatLoUDBBBTTP("SELECT nv.tenThanhPham, nv.tenThanhPham, k.tenKe, ln.NSX, ln.NHH,donViTinh,soLuongThucTe,lyDo
					FROM phieuntp AS pn
					JOIN bienbanboithuongtp AS bb ON pn.maPNTP = bb.maPNTP
					JOIN chitietbbbttp AS ct ON bb.maBBBTTP = ct.maBBBTTP
					JOIN lothanhpham AS ln ON ct.maLoTP = ln.maLoTP
					JOIN thanhpham AS nv ON ln.maThanhPham = nv.maThanhPham
					JOIN ke AS k ON ln.maKe = k.maKe
					JOIN kho AS kh ON pn.maKho = kh.maKho
					JOIN nhanvienkho AS nk ON kh.maNVKho = nk.maNhanVien
					WHERE bb.maBBBTTP = '$maBBBTTP'");
			?>
					
					 <input type="hidden" name="maBBBTTP" value="<?php echo $maBBBTTP; ?>">
					<input type="hidden" name="tinhTrang" value="<?php echo $p->pickColumn("SELECT tinhTrang FROM bienbanboithuongtp WHERE maBBBTTP = '$maBBBTTP' LIMIT 1"); ?>">
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
         <a href="ChiTietBBBTTP.php?maBBBTTP=<?php echo $maBBBTTP; ?>" class="btn-reset" style="padding: 14px 30px;background-color:#233d5a ; color: #fff;  font-size: 1.6em">Quay lại</a>
        <button type="submit" name="capNhat" style="margin-left: 30px; background-color: rgb(47, 120, 222);">Cập nhật</button>
    </div>
	   		
<?php
if (isset($_POST['capNhat'])) {
    $maBBBTTP = $_REQUEST['maBBBTTP'];
    $maPNTP = $_REQUEST['maPNTP'];
    $maLoTP = $_REQUEST['maLoTP'];
    $soLuongThucTe = $_REQUEST['soLuongThucTe'];
	$tinhTrang = $_REQUEST['tinhTrang'];
    $sql = "UPDATE lothanhpham AS ln
            JOIN chitietbbbttp AS ct ON ln.maLoTP = ct.maLoTP
            JOIN bienbanboithuongtp AS bb ON ct.maBBBTTP = bb.maBBBTTP
            JOIN phieuntp AS pn ON bb.maPNTP = pn.maPNTP
            SET ln.soLuong = ct.soLuongThucTe , ln.ghiChu = ct.lyDo, bb.tinhTrang ='Đã cập nhật'
            WHERE bb.maBBBTTP = '$maBBBTTP'";
 if ($tinhTrang != 'Đã cập nhật')
 {
	  if ($p->themxoasua($sql) == 1) {
        echo '<script language="javascript">
            alert("Cập nhật phiếu nhập thành phẩm thành công");
            </script>';
    } else {
        echo 'Lỗi trong quá trình cập nhật';
    }
 } else
 {
	 echo '<script language="javascript">
            alert("Phiếu đã cập nhật");
            </script>';
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
   
