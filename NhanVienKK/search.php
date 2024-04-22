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

     // Thực hiện truy vấn tìm kiếm trong bảng 'xembb' với điều kiện maKho tương đối
     $sql_bienbankiemke = "SELECT * FROM bienbankiemke WHERE maBBKK LIKE '%$search_term%'";
     $stmt_bienbankiemke = $conn->prepare($sql_bienbankiemke);
     $stmt_bienbankiemke->execute();
     $results_bienbankiemke = $stmt_bienbankiemke->fetchAll(PDO::FETCH_ASSOC);
 

	// Kết hợp kết quả từ các bảng thành một mảng duy nhất
	$combined_results = array_merge($results_kho,  $results_bienbankiemke);

	// Trả về dữ liệu tìm kiếm từ tất cả các bảng dưới dạng JSON
	header('Content-Type: application/json');
	echo json_encode($combined_results);

}
?>
