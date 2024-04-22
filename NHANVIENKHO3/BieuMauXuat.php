<?php
include("myclass.php");
// Tạo một đối tượng của class func
$p = new func();
// Kết nối đến CSDL
$p->connect();
if (isset($_REQUEST['idBMX']))
	{
		$idBMX= $_REQUEST['idBMX'];	
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
    <link rel="stylesheet" href="./css/cssNVK.css">
    <script>


      </script>
    <title>Biểu mẫu xuất</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>

    <h1>BIỂU MẪU XUẤT KHO</h1>
    <h2>Mã biểu mẫu: <?php echo $idBMX ?></h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Tên người nhận:</b> <?php echo $p->pickColumn("select tenNguoiNhan from bieumauxuat
            where maBMXuat = '$idBMX' limit 1"); ?></p>
            <p><b>Ngày xuất:</b> <?php echo $p->pickColumn("select ngayXuat from bieumauxuat
            where maBMXuat = '$idBMX' limit 1"); ?></p>
            <p><b>Kho nhập:</b> <?php echo $p->pickColumn("SELECT kho.tenKho
            FROM bieumauxuat
            INNER JOIN kho ON bieumauxuat.maKho = kho.maKho
            WHERE bieumauxuat.maBMXuat = '$idBMX'"); ?></p>

            <h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách hàng hóa:</b></h2>
        </div>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Ngày hết hạn</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    $maKho = $p->pickColumn("select maKho from bieumauxuat where maBMXuat = '$idBMX'");
                    if(strpos($maKho,"KNVL") !== false)
                    {
                                 $p->DSLNVL("SELECT
                                    nv.tenNguyenVatLieu,
                                    lgl.soLuong,
                                    nv.donViTinh,
                                    lgl.NSX,
                                    lgl.NHH
                                FROM
                                    bieumauxuat bmx
                                    JOIN longuyenvatlieu lgl ON bmx.maBMXuat = lgl.maBMXuat
                                    JOIN nguyenvatlieu nv ON lgl.maNguyenVatLieu = nv.maNguyenVatLieu
                                WHERE
                                    bmx.maBMXuat = '$idBMX'"); 
                    }
                    else
                    {
                                $p->DSTP("SELECT
                                nv.tenThanhPham,
                                lgl.soLuong,
                                nv.donViTinh,
                                lgl.NSX,
                                lgl.NHH
                            FROM
                                bieumauxuat bmx
                                JOIN lothanhpham lgl ON bmx.maBMXuat = lgl.maBMXuat
                                JOIN thanhpham nv ON lgl.maThanhPham = nv.maThanhPham
                            WHERE
                                bmx.maBMXuat = '$idBMX'"); 
                    

                    }
                    
           
                    
                    
               
                    ?>
                    
                </tbody>
            </table>
        </div>
        
    </div>
  <?php
  $tenKho = $p->pickColumn("SELECT kho.tenKho
  FROM bieumauxuat
  INNER JOIN kho ON bieumauxuat.maKho = kho.maKho
  WHERE bieumauxuat.maBMXuat = '$idBMX'");
  $trangThai = $p-> pickColumn("select trangThai from bieumauxuat where maBMXuat = '$idBMX'");
if($trangThai == null)
{
    echo '<div class ="create">';
    if($tenKho === 'Kho Nguyên Vật Liệu 01' || $tenKho === 'Kho Nguyên Vật Liệu 02' || $tenKho === 'Kho Nguyên Vật Liệu 03' || 
    $tenKho === 'Kho Nguyên Vật Liệu 04' )
    {
      echo '
  
      <a href="LapPhieuXuatNVL.php?idBMX='.$idBMX.'"><button>Lập phiếu</button></a>
      </div>';
     
  
    }
    elseif($tenKho === 'Kho Thành Phẩm 01' || $tenKho === 'Kho Thành Phẩm 02' || 
    $tenKho === 'Kho Thành Phẩm 03' || $tenKho === 'Kho Thành Phẩm 04'|| $tenKho === 'Kho Thành Phẩm 05' || 
    $tenKho === 'Kho Thành Phẩm 06')
    { 
      echo'<a href="LapPhieuXuatTP.php?idBMX='.$idBMX.'"><button>Lập phiếu</button></a>
      </div>';
    }
}
  
  
    echo ' <div class ="cancel">
    <a href="DSBieuMauXuat.php"><button>Quay lại</button></a>';
        
    echo'</div>
  
   </main>';

   ?>

   <?php
        include("footer.php");
    ?>
</body>
</html>
   
