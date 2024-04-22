<?php
class nhanvienkho
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
	public function tongbm($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);

		// Khởi tạo biến tổng số biểu mẫu
		$total = 0;

		if ($i > 0) {
			// Nếu có kết quả trả về, lặp qua từng dòng dữ liệu để tính tổng
			while ($row = mysql_fetch_assoc($ketqua)) {
				// Lấy giá trị từ cột "total" (hoặc tên cột chứa tổng số biểu mẫu)
				$total += $row['total'];
			}
		}

		// Kết thúc việc sử dụng kết nối MySQL
		mysql_close($link);

		// Trả về tổng số biểu mẫu
		return $total;
	}
	
	
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
			echo '<h1 style="text-transform:uppercase;">' . $tenkho . '</h1>';
			echo '<h2>Mã kho: ' . $makho . '</h2>';
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
	
	public function xuatdsnvl($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$manvl = $row['maNguyenVatLieu'];
				$tennvl = $row['tenNguyenVatLieu'];
				$anh=$row['anh'];
			echo '
           			 <a href="ChiTietNVL.php?maNguyenVatLieu='.$manvl.'"><img src="image/nhanvienkho/'.$anh.'" alt="">'.$tennvl.'</a>
       			 ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatdstp($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$matp = $row['maThanhPham'];
				$tentp = $row['tenThanhPham'];
				$anh=$row['anh'];
			echo '
           			 <a href="ChiTietTP.php?maThanhPham='.$matp.'"><img src="image/nhanvienkho/'.$anh.'" alt="">'.$tentp.'</a>
       			 ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	
	public function xuatTenNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$manvl = $row['maNguyenVatLieu'];
				$tennvl = $row['tenNguyenVatLieu'];
			echo '
					 <h1 style="text-transform: uppercase;">'.$tennvl.'</h1>
				';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatChiTietNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
				$manvl = $row['maNguyenVatLieu'];
				$maKe = $row['maKe'];
				$donViTinh = $row['donViTinh'];
				$soLuong = $row['soLuong'];
				$NSX = $row['NSX'];
				$NHH = $row['NHH'];
			echo '
           			<tr>
                        <td>'.$dem.'</td>
                        <td>'.$maKe.'</td>
                        <td>'.$donViTinh.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$NSX.'</td>
                        <td>'.$NHH.'</td>
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
	
	public function xuatTenTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$matp = $row['maThanhPham'];
				$tenThanhPham = $row['tenThanhPham'];
			echo '
					 <h1 style="text-transform: uppercase;">'.$tenThanhPham.'</h1>
				';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatChiTietTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
				$matp = $row['maThanhPham'];
				$maKe = $row['maKe'];
				$donViTinh = $row['donViTinh'];
				$soLuong = $row['soLuong'];
				$NSX = $row['NSX'];
				$NHH = $row['NHH'];
			echo '
           			<tr>
                        <td>'.$dem.'</td>
                        <td>'.$maKe.'</td>
                        <td>'.$donViTinh.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$NSX.'</td>
                        <td>'.$NHH.'</td>
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
	
	public function xuatdspnnvl($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maPNNVL = $row['maPNNVL'];
			
			echo '
            <a href="ChiTietPhieuNhapNVL.php?maPNNVL='.$maPNNVL.'">
                <div class="kho-sub">'.$maPNNVL.'</div>
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
	
	public function xuatdspntp($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maPNTP = $row['maPNTP'];
			
			echo '
            <a href="ChiTietPhieuNhapTP.php?maPNTP='.$maPNTP.'">
                <div class="kho-sub">'.$maPNTP.'</div>
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
	
	public function xuatdspxnvl($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maPXNVL = $row['maPXNVL'];
			
			echo '
            <a href="ChiTietPhieuXuatNVL.php?maPXNVL='.$maPXNVL.'">
                <div class="kho-sub">'.$maPXNVL.'</div>
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
	
	public function xuatdspxtp($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maPXTP = $row['maPXTP'];
			
			echo '
            <a href="ChiTietPhieuXuatTP.php?maPXTP='.$maPXTP.'">
                <div class="kho-sub">'.$maPXTP.'</div>
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
	
	
	public function xuatCTPhieuNNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPNNVL = $row['maPNNVL'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiGiao = $row['tenNguoiGiao'];
			$ngayNhap = $row['ngayNhap'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h2>Mã phiếu: '.$maPNNVL.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Tên người giao:</b> '.$tenNguoiGiao.'</p>
					<p><b>Ngày nhập: </b> '.$ngayNhap.'</p>
					<p><b>Kho nhập: </b>' .$tenkho.'</p>
					<p><b>Người lập Phiếu: </b>'.$tenNVKho.'</p>
					<p><b>Ngày lập Phiếu: </b> '.$ngayLap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	
	
	public function xuatLoPhieuNNVL($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);

    if ($i > 0) {
        $dem = 1;
        while ($row = mysql_fetch_array($ketqua)) {
            $maPNNVL = $row['maPNNVL'];
            $maLoNVL = $row['maLoNVL'];
            $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
            $maNguyenVatLieu = $row['maNguyenVatLieu'];
            $donViTinh = $row['donViTinh'];
            $soLuong = $row['soLuong'];
            $NSX = $row['NSX'];
            $NHH = $row['NHH'];
            $maKe = $row['maKe'];
            $tenKe = $row['tenKe'];
            $ghiChu = $row['ghiChu'];
            $maBBBTNVL = $row['maBBBTNVL'];

            echo '<tr>
                        <td>' . $dem . '</td> <!-- Số thứ tự -->
                        <td>' . $tenNguyenVatLieu . '</td> <!-- Tên sản phẩm -->
                        <td>' . $donViTinh . '</td> <!-- Đơn vị tính -->
                        <td>' . $soLuong . '</td> <!-- Số lượng -->
                        <td>' . $tenKe . '</td> <!-- Kệ -->
                        <td>' . $NSX . '</td> <!-- Ngày sản xuất -->
                        <td>' . $NHH . '</td> <!-- Hạn sử dụng -->
                        <td>';

            if (!empty($maBBBTNVL)) {
                echo $ghiChu . ' - ' . $maBBBTNVL;
            } else {
                echo $ghiChu;
            }

            echo '</td></tr>';

            $dem++;
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}
	
	public function xuatLoPhieuNTP($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);

    if ($i > 0) {
        $dem = 1;
        while ($row = mysql_fetch_array($ketqua)) {
            $maPNTP = $row['maPNTP'];
            $maLoTP = $row['maLoTP'];
            $tenThanhPham = $row['tenThanhPham'];
            $maThanhPham = $row['maThanhPham'];
            $donViTinh = $row['donViTinh'];
            $soLuong = $row['soLuong'];
            $NSX = $row['NSX'];
            $NHH = $row['NHH'];
            $maKe = $row['maKe'];
            $tenKe = $row['tenKe'];
            $ghiChu = $row['ghiChu'];
            $maBBBTTP = $row['maBBBTTP'];

            echo '<tr>
                        <td>' . $dem . '</td> <!-- Số thứ tự -->
                        <td>' . $tenThanhPham . '</td> <!-- Tên sản phẩm -->
                        <td>' . $donViTinh . '</td> <!-- Đơn vị tính -->
                        <td>' . $soLuong . '</td> <!-- Số lượng -->
                        <td>' . $tenKe . '</td> <!-- Kệ -->
                        <td>' . $NSX . '</td> <!-- Ngày sản xuất -->
                        <td>' . $NHH . '</td> <!-- Hạn sử dụng -->
                        <td>';

            if (!empty($maBBBTTP)) {
                echo $ghiChu . ' - ' . $maBBBTTP;
            } else {
                echo $ghiChu;
            }

            echo '</td></tr>';

            $dem++;
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}

	public function xuatCTPhieuNTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPNTP = $row['maPNTP'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiGiao = $row['tenNguoiGiao'];
			$ngayNhap = $row['ngayNhap'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h2>Mã phiếu: '.$maPNTP.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Tên người giao:</b> '.$tenNguoiGiao.'</p>
					<p><b>Ngày nhập: </b> '.$ngayNhap.'</p>
					<p><b>Kho nhập: </b>' .$tenkho.'</p>
					<p><b>Người lập Phiếu: </b>'.$tenNVKho.'</p>
					<p><b>Ngày lập Phiếu: </b> '.$ngayLap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatCTPhieuXNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPXNVL = $row['maPXNVL'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiNhan = $row['tenNguoiNhan'];
			$ngayXuat = $row['ngayXuat'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h2>Mã phiếu: '.$maPXNVL.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Tên người nhận:</b> '.$tenNguoiNhan.'</p>
					<p><b>Ngày xuất: </b> '.$ngayXuat.'</p>
					<p><b>Kho nhập: </b>' .$tenkho.'</p>
					<p><b>Người lập Phiếu: </b>'.$tenNVKho.'</p>
					<p><b>Ngày lập Phiếu: </b> '.$ngayLap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatCTPhieuXTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPXTP = $row['maPXTP'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiNhan = $row['tenNguoiNhan'];
			$ngayXuat = $row['ngayXuat'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h2>Mã phiếu: '.$maPXTP.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Tên người nhận:</b> '.$tenNguoiNhan.'</p>
					<p><b>Ngày xuất: </b> '.$ngayXuat.'</p>
					<p><b>Kho nhập: </b>' .$tenkho.'</p>
					<p><b>Người lập Phiếu: </b>'.$tenNVKho.'</p>
					<p><b>Ngày lập Phiếu: </b> '.$ngayLap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	
	
	public function xuatLoPhieuXNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$maPXNVL = $row['maPXNVL'];
			$maLoNVL = $row['maLoNVL'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$maNguyenVatLieu = $row['maNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$maKe = $row['maKe'];
			$tenKe = $row['tenKe'];
			echo '  <tr>
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
                        <td>'.$tenNguyenVatLieu.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
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
	
	
	public function xuatLoPhieuXTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$maPXTP = $row['maPXTP'];
			$maLoTP = $row['maLoTP'];
			$tenThanhPham = $row['tenThanhPham'];
			$maThanhPham = $row['maThanhPham'];
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
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
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
	public function xuatGhiChuPhieuXNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$maPXNVL = $row['maPXNVL'];
			$maLoNVL = $row['maLoNVL'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$maNguyenVatLieu = $row['maNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$maKe = $row['maKe'];
			$tenKe = $row['tenKe'];
			echo ' 
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
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
	public function xuatdsbbbtnvl($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maBBBTNVL = $row['maBBBTNVL'];
				$tinhTrang = $row['tinhTrang'];
			
			echo '
            <a href="ChiTietBBBTNVL.php?maBBBTNVL='.$maBBBTNVL.'">
                <div class="kho-sub">'.$maBBBTNVL.' -  '.$tinhTrang.'</div>
				
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
	
	public function xuatdsbbbttp($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maBBBTTP = $row['maBBBTTP'];
				$tinhTrang = $row['tinhTrang'];
			echo '
            <a href="ChiTietBBBTTP.php?maBBBTTP='.$maBBBTTP.'">
                <div class="kho-sub">'.$maBBBTTP.' -  '.$tinhTrang.'</div>
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

	
	public function xuatCTBBBTNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTNVL = $row['maBBBTNVL'];
			$maPNNVL = $row['maPNNVL'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h1>BIÊN BẢN BỒI THƯỜNG</h1>
	<h2>Mã biên bản bồi thường: '.$maBBBTNVL.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Ngày lập biên bản:</b> '.$ngayLap.'</p>
            <p><b>Mã phiếu nhập nguyên vật liệu:</b> '.$maPNNVL.'</p>
            <h2 style="text-align: center; font-size: 1.8em;"><b>Thông tin Biên Bản Bồi Thường</b></h2>
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatCTBBBTTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTTP = $row['maBBBTTP'];
			$maPNTP = $row['maPNTP'];
			$ngayLap = $row['ngayLap'];
				
			echo '
				  <h1>BIÊN BẢN BỒI THƯỜNG</h1>
	<h2>Mã biên bản bồi thường: '.$maBBBTTP.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Ngày lập biên bản:</b> '.$ngayLap.'</p>
            <p><b>Mã phiếu nhập nguyên vật liệu:</b> '.$maPNTP.'</p>
            <h2 style="text-align: center; font-size: 1.8em;"><b>Thông tin Biên Bản Bồi Thường</b></h2>
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatLoBBBTNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		$count =1;
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTNVL = $row['maBBBTNVL'];
			$maLoNVL = $row['maLoNVL'];
			$tennguyenvatlieu = $row['tenNguyenVatLieu'];
			$donvitinh = $row['donViTinh'];
			$soluong = $row['soLuong'];
			$soluongthucte = $row['soLuongThucTe'];
			$nsx = $row['NSX'];
			$nhh = $row['NHH'];
			$ghichu = $row['lyDo'];

				
			echo '
				   <tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
						<td>'.$maLoNVL.'</td>
                        <td>'.$tennguyenvatlieu.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donvitinh.'</td><!-- đơn vịi tính sản phẩm -->
                        <td>'.$soluong.'</td> <!-- số lượng trên phiếu -->
                        <td>'.$soluongthucte.'</td> <!-- Số lượng giao thực tế -->
                        <td>'.$nsx.'</td> <!-- Ngày sản xuất -->
                        <td>'.$nhh.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ghichu.'</td><!-- ghi chú biên bản -->
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatLoBBBTTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		$count =1;
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTTP = $row['maBBBTTP'];
				$maLoTP = $row['maLoTP'];
			$tenThanhPham = $row['tenThanhPham'];
			$donvitinh = $row['donViTinh'];
			$soluong = $row['soLuong'];
			$soluongthucte = $row['soLuongThucTe'];
			$nsx = $row['NSX'];
			$nhh = $row['NHH'];
			$ghichu = $row['lyDo'];

				
			echo '
				   <tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
						<td>'.$maLoTP.'</td>
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donvitinh.'</td><!-- đơn vịi tính sản phẩm -->
                        <td>'.$soluong.'</td> <!-- số lượng trên phiếu -->
                        <td>'.$soluongthucte.'</td> <!-- Số lượng giao thực tế -->
                        <td>'.$nsx.'</td> <!-- Ngày sản xuất -->
                        <td>'.$nhh.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ghichu.'</td><!-- ghi chú biên bản -->
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatLienKetUPPHNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		$count =1;
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPNNVL = $row['maPNNVL'];
				
			echo '
				   <a href="UPPhieuNhapNVL.php?maPNNVL='.$maPNNVL.' "><button style="background-color: #39a867;">Cập nhật phiếu nhập</button></a>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatCTUDPhieuNNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPNNVL = $row['maPNNVL'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiGiao = $row['tenNguoiGiao'];
			$ngayNhap = $row['ngayNhap'];
			$ngayLap = $row['ngayLap'];
			$maBBBTNVL = $row['maBBBTNVL'];
			echo '
				 <h2>Mã phiếu: '.$maPNNVL.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Tên người giao:</b> '.$tenNguoiGiao.'</p>
            <p><b>Ngày nhập:</b> '.$ngayNhap.'</p>
            <p><b>Kho nhập:</b> '.$tenkho.'</p>
            <p><b>Người lập Phiếu:</b> '.$tenNVKho.'</p>
            <p><b>Ngày lập Phiếu:</b> '.$ngayLap.'</p>
            <p><b>Mã biên bản bồi thường:</b> '.$maBBBTNVL.'</p>
            <h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách hàng hóa</b></h2>
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	
	public function xuatCTUDPhieuNTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maPNTP = $row['maPNTP'];
			$maNVKho = $row['maNVKho'];
			$tenNVKho = $row['tenNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiGiao = $row['tenNguoiGiao'];
			$ngayNhap = $row['ngayNhap'];
			$ngayLap = $row['ngayLap'];
			$maBBBTTP = $row['maBBBTTP'];
			echo '
				 <h2>Mã phiếu: '.$maPNTP.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Tên người giao:</b> '.$tenNguoiGiao.'</p>
            <p><b>Ngày nhập:</b> '.$ngayNhap.'</p>
            <p><b>Kho nhập:</b> '.$tenkho.'</p>
            <p><b>Người lập Phiếu:</b> '.$tenNVKho.'</p>
            <p><b>Ngày lập Phiếu:</b> '.$ngayLap.'</p>
            <p><b>Mã biên bản bồi thường:</b> '.$maBBBTTP.'</p>
            <h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách hàng hóa</b></h2>
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	
	public function xuatLoUDBBBTNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		$count =1;
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTNVL = $row['maBBBTNVL'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh	 = $row['donViTinh'];
			$tenKe = $row['tenKe'];
			$soLuongThucTe = $row['soLuongThucTe'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$lyDo = $row['lyDo'];

				
			echo '<tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
                        <td>'.$tenNguyenVatLieu.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh	.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuongThucTe.'</td> <!-- Số lượng -->
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$lyDo.'</td>
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function xuatLoUDBBBTTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		$count =1;
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBBTTP = $row['maBBBTTP'];
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh	 = $row['donViTinh'];
			$tenKe = $row['tenKe'];
			$soLuongThucTe = $row['soLuongThucTe'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$lyDo = $row['lyDo'];

				
			echo '<tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh	.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuongThucTe.'</td> <!-- Số lượng -->
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$lyDo.'</td>
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	
	public function themxoasua($sql)
	{
		$link = $this -> connect();
		if(mysql_query($sql, $link))
		{
			return 1;
		} else
		{
			return 0;
		}
	}
}
?>