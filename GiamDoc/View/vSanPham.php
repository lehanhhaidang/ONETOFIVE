<?php
    include_once("Model/mSanPham.php");
    class ViewSanPham{
        function viewAllSP(){
			$p = new ControlSanPham();
			$tblSP=$p->getAllSP();
			$this->displaySanPham($tblSP);
        }
        function displaySanPham($tbl){
		if($tbl){
        if(mysql_num_rows($tbl)>0){
			$dem=0;
            echo "<table style='width:100%'>";
            while($row = mysql_fetch_assoc($tbl)){
                if($dem==0){
                    echo "<tr>";
                }
                echo "<td style='width: 20%; height:100px'>";
                echo "<image width=110px height=100px src='image/".$row['AnhSP']."'/><br>";
                echo $row['TenSP']." <br>".$row['Gia'];echo "</td>";
                $dem++;
                if($dem%5==0){
                    echo "</tr>";
                    $dem = 0;
                }
            }
            echo "</table>";
        }else{
            echo "0 result";
        }
    }else{
        echo "Không có giá trị";
    }
    }
        
?>