<?php
    include("models/qldstp_models.php");
    class controlerThanhPham{
        function selectAllTp(){
            $p=new modelsThanhPham();
            $data = $p->xemThanhPham();
            return $data;
        }

        function selectTpById($up){
            $p=new modelsThanhPham();
            $data = $p->xemThanhPhamTheoMa($up);
            return $data;
        }
        function selectLoTpById($up){
            $p=new modelsThanhPham();
            $data = $p->xemLoThanhPhamTheoMa($up);
            return $data;
        }
        function selectMaKe(){
            $p=new modelsThanhPham();
            $data = $p->loatMaKe();
            return $data;
        }
        function deleteTp($matp){
            $p=new modelsThanhPham();
            $xoa=$p->xoaThanhPham($matp);
            return $xoa;
        }

        function createTp(){
            $p=new modelsThanhPham();
            $them=$p->themThanhPham();          
            return $them;           
        }

        function updateTp($up){
            $p=new modelsThanhPham();
            $sua=$p->updateThanhPham($up);
            return $sua;
        }
        function seachByIdOrName(){
            $p=new modelsThanhPham();
            $them=$p->timkiemTpTheoMaOrTen();
            return $them;

        }
        function kiemTraMaTonTai($matp){
            $p=new modelsThanhPham();
            $them=$p->kiemTraMaThanhPhamTonTai($matp);
            return $them;
        }
        function getAllKhoTP(){
            $p=new modelsThanhPham();
            $them=$p->getAllKhoTP();
            return $them;
        }
    }  
?>