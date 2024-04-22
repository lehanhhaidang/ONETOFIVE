
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
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
        input[type="text"] {
            width: 200px;
            box-sizing: border-box;
            border: 1px solid black;
            border-radius: 5px;
            outline:none;
            padding: 7px 5px;
            transition:0.6s ease-in-out;
    }
        a:hover{
            color: red;
            text-decoration: none;
        } 
        button {
            background-color: transparent; /* Đặt màu nền là trong suốt */
            border: none; /* Loại bỏ đường viền */
            color: blue; /* Đặt màu chữ */
            cursor: pointer; /* Biến đổi con trỏ khi đưa vào nút */
            padding: 0; /* Loại bỏ padding mặc định của nút */
            font-size: inherit; /* Kích thước chữ sử dụng giá trị kích thước thừa kế */
    
        }
        /* Hover effect */
        button:hover {
            color: red; /* Màu chữ khi đưa vào */
        }
        
    </style>
   <script>
       function kiemTraNhapLieu() {
    // Lấy giá trị các trường input
            
            var tenNguyenVatLieu = document.getElementById('tennguyenvatlieu').value;
            var donvitinh = document.getElementById('donvitinh').value;
            var ke = document.getElementById('maKe').value;
            var ngaySX = document.getElementById('nsx').valueAsDate;
            var ngayHH = document.getElementById('nhh').valueAsDate;
           

            // Lấy phần tử span để hiển thị thông báo lỗi
            
            var errorNguyenVatLieu = document.getElementById('error-nguyenvatlieu');
            var errorMaKe = document.getElementById('error-maKe');
            var errorDonViTinh = document.getElementById('error-donvitinh');
            var errorNsx = document.getElementById('error-nsx');
            var errorNhh = document.getElementById('error-nhh');
            var errorAnh = document.getElementById('error-anh');
            var errorMessage = document.getElementById('error-message');

          

            if (tenNguyenVatLieu === '') {
                errorTenThanhPham.innerHTML = 'Vui lòng nhập tên nguyên vật liệu.';
            } else {
                // Kiểm tra tên thành phẩm gồm chữ hoặc số và bắt đầu bằng chữ cái inhoa
                if (!/^[A-Za-z][a-zA-ZÀ-ỹ0-9\s]+$/u.test(tenNguyenVatLieu)) {
                    errorNguyenVatLieu.innerHTML = 'Tên nguyên vật liệu gồm chữ và số bắt đầu bằng chữ in hoa.';
                } else {
                    errorNguyenVatLieu.innerHTML = '';
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
                if (!/^[a-zA-ZÀ-ỹ0-9]+$/.test(donvitinh)) {
                    errorDonViTinh.innerHTML = 'Đơn vị tính gồm chữ hoặc số.';
                } else {
                    errorDonViTinh.innerHTML = '';
                }
            }

            if (ngaySX === ''||ngaySX ===null) {
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
                errorNguyenVatLieu.innerHTML ||
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
    <div class="container-fluid " style="margin-top: 120px; font-size: 16px;">
        <div class="row" id="body">
            <div class="container-fluid">
                <h3 style="text-align: center; font-size:30px">QUẢN LÝ DANH SÁCH NGUYÊN VẬT LIỆU</h3><br>
                <div class="container">
                    <div class="boloc">
                        <div id="nut" class="container-fluid">
                            <!-- Button popup tp -->

                            <button type="button" style="font-size: 20px;" class="btn btn-primary" data-toggle="modal" data-target="#popuptp">
                                Thêm nguyên vật liệu
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="popuptp" tabindex="-1" role="dialog" aria-labelledby="kaiz" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="text-align: center; font-size: 20px;" id="kaiz">Nhập thông tin nguyên vật liệu cần thêm</h5>
    
                                        </div>
                                        <div id="form-them-tp" class="modal-body" style="font-size: 15px;" >
                                            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return kiemTraNhapLieu()">
                                                
                                                <div class="form-group">
                                                    <label for="tennguyenvatlieu">Tên nguyên vật liệu: </label>
                                                    <input type="text" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" name="tennguyenvatlieu" id="tennguyenvatlieu"
                                                        placeholder="Nhập nguyên vật liệu">
                                                    <span id="error-nguyenvatlieu" style="color: red;"></span>
                                                </div>
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
                                                <div class="form-group">
                                                    <label for="donvitinh">Đơn vị tính: </label>
                                                    <input type="text" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" name="donvitinh" id="donvitinh"
                                                        placeholder="Đơn vị tính">
                                                    <span id="error-donvitinh" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nsx">Chọn ngày sản xuất: </label>
                                                    <input type="date" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" name="nsx" id="nsx">
                                                    <span id="error-nsx" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nhh">Chọn ngày hết hạn: </label>
                                                    <input type="date" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 15px;" name="nhh" id="nhh">
                                                    <span id="error-nhh" style="color: red;"></span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="anh">Chọn ảnh </label>
                                                    <input type="file" class="form-control" onblur="return kiemTraNhapLieu()" style="font-size: 13px; height: 30px;" name="anh" id="anh"
                                                        placeholder="Ảnh:" accept=".jpg, .jpeg, .png">
                                                    <span id="error-anh" style="color: red;"></span>
                                                </div>
                                                <!-- Phần tử span để hiển thị thông báo lỗi chung -->
                                                <span id="error-message" style="color: red;"></span>

                                                <div class="modal-footer form-group">
                                                    <button type="button" name="dong" id="dong" style="font-size: 20px;" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <input type="submit" name="themnvl" id="themnvl" style="font-size: 20px;" class="btn btn-primary"
                                                        value="Thêm nguyên vật liệu">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <br>
                         <!--thêm thành phẩm-->
                         <?php
                            if (isset($_POST['themnvl'])) {
                                include_once("controller/controller_qlnvl.php");
                                $p = new controlerNvl();
                                $kq = $p->createNvl();

                            }
                            ?>
                        
            <!-------------------->
                    
                     <!-- Body -->
                    <div class="dstp">
                        <div class="container">
                            <table class="table table-bordered">
                                <h3 style="text-align: center; font-size: 20px;">Danh sách nguyên vật liệu</h3>
                                <form action="" method="REQUEST">
                                    <input  id="tim" type="text" placeholder="Tìm kiếm tài khoản..." name="tukhoa1">
                                    <input id="nut" class="btn btn-outline-dark pb-2 mb-1" style="height: 40px; border-radius:5px;font-size: 20px;"  type="submit" name="timkiem1" value="Tìm kiếm">
                                </form>
                                <thead class="bang" style="align-items: center;" >
                                    <tr>

                                        <th><center>Mã nguyên vật liệu </center> </th>
                                        <th><center>Image</center> </th>
                                        <th><center>Tên nguyên vật liệu</center></th>
                                        <th><center>Mã lô</center></th>
                                        <th><center>Tên kệ</center></th>
                                        <th><center>Đơn vị tính</center></th>
                                        <th><center>Số lượng tồn</center></th>
                                        <th><center>Ngày sản xuất</center></th>
                                        <th><center>Ngày hết hạn</center></th>
                                        <th><center>Tùy chọn 1</center></th>
                                        <th><center>Tùy chọn 2</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-----xem ------->
                                    <?php
                                        include_once("controller/controller_qlnvl.php");
                                        $p=new controlerNvl;
                                        $p->selectAllNvl();
                                        if(isset($_GET['qldsnvl']))
                                        {                            
                                            $hien = $p->selectAllNvl();
                                            if($hien){                          
                                                if(mysqli_num_rows($hien)>0){
                                                    while($cot=mysqli_fetch_assoc($hien)){?>
                                                        <tr>
                                                            <td><center><?php echo $cot['maNguyenVatLieu']; ?></center></td>
                                                            <td><center><img src="assert/image/<?php echo $cot['anh']; ?>" alt="Ảnh Thành Phẩm" style="max-width: 100px; max-height: 100px;"></center></td>
                                                            <td><center><?php echo $cot['tenNguyenVatLieu']; ?></center></td>
                                                            <td><center><?php echo $cot['maLoNVL']; ?></center></td>
                                                            <td><center><?php echo $cot['tenKe']; ?></center></td>
                                                            <td><center><?php echo $cot['donViTinh']; ?></center></td>
                                                            <td><center><?php echo $cot['soLuongTonnvl']; ?></center></td>
                                                            <td><center><?php echo $cot['NSX']; ?></center></td>
                                                            <td><center><?php echo $cot['NHH']; ?></center></td>
                                                            <td><center><button type="button" onclick="location.href='index1.php?updatenvl=<?php echo $cot['maNguyenVatLieu']; ?>';">Sửa</button></center></td>
                                                            <td><center><button type="button" onclick="location.href='index1.php?deletenvl=<?php echo $cot['maNguyenVatLieu']; ?>';">Xóa</button></center></td>
                                                        
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo "<script>alert('Không có dữ liệu')</>";
                                                }
                                            }                                                                
                                        }
                                    ?>

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>