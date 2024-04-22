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
  <title>Lập phiếu nhập nguyên vật liệu</title>
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
      <h2 class="title" style="text-align:center;">Lập phiếu nhập nguyên vật liệu</h2>
      <div class="body">
        <?php
        $rowCounted = $p->countRow("select * from phieunnvl");
        $maPhieuNNVL = "PNNVL" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
        ?>
        <h4 class="codeForm">Mã phiếu:<?php echo $maPhieuNNVL ?></h4>
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
            $link = $p->connect();
            $sql = "SELECT * FROM chitietbieumaunhap WHERE maBMNhap = '$idBMN'";
            $result = mysql_query($sql, $link);

            if (mysql_num_rows($result) > 0) {
              $count = 1;

              $sq2 = "SELECT k.maKe
            FROM ke k
            JOIN kho kh ON k.maKho = kh.maKho
            JOIN bieumaunhap bn ON kh.maKho = bn.maKho
            WHERE bn.maBMNhap = '$idBMN'";
              $result2 = mysql_query($sq2, $link);
              $options = '';
              if (mysql_num_rows($result2) > 0) {
                while ($row2 = mysql_fetch_array($result2)) {
                  $maKe = $row2['maKe'];
                  $options .= '<option value="' . $maKe . '">' . $maKe . '</option>';
                }
              } else {
                $options = '<option value="x">Không có mã kệ</option>';
              }

              while ($row = mysql_fetch_array($result)) {
                $tenSP = $row['tenSanPham'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];

                echo '<tr>
                <td class="custom-cell" name="dem">' . $count++ . '</td>
                <td class="custom-cell" name="tenSP">' . $tenSP . '</td>
                <td class="custom-cell" name="donvitinh">' . $donViTinh . '</td>
                <td class="custom-cell" name="soluong">' . $soLuong . '</td>
                <td class="custom-cell"><input type="date" name="nsx[]" required></td>
                <td class="custom-cell"><input type="date" name="nhh[]" required></td>
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
            $lapPhieu = $p->InsertUpdate("INSERT INTO phieunnvl(maPNNVL,maKho,maNVKho,tenNguoiGiao,ngayNhap,ngayLap) 
                VALUES('$maPhieuNNVL','$maKho','$maNV','$tenNguoiGiao','$ngayNhap','$ngayLap')");

                
            if ($lapPhieu == 1 && $ngayLap == $ngayHienTai) {
              $count = 0;
              $link = $p->connect();
              $sql = "SELECT * FROM chitietbieumaunhap WHERE maBMNhap = '$idBMN'";
              $result = mysql_query($sql, $link);
              if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_array($result)) {
                  
                  $tenSP = $row['tenSanPham'];
                  $soLuong = $row['soLuong'];
                  $donViTinh = $row['donViTinh'];  
                  $NSX = $_POST['nsx'][$count]; // Lấy giá trị của NSX từ form
                  $NHH = $_POST['nhh'][$count]; // Lấy giá trị của NHH từ form
                  $maKe = $_POST['ke'][$count]; // Lấy giá trị của maKe từ form 
                  $laySLT = $p->pickColumn("select soLuongTon from nguyenvatlieu where tenNguyenVatLieu = '$tenSP'");
                  $sltMoi = $soLuong + $laySLT;
                  $rowCounted = $p->countRow("select * from longuyenvatlieu");
                  $maLoNVL = "LNVL" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
                  $maNVL =$p->pickColumn("select maNguyenVatLieu from nguyenvatlieu where tenNguyenVatLieu = '$tenSP'");
                    if($p->InsertUpdate("INSERT INTO longuyenvatlieu (maLoNVL,maNguyenVatLieu,maBMNhap,maKe,maPNNVL,soLuong,NSX,NHH) 
                    VALUES ('$maLoNVL','$maNVL','$idBMN','$maKe','$maPhieuNNVL','$soLuong','$NSX','$NHH')")==1)
                    {
                      if($NSX < $NHH)
                      {
                        $count++;
                        $p->InsertUpdate("Update bieumaunhap set trangThai = 'Đã lập phiếu' where maBMNhap = '$idBMN' ");
                        if($p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongTonnvl = $sltMoi WHERE tenNguyenVatLieu = '$tenSP'")== 1)
                        {
                          echo '<script>alert("Lập phiếu thành công")</script>';
                          echo '<script> window.location="../NHANVIENKHO3/TrangChuNVK.php" </script>';
                        }
                        else
                        {
                          echo '<script>alert("Lỗi set số lượng tồn")</script>';
                        }  
                      }
                      else
                      {
                        echo  '<script>alert("Ngày sản xuất phải nhỏ hơn ngày hết hạn")</script>';
                        $p-> InsertUpdate("DELETE FROM phieunnvl where maPNNVL = '$maPhieuNNVL'");
                       $p->InsertUpdate("DELETE FROM longuyenvatlieu where maLoNVL = '$maLoNVL'");
                       echo '<script> window.location="../NHANVIENKHO3/LapPhieuNhapNVL.php?idBMN='.$idBMN.'"</script>';

                      }

                    }
                    else
                    {
                      echo  '<script>alert("Vui lòng chọn đủ mã kệ lưu trữ")</script>';
                      $p-> InsertUpdate("DELETE FROM phieunnvl where maPNNVL = '$maPhieuNNVL'");
                      $p->InsertUpdate("DELETE FROM longuyenvatlieu where maLoNVL = '$maLoNVL'");
                      echo '<script> window.location="../NHANVIENKHO3/LapPhieuNhapNVL.php?idBMN='.$idBMN.'"</script>';
                    }
       
                }
 
              }
              else
              {
                echo '<script>alert("Lập phiếu thất bại, vui lòng chọn đủ thông tin")</script>';
                echo '<script> window.location="../NHANVIENKHO3/LapPhieuNhapNVL.php?idBMN='.$idBMN.'"</script>';
                
              }
  
          }
          else
          {
            echo '<script>alert("Ngày lập phiếu phải là ngày hiện tại")</script>';
            $p-> InsertUpdate("DELETE FROM phieunnvl where maPNNVL = '$maPhieuNNVL'");
            echo '<script> window.location="../NHANVIENKHO3/LapPhieuNhapNVL.php?idBMN='.$idBMN.'"</script>';
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