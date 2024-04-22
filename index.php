<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body {
        background-color:#233d5a;
        background-image: url("img/kho4.jpg");
        background-size: cover;
    }
    .login{
        background-color:#000000;
        opacity: 0.85;
        
    }
    .login{
        width: 400px;
        height: 300px;
        border: 2px solid grey;
        border-radius: 2px;
        text-align: center;
    }
    h1{
        color: #ffffff;
        font-family: sans-serifl
    }
    input{
        height: 40px;
        width: 200px;
        margin-bottom: 10px ;
        

    }
    .in{
        border-radius: 5px;
        padding-Left: 20px;
        border: 1px solid grey;
    }
    .btn{
        width: 220px;
        height: 40px;
        border-radius: 0px;
        background-color: #8bcac8;
        font-family: sans-serifl;
        font-weight: 100;
        
    }
    .btn:hover{
        font-size: 18px;
        
        
    }





    </style>
</head>
<body>
    
    <div class="bd">
        <center>
            <img src="img/logo.jpg" alt="" width="150" height="150"> <br><br>
            <div class="login">
                <center>
                <form action="xulydangnhap.php" method="post">
                
                
                        
                            
                            <h1> Đăng nhập hệ thống</h1>
                                
                                <input class="in" type="text" name="txtusername"placeholder="Nhập username"> 
                            
                            
                                
                                <input class="in" type="password" name="txtpassword" placeholder="Nhập password">
                            
                            
                                
                                <input class="btn" type="submit" name="bntdangnhap" value="Đăng nhập">
                                
                            
                        

                </form>
                </center>
            </div>
        </center>
    </div>
</body>
</html>