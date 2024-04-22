<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../js/qlk.js"></script>
    <style>
        input[type="text"] {
        width: 200px;
        box-sizing: border-box;
        border: 1px solid black;
        border-radius: 5px;
        outline:none;
        padding: 7px 5px;
        transition:0.6s ease-in-out;
    }

    a:hover{
        color: red;
        text-decoration: none;
    } 
       
    </style>    
</head>
<body>
<div class="container" style="margin-top: 120px; margin-bottom: 120px; font-size: 16px;">
    <table class="table table-bordered" >
        <h1 style="text-align: center; margin-top: 50px; font-size: 20px;">Danh sách thành phẩm</h1>
        <thead class="bang" style="align-items: center;" >
        <tr>

                <th><center>Mã thành phẩm</center> </th>
                <th><center>Image</center> </th>
                <th><center>Tên thành phẩm</center></th>
                <th><center>Mã lô</center></th>
                <th><center>Tên kệ</center></th>
                <th><center>Đơn vị tính</center></th>
                <th><center>Số lượng tồn</center></th>
                <th><center>Ngày sản xuất</center></th>
                <th><center>Ngày hết hạn</center></th>
                <th><center>Tùy chọn 1</center></th>
                <th><center>Tùy chọn 2</center></th>
            </tr>
        </thead>
        <tbody>
            <!-----xem ------->
            <?php
                include_once("controller/controller_qltp.php");
                $p=new controlerThanhPham();  
                if(isset($_REQUEST['timkiem']))
                {
                    $s = $_REQUEST['tukhoa'];
                    if($s == ""){
                        echo '<script>alert("Vui lòng nhập từ khóa tìm kiếm !")</script>';
                        echo '<script>window.history.back();</script>';
                    }else{
                        $hien = $p->seachByIdOrName();
                        if(!$hien ){
                            echo "<script>alert('Không tìm thấy kết quả cho từ khóa: $s nào !')</script>";
                            echo '<script>window.history.back();</script>'; 
                        }else{
                            if(mysqli_num_rows($hien)>0){
                                while($cot=mysqli_fetch_assoc($hien)){?>
                                    <tr>
                                        <td><center><?php echo $cot['maThanhPham']; ?></center></td>
                                        <td><center><img src="assert/image/<?php echo $cot['anh']; ?>" alt="Ảnh Thành Phẩm" style="max-width: 100px; max-height: 100px;"></center></td>
                                        <td><center><?php echo $cot['tenThanhPham']; ?></center></td>
                                        <td><center><?php echo $cot['maLoTP']; ?></center></td>
                                        <td><center><?php echo $cot['tenKe']; ?></center></td>
                                        <td><center><?php echo $cot['donViTinh']; ?></center></td>
                                        <td><center><?php echo $cot['soLuongTon']; ?></center></td>
                                        <td><center><?php echo $cot['NSX']; ?></center></td>
                                        <td><center><?php echo $cot['NHH']; ?></center></td>
                                        <td><center><button type="button" onclick="location.href='index1.php?updatetp=<?php echo $cot['maThanhPham']; ?>';">Sửa</button></center></td>
                                        <td><center><button type="button" onclick="location.href='index1.php?deletetp=<?php echo $cot['maThanhPham']; ?>';">Xóa</button></center></td>
                                    
                                    </tr>
                                <?php
                                }
                            }
                            else{
                                echo "<script>alert('Không có dữ liệu')</script>";
                                echo '<script>window.history.back();</script>'; 
                            }
                        }
                    }
                }  
            ?>
            
            <?php
            
            
            ?>
        </tbody>
    </table>
</div>
</body>

</html>