<?php
    class Connection{
        function connect($conn){
            $conn= mysqli_connect('localhost','root','');
            mysqli_set_charset($conn,'utf8');
            if($conn){
                return mysqli_select_db($conn, 'ptud');
            }
            else{
                return false;
            }
        }

        function unconnect($conn){
            $conn= mysqli_connect('localhost','root','');
        }
    }
?>