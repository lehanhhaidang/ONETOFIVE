<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
	<link rel="stylesheet" href="./css/cssSearch.css">
    <title>Kết quả tìm kiếm</title>
</head>
<body>
    <?php include("header.php"); ?>
 <main >
 <div class="search-container"> <!-- Container mới -->
            <div id="searchResult" class="search-result">
                <!-- Nội dung kết quả tìm kiếm sẽ được thêm vào đây -->
            </div>
        </div> 
<div class="back">
       <a href="TrangChuNVK.php">
               <button>Quay lại</button>
        </a>
    </div>
</main>


    <?php include("footer.php"); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var searchResults = <?php echo isset($_GET['results']) ? $_GET['results'] : '[]'; ?>;
        var searchResult = document.getElementById("searchResult");
        var isFirstKhoSub = true;

        if (searchResults.length > 0) {
            searchResults.forEach(function(result) {
                // Kiểm tra nếu 'maKho' tồn tại trong kết quả tìm kiếm
                if (result.maKho) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietKhoNVL.php?maKho=" + result.maKho;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maKho;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }

				  // Kiểm tra nếu 'maKho' tồn tại trong kết quả tìm kiếm
                if (result.maPNNVL) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietPhieuNhapNVL.php?maPNNVL=" + result.maPNNVL;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maPNNVL;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				// Kiểm tra nếu 'maKho' tồn tại trong kết quả tìm kiếm
                if (result.maPNTP) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietPhieuNhapTP.php?maPNTP=" + result.maPNTP;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maPNTP;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				// Kiểm tra nếu 'maKho' tồn tại trong kết quả tìm kiếm
                if (result.maPXTP) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietPhieuXuatTP.php?maPXTP=" + result.maPXTP;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maPXTP;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maPXNVL) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietPhieuXuatNVL.php?maPXNVL=" + result.maPXNVL;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maPXNVL;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maNguyenVatLieu) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietNVL.php?maNguyenVatLieu=" + result.maNguyenVatLieu;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maNguyenVatLieu;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maBMNhap) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "BieuMauNhap.php?maBMNhap=" + result.maBMNhap;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maBMNhap;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maBMXuat) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "BieuMauXuat.php?maBMXuat=" + result.maBMXuat;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maBMXuat;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maDonHang) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietTP.php?maDonHang=" + result.maDonHang;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maDonHang;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maThanhPham) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietTP.php?maThanhPham=" + result.maThanhPham;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maThanhPham;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maBBBTNVL) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietBBBTNVL.php?maBBBTNVL=" + result.maBBBTNVL;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maBBBTNVL;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
                
				
				if (result.maBBBTTP) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietBBBTTP.php?maBBBTTP=" + result.maBBBTTP;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maBBBTTP;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				if (result.maPNHTV) {
                    var linkKho = document.createElement("a");
                    linkKho.href = "ChiTietPhieuNhanHangTraVe.php?maPNHTV=" + result.maPNHTV;

                    var khoSub = document.createElement("div");
                    khoSub.classList.add("kho-sub");

                    // Nếu là phần tử đầu tiên, thêm margin-top
                    if (isFirstKhoSub) {
                        khoSub.style.marginTop = "140px";
                        isFirstKhoSub = false;
                    }

                    khoSub.textContent = result.maPNHTV;

                    linkKho.appendChild(khoSub);
                    searchResult.appendChild(linkKho);
                }
				
				
            });
        } else {
            searchResult.textContent = "Không tìm thấy kết quả";
        }
    });
</script>

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
