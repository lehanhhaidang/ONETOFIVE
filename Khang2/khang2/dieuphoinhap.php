<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/Trangchu.css">
   
    <title>Trang chủ</title>
    <style>
         #sec{
            height: 500px;
        }
         
    .tb{
    background-color: #9ea1ae;
    border-radius: 40px;
    height: 40px;
    
    
}
.tb a{
    text-decoration: none;
    color: #000;
    
}
.vertical-menu {
    list-style-type: none; /* Loại bỏ dấu chấm trước mục */
    padding: 0;
    width: 100%; /* Độ rộng của menu dọc */
    background-color: #ffffff; /* Màu nền của menu */
    
   
    min-height: max-content;
    height: auto;
  
}

.vertical-menu li {
    text-align: center; /* Căn giữa nội dung mỗi mục */
    padding: 10px 0; /* Khoảng cách giữa các mục */
    
}

.vertical-menu li a {
    color: #0c0808; /* Màu chữ cho các mục */
    text-decoration: none; /* Loại bỏ gạch chân cho liên kết */
    display: block; /* Để mục menu chiếm toàn bộ chiều rộng của menu */
    
}

.vertical-menu li:hover {
    background-color: #bfbbbb; /* Màu nền khi di chuột qua mục menu */
}


.dieuphoi-left{
   
    height: auto;
    position: relative;
    border-right: 2px solid;
    width: 20%;
    
    margin-left: 40px;
    float: left;
}
.dieuphoi-right{
    width: 70%;
    height: auto;
    float: left;
   margin-left: 2%;

}

.dieuphoi-right table{
min-width: max-content;
min-width: 100%;
height: 300px;
margin-left: 5%;


}


.ultop{
    height: auto;
    float: left;
    min-width: max-content;
    width: 100%;
    
}
.ulbottom{
    height: auto;
   float: left;
   min-width: max-content;
    width: 100%;
}
.bntsubmit input{
        background-color: #466281;
        height: 50px;
        width: 110px; 
        color: white;
        
    }
    .bntsubmit div{
        background-color: #466281;
        height: 50px;
        width: 110px; 
        color: white;
        text-align:center;
        
    }
    </style>
</head>

<body> 
    <header>
        <div id="header">  
            <div class="nav-container">
                <ul class="nav collapse" id="myNav">
                <li><a href="dieuphoi.php">Điều phối</a></li>
                    <li><a href="thongtinkho.php">Thông tin kho</a></li>
                    <li><a href="donhang.php">Đơn hàng</a></li>
                    <li><a href="index1.php?viewkhotp">Danh sách thành phẩm</a></li>
                    <li><a href="index1.php?viewkhonvl">Danh sách nguyên vật liệu</a></li>
                    
                    
                  </ul>
            </div>  
            <div class="logo">
                <a href="index.php"><img src="./image/logo.png" class="logo-img"></a>
            </div>
            <div class="icon">
                <div class="user-icon ">
                    <a href=""><i class="fa-solid fa-user" ></i></a>
                </div>
            </div>
            <div class="search">
                <form action="">
                  <input type="text" placeholder="Tìm kiếm.." name="search" class="search-btn">
                  <i class="fa fa-search"></i>
                </form>
            </div>
        </div>
    </header>
    <section id="sec">
        <br> <center><h2>ĐIỀU PHỐI NHẬP</h2></center><br>
      
        <div class="dieuphoi-left">
            <div class="ultop">
                
                    <?php
                        include("view/vsanpham.php");
                        $p = new ViewSanPham();
                        $p -> viewALLdonmuanvl();
                    ?>
                    
                
            </div>
                    
            <div class="ulbottom">
            <?php
                       
                        $p -> viewALLphieuycntp();
                    ?>
            </div>
           
        </div>

        <form action="#" method="POST">
        <div class="dieuphoi-right">
                
                <?php 
              //  $randomNumber = mt_rand(19, 230);
                $result = 'BMN'.mt_rand(19, 230);
                 if(isset($_REQUEST["maDonMuaNVL"]) ){
                    echo ' <br>
                    <h3>Danh sách nhập  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
                             &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
                              &nbsp &nbsp &nbsp&nbsp &nbsp Mã Đơn Mua NVL: '. $_REQUEST["maDonMuaNVL"].'
                             &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
                              &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp Mã biểu mẫu: '.$result.'
                              </h3><br><br> <br>';
                    
                     }if(isset($_REQUEST["maPhieuYCNTP"]) )
                     {
                        echo ' <br>
                        <h3>Danh sách nhập  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
                                 &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
                                  &nbsp &nbsp &nbsp&nbsp &nbsp Mã Phiếu:  '. $_REQUEST["maPhieuYCNTP"].'
                                  &nbsp &nbsp&nbsp &nbsp
                                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp Mã biểu mẫu:  '.$result.'
                                  </h3><br> <br> ';
                        
                         }
               
                  //       viewAllDieuPhoiChiTietDonMuaNVL($maDonMuaNVL)
             if(isset($_REQUEST["maDonMuaNVL"]) ){
            $p -> viewAllDieuPhoiChiTietDonMuaNVL($_REQUEST["maDonMuaNVL"]);
            
             }if(isset($_REQUEST["maPhieuYCNTP"]) ){
                $p -> viewAllDieuPhoiChiTietPhieuYCNTP($_REQUEST["maPhieuYCNTP"]);
             }
            

             if(isset($_REQUEST["btnsubmit"])){
                $trangthai='Đã lập phiếu';
                $ngayHienTai = date('Y-m-d');
                $loainhap = $_REQUEST["loainhap"];
                $ngaynhap = $_REQUEST["ngaynhap"];
                $makho =$_REQUEST["makho"];
                $tennguoigiao  =$_REQUEST["tenNCC"];
               // echo"$mabieumau, $makho, $tennguoinhan,$ngayxuat, $loaixuat, $trangthai";   
               if($ngaynhap < $ngayHienTai){
                echo"<script> alert('Ngày nhập phải >= ngày hiện tại') </script>";
            }else{
                $p = new ControllerSanPham();
                $kq = $p -> adddieuphoinhap($result, $makho, $tennguoigiao,$ngaynhap, $loainhap, $trangthai);
                
                if($kq){
                    // echo"<script> alert('Điều phối thành công') </script>";
                    //      echo '<script language="javascript">
					// 						window.location="dieuphoinhap.php";
					// 						</script>';
                    if(isset($_REQUEST["maDonMuaNVL"]) ){
                        $p ->  cupdateAllDonMuaNVL($_REQUEST["maDonMuaNVL"]);
                        
                         }if(isset($_REQUEST["maPhieuYCNTP"]) ){
                            $p -> cupdateAllPhieuYCNTP($_REQUEST["maPhieuYCNTP"]);
                         }
                         echo"<script> alert('Điều phối thành công') </script>";
                         echo '<script language="javascript">
											window.location="dieuphoinhap.php";
											</script>';
                }else{
                    echo"<script> alert('Điều phối không thành công') </script>";
                    
                }
            } 
               
               
             }
         ?>
                  
         </div></form>
    </section>
   <footer id="footer">
    <div class="policy">
        <h5 class="policy-title">CHÍNH SÁCH</h5>
        <div class="policy-information">
            <a href="" >Chính sách bảo mật</a><br>
            <a href="">Chính sách vận chuyển</a><br>
            <a href="">Chính sách bảo hành</a><br>
            <a href="">Điều khoản chung</a>
        </div>
    </div>
    <div class="contact">
        <h5 class="policy-title">VỀ CHÚNG TÔI</h5>
        <div class="policy-information">
            <a href="" >Câu chuyện thương hiệu</a><br>
            <a href="">Tầm nhìn và giá trị cốt lõi</a><br>
            <a href="">Lịch sửa phát triển</a><br>
            <a href="">Mạng lưới và quy mô</a>
        </div>
    </div>
    <div class="CustomerCare">
        <h5 class="CustomerCare-title" >THÔNG TIN LIÊN HỆ</h5>
        <div class="contact-information">
            <P>CÔNG TY TNHH ONETOFIVE</P> 
            <p>Onetofive.vn</p> 
                <p>Địa chỉ:Nguyễn văn Bảo, Phường 4, Gò Vấp</p>
            <p>Hotline:033xxxxxxx</p>
        </div>
        <h5 class="Community-title">CỘNG ĐỒNG</h5>
        <a href="" class="Community-icon"><i class="fa-brands fa-facebook"></i></a>
        <a href="" class="Community-icon"><i class="fa-brands fa-square-instagram"></i></a>
        <a href="" class="Community-icon"><i class="fa-brands fa-youtube"></i></a>
        <a href="" class="Community-icon"><i class="fa-brands fa-tiktok"></i></a>
    </div>
</footer>

</body>
</html>
   
