<html lang="en">
<?php
    include 'navbarsetting.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดการสิทธิ์</title>
</head>
<body>
<form action="permission_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>Permission</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Permission Name</label>
                        <input type="text" class="form-control" name="permission_name">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container" style="margin-top:50px;">
    <table class="table table-hover" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">Permission ID</th>
                <th scope="col">Permission Name</th>
                <th scope="col">Manage </th>
            </tr>
        </thead>
            <tbody>
            <?php
                $permis = "SELECT * FROM permission";
                $sql_query = $connect->query($permis);
                while($row=$sql_query->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['Permission_id']?></td>
                    <td><?php echo $row['Permission_name']?></td>
                    <td>
                    <a href="editpermis.php?id=<?php echo $row['Permission_id']?>">Edit</a>
                    <a href="delpermis.php?id=<?php echo $row['Permission_id']?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>    
    </div>
</body>
</html>