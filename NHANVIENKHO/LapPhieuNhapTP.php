<?php
include("myclass.php");
// Tạo một đối tượng của class func
$p = new func();
// Kết nối đến CSDL
$p->connect();
if (isset($_REQUEST['idBMN'])) {
  $idBMN = $_REQUEST['idBMN'];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="./css/cssNVK2.css">
  <link rel="stylesheet" href="./css/styles.css">
  <script></script>
  <title>Lập phiếu nhập thành phẩm</title>
</head>

<body>

  <?php
  include("header.php");
  ?>
  <main style="background-color: antiquewhite; margin-top: 110px; height: auto" class="container">
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
      <input type="hidden" name="maNV" value="<?php echo $p->pickColumn("SELECT nk.maNhanVien FROM bieumaunhap bn 
                 INNER JOIN kho k ON bn.maKho = k.maKho
                 INNER JOIN nhanvienkho nk ON k.maNVKho = nk.maNhanVien
                 WHERE bn.maBMNhap = '$idBMN'"); ?>">
      <h2 class="title" style="text-align:center;">Lập phiếu nhập thành phẩm</h2>
      <div class="body">
        <?php
        $rowCounted = $p->countRow("select * from phieuntp");
        $maPhieuNTP = "PNTP" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
        ?>
        <h4 class="codeForm">Mã phiếu:<?php echo $maPhieuNTP ?></h4>
        <div class="input-container">
          <label class="labelInput" for="">Tên người giao</label>

          <input class="input" name="tennguoigiao" value="<?php echo $p->pickColumn("select tenNguoiGiao from bieumaunhap
            where maBMNhap = '$idBMN' limit 1"); ?>" readonly>
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày nhập</label>
          <input class="input" name="ngaynhap" value="<?php echo $p->pickColumn("select ngayNhap from bieumaunhap
            where maBMNhap = '$idBMN' limit 1"); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Kho nhập</label>
          <input class="input" name="khonhap" value="<?php echo $p->pickColumn("SELECT kho.tenKho
FROM bieumaunhap
INNER JOIN kho ON bieumaunhap.maKho = kho.maKho
WHERE bieumaunhap.maBMNhap = '$idBMN'"); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Người lập phiếu</label>
          <input class="input" name="nguoilap" value="<?php echo $p->pickColumn("SELECT nk.tenNVKho FROM bieumaunhap bn 
                 INNER JOIN kho k ON bn.maKho = k.maKho
                 INNER JOIN nhanvienkho nk ON k.maNVKho = nk.maNhanVien
                 WHERE bn.maBMNhap = '$idBMN' "); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày lập phiếu</label>
          <input type="date" name="ngaylap" class="input" required/>
        </div>
        <div class="table" id="table">
          <table class="custom-table">
            <tr>
              <th class="custom-cell">STT</th>
              <th class="custom-cell">Tên</th>
              <th class="custom-cell">Đơn vị</th>
              <th class="custom-cell">Số lượng</th>
              <th class="custom-cell">NSX</th>
              <th class="custom-cell">NHH</th>
              <th class="custom-cell">Kệ</th>
            </tr>
            <?php
            // Kết nối CSDL và lấy dữ liệu
            $link = $p->connect();
            $sql = "SELECT * FROM chitietbieumaunhap WHERE maBMNhap = '$idBMN'";
            $result = mysql_query($sql, $link);

            if (mysql_num_rows($result) > 0) 
            {
              $count = 1;

              $sq2 = "SELECT k.maKe
            FROM ke k
            JOIN kho kh ON k.maKho = kh.maKho
            JOIN bieumaunhap bn ON kh.maKho = bn.maKho
            WHERE bn.maBMNhap = '$idBMN'";
              $result2 = mysql_query($sq2, $link);
              $options = '';
              if (mysql_num_rows($result2) > 0) {
                while ($row2 = mysql_fetch_array($result2)) 
                {
                  $maKe = $row2['maKe'];
                  $options .= '<option value="' . $maKe . '">' . $maKe . '</option>';
                }
              } else 
              {
                $options = '<option value="x">Không có mã kệ</option>';
              }
              while ($row = mysql_fetch_array($result)) {
                $tenSP = $row['tenSanPham'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];
                $nsx = $row['ngaySanXuat'];
                $nhh = $row['ngayHetHan'];

                echo '<tr>
                <td class="custom-cell" name="dem">' . $count++ . '</td>
                <td class="custom-cell" name="tenSP">' . $tenSP . '</td>
                <td class="custom-cell" name="donvitinh">' . $donViTinh . '</td>
                <td class="custom-cell" name="soluong">' . $soLuong . '</td>
                <td class="custom-cell" name = "nsx">'.$nsx.'</td>
                <td class="custom-cell" name ="nhh" >'.$nhh.'</td>
                <td class="custom-cell">
                    <select name="ke[]" id="ke">
                        <option value="x">Lựa chọn mã kệ</option>
                        ' . $options . '
                    </select>
                </td>
            </tr>';
              }
            } else {
              echo "Không có dữ liệu.";
            }
            ?>

          </table>
        </div>
        <div class="btn">
          <input type="submit" class="buttonCancel" name="button" id="button" value="Quay lại" onclick="history.back()">
          <input type="submit" class="buttonCreate" name="button" id="button" value="Lập phiếu">

        </div>
      </div>

      <?php
      switch ($_POST['button']) {
        case "Lập phiếu": {

            $tenNguoiGiao = $_REQUEST['tennguoigiao'];
            $ngayNhap = $_REQUEST['ngaynhap'];
            $ngayLap = $_REQUEST['ngaylap'];
            $maNV = $_REQUEST['maNV'];
            $ngayHienTai = date("Y-m-d");
            $maKho = $p->pickColumn("select maKho from bieumaunhap where maBMNhap = '$idBMN'");
            $lapPhieu = $p->InsertUpdate("INSERT INTO phieuntp(maPNTP,maKho,maNVKho,tenNguoiGiao,ngayNhap,ngayLap) 
                VALUES('$maPhieuNTP','$maKho','$maNV','$tenNguoiGiao','$ngayNhap','$ngayLap')");

                
            if ($lapPhieu == 1) {
              $count = 0;
              $link = $p->connect();
              $sql = "SELECT * FROM chitietbieumaunhap WHERE maBMNhap = '$idBMN'";
              $result = mysql_query($sql, $link);
              if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_array($result)) {
                  
                  $tenSP = $row['tenSanPham'];
                  $soLuong = $row['soLuong'];
                  $donViTinh = $row['donViTinh'];  
                  $NSX = $row['ngaySanXuat'];
                  $NHH = $row['ngayHetHan']; // Lấy giá trị của NHH từ form
                  $maKe = $_POST['ke'][$count]; // Lấy giá trị của maKe từ form 
                  $laySLT = $p->pickColumn("select soLuongTon from thanhpham where tenThanhPham = '$tenSP'");
                  $sltMoi = $soLuong + $laySLT;
                  $rowCounted = $p->countRow("select * from lothanhpham");
                  $maLoTP = "LTP" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
                  $maTP =$p->pickColumn("select maThanhPham from thanhpham where tenThanhPham = '$tenSP'");
                    if($p->InsertUpdate("INSERT INTO lothanhpham (maLoTP,maThanhPham,maBMNhap,maKe,maPNTP,soLuong,NSX,NHH) 
                    VALUES ('$maLoTP','$maTP','$idBMN','$maKe','$maPhieuNTP','$soLuong','$NSX','$NHH')")==1 && $maKe !=null)
                    {
                      $count++;
                      $p->InsertUpdate("UPDATE bieumaunhap SET  trangThai = 'Đã lập phiếu' where maBMNhap = '$idBMN' ");
                      if($p->InsertUpdate("UPDATE thanhpham SET soLuongTon = $sltMoi WHERE tenThanhPham = '$tenSP'")== 1)
                      {
                        echo '<script>alert("Lập phiếu thành công")</script>';
                        echo '<script> window.location="../NHANVIENKHO/TrangChuNVK.php"</script>';
                      }
                      else
                      {
                        echo '<script>alert("Lỗi set số lượng tồn")</script>';
                      }  

                    }
                    else
                    {
                      echo  '<script>alert("Vui lòng chọn đủ mã kệ.")</script>';
                      $p->InsertUpdate("DELETE FROM phieuntp where maPNTP = '$maPhieuNTP'");
                      $p->InsertUpdate("DELETE FROM lothanhpham where maLoTP = '$maLoTP'");
                      echo '<script> window.location="../NHANVIENKHO/LapPhieuNhapTP.php?idBMN='.$idBMN.'"</script>';
                      

                    }
       
                }
 
              }
              else
              {
                echo '<script>alert("Lỗi cơ sở dữ liệu, lập phiếu thất bại")</script>';
                echo '<script> window.location="../NHANVIENKHO/LapPhieuNhapTP.php?idBMN='.$idBMN.'"</script>';
              }
  
          }
          else
          {
            echo '<script>alert("Lập phiếu thất bại")</script>';
            $p->InsertUpdate("DELETE FROM phieuntp where maPNTP = '$maPhieuNTP'");
            echo '<script> window.location="../NHANVIENKHO/LapPhieuNhapTP.php?idBMN='.$idBMN.'"</script>';
          }


          break;
      }

      }


      ?>


  </main>

  </form>
</body>
<?php include("footer.php"); ?>

</html>