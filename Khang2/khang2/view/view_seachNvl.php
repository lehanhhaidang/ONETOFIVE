<div class="container" style="margin-top: 120px; font-size: 16px;">
    <table class="table table-bordered" >
        <h1 style="text-align: center; font-size: 20px;">Danh sách thành phẩm</h1>
         <thead class="bang" style="align-items: center;" >
            <tr>

                <th><center>Mã nguyên vật liệu </center> </th>
                <th><center>Image</center> </th>
                <th><center>Tên nguyên vật liệu</center></th>
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
                include_once("controller/controller_qlnvl.php");
                $p=new controlerNvl();  
                if(isset($_REQUEST['timkiem1']))
                {
                    $s = $_REQUEST['tukhoa1'];
                    if($s == ""){
                        echo '<script>alert("Vui lòng nhập từ khóa tìm kiếm !")</script>';
                        echo '<script>window.history.back();</script>';
                    }else{
                        $hien = $p->seachNvl();
                        if(!$hien){// <= 0 || $count != $s
                            echo "<script>alert('Không tìm thấy kết quả cho từ khóa: $s nào !')</script>";
                            echo '<script>window.history.back();</script>'; 
                        }else{
                            if(mysqli_num_rows($hien)>0){
                                while($cot=mysqli_fetch_assoc($hien)){?>
                                    <tr>
                                        <td><center><?php echo $cot['maNguyenVatLieu']; ?></center></td>
                                        <td><center><img src="assert/image/<?php echo $cot['anh']; ?>" alt="Ảnh Thành Phẩm" style="max-width: 100px; max-height: 100px;"></center></td>
                                        <td><center><?php echo $cot['tenNguyenVatLieu']; ?></center></td>
                                        <td><center><?php echo $cot['maLoNVL']; ?></center></td>
                                        <td><center><?php echo $cot['tenKe']; ?></center></td>
                                        <td><center><?php echo $cot['donViTinh']; ?></center></td>
                                        <td><center><?php echo $cot['soLuongTonnvl']; ?></center></td>
                                        <td><center><?php echo $cot['NSX']; ?></center></td>
                                        <td><center><?php echo $cot['NHH']; ?></center></td>
                                        <td><center><button type="button" onclick="location.href='index1.php?updatenvl=<?php echo $cot['maNguyenVatLieu']; ?>';">Sửa</button></center></td>
                                        <td><center><button type="button" onclick="location.href='index1.php?deletenvl=<?php echo $cot['maNguyenVatLieu']; ?>';">Xóa</button></center></td>
                                    
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