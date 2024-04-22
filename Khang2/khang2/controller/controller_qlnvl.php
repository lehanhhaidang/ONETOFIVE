<?php
    include("models/qldsnvl_models.php");
    class controlerNvl{
        function selectAllNvl(){
            $p=new modelsNvl();
            $data = $p->xemNvl();
            return $data;
        }
        function selectAllKhoNVL(){
            $p=new modelsNvl();
            $data = $p->getAllKhoNVL();
            return $data;
        }

        function selectNvlById($up){
            $p=new modelsNvl();
            $data = $p->xemNvlTheoMa($up);
            return $data;
        }

        function deleteNvl($manvl){
            $p=new modelsNvl();
            $xoa=$p->xoaNvl($manvl);
            return $xoa;
        }

        function createNvl(){
            $p=new modelsNvl();
            $them=$p->themNvl();          
            return $them;           
        }

        function updateNvl($up){
            $p=new modelsNvl();
            $sua=$p->updateNvl($up);
            return $sua;
        }
        function seachNvl(){
            $p=new modelsNvl();
            $them=$p->timKiemNvlByIdOrName();
            return $them;
        }
        function getMaKe(){
            $p=new modelsNvl();
            $them=$p->loatMaKe();
            return $them;
        }
        function selectLoNVLById($up){
            $p=new modelsNvl();
            $data = $p->getLoTheoMa($up);
            return $data;
        }
    }
?>