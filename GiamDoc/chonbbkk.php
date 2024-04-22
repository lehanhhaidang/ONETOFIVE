<?php
include("classnvkk.php");
$p = new nhanvienkiemke();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/cssNVKK.css">
    <script>


      </script>
    <title>Danh Sách Kho Kiểm kê</title>
</head>
<body> 
<?php
        include("header.php");
    ?>
   <main>
    <h1 style="margin-top: 130px; text-align: center" >DANH SÁCH KHO CẦN KIỂM KÊ</h1>
    <div class="kho">
       <?php
				$p->xemkho("select * from kho");
	
		?>
    </div>
    <div class="back" >
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
   </main>
   <?php
        include("footer.php");
    ?>
</body>
</html>
   
