<?php
include("myclass.php");
$p = new func();
$p->connect();
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
    <title>Danh sách biểu mẫu xuất</title>
</head>
<body> 
    <header>

    <?php
        include("header.php");
    ?>
   <main>
    <h1>DANH SÁCH BIỂU MẪU</h1>
    <div class="bieumau">
    <?php
      $p->DSBMX("select * from bieumauxuat where maKho in('KTP04','KTP05','KTP06')");
    ?>
            </div>
    
   
            <?php
     echo ' <div class ="back" style="margin-right: 14.5%">
     <a href="TrangChuNVK.php"><button>Quay lại</button></a>';
         
     echo'</div>
   
    </main>';
    ?>
   <?php
        include("footer.php");
    ?>

</body>
</html> 