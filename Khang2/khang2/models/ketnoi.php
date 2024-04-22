<?php
    class KetNoiDB{
        function moKetNoi($con){
            
            $con =   mysql_connect("localhost", "root", "");
            mysql_set_charset("utf8");
            if($con){
                $db = mysql_select_db("ptudcu");
                
                return $db;
            }else{
                return false;
            }
        }
        function dongketnoi($con){
            mysql_close($con);

        }
    }

   
  
?>