<?php
class GiamDoc {
    public function connect()
    {
        $con = mysql_connect("localhost", "root", "");
        if (!$con) {
            echo 'Không kết nối được csdl';
            exit();
        } else {
            mysql_select_db("ptud", $con);
            mysql_query("SET NAMES UTF8");
            return $con;
        }
    }
	public function xuatKeHoachSX($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
                $tenKeHoachSX = $row['tenKeHoachSX'];
                $maKeHoachSX=$row['maKeHoachSX'];

                echo '
            <div class="row">
                <div class="col">
                    <div class="content"><a href="ChiTietKeHoachSX.php?maKeHoachSX='.$maKeHoachSX.'">
                <div class="kho-sub">'.$tenKeHoachSX.'</div>
            </a></div>
                    <div id="actions">
                            <a href="suaKHSX.php?maKeHoachSX='.$row['maKeHoachSX']. ' ">Sửa</a> | <a href="ChiTietKeHoachSX.php?delete=' . $row['maKeHoachSX'] . '" onclick="return confirm(\'Bạn có chắc xóa!\')">Xóa</a>
                        </div>
                </div>
            </div>	';
            }
        } 
        mysql_close($link);
    }
     public function xuatDSKeHoachSX($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
                $tenKeHoachSX = $row['tenKeHoachSX'];
                $maKeHoachSX=$row['maKeHoachSX'];

                echo '
            <div class="row">
                <div class="col">
                    <div class="content"><a href="ChiTietKeHoachSX.php?maKeHoachSX='.$maKeHoachSX.'">
                <div class="kho-sub">'.$tenKeHoachSX.'</div>
            </a></div>
                    
                </div>
            </div>	';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }
    /* bảng nvl */

	public function xuatLoKHSXNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuongTonnvl'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td> '.$tenNguyenVatLieu.'</td>
                        <td> '.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
	public function xuatLoDMNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong= $row['soLuong'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td> '.$tenNguyenVatLieu.'</td>
                        <td> '.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
	public function xuatLoDMNVLChua($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong= $row['soLuong'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td> '.$tenNguyenVatLieu.'</td>
                        <td> '.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    /* bảng thanh pham */
    public function xuatLoKHSXTP($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuongTon'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td>'.$tenThanhPham.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    /*chua duyet*/
	public function xuatLoKHSXNVLChua($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuongNVL'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td> '.$tenNguyenVatLieu.'</td>
                        <td> '.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    /* bảng thanh pham */
    public function xuatLoKHSXTPChua($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuongTP'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                        <td>'.$tenThanhPham.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                    </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    /* phía trên bảng */
public function xuatCTKHSX($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) {
			$row = mysql_fetch_array($ketqua);

			// Lấy thông tin từ dữ liệu
			$tenKeHoachSX = $row['tenKeHoachSX'];
			$ngayLap = $row['ngayLap'];
			$ngayBatDau = $row['ngayBatDau'];
			$ngayKetThuc = $row['ngayKetThuc'];

			// In ra thông tin trong mẫu HTML
			echo '<h1 style="text-transform:uppercase; text-align:center">' . $tenKeHoachSX . '</h1>';
			echo '<h2 style=" text-align:right ;padding-right:100px;">Mã kế hoạch sản xuất: ' . $row['maKeHoachSX'] . '</h2>';
			echo '<div class="warehouse">';
			echo '    <div class="warehouse-information">';
			echo '        <p><b>Ngày lập :</b> ' . $ngayLap . '</p>';
			echo '        <p><b>Ngày bắt đầu :</b> ' . $ngayBatDau . '</p>';
			echo '        <p><b>Ngày kết thúc :</b> ' . $ngayKetThuc . '</p>';
			
			
			echo '    </div>';
			} else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    /*sửa*/


public function updateKHSX($maKeHoachSX) {
    $link = $this->connect();
    $maKeHoachSX = mysql_real_escape_string($maKeHoachSX);
    $sql = "SELECT * FROM keHoachSX WHERE maKeHoachSX = '$maKeHoachSX'";
    $ketqua = mysql_query($sql, $link);
    if ($ketqua) {
        $row = mysql_fetch_assoc($ketqua);
        mysql_close($link);
        return $row;
    } else {
        mysql_close($link);
        return false;
    }
}
public function updateDMNVL($maDonMuaNVL) {
    $link = $this->connect();
    $maKeHoachSX = mysql_real_escape_string($maKeHoachSX);
    $sql = "SELECT * FROM donmuanvl WHERE maDonMuaNVL = '$maDonMuaNVL'";
    $ketqua = mysql_query($sql, $link);
    if ($ketqua) {
        $row = mysql_fetch_assoc($ketqua);
        mysql_close($link);
        return $row;
    } else {
        mysql_close($link);
        return false;
    }
}
     public function xuatKHSXNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuongNVL = $row['soLuongNVL'];
			$maCTKHSXNVL = $row['maCTKHSXNVL'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                <input type="hidden" name="maCTKHSXNVL[]" value="'.$maCTKHSXNVL.'">
                <td>'.$tenNguyenVatLieu.'</td>
                <td><input type="number" name="soLuongNVL[]" min=0 value="'.$soLuongNVL.'"></td>
				<input type="hidden" name="soLuongNVLBeforeUpdate" value="'.$soLuongNVL.'">

                <td>'.$donViTinh.'</td>
            </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}

    /* bảng thanh pham */
public function xuatKHSXTP($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);

    if ($ketqua) {
        while ($row = mysql_fetch_array($ketqua)) {
            // Lấy thông tin từ dữ liệu
            $tenThanhPham = $row['tenThanhPham'];
            $donViTinh = $row['donViTinh'];
            $soLuongTP = $row['soLuongTP'];
            $maCTKHSXTP = $row['maCTKHSXTP'];
            // In ra thông tin trong mẫu HTML
            echo '
            <tr>
                <input type="hidden" name="maCTKHSXTP[]" value="'.$maCTKHSXTP.'">
                <td>'.$tenThanhPham.'</td>
                <td><input type="number" name="soLuongTP[]" min=0 value="'.$soLuongTP.'"></td>
                <td>'.$donViTinh.'</td>
            </tr>';
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}

    public function addKeHoachSX($maKeHoachSX, $tenKeHoachSX, $ngayLap, $ngayBatDau, $ngayKetThuc, $tenThanhPham, $soLuongTP, $tenNguyenVatLieu, $soLuongNVL,$donViTinhTP,$donViTinhNVL)
{
    $link = $this->connect();

    // Bắt đầu giao dịch
    mysql_query("BEGIN", $link);
    try {

            // Cập nhật kế hoạch sản xuất
            $insertKeHoachSXQuery = "INSERT INTO kehoachsx (tenKeHoachSX, ngayLap, ngayBatDau, ngayKetThuc)
                VALUES ('$tenKeHoachSX', '$ngayLap', '$ngayBatDau', '$ngayKetThuc')";
            mysql_query($insertKeHoachSXQuery, $link);

            // Cập nhật thông tin sản phẩm
            $insertThanhPhamQuery = "INSERT INTO thanhpham (tenThanhPham, soLuongTon,donViTinh)
                SELECT '$tenThanhPham', '$soLuongTP','$donViTinhTP' 
                FROM lothanhpham
                INNER JOIN thanhpham ON thanhpham.mathanhpham = lothanhpham.mathanhpham
                WHERE lothanhpham.maKeHoachSX = '$maKeHoachSX'
                    AND thanhpham.tenThanhPham = '$tenThanhPham'
                    AND thanhpham.soLuongTon = '$soLuongTP'";
            mysql_query($insertThanhPhamQuery, $link);

            // Cập nhật thông tin nguyên vật liệu
            $insertNguyenVatLieuQuery = "INSERT INTO nguyenvatlieu (tenNguyenVatLieu, soLuongTonnvl,donViTinh)
                SELECT '$tenNguyenVatLieu', '$soLuongNVL','$donViTinhNVL'
                FROM longuyenvatlieu
                INNER JOIN nguyenvatlieu ON nguyenvatlieu.maNguyenVatLieu = longuyenvatlieu.maNguyenVatLieu
                WHERE longuyenvatlieu.maKeHoachSX = '$maKeHoachSX'
                AND tenNguyenVatLieu = '$tenNguyenVatLieu' AND soLuongTonnvl = '$soLuongNVL'";
            mysql_query($insertNguyenVatLieuQuery, $link);


        // Kết thúc giao dịch
        mysql_query("COMMIT", $link);
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        mysql_query("ROLLBACK", $link);
        echo 'Có lỗi xảy ra trong quá trình thực hiện giao dịch: ',  mysql_error($link);
    }

    // Đóng kết nối
    mysql_close($link);
}
    public function xoaDonMuaNVL($delete) {
        if (isset($_REQUEST['delete'])) {
            $delete = $_REQUEST['delete'];           
            $link = $this->connect();
			$sql = "UPDATE donmuanvl SET tinhTrang = 1 WHERE maDonMuaNVL = '$delete'";
            $ketqua = mysql_query($sql, $link);

            if ($ketqua) {
				echo "<script>alert('Xóa thành công');</script>";
				header('Content-Type: text/html; charset=utf-8');
                echo header("refresh:0;url='DonMuaNVL.php'");

                exit();
            } else {
                echo 'Xóa kê hoạch sản xuất thất bại.';
            }

            mysql_close($link);
        }
    }
  public function xoaKeHoachSX($delete) {
    if (isset($_REQUEST['delete'])) {
        $delete = $_REQUEST['delete'];
        $link = $this->connect();

        // Lấy thông tin về số lượng nguyên vật liệu trong kế hoạch sản xuất
        $sqlKHSX = "SELECT maNguyenVatLieu, soluongnvl FROM ctkhsxnvl WHERE maKHSX = '$delete'";
        $resultKHSX = mysql_query($sqlKHSX, $link);

        // Lấy thông tin về số lượng kế hoạch sản xuất mới
        $sqlKHSXMoi = "SELECT maNguyenVatLieu, soluongnvl FROM ctkhsxnvl WHERE maKHSX = '$delete' AND soluongnvl < 0";
        $resultKHSXMoi = mysql_query($sqlKHSXMoi, $link);

        // Tiến hành xóa kế hoạch sản xuất
        $sqlUpdateKHSX = "UPDATE KeHoachSX SET tinhTrang = 1 WHERE maKeHoachSX = '$delete'";
        $ketquaUpdateKHSX = mysql_query($sqlUpdateKHSX, $link);

        if ($ketquaUpdateKHSX) {
            // Nếu xóa thành công, cập nhật số lượng trong bảng nguyenvatlieu
            while ($rowKHSX = mysql_fetch_assoc($resultKHSX)) {
                $currentMaNguyenVatLieu = $rowKHSX['maNguyenVatLieu'];
                $soluongnvl = $rowKHSX['soluongnvl'];

                // Lấy số lượng hiện tại trong bảng nguyenvatlieu
                $sqlNVL = "SELECT soLuongDonMua FROM nguyenvatlieu WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'";
                $resultNVL = mysql_query($sqlNVL, $link);
                $rowNVL = mysql_fetch_assoc($resultNVL);
                $soLuongDonMuaHienTai = $rowNVL['soLuongDonMua'];

                // Kiểm tra và xử lý khi số lượng trong kế hoạch mới nhỏ hơn số lượng tồn
                if ($soluongnvl < 0) {
                    $sqlKHSXMoiRow = mysql_fetch_assoc($resultKHSXMoi);
                    $soluongnvlMoi = $sqlKHSXMoiRow['soluongnvl'];

                    if (($soLuongDonMuaHienTai + $soluongnvlMoi) >= 0) {
                        $soLuongDonMuaHienTai += $soluongnvlMoi;
                    } else {
                        echo "<script>alert('Số lượng tồn không đủ, không thể xóa kế hoạch sản xuất.');</script>";
                        header('Content-Type: text/html; charset=utf-8');
                        echo header("refresh:0;url='KeHoachSX.php'");
                        exit();
                    }
                } else {
                    $soLuongDonMuaHienTai -= $soluongnvl;
                }

                // Cập nhật số lượng mới trong bảng nguyenvatlieu
                $sqlUpdateNVL = "UPDATE nguyenvatlieu SET soLuongDonMua = '$soLuongDonMuaHienTai' WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'";
                mysql_query($sqlUpdateNVL, $link);
            }

            echo "<script>alert('Xóa thành công');</script>";
            header('Content-Type: text/html; charset=utf-8');
            echo header("refresh:0;url='KeHoachSX.php'");
            exit();
        } else {
            echo 'Xóa kế hoạch sản xuất thất bại.';
        }

        mysql_close($link);
    }
}


    public function xuatDonMuaNVL($sql) {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
                $tenDonMuaNVL = $row['tenDonMuaNVL'];
                $maDonMuaNVL = $row['maDonMuaNVL'];

                echo '
                <div class="row">
                    <div class="col">
                        <div class="content"><a href="ChiTietDonMuaNVL.php?maDonMuaNVL=' . $maDonMuaNVL . '">
                            <div class="kho-sub">' . $tenDonMuaNVL . '</div>
                        </a></div>
                        <div id="actions">
                            <a href="suaDMNVL.php?maDonMuaNVL=' . $row['maDonMuaNVL'] . '">Sửa</a> | 
                            <a href="ChiTietDonMuaNVL.php?delete=' . $row['maDonMuaNVL'] . '" 
                            onclick="return confirm(\'Bạn có chắc xóa!\')">Xóa</a>
                        </div>
                    </div>
                </div>';
            }
        }
        mysql_close($link);
    }
	public function xuatDonMuaNVLXuLy($sql) {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
                $tenDonMuaNVL = $row['tenDonMuaNVL'];
                $maDonMuaNVL = $row['maDonMuaNVL'];
				$trangThai=$row['trangThai'];

                echo '
                <div class="row">
                    <div class="col">
                        <div class="content"><a href="ChiTietDonMuaNVL.php?maDonMuaNVL=' . $maDonMuaNVL . '">
                            <div class="kho-sub">' . $tenDonMuaNVL . '</div>
							<div class="actions">
                    <p style="">'.$trangThai.'</p>
                    </div>
                        </a></div>

                    </div>
                </div>';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }
	public function xuatDMNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) 
		{
			while ($row=mysql_fetch_array($ketqua))
			{
			// Lấy thông tin từ dữ liệu
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$maCTDMNVL = $row['maCTDMNVL'];
			// In ra thông tin trong mẫu HTML
			echo '
            <tr>
                <input type="hidden" name="maCTDMNVL[]" value="'.$maCTDMNVL.'">
                <td>'.$tenNguyenVatLieu.'</td>
                <td><input type="number" name="soLuong[]" value="'.$soLuong.'"></td>
                <td>'.$donViTinh.'</td>
            </tr>';
			}
		} 
			else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
public function xuatDSDonMuaNVL($sql) {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
                $tenDonMuaNVL = $row['tenDonMuaNVL'];
                $maDonMuaNVL = $row['maDonMuaNVL'];
				$trangThai=$row['trangThai'];

                echo '
                <div class="row">
                    <div class="col">
                        <div class="content"><a href="ChiTietDonMuaNVL.php?maDonMuaNVL=' . $maDonMuaNVL . '">
                            <div class="kho-sub">' . $tenDonMuaNVL . '</div>
							<div class="actions">
                    <p style="">'.$trangThai.'</p>
                    </div>
                        </a></div>

                    </div>
                </div>';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }

    
    public function xuatCTDMNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);

		if ($ketqua) {
			$row = mysql_fetch_array($ketqua);

			// Lấy thông tin từ dữ liệu
			$tenDonMuaNVL = $row['tenDonMuaNVL'];
			$ngayLap = $row['ngayLap'];
			$tenNCC = $row['tenNCC'];
			$sdtNCC = $row['sdtNCC'];

			// In ra thông tin trong mẫu HTML
			echo '<h1 style="text-transform:uppercase; text-align:center">' . $tenDonMuaNVL . '</h1>';
			echo '<h2 style=" text-align:right ;padding-right:700px;">Mã Đơn mua NVL: ' . $row['maDonMuaNVL'] . '</h2>';
			echo '<div class="warehouse">';
			echo '    <div class="warehouse-information">';
			echo '        <p><b>Ngày lập :</b> ' . $ngayLap . '</p>';
			echo '        <p><b>Tên nhà cung cấp :</b> ' . $tenNCC . '</p>';
			echo '        <p><b>Số điện thoại nhà cung cấp :</b> ' . $sdtNCC . '</p>';
			
			echo '        <h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách nguyên vật liệu</b></h2>';
			echo '    </div>';
			} else {
				echo 'Không có dữ liệu';
			}

		mysql_close($link);
	}
    
  public function xuatDSYCXNVL($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
				$maYCXNVL = $row['maYCXNVL'];
				$tenPhieuYCXNVL = $row['tenPhieuYCXNVL'];
				$tinhTrang = $row['tinhTrang'];
                echo '
            <a href="DuyetPhieuYCXNVL.php?maYCXNVL='.$maYCXNVL.'">
            <div class="row">
                <div class="col">
                    <div class="content" style="text-transform:uppercase;">'.$tenPhieuYCXNVL.'</div>
                    <div class="actions">
                    <p style="color: #696969;">'.$tinhTrang.'</p>
                    </div>
                </div>
            </div>
        </a>';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }
	
	public function xuatDSYCNTP($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
				$maPhieuYCNTP = $row['maPhieuYCNTP'];
				$tenPhieuYCNTP = $row['tenPhieuYCNTP'];
				$tinhTrang = $row['tinhTrang'];
                echo '
            <a href="DuyetPhieuYCNTP.php?maPhieuYCNTP='.$maPhieuYCNTP.'">
            <div class="row">
                <div class="col">
                    <div class="content" style="text-transform:uppercase;">'.$tenPhieuYCNTP.'</div>
                    <div class="actions">
                    <p style="color: #696969;">'.$tinhTrang.'</p>
                    </div>
                </div>
            </div>
        </a>';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }

	public function xuatThongTinPYCXNVL($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
				$maYCXNVL = $row['maYCXNVL'];
				$tenPhieuYCXNVL = $row['tenPhieuYCXNVL'];
				$ngayYC = $row['ngayYC'];
				$tinhTrang = $row['tinhTrang'];
                echo '
            <h1 style="text-align: center;  text-transform: uppercase;">'.$tenPhieuYCXNVL.'</h1>
    <h2>Mã phiếu: '.$maYCXNVL.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Ngày yêu cầu:</b> '.$ngayYC.'</p>
            <p><b>Tình trạng:</b> '.$tinhTrang.'</p>
           ';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
    }
	
	
	public function xuatThongTinPYCNTP($sql)
    {
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysql_fetch_array($ketqua)) {
				$maPhieuYCNTP = $row['maPhieuYCNTP'];
				$tenPhieuYCNTP = $row['tenPhieuYCNTP'];
				$tinhTrang = $row['tinhTrang'];
				$ngayYC = $row['ngayYC'];
                echo '
            <h1 style="text-align: center;  text-transform: uppercase;">'.$tenPhieuYCNTP.'</h1>
    <h2>Mã phiếu: '.$maPhieuYCNTP.'</h2>
    <div class="warehouse">
        <div class="warehouse-information">
            <p><b>Ngày yêu cầu:</b> '.$ngayYC.'</p>
            <p><b>Tình trạng:</b> '.$tinhTrang.'</p>
           ';
            }
        } else {
            echo 'Không có dữ liệu';
        }
        mysql_close($link);
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
	public function xuatLoPhieuYCXNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$maYCXNVL = $row['maYCXNVL'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$maNguyenVatLieu = $row['maNguyenVatLieu'];
			$donViTinh = $row['donViTinh'];
				$soLuong = $row['soLuong'];
			echo '  <tr>
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
                        <td>'.$tenNguyenVatLieu.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
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
   
	public function xuatLoPhieuYCNTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			
			$maPhieuYCNTP = $row['maPhieuYCNTP'];
			$tenThanhPham = $row['tenThanhPham'];
			$maThanhPham = $row['maThanhPham'];
			$donViTinh = $row['donViTinh'];
				$soLuong = $row['soLuong'];
			echo '  <tr>
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
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

    public function themxoasuaDonMuaNVL($sql)
    {
        $link = $this->connect();
        if (mysql_query($sql, $link)) {
            return 1;
        } else {
            return 0;
        }
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
                $soLuongTon=$row['soLuongTonnvl'];
				$anh=$row['anh'];
			echo '
           	<div class="right">
                <div class="righta">
                    <div class="contentleft"> '.$tennvl.'</div>
                    <div class="contentright"> Số lượng tồn: ' . $soLuongTon . '</div>
            </div>
            </div>
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
                $soLuongTon=$row['soLuongTon'];
			echo '
            
           	<div class="right">
                <div class="righta">
                    <div class="contentleft"> '.$tentp.'</div>
                    <div class="contentright"> Số lượng tồn: ' . $soLuongTon . '</div>
                    
            </div>
            </div>
       			 ';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
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
            <a href="ChiTietBBTP.php?maBBKK='.$maBBKK.'">
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
            

            echo '<h2>Mã phiếu: ' . $maBBKK . '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Tên nhân viên kiểm kê:</b> ' . $tenNVKK . '</p>';
            echo '<p><b>Ngày lập: </b> ' . $ngayLapBB . '</p>';
            echo '</div>';
            echo '</div>';
			echo '<H1>DANH SÁCH SẢN PHẨM</H1>';
        }
    } else {
        echo 'Không có dữ liệu';
    }
    mysql_close($link);
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
            <div class="row">
                <div class="col">
                    <div class="content"><a href="ChiTietDonHang.php?maDonHang='.$maDonHang.'">
                <div class="kho-sub">'.$maDonHang.'</div>
            </a></div>
                   
                </div>
            </div>	';
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

           echo '<h2 style=" text-align:right ;padding-right:700px;">Mã kế hoạch sản xuất: ' . $maDonHang . '</h2>';
            echo '<div class="warehouse">';
            echo '<div class="warehouse-information">';
            echo '<p><b>Tên Khách Hàng:</b> ' . $tenkhachHang . '</p>';
            echo '<p><b>Ngày Đặt Hàng: </b> ' . $ngayDatHang . '</p>';
            echo '<p><b>Địa chỉ giao hàng: </b>' . $diaChiGiaoHang . '</p>';
            echo '<p><b>Ngày Giao Dự Kiến: </b>' . $ngayGiaoDuKien . '</p>';
            echo '<p><b>Số Điện Thoại: </b> ' . $soDienThoai . '</p>';
            echo '</div>';
            echo '</div>';
			echo '<h2 style="text-align: center; font-size: 1.8em;"><b>Danh sách thành phẩm</b></h2>';
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
        /*Lich sư xuất*/
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
            <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietPhieuXuatNVL.php?maPXNVL='.$maPXNVL.'">
                <div class="kho-sub">'.$maPXNVL.'</div>
            </a></div>
            </div>
            </div>
              	
        ';
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
            <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietPhieuXuatTP.php?maPXTP='.$maPXTP.'">
                <div class="kho-sub">'.$maPXTP.'</div>
            </a></div>
            </div>
            </div>
              	
        ';
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
			$maPXTP = $row['maPXTP'];
			$maNVKho = $row['maNVKho'];
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
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
            $ngayNhap=$row['ngayNhap'];
			$tenKe = $row['tenKe'];
			echo '  <tr>
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ngayNhap.'</td> <!-- Ngày nhập -->
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
	/*Lich sử nhập */
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
            <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietPhieuNhapNVL.php?maPNNVL='.$maPNNVL.'">
                <div class="kho-sub">'.$maPNNVL.'</div>
            </a></div>
            </div>
            </div>
              	
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
					<p><b>Tên người nhận:</b> '.$tenNguoiGiao.'</p>
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
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
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
            <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietPhieuNhapTP.php?maPNTP='.$maPNTP.'">
                <div class="kho-sub">'.$maPNTP.'</div>
            </a></div>
            </div>
            </div>
              	
        ';
			}
		}
		else
		{
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
			$maPNTP = $row['maPNTP'];
			$maNVKho = $row['maNVKho'];
			$tenkho = $row['tenKho'];
			$tenNguoiGiao = $row['tenNguoiGiao'];
			$ngayNhap = $row['ngayNhap'];
			$ngayLap = $row['ngayLap'];
			echo '
				  <h2>Mã phiếu: '.$maPNTP.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Tên người nhận:</b> '.$tenNguoiGiao.'</p>
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
    public function xuatLoPhieuNTP($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh = $row['donViTinh'];
			$soLuong = $row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
            $ngayNhap=$row['ngayNhap'];
			$tenKe = $row['tenKe'];
			echo '  <tr>
                        <td>'.$dem.'</td> <!-- Số thứ tự -->
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
                        <td>'.$tenKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ngayNhap.'</td> <!-- Ngày nhập -->
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
    /*kho*/
    public function xuatdskhoNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maKho = $row['maKho'];
				$tenKho = $row['tenKho'];
			
			echo '
           <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietKhoNVL.php?maKho='.$maKho.'">
                <div class="kho-sub">'.$tenKho.'</div>
            </a></div>
            </div>
            </div>
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
				$maKho = $row['maKho'];
				$tenKho = $row['tenKho'];
			
			echo '
                <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietKhoTP.php?maKho='.$maKho.'">
                <div class="kho-sub">'.$tenKho.'</div>
            </a></div>
            </div>
            </div>
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
			echo '<h1 style="text-transform:uppercase; text-align:center;">' . $tenkho . '</h1>';
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
    /*Hàng gần hết hạn*/
    public function xuatNVLHH($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maNguyenVatLieu = $row['maNguyenVatLieu'];
                $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			
			echo '
            <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietHangGanHetHanNVL.php?maNguyenVatLieu='.$maNguyenVatLieu.'">
                <div class="kho-sub">'.$tenNguyenVatLieu.'</div>
            </a></div>
            </div>
            </div>
              	
        ';
			}
		}
		else
		{
			echo 'Không có nguyên vật liệu gần hết hạn';
		}
		mysql_close($link);
	}
    public function xuatTPHH($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maThanhPham = $row['maThanhPham'];
				$tenThanhPham = $row['tenThanhPham'];
			
			echo '
           <div class="right">
                <div class="righta">
                    <div class="content"><a href="ChiTietHangGanHetHanTP.php?maThanhPham='.$maThanhPham.'">
                <div class="kho-sub">'.$tenThanhPham.'</div>
            </a></div>
            </div>
            </div>
        ';
			}
		}
		else
		{
			echo 'Không có thành phẩm gần hết hạn';
		}
		mysql_close($link);
	}
    public function xuatCTPhieuNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maLoNVL = $row['maLoNVL'];
			$maNguyenVatLieu = $row['maNguyenVatLieu'];
			$maBMNhap = $row['maBMNhap'];
			$maDonMuaNVL = $row['maDonMuaNVL'];

				
			echo '
				  <h2>Mã phiếu: '.$maNguyenVatLieu.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Mã lo nguyên vật liệu :</b> '.$maLoNVL.'</p>
					
					<p><b>Mã biểu mẫu nhập: </b> '.$maBMNhap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
     public function xuatLoPhieuNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
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
        public function xuatCTPhieuTPHH($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maLoTP = $row['maLoTP'];
			$maThanhPham = $row['maThanhPham'];
			$maBMNhap = $row['maBMNhap'];
			$maPNTP = $row['maPNTP'];

				
			echo '
				  <h2>Mã phiếu: '.$maThanhPham.'</h2>
			<div class="warehouse">
				<div class="warehouse-information">
					<p><b>Mã lo nguyên vật liệu :</b> '.$maLoTP.'</p>
					
					<p><b>Mã biểu mẫu nhập: </b> '.$maBMNhap.'</p>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
     public function xuatLoPhieuTPHH($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			$dem =1;
			while ($row=mysql_fetch_array($ketqua))
			{
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
    /*Biều đồ*/
    public function bieuDo($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $labels = array();
    $data = array();
    $i = mysql_num_rows($ketqua);
	if ($i >0) {
     while ($row = mysql_fetch_array($ketqua)) {
            $labels[] =$row['tenThanhPham'];
            $data[] = $row['soLuongTon'];
        }

        mysql_close($link);
		
    } else {
        echo 'Lỗi thực thi truy vấn.';
    }
	var_dump($labels);
	var_dump($data);
    return array('labels' => $labels, 'data' => $data);

}
    public function bieuDoNguyenVatLieu($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $labels = array();
    $data = array();
    $i = mysql_num_rows($ketqua);
    if ($i > 0) {
        while ($row = mysql_fetch_array($ketqua)) {
            $labels[] = $row['tenNguyenVatLieu'];
            $data[] = $row['soLuongTonnvl'];
        }

        mysql_close($link);
    } else {
        echo 'Lỗi thực thi truy vấn.';
    }

    return array('labels' => $labels, 'data' => $data);
}
 public function timKiem($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				$maThanhPham = $row['maThanhPham'];
				$tenThanhPham = $row['tenThanhPham'];
			
			}
		}
		else
		{
			echo 'Không có thành phẩm gần hết hạn';
		}
		mysql_close($link);
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

// Tương tự với hàm incrementMaCTKHSX
function incrementMaCTKHSXNVL()
{
    $link = $this->connect();
    $sql = "SELECT maCTKHSXNVL FROM ctkhsxnvl ORDER BY maCTKHSXNVL DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaCTKHSX  = $row['maCTKHSXNVL'];
        $currentNumber = (int)substr($latestMaCTKHSX, 7);
        $nextNumber = $currentNumber + 1;
        $nextMaCTKHSX = 'CTKHNVL' . sprintf('%02d', $nextNumber);

        return $nextMaCTKHSX;
    }
}

// Hàm sinh mã mới cho ctkhsx
function incrementMaCTKHSX()
{
    $link = $this->connect();
    $sql = "SELECT maCTKHSXTP FROM ctkhsx ORDER BY maCTKHSXTP DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaCTKHSX = $row['maCTKHSXTP'];
        $currentNumber = (int)substr($latestMaCTKHSX, 6);
        $nextNumber = $currentNumber + 1;
        $nextMaCTKHSX = 'CTKHTP' . sprintf('%02d', $nextNumber);

        return $nextMaCTKHSX;
    }
}
    function incrementMaDonMuaNVL()
{
    $link = $this->connect();
    $sql = "SELECT maDonMuaNVL FROM DonMuaNVL ORDER BY maDonMuaNVL DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaDonMuaNVL  = $row['maDonMuaNVL'];
        $currentNumber = (int)substr($latestMaDonMuaNVL, 5);
        $nextNumber = $currentNumber + 1;
        $nextMaDonMuaNVL = 'DMNVL' . sprintf('%02d', $nextNumber);

        return $nextMaDonMuaNVL;
    }
}
     function incrementCTMaDonMuaNVL()
{
    $link = $this->connect();
    $sql = "SELECT maCTDMNVL FROM  ctdmnvl ORDER BY maCTDMNVL DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaDonMuaNVL  = $row['maCTDMNVL'];
        $currentNumber = (int)substr($latestMaDonMuaNVL, 7);
        $nextNumber = $currentNumber + 1;
        $nextMaDonMuaNVL = 'CTDMNVL' . sprintf('%02d', $nextNumber);

        return $nextMaDonMuaNVL;
    }
}
function incrementTenDonMuaNVL()
{
    $link = $this->connect();
    $sql = "SELECT tenDonMuaNVL FROM DonMuaNVL ORDER BY tenDonMuaNVL DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaDonMuaNVL = $row['tenDonMuaNVL'];
        // Lấy số cuối cùng từ chuỗi
        $currentNumber = (int)substr($latestMaDonMuaNVL, -2);
        $nextNumber = $currentNumber + 1;

        // Định dạng số với 2 chữ số
        $nextMaDonMuaNVL = 'Đơn mua nguyên vật liệu ' . sprintf('%02d', $nextNumber);

        return $nextMaDonMuaNVL;
    }
}


function getLatestMaKH()
{
    $link = $this->connect();
    $sql = "SELECT maKeHoachSX FROM KeHoachSX ORDER BY maKeHoachSX DESC LIMIT 1";
    $ketqua = mysql_query($sql, $link);

    if (!$ketqua) {
        die('Lỗi truy vấn: ' . mysql_error());
    } else {
        $row = mysql_fetch_assoc($ketqua);
        $latestMaKH = $row['maKeHoachSX'];
        mysql_close($link);
        return $latestMaKH;
    }
}
function incrementMaKH()
{
    $latestMaKH = $this->getLatestMaKH();
    $currentNumber = (int)substr($latestMaKH, 4);
    $nextNumber = $currentNumber + 1;
    $nextMaKH = 'KHSX' . sprintf('%02d', $nextNumber);
    return $nextMaKH;
}

public function load_NguyenVatLieuOptions() {
    $link = $this->connect();
    $result = mysql_query("SELECT * FROM nguyenvatlieu", $link);

    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            if (!empty($row["maNguyenVatLieu"]) && !empty($row["donViTinh"])) {
                echo "<option value='{$row["maNguyenVatLieu"]}' data-unit='{$row["donViTinh"]}'>{$row["tenNguyenVatLieu"]}</option>";
            }
        }
        mysql_free_result($result);
    } else {
        echo "Error: " . mysql_error($link);
    }

    mysql_close($link);
}
public function load_ThanhPhamOptions() {
   $link = $this->connect();
   $result = mysql_query("SELECT * FROM thanhpham", $link);

   if ($result) {
      while ($row = mysql_fetch_assoc($result)) {
         if (!empty($row["maThanhPham"]) && !empty($row["donViTinh"])) {
            echo "<option value='{$row["maThanhPham"]}' data-unit='{$row["donViTinh"]}'>{$row["tenThanhPham"]}</option>";
         }
      }
      mysql_free_result($result);
   } else {
      echo "Error: " . mysql_error($link);
   }

   mysql_close($link);
}
public function KtraTinhTrang($maKeHoachSX)
{
    $link = $this->connect();
    $sql = "SELECT tinhTrang FROM KeHoachSX WHERE maKeHoachSX = '$maKeHoachSX'";
    $ketqua = mysql_query($sql, $link);

    if ($row = mysql_fetch_assoc($ketqua)) {
        $tinhtrang = $row['tinhTrang'];
    } else {
        $tinhtrang = ''; // hoặc giá trị mặc định khác tùy thuộc vào logic của bạn
    }

    mysql_close($link);

    return $tinhtrang;
}
public function KtraTinhTrangDMNVL($maDonMuaNVL)
{
    $link = $this->connect();
    $sql = "SELECT tinhTrang FROM  donmuanvl WHERE maDonMuaNVL = '$maDonMuaNVL'";
    $ketqua = mysql_query($sql, $link);

    if ($row = mysql_fetch_assoc($ketqua)) {
        $tinhtrang = $row['tinhTrang'];
    } else {
        $tinhtrang = ''; // hoặc giá trị mặc định khác tùy thuộc vào logic của bạn
    }

    mysql_close($link);

    return $tinhtrang;
}
public function kiemTraTonKho($currentMaNguyenVatLieu, $soluongnvl) {
    $link = $this->connect();
    
    // Thực hiện truy vấn để lấy số lượng tồn kho của nguyên vật liệu có mã $maNguyenVatLieu
    $result = mysql_query("SELECT soluongtonnvl,soLuongDonMua FROM nguyenvatlieu WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'", $link);
    
    if ($result) {
        $row = mysql_fetch_assoc($result);
        $soLuongTonNVL = $row['soluongtonnvl'];
        $soLuongDonMua=$row['soLuongDonMua'];
        // Kiểm tra số lượng tồn kho
        if (($soLuongTonNVL - $soLuongDonMua)> $soluongnvl) {
            return true;
        }
    } else {
       return false;
    }

    // Đóng kết nối
    mysql_close($link);

    
}
public function getsoLuongDonMua($currentMaNguyenVatLieu)
{
    $link = $this->connect();
    $sql = "SELECT soLuongDonMua FROM nguyenvatlieu WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'";
    $ketqua = mysql_query($sql, $link);

    if ($row = mysql_fetch_assoc($ketqua)) {
        $soLuongDonMua = $row['soLuongDonMua'];
    } else {
        $soLuongDonMua = 0; // hoặc giá trị mặc định khác tùy thuộc vào logic của bạn
    }

    mysql_close($link);

    return $soLuongDonMua;
}
public function get($currentMaCTKHSXNVL)
{
    $link = $this->connect();
    $sql = "SELECT ctkhsxnvl.maNguyenVatLieu, nguyenvatlieu.soLuongDonMua, ctkhsxnvl.soLuongNVL
            FROM ctkhsxnvl
            JOIN nguyenvatlieu ON ctkhsxnvl.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
            WHERE ctkhsxnvl.maCTKHSXNVL = '$currentMaCTKHSXNVL'";
    $ketqua = mysql_query($sql, $link);

    $resultArray = array();

    while ($row = mysql_fetch_assoc($ketqua)) {
        $resultArray['maNguyenVatLieu'] = $row['maNguyenVatLieu'];
        $resultArray['soLuongDonMuaHienTai'] = $row['soLuongDonMua'];
        $resultArray['soLuongNVLBeforeUpdate'] = $row['soLuongNVL'];
    }

    mysql_close($link);

    return $resultArray;
}

    public function getsoLuongTon($currentMaNguyenVatLieu)
{
    $link = $this->connect();
    $sql = "SELECT soLuongTonnvl FROM nguyenvatlieu WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'";
    $ketqua = mysql_query($sql, $link);

    if ($row = mysql_fetch_assoc($ketqua)) {
        $soLuongTonnvl = $row['soLuongTonnvl'];
    } else {
        $soLuongTonnvl = 0; // hoặc giá trị mặc định khác tùy thuộc vào logic của bạn
    }

    mysql_close($link);

    return $soLuongTonnvl;
}

public function xembbkk($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $i = mysql_num_rows($ketqua);

    if ($i > 0) {
        while ($row = mysql_fetch_array($ketqua)) {
            $maBBKK = $row['maBBKK'];
			if (strpos($maBBKK, 'NVL') !== false){
                echo '
                <a href="xemctbbkk.php?maBBKK=' . $maBBKK . '">
                    <div class="kho-sub">' . $maBBKK . '</div>
                </a>';
			}else {
                echo '
                <a href="xemctbbkktp.php?maBBKK=' . $maBBKK . '">
                    <div class="kho-sub">' . $maBBKK . '</div>
                </a>';
            }
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}


public function xemphieukk($maBBKK)
	{
		$result = '';
		$link = $this -> connect();
		
		if (strpos($maBBKK, 'NVL') !== false) {
    // Chọn loại mã NVL
    $ketqua = mysql_query("SELECT
*
FROM
    `bienbankiemke` bb
JOIN
    `chitietbbnvl` ct ON bb.`maBBKK` = ct.`maBBKK`
JOIN
    `longuyenvatlieu` l ON ct.`maLoNVL` = l.`maLoNVL`
JOIN
    `nguyenvatlieu` nvl ON l.`maNguyenVatLieu` = nvl.`maNguyenVatLieu`
JOIN
    `ke` ke ON l.`maKe` = ke.`maKe`
JOIN
    `kho` k ON ke.`maKho` = k.`maKho`
WHERE
    bb.`maBBKK` = '$maBBKK';
;");

$i = mysql_num_rows($ketqua);
if ($i >0)
{
	return $ketqua;
}
else
{
	echo 'Không có dữ liệu';
}

} else {
    // Chọn loại mã TP
    $ketqua = mysql_query("SELECT
    *
FROM bienbankiemke bbkk
JOIN chitietbbtp ctb ON bbkk.maBBKK = ctb.maBBKK
JOIN lothanhpham ltp ON ctb.maLoTP = ltp.maLoTP
JOIN ke ON ltp.maKe = ke.maKe
JOIN kho ON ke.maKho = kho.maKho
JOIN thanhpham tp ON ltp.maThanhPham = tp.maThanhPham
WHERE bbkk.maBBKK = '$maBBKK';");
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			
			
			return $ketqua;
		}
		else
		{
			echo 'Không có dữ liệu';
		}
}
		

		mysql_close($link);
	}
	public function xemsuaphieukk($maBBKK)
	{
		$result = '';
		$link = $this -> connect();
		
		if (strpos($maBBKK, 'NVL') !== false) {
    // Chọn loại mã NVL
    $ketqua = mysql_query("SELECT
*
FROM
    `bienbankiemke` bb
JOIN
    `chitietbbnvl` ct ON bb.`maBBKK` = ct.`maBBKK`
JOIN
    `longuyenvatlieu` l ON ct.`maLoNVL` = l.`maLoNVL`
JOIN
    `nguyenvatlieu` nvl ON l.`maNguyenVatLieu` = nvl.`maNguyenVatLieu`
JOIN
    `ke` ke ON l.`maKe` = ke.`maKe`
JOIN
    `kho` k ON ke.`maKho` = k.`maKho`
WHERE
    bb.`maBBKK` = '$maBBKK';
;");

$i = mysql_num_rows($ketqua);
if ($i >0)
{
	return $ketqua;
}
else
{
	echo 'Không có dữ liệu';
}

} else {
    // Chọn loại mã TP
    $ketqua = mysql_query("SELECT
    *
FROM bienbankiemke bbkk
JOIN chitietbbtp ctb ON bbkk.maBBKK = ctb.maBBKK
JOIN lothanhpham ltp ON ctb.maLoTP = ltp.maLoTP
JOIN ke ON ltp.maKe = ke.maKe
JOIN kho ON ke.maKho = kho.maKho
JOIN thanhpham tp ON ltp.maThanhPham = tp.maThanhPham
WHERE bbkk.maBBKK = '$maBBKK';");
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			
			
			return $ketqua;
		}
		else
		{
			echo 'Không có dữ liệu';
		}
}
		

		mysql_close($link);
	}
	public function xuatCTBBKK($sql)
	{
		$link = $this ->connect();
		$ketqua = mysql_query($sql, $link);
		if ($ketqua)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maKho = $row['maKho'];
			$ngayLapBB = $row['ngayLapBB'];
			$maBBKK = $row['maBBKK'];
			$tennvkk=$row['tennvkk'];
			echo '
				 <h2>Mã phiếu: '.$maBBKK.'</h2>
		<div class="warehouse">
			<div class="warehouse-information">
				<p><b>Mã Kho:</b> '.$maKho.'</p>
				<p><b>Tên nhân viên:</b> '.$tennvkk.'</p>
				<p><b>Ngày kiểm kê:</b> '.$ngayLapBB.'</p>
				
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	public function xuatLoBBKKNVL($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$count =1;
		if ($ketqua)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBKK = $row['maBBKK'];
			$tenNguyenVatLieu = $row['tenNguyenVatLieu'];
			$donViTinh	= $row['donViTinh'];
			$maKe = $row['maKe'];
			$soLuong=$row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$ghiChu = $row['ghiChu'];

				
			echo '<tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
                        <td>'.$tenNguyenVatLieu.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
                        <td>'.$maKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ghiChu.'</td>
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	public function xuatLoBBKKTP($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$count =1;
		if ($ketqua)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBKK = $row['maBBKK'];
			$tenThanhPham = $row['tenThanhPham'];
			$donViTinh	= $row['donViTinh'];
			$maKe = $row['maKe'];
			$soLuong=$row['soLuong'];
			$NSX = $row['NSX'];
			$NHH = $row['NHH'];
			$ghiChu = $row['ghiChu'];

				
			echo '<tr>
                        <td>'.$count++.'</td> <!-- Số thứ tự -->
                        <td>'.$tenThanhPham.'</td> <!-- Tên sản phẩm -->
                        <td>'.$donViTinh.'</td> <!-- Đơn vị tính -->
                        <td>'.$soLuong.'</td> <!-- Số lượng -->
                        <td>'.$maKe.'</td> <!-- Kệ -->
                        <td>'.$NSX.'</td> <!-- Ngày sản xuất -->
                        <td>'.$NHH.'</td> <!-- Hạn sử dụng -->
                        <td>'.$ghiChu.'</td>
                    </tr>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	public function xuatUPCTBBKK($sql)
	{
		$link = $this ->connect();
		$ketqua = mysql_query($sql, $link);
		if ($ketqua)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maKho = $row['maKho'];
			$ngayLapBB = $row['ngayLapBB'];
			$maBBKK = $row['maBBKK'];
			$tennvkk=$row['tennvkk'];
			echo '
				 <h2>Mã phiếu: '.$maBBKK.'</h2>
		<div class="warehouse">
			<div class="warehouse-information">
				<p><b>mã Kho:</b> '.$maKho.'</p>
				<p><b>tên nhân viên:</b> '.$tennvkk.'</p>
				<p><b>Ngày kiểm kê:</b> '.$ngayLapBB.'</p>
				
        </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);
	}
	public function xuatUPLoBBKKNVL($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $count = 1;

    if ($ketqua) {
        while ($row = mysql_fetch_array($ketqua)) {
            // Lấy thông tin từ dữ liệu
            $maBBKK = $row['maBBKK'];
            $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
            $donViTinh    = $row['donViTinh'];
            $maKe = $row['maKe'];
            $soLuong = $row['soLuong'];
            $NSX = $row['NSX'];
            $NHH = $row['NHH'];
            $ghiChu = $row['ghiChu']; // Thay đổi tên cột
      // Thêm dòng này để lấy dữ liệu cột mới

            echo '<tr>
                        <td>' . $count++ . '</td> <!-- Số thứ tự -->
                        <td>' . $tenNguyenVatLieu . '</td> <!-- Tên sản phẩm -->
                        <td>' . $donViTinh . '</td> <!-- Đơn vị tính -->
						<td><input type="number"min=0 name="soLuongMoi[]" value="' . $soLuong . '"></td>
                        <td>' . $maKe . '</td> <!-- Kệ -->
                        <td>' . $NSX . '</td> <!-- Ngày sản xuất -->
                        <td>' . $NHH . '</td> <!-- Hạn sử dụng -->
						<td>' . $ghiChu . '</td> <!-- Số lượng -->
                         <!-- Số lượng mới -->
                    </tr>';
					
					
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}
public function xuatUPLoBBKKTP($sql)
{
    $link = $this->connect();
    $ketqua = mysql_query($sql, $link);
    $count = 1;

    if ($ketqua) {
        while ($row = mysql_fetch_array($ketqua)) {
            // Lấy thông tin từ dữ liệu
            $maBBKK = $row['maBBKK'];
            $tenThanhPham = $row['tenThanhPham'];
            $donViTinh    = $row['donViTinh'];
            $maKe = $row['maKe'];
            $soLuong = $row['soLuong'];
            $NSX = $row['NSX'];
            $NHH = $row['NHH'];
            $ghiChu = $row['ghiChu']; // Thay đổi tên cột
      // Thêm dòng này để lấy dữ liệu cột mới

            echo '<tr>
                        <td>' . $count++ . '</td> <!-- Số thứ tự -->
                        <td>' . $tenThanhPham . '</td> <!-- Tên sản phẩm -->
                        <td>' . $donViTinh . '</td> <!-- Đơn vị tính -->
						<td><input type="number" name="soLuongMoi[]" min=0 value="' . $soLuong . '"></td>
                        <td>' . $maKe . '</td> <!-- Kệ -->
                        <td>' . $NSX . '</td> <!-- Ngày sản xuất -->
                        <td>' . $NHH . '</td> <!-- Hạn sử dụng -->
						<td>' . $ghiChu . '</td> <!-- Số lượng -->
                         <!-- Số lượng mới -->
                    </tr>';
					
					
        }
    } else {
        echo 'Không có dữ liệu';
    }

    mysql_close($link);
}

	public function xuatCTBBKKNVL($sql)
	{
		$link = $this -> connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if ($i >0)
		{
			while ($row=mysql_fetch_array($ketqua))
			{
				// Lấy thông tin từ dữ liệu
			$maBBKK = $row['maBBKK'];
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
	
}
?>