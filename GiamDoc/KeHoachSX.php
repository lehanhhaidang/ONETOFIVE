<?php
include("KetNoi.php");
$p = new GiamDoc();

if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    $p->xoaKeHoachSX1($delete);

}elseif(isset($_REQUEST["editPro"])){
    include_once("suaKHSX.php");
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
    <link rel="stylesheet" href="./css/KeHoachSX.css">
    <title>Kế hoạch sản xuất</title>
</head>
<body> 
    <header>
        <?php
            include("header.php");
        ?>
    </header>
    <section>
        <h1 >DANH SÁCH KẾ HOẠCH SẢN XUẤT &emsp; &ensp; &nbsp;<a href="ThemKeHoachSX.php"><i class="fa-solid fa-plus fa-beat " style="color: #000000;"></i></a></h1> 
       <?php
       
        $p ->xuatKeHoachSX("SELECT * FROM kehoachsx WHERE tinhTrang = 2 ");
        $p ->xuatDSKeHoachSX("SELECT * FROM kehoachsx WHERE tinhTrang NOT IN (1, 2)");
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
   
