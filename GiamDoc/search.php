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

	// Kết hợp kết quả từ các bảng thành một mảng duy nhất
	$combined_results = array_merge($results_kho, $results_phieunnvl, $results_phieuntp, $results_phieuxtp, $results_phieuxnvl);

	// Trả về dữ liệu tìm kiếm từ tất cả các bảng dưới dạng JSON
	header('Content-Type: application/json');
	echo json_encode($combined_results);

}
?>
