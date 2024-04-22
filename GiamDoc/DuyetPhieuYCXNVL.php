<?php
    include("KetNoi.php");
    $p = new GiamDoc();
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
    <title>Document</title>
</head>
<body> 
    <header>
        <?php
            include("header.php");
        ?>
    </header>
   <main style="margin-top: 160px;">
	   <form method="post" enctype="multipart/form-data" name="form1" id="form1">
	   <?php
			   if (isset($_REQUEST['maYCXNVL']))
					{
						$maYCXNVL = $_REQUEST['maYCXNVL'];
					}
						 $p ->xuatThongTinPYCXNVL("select * from PhieuYCXNVL WHERE maYCXNVL = '$maYCXNVL'");
			?>
		    <p><b>Lí do từ chối:</b> <input class="input" name="lido" id="lido" style="width: 500px; height: 24px;" value="<?php echo $p->pickColumn("select ghiChu from phieuycxnvl
            where maYCXNVL = '$maYCXNVL' limit 1"); ?>"></p>

		   

  <input type="hidden" name="tinhTrang" value="<?php echo $p->pickColumn("SELECT tinhTrang FROM phieuycxnvl WHERE maYCXNVL = '$maYCXNVL' LIMIT 1"); ?>">

         <h2 style="text-align: center; font-size: 1.8em; margin-top: 10px;"><b>Danh sách hàng hóa:</b></h2>
        </div>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
					   if (isset($_REQUEST['maYCXNVL']))
							{
								$maYCXNVL = $_REQUEST['maYCXNVL'];
							}
								 $p->xuatLoPhieuYCXNVL("SELECT *
								FROM longuyenvatlieu
								INNER JOIN ke ON longuyenvatlieu.maKe = ke.maKe
								INNER JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
								INNER JOIN phieuycxnvl ON longuyenvatlieu.maPhieuYCXNVL = phieuycxnvl.maYCXNVL WHERE phieuycxnvl.maYCXNVL = '$maYCXNVL'
									");
					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back">
        <a href="DSPhieuYCXuaNVL.php" class="goBackButton" style="padding: 14px 30px;background-color:#233d5a ; color: #fff;  font-size: 1.6em">Quay lại</a>
        <button style="background-color: brown;" type="submit" name="nut" id="nut" value="Từ chối">Từ chối</button>
        <button style="background-color: rgb(35, 161, 92)" type="submit" name="nut" id="nut" value="Duyệt Phiếu">Duyệt Phiếu</button>
		    </div>
	<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
		<?php
		 if (isset($_POST['nut']) && $_POST['nut'] === 'Từ chối') {
        $maYCXNVL = $_REQUEST['maYCXNVL'];
        $lido = $_POST['lido'];
        $tinhTrangHienTai = $_POST['tinhTrang'];

        if ($tinhTrangHienTai === 'Chưa Duyệt') {
            // Kiểm tra nếu 'liDo' không rỗng
            if (!empty($lido)) {
                if ($p->themxoasua("UPDATE phieuycxnvl SET tinhTrang = 'Từ chối', ghichu = '$lido' WHERE maYCXNVL = '$maYCXNVL'") == 1) {
                    echo '<script language="javascript">
                        alert("Cập nhật tình trạng và lí do từ chối thành công");
                        window.location="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'";
                        </script>';
                } else {
                    echo 'Lỗi trong quá trình cập nhật';
                }
            } else {
                echo '<script language="javascript">
                    alert("Lí do từ chối không được để trống");
                    window.location="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'";
                    </script>';
            }
        } else {
            echo '<script language="javascript">
                alert("Phiếu đã được duyệt hoặc không ở trạng thái chờ duyệt");
                window.location="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'";
                </script>';
        }
    }


// Phần còn lại của code ở đây...

		
		 if (isset($_POST['nut']) && $_POST['nut'] === 'Duyệt Phiếu') {
        $maYCXNVL = $_REQUEST['maYCXNVL'];
        $tinhTrangHienTai = $_POST['tinhTrang'];

        if ($tinhTrangHienTai === 'Từ chối' || $tinhTrangHienTai === 'Chưa Duyệt') {
            if ($p->themxoasua("UPDATE phieuycxnvl SET tinhTrang = 'Duyệt', ghichu = NULL WHERE maYCXNVL = '$maYCXNVL'") == 1) {
                echo '<script language="javascript">
                    alert("Chuyển trạng thái sang Duyệt thành công");
                    window.location="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'";
                    </script>';
            } else {
                echo 'Lỗi trong quá trình cập nhật';
            }
        } else {
            echo '<script language="javascript">
                alert("Phiếu đã được duyệt hoặc không ở trạng thái từ chối");
                window.location="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'";
                </script>';
        }
    }

	?>

	   </form>
   </main>
   <?php
        include("footer.php");
        
?>
	
</body>
</html>
   
