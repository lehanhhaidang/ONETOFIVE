<?php
    include("KetNoi.php");
    $p = new GiamDoc();

    if (isset($_REQUEST['maKeHoachSX'])) {
        $maKeHoachSX = $_REQUEST['maKeHoachSX'];
    }
 if (isset($_REQUEST['edit'])) {
        $maKeHoachSX = $_REQUEST['maKeHoachSX'];
    }
    if (isset($_REQUEST['delete'])) {
        $delete = $_REQUEST['delete'];
        
        $p->xoaKeHoachSX($delete);

        header("Location: KeHoachSX.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/KeHoachSX.css">
    <title>Duyệt Phiếu xuất NVL</title>

</head>
<body> 
    <header>
         <?php
            include("header.php");
        ?>
    </header>
    <section>
        <div class="khung"> 
        <?php
	   if (isset($_REQUEST['maKeHoachSX']))
			{
				$maKeHoachSX = $_REQUEST['maKeHoachSX'];
			}
				$p -> xuatCTKHSX("select * from keHoachSX where maKeHoachSX = '$maKeHoachSX'");
			

			?>
            
        <div class="listproduct">
            <h1 style="text-align: center">Danh Sách thành phẩm</h1><br>
            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if (isset($_REQUEST['maKeHoachSX']))
			{
				$maKeHoachSX = $_REQUEST['maKeHoachSX'];
                  $tinhTrang = $p->KtraTinhTrang($maKeHoachSX);
                  if ($tinhTrang == '' || $tinhTrang == 1) {
                    $p->xuatLoKHSXTP("SELECT DISTINCT
                                    kehoachsx.*,
                                    thanhpham.*
                                FROM
                                    kehoachsx
                                INNER JOIN lothanhpham ON kehoachsx.maKeHoachSX = lothanhpham.maKeHoachSX
                                INNER JOIN thanhpham ON thanhpham.mathanhpham = lothanhpham.mathanhpham
                                WHERE
                                    kehoachsx.maKeHoachSX = '$maKeHoachSX'
                                    AND (
                                        thanhpham.mathanhpham, kehoachsx.maKeHoachSX
                                    ) IN (
                                        SELECT
                                            thanhpham.mathanhpham,
                                            MIN(kehoachsx.maKeHoachSX) AS min_maKeHoachSX
                                        FROM
                                            kehoachsx
                                        INNER JOIN lothanhpham ON kehoachsx.maKeHoachSX = lothanhpham.maKeHoachSX
                                        INNER JOIN thanhpham ON thanhpham.mathanhpham = lothanhpham.mathanhpham
                                        WHERE
                                            kehoachsx.maKeHoachSX = '$maKeHoachSX'
                                        GROUP BY
                                            thanhpham.mathanhpham
                                    );
                                ");
                         } else {
                         $p->xuatLoKHSXTPChua("SELECT * FROM thanhpham AS tp
                        JOIN ctkhsx AS ct ON tp.maThanhPham= ct.maThanhPham
                        JOIN kehoachsx AS kh ON ct.maKHSX= kh.maKeHoachSX
                        WHERE kh.maKeHoachSX= '$maKeHoachSX'
                    ");
                }
                    }    ?>
                  
                
                
                </tbody>
            </table>
        </div> <br>
            <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                    </tr>
                </thead>
                <tbody>
            <h1 style="text-align: center">Danh Sách nguyên vật liệu cần để sản xuất</h1>
                    <br>
                    <?php
                    
                    if ($tinhTrang == '' || $tinhTrang == 1) {
                        // Tình trạng là rỗng hoặc 1
                        $p->xuatLoKHSXNVL("SELECT DISTINCT
                            kehoachsx.*,
                            nguyenvatlieu.*
                        FROM
                            kehoachsx
                        INNER JOIN longuyenvatlieu ON kehoachsx.maKeHoachSX = longuyenvatlieu.maKeHoachSX
                        INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = longuyenvatlieu.maNguyenVatLieu
                        WHERE
                            kehoachsx.maKeHoachSX = '$maKeHoachSX'
                            AND (
                                nguyenvatlieu.maNguyenVatLieu, kehoachsx.maKeHoachSX
                            ) IN (
                                SELECT
                                    nguyenvatlieu.maNguyenVatLieu,
                                    MIN(kehoachsx.maKeHoachSX) AS min_maKeHoachSX
                                FROM
                                    kehoachsx
                                INNER JOIN longuyenvatlieu ON kehoachsx.maKeHoachSX = longuyenvatlieu.maKeHoachSX
                                INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = longuyenvatlieu.maNguyenVatLieu
                                WHERE
                                    kehoachsx.maKeHoachSX = '$maKeHoachSX'
                                GROUP BY
                                    nguyenvatlieu.maNguyenVatLieu
                            );
                        ");
                    } else {
                        // Tình trạng là 2
                        $p->xuatLoKHSXNVLChua("SELECT * FROM nguyenvatlieu AS nvl
                            JOIN ctkhsxnvl AS ct ON nvl.maNguyenVatLieu= ct.maNguyenVatLieu
                            JOIN kehoachsx AS kh ON ct.maKHSX= kh.maKeHoachSX
                            WHERE kh.maKeHoachSX= '$maKeHoachSX'
                        ");
                    }
                        
                ?>
                     </tbody>
            </table>
        </div>
            <div class="back">
            <a href="KeHoachSX.php"><button>Quay lại</button></a>
        </div>
       </div> 
    </section>
   <?php
        include("footer.php");
        
?>

</body>
</html>
   
