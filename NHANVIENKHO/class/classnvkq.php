<?php

	class nhanvienkhoquoc{

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
	public function xuatdsdonhang($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maDonHang = $row['maDonHang'];
			
			echo '
            <a href="chiTieXemtDonHang.php?maDonHang='.$maDonHang.'">
                <div class="kho-sub">'.$maDonHang.'</div>
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
	public function xuatDonHang($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);
    if ($i > 0) {
        while ($row = mysql_fetch_array($ketqua)) {
            $maDonHang = $row['maDonHang'];
            $maLoThanhPham = $row['maLoThanhPham'];
            $ngayDatHang = $row['ngayDatHang'];
            $tenkhachHang = $row['tenKhachHang'];
            $ngayGiaoDuKien = $row['ngayGiaoDuKien'];
            $soDienThoai = $row['soDienThoai'];
            $diaChiGiaoHang = $row['diaChiGiaoHang'];

            echo '<h2>Mã phiếu: ' . $maDonHang . '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Tên Khách Hàng:</b> ' . $tenkhachHang . '</p>';
            echo '<p><b>Ngày Đặt Hàng: </b> ' . $ngayDatHang . '</p>';
            echo '<p><b>Địa chỉ giao hàng: </b>' . $diaChiGiaoHang . '</p>';
            echo '<p><b>Ngày Giao Dự Kiến: </b>' . $ngayGiaoDuKien . '</p>';
            echo '<p><b>Số Điện Thoại: </b> ' . $soDienThoai . '</p>';
            echo '</div>';
            echo '</div>';
			echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
        }
    } else {
        echo 'Không có dữ liệu';
    }
    mysql_close($link);
}

public function xuatLoTP($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);

    // Kiểm tra xem truy vấn có thành công không
    if (!$ketqua) {
        die('Truy vấn thất bại: ' . mysql_error());
    }

    $i = mysql_num_rows($ketqua);

    if ($i > 0) {
        $dem = 1;
        while ($row = mysql_fetch_assoc($ketqua)) {
            $maDonHang = $row['maDonHang'];
            $maLoTP = $row['maLoTP'];
            $tenThanhPham = $row['tenThanhPham'];
            $donViTinh = $row['donViTinh'];
            $soLuong = $row['soLuong'];

            echo '  <tr>
                        <td>' . $dem . '</td>
                        <td>' . $tenThanhPham . '</td>
                        <td>' . $donViTinh . '</td>
                        <td>' . $soLuong . '</td>
                    </tr>';

            $dem++;
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}
// xem phiếu nhận hàng tra về


// chọn mã phiếu 
public function xuatdspnhtv($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maPNHTV = $row['maPNHTV'];
			
			echo '
            <a href="ChiTietPhieuNhanHangTraVe.php?maPNHTV='.$maPNHTV.'">
                <div class="kho-sub">'.$maPNHTV.'</div>
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
	// hiển thị thông tin ngoài 

	public function xuatpnhtv($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);
    if ($i > 0) {
        while ($row = mysql_fetch_array($ketqua)) {
            $maDonHang = $row['maDonHang'];
            $ngayLapPhieu=$row['ngayLapPhieu'];
            $tenkhachHang = $row['tenKhachHang'];
            $lyDoTraHang = $row['lyDoTraHang'];

            

            echo '<h2>Mã phiếu: ' . $_REQUEST['maPNHTV']. '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Mã Đơn Hàng:</b> ' . $maDonHang . '</p>';
            echo '<p><b>Ngày Lập Phiếu: </b> ' . $ngayLapPhieu . '</p>';
            echo '<p><b>Tên Khách Hàng: </b>' . $tenkhachHang . '</p>';
            echo'<p><b>Người Lập Phiếu: </b>Mã Hàn Quốc </p>';
            echo '<p><b>Ly Do Trả Hàng: </b> <b> ' . $lyDoTraHang . '</p>';

            
            echo '</div>';
            echo '</div>';
			echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
        }
    } else {
        echo 'Không có dữ liệu';
    }
    mysql_close($link);
}
	// hiển thị thông tin trong bảng
    
public function xuatttPNHTV($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);

    // Kiểm tra xem truy vấn có thành công không
    if (!$ketqua) {
        die('Truy vấn thất bại: ' . mysql_error());
    }

    $i = mysql_num_rows($ketqua);

    if ($i > 0) {
        $dem = 1;
        while ($row = mysql_fetch_assoc($ketqua)) {
            $tenThanhPham = $row['tenThanhPham'];
            $donViTinh = $row['donViTinh'];
            $soLuong = $row['soLuong'];
            $NSX = $row['NSX'];
            $NHH = $row['NHH'];
           


            echo '  <tr>
                        <td>' . $dem . '</td>
                        <td>' . $tenThanhPham . '</td>
                        <td>' . $donViTinh . '</td>
                        <td>' . $soLuong . '</td>
                        <td>' . $NSX . '</td>
                        <td>' . $NHH . '</td>
                        
                    </tr>';

            $dem++;
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}
	// mã phiếu tự động 
    // tạo mã phiếu nhận hàng trả về tự động tăng 
	public function maPNHTVTuDongTang(){

		$link = $this -> connect();
		$ketqua = mysql_query("select * from phieunhanhangtrave");
		if (mysql_num_rows($ketqua)>0) {
			
			$row = mysql_num_rows($ketqua);
			$counter = $row + 1;
		
			// Định dạng số đếm thành hai chữ số
			$counterFormatted = sprintf('%02d', $counter);
			
			$resultString= "PNHTV" . $counterFormatted;

			// Chuỗi kết quả
			
			
			// Hiển thị chuỗi kết quả
			return $resultString;

			
		} else {
			echo "No records found";
		}
	}
    // lập phiếu nhận hàng trả về


    public function lapTrenPNHTV($sql)
    {
        $link = $this->connect();
        $laptrenpnh = mysql_query($sql, $link);
        $i = mysql_num_rows($laptrenpnh);
        if ($i > 0) {
            $maDonHang = $_REQUEST['maDonHang'];
            $maphieu = $this -> maPNHTVTuDongTang();
            while ($row = mysql_fetch_array($laptrenpnh)) {
                // $maDonHang = $row['maDonHang'];
               
                $tenkhachHang = $row['tenKhachHang'];
                
                echo '<h2>Mã phiếu: ' . $maphieu . '</h2>';
                echo '<div class="warehouse">';
                echo '<div class="warehouse-information">';
                echo '<p><b>Tên Khách Hàng:</b> ' . $tenkhachHang . '</p>';
                echo '<p><b>Mã đơn hàng: </b> ' . $maDonHang . '</p>';
                echo'<p><b>Ngày lập phiếu:  </b>'.date("d-m-Y").' </p>';
                echo'<p><b>Người Lập Phiếu: </b>Mã Hàn Quốc </p>';
            
          
               
                echo '</div>';
                echo '</div>';
                echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }
    
    public function LapduoiPNHTV($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
    
        // Kiểm tra xem truy vấn có thành công không
        if (!$ketqua) {
            die('Truy vấn thất bại: ' . mysql_error());
        }
    
        $i = mysql_num_rows($ketqua);
    
        if ($i > 0) {
            $dem = 1;
            while ($row = mysql_fetch_assoc($ketqua)) {
                $maDonHang = $row['maDonHang'];
                $NSX = $row['NSX'];
                $NHH = $row['NHH'];

                $tenThanhPham = $row['tenThanhPham'];
                $donViTinh = $row['donViTinh'];
                $soLuong = $row['soLuong'];
    
                echo '  <tr>
                            <td>' . $dem . '</td>
                            <td>' . $tenThanhPham . '</td>
                            <td>' . $donViTinh . '</td>
                            <td>' . $soLuong . '</td>
                            <td>' . $NSX . '</td>
                            <td>' . $NHH . '</td>

                        </tr>';
    
                $dem++;
            }
        } else {
            echo 'Không có dữ liệu';
        }
    
        mysql_close($link);
    }
    function themLappnhtv($maPNHTV, $ngayLapPhieu, $lyDoTraHang, $maDonHang)
{
    $link = $this->connect();
    $ngayLapPhieu = date('Y-m-d H:i:s');

    // Kiểm tra xem đã tồn tại phieunhanhangtrave với maDonHang đã cho chưa
    $checkQuery = mysql_query("SELECT COUNT(*) as count FROM phieunhanhangtrave WHERE maDonHang = '$maDonHang'");
    $checkResult = mysql_fetch_assoc($checkQuery);

    // Nếu đã tồn tại, thông báo cảnh báo
    if ($checkResult['count'] > 0) {
        echo "<script>alert('Đã tồn tại phieunhanhangtrave với maDonHang = $maDonHang')</script>";
    } else {
        // Nếu chưa tồn tại, thêm mới dữ liệu
        $kq = mysql_query("INSERT INTO phieunhanhangtrave (
            maPNHTV,
            ngayLapPhieu,
            lyDoTraHang,
            maDonHang
        )
        VALUES (
            '$maPNHTV', '$ngayLapPhieu', '$lyDoTraHang', '$maDonHang'
        );");

        if ($kq) {
            echo "<script>alert('Lập Phiếu Nhận Hàng Trả Về Thành Công')</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm dữ liệu')</script>";
        }

        mysql_close($link);
    }
}

    // bắt đầu làm bbbt NVL 
    // mã tự động tăng
    public function maPNHTVTuDongTangBBBTNVL(){

		$link = $this -> connect();
		$ketqua = mysql_query("select * from bienbanboithuongnvl");
		if (mysql_num_rows($ketqua)>0) {
			
			$row = mysql_num_rows($ketqua);
			$counter = $row + 1;
		
			// Định dạng số đếm thành hai chữ số
			$counterFormatted = sprintf('%02d', $counter);
			
			$resultString= "BBBTNVL" . $counterFormatted;

			// Chuỗi kết quả
			
			
			// Hiển thị chuỗi kết quả
			return $resultString;

			
		} else {
			echo "No records found";
		}
	}
    
    
    // phần trên bảng
    function lapTrenLBBBTNVL($sql)
        {
            $link = $this->connect();
            $laptrenpnh = mysql_query($sql,$link);
            $i = mysql_num_rows($laptrenpnh);
            if ($i > 0) {
                $maPNNVL = $_REQUEST['maPNNVL'];
                $tenNguoiGiao = $_REQUEST['tenNguoiGiao'];
                $tenKho = $_REQUEST['tenKho'];

                $maBBBTNVL = $this -> maPNHTVTuDongTangBBBTNVL();
               
                $tenKho = $_REQUEST['tenKho'];
                while ($row = mysql_fetch_array($laptrenpnh)) {
                    // $maDonHang = $row['maDonHang'];
                    $maPNNVL = $_REQUEST['maPNNVL'];
                    $tenNguoiGiao = $row['tenNguoiGiao'];
                    // $tenNguoiGiao = 'Quốc';

                    $tenKho = $row['tenKho'];



                    
                
                    
                    
                    echo '<h2>Mã phiếu: ' . $maBBBTNVL . '</h2>';
                    echo '<div class="warehouse">';
                    echo '<div class="warehouse-information">';
                    echo '<p><b>Mã Phiếu Nhập NVL:</b> ' . $maPNNVL . '</p>';
                    echo '<p><b>Tên Người Giao Hàng:</b> '.$tenNguoiGiao. '</p>';
                    echo '<p><b>Tên Kho Nhập Hàng:</b> ' .$tenKho . '</p>';
                    echo'<p><b>ngày lập phiếu:  </b>'.date("d-m-Y").' </p>';
                    echo'<p><b>Người Lập Phiếu: </b>Mã Hàn Quốc </p>';
                    

                
            
                
                    echo '</div>';
                    echo '</div>';
                    echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
                }
            } else {
                echo 'Không có dữ liệu';
            }
            mysql_close($link);
        }
        public function LapduoiBBBTVNL($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
    
        // Kiểm tra xem truy vấn có thành công không
        if (!$ketqua) {
            die('Truy vấn thất bại: ' . mysql_error());
        }
    
        $i = mysql_num_rows($ketqua);
    
        if ($i > 0) {
            $dem = 1;
           

            while ($row = mysql_fetch_assoc($ketqua)) {
                $maLoNVL = $row['maLoNVL'];
                $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
                $donViTinh = $row['donViTinh'];

                $soLuong = $row['soLuong'];
                $NSX = $row['NSX'];
                $NHH = $row['NHH'];
                $tenKe = $row['tenKe'];
                $soLuongThucTe = $row['soLuongThucTe'];
                $lyDo = $row['lyDo'];

			    echo '<input type="hidden" value='.$row['maLoNVL'].' name="note[malo]['.$dem.']"> ';
			    echo '<input type="hidden" value='.$row['soLuong'].' name="note[sl]['.$dem.']"> ';

    
                echo '  <tr>
                            <td>' . $dem . '</td>
                            <td>' . $tenNguyenVatLieu. '</td>
                            <td>' . $donViTinh . '</td>
                            <td>' . $soLuong . '</td>
                            <td>' . '<input type="number" min="0"  name="note[soluong]['.$dem.']"> ' . '</td>
                            <td>' . $tenKe . '</td>
                            <td>' . $maLoNVL . '</td> 
                            <td>' . $NSX . '</td>
                            <td>' . $NHH . '</td>';
                            // <td>' . $lyDo . '</td>';
                            echo '<td class="custom-cell"> <input type="text" name="note[ghichu]['.$dem.']" </td>';



                       echo' </tr>';
    
                $dem++;
            }
        } else {
            echo 'Không có dữ liệu';
        }
    
        mysql_close($link);
    }
    // theem bbbt
    public function lapbienbanbt($maBBBTNVL, $maPNNVL, $maLoNVL, $lyDo, $soLuongThucTe)
    {
        $link = $this->connect();
        $ngayHienTai = date("Y-m-d");
    
        // Kiểm tra xem đã tồn tại bienbanboithuongnvl với maPNNVL đã cho chưa
        if (strpos($maBBBTNVL, 'NVL') !== false) {
            // $checkQuery = mysql_query("SELECT COUNT(*) as count FROM bienbanboithuongnvl WHERE maPNNVL = '$maPNNVL'");
            // $checkResult = mysql_fetch_assoc($checkQuery);
    
            // // Nếu đã tồn tại, thông báo cảnh báo
            // if ($checkResult['count'] > 0) {
            //     echo "<script>alert('Đã tồn tại bienbanboithuongnvl với maPNNVL = $maPNNVL')</script>";
            // } else {
            //     // Nếu chưa tồn tại, thêm mới dữ liệu
            //     $ketquax = mysql_query("INSERT INTO bienbanboithuongnvl(maBBBTNVL, maPNNVL, ngayLap) VALUES ('$maBBBTNVL', '$maPNNVL', '$ngayHienTai');");
    
                $ketqua = mysql_query("INSERT INTO chitietbbbtnvl (
                    maBBBTNVL,
                    maLoNVL,
                    soLuongThucTe,
                    lyDo
                )
                VALUES (
                    '$maBBBTNVL', '$maLoNVL', '$soLuongThucTe', '$lyDo'
                );");
    
            //     echo "<script>alert('Lập Biên Bản Thành Công')</script>";
            // }
        } else {
            // Kiểm tra xem đã tồn tại bienbanboithuongtp với maPNTP đã cho chưa
            // $checkQuery = mysql_query("SELECT COUNT(*) as count FROM bienbanboithuongtp WHERE maPNTP = '$maPNNVL'");
            // $checkResult = mysql_fetch_assoc($checkQuery);
    
            // // Nếu đã tồn tại, thông báo cảnh báo
            // if ($checkResult['count'] > 0) {
            //     echo "<script>alert('Đã tồn tại bienbanboithuongtp với maPNTP = $maPNNVL')</script>";
            // } else {
            //     // Nếu chưa tồn tại, thêm mới dữ liệu
            //     $ketquax = mysql_query("INSERT INTO bienbanboithuongtp(maBBBTTP, maPNTP, ngayLap) VALUES ('$maBBBTNVL', '$maPNNVL', '$ngayHienTai');");
    
                $ketqua = mysql_query("INSERT INTO chitietbbbttp (
                    maBBBTTP,
                    maLoTP,
                    soLuongThucTe,
                    lyDo
                )
                VALUES (
                    '$maBBBTNVL', '$maLoNVL', '$soLuongThucTe', '$lyDo'
                );");
    
                // echo "<script>alert('Lập Biên Bản Thành Công')</script>";
            // }
        }
    
        mysql_close($link);
    }

    // thêm bbbthtp và nvl
    public function lapbienbanbtmoi($maBBBTNVL, $maPNNVL)
    {
        $link = $this->connect();
        $ngayHienTai = date("Y-m-d");
    
        // Kiểm tra xem đã tồn tại bienbanboithuongnvl với maPNNVL đã cho chưa
        if (strpos($maBBBTNVL, 'NVL') !== false) {
            $checkQuery = mysql_query("SELECT COUNT(*) as count FROM bienbanboithuongnvl WHERE maPNNVL = '$maPNNVL'");
            $checkResult = mysql_fetch_assoc($checkQuery);
    //  echo "<script> window.location='PhieuNhapTP.php'</script>";
            // Nếu đã tồn tại, thông báo cảnh báo
            if ($checkResult['count'] > 0) {
               return 0; //sai
            } else {
                // Nếu chưa tồn tại, thêm mới dữ liệu
                $ketquax = mysql_query("INSERT INTO bienbanboithuongnvl(maBBBTNVL, maPNNVL, ngayLap, tinhTrang) VALUES ('$maBBBTNVL', '$maPNNVL', '$ngayHienTai', 'Chưa cập nhật');");
    
                return 1;//dung
            }
        } else {
            // Kiểm tra xem đã tồn tại bienbanboithuongtp với maPNTP đã cho chưa
            $checkQuery = mysql_query("SELECT COUNT(*) as count FROM bienbanboithuongtp WHERE maPNTP = '$maPNNVL'");
            $checkResult = mysql_fetch_assoc($checkQuery);
    
            // Nếu đã tồn tại, thông báo cảnh báo
            if ($checkResult['count'] > 0) {
                return 0; //sai
            } else {
                // Nếu chưa tồn tại, thêm mới dữ liệu
                $ketquax = mysql_query("INSERT INTO bienbanboithuongtp(maBBBTTP, maPNTP, ngayLap, tinhTrang) VALUES ('$maBBBTNVL', '$maPNNVL', '$ngayHienTai', 'Chưa cập nhật');");
    
                return 1;//dung
            }
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
        
        echo '
        <a href="ChiTietBienBangBoiThuong.php?maBBBTNVL='.$maBBBTNVL.'">
            <div class="kho-sub">'.$maBBBTNVL.'</div>
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
// hiển thị thông tin ngoài 
	
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
        
        echo '
        <a href="ChiTietBienBangBoiThuong.php?maBBBTTP='.$maBBBTTP.'">
            <div class="kho-sub">'.$maBBBTTP.'</div>
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
// hiển thị thông tin ngoài 
public function maPNHTVTuDongTangBBBTTP(){

    $link = $this -> connect();
    $ketqua = mysql_query("select * from bienbanboithuongtp");
    if (mysql_num_rows($ketqua)>0) {
        
        $row = mysql_num_rows($ketqua);
        $counter = $row + 1;
    
        // Định dạng số đếm thành hai chữ số
        $counterFormatted = sprintf('%02d', $counter);
        
        $resultString= "BBBTTP" . $counterFormatted;

        // Chuỗi kết quả
        
        
        // Hiển thị chuỗi kết quả
        return $resultString;

        
    } else {
        echo "No records found";
    }
}

function lapTrenLBBBTTP($sql)
{
    $link = $this->connect();
    $laptrenpnh = mysql_query($sql,$link);
    $i = mysql_num_rows($laptrenpnh);
    if ($i > 0) {
        $maPNTP = $_REQUEST['maPNTP'];
        $tenNguoiGiao = $_REQUEST['tenNguoiGiao'];
        $tenKho = $_REQUEST['tenKho'];

        $maBBBTTP = $this -> maPNHTVTuDongTangBBBTTP();
       
        $tenKho = $_REQUEST['tenKho'];
        while ($row = mysql_fetch_array($laptrenpnh)) {
            // $maDonHang = $row['maDonHang'];
            $maPNTP = $_REQUEST['maPNTP'];
            $tenNguoiGiao = $row['tenNguoiGiaoPhieuTP'];
            // $tenNguoiGiao = 'Quốc';

            $tenKho = $row['tenKho'];



            
        
            
            
            echo '<h2>Mã phiếu: ' . $maBBBTTP . '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Mã Phiếu Nhập TP:</b> ' . $maPNTP . '</p>';
            echo '<p><b>Tên Người Giao Hàng:</b> '.$tenNguoiGiao. '</p>';
            echo '<p><b>Tên Kho Nhập Hàng:</b> ' .$tenKho . '</p>';
            echo'<p><b>ngày lập phiếu:  </b>'.date("d-m-Y").' </p>';
            echo'<p><b>Người Lập Phiếu: </b>Mã Hàn Quốc </p>';
            

        
    
        
            echo '</div>';
            echo '</div>';
            echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
        }
    } else {
        echo 'Không có dữ liệu';
    }
    mysql_close($link);
}
public function LapduoiBBBTTP($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
    
        // Kiểm tra xem truy vấn có thành công không
        if (!$ketqua) {
            die('Truy vấn thất bại: ' . mysql_error());
        }
    
        $i = mysql_num_rows($ketqua);
    
        if ($i > 0) {
            $dem = 1;
           

            while ($row = mysql_fetch_assoc($ketqua)) {
                $maLoNVL = $row['maLoTP'];
                $tenNguyenVatLieu = $row['tenThanhPham'];
                $donViTinh = $row['donViTinhThanhPham'];

                $soLuong = $row['soLuong'];
                $NSX = $row['NSX'];
                $NHH = $row['NHH'];
                $tenKe = $row['tenKe'];
                $soLuongThucTe = $row['soLuongThucTe'];
                $lyDo = $row['lyDo'];

			    echo '<input type="hidden" value='.$row['maLoTP'].' name="note[malo]['.$dem.']"> ';
			    echo '<input type="hidden" value='.$row['soLuong'].' name="note[sl]['.$dem.']"> ';

    
                echo '  <tr>
                            <td>' . $dem . '</td>
                            <td>' . $tenNguyenVatLieu. '</td>
                            <td>' . $donViTinh . '</td>
                            <td>' . $soLuong . '</td>
                            <td>' . '<input type="number" min="0"   name="note[soluong]['.$dem.']"> ' . '</td>
                            <td>' . $tenKe . '</td>
                            <td>' . $maLoNVL . '</td> 
                            <td>' . $NSX . '</td>
                            <td>' . $NHH . '</td>';
                            // <td>' . $lyDo . '</td>';
                            echo '<td class="custom-cell"> <input type="text" name="note[ghichu]['.$dem.']" > </td>';



                       echo' </tr>';
    
                $dem++;
            }
        } else {
            echo 'Không có dữ liệu';
        }
    
        mysql_close($link);
    }
	
	}


?>