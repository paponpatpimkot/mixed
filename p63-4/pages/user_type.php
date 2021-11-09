<html lang="en">
<?php
    @include  '../connect.php';
    if(isset($_POST['submit'])){        
        $sql = "SELECT * FROM usertype";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);
        $n = $num+1;

        $UserType_name = $_POST['UserType_name'];                
        $sql = "INSERT INTO usertype VALUES('$n','$UserType_name')";
        $query = $connect->query($sql);
        
        echo "<script>alert('ADD SUCCESS');window.location.href='index.php?page=setting';</script>";  
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
</head>
<body>
<form action="user_type.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>User Type</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">UserType Name</label>
                        <input type="text" class="form-control" name="UserType_name">
                    </div>
                    <div class="form-group mt-3 mx-auto">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container" style="margin-top:50px;">
    <table class="table table-strip" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">UserType ID</th>
                <th scope="col">UserType Name</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ustype = "SELECT * FROM usertype";
            $sql_query = $connect->query($ustype);
            while($row=$sql_query->fetch_array()){ ?>
                <tr>
                <td><?php echo $row['UserType_id']?></td>
                <td><?php echo $row['UserType_name']?></td>
                <td>
                <a href="index.php?page=edit_usertype&id=<?php echo $row['UserType_id'];?>">EDIT</a>
                <a href="del_usertype.php?id=<?php echo $row['UserType_id'];?>">DELETE</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>