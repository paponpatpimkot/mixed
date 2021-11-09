<html lang="en">
<?php
    include 'navbarsetting.php';
    @$barcode = $_POST['barcode'];

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="index.php?page=device_barcode" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>Device Barcode</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Device Barcode</label>
                        <input type="text" class="form-control" name="permission_name">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container" style="margin-top:50px;">
    <table class="table table-hover" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">Barcode</th>
                <th scope="col">Device ID</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM deviceitem 
                    LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
                    LEFT JOIN statusitems ON deviceitem.Sitems_ID = statusitems.Sitems_ID
                    WHERE Barcode LIKE '$barcode%' ";
                    $query = $connect->query($sql);
                    while($row = $query->fetch_array()){
                        ?><tr><td><?php echo $row['Barcode']; ?></td>
                            <td><?php echo $row['Device_id']; ?></td>
                            <td><?php echo $row['Location_name']; ?></td>
                            <td><?php echo $row['Sitems_Name']; ?></td>
                            <td><a href="index.php?page=device_barcode_edit&barcode=<?php echo $row['Barcode'];?>">Edit</a> <a href="device_barcord_delete.php?barcode=<?php echo $row['Barcode']; ?>">Delete</a></td>
                        </tr>
                   <?php }
                ?>
            </tbody>
    </table>    
    </div>
</body>
</html>