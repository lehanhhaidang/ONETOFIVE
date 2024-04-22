<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/ThemKeHoachSX.css">
    <title> Thêm đơn mua nguyên vật liệu</title>
</head>
<body> 
    <header>
        <?php
            include("header.php");
        ?>
    </header>
    <section>
        <h1>PHIẾU YÊU CẦU NHẬP THÀNH PHẨM</h1> <br>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="noidung">
                <label for="maXuatNVL">Mã phiếu:</label>
                <input type="text" name="tenXuatNVL" id="tenXuatNVL">
                
                <label for="txtTenKH">Tên khách hàng/ phân xưởng:</label>
                <input type="text" name="txtTenKH" id="txtTenKH">
                
                <label for="dateYC">Ngày yêu cầu:</label>
                <input type="date" name="dateYC" id="dateYC"><br>
                
                <label for="dateDuyet">Ngày duyệt:</label>
                <input type="date" name="dateDuyet" id="dateDuyet"><br>
    
            </div>
           
            <div class="listproduct">
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên nguyên vật liệu</th>
                            <th>Số lượng</th>
                            <th>Đơn vị tính</th>    
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="txtTenSP" id="txtTenNVL"></td>
                            <td><input type="number" name="txtSLSP" id="txtSLNVL"></td>
                            <td><input type="text" name="txtTenSP" id="txtDVT"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input type="text" name="txtTenSP" id="txtTenNVL"></td>
                            <td><input type="number" name="txtSLSP" id="txtSLSP"></td>
                            <td><input type="text" name="txtTenSP" id="txtDVT"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input type="text" name="txtTenSP" id="txtTenNVL"></td>
                            <td><input type="number" name="txtSLSP" id="txtSLNVL"></td>
                            <td><input type="text" name="txtTenSP" id="txtDVT"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input type="text" name="txtTenSP" id="txtTenNVL"></td>
                            <td><input type="number" name="txtSLSP" id="txtSLNVL"></td>
                            <td><input type="text" name="txtTenSP" id="txtDVT"></td>
                        </tr>
                        
                       
                    
                </tbody>
            </table>
        </div>
        <div class="btn">
            <input type="reset" value="Hủy">
            <input type="submit" name="btnsubmit" value="Lập Phiếu">
        </div>
        </form>
    </section>
  <?php
        include("footer.php");
        
?>

</body>
</html>
   
