<?php
include("KetNoi.php");
$p = new GiamDoc();

if(isset($_REQUEST['btnsubmit'])&&!isset($_SESSION['form_submitted'])){
    $tenKH = mysql_real_escape_string($_REQUEST['tenKH']);
    $startDate = mysql_real_escape_string($_REQUEST['startDate']);
    $endDate = mysql_real_escape_string($_REQUEST['endDate']);
    $ngayHienTai = date("Y-m-d"); 
    $MaKH = $p->incrementMaKH();
    $kehoach=$p->InsertUpdate("INSERT INTO kehoachsx (maKeHoachSX, ngayBatDau, ngayKetThuc, ngayLap, tenKeHoachSX,tinhTrang) VALUES
    ('$MaKH', '$startDate', '$endDate', '$ngayHienTai', '$tenKH',2)");
    $manguyenvatlieu = $_POST['manguyenvatlieu'];
    $soluongnvl = $_POST['soluongnvl'];
    $dvtnvl = $_POST['dvtnvl'];
    $mathanhpham = $_POST['mathanhpham'];
    $dvtTP = $_POST['dvtTP'];
    $soLuongtp = $_POST['soLuongtp'];
for ($i = 0; $i < count($manguyenvatlieu); $i++) {

    $currentMaNguyenVatLieu = $manguyenvatlieu[$i];
    $currentdvtNVL = $dvtnvl[$i];
    $currentMaCTKHSXNVL = $p->incrementMaCTKHSXNVL();
    if( $p->InsertUpdate("INSERT INTO ctkhsxnvl (maCTKHSXNVL, maKHSX, maNguyenVatLieu, soluongnvl, dvtNVL) VALUES
    ('$currentMaCTKHSXNVL', '$MaKH', '$currentMaNguyenVatLieu', '$soluongnvl', '$currentdvtNVL')"))
    {
    if ($p->kiemTraTonKho($currentMaNguyenVatLieu, $soluongnvl)) {
    $soLuongMoi=$p->getsoLuongDonMua($currentMaNguyenVatLieu);
    $soLuongDonMua=$soLuongMoi+$soluongnvl;
 
    $p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongDonMua = '$soLuongDonMua' WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'");
    }
         else
      {
    $soLuongMoi=$p->getsoLuongDonMua($currentMaNguyenVatLieu);
    $soLuongTon=$p->getsoLuongTon($currentMaNguyenVatLieu);
    $soLuongDonMua=$soLuongMoi+$soluongnvl;
    $soluongCTDMnvl=$soluongnvl-$soLuongTon;
    $p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongDonMua = '$soLuongDonMua' WHERE maNguyenVatLieu = '$currentMaNguyenVatLieu'");
             $maDonMuaNVL = $p->incrementMaDonMuaNVL();
             $tenDonMuaNVL = $p->incrementTenDonMuaNVL();

             $p->InsertUpdate("INSERT INTO donmuanvl (madonmuanvl, tenDonMuaNVL, ngayLap,maKeHoachSX,tinhTrang)
            VALUES ('$maDonMuaNVL', '$tenDonMuaNVL', '$ngayHienTai', '$MaKH',2)");
 
    $maCTDonMuaNVL = $p->incrementCTMaDonMuaNVL();
    
    $p->InsertUpdate("INSERT INTO  ctdmnvl (maCTDMNVL, maNguyenVatLieu, soLuong,madonmuanvl)
        VALUES ('$maCTDonMuaNVL', '$currentMaNguyenVatLieu', '$soluongCTDMnvl','$maDonMuaNVL')");
     echo '<script>alert("Lập thêm 1 đơn mua mới thành công")</script>';
     $_SESSION['form_submitted'] = true;
      }
    }
    else
      {
        echo '<script>alert("ctkhsxnvl")</script>';
      }  
   

}
   for ($i = 0; $i < count($mathanhpham); $i++) {
      $currentMaThanhPham = $mathanhpham[$i];
      $currentdvtTP = $dvtTP[$i];
      $currentMaCTKHSX = $p->incrementMaCTKHSX();    
      $p->InsertUpdate("INSERT INTO ctkhsx (maCTKHSXTP, maKHSX, mathanhpham, soLuongtp, dvtTP) VALUES
      ('$currentMaCTKHSX', '$MaKH', '$currentMaThanhPham', '$soLuongtp', '$currentdvtTP')");
   
   }
   echo '<script>alert("Lập kế hoạch sản xuất thành công")</script>';
    echo header("refresh:0;url='KeHoachSX.php'");
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/ThemKeHoachSX.css">
    <title> Thêm kế hoạch sản xuất</title>
    <style>
    .btn-reset {
    background-color: #233d5a;
    padding: 10px;
    margin-right: 20px;
    color: white;
    text-decoration: none;
    font-size:0.6em;
}

.btn-submit {
    background-color: #39a867;
    padding: 10px;
    color: white;
    
}
    </style>
     <script>
        
  function addRow(tableId) {
    var table = document.getElementById(tableId);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    // Thêm một số để theo dõi nguyên vật liệu đã chọn
    var lastRowIndex = rowCount - 1;
    var lastRow = table.rows[lastRowIndex];

    for (var i = 0; i < lastRow.cells.length; i++) {
        var cell = row.insertCell(i);
        var element = document.createElement("input");
        element.type = "text";
        element.name = tableId + rowCount + "_" + i;
        cell.appendChild(element);
        // Chỉ áp dụng cho cột đầu tiên (có thể thay đổi tùy theo cấu trúc HTML)
        if (i === 0) {
            var selectClone = lastRow.cells[i].querySelector('select').cloneNode(true);
            cell.replaceChild(selectClone, cell.childNodes[0]);

            // Thêm sự kiện onchange cho select mới
            selectClone.onchange = function () {
                updateUnit(selectClone);
            };
        } else if (i === 2) { // Cột thứ 3 là cột hiển thị đơn vị tính
            // Sao chép và cập nhật đơn vị tính
            var unitClone = lastRow.cells[i].querySelector('span.unit').cloneNode(true);
            cell.replaceChild(unitClone, cell.childNodes[0]);
        }
    }
}
        function updateUnit(element) {
            var selectedOption = element.options[element.selectedIndex];
            var unitField = element.parentNode.nextElementSibling.nextElementSibling.querySelector('span.unit');

            if (selectedOption.dataset.unit) {
                unitField.innerText = selectedOption.dataset.unit;
            } else {
                unitField.innerText = ''; // hoặc hiển thị một giá trị mặc định khác
            }
             updateAllUnits('nguyenVatLieuTable');
    updateAllUnits('thanhPhamTable');
        }
function validateForm() {
        var startDateInput = document.getElementById("startDate");
        var endDateInput = document.getElementById("endDate");
        var tenKehoachInput = document.getElementsByName("tenKH")[0];
    var soLuongThanhPhamInput = document.querySelector("input[name='soLuongtp']");
    var soLuongNguyenVatLieuInput = document.querySelector("input[name='soluongnvl']");

        // Kiểm tra xem giá trị ngày có hợp lệ không
        if (!isValidDate(startDateInput.value) || !isValidDate(endDateInput.value)) {
            alert("Ngày không hợp lệ.");
            return false;
        }

        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);
        var currentDate = new Date();

        if (startDate >= endDate) {
            alert("Ngày bắt đầu phải trước ngày kết thúc.");
            return false;
        }
        
        if (startDate <= currentDate) {
            alert("Ngày bắt đầu phải là ngày trong tương lai.");
            return false;
        }

        // Kiểm tra xem tên kế hoạch có được nhập hay không
        if (tenKehoachInput.value.trim() === "") {
            alert("Tên kế hoạch không được để trống.");
            return false;
        }

       var tennvlInput = document.querySelector("select[name='manguyenvatlieu[]']");
    if (tennvlInput.value.trim() === "" || tennvlInput.value.trim() === "Chọn nguyên vật liệu") {
        alert("Vui lòng chọn tên nguyên vật liệu.");
        return false;
    }

    // Kiểm tra xem tên TP có được chọn hay không
    var tetpInput = document.querySelector("select[name='mathanhpham[]']");
    if (tetpInput.value.trim() === "" || tetpInput.value.trim() === "Chọn thành phẩm") {
        alert("Vui lòng chọn tên thành phẩm.");
        return false;
    }
    var soLuongNguyenVatLieu = parseFloat(soLuongNguyenVatLieuInput.value);
    if (isNaN(soLuongNguyenVatLieu) || soLuongNguyenVatLieu <= 0) {
        alert("Số lượng nguyên vật liệu không được để trống.");
        return false;
    }    var soLuongThanhPham = parseFloat(soLuongThanhPhamInput.value);
    if (isNaN(soLuongThanhPham) || soLuongThanhPham <= 0) {
        alert("Số lượng thành phẩm không được để trống.");
        return false;
    }


    // Kiểm tra xem số lượng thành phẩm có được nhập hay không
    if (soLuongThanhPhamInput.value.trim() === "") {
        alert("Số lượng thành phẩm không được để trống.");
        return false;
    }

    // Kiểm tra xem tên nguyên vật liệu có được nhập hay không
    if (tenNguyenVatLieuInput.value.trim() === "") {
        alert("Tên nguyên vật liệu không được để trống.");
        return false;
    }

        return true;
    }

    // Hàm kiểm tra xem giá trị ngày có hợp lệ không
    function isValidDate(dateString) {
        var regex = /^\d{4}-\d{2}-\d{2}$/;
        return regex.test(dateString);
    }

    </script>
    <style>
            label[for="tenKH"].required::before,label[for="endDate"].required::before,
        label[for="startDate"].required::before {
            content: "* ";
            color: red;
        }
        label.required::before {
            content: "* ";
            color: red;
        }
        .required::before {
            content: "* ";
            color: red;
        }
    </style>
</head>
<body>
    <header>
         <?php
            include("header.php");
        ?>
    </header>
    <section>
        <h1>THÊM KẾ HOẠCH SẢN XUẤT</h1> <br>
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

            <div class="noidung">
                <label for="MaKH">Mã kế hoạch:</label>
                <input type="text" name="MaKH"readonly value="<?php echo    $p->incrementMaKH(); ?>"> <br>
                <label for="endDate"class="required">Tên kế hoạch:</label>
                <input type="text" name="tenKH" >
                <label for="ngayHienTai">Ngày lập:</label>
                <input type="date" name="ngayHienTai" readonly value="<?php echo date("Y-m-d"); ?>">
                <label for="startDate" class="required">Ngày bắt đầu:</label>
<input type="date" name="startDate" id="startDate" required oninvalid="this.setCustomValidity('Ngày bắt đầu không được để trống.')" oninput="setCustomValidity('')">

                <label for="endDate"class="required">Ngày kết thúc:</label>
                <input type="date" name="endDate" id="endDate"required oninvalid="this.setCustomValidity('Ngày kết thúc không được để trống.')" oninput="setCustomValidity('')">
            </div>
            
            <div class="listproduct"><br>
                <h1>DANH SÁCH THÀNH PHẨM</h1>
                <table id="thanhPhamTable">
                    <thead>
                        <tr>
                            <th class="required">Tên thành phẩm</th>
                            <th class="required">Số lượng</th>
                            <th>Đơn vị tính</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <select name="mathanhpham[]" onchange="updateUnit(this)">
                            <option>Chọn thành phẩm</option>
                            <?php $p->load_ThanhPhamOptions(); ?>
                            </select>
                        </td>
                        <td><input type="number" name="soLuongtp" min="0"/></td>
                        <td><span class="unit" name="dvtTP"></span></td>
                    </tr>
          
                    </tbody>
                </table>
                <button type="button" onclick="addRow('thanhPhamTable')">Thêm Thành Phẩm</button>
            </div>
            <div class="listproduct"><br>
                <h1>DANH SÁCH NGUYÊN VẬT LIỆU CẦN ĐỂ SẢN XUẤT</h1>
                <table id="nguyenVatLieuTable">
                    <thead>
                        <tr>
                            <th class="required">Tên nguyên vật liệu</th>
                            <th class="required">Số lượng</th>
                            <th>Đơn vị tính</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                            <td>
                                <select name="manguyenvatlieu[]" onchange="updateUnit(this)">
                                    <option>Chọn nguyên vật liệu</option>
                                    <?php $p->load_NguyenVatLieuOptions(); ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="soluongnvl" min="0"/>
                            </td>
                            <td>
                                <span class="unit" name="dvtnvl[]"></span>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                <button type="button" onclick="addRow('nguyenVatLieuTable')">Thêm Nguyên Vật Liệu</button>
            </div>
            <div class="btn">
                <a href="KeHoachSX.php" class="btn-reset">Quay lại</a>
                 
                <input type="submit" name="btnsubmit" value="Lập Phiếu" class="btn-submit">
            </div>
        </form>
    </section>
    

    <?php
        include("footer.php");
        
?>

</body>

</html>