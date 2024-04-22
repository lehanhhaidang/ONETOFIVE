<?php
include("class/classnvk.php");
$p = new nhanvienkho();
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
<?php
        include("header.php");
    ?>
   <main>
    <h1>PHIẾU NHẬP NGUYÊN VẬT LIỆU</h1>
    <div class="kho">
        <?php
				$p->xuatdspnnvl("select * from phieunnvl");
	
		?>
		
    </div>
    <div class="back" style="">
        <a href="TrangChuNVK.php">
               <button>Quay lại</button>
        </a>
    </div>
   </main>
   <?php
        include("footer.php");
    ?>

</body>
</html>
   
