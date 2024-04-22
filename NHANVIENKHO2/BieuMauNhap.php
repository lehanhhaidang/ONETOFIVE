<?php
include("myclass.php");
// Tạo một đối tượng của class func
$p = new func();
// Kết nối đến CSDL
$p->connect();
if (isset($_REQUEST['idBMN']))
	{
		$idBMN= $_REQUEST['idBMN'];	
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
    <title>Biểu mẫu nhập </title><param name="" value=""></title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>

    <h1>BIỂU MẪU NHẬP KHO</h1>
    <h2>Mã biểu mẫu: <?php echo $idBMN ?></h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Tên người giao:</b> <?php echo $p->pickColumn("select tenNguoiGiao from bieumaunhap
            where maBMNhap = '$idBMN' limit 1"); ?></p>
            <p><b>Ngày nhập:</b> <?php echo $p->pickColumn("select ngayNhap from bieumaunhap
            where maBMNhap = '$idBMN' limit 1"); ?></p>
            <p><b>Kho nhập:</b> <?php echo $p->pickColumn("SELECT kho.tenKho
FROM bieumaunhap
INNER JOIN kho ON bieumaunhap.maKho = kho.maKho
WHERE bieumaunhap.maBMNhap = '$idBMN'"); ?>
</p>

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
                    $p->DSSP("select * from chitietbieumaunhap where maBMNhap ='$idBMN'"); 
                    ?>
                    
                </tbody>
            </table>
        </div>
        
    </div>
  <?php
  $tenKho = $p->pickColumn("SELECT kho.tenKho
  FROM bieumaunhap
  INNER JOIN kho ON bieumaunhap.maKho = kho.maKho
  WHERE bieumaunhap.maBMNhap = '$idBMN'");
  $trangThai = $p-> pickColumn("select trangThai from bieumaunhap where maBMNhap = '$idBMN'");
  if($trangThai == null)
  {
    echo '<div class ="create">';
  if($tenKho === 'Kho Nguyên Vật Liệu 01' || $tenKho === 'Kho Nguyên Vật Liệu 02' || $tenKho === 'Kho Nguyên Vật Liệu 03' || 
  $tenKho === 'Kho Nguyên Vật Liệu 04' || $tenKho === 'Kho Nguyên Vật Liệu 05' || 
  $tenKho === 'Kho Nguyên Vật Liệu 06')
  {
    echo '

    <a href="LapPhieuNhapNVL.php?idBMN='.$idBMN.'"><button>Lập phiếu</button></a>
    </div>';
   

  }
  elseif($tenKho === 'Kho Thành Phẩm 01' || $tenKho === 'Kho Thành Phẩm 02' || 
  $tenKho === 'Kho Thành Phẩm 03' || $tenKho === 'Kho Thành Phẩm 04')
  { 
    echo'<a href="LapPhieuNhapTP.php?idBMN='.$idBMN.'"><button>Lập phiếu</button></a>
    </div>';
  }

  }

  
  
    echo ' <div class ="cancel">
    <a href="DSBieuMauNhap.php"><button>Quay lại</button></a>';
        
    echo'</div>
  
   </main>';
   ?>
   
   <?php
        include("footer.php");
    ?>
</body>
</html>
   
