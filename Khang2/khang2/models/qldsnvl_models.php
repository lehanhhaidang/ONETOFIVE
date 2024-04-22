<?php
    include_once("models/connection.php");
    class modelsNvl{
        function xemNvl(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="SELECT * FROM ke k JOIN longuyenvatlieu lnvl ON lnvl.maKe= k.maKe JOIN nguyenvatlieu nvl ON nvl.maNguyenVatLieu = nvl.maNguyenVatLieu where k.maKho = 'KNVL01' and nvl.status = 1";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    echo mysqli_error($conn);
                }
                return $qr;

                $p -> unconnect($conn);
            }
            else{
                return false;
            }
        }
        function loatMaKe(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="SELECT k.maKe, k.tenKe FROM ke k  where k.maKho = 'KNVL01'";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    echo mysqli_error($conn);
                }
                return $qr;

                $p -> unconnect($conn);
            }
            else{
                return false;
            }
        }
        //xóa
        function xoaNvl($manvl){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p=new Connection($conn);
            if($p->connect($conn)){
                
                $sql="update nguyenvatlieu set status='0' where maNguyenVatLieu= '$manvl'";
                
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    mysqli_error($conn);
                    
                }  
                return $qr;
                $p->unconnect($conn);                
            }
            else{
                echo "<script>alert('Không có')</script>";
            }
        }
        //thêm tp
        // function themNvl(){
        //     $conn= mysqli_connect('localhost','root','', 'ptud');
            
        //     $p=new Connection($conn);
        //     $p->connect($conn);
        //     if($p->connect($conn)){
        //         if(isset($_POST['themnvl'])){
        //             $manvl = $_POST['manvl'];
        //             $tenNguyenVatLieu = $_POST['tennguyenvatlieu'];
        //             $donvitinh = $_POST['donvitinh']; 
        //             $soluongton = $_POST['soluongton']; 
        //             $anh = $_POST['anh'];              
        //             $sql = "insert into nguyenvatlieu (maNguyenVatLieu, tenNguyenVatLieu, donViTinh, soLuongTon, anh) values ('$manvl','$tenNguyenVatLieu', '$donvitinh','$soluongton','$anh')";                  
        //         }
        //     $qr=mysqli_query($conn, $sql);
        //     if(!$qr){
        //         echo mysqli_error($conn);
        //     }
        //     return $qr;
        //     $p->unconnect($conn);
        //     }
        //     else{
        //         return false;
        //     }
        // }
        function themNvl() {
            $conn = mysqli_connect('localhost', 'root', '', 'ptud');
            $p = new Connection($conn);
            $p->connect($conn);
            
            if ($p->connect($conn)) {
                if (isset($_POST['themnvl']) && isset($_FILES['anh'])) {
                    $sql = "SELECT maNguyenVatLieu  FROM nguyenvatlieu ORDER BY maNguyenVatLieu DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $manvl='';
                    if (!$result) {
                        die('Lỗi truy vấn: ' . mysqli_error());
                    } else {
                        $row = mysqli_fetch_assoc($result);
                        $latestMaNVL  = $row['maNguyenVatLieu'];
                        $currentNumber = (int)substr($latestMaNVL, 3);
                        $nextNumber = $currentNumber + 1;
                        $nextMaNVL = 'NVL' . sprintf('%02d', $nextNumber);
                
                        $manvl =$nextMaNVL;
                    }
                    $sql2 = "SELECT maLoNVL FROM longuyenvatlieu ORDER BY maLoNVL DESC LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $maLo='';

                    if (!$result2) {
                        die('Lỗi truy vấn: ' . mysqli_error());
                    } else {
                        $row = mysqli_fetch_assoc($result2);
                        $latestMaLo  = $row['maLoNVL'];
                        $currentNumber = (int)substr($latestMaLo, 4);
                        $nextNumber = $currentNumber + 1;
                        $nextMaLo = 'LNVL' . sprintf('%02d', $nextNumber);
                
                        $maLo = $nextMaLo;
                    }
                   
                    $tenNguyenVatLieu = $_POST['tennguyenvatlieu'];
                    $donvitinh = $_POST['donvitinh'];
                    $soluongton = 0;
                   
                    $ke = $_POST['maKe'];
                    $ngaySX = $_POST['nsx'];
                    $ngayHH = $_POST['nhh'];
                   
                    $fileAnh = $_FILES['anh'];
                
                    if (!empty($fileAnh['name'])) {
                        $tenAnh = basename($fileAnh["name"]);
                    
                        $duongDanMoi = "assert/image/" . $tenAnh;
                    
                        if (move_uploaded_file($fileAnh["tmp_name"], $duongDanMoi)) {
                            $sqlInsertNguyenVatLieu = "INSERT INTO nguyenvatlieu (maNguyenVatLieu, tenNguyenVatLieu, donViTinh, soLuongTonnvl, anh) VALUES ('$manvl', '$tenNguyenVatLieu', '$donvitinh', '$soluongton', '$tenAnh')";
                            $resultNguyenVatLieu = mysqli_query($conn, $sqlInsertNguyenVatLieu);
                    
                            $sqlInsertLoThanhPham = "INSERT INTO longuyenvatlieu (maLoNVL, maNguyenVatLieu, maKe, NSX, NHH) VALUES ('$maLo', '$manvl', '$ke', '$ngaySX', '$ngayHH')";
                            $resultLoThanhPham = mysqli_query($conn, $sqlInsertLoThanhPham);
                            if (!!$resultNguyenVatLieu || !$resultLoThanhPham) {
                                echo mysqli_error($conn);
                            } else {
                                echo "<script>alert('Thêm nguyên vật liệu thành công')</script>";
                            }
                        } else {
                            echo "Có lỗi khi tải ảnh lên.";
                        }
                    } else {
                        
                        // Người dùng không chọn ảnh, xử lý logic tương ứng
                        $tenAnh = "anhnull.jpg";
                        $duongDanMoi = "assert/image/" . $tenAnh;
                    
                            $sqlInsertNguyenVatLieu = "INSERT INTO nguyenvatlieu (maNguyenVatLieu, tenNguyenVatLieu, donViTinh, soLuongTonnvl, anh) VALUES ('$manvl', '$tenNguyenVatLieu', '$donvitinh', '$soluongton', '$tenAnh')";
                            $resultNguyenVatLieu = mysqli_query($conn, $sqlInsertNguyenVatLieu);
                    
                            $sqlInsertLoThanhPham = "INSERT INTO longuyenvatlieu (maLoNVL, maNguyenVatLieu, maKe, NSX, NHH) VALUES ('$maLo', '$manvl', '$ke', '$ngaySX', '$ngayHH')";
                            $resultLoThanhPham = mysqli_query($conn, $sqlInsertLoThanhPham);
                    
                        if (!$resultNguyenVatLieu || !$resultLoThanhPham) {
                            echo mysqli_error($conn);
                        } else {
                            echo "<script>alert('Thêm nguyên vật liệu  thành công')</script>";
                        }
                    }
                        
                    
                }
            } else {
                return false;
            }
        }
        //cập nhật
        function updateNvl($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p=new Connection($conn);
            $p->connect($conn);
            if($p->connect($conn)){
                if(isset($_POST["update"])){
                    $matp = $up;
                    $tenThanhPham = $_POST['tennguyenvatlieu'];
                    $donvitinh = $_POST['donvitinh']; 
                    $soluongton = 0;
                    $anh = $_POST['anh'];  
                    $ke = $_POST['maKe'];
                    $ngaySX = $_POST['nsx'];
                    $ngayHH = $_POST['nhh'];
                    
                    $fileAnh = $_FILES['anh'];
                
                    if (!empty($fileAnh['name'])) {
                        $tenAnh = basename($fileAnh["name"]);
                    
                        $duongDanMoi = "assert/image/" . $tenAnh;
                    
                        if (move_uploaded_file($fileAnh["tmp_name"], $duongDanMoi)) {
                            $sql = "UPDATE nguyenvatlieu set  tenNguyenvatLieu = '$tenThanhPham', donViTinh = '$donvitinh',soLuongTonnvl = '$soluongton', anh ='$tenAnh' WHERE maNguyenVatLieu = '$up'";
                            $qr = mysqli_query($conn ,$sql);
                            $sql2 = "UPDATE longuyenvatlieu set  maKe = '$ke', NSX = '$ngaySX',NHH = '$ngayHH' WHERE maNguyenVatLieu = '$up'";
                            $qr2 = mysqli_query($conn ,$sql2);
                    
                            if (!$qr || !$qr2) {
                                echo mysqli_error($conn);
                            } else {
                                echo "<script>alert('Cập nhập nguyên vật liệu thành công'); window.location.href = 'index1.php?qldsnvl'</script>";
                            }
                        } else {
                            echo "Có lỗi khi tải ảnh lên.";
                        }
                    } else {

                        $sql = "UPDATE nguyenvatlieu set  tenNguyenvatLieu = '$tenThanhPham', donViTinh = '$donvitinh',soLuongTonnvl = '$soluongton' WHERE maNguyenVatLieu = '$up'";
                        $qr = mysqli_query($conn ,$sql);
                        $sql2 = "UPDATE longuyenvatlieu set  maKe = '$ke', NSX = '$ngaySX',NHH = '$ngayHH' WHERE maNguyenVatLieu = '$up'";
                        $qr2 = mysqli_query($conn ,$sql2);
                    
                        if (!$qr || !$qr2) {
                            echo mysqli_error($conn);
                        } else {
                            echo "<script>alert('Cập nhập nguyên vật liệu thành công'); window.location.href = 'index1.php?qldsnvl'</script>";
                        }
                    }
    
                }   
            }
            else{
                return false;
            }
        }
        
        function xemNvlTheoMa($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="select * from nguyenvatlieu where maNguyenVatLieu='$up'";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    echo mysqli_error($conn);
                }
                return $qr;

                $p -> unconnect($conn);
            }
            else{
                return false;
            }
        }
        function timKiemNvlByIdOrName(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $s = $_REQUEST['tukhoa1'];
                $sql="SELECT * FROM ke k JOIN longuyenvatlieu lnvl ON lnvl.maKe= k.maKe JOIN nguyenvatlieu nvl ON nvl.maNguyenVatLieu = lnvl.maNguyenVatLieu where k.maKho = 'KNVL01' and (nvl.tenNguyenVatLieu like '%$s%' or nvl.maNguyenVatLieu like '%$s%') and nvl.status=1";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    return null;
                }
                return $qr;

                $p -> unconnect($conn);
            }
            else{
                return false;
            }
        }
        function getAllKhoNVL(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="SELECT * FROM kho WHERE maKho LIKE 'KNVL%'";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    echo mysqli_error($conn);
                }
                return $qr;

                $p -> unconect($conn);
            }
            else{
                return false;
            }
        }
        function getLoTheoMa($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="select * from longuyenvatlieu where maNguyenVatLieu='$up'";
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    echo mysqli_error($conn);
                }
                return $qr;

                $p -> unconect($conn);
            }
            else{
                return false;
            }
        }    

    }
?>
