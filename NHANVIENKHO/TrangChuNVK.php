<?php
include("class/classnvk.php");
$p = new nhanvienkho();
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
    <title>Trang chủ</title>
</head>
<body> 
    <?php
        include("header.php");
    ?>
   <main>
   <div class="containerTC">
    <div class="TCLeft">
        <div class="calendar">
            <div class="month" id="monthYearLeft"></div>
            <div class="days" id="calendarLeft"></div>
        </div>
    </div>

        <div class="TCRight">
             <h2 style="margin-top: 20px; text-align: center;">NHÂN VIÊN KHO</h2>

            <div class="TCRight-kho">
                <a href="Kho.php">
                    <img src="./image/NhanVienKho/kho.webp" alt="">
                    <span>Kho</span>
                </a>
            </div>
            <div class="TCRight-func">
                <a href="TP-NVL.php">Thành phẩm / Nguyên vật liệu</a>
            </div>
            
            <div class="TCRight-func" >
                <a href="donhang.php">Đơn hàng</a>
            </div>
            <div class="TCRight-func BM" data-count="<?php echo $p->tongbm("SELECT COUNT(*) as total 
            FROM bieumauxuat 
            WHERE (trangThai = '' OR trangThai IS NULL) AND maKho IN ('KNVL01', 'KNVL02', 'KNVL03', 'KNVL04')
            "); ?>">
				<a href="DSBieuMauXuat.php">Biễu mẫu xuất kho</a>
			</div>
            <div class="TCRight-func BM" data-count="<?php echo $p->tongbm("SELECT COUNT(*) as total 
            FROM bieumaunhap
            WHERE (trangThai = '' OR trangThai IS NULL) AND maKho IN ('KNVL01', 'KNVL02', 'KNVL03', 'KNVL04')"); ?>">
                <a href="DSBieuMauNhap.php">Biễu mẫu nhập kho</a>
            </div>
            <div class="TCRight-func">
                <a href="PhieuXuatNVL.php">Phiếu xuất nguyên vật liệu</a>
            </div>
            <div class="TCRight-func">
                <a href="PhieuNhapNVL.php">Phiếu nhập nguyên vật liệu</a>
            </div>
			 <div class="TCRight-func">
                <a href="UPPhieuNhapNVL.php">Cập nhật phiếu nhập nguyên vật liệu</a>
            </div>
			<div class="TCRight-func">
                <a href="BienBanBoiThuong.php">Xem biên bản bồi thường</a>
            </div>
            <div class="TCRight-func">
                <a href="PhieuNhapNVL.php">Lập biên bản bồi thường NVL</a>
            </div>
           
            <div class="TCRight-func">
                <a href="donhang.php">Lập phiếu nhận hàng trả về</a>
            </div>
			 <div class="TCRight-func" style="margin-bottom: 50px;">
                <a href="DSPhieuNhanHangTraVe.php">Xem phiếu nhận hàng trả về</a>
            </div>
        </div>
   </div>
   <script>
   const currentDate = new Date();
generateCalendar(currentDate, 'calendarLeft', 'monthYearLeft');

function generateCalendar(date, calendarId, monthYearId) {
    const calendar = document.getElementById(calendarId);
    calendar.innerHTML = '';

    const monthYear = document.getElementById(monthYearId);
    const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
    const monthNames = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

    monthYear.textContent = `${monthNames[date.getMonth()]}, ${date.getFullYear()}`;

    const daysOfWeek = ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'];
    for (const dayOfWeek of daysOfWeek) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = dayOfWeek;
        calendar.appendChild(dayElement);
    }

    for (let i = 0; i < firstDay; i++) {
        const emptyDayElement = document.createElement('div');
        calendar.appendChild(emptyDayElement);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = day;
        
        // Kiểm tra nếu day là ngày hiện tại, thêm lớp "current-day"
        if (date.getDate() === day && date.getMonth() === new Date().getMonth()) {
            dayElement.classList.add('current-day');
        }
        
        calendar.appendChild(dayElement);
    }
}

</script>
   </main>
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
   
