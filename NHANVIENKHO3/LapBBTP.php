<?php
include_once("./class/classnvkq.php");
$p = new nhanvienkhoquoc();
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
      function cancelAction() {
          alert('Hủy thành công');

          window.location = 'PhieuNhapTP.php';
      }
    </script>
    <title>Lập Biên Bản Bồi Thường TP</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>

    
    <h1>  Lập Biên Bản Bồi Thường Thành Phẩm </h1>
   			 <?php
			   if (isset($_REQUEST['maPNTP']))
					{
						$maPNTP = $_REQUEST['maPNTP'];
						 $p->lapTrenLBBBTTP("SELECT
                         phieuntp.maPNTP,
                         phieuntp.tenNguoiGiao AS tenNguoiGiaoPhieuTP,
                         kho.tenKho
                     FROM
                         phieuntp
                     JOIN
                         kho ON phieuntp.maKho = kho.maKho
                     JOIN
                         nhanvienkho ON kho.maNVKho = nhanvienkho.maNhanVien
                     WHERE
                         phieuntp.maPNTP = '$maPNTP';
                     
                     
                         ");
					}

                                        
                          
                                        
			?>
            
            
        <div class="listproduct">
            <form action="#">
            <table>
                <thead>
                    <tr>
                    <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Số Lượng Thực Tế</th>
                        <th>Kệ</th>
                        <th>Lô</th>
                        <th>Ngày sản xuất</th>
                        <th>Ngày hết hạn</th>
                        <th>Lý Do</th>

                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <div class="back">
                        <?php
                            $maDonHang = $_REQUEST['maPNTP'];
                            $dateht = date("d-m-Y");
                            $maphieu = $p->maPNHTVTuDongTangBBBTTP();
                        ?>

                        <input type="hidden" name="maPNNVL" value="<?php echo $maDonHang; ?>">
                        <input type="hidden" name="ngayLapPhieu" value="<?php echo $dateht; ?>">
                        <input type="hidden" name="maBBBTNVL" value="<?php echo $maphieu; ?>">
                   
                
                    </div>
                  <?php
					   if (isset($_REQUEST['maPNTP']))
							{
								$maPNTP = $_REQUEST['maPNTP'];
							}
								 $p->LapduoiBBBTTP("SELECT
                                 tp.tenThanhPham,
                                 tp.donViTinh AS donViTinhThanhPham,
                                 ltp.maLoTP,
                                 ltp.soLuong,
                                 ltp.NSX,
                                 ltp.NHH,
                                 k.tenKe
                             FROM
                                 lothanhpham ltp
                             JOIN thanhpham tp ON ltp.maThanhPham = tp.maThanhPham
                             JOIN ke k ON ltp.maKe = k.maKe
                             WHERE
                                 ltp.maPNTP = '$maPNTP';
                             

									");


					?>
                </tbody>
            </table>
            <div class="back">

            <button type="reset" class="buttonCancel" onclick="cancelAction()">Hủy</button>
                   
                       <input type="submit" name="btnlapphieu" style="background-color: red; padding: 14px 28px; border: none; cursor: pointer; color: var(--while-color); font-size: 1.6em; margin-bottom: 40px; text-decoration: none; display: inline-block;" value="Lập phiếu">
            </div>
            </form>

        </div>
        
    </div>
    <?php
              
              if(isset($_REQUEST["btnlapphieu"])){
                 
                 
                // $lyDoTraHang = $_REQUEST["lyDoTraHang"];
                $maPNNVL = $_REQUEST["maPNNVL"];
                $ngayLapPhieu = $_REQUEST["ngayLapPhieu"];
                $maBBBTNVL = $_REQUEST["maBBBTNVL"];

                $ghichu = $_REQUEST['note']['ghichu'];
                // echo $_REQUEST['note']['mabbkk'];
                // Xử lý và in ra các dữ liệu ghi chú

                $dembt=0;
                //kiemtra rong
                foreach ($ghichu as $index => $value) {
                    // Kiểm tra xem ghi chú có được nhập không
                        if (!empty($value)) {
                            $dembt++;
                        }
                }
                if($dembt == 0){
                    echo "<script>alert('Lập Phiếu không thành công vì rỗng!')</script>";
                    echo "<script> window.location='PhieuNhapTP.php'</script>";
                }else{

                    $kq = $p->lapbienbanbtmoi($maBBBTNVL, $maPNNVL);
                    if($kq == 1){
                        foreach ($ghichu as $index => $value) {
                        // Kiểm tra xem ghi chú có được nhập không
                            if (!empty($value)) {
                                // echo "Dòng $index - Ghi chú: $value<br>";
                                // echo $_REQUEST['note']['malo'][$index];
                                $maLoNVL = $_REQUEST['note']['malo'][$index];
                                $soLuongThucTe =  $_REQUEST['note']['soluong'][$index];
                                if($soLuongThucTe == 0){
                                    $soLuongThucTe = $_REQUEST['note']['sl'][$index];
                                }
                                // echo $maLoNVL;
                                // echo $soLuongThucTe;
                                // echo $value;
                                // echo $maPNNVL;
                                // echo $maBBBTNVL;
                                // $p->lapbienbanbt($maBBBTNVL, $maPNNVL, $maLoNVL, $value ,$soLuongThucTe);
                                $p->lapbienbanbt($maBBBTNVL, $maPNNVL,  $maLoNVL,$value  ,$soLuongThucTe);
                                // echo "<script> window.location='PhieuNhapTP.php'</script>";
                            }
                            
                            // $p->themLappnhtv($maPNHTV, $ngayLapPhieu,$lyDoTraHang,$maDonHang);
                            
                        }
                        echo "<script>alert('Lập Phiếu Thành Công')</script>";
                        echo "<script> window.location='PhieuNhapTP.php'</script>";
    
                     }elseif($kq == 0){
                        echo "<script>alert('Đã tồn tại bienbanboithuongtp với maPNTP = $maPNNVL')</script>";
                        echo "<script> window.location='PhieuNhapTP.php'</script>";
                    }
                }
            }
      

              
    ?>
    <!-- <form action="#">
        <div class="back">
            <?php
                 $maDonHang = $_REQUEST['maPNNVL'];
                 $dateht = date("d-m-Y");
                $maphieu = $p->maPNHTVTuDongTangBBBTNVL();
            ?>

            <input type="hidden" name="maPNNVL" value="<?php echo $maDonHang; ?>">
            <input type="hidden" name="ngayLapPhieu" value="<?php echo $dateht; ?>">
            <input type="hidden" name="maBBBTNVL" value="<?php echo $maphieu; ?>">
           <a href="TrangChuNVK.php">
                   <button>Quay lại</button>
            </a>
       
        <input type="submit" name="btnlapphieu" style="background-color: red; padding: 14px 28px; border: none; cursor: pointer; color: var(--while-color); font-size: 1.6em; margin-bottom: 40px; text-decoration: none; display: inline-block;" value="Lập phiếu">
    
        </div>
    </form> -->
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
   
