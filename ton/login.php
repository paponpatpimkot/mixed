<?php
session_start();
require("connect.php");
    $sql = "SELECT * FROM admid WHERE IDam = '1' ";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    
    $sql2 = "SELECT * FROM admid WHERE IDam = '2' ";
    $result2 = mysqli_query($connect,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script> -->
    <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
</head>
<body>

<div class="container w-25" style="margin-top: 20px;">
    <form action="logincon.php" method="post">
            <div class="d-flex justify-content-center flex-column">
            <div class="h3 text-center"><?php echo $row2['Nameam'];?></div> 
                <div class="h4 text-center"><?php echo $row['Nameam'];?></div>         
                <?php if(isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger h5 text-center">
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>    
                    <?php endif ?>
                
           
                <input type="text" name="username" placeholder="Username" class="form-control mb-3">
                <input type="text" name="password" placeholder="password" class="form-control mb-3">
                <button class="btn btn-outline-success"> Login </button>
                
            
               
            
                </div>
            </div>
    </form>
</div> 
</body>
</html>