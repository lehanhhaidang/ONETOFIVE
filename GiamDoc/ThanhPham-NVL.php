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
    justify-content: space-between;
    margin: 10px;
    margin-left: 50px;
    margin-right: 50px;
    font-size: 100%;
}

.left-column, .right-column {
    flex: 1;
    padding: 15px;
    border: 1px solid black;
    border-radius: 10px;
    margin: 5px;
    background-color: #cfdded;
    box-sizing: border-box; /* Giữ cho padding không làm tăng kích thước thực của phần tử */
        }
 /**/
.right {
    display: flex;
    flex-wrap: wrap;
    height: 60px;
    width: 400px;
    margin-left: 200px;
    margin-right: 50px;
    padding: 5px;
    
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
    }
.right .righta a {
    color: #000;
    text-decoration: underline;
    margin-left: 10px;
    
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
                <h1 style="text-align: center">SỐ LƯỢNG TỒN KHO</h1>
                <div class="container">
                    <div class="left-column">
                        <h2 style="text-align: center">Nguyên vật liệu</h2> <br>
                        <?php $p->xuatdsnvl("select * from nguyenvatlieu"); ?>
                    </div>
                    <div class="right-column">
                        <h2 style="text-align: center">Thành phẩm</h2><br>
                        <?php $p->xuatdstp("select * from thanhpham");?>
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
   </main>

   <?php
        include("footer.php");
    ?>

</body>
</html>
   
