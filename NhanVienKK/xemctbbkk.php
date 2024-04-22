<?php
include("class/classnvkk.php");
$p = new nhanvienkiemke();
// Thêm biến để giữ giá trị maKho
$maKho = '';
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
    <script></script>
    <title>Xem bản kiểm kê</title>
  </head>
  <body>
  <?php
        include("header.php");
    ?>
     <?php
          
          if(isset($_REQUEST["maBBKK"])){
            $maBBKK = $_REQUEST["maBBKK"];
            // 
            $ketqua = $p->xemphieukk($maBBKK);
  
            $rowxem = mysql_fetch_assoc($ketqua);
            mysql_data_seek($ketqua, 0);
          }
        ?>
   

    <main
      style="background-color: rgb(248, 248, 248); margin-top: 110px; height: auto"
      class="container"
    >
      <h2 class="title">XEM BIÊN BẢN KIỂM KÊ</h2>
      <div class="body">
        <h4 class="codeForm">Mã phiếu: <?php echo $_REQUEST['maBBKK']; ?></h4>
        <div class="input-container">
        <label class="labelInput" for="">Mã Kho</label>
        
        <input type="text" id="maKho" name="maKho" disabled value="<?php echo $rowxem['maKho']; ?>" class="input" />

        </div>
        <div class="input-container">
          <label class="labelInput" for="">Tên Nhân Viên</label>
          <input class="input" value="Bùi Nguyễn Phương Duyên" disabled/>
        </div>
        <div class="input-container">
          <label class="labelInput" for="">Ngày kiểm kê</label>
          <input type="date" id="currentDate" name="currentDate" disabled value="<?php echo $rowxem['ngayLapBB']; ?>" class="input" />
                                                                        
        </div>
        <div class="danhsach" style="margin-top: 10px;">
          <b>Danh sách hàng hóa</b>
        </div>
        <div class="table">
          
        </div>
        <div class="btn">
            <form>
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
            if (strpos($_REQUEST['maBBKK'], 'NVL') !== false) {
              while ($row=mysql_fetch_assoc($ketqua))
              {
              $makhoxem=$row['maKho'];
              $ngay=$row['ngayLapBB'];
                
              echo'	<tr> ';
              echo'  <td class="custom-cell">'. $row['maKe'] .'</td>';
              
              echo'  <td class="custom-cell">'. $row['maLoNVL'] .'</td>';
              echo'  <td class="custom-cell">'. $row['tenNguyenVatLieu'] .'</td>';
              echo'  <td class="custom-cell">'. $row['donViTinh'] .'</td>';
              echo'  <td class="custom-cell">'. $row['soLuong'] .'</td>';
              echo'  ';
              echo'  <td class="custom-cell">'. $row['NSX'] .'</td>';
              echo'  <td class="custom-cell">'. $row['NHH'] .'</td>';
              echo'  <td class="custom-cell"> '. $row['ghiChu'] .' </td>';
              echo'</tr>';
              
              }
              
             
              }else{
                                  
                while ($row=mysql_fetch_assoc($ketqua))
                      {
                      echo'	<tr> ';
                            echo'  <td class="custom-cell">'. $row['maKe'] .'</td>';
                    
                            echo'  <td class="custom-cell">'. $row['maLoTP'] .'</td>';
                            echo'  <td class="custom-cell">'. $row['tenThanhPham'] .'</td>';
                            echo'  <td class="custom-cell">'. $row['donViTinh'] .'</td>';
                            echo'  <td class="custom-cell">'. $row['soLuong'] .'</td>';
                            echo'  ';
                            echo'  <td class="custom-cell">'. $row['NSX'] .'</td>';
                            echo'  <td class="custom-cell">'. $row['NHH'] .'</td>';
                            echo'  <td class="custom-cell"> '. $row['ghiChu'] .' </td>';
                            echo'</tr>';
                      
                        
                    
                      }    
                    
              }
            
          ?>

       

          </table>
       <div class="back" style="margin-right: 14.5%;">
          <a href="xembienbankiemke.php" class="back-link">Quay lại</a>
        </div>


              </form>
        </div>
      </div>
      
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
 
