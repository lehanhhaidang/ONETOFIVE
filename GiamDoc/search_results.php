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
                
            });
        } else {
            searchResult.textContent = "Không tìm thấy kết quả";
        }
    });
</script>


</body>
</html>
