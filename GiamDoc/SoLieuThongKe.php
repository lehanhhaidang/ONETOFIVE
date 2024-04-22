<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/KeHoachSX.css">
    <title>Số liệu thống kê</title>
</head>
<style>
    .content a{
        text-decoration: none;
    }
</style>
<body> 
    <header>
         <?php
            include("header.php");
        ?>
    </header>
  
    <section>
        <h1>SỐ LIỆU THỐNG KÊ</h1>
        <div class="row">
            <div class="col">
                <div class="content" >
                    <a href="ThanhPham-NVL.php"style="text-decoration: none;">Số lượng tồn kho</a>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="col">
                <div class="content">
                    <a href="DSPhieuNhanHangTraVe.php"style="text-decoration: none;">Hàng bị trả về</a>
                </div>
                <div class="actions">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="content">
                    <a href="LichSuNhap.php"style="text-decoration: none;">Lịch sử nhập</a>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="col">
                <div class="content">
                    <a href="LichSuXuat.php"style="text-decoration: none;">Lịch sử xuất</a>
                </div>
                <div class="actions">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="content">
                    <a href="donhang.php"style="text-decoration: none;">Đơn hàng</a>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="col">
                <div class="content">
                    <a href="HangGanHetHan.php"style="text-decoration: none;">Hàng gần hết hạn</a>
                </div>
                <div class="actions">
                </div>
            </div>
        </div>
        <div class="back" >
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
    </section>
    <?php
        include("footer.php");
        
?>
</body>
</html>
   
