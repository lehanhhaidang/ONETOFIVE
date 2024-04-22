<?php
 include("controller/cSanPham.php");
    class ViewSanPham{

        // điều phối xuất hiển thị danh sách đơn hàng bên trái đ
        function viewALLDH(){
            $p = new ControllerSanPham();
            $tblSP = $p -> getALLDH();
            if(!$tblSP){
                echo("Không có đơn hàng nào trong danh sách");
            }elseif($tblSP==0){
                    echo("0 result");

            }else{
                echo('<ul class="vertical-menu">');
                while($r = mysql_fetch_assoc($tblSP)){
                    echo('<li>');
                    echo('<a href="?maDonHang='.$r['maDonHang'].'">Đơn hàng '.$r['maDonHang'].'</a>');
                    echo('</li>');
                   
                }
                
                
                echo('</ul>');
                
            }
        }
        
       //hiển thị danh sách phiếu yêu cầu xuất nvl
       function viewALLPhieuYCXNVL(){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLPhieuYCXNVL();
        if(!$tblSP){
            echo("Không có Phiếu YCXNVL trong danh sách");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            echo('<ul class="vertical-menu">');
            while($r = mysql_fetch_assoc($tblSP)){
                echo('<li>');
                echo('<a href="?maYCXNVL='.$r['maYCXNVL'].'">Phiếu '.$r['maYCXNVL'].'</a>');
                echo('</li>');
               
            }
            
            
            echo('</ul>');
            
        }
    }
    //điều phối xuất - chi tiết đơn hàng
    function viewALLDieuPhoiChiTietDonHang($maDonHang){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLDieuPhoiChiTietDonHang($maDonHang);
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            $dem = 1;
            echo" <table> ";
            while($row = mysql_fetch_assoc($tblSP)){
                $tenhanghoa = $row['tenThanhPham'];
		    	$soLuong = $row['soLuong'];
			    $donViTinh = $row['donViTinh'];
                $make = $row['maKe'];
                $maDonHang = $row['maDonHang'];
                $makho =  substr(strstr($row['maKe'], '-'), 1);
                $tennguoinhan = $row['tenKhachHang'];
                echo'     
               
                <tr>
                <td><i><b> '.$dem.'</b></i>   &nbsp <b>Tên thành phẩm: '.$tenhanghoa.'</b></td>
                <td><b>Số lượng: '.$soLuong.'</b></td>
                <td><b>Đơn vị tính: '. $donViTinh.'</b></td>
                </tr>
                <tr>
                    <td >  <i>Mã Kho </i> &nbsp &nbsp
                     <select  name="makho" id="">
                          <option value="'.$makho.'"> &nbsp &nbsp &nbsp &nbsp '.$makho.'</option>
                           
                            
                    </select>
                    </td>
                    <td>  
                    </td>
                </tr>   
           ';
           $dem ++;
               
            }
             echo'
            <tr>
            <td><b>Ngày xuất </b>: <input it="txtngay" required name="ngayxuat" type="date" onblur="kiemTraNgay()> <span id="tbngay">*</span> </td> 
            
            <td> <b> Loại xuất</b>: 
            <input  required type="radio" name="loaixuat" value="Nguyên Vật Liệu"> NVL
            <input  required type="radio" name="loaixuat" value="Thành Phẩm"> TP
            </td>
            <td><b>Tên Khách Hàng</b>: <input name="tennguoinhan" type="text" value="'.$tennguoinhan.'"> </td>
         </tr>
         <tr></tr>
         <tr>
         <td> </td> <td> </td>
         <td class="bntsubmit">
         <a href="dieuphoi.php" ><input type="button" value="Hủy">
             <input type="submit" name="btnsubmit" value="Điều phối">
         </td>
         
     </tr> </table>
            ';
              
        }
    }
       //điều phối xuất - chi tiết phiếu yêu cầu xuất nvl
       function viewALLDieuPhoiChiTietPhieuYCXNVL($maYCXNVL){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLChiTietPhieuYCXNVL($maYCXNVL);
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            echo" <table>";
            $dem = 1;
            while($row = mysql_fetch_assoc($tblSP)){
                $tenhanghoa = $row['tenNguyenVatLieu'];
		    	$soLuong = $row['soLuong'];
			    $donViTinh = $row['donViTinh'];
                $make = $row['maKe'];
                $maDonHang = $row['maYCXNVL'];
                $makho =  substr(strstr($row['maKe'], '-'), 1);
                $tennguoinhan = $row['tenKhachHang'];
                echo'     
                                                        
                <tr>
                    <td><i><b> '.$dem.'</b></i>   &nbsp  <b>Tên thành phẩm: '.$tenhanghoa.'</b></td>
                    <td><b>Số lượng: '.$soLuong.'</b></td>
                    <td><b>Đơn vị tính: '. $donViTinh.'</b></td>
                </tr>
                <tr>
                    
                    <td > <i>Mã Kho </i>&nbsp &nbsp
                     <select  name="makho" id="">
                            <option value="'.$makho.'"> &nbsp &nbsp &nbsp &nbsp  '.$makho.'</option>
                           
                            
                        </select>
                    </td>
                    <td> 
                    </td>
                </tr>   
           ';
           $dem ++;
            } echo'
            <tr>
            <td><b>Ngày xuất </b>: <input required  name="ngayxuat" type="date"> </td> 
            <td> <b> Loại xuất</b>:
            <input type="radio" required  name="loaixuat" value="Nguyên Vật Liệu"> NVL
            <input type="radio" required  name="loaixuat" value="Thành Phẩm"> TP
            </td>
            <td><b>Tên Khách Hàng</b>: <input name="tennguoinhan" type="text" value=" '.$tennguoinhan.'"></td>
         </tr>
         
         <tr>
         <td> </td> <td> </td>
         <td class="bntsubmit">
         <a href="dieuphoi.php"><input type="button" value="Hủy">
              
             <input type="submit" name="btnsubmit" value="Điều phối">
         </td>
     </tr> </table>  
            ';
              
        }
    }
        // biểu mẫu xuất- lưu thông tin vào cơ sở dữ lieuen 
        // function viewadd($mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai){
        //     $p = new ControllerSanPham();
        //     $tblSP = $p -> adddieuphoi($mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai);
        //     if(!$tblSP){
        //         echo("Have some error");
        //     }elseif($tblSP==0){
        //             echo("0 result");
    
        //     }else{
                
        //         while($row = mysql_fetch_assoc($tblSP)){
        //             $makho =  substr(strstr($row['maKe'], '-'), 1);
        //             $tennguoinhan = $row['tenKhachHang'];
        //         }
                 
        //     }
        // }


    // biểu mẫu nhập-Đơn mua nvl
    function viewALLdonmuanvl(){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLdonmuanvl();
        if(!$tblSP){
            echo("Không có đơn mua nvl nào trong danh sách");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            echo('<ul class="vertical-menu">');
            while($r = mysql_fetch_assoc($tblSP)){
                echo('<li>');
                echo('<a href="?maDonMuaNVL='.$r['maDonMuaNVL'].'">Đơn '.$r['maDonMuaNVL'].'</a>');
                echo('</li>');
               
            }
            
            
            echo('</ul>');
            
        }
    } 

     //điều phối nhập - chi tiết đơn mua nguyên vật liệu
     function viewAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL){
        $p = new ControllerSanPham();
        $tblSP = $p -> getAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL);
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            $dem = 1;
            echo" <table> ";
            while($row = mysql_fetch_assoc($tblSP)){
                $tenNguyenVatLieu = $row['tenNguyenVatLieu'];
		    	$soLuong = $row['soLuong'];
			    $donViTinh = $row['donViTinh'];
                $make = $row['maKe'];
              //  $maDonHang = $row['maDonHang'];
                $makho =  substr(strstr($row['maKe'], '-'), 1);
                $tenNCC = $row['tenNCC'];
                echo'     
               
                <tr>
                <td><i><b> '.$dem.'</b></i>   &nbsp <b>Tên thành phẩm: '.$tenNguyenVatLieu.'</b></td>
                <td><b>Số lượng: '.$soLuong.'</b></td>
                <td><b>Đơn vị tính: '. $donViTinh.'</b></td>
                </tr>
                <tr>
                    <td >  <i>Mã Kho </i> &nbsp &nbsp
                     <select  name="makho" id="">
                   
                          <option value="'.$makho.'"> KHO NVL 01 (Ớt bột, mức dâu, bơ....)</option>
                          <option value="'.$makho.'"> KHO NVL 02(Bơ đậu phộng, mức dâu, bơ....)</option>
                          <option value="'.$makho.'">KHO NVL 03(Bột, trứng gà,....)</option>
                          <option value="'.$makho.'"> KHO NVL 04(Bơ đậu phộng, mức dâu....)</option>
                           
                            
                    </select>
                    </td>
                    <td>  
                    </td>
                </tr>   
           ';
           $dem ++;
               
            }
             echo'
            <tr>
            <td><b>Ngày nhập </b>: <input required name="ngaynhap" type="date"> </td> 
            <td> <b> Loại Nhập</b>: 
            <input  required type="radio" name="loainhap" value="Nguyên Vật Liệu"> NVL
            <input  required type="radio" name="loainhap" value="Thành Phẩm"> TP
            </td>
            <td><b>Tên Người Giao</b>: <input name="tenNCC" type="text" value="'.$tenNCC.'"> </td>
         </tr>
         <tr></tr>
         <tr>
         <td> </td> <td> </td>
         <td class="bntsubmit">
         <a href="dieuphoi.php" ><input type="button" value="Hủy">
             <input type="submit" name="btnsubmit" value="Điều phối">
         </td>
         
     </tr> </table>
            ';
              
        }
    }
  
      // biểu mẫu nhập-phiếu yêu cầu nhập tp
      function viewALLphieuycntp(){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLphieuycntp();
        if(!$tblSP){
            echo("Không có phiếu yêu cầu nhập tp nào trong danh sách");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            echo('<ul class="vertical-menu">');
            while($r = mysql_fetch_assoc($tblSP)){
                echo('<li>');
                echo('<a href="?maPhieuYCNTP='.$r['maPhieuYCNTP'].'">Phiếu yêu cầu '.$r['maPhieuYCNTP'].'</a>');
                echo('</li>');
               
            }
            
            
            echo('</ul>');
            
        }
    }
        //điều phối nhập - chi tiết phiếu yêu cầu nhập thành phẩm
     function viewAllDieuPhoiChiTietPhieuYCNTP($maPhieuYCNTP){
        $p = new ControllerSanPham();
        $tblSP = $p -> getAllDieuPhoiChiTietPhieuYCNTP($maPhieuYCNTP);
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            $dem = 1;
            echo" <table> ";
            while($row = mysql_fetch_assoc($tblSP)){
                $tenThanhPham = $row['tenThanhPham'];
		    	$soLuong = $row['SoLuong'];
			    $donViTinh = $row['donViTinh'];
                $make = $row['maKe'];
              //  $maDonHang = $row['maDonHang'];
                $makho =  substr(strstr($row['maKe'], '-'), 1);
                $tenNCC = $row['tenNCC'];
                echo'     
               
                <tr>
                <td><i><b> '.$dem.'</b></i>   &nbsp <b>Tên thành phẩm: '.$tenThanhPham.'</b></td>
                <td><b>Số lượng: '.$soLuong.'</b></td>
                <td><b>Đơn vị tính: '. $donViTinh.'</b></td>
                </tr>
                <tr>
                    <td >  <i>Mã Kho </i> &nbsp &nbsp
                     <select  name="makho" id="">
                     <option value="'.$makho.'"> KHO TP 01 (Bánh quy, kẹo....)</option>
                     <option value="'.$makho.'"> KHO TP 02(Bánh chocobe,bánh xốp....)</option>
                     <option value="'.$makho.'">KHO TP 03(Kẹo sửa, kẹo mút....)</option>
                     <option value="'.$makho.'"> KHO TP 04(Trứng tươi, bông lan....)</option>
                     <option value="'.$makho.'">KHO TP 05(Kẹo dẻo,....)</option>
                     <option value="'.$makho.'"> KHO TP 06(Xúc xích....)</option>
                           
                            
                    </select>
                    </td>
                    <td>  
                    </td>
                </tr>   
           ';
           $dem ++;
               
            }
             echo'
            <tr>
            <td><b>Ngày nhập </b>: <input required name="ngaynhap" type="date"> </td> 
            <td> <b> Loại nhập</b>: 
            <input  required type="radio" name="loainhap" value="Nguyên Vật Liệu"> NVL
            <input  required type="radio" name="loainhap" value="Thành Phẩm"> TP
            </td>
            <td><b>Tên Người Giao</b>: <input name="tenNCC" type="text" value="Nguyễn Đăng Dương"> </td>
         </tr>
         <tr></tr>
         <tr>
         <td> </td> <td> </td>
         <td class="bntsubmit">
         <a href="dieuphoi.php" ><input type="button" value="Hủy">
             <input type="submit" name="btnsubmit" value="Điều phối">
         </td>
         
     </tr> </table>
            ';
              
        }
    }
    // hiển thị danh sách đơn hàng
    function viewALLdonhang(){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLdonhang();
        if(!$tblSP){
            echo("Không có đơn hàng");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            
            while($r = mysql_fetch_assoc($tblSP)){
                echo('<div class="donhang">');
                echo('<h3>');
                echo('<a href="chitietdonhang.php?maDonHang='.$r['maDonHang'].'">ĐƠN HÀNG '.$r['maDonHang'].'</a>');
                echo('</h3>');
               echo(' </div>');
               
            }
             
        }
    }
    // hiển thị chi tiết đơn hàng trên 
    function viewchitietdonhangtren($maDonHang){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLchitietdonhang($maDonHang);
       
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
           
           $row=mysql_fetch_array($tblSP);
			
			// Lấy thông tin từ dữ liệu
           
			$maDonHang = $row['maDonHang'];
			$ngayDatHang = $row['ngayDatHang'];
			$tenKhachHang = $row['tenKhachHang'];
			$ngayGiaoDuKien = $row['ngayGiaoDuKien'];
			$soDienThoai = $row['soDienThoai'];
			$diaChiGiaoHang = $row['diaChiGiaoHang'];
			
			// In ra thông tin trong mẫu HTML
			echo ' <center>
           <h2>ĐƠN HÀNG '.$maDonHang.'</h2>  
        </center>
        <div class="madonhang"> <br> <br> 
           <i><h3>Mã đơn hàng: '.$maDonHang.'</h3></i>
        </div> <br> <br>
       <center>
              <div class="chitietdonhang">
            <table width="100%" height="100%">
                <tr>
                    <td colspan="2"><p>Ngày đặt hàng: &nbsp &nbsp<i class="txtdonhang">'.$ngayDatHang.'</i></p></td>
                    
                </tr>
                <tr>
                    <td>Tên khách hàng:  &nbsp &nbsp  <i class="txtdonhang">'.$tenKhachHang.'</i></td>
                    <td>Số điện thoại: &nbsp &nbsp &nbsp  <i class="txtdonhang">'.$soDienThoai.'</i></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <p>Địa chỉ giao hàng:  &nbsp  &nbsp <i class="txtdonhang">'.$diaChiGiaoHang.'</i></p></td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                    <p>Ngày giao dự kiến:  &nbsp  &nbsp  <i class="txtdonhang">'.$ngayGiaoDuKien.'</i></p></td>
                    
                </tr>
                <tr></tr>
                <tr>
                    <td colspan="2"><p>Danh sách hàng hóa</p></td>
                    
                </tr>
            </table>
        </div> ';
			  
                

    }
     
    
    }
    // hiển thị chi tiết đơn hàng dưới

    function viewchitietdonhang($maDonHang){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLchitietdonhang($maDonHang);
       
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            $dem = 1;
            while ($row=mysql_fetch_array($tblSP))
			{
			// Lấy thông tin từ dữ liệu
           
			$maDonHang = $row['maDonHang'];
			$ngayDatHang = $row['ngayDatHang'];
			$tenKhachHang = $row['tenKhachHang'];
			$ngayGiaoDuKien = $row['ngayGiaoDuKien'];
			$soDienThoai = $row['soDienThoai'];
			$diaChiGiaoHang = $row['diaChiGiaoHang'];
			$tenhanghoa = $row['tenThanhPham'];
			$soLuong = $row['soLuong'];
			$donViTinh = $row['donViTinh'];
			// In ra thông tin trong mẫu HTML
			echo '<tr>
                        <td>'.$dem.'</td>
                        <td>'.$tenhanghoa.'</td>
                        <td>'.$soLuong.'</td>
                        <td>'.$donViTinh.'</td>
                       
                        <td></td>
                    </tr>';
			 $dem++;  
                }

    }
     
    
    }
    //hiển thị danh sách kho 
    function viewALLkho(){
        $p = new ControllerSanPham();
        $tblSP = $p -> getALLkho();
        if(!$tblSP){
            echo("Have some error");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            
            while($r = mysql_fetch_assoc($tblSP)){
                echo('<div class="thongtinkho">');
                echo('<h3>');
                echo"<a href='chitietkho.php?makho=".$r['maKho']."'>KHO ".$r["maKho"]."</a>";
                echo('</h3>');
               echo(' </div>');
               
            }
             
        }
    }

     // hiển thị chi tiết kho trên 
     function viewchitietkhotren($makho){
        $p = new ControllerSanPham();
        $tblSP = $p -> getchitietkho($makho);
        $tblSP2 = $p -> getchitietkho2($makho);
        if(!$tblSP){
            $row = mysql_fetch_array($tblSP2);

			// Lấy thông tin từ dữ liệu
			$makho = $row['maKho'];
			$tenkho = $row['tenKho'];
			$maPhieu = $row['maPhieu'];
			$diaChiKho = $row['diaChiKho'];
			$soLuongKe = $row['soLuongKe'];
			$dungLuongKhoToiDa = $row['dungLuongKhoToiDa'];
			$tinhTrangKho = $row['tinhTrangKho'];

            // In ra thông tin trong mẫu HTML
            echo("<center>");
			echo(" <h2>$tenkho</h2>");
            echo(" </center>");
            echo('<div class="madonhang">');
            echo("<br>");
            echo("<br>");
            echo("<i>");
            echo("<h3>MÃ KHO: $makho</h3>");
            echo("</i>");
            echo("</div>");
            echo("<br>");
            echo("<br>");
            echo("<center>");
            echo('<div class="chitietdonhang">');
            echo('<table width="100%" height="100%">');

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Địa chỉ: $diaChiKho</p>");
            echo("</td>");
            echo("</tr>");
            
            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Số lượng kệ: $soLuongKe</p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Dung lượng tối đa: $dungLuongKhoToiDa</p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Tình trạng: $tinhTrangKho </p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Danh sách hàng hóa </p>");
            echo("</td>");
            echo("</tr>");

            echo("</table>");
            echo("</div>");
            echo("</center>");
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            $row = mysql_fetch_array($tblSP);

			// Lấy thông tin từ dữ liệu
			$makho = $row['maKho'];
			$tenkho = $row['tenKho'];
			$maPhieu = $row['maPhieu'];
			$diaChiKho = $row['diaChiKho'];
			$soLuongKe = $row['soLuongKe'];
			$dungLuongKhoToiDa = $row['dungLuongKhoToiDa'];
			$tinhTrangKho = $row['tinhTrangKho'];

            // In ra thông tin trong mẫu HTML
            echo("<center>");
			echo(" <h2>$tenkho</h2>");
            echo(" </center>");
            echo('<div class="madonhang">');
            echo("<br>");
            echo("<br>");
            echo("<i>");
            echo("<h3>MÃ KHO: $makho</h3>");
            echo("</i>");
            echo("</div>");
            echo("<br>");
            echo("<br>");
            echo("<center>");
            echo('<div class="chitietdonhang">');
            echo('<table width="100%" height="100%">');

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Địa chỉ: $diaChiKho</p>");
            echo("</td>");
            echo("</tr>");
            
            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Số lượng kệ: $soLuongKe</p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Dung lượng tối đa: $dungLuongKhoToiDa</p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Tình trạng: $tinhTrangKho </p>");
            echo("</td>");
            echo("</tr>");

            echo("<tr>");
            echo('<td colspan="2">');
            echo("<p>Danh sách hàng hóa </p>");
            echo("</td>");
            echo("</tr>");

            echo("</table>");
            echo("</div>");
            echo("</center>");
        }
    }
     
    // hiển thị chi tiết kho dưới
    function viewchitietkhoduoi($makho){
        $p = new ControllerSanPham();
        $tblSP = $p -> getchitietkho($makho);
        $tblSP2 = $p -> getchitietkho2($makho);
        if(!$tblSP){
            $row = mysql_fetch_array($tblSP2);

			// Lấy thông tin từ dữ liệu
			while ($row=mysql_fetch_array($tblSP2))
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
        }elseif($tblSP==0){
                echo("0 result");

        }else{
            
            while ($row=mysql_fetch_array($tblSP))
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
     
    
    }
   
  
}
       
?>

            

