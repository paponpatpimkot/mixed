<?php
session_start();


    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $id = $_SESSION['username'] ;
    $sql = " SELECT * FROM studen
    WHERE IDstd = '$id' ";

    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
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
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-primary">

<div class="container-fluid">
    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
     
        <li class="navbar-item">
            <a href="login.php" class="nav-link">ออกจากระบบ</a>
        </li> 
    </ul>
</div>

</nav>
<div class="container w-25" style="margin-top: 20px;">
<?php if(isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger h5 text-center">
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>    
                    <?php endif ?>
<form action="updatepassword.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="d-flex justify-content-center flex-column">
            <table>
                <tr>
                    <th>รหัสผ่านเดิม</th>
                    <td><input type="text" name="passwordO" placeholder="กรุณาใส่รหัสผ่านเก่า" class="form-control mb-3"></td>  
                </tr>
                <tr>
                    <th>รหัสผ่านไหม่</th>
                    <td><input type="text" name="passwordN" placeholder="กรุณาใส่รหัสผ่านไหม่" class="form-control mb-3"></td>  
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-outline-primary"> บันทึก </button></td>  
                </tr>
                </div>
            </div>
        </table>
    </form>
</div> 
</body>
</html>