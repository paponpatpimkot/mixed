<html lang="en">
<?php
    include 'navbarsetting.php';
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVICE TYPE</title>
</head>
<body>
<form action="devicetype_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>DEVICE TYPE</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">DEVICE TYPE ID</label>
                        <input type="text" class="form-control" name="Devcat_ID">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">DEVICE TYPE NAME</label>
                        <input type="text" class="form-control" name="Devcat_NAME">
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
                <th scope="col">DEVICE TYPE ID</th>
                <th scope="col">DEVICE TYPE NAME</th>
                <th scope="col">Manage </th>
            </tr>
        </thead>
            <tbody>
            <?php
                $permis = "SELECT * FROM devicecatagory";
                $sql_query = $connect->query($permis);
                while($row=$sql_query->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['Devcat_ID']?></td>
                    <td><?php echo $row['Devcat_NAME']?></td>
                    <td>
                    <a href="index.php?page=editdevice_type&id=<?php echo $row['Devcat_ID']?>">Edit</a>
                    <a href="index.php?page=deldevice_type&id=<?php echo $row['Devcat_ID']?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>    
    </div>
</body>
</html>