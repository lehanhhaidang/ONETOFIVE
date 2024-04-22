<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../js/qlk.js"></script>
    <style>
        
        button {
            background-color: #dbdbdb;
            border: none;
            color: blue;
            cursor: pointer;
            padding: 10px 20px;
            width: 100px;
            height: 100px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 20px;
        }

        button:hover {
            background-color: darkcyan;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
    </style>
   
</head>

<body>             
<div class="container" style="margin-top: 120px;">
    <h5 style="text-align: center; font-size: 20px;">Danh sách kho</h5>
    <div class="row">
        <?php
            include_once("controller/controller_qlnvl.php");
            $p = new controlerNvl();
            $p->selectAllKhoNVL();                       
            $hien = $p->selectAllKhoNVL();
            
            if ($hien) {                          
                if (mysqli_num_rows($hien) > 0) {
                    $count = 0; // Sử dụng để đếm số lượng button đã được tạo
                    while ($cot = mysqli_fetch_assoc($hien)) {
                        // Bắt đầu một cột mới sau khi đã tạo 3 button
                        if ($count % 3 == 0 && $count > 0) {
                            echo '</div><div class="row">';
                        }
                        ?>
                        <div class="col-md-4">
                            <center>
                                <button type="button" onclick="location.href='index1.php?qldsnvl=<?php echo $cot['maKho']; ?>';">
                                    <?php echo $cot['maKho']; ?>
                                </button>
                            </center>
                        </div>
                        <?php
                        $count++;
                    }
                } else {
                    echo "<script>alert('Không có dữ liệu')</script>";
                }
            }                                                                
        ?>
    </div>
</div>
                 
</body>
</html>
