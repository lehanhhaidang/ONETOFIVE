
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_REQUEST["bntdangnhap"])){
            $usn = $_REQUEST["txtusername"];
            $pass= $_REQUEST["txtpassword"];
    }
            if($usn == "quanlykho" && $pass== "quanlykho"){
                header("Location: ./Khang2/khang2/index.php");
            }elseif ($usn === "bangiamdoc" && $pass === "bangiamdoc") {
                header("Location: ./GiamDoc/index.php");
                exit();
            }elseif ($usn === "nhanvienkho" && $pass === "nhanvienkho") {
                header("Location: ./NHANVIENKHO/TrangChuNVK.php");
                exit();
            }elseif ($usn === "nhanvienkiemke" && $pass === "nhanvienkiemke") {
                header("Location: ./NhanVienKK/TrangChukk.php");
                exit();
            }elseif ($usn === "nhanvienkho2" && $pass === "nhanvienkho2") {
                header("Location: ./NHANVIENKHO2/TrangChuNVK.php");
                exit();
            }elseif ($usn === "nhanvienkho3" && $pass === "nhanvienkho3") {
                header("Location: ./NHANVIENKHO3/TrangChuNVK.php");
                exit();
            }
            
            
            
            else{
                echo" <script>
                alert('Sai thông tin đăng nhập!');
                
              </script>  ";
              echo header("refresh:0; url='index.php'"); 
            }
                

    ?>
</body>
</html>