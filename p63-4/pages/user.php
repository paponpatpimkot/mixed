<?php
    $ids = $_SESSION['Username'];
    $sql5 = "SELECT * FROM user WHERE Username = '$ids' AND Permission_id = '1'";
    $query5 = $connect->query($sql5);
    $num5 = mysqli_num_rows($query5);

    if($num5 == 0){
        echo "<script>alert('User Manage is only for Admin');window.location.href='index.php';</script>";
    }
?>
<div class="row">                        
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header card-header-info">
            <h4 class="card-title">User Management</h4>                  
            </div>
            <div class="card-body table-responsive">
                <div class="container" style="margin-top:50px;">
                    <a href="index.php?page=user_insert" class="btn btn-outline-info float-right mb-3">
                    <i class="material-icons">add_circle_outline</i> Add User
                    </a>
                    <table class="table">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>                                
                                <th scope="col">Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Type</th>
                                <th scope="col">Position</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = "SELECT * FROM user
                            LEFT JOIN usertype ON user.UserType_id = usertype.UserType_id
                            LEFT JOIN permission ON user.Permission_id = permission.Permission_id
                            ";
                            $sql_query = $connect->query($user);
                            while($row=$sql_query->fetch_array()){ ?>
                                <tr>
                                <td><?php echo $row['User_id']?></td>
                                <td><?php echo $row['Username']?></td>                                
                                <td><?php echo $row['Name']?></td>
                                <td><?php echo $row['Surname']?></td>
                                <td><?php echo $row['Telephone']?></td>
                                <td><?php echo $row['UserType_name']?></td>
                                <td><?php echo $row['Permission_name']?></td>
                                <td class="td-actions">
                                <a class="btn btn-info" href="index.php?page=edituser&User_id=<?php echo $row['User_id'] ?>">
                                    <i class="material-icons">edit</i>&nbsp;
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="deluser.php?User_id=<?php echo $row['User_id'] ?>">
                                    <i class="material-icons">clear</i>&nbsp;
                                </a>
                            </td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
