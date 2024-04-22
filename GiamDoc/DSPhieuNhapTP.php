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
    <link rel="stylesheet" href="./css/DuyetPhieu.css">
    <title>Duyệt Phiếu xuất NVL</title>
    <style>
       
    </style>
</head>
<body> 
    <header>
         <?php
            include("header.php");
        ?>
    </header>
    <section>
        <h1 >DANH SÁCH PHIẾU YÊU CẦU NHẬP THÀNH PHẨM</h1> 
        <?php
        $p ->xuatDSYCNTP("select * from phieuycntp");
       ?>
        <div class="back" >
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
    </section>
   <?php
        include("footer.php");
        
?>

</body>
</html>
   
