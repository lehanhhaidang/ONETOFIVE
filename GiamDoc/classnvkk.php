<?php
class nhanvienkiemke
{
	public function connect()
	{
		$con = mysql_connect("localhost","root","");
		if(!$con)
		{
			echo 'Không kết nối được csdl';
			exit();
		}
		else
		{
			mysql_select_db("ptud");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	}
	
	public function xembienbankk($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maBBKK = $row['maBBKK'];
			
			echo '
            <a href="ChiTietCTBBTP.php?maBBKK='.$maBBKK.'">
                <div class="kho-sub">'.$maBBKK.'</div>
            </a>
        ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}

	public function xuatBBKK($sql)
	{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);
    if ($i > 0) {
        while ($row = mysql_fetch_array($ketqua)) {
            $maBBKK = $row['maBBKK'];
            $tenNVKK = $row['tenNVKK'];
            $ngayLapBB = $row['ngayLapBB'];
			$maNVKK=$row['maNVKK'];
            

            echo '<h2>Mã biên bản: ' . $maBBKK . '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Tên nhân viên kiểm kê:</b> ' . $tenNVKK . '</p>';
            echo '<p><b>Ngày lập: </b> ' . $ngayLapBB . '</p>';
            echo '</div>';
            echo '</div>';
			echo '<h1 margin-top: 130px; text-align: center>DANH SÁCH SẢN PHẨM</h1>';
        }
    } else {
        echo 'Không có dữ liệu';
    }
    mysql_close($link);
	}
	public function xuatLoTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$maDonHang = $row['maDonHang'];
			$maLoTP = $row['maLoTP'];
			$tenThanhPham = $row['tenThanhPham'];
			$maNguyenVatLieu = $row['maNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$maKe = $row['maKe'];
			$tenKe = $row['tenKe'];
			echo '  <tr>
						<td>'.$dem.'</td> <!-- Số thứ tự -->
						<td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
						<td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
						<td>'.$soLuong.'</td> <!-- Số lượng -->
						<td>'.$NSX.'</td> <!-- Đơn vị tính -->
						<td>'.$NHH.'</td> <!-- Số lượng -->
					</tr>';
				$dem ++;
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}


	/*----------KHO---------*/
	public function xuatdskhoNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$makho = $row['maKho'];
				$tenkho = $row['tenKho'];
			
			echo '
            <a href="ChiTietKhoNVL.php?maKho='.$makho.'">
                <div class="kho-sub">'.$tenkho.'</div>
            </a>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatdskhotp($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$makho = $row['maKho'];
				$tenkho = $row['tenKho'];
			
			echo '
            <a href="ChiTietKhoTP.php?maKho='.$makho.'">
                <div class="kho-sub">'.$tenkho.'</div>
            </a>
        ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatchitietkho($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) {
			$row = mysql_fetch_array($ketqua);

			// Lấy thông tin từ dữ liệu
			$makho = $row['maKho'];
			$tenkho = $row['tenKho'];
			$maPhieu = $row['maPhieu'];
			$diaChiKho = $row['diaChiKho'];
			$soLuongKe = $row['soLuongKe'];
			$dungLuongKhoToiDa = $row['dungLuongKhoToiDa'];
			$tinhTrangKho = $row['tinhTrangKho'];

			// In ra thông tin trong mẫu HTML
			echo '<h1 style="text-transform:uppercase; margin-top: 130px; text-align: center">' . $tenkho . '</h1>';
			echo '<h2 style="margin-top: 10px;">Mã kho: ' . $makho . '</h2>';
			echo '<div class="warehouse">';
			echo '    <div class="warehouse-information">';
			echo '        <p><b>Địa chỉ:</b> ' . $diaChiKho . '</p>';
			echo '        <p><b>Số lượng kệ:</b> ' . $soLuongKe . '</p>';
			echo '        <p><b>Dung lượng kho tối đa:</b> ' . $dungLuongKhoToiDa . '</p>';
			echo '        <p><b>Tình trạng:</b> ' . $tinhTrangKho . '</p>';
			echo '        <h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách hàng hóa</b></h2>';
			echo '    </div>';
			} else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}

	public function xuatLoKhoNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$makho = $row['maKho'];
			$tenkho = $row['tenKho'];
			$maKe = $row['maKe'];
			$tenKe = $row['tenKe'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			// In ra thông tin trong mẫu HTML
			echo '<tr>
                        <td>'.$tenKe.'</td>
                        <td>'.$tenNguyenVatLieu.'</td>
                        <td>'.$donViTinh.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$NSX.'</td>
                        <td>'.$NHH.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
		
	public function xuatLoKhoTP($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$makho = $row['maKho'];
			$tenkho = $row['tenKho'];
			$maKe = $row['maKe'];
			$tenKe = $row['tenKe'];
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			// In ra thông tin trong mẫu HTML
			echo '<tr>
                        <td>'.$tenKe.'</td>
                        <td>'.$tenThanhPham.'</td>
                        <td>'.$donViTinh.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$NSX.'</td>
                        <td>'.$NHH.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}

	/*lập BBKK*/





	/*Xem kho*/
	public function xemkho($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maKho = $row['maKho'];
			
			echo '
            <a href="LapBienBanKK.php?maKho='.$maKho.'">
                <div class="kho-sub">'.$maKho.'</div>

            </a>
        ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	public function lapphieukk($maKho)
	{
		$link = $this -> connect();
		if (strpos($maKho, 'NVL') !== false) {
    // Chọn loại mã NVL
    $ketqua = mysql_query("SELECT 
        k.maKho,
        ke.maKe,
        longuyenvatlieu.maLoNVL,
        nguyenvatlieu.tenNguyenVatLieu,
        nguyenvatlieu.donViTinh,
        longuyenvatlieu.soLuong,
        longuyenvatlieu.NSX,
        longuyenvatlieu.NHH,
        chitietbbbtnvl.lyDo AS ghiChu
    FROM kho k
    JOIN ke ON k.maKho = ke.maKho
    JOIN longuyenvatlieu ON ke.maKe = longuyenvatlieu.maKe
    JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
    LEFT JOIN chitietbbbtnvl ON longuyenvatlieu.maLoNVL = chitietbbbtnvl.maLoNVL
    WHERE k.maKho = '$maKho';");

$i = mysql_num_rows($ketqua);
if ($i >0)
{
	while ($row=mysql_fetch_assoc($ketqua))
	{
		
	echo'	<tr> ';
	echo'  <td class="custom-cell">'. $row['maKe'] .'</td>';
	
	echo'  <td class="custom-cell">'. $row['maLoNVL'] .'</td>';
	echo'  <td class="custom-cell">'. $row['tenNguyenVatLieu'] .'</td>';
	echo'  <td class="custom-cell">'. $row['donViTinh'] .'</td>';
	echo'  <td class="custom-cell">'. $row['soLuong'] .'</td>';
	echo'  ';
	echo'  <td class="custom-cell">'. $row['NSX'] .'</td>';
	echo'  <td class="custom-cell">'. $row['NHH'] .'</td>';
	echo'  <td class="custom-cell"> <input> </td>';
	echo'</tr>';
	}
}
else
{
	echo 'Không có dữ liệu';
}

} else {
    // Chọn loại mã TP
    $ketqua = mysql_query("SELECT 
        ke.maKe,
        lothanhpham.maLoTP,
        thanhpham.tenThanhPham,
        thanhpham.donViTinh,
        lothanhpham.soLuong,
        lothanhpham.NSX,
        lothanhpham.NHH,
        chitietbbtp.ghiChu
    FROM 
        kho
    JOIN 
        ke ON kho.maKho = ke.maKho
    JOIN 
        lothanhpham ON ke.maKe = lothanhpham.maKe
    JOIN 
        thanhpham ON lothanhpham.maThanhPham = thanhpham.maThanhPham
    LEFT JOIN 
        chitietbbtp ON lothanhpham.maLoTP = chitietbbtp.maLoTP
    WHERE 
        kho.maKho = '$maKho'");
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_assoc($ketqua))
			{
			echo'	<tr> ';
            echo'  <td class="custom-cell">'. $row['maKe'] .'</td>';
		
            echo'  <td class="custom-cell">'. $row['maLoTP'] .'</td>';
            echo'  <td class="custom-cell">'. $row['tenThanhPham'] .'</td>';
            echo'  <td class="custom-cell">'. $row['donViTinh'] .'</td>';
            echo'  <td class="custom-cell">'. $row['soLuong'] .'</td>';
            echo'  ';
            echo'  <td class="custom-cell">'. $row['NSX'] .'</td>';
            echo'  <td class="custom-cell">'. $row['NHH'] .'</td>';
            echo'  <td class="custom-cell"> <input> </td>';
            echo'</tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
}
		
		mysql_close($link);
	}
	function laymakho()

	{
		$link = $this -> connect();
		$ketqua = mysql_query("select * from kho");
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			return $ketqua;
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	// taọ mã tự động
	function mabienbangtudong($maKho){

		$link = $this -> connect();
		$ketqua = mysql_query("select * from bienbankiemke");
		if (mysql_num_rows($ketqua)>0) {
			
			$row = mysql_num_rows($ketqua);
			$counter = $row + 1;
		
			// Định dạng số đếm thành hai chữ số
			$counterFormatted = sprintf('%02d', $counter);
		
			// Chuỗi kết quả
			if (strpos($maKho, 'NVL') !== false) {
				$resultString = "BBKKNVL" . $counterFormatted;

			}else{
				$resultString = "BBKKTP" . $counterFormatted;
			}
			
			// Hiển thị chuỗi kết quả
			echo $resultString;

			
		} else {
			echo "No records found";
		}
	}
	public function xembbkk($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maBBKK = $row['maBBKK'];
			
			echo '
            <a href="xemctbbkk.php?maBBKK='.$maBBKK.'">
                <div class="kho-sub">'.$maBBKK.'</div>

            </a>
        ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	


	
	

                                                                                         

}

?>