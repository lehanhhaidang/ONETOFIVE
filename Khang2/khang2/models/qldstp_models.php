<?php
    include_once("models/connection.php");
    class modelsThanhPham{
        function xemThanhPham(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="	SELECT * FROM ke k JOIN lothanhpham lp ON lp.maKe= k.maKe JOIN thanhpham tp ON tp.maThanhPham = lp.maThanhPham where k.maKho = 'KTP01' and tp.status = 1";
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
        function loatMaKe(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="SELECT k.maKe, k.tenKe FROM ke k  where k.maKho = 'KTP01'";
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
        //xóa
        function xoaThanhPham($matp){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p=new Connection($conn);
            if($p->connect($conn)){
                
                $sql="update thanhpham set status = '0' where maThanhPham= '$matp'";
                
                $qr=mysqli_query($conn, $sql);
                if(!$qr){
                    mysqli_error($conn);
                    
                }  
                return $qr;
                $p->unconect($conn);             
            }
            else{
                echo "<script>alert('Không có')</script>";
            }
        }
        function kiemTraMaThanhPhamTonTai($matp) {
            $conn = mysqli_connect('localhost', 'root', '', 'ptud');
            $sql = "SELECT maThanhPham as count FROM thanhpham WHERE maThanhPham = '$matp'";
            $result = mysqli_query($conn, $sql);
    
            if (!$result) {
                echo mysqli_error($conn);
                return false;
            }
    
            return $result;
            
        }   
    
        //thêm tp
        function themThanhPham() {
            $conn = mysqli_connect('localhost', 'root', '', 'ptud');
            $p = new Connection($conn);
            $p->connect($conn);
            
            if ($p->connect($conn)) {
                if (isset($_POST['themtp']) && isset($_FILES['anh'])) {
                    $sql = "SELECT maThanhPham  FROM thanhpham ORDER BY maThanhPham DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $matp='';
                    if (!$result) {
                        die('Lỗi truy vấn: ' . mysqli_error());
                    } else {
                        $row = mysqli_fetch_assoc($result);
                        $latestMaTP  = $row['maThanhPham'];
                        $currentNumber = (int)substr($latestMaTP, 2);
                        $nextNumber = $currentNumber + 1;
                        $nextMaTP = 'TP' . sprintf('%02d', $nextNumber);
                
                         $matp =$nextMaTP;
                    }
                    $sql2 = "SELECT maLoTP FROM lothanhpham ORDER BY maLoTP DESC LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $maLo='';

                    if (!$result2) {
                        die('Lỗi truy vấn: ' . mysqli_error());
                    } else {
                        $row = mysqli_fetch_assoc($result2);
                        $latestMaLo  = $row['maLoTP'];
                        $currentNumber = (int)substr($latestMaLo, 3);
                        $nextNumber = $currentNumber + 1;
                        $nextMaLo = 'LTP' . sprintf('%02d', $nextNumber);
                
                        $maLo = $nextMaLo;
                    }
                   
                    $tenThanhPham = $_POST['tenthanhpham'];
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
                            $sqlInsertThanhPham = "INSERT INTO thanhpham (maThanhPham, tenThanhPham, donViTinh, soLuongTon, anh) VALUES ('$matp', '$tenThanhPham', '$donvitinh', '$soluongton', '$tenAnh')";
                            $resultThanhPham = mysqli_query($conn, $sqlInsertThanhPham);
                    
                            $sqlInsertLoThanhPham = "INSERT INTO lothanhpham (maLoTP, maThanhPham, maKe, NSX, NHH) VALUES ('$maLo', '$matp', '$ke', '$ngaySX', '$ngayHH')";
                            $resultLoThanhPham = mysqli_query($conn, $sqlInsertLoThanhPham);
                    
                            if (!$resultThanhPham || !$resultLoThanhPham) {
                                echo mysqli_error($conn);
                            } else {
                                echo "<script>alert('Thêm thành phẩm thành công')</script>";
                            }
                        } else {
                            echo "Có lỗi khi tải ảnh lên.";
                        }
                    } else {
                        
                        // Người dùng không chọn ảnh, xử lý logic tương ứng
                        $tenAnh = "anhnull.jpg";
                        $duongDanMoi = "assert/image/" . $tenAnh;
                    
                        $sqlInsertThanhPham = "INSERT INTO thanhpham (maThanhPham, tenThanhPham, donViTinh, soLuongTon, anh) VALUES ('$matp', '$tenThanhPham', '$donvitinh', '$soluongton', '$tenAnh')";
                        $resultThanhPham = mysqli_query($conn, $sqlInsertThanhPham);
                    
                        $sqlInsertLoThanhPham = "INSERT INTO lothanhpham (maLoTP, maThanhPham, maKe, NSX, NHH) VALUES ('$maLo', '$matp', '$ke', '$ngaySX', '$ngayHH')";
                        $resultLoThanhPham = mysqli_query($conn, $sqlInsertLoThanhPham);
                    
                        if (!$resultThanhPham || !$resultLoThanhPham) {
                            echo mysqli_error($conn);
                        } else {
                            echo "<script>alert('Thêm thành phẩm thành công')</script>";
                        }
                    }
                        
                    
                }
            } else {
                return false;
            }
        }
        //cập nhật
        function updateThanhPham($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p=new Connection($conn);
            $p->connect($conn);
            if($p->connect($conn)){
                if(isset($_POST["update"])){
                    $matp = $up;
                    $tenThanhPham = $_POST['tenthanhpham'];
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
                            $sql = "UPDATE thanhpham set  tenThanhPham = '$tenThanhPham', donViTinh = '$donvitinh',soLuongTon = '$soluongton', anh ='$tenAnh' WHERE maThanhPham = '$up'";
                            $qr = mysqli_query($conn ,$sql);
                            $sql2 = "UPDATE lothanhpham set  maKe = '$ke', NSX = '$ngaySX',NHH = '$ngayHH' WHERE maThanhPham = '$up'";
                            $qr2 = mysqli_query($conn ,$sql2);
                    
                            if (!$qr || !$qr2) {
                                echo mysqli_error($conn);
                            } else {
                                echo "<script>alert('Cập nhập thành phẩm  thành công'); window.location.href = 'index1.php?qldstp'</script>";
                            }
                        } else {
                            echo "Có lỗi khi tải ảnh lên.";
                        }
                    } else {

                        $sql = "UPDATE thanhpham set  tenThanhPham = '$tenThanhPham', donViTinh = '$donvitinh',soLuongTon = '$soluongton' WHERE maThanhPham = '$up'";
                        $qr = mysqli_query($conn ,$sql);
                        $sql2 = "UPDATE lothanhpham set  maKe = '$ke', NSX = '$ngaySX',NHH = '$ngayHH' WHERE maThanhPham = '$up'";
                        $qr2 = mysqli_query($conn ,$sql2);
                    
                        if (!$qr || !$qr2) {
                            echo mysqli_error($conn);
                        } else {
                            echo "<script>alert('Cập nhập thành phẩm  thành công'); window.location.href = 'index1.php?qldstp'</script>";
                        }
                    }
    
                }   
            }
            else{
                return false;
            }
        }

        
        function xemThanhPhamTheoMa($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="select * from thanhpham where maThanhPham='$up'";
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
        function xemLoThanhPhamTheoMa($up){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="select * from lothanhpham where maThanhPham='$up'";
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
        function timkiemTpTheoMaOrTen(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            $p = new Connection($conn);
            if($p->connect($conn))
            {   $s = $_REQUEST['tukhoa'];
                $sql="	SELECT * FROM ke k JOIN lothanhpham lp ON lp.maKe= k.maKe JOIN thanhpham tp ON tp.maThanhPham = lp.maThanhPham where k.maKho = 'KTP01' and (tp.maThanhPham like '%$s%' or tp.tenThanhPham like '%$s%') and tp.status =1";
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
        
        function getAllKhoTP(){
            $conn= mysqli_connect('localhost','root','', 'ptud');
            mysqli_set_charset($conn,'utf8');
            $p = new Connection($conn);
            if($p->connect($conn))
            {
                $sql="SELECT * FROM kho WHERE maKho LIKE 'KTP%'";
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
