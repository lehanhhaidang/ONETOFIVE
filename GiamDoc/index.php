<?php
    include("KetNoi.php");
    $p = new GiamDoc();
//    if(isset($_REQUEST['search'])){
//         if (isset($_REQUEST['maKho'])){
//            $makho = $_REQUEST['makho'];
//            $p->xuatchitietkho("select * from kho where maKho = '$makho'"); 
//            if ($result) {
//                header("Location: ChiTietKhoTP.php?maKho=$makho");
//            exit();
//        } else {
//            // Nếu không có kết quả, có thể hiển thị thông báo hoặc thực hiện hành động khác
//            echo "Không tìm thấy kho với mã: $makho";
//        }
//            }
//            
//        }
$resultNguyenVatLieu = $p->bieuDoNguyenVatLieu("SELECT * FROM nguyenvatlieu");
$labelsNguyenVatLieu = $resultNguyenVatLieu['labels'];
$dataNguyenVatLieu = $resultNguyenVatLieu['data'];
$result = $p->bieuDo("SELECT * FROM thanhpham");
    $labels = $result['labels'];
    $data = $result['data'];
    ?>
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
</head>
<style>

.chart-container {
    width: 1250px;
    height: 370px;
  
  }
 section{
    height: 960px;
    font-size: 1.8em;
    margin-top: 120px;
    font-family: 'Roboto', sans-serif;
    margin-left: 20px;
  }   
</style>
<body> 
    <header>
        <div id="header">  
            <?php
            include("header.php");
        ?>
    </header>
    <section>
        <a href="#" style="text-decoration: none; color: #000;"><h1>Hoạt động hôm nay</h1></a>
    <div class="container">
        <div class="inline-box" data-count="<?php echo $p->tongbm("SELECT SUM(soLuongTonnvl) AS total FROM nguyenvatlieu"); ?>">
				<a href="NguyenVatLieu.php" >Số nguyên vật liệu </a></div>
        <div class="inline-box" data-count="<?php echo $p->tongbm("SELECT SUM(soLuongTon) AS total FROM thanhpham"); ?>"><a href="ThanhPham.php" >Số thành phẩm </a> <br></div>
        <div class="inline-box"data-count="<?php echo $p->tongbm("SELECT COUNT(maPNHTV) AS total FROM phieunhanhangtrave"); ?>"><a href="DSPhieuNhanHangTraVe.php" >Số đơn hàng bị trả về</a></div>
        <div class="inline-box"data-count="<?php echo $p->tongbm("SELECT COUNT(maDonHang) AS total FROM donhang"); ?>">
         <a href="donhang.php" >Số đơn hàng</a></div>
        
    </div>

 <div class="chart-container">
        <canvas id="myChart" width="350" height="100"></canvas>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="chart-container">
    <canvas id="myChartNguyenVatLieu" width="350" height="100"></canvas>
</div>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sử dụng dữ liệu từ PHP để tạo biểu đồ
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($data); ?>;
        const labelsNguyenVatLieu = <?php echo json_encode($labelsNguyenVatLieu); ?>;
const dataNguyenVatLieu = <?php echo json_encode($dataNguyenVatLieu); ?>;

        
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng thành phẩn trong kho',
                    data: data,
                    borderColor: 'blue',
                    borderWidth: 2,
                    fill: false,
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'category',
                        labels: labels
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var ctxNguyenVatLieu = document.getElementById('myChartNguyenVatLieu').getContext('2d');
var myChartNguyenVatLieu = new Chart(ctxNguyenVatLieu, {
    type: 'line',
    data: {
        labels: labelsNguyenVatLieu,
        datasets: [{
            label: 'Số lượng nguyên vật liệu trong kho',
            data: dataNguyenVatLieu,
            borderColor: 'green',
            borderWidth: 2,
            fill: false,
        }]
    },
    options: {
        scales: {
            x: {
                type: 'category',
                labels: labelsNguyenVatLieu
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
    </script>

    </section>
<?php
        include("footer.php");
        
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("searchIcon").addEventListener("click", function(event) {
            event.preventDefault();

            var searchValue = document.getElementById("searchInput").value;

            if (searchValue.trim() !== "") {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        window.location.href = "search_results.php?results=" + encodeURIComponent(JSON.stringify(response));
                    }
                };
                xhr.open("GET", "search.php?search_term=" + encodeURIComponent(searchValue), true);
                xhr.send();
            }
        });
    });
</script>
</body>
</html>
   
