

<!DOCTYPE html>
<html lang="en">
<head>
<title></title>

    <meta http-equiv="Content-Language" content="vi">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../js/qlk.js"></script>
    <style>
    #nut {
        padding: 5px;
        margin: 5px;
        float: right;
    }
    body {
    font-family: 'Arial', sans-serif;
    }   
    .error-message {
        color: red;
        font-size: 16px;
    }
    </style> 
    <script>
        function kiemTraNhapLieu() {
    //  Lấy giá trị các trường input
            
            var tenThanhPham = document.getElementById('tennguyenvatlieu').value;
            var donvitinh = document.getElementById('donvitinh').value;
            var ke = document.getElementById('maKe').value;
            var ngaySX = document.getElementById('nsx').valueAsDate;
            var ngayHH = document.getElementById('nhh').valueAsDate;
           

            // Lấy phần tử span để hiển thị thông báo lỗi
            
            var errorTenThanhPham = document.getElementById('error-tenthanhpham');
            var errorMaKe = document.getElementById('error-maKe');
            var errorDonViTinh = document.getElementById('error-donvitinh');
            var errorNsx = document.getElementById('error-nsx');
            var errorNhh = document.getElementById('error-nhh');
            var errorAnh = document.getElementById('error-anh');
            var errorMessage = document.getElementById('error-message');

          

            if (tenThanhPham === '') {
                errorTenThanhPham.innerHTML = 'Vui lòng nhập tên thành phẩm.';
            } else {
                // Kiểm tra tên thành phẩm gồm chữ hoặc số và bắt đầu bằng chữ cái inhoa
                if (!/^[A-Za-z][a-zA-ZÀ-ỹ0-9\s]+$/.test(tenThanhPham)) {
                    errorTenThanhPham.innerHTML = 'Tên thành phẩm gồm chữ và số bắt đầu bằng chữ cái.';
                } else {
                    errorTenThanhPham.innerHTML = '';
                }
            }

            if (ke === '') {
                errorMaKe.innerHTML = 'Vui lòng chọn mã kệ.';
            } else {
                errorMaKe.innerHTML = '';
            }

            if (donvitinh === '') {
                errorDonViTinh.innerHTML = 'Vui lòng nhập đơn vị tính.';
            } else {
                // Kiểm tra đơn vị tính gồm chữ hoặc số
                if (!/^[a-zA-ZÀ-ỹ0-9\s]+$/.test(donvitinh)) {
                    errorDonViTinh.innerHTML = 'Đơn vị tính gồm chữ hoặc số.';
                } else {
                    errorDonViTinh.innerHTML = '';
                }
            }

            if (ngaySX === ''|| ngaySX ===null) {
                errorNsx.innerHTML = 'Vui lòng chọn ngày sản xuất.';
            } else {
                // Kiểm tra ngày sản xuất phải trước ngày hiện tại
                var currentDate = new Date();
                if (ngaySX >= currentDate) {
                    errorNsx.innerHTML = 'Ngày sản xuất phải trước ngày hiện tại.';
                } else {
                    errorNsx.innerHTML = '';
                }
            }

            if (ngayHH === ''||ngayHH ===null) {
                errorNhh.innerHTML = 'Vui lòng chọn ngày hết hạn.';
            } else {
                // Kiểm tra ngày hết hạn phải sau ngày sản xuất
                if (ngayHH <= ngaySX) {
                    errorNhh.innerHTML = 'Ngày hết hạn phải sau ngày sản xuất.';
                } else {
                    errorNhh.innerHTML = '';
                }
            }

            // Kiểm tra ngày sản xuất và hết hạn
            if (ngayHH <= ngaySX) {
                errorNhh.innerHTML = 'Ngày hết hạn phải sau ngày sản xuất.';
            } else {
                errorNhh.innerHTML = '';
            }

            // Nếu có bất kỳ thông báo lỗi nào, trả về false để ngăn chặn form gửi đi
            if (
                errorTenThanhPham.innerHTML ||
                errorMaKe.innerHTML ||
                errorDonViTinh.innerHTML ||
                errorNsx.innerHTML ||
                errorNhh.innerHTML 
            ) {
                return false;
            }

            // Nếu không có lỗi, trả về true để cho form gửi đi
            return true;
}

            // // Sử dụng Fetch API để kiểm tra mã
            // fetch('view/kiem-tra-ma.php?matp=' + matp)
            //     .then(response => response.text())
            //     .then(data => {
            //         // Kiểm tra kết quả từ server và hiển thị thông báo lỗi nếu cần
            //         var errorMatp = document.getElementById('error-matp');
            //         if (errorMatp !== null) {
            //             errorMatp.innerHTML = data.trim();
            //         }
            //         // Nếu không có lỗi, submit form
            //         if (data.trim() === '') {
            //             document.getElementById('form-them-tp').submit();
            //         }
            //     })
            //     .catch(error => {
            //         console.error('Lỗi kiểm tra mã thành phẩm:', error);
            //     });

            
        
    </script>

</head>
<body>
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-3">
                
            </div>
            <div class="col-6">
                <div>
                    <h3 style="text-align: center; border: 2px solid; border-radius: 10px; padding: 10px; margin: 20px ">
                        Cập nhật nguyên vật liệu
                    </h3>
                </div>
                <div class="boloc">
                    <div id="nut" class="container-fluid">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Nhập thông tin cần cập nhập</h4>
                                </div>
                                <div id="form-them-tp" class="modal-body" style="font-size: 15px;" >
                                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return kiemTraNhapLieu()">
                                        <?php
                                        include_once('controller/controller_qlnvl.php');
                                        $p= new controlerNvl();
                                        $ups = $_GET['updatenvl'];
                                        if(isset($_GET['updatenvl'])){
                                            $hien= $p->selectNvlById($ups);
                                            if($hien){
                                                if(mysqli_num_rows($hien)){
                                                    while($row= mysqli_fetch_assoc($hien)){?>
                                                        <div class="form-group">
                                                            <label for="tennguyenvatlieu">Tên nguyên vật liệu: </label>
                                                            <input type="text" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" value="<?php echo $row['tenNguyenVatLieu'];?>" name="tennguyenvatlieu" id="tennguyenvatlieu"
                                                                placeholder="Nhập tên nguyên vật liệu">
                                                            <span id="error-tenthanhpham" style="color: red;"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="donvitinh">Đơn vị tính: </label>
                                                            <input type="text" class="form-control" onblur="return kiemTraNhapLieu()" value="<?php echo $row['donViTinh']; ?>"style="font-size: 15px;" name="donvitinh" id="donvitinh"
                                                            >
                                                            <span id="error-donvitinh" style="color: red;"></span>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                                        <div class="form-group">
                                                            <label for="maKe">Chọn mã kệ: </label>
                                                            <select class="form-control" name="maKe" id="maKe" style="font-size: 15px;">
                                                            <?php
                                                                // Hiển thị danh sách mã kệ từ cơ sở dữ liệu
                                                                include_once("controller/controller_qlnvl.php");
                                                                $p = new controlerNvl();
                                                                $p->getMaKe();
                                                                $hien = $p->getMaKe();
                                                                while ($row = mysqli_fetch_assoc($hien)) {
                                                                    $maKe = $row['maKe'];
                                                                    $tenKe = $row['tenKe'];

                                                                    // Kiểm tra xem giá trị đã được sử dụng chưa
                                                                    if (!in_array($maKe, $selectedValues)) {
                                                                        echo "<option value='$maKe'>$tenKe</option>";

                                                                        // Thêm giá trị vào mảng đã sử dụng
                                                                        $selectedValues[] = $maKe;
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <span id="error-maKe" style="color: red;"></span>
                                                        </div>
                                                        <?php
                                                        include_once('controller/controller_qlnvl.php');
                                                        $p= new controlerNvl();
                                                        $ups = $_GET['updatenvl'];
                                                        if(isset($_GET['updatenvl'])){
                                                            $hien= $p->selectLoNVLById($ups);
                                                            if($hien){
                                                                if(mysqli_num_rows($hien)){
                                                                    while($row= mysqli_fetch_assoc($hien)){?>                
                                                                        <div class="form-group">
                                                                            <label for="nsx">Chọn ngày sản xuất: </label>
                                                                            <input type="date" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" value="<?php echo $row['NSX']; ?>" name="nsx" id="nsx">
                                                                            <span id="error-nsx" style="color: red;"></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nhh">Chọn ngày hết hạn: </label>
                                                                            <input type="date" class="form-control" onblur="return kiemTraNhapLieu()" value="<?php echo $row['NHH']; ?>" style="font-size: 15px;" name="nhh" id="nhh">
                                                                            <span id="error-nhh" style="color: red;"></span>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                                            
                                                        <div class="form-group">
                                                            <label for="anh">Chọn ảnh </label>
                                                            <input type="file" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 13px; height: 30px;" name="anh" id="anh"
                                                                placeholder="Ảnh:" accept=".jpg, .jpeg, .png">
                                                            <span id="error-anh" style="color: red;"></span>
                                                        </div>
                                                        <!-- Phần tử span để hiển thị thông báo lỗi chung -->
                                                        <span id="error-message" style="color: red;"></span>

                                                        <div class="form-group">
                                                            <a href="index1.php?qldsnvl" style="width: 25%; margin: 5px;font-size: 20px;"  class="btn btn-danger">Hủy</a>           
                                                            <button id="nut" class="btn btn-success" type="submit" name="update" style="width: 25%; margin: 5px;font-size: 20px;">Cập nhật</button>
                                                        </div>
                                                
                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                
            </div>
            
            <?php
                if (isset($_POST['update'])) {
                    include_once('controller/controller_qlnvl.php');
                    $p = new controlerNvl();
                    $up = $_GET['updatenvl'];
                    $result = $p->updateNvl($up);
                }
                ?>
            <div class="col-3">

            </div>
         </div>
    </div>
</body>
</html>