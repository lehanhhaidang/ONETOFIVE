<?php
include("myclass.php");
// Tạo một đối tượng của class func
$p = new func();
// Kết nối đến CSDL
$p->connect();
if (isset($_REQUEST['idBMX'])) {
  $idBMX = $_REQUEST['idBMX'];
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
  <title>Lập phiếu xuất nguyên vật liệu</title>
</head>

<body>

  <?php
  include("header.php");
  ?>
  <main style="background-color: antiquewhite; margin-top: 110px; height: auto" class="container">
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
      <input type="hidden" name="maNV" value="<?php echo $p->pickColumn("SELECT nk.maNhanVien FROM bieumauxuat bn 
                 INNER JOIN kho k ON bn.maKho = k.maKho
                 INNER JOIN nhanvienkho nk ON k.maNVKho = nk.maNhanVien
                 WHERE bn.maBMXuat = '$idBMX'"); ?>">
      <h2 class="title" style ="text-align:center;"> Lập phiếu xuất nguyên vật liệu</h2>
      <div class="body">
        <?php
        $rowCounted = $p->countRow("select * from phieuxnvl");
        $maPhieuXNVL = "PXNVL" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
        ?>
        <h4 class="codeForm">Mã phiếu:<?php echo $maPhieuXNVL ?></h4>
        <div class="input-container">
          <label class="labelInput" for="">Tên người nhận</label>

          <input class="input" name="tennguoinhan" value="<?php echo $p->pickColumn("select tenNguoiNhan from bieumauxuat
            where maBMXuat = '$idBMX' limit 1"); ?>" readonly>
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày xuất</label>
          <input class="input" name="ngayxuat" value="<?php echo $p->pickColumn("select ngayXuat from bieumauxuat
            where maBMXuat = '$idBMX' limit 1"); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Kho xuất</label>
          <input class="input" name="khonhap" value="<?php echo $p->pickColumn("SELECT kho.tenKho
                            FROM bieumauxuat
                            INNER JOIN kho ON bieumauxuat.maKho = kho.maKho
                            WHERE bieumauxuat.maBMXuat = '$idBMX'"); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Người lập phiếu</label>
          <input class="input" name="nguoilap" value="<?php echo $p->pickColumn("SELECT nk.tenNVKho FROM bieumauxuat bn 
                 INNER JOIN kho k ON bn.maKho = k.maKho
                 INNER JOIN nhanvienkho nk ON k.maNVKho = nk.maNhanVien
                 WHERE bn.maBMXuat = '$idBMX' "); ?>" readonly />
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày lập phiếu</label>
          <input type="date" name="ngaylap" class="input" required />
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
            $sql = "SELECT
            nv.tenNguyenVatLieu,
            lgl.soLuong,
            nv.donViTinh,
            lgl.NSX,
            lgl.NHH,
            lgl.maKe
        FROM
            bieumauxuat bmx
            JOIN longuyenvatlieu lgl ON bmx.maBMXuat = lgl.maBMXuat
            JOIN nguyenvatlieu nv ON lgl.maNguyenVatLieu = nv.maNguyenVatLieu
        WHERE
            bmx.maBMXuat = '$idBMX'";
            $result = mysql_query($sql, $link);
            $count = 1;

              while ($row = mysql_fetch_array($result)) {
                $tenSP = $row['tenNguyenVatLieu'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];
                $nsx = $row['NSX'];
                $nhh = $row['NHH'];
                $ke = $row['maKe'];

                echo '<tr>
                <td class="custom-cell" name="dem">' . $count++ . '</td>
                <td class="custom-cell" name="tenSP">' . $tenSP . '</td>
                <td class="custom-cell" name="donvitinh">' . $donViTinh . '</td>
                <td class="custom-cell" name="soluong">' . $soLuong . '</td>
                <td class="custom-cell" name = "nsx">'.$nsx.'</td>
                <td class="custom-cell" name = "nhh">'.$nhh.'</td>
                <td class="custom-cell" name = "ke">'.$ke.'</td>
    
            </tr>';
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

            $tenNguoiNhan = $_REQUEST['tennguoinhan'];
            $ngayxuat = $_REQUEST['ngayxuat'];
            $ngayLap = $_REQUEST['ngaylap'];
            $maNV = $_REQUEST['maNV'];
            $ngayHienTai = date("Y-m-d");
            $maKho = $p->pickColumn("select maKho from bieumauxuat where maBMXuat = '$idBMX'");
            $lapPhieu = $p->InsertUpdate("INSERT INTO phieuxnvl(maPXNVL,maKho,maNVKho,tenNguoiNhan,ngayxuat,ngayLap) 
                VALUES('$maPhieuXNVL','$maKho','$maNV','$tenNguoiNhan','$ngayxuat','$ngayLap')");

            if ($lapPhieu == 1 && $ngayLap == $ngayHienTai) {
              $count = 0;
              $link = $p->connect();
              $sql = "SELECT
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
              bmx.maBMXuat = '$idBMX'";
              $result = mysql_query($sql, $link);
              if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_array($result)) {
                  
                  $tenSP = $row['tenNguyenVatLieu'];
                  $soLuong = $row['soLuong'];
                  $donViTinh = $row['donViTinh'];  
                  $NSX = $row['NSX'];
                  $NHH = $row['NHH'];
                  $laySLT = $p->pickColumn("select soLuongTonnvl from nguyenvatlieu where tenNguyenVatLieu = '$tenSP'");
                  $sltMoi =   $laySLT - $soLuong;
                  $rowCounted = $p->countRow("select * from longuyenvatlieu");
                  $maLoNVL = "LNVL" . str_pad($rowCounted + 1, 2, "0", STR_PAD_LEFT);
                  $maNVL =$p->pickColumn("select maNguyenVatLieu from nguyenvatlieu where tenNguyenVatLieu = '$tenSP'");
                      if($p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongTonnvl = $sltMoi WHERE tenNguyenVatLieu = '$tenSP'")== 1)
                      {
                        $p->InsertUpdate("Update bieumauxuat set trangThai = 'Đã lập phiếu' where maBMXuat = '$idBMX' ");
                        $p->InsertUpdate("UPDATE longuyenvatlieu set maPXNVL = '$maPhieuXNVL' where maBMXuat = '$idBMX'");
                        echo '<script>alert("Lập phiếu thành công")</script>';
                        echo '<script> window.location="../NHANVIENKHO/TrangChuNVK.php" </script>';
                      }
                      else
                      {
                        echo '<script>alert("Lỗi cơ sở dữ liệu")</script>';
                      }  
                }
              }
              else
              {
                echo '<script>alert("Lập phiếu thất bại")</script>';
                echo '<script> window.location="../NHANVIENKHO/LapPhieuXuatTP.php?idBMX='.$idBMX.'"</script>';
              } 
          }
          else
          {
            echo '<script>alert("Ngày lập phiếu phải là ngày hiện tại")</script>';
            $p->InsertUpdate("DELETE FROM phieuxnvl where maPXNVL = '$maPhieuXNVL'");
            echo '<script> window.location="../NHANVIENKHO/LapPhieuXuatNVL.php?idBMX='.$idBMX.'"</script>';
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