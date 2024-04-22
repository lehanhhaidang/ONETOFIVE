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
    <link rel="stylesheet" href="./css/KeHoachSX.css">
    <script>
    </script>
    <title>LichSuNhap</title>
</head>
<style>  
 .back{
float: right;
margin-top: 30px;
margin-right: 8%;
margin-bottom: 40px;
}

.back button{
background-color: #233d5a;
padding: 14px 28px;
border: none;
cursor: pointer;
color: var(--while-color);
font-size: 1.6em;
margin-bottom: 40px;
} 
    .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 10px;
    margin-left: auto; /* Sửa giá trị margin-left và margin-right */
    margin-right: auto; /* Sửa giá trị margin-left và margin-right */
    font-size: 100%;
    border: 1px black solid;
    background-color: #cfdded;
    width: 580px;
    border-radius: 25px;
    height: 100vh; /* Chiều cao 100% của trình duyệt */
}

.righta {
    flex: 1;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    color: #000;
    text-decoration: underline;
    margin-top: 10px;
    margin-right: 20px;
}

 /**/
.right {
    display: flex;
    flex-wrap: wrap;
    height: 60px;
    width: 400px;
    margin-left: 100px;
    margin-right: 50px;
    padding: 5px;
    
 }


.righta a:hover {
    color: #6e6262;
}

</style>
<body> 
<?php
        include("header.php");
    ?>
   <main>
    <section>
            <div class="kho">
                <h1 style="text-align: center">SỐ LƯỢNG TỒN KHO THÀNH PHẨM</h1>
                <div class="container">

                        <?php $p->xuatdstp("select * from thanhpham");?>

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
   </main>

   <?php
        include("footer.php");
    ?>

</body>
</html>
   
