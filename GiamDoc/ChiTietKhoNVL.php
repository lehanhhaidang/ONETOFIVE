<?php
include("KetNoi.php");
$p = new GiamDoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/cssNVK.css">
    <script>


      </script>
    <title>Document</title>
</head>
<style>
    section{
        padding-top: 150px;
         margin-left: 50px;
        margin-right: 50px;
        }
    h2 {
    float: left;
    width: 100%;
    text-align: right;
    padding: 0 10% 20px 0;
}
    </style>
<body> 
    <?php
        include("header.php");
    ?>
   <section>
  		<?php
	   if (isset($_REQUEST['maKho']))
			{
				$makho = $_REQUEST['maKho'];
			}
				$p -> xuatchitietkho("select * from kho where maKho = '$makho'");
			
			?>
        <div class="listproduct">
            <table>
                <thead>
                    <tr>
                        <th>Tên kệ</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Hạn sử dụng</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					   if (isset($_REQUEST['makho']))
							{
								$makho = $_REQUEST['makho'];
							}
							 $p->xuatLoKhoNVL("SELECT *
									   FROM kho
									   INNER JOIN ke ON kho.maKho = ke.maKho
									   INNER JOIN longuyenvatlieu ON ke.maKe = longuyenvatlieu.maKe
									   INNER JOIN nguyenvatlieu ON longuyenvatlieu.maNguyenVatLieu = nguyenvatlieu.maNguyenVatLieu
									   WHERE kho.maKho = '$makho'  AND longuyenvatlieu.maPXNVL IS NULL");


					?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="back" >
		<a id="goBackButton">
               <button>Quay lại</button>
        </a>
    </div>
		<script>
    document.getElementById('goBackButton').setAttribute('href', 'javascript:history.go(-1)');
</script>
   </section>
   <?php
        include("footer.php");
    ?>
</body>
</html>
   
