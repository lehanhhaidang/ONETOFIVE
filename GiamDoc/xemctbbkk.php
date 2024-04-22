<?php
include("KetNoi.php");
$p = new GiamDoc();

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
  <style> 
  main{
    padding-top:170px;
    
  }
</style>
  <body>
  <?php
        include("header.php");
    ?>
    
<main>
     <?php
          
          if(isset($_REQUEST["maBBKK"])){
            $maBBKK = $_REQUEST["maBBKK"];
            $p->xuatCTBBKK("SELECT
            nv.maKho,bb.maBBKK,
             bb.ngayLapBB,tennvkk
         FROM
             bienbankiemke bb
         JOIN
            nhanvienkiemke nv ON bb.maNVKK = nv.maNVKK
         WHERE
             bb.maBBKK = '$maBBKK'");
           echo $maKho; 
          }
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
           if (isset($_REQUEST['maBBBTNVL']))
           {
             $maBBBTNVL = $_REQUEST['maBBBTNVL'];
           }
     
              $p->xuatLoBBKKNVL("SELECT
              k.maKho,
              bb.ngayLapBB,
              ke.maKe,
              l.maLoNVL,
              l.soLuong,
              l.NSX,
              l.NHH,
              nvl.tenNguyenVatLieu,
              nvl.donViTinh,
              ct.ghiChu
              FROM
              bienbankiemke bb
          JOIN
              chitietbbnvl ct ON bb.maBBKK = ct.maBBKK
          JOIN
              longuyenvatlieu l ON ct.maLoNVL = l.maLoNVL
          JOIN
              nguyenvatlieu nvl ON l.maNguyenVatLieu = nvl.maNguyenVatLieu
          JOIN
              ke  ON l.maKe = ke.maKe
          JOIN
              kho k ON ke.maKho = k.maKho
          WHERE
              bb.maBBKK = '$maBBKK'");
           ?>
                </tbody>
            </table>
        </div>
        
    </div>


    <div class="back">
    <a id="goBackButton">
               <button>Quay lại</button>
        </a>
		<?php
			echo '<a href="suactbbkk.php?maBBKK='.$maBBKK.'"><button style="background-color: #39a867;">Cập nhật tồn kho</button></a>';
		?>
		

    </div>

        </div>
      </div>
      
    </main>
    <?php
        include("footer.php");
    ?>
    
		
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
  </body>
</html>
