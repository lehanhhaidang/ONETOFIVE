<?php
        include("ketnoi.php");
        //đơn hàng
        class ModalSanPham{
            // biểu mẫu xuất -đơn hàng
           function selectAllDH(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from donhang where trangThai ='no'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
              // biểu mẫu xuất - cập nhật tình trang đơn hàng
              function updateAllDonHang($maDonHang){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "update donHang SET trangThai = 'Yes' WHERE maDonHang = '$maDonHang'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }

           // biieuer mẫu xuất chi tiết đơn hàng
           function selectAllDieuPhoiChiTietDonHang($maDonHang){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select
                dh.tenKhachHang,
                lh.maKe,
                tp.tenThanhPham,
                tp.donViTinh,
                lh.soLuong
            FROM
                lothanhpham lh
            JOIN
                thanhpham tp ON lh.maThanhPham = tp.maThanhPham
            JOIN
                donhang dh ON lh.maDonHang = dh.maDonHang
            WHERE
                dh.maDonHang = '$maDonHang'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
            // biểu mẫu xuất -phiếu yêu cầu xuất nvl
           function selectAllPhieuYCXNVL(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from phieuycxnvl where tinhTrang='Duyệt'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
          
            // biểu mẫu xuất - cập nhật tình trang phiếu yêu cầu xuất
           function updateAllPhieuYCXNVL($maYCXNVL){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "update phieuycxnvl SET tinhTrang = 'Đã Duyệt' WHERE maYCXNVL = '$maYCXNVL' ;";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
           

             // biểu mẫu xuất -chi tiết phiếu yêu cầu xuất nvl
             function selectAllChiTietPhieuYCXNVL($maYCXNVL){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "select
                    dh.tenKhachHang,
                    lh.maKe,
                    tp.tenNguyenVatLieu,
                    tp.donViTinh,
                    lh.soLuong
                FROM
                    longuyenvatlieu lh
                JOIN
                    nguyenvatlieu tp ON lh.maNguyenVatLieu = tp.maNguyenVatLieu
                JOIN
                    phieuycxnvl dh ON lh.maPhieuYCXNVL	 = dh.maYCXNVL
                WHERE
                    dh.maYCXNVL = '$maYCXNVL'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
               // biểu mẫu xuất -điều phối - lưu thông tin điều phối vào cơ sở dữ liệu
             function insertdieuphoixuat($mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "insert into bieumauxuat (maBMXuat, maKho, tenNguoiNhan, ngayXuat, loaiXuat, trangThai)
                    VALUES ('$mabieumau', '$makho', '$tennguoinhan', '$ngayxuat', '$loaixuat', '$trangthai')";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
                        //BIỂU MẪU nhập

                 // biểu mẫu nhập -điều phối - lưu thông tin điều phối vào cơ sở dữ liệu
             function insertdieuphoinhap($mabieumau, $makho, $tennguoigiao,$ngaynhap, $loaixuat, $trangthai){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "insert into bieumaunhap (maBMNhap, maKho, tenNguoiGiao, ngayNhap, loaiNhap, trangThai)
                    VALUES ('$mabieumau', '$makho', '$tennguoigiao', '$ngaynhap', '$loaixuat', '$trangthai')";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
           // biểu mẫu nhập- đơn mua nvl
           function selectAlldonmuanvl(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from donmuanvl where tinhTrang = 'no'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           } 
             // biểu mẫu nhập - cập nhật tình trang đơn mua nvl
             function updateAllDonMuaNVL($maDonMuaNVL){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "update donmuanvl SET tinhTrang = 'Yes' WHERE maDonMuaNVL = '$maDonMuaNVL'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
             // biieuer mẫu nhập - chi tiết đơn mua NVL
             function selectAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "select dh.maDonMuaNVL,tenNguyenVatLieu,donViTinh,soLuong,maKe,tenNCC
                    FROM
                        longuyenvatlieu lh
                    JOIN
                        nguyenvatlieu tp ON lh.maNguyenVatLieu = tp.maNguyenVatLieu
                    JOIN
                        donmuanvl dh ON lh.madonmuanvl	 = dh.maDonMuaNVL              
      WHERE
                        dh.maDonMuaNVL = '$maDonMuaNVL'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }

           // biểu mẫu nhập - phiếu yêu cầu nhập tp
           function selectAllphieuycntp(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from phieuycntp where tinhTrang='Duyệt'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
             // biểu mẫu nhập - cập nhật tình trang phiếu yêu cầu nhập tp
             function updateAllPhieuYCNTP($maPhieuYCNTP){
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "update phieuycntp SET tinhTrang = 'YES' WHERE maPhieuYCNTP = '$maPhieuYCNTP'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
             // biieuer mẫu nhập - chi tiết phiếu yêu cầu nhập thành phẩm
             function selectAllDieuPhoiChiTietPhieuYCNTP($maPhieuYCNTP){
           
                $p = new KetNoiDB();
                if($p ->moKetNoi($conn)){
                    $query = "select
                    dh.maPhieuYCNTP, maKe,tenThanhPham, donViTinh, SoLuong
                   
                FROM
                    lothanhpham lh
                JOIN
                    thanhpham tp ON lh.maThanhPham = tp.maThanhPham
                JOIN
                    phieuycntp dh ON lh.maPhieuYCNTP = dh.maPhieuYCNTP
                WHERE
                    dh.maPhieuYCNTP = '$maPhieuYCNTP'";
                    
                    $tbl = mysql_query($query);
                    return $tbl;    
                    }else{
                    return false;
                }
               }
           // hiển thị danh sách đơn hàng
           function selectAlldonhang(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from donhang";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
           // hiển thị chi tiết đơn hàng 
           function selectAllchitietdonhang($maDonHang){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select
    
                *
            FROM
                lothanhpham lh
            JOIN
                thanhpham tp ON lh.maThanhPham = tp.maThanhPham
            JOIN
                donhang dh ON lh.maDonHang = dh.maDonHang
            WHERE
                dh.maDonHang = '$maDonHang'";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
           
           // hiển thị danh sách kho
           function selectAllkho(){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from kho";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }


           // hiển thị chi tiết kho theo mã kho
           function selectchitietkho($makho){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select * from kho INNER JOIN ke ON kho.maKho = ke.maKho INNER JOIN longuyenvatlieu ON ke.maKe = longuyenvatlieu.maKe
                INNER JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
                WHERE kho.maKho = '$makho'  AND longuyenvatlieu.maPXNVL IS NULL";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
           

           function selectchitietkho2($makho){
           
            $p = new KetNoiDB();
            if($p ->moKetNoi($conn)){
                $query = "select *
                FROM kho
                INNER JOIN ke ON kho.maKho = ke.maKho
                INNER JOIN lothanhpham ON ke.maKe = lothanhpham.maKe
                INNER JOIN thanhpham ON lothanhpham.maThanhPham = thanhpham.maThanhPham
                WHERE kho.maKho = '$makho'  AND lothanhpham.maPXTP IS NULL";
                
                $tbl = mysql_query($query);
                return $tbl;    
                }else{
                return false;
            }
           }
        }
        
        

?>