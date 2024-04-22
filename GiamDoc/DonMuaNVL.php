<?php
include("KetNoi.php");
$p = new GiamDoc();

if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    $p->xoaDonMuaNVL($delete);

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
    <link rel="stylesheet" href="./css/DonMuaNVL.css">
    <title>Đơn mua nguyên vật iệu</title>
</head>
<style>
   

</style>
<body> 
    <header>
        <?php
            include("header.php");
        ?>
    </header>
    <section>
        <h1 >DANH SÁCH ĐƠN MUA NGUYÊN VẬT LIỆU </h1> 
       <?php
      
        $p ->xuatDonMuaNVL("select * from DonMuaNVL WHERE tinhTrang = 2");
        $p ->xuatDSDonMuaNVL("SELECT * FROM DonMuaNVL WHERE tinhTrang NOT IN (1, 2)");
       ?>
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
   
