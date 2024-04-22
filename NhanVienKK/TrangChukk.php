<?php
include("class/classnvkk.php");
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
    <link rel="stylesheet" href="./css/cssNVKK.css"/>

    <script>


      </script>
    <title>Trang chủ</title>
</head>
<body> 
    <?php
        include("header.php");
    ?>

        <div class="pic_NVKK">
        <h2 class="title1" style="text-align: center; font-size: 25px;">NHÂN VIÊN KIỂM KÊ</h2>           
        <a href="./chonbbkk.php">
               <img src="./image/NVKK nhỏ.png" alt="">
           </a>
       </div>
    
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
   
