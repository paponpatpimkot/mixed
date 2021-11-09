<?php
    $id = $_GET['User_id'];
    $sql2 = "SELECT * FROM user 
    LEFT JOIN usertype ON user.UserType_id = usertype.UserType_id
    LEFT JOIN permission ON user.Permission_id = permission.Permission_id
    WHERE User_id = '$id'";
    $query2 = $connect->query($sql2);
    $fetch2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>
<body>
<form action="updateuser.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>EDIT USER INFORMATION</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">USERNAME</label>
                        <input type="text" readonly class="form-control" name="Username" value="<?php echo $fetch2['Username'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">NAME</label>
                        <input type="text" class="form-control" name="Name" value="<?php echo $fetch2['Name'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">SURNAME</label>
                        <input type="text" class="form-control" name="Surname" value="<?php echo $fetch2['Surname'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">TELEPHONE</label>
                        <input type="text" class="form-control" name="Telephone" value="<?php echo $fetch2['Telephone'];?>">
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">USER TYPE</label>
                        <select class="form-control" name="usertype"> 
                        <option value="<?php echo $fetch2['UserType_id']; ?>"><?php echo $fetch2['UserType_name'];?></option>
                        <?php 
                            $sql = "SELECT * FROM usertype ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['UserType_id'];?>"><?php echo $row['UserType_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-1">
                        <label class="form-label">PERMISSION</label>
                        <select class="form-control" name="Permission"> 
                        <option value="<?php echo $fetch2['Permission_id']; ?>"><?php echo $fetch2['Permission_name'];?></option>
                        <?php 
                            $sql = "SELECT * FROM permission ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Permission_id'];?>"><?php echo $row['Permission_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
                        <a href="index.php?page=user" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>