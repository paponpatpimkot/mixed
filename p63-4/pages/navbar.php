<?php
    include '../connect.php';

    if(!$_SESSION['name']){
        echo "<script>alert('กรุณา Login ก่อนเข้าใช้งาน');window.location.href='../index.php';</script>";
    }
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title> 
    
    <link rel="stylesheet" href="../style_indexa.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand" style="margin-left:10%;">Aircraft Borrows System</a>
            </div>
            
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar" style="margin-left:60%;">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" name="dropdown">
                            <?php echo $_SESSION['name']; ?>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a href="#" class="dropdown-item">แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href="#" class="dropdown-item">แก้ไขรหัสผ่าน</a></li> 
                            <li><a href="../logout.php" class="dropdown-item">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
</body>
</html>