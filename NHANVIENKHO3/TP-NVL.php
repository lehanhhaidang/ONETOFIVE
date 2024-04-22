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
    <title>TP-NVL</title>
</head>
<body> 
    <header>
    <?php
        include("header.php");
    ?>
   <main>
    <div class="container">
        <div class="materials">
            <h1>NGUYÊN VẬT LIỆU</h1>
            <div class="materials-list">
                <?php
					$p->xuatdsnvl("select * from nguyenvatlieu where status =1");
				?>
            </div>
        </div>
        <div class="finishedproduct">
            <h1>THÀNH PHẨM</h1>
            <div class="finishedproduct-list">
                <?php
					$p->xuatdstp("select * from thanhpham where status =1");
				?>
            </div>
        </div>
        
    </div>
    <div class="back">
		<a href="TrangChuNVK.php"><button>Quay lại</button></a>
    </div>
   </main>
   <?php
        include("footer.php");
    ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("searchIcon").addEventListener("click", function(event) {
            event.preventDefault();

            var searchValue = document.getElementById("searchInput").value;

            if (searchValue.trim() !== "") {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        window.location.href = "search_results.php?results=" + encodeURIComponent(JSON.stringify(response));
                    }
                };
                xhr.open("GET", "search.php?search_term=" + encodeURIComponent(searchValue), true);
                xhr.send();
            }
        });
    });
</script>
</body>
</html>
   
