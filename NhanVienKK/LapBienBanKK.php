<?php
include("class/classnvkk.php");
$p = new nhanvienkiemke();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="./css/styles.css"/>
    <link rel="stylesheet" href="./css/cssNVKK.css"/>
    <title>Lập biên bản kiểm kê</title>

    <script>
      function cancelAction() {
          alert('Hủy thành công');

          window.location = 'chonbbkk.php';
      }
    </script>
  </head>
  <body>
  <?php
        include("header.php");
    ?>
    <?php
      // có nút lập phiếu
      if(isset($_REQUEST["btnlapbbkk"])){
        $makho = $_REQUEST["makho"];
        // Lấy dữ liệu từ form
        $ghichu = $_REQUEST['note']['ghichu'];
        // echo $_REQUEST['note']['mabbkk'];
        $mabbkk = $_REQUEST['note']['mabbkk'];
        // Xử lý và in ra các dữ liệu ghi chú
        $dembt=0;
        //kiemtra rong
        foreach ($ghichu as $index => $value) {
            // Kiểm tra xem ghi chú có đượcx nhập không
                if (!empty($value)) {
                    $dembt++;
                }
        }
        if($dembt == 0){
            echo "<script>alert('Lập Phiếu không thành công vì rỗng!')</script>";
            echo "<script> window.location='chonbbkk.php'</script>";
        }else{

          foreach ($ghichu as $index => $value) {
            // Kiểm tra xem ghi chú có được nhập không
            if (!empty($value)) {
                // echo "Dòng $index - Ghi chú: $value<br>";
                // echo $_REQUEST['note']['malo'][$index];
                $malo = $_REQUEST['note']['malo'][$index];
  
                $p->lapbienbankiemke($mabbkk, $malo, $value,$makho);
            }
          }
          echo "<script> alert('Lập phiếu thành công')</script>";
          echo "<script> window.location='chonbbkk.php'</script>";
        }

      }
    ?>

    <main
      style="background-color: rgb(248, 248, 248); margin-top: 110px; height: auto"
      class="container"
    >
      <h2 class="title">LẬP BIÊN BẢN KIỂM KÊ</h2>
      <div class="body">
        <h4 class="codeForm">Mã phiếu: <?php $p -> mabienbangtudong($_REQUEST['maKho'])?></h4>
        <div class="input-container">
          <label class="labelmakho" for="">Mã Kho</label>
          <input type="text" id="maKho" name="maKho" disabled value="<?php echo $_REQUEST['maKho']; ?>" class="input" />

        </div>
        <div class="input-container">
          <label class="labelInput" for="">Tên Nhân Viên</label>
          <input class="input" value="Bùi Nguyễn Phương Duyên" disabled/>
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày kiểm kê</label>
          <input type="date" id="currentDate" name="currentDate" disabled value="<?php echo date('Y-m-d'); ?>" class="input" />
        </div>
        <div class="danhsach" style="margin-top: 10px;">
          <b>Danh sách hàng hóa</b>
        </div>
        <div class="table">
          
        </div>
        <div class="btn">
            <form action="#">
            <table class="custom-table">
            <tr>
              <th class="custom-cell">Mã kệ</th>
              <th class="custom-cell">Mã lô</th>
              <th class="custom-cell">Tên hàng hóa</th>
              <th class="custom-cell">Đơn vị tính</th>
              <th class="custom-cell">Số lượng</th>
              <th class="custom-cell">NSX</th>
              <th class="custom-cell">HSD</th>
              <th class="custom-cell">Ghi chú</th>
            </tr>
          <?php
          
            if(isset($_REQUEST["maKho"])){
              $maKho = $_REQUEST["maKho"];
              // 
              $p->lapphieukk($maKho);
             
            }
          ?>  
          </table>

        <center>
          <button type="reset" class="buttonCancel" onclick="cancelAction()">Hủy</button>
          <?php 
            $kq = $p->dem_bbkk($_REQUEST["maKho"]);
            if($kq == 0){

              echo '<button type="submit" class="buttonCreate" name="btnlapbbkk">Lập biên bản</button>';
            }
          ?>
          <!-- <input type="submit" class="buttonCreate" name="btnlapbbkk" value="Lập biên bản">-->
        </center>
            </form>
        </div>
      </div>
      
    </main>
    <?php
        include("footer.php");
    ?>
    
</body>
</html>
