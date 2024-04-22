<?php
class func {
    private $con; // Property to store the database connection

    public function connect()
	{
		$conn = mysql_connect("localhost","root","");
		if(!$conn){
			echo "Khong the ket noi";
			exit();
		}else{
			mysql_select_db("ptud");
			mysql_query("SET NAMES UTF8");
			return $conn;
		}
	}

    public function DSBMN($sql)
    {
        
        $link = $this->connect();
        $result =mysql_query($sql,$link);
        $i = mysql_num_rows($result);
        if($i>0)
        {
            while($row=mysql_fetch_array($result)){
                $maBMNhap = $row['maBMNhap'];
                $trangthai = $row['trangThai'];
                echo ' <div class="bieumau">
               
                    <a href="BieuMauNhap.php?idBMN='.$maBMNhap.'"> <div class="bieumau-sub">
                        '.$maBMNhap.' - '.$trangthai.' </div>
                    </a>
                </div>
           ';
            }
        }
       else
       {
        echo 'Không có biểu mẫu nhập nào';
       }
    }  
    public function DSBMX($sql)
        {
        
        $link = $this->connect();
        $result =mysql_query($sql,$link);
        $i = mysql_num_rows($result);
        if($i>0)
        {
            while($row=mysql_fetch_array($result)){
                $maBMXuat = $row['maBMXuat'];
                $trangthai = $row['trangThai'];
                echo ' <div class="bieumau">
               
                <a href="BieuMauXuat.php?idBMX='.$maBMXuat.'"> <div class="bieumau-sub">
                        '.$maBMXuat.' - '.$trangthai.'</div>
                    </a>
                </div>
            ';
            }
        }
        else
        {
            echo 'Không có biểu mẫu xuất nào';
        }  
        
    }

    public function DSSP($sql)
    {
        $link = $this->connect();
        $result =mysql_query($sql, $link);
        $i = mysql_num_rows($result);
        $count = 1;
        if($i>0)
        {
            while($row=mysql_fetch_array($result)){
                $tenSP = $row['tenSanPham'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];
                $nsx = $row['ngaySanXuat'];
                $nhh = $row['ngayHetHan'];
                echo '<tr>
                <td>'.$count++.'</td> <!-- Số thứ tự -->
                <td>'.$tenSP.'</td> <!-- Tên sản phẩm -->
                <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                <td>'.$soLuong.'</td> <!-- Số lượng -->';
                if(!empty($nsx))
                {
                    echo' <td>'.$nsx.'</td> <!-- Ngày sản xuất -->
                    <td>'.$nhh.'</td> <!-- Hạn sử dụng -->
                </tr>';
                }
                else
                {
                    echo '<td>Chưa có</td> <!-- Ngày sản xuất -->
                    <td>Chưa có</td> <!-- Hạn sử dụng -->
                </tr>';
                }
                
            }
        }
    }

    
    

    public function InsertUpdate($sql)
	{
		$link = $this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

    
    public function countRow ($sql)
    {
        $link = $this -> connect();
		$result = mysql_query($sql,$link);
		$i = mysql_num_rows($result);
        return $i;
    }

    public function pickColumn ($sql)
	{
		$link = $this -> connect();
		$result = mysql_query($sql,$link);
		$i = mysql_num_rows($result);
		$value = '';
		if($i>0)
		{
			while($row = mysql_fetch_array($result))
			{
				$value = $row[0];
			}
		}
		return $value;
	}

     public function DSLNVL($sql)
    {
        $link = $this->connect();
        $result =mysql_query($sql, $link);
        $i = mysql_num_rows($result);
        $count = 1;
        if($i>0)
        {
            while($row=mysql_fetch_array($result)){
                $tenSP = $row['tenNguyenVatLieu'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];
                $nsx = $row['NSX'];
                $nhh = $row['NHH'];
                echo '<tr>
                <td>'.$count++.'</td> <!-- Số thứ tự -->
                <td>'.$tenSP.'</td> <!-- Tên sản phẩm -->
                <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                <td>'.$soLuong.'</td> <!-- Số lượng -->
                <td>'.$nsx.'</td> <!-- Ngày sản xuất -->
                <td>'.$nhh.'</td> <!-- Hạn sử dụng -->
                </tr>';
                
            }
        }
    }

    public function DSTP($sql)
    {
        $link = $this->connect();
        $result =mysql_query($sql, $link);
        $i = mysql_num_rows($result);
        $count = 1;
        if($i>0)
        {
            while($row=mysql_fetch_array($result)){
                $tenSP = $row['tenThanhPham'];
                $soLuong = $row['soLuong'];
                $donViTinh = $row['donViTinh'];
                $nsx = $row['NSX'];
                $nhh = $row['NHH'];
                echo '<tr>
                <td>'.$count++.'</td> <!-- Số thứ tự -->
                <td>'.$tenSP.'</td> <!-- Tên sản phẩm -->
                <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                <td>'.$soLuong.'</td> <!-- Số lượng -->
                <td>'.$nsx.'</td> <!-- Ngày sản xuất -->
                <td>'.$nhh.'</td> <!-- Hạn sử dụng -->
                </tr>';
                
            }
        }
    }

    
}


?>

