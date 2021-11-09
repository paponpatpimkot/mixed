<html lang="en">
<?php
    include 'navbarsetting.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Location</title>
</head>
<body>
<form action="location_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>ADD LOCATION</h2>
                    </div>
                <div class="card-body">
                <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Location ID</label>
                        <input type="text" class="form-control" name="Location_ID">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Location name</label>
                        <input type="text" class="form-control" name="Location_name">
                    </div>
                    <div class="form-group mt-3">
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
                <th scope="col">Location ID</th>
                <th scope="col">Location name</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $location = "SELECT * FROM location";
            $sql_query = $connect->query($location);
            while($row=$sql_query->fetch_array()){ ?>
                <tr>
                <td><?php echo $row['Location_ID']?></td>
                <td><?php echo $row['Location_name']?></td>
                <td>
                <a href="index.php?page=edit_location&id=<?php echo $row['Location_ID'];?>">EDIT</a>
                <a href="index.php?page=del_location&id=<?php echo $row['Location_ID'];?>">DELETE</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>