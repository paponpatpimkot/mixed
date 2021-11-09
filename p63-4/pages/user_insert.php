<?php
     if(isset($_POST['submit'])){
        $user = $_POST['Username'];
        $pass = $_POST['Password'];
        $name = $_POST['Name'];
        $surname = $_POST['Surname'];
        $tel = $_POST['Telephone'];
        $ustype = $_POST['UserType'];
        $permis = $_POST['Permission'];

        if(($user=="")||($pass=="")){
            echo "<script>alert('Please enter UserID and Password');</script>";
        }else if(($user!="")||($pass=="")){
            $sql = "SELECT * FROM user WHERE Username = '$user'";
            $query = $connect->query($sql);
            $num = mysqli_num_rows($query);
            if($num != 0){
                echo "<script>alert('Already have this UserID');</script>";
            }else if($num == 0){
                $sql = "INSERT INTO user VALUES('','$user','$pass','$name','$surname','$tel','$ustype','$permis')";
                $query = $connect->query($sql);
                if($permis == '2'){
                    $sql4 = "SELECT * FROM staff";
                    $query4 = $connect->query($sql4);
                    $num4 = mysqli_num_rows($query4);
                    $stf = $num4+1;
                    $sql5 = "SELECT * FROM user WHERE Username = '$user'";
                    $query5 = $connect->query($sql5);
                    $fetch = mysqli_fetch_array($query5);
                    $usid = $fetch['User_id'];
                    $sql = "INSERT INTO staff VALUES('$stf','$usid')";
                    $query = $connect->query($sql);
                }
                echo "<script>alert('Register Success');window.location.href='index.php?page=user';</script>";
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="style_index.css">
</head>
<body>
<form action="index.php?page=user_insert" method="post">
        <div class="container">
            <div class="card mt-5">
                    <div class="row mt-3 mx-auto">
                    <h2>Add User</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">User ID</label>
                        <input type="text" class="form-control" name="Username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="Password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control" name="Surname">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Telephone Number</label>
                        <input type="text" class="form-control" name="Telephone">
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">USER TYPE</label>
                        <select class="form-control" name="UserType" option value="<?php echo $fetch['UserType_name'];?>">>
                        <?php 
                            $sql = "SELECT * FROM usertype";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['UserType_id'];?>" selected><?php echo $row['UserType_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-1">
                        <label class="form-label">PERMISSION</label>
                        <select class="form-control" name="Permission" option value="<?php echo $row['Permission_name'] ?>"></option>>
                        <?php 
                            $sql = "SELECT * FROM permission";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Permission_id'];?>" selected><?php echo $row['Permission_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <a href="index.php?page=user" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>