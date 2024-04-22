<?php
 include("models/product.php");
 class ControllerSanPham{
        //biểu mẫu xuất - đơn hàng
    function getALLDH(){
        $p = new ModalSanPham();
        $tbl = $p-> selectALLDH();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    // biễu mẫu xuất - chi tiết đơn hàng
    function getALLDieuPhoiChiTietDonHang($maDonHang){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllDieuPhoiChiTietDonHang($maDonHang);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
        //biểu mẫu xuất - cập nhật tình trạng đơn hàng
    function cupdateAllDonHang($madonHang){
        $p = new ModalSanPham();
        $tbl = $p-> updateAllDonHang($madonHang);
        if(!$tbl){
            return false;
            
        }
    
    }


    //biểu mẫu xuất- phiếu yêu cầu xuất nvl
    function getALLPhieuYCXNVL(){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllPhieuYCXNVL();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    //biểu mẫu xuất - cập nhật tình trạng phiếu ycxnvl
    function cupdateAllPhieuYCXNVL($maYCXNVL){
        $p = new ModalSanPham();
        $tbl = $p-> updateAllPhieuYCXNVL($maYCXNVL);
        if(!$tbl){
            return false;
            
        }
    
    }
 //biểu mẫu xuất- phiếu yêu cầu xuất nvl
 function getALLChiTietPhieuYCXNVL($maYCXNVL){
    $p = new ModalSanPham();
    $tbl = $p-> selectAllChiTietPhieuYCXNVL($maYCXNVL);
    if(!$tbl){
        return false;
    }else{
        if(mysql_num_rows($tbl)>0){
            return $tbl;
        }else{
            return 0;
        }
    }

}
 //biểu mẫu xuất- lưu thông tin điều phối vào csdl
 function adddieuphoi($mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai){
    $p = new ModalSanPham();
    $tbl = $p-> insertdieuphoixuat($mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai);
    if(!$tbl){
        return false;
        
    }else{
       return true;
    }

}

 //biểu mẫu nhập- lưu thông tin điều phối vào csdl
 function adddieuphoinhap($mabieumau, $makho, $tennguoigiao,$ngaynhap, $loaixuat, $trangthai){
    $p = new ModalSanPham();
    $tbl = $p-> insertdieuphoinhap($mabieumau, $makho, $tennguoigiao,$ngaynhap, $loaixuat, $trangthai);
    if(!$tbl){
        return false;
        
    }else{
       return true;
    }
    
}
          //biểu mẫu nhập- cập nhật tình trạng đơn mua nvl
          function cupdateAllDonMuaNVL($maDonMuaNVL){
            $p = new ModalSanPham();
            $tbl = $p-> updateAllDonMuaNVL($maDonMuaNVL);
            if(!$tbl){
                return false;
                
            }
        
        }
     //biểu mẫu nhập- đơn mua nvl
     function getALLdonmuanvl(){
        $p = new ModalSanPham();
        $tbl = $p-> selectAlldonmuanvl();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
         //biểu mẫu nhập- chi tiết đơn mua nvl
     function getAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }


     //biểu mẫu nhập- phiếu yêu cầu nhập tp
     function getALLphieuycntp(){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllphieuycntp();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
        //biểu mẫu nhập- cập nhật tình trạng phiếu yc nhập tp
        function cupdateAllPhieuYCNTP($maPhieuYCNTP){
            $p = new ModalSanPham();
            $tbl = $p-> updateAllPhieuYCNTP($maPhieuYCNTP);
            if(!$tbl){
                return false;
                
            }
        
        }
       //biểu mẫu nhập- chi tiết phiếu yêu cầu nhập thành phẩm
       function getAllDieuPhoiChiTietPhieuYCNTP($maPhieuYCNTP){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllDieuPhoiChiTietPhieuYCNTP($maPhieuYCNTP);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    // hiển thị danh sách đơn hàng
    function getALLdonhang(){
        $p = new ModalSanPham();
        $tbl = $p-> selectAlldonhang();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    // hiển thị chi tiết don hàng
    function getALLchitietdonhang($maDonHang){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllchitietdonhang($maDonHang);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    //hiển thị danh sách kho
    function getALLkho(){
        $p = new ModalSanPham();
        $tbl = $p-> selectAllkho();
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
    // hiển thị chi tiết kho

    function getchitietkho($makho){
        $p = new ModalSanPham();
        $tbl = $p-> selectchitietkho($makho);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }

    function getchitietkho2($makho){
        $p = new ModalSanPham();
        $tbl = $p-> selectchitietkho2($makho);
        if(!$tbl){
            return false;
        }else{
            if(mysql_num_rows($tbl)>0){
                return $tbl;
            }else{
                return 0;
            }
        }

    }
 }

        
?>