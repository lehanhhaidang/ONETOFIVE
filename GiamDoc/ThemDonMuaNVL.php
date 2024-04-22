<?php
include("KetNoi.php");
$p = new GiamDoc();

// Lấy thông tin từ form hoặc dữ liệu kế hoạch sản xuất mới
$tenKH = $_REQUEST['tenKH'];
$startDate = $_REQUEST['startDate'];
$endDate = $_REQUEST['endDate'];
// Lấy thông tin từ cơ sở dữ liệu về nguyên vật liệu
$nguyenVatLieuInfo = $p->getNguyenVatLieuInfo();

// Kiểm tra số lượng tồn kho
foreach ($nguyenVatLieuInfo as $nvl) {
    $soLuongTonKho = $nvl['soLuongTonKho']; // Số lượng tồn kho của nguyên vật liệu
    $soLuongCanSuDung = $_POST['soluongnvl']; // Số lượng nguyên vật liệu cần sử dụng trong kế hoạch sản xuất mới

    // Xử lý trường hợp tồn kho không đủ
    if ($soLuongTonKho < $soLuongCanSuDung) {
        $chenhLech = $soLuongCanSuDung - $soLuongTonKho;

        // Tạo đơn mua mới
        $p->InsertUpdate("INSERT INTO donmua (ngayLap, tinhTrang) VALUES (NOW(), 'Chờ xử lý')");

        // Lấy mã đơn mua mới
        $maDonMua = $p->getLastInsertedId();

        // Thêm chi tiết đơn mua
        $p->InsertUpdate("INSERT INTO chitietdonmua (maDonMua, maNguyenVatLieu, soLuong) 
                          VALUES ('$maDonMua', '{$nvl['maNguyenVatLieu']}', '$chenhLech')");

        // Cập nhật số lượng tồn kho
        $p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongTonKho = 0 WHERE maNguyenVatLieu = '{$nvl['maNguyenVatLieu']}'");
    } else {
        // Cập nhật số lượng tồn kho
        $p->InsertUpdate("UPDATE nguyenvatlieu SET soLuongTonKho = ($soLuongTonKho - $soLuongCanSuDung) 
                          WHERE maNguyenVatLieu = '{$nvl['maNguyenVatLieu']}'");
    }
}

// Tiếp tục với các bước khác của quy trình thêm kế hoạch sản xuất mới
// ...

?>
