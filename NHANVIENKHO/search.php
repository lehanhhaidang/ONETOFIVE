<?php
// Kết nối CSDL (sử dụng PDO cho PHP 7+)
$servername = "localhost";
$username = "root";
$dbname = "ptud";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Xử lý dữ liệu đầu vào từ URL
if (isset($_GET['search_term'])) {
    $search_term = $_GET['search_term'];

    // Thực hiện truy vấn tìm kiếm trong bảng 'kho' với điều kiện maKho tương đối
    $sql_kho = "SELECT * FROM kho WHERE maKho LIKE '%$search_term%'";
    $stmt_kho = $conn->prepare($sql_kho);
    $stmt_kho->execute();
    $results_kho = $stmt_kho->fetchAll(PDO::FETCH_ASSOC);

    // Thực hiện truy vấn tìm kiếm trong bảng 'phieunnvl' với điều kiện maPNNVL tương đối
    $sql_phieunnvl = "SELECT * FROM phieunnvl WHERE maPNNVL LIKE '%$search_term%'";
    $stmt_phieunnvl = $conn->prepare($sql_phieunnvl);
    $stmt_phieunnvl->execute();
    $results_phieunnvl = $stmt_phieunnvl->fetchAll(PDO::FETCH_ASSOC);

    // Thực hiện truy vấn tìm kiếm trong bảng 'phieuntp' với điều kiện maPNTP tương đối
	$sql_phieuntp = "SELECT * FROM phieuntp WHERE maPNTP LIKE '%$search_term%'";
	$stmt_phieuntp = $conn->prepare($sql_phieuntp);
	$stmt_phieuntp->execute();
	$results_phieuntp = $stmt_phieuntp->fetchAll(PDO::FETCH_ASSOC);

	// Thực hiện truy vấn tìm kiếm trong bảng 'phieuxtp' với điều kiện maPXTP tương đối
	$sql_phieuxtp = "SELECT * FROM phieuxtp WHERE maPXTP LIKE '%$search_term%'";
	$stmt_phieuxtp = $conn->prepare($sql_phieuxtp);
	$stmt_phieuxtp->execute();
	$results_phieuxtp = $stmt_phieuxtp->fetchAll(PDO::FETCH_ASSOC);

	// Thực hiện truy vấn tìm kiếm trong bảng 'phieuxnvl' với điều kiện maPXNVL tương đối
	$sql_phieuxnvl = "SELECT * FROM phieuxnvl WHERE maPXNVL LIKE '%$search_term%'";
	$stmt_phieuxnvl = $conn->prepare($sql_phieuxnvl);
	$stmt_phieuxnvl->execute();
	$results_phieuxnvl = $stmt_phieuxnvl->fetchAll(PDO::FETCH_ASSOC);
	
	// Thực hiện truy vấn tìm kiếm trong bảng 'nguyenvatlieu' với điều kiện tương đối
	$sql_nguyenvatlieu = "SELECT * FROM nguyenvatlieu WHERE maNguyenVatLieu LIKE '%$search_term%'";


	$stmt_nguyenvatlieu = $conn->prepare($sql_nguyenvatlieu);
	$stmt_nguyenvatlieu->execute();
	$results_nguyenvatlieu = $stmt_nguyenvatlieu->fetchAll(PDO::FETCH_ASSOC);

	// Thực hiện truy vấn tìm kiếm trong bảng 'thanhpham' với điều kiện tương đối
	$sql_thanhpham = "SELECT * FROM thanhpham WHERE maThanhPham LIKE '%$search_term%'";
	$stmt_thanhpham = $conn->prepare($sql_thanhpham);
	$stmt_thanhpham->execute();
	$results_thanhpham = $stmt_thanhpham->fetchAll(PDO::FETCH_ASSOC);
	
	// Thực hiện truy vấn tìm kiếm trong bảng 'bieumaunhap' với điều kiện tương đối
	$sql_bieumaunhap = "SELECT maBMNhap FROM bieumaunhap WHERE maBMNhap LIKE '%$search_term%'";
	$stmt_bieumaunhap = $conn->prepare($sql_bieumaunhap);
	$stmt_bieumaunhap->execute();
	$results_bieumaunhap = $stmt_bieumaunhap->fetchAll(PDO::FETCH_ASSOC);

	// Thực hiện truy vấn tìm kiếm trong bảng 'bieumauxuat' với điều kiện tương đối
	$sql_bieumauxuat = "SELECT maBMXuat FROM bieumauxuat WHERE maBMXuat LIKE '%$search_term%'";
	$stmt_bieumauxuat = $conn->prepare($sql_bieumauxuat);
	$stmt_bieumauxuat->execute();
	$results_bieumauxuat = $stmt_bieumauxuat->fetchAll(PDO::FETCH_ASSOC);

	// Thực hiện truy vấn tìm kiếm trong bảng 'donhang' với điều kiện maDonHang tương đối
	$sql_donhang = "SELECT maDonHang FROM donhang WHERE maDonHang LIKE '%$search_term%'";
	$stmt_donhang = $conn->prepare($sql_donhang);
	$stmt_donhang->execute();
	$results_donhang = $stmt_donhang->fetchAll(PDO::FETCH_ASSOC);
		// Thực hiện truy vấn tìm kiếm trong bảng 'bienbanboithuongnvl' với điều kiện maBBBTNVL tương đối
	$sql_bienban = "SELECT maBBBTNVL FROM bienbanboithuongnvl WHERE maBBBTNVL LIKE '%$search_term%'";
	$stmt_bienban = $conn->prepare($sql_bienban);
	$stmt_bienban->execute();
	$results_bienban = $stmt_bienban->fetchAll(PDO::FETCH_ASSOC);

	
	// Thực hiện truy vấn tìm kiếm trong bảng 'bienbanboithuongtp' với điều kiện maBBBTTP tương đối
	$sql_bienban_tp = "SELECT maBBBTTP FROM bienbanboithuongtp WHERE maBBBTTP LIKE '%$search_term%'";
	$stmt_bienban_tp = $conn->prepare($sql_bienban_tp);
	$stmt_bienban_tp->execute();
	$results_bienban_tp = $stmt_bienban_tp->fetchAll(PDO::FETCH_ASSOC);


	// Thực hiện truy vấn tìm kiếm trong bảng 'phieunhanhangtrave' với điều kiện maPNHTV tương đối
	$sql_phieunhanhang = "SELECT maPNHTV FROM phieunhanhangtrave WHERE maPNHTV LIKE '%$search_term%'";
	$stmt_phieunhanhang = $conn->prepare($sql_phieunhanhang);
	$stmt_phieunhanhang->execute();
	$results_phieunhanhang = $stmt_phieunhanhang->fetchAll(PDO::FETCH_ASSOC);

	// Kết hợp kết quả từ các bảng thành một mảng duy nhất
	$combined_results = array_merge($results_kho, $results_phieunnvl, $results_phieuntp, $results_phieuxtp, $results_phieuxnvl, $results_nguyenvatlieu, $results_thanhpham,$results_bieumaunhap,$results_bieumauxuat, $results_donhang,$results_bienban, $results_bienban_tp, $results_phieunhanhang);

	
	
	// Trả về dữ liệu tìm kiếm từ tất cả các bảng dưới dạng JSON
	header('Content-Type: application/json');
	echo json_encode($combined_results);

}
?>
