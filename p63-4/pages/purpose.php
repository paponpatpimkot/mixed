<html lang="en">
<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){       
        $PurID = $_POST['PurID'];
        $PurName = $_POST['PurName'];
        $sql = "INSERT INTO purpose VALUES('$PurID','$PurName')";
        $query = $connect->query($sql);
        if($query){
            echo '<meta http-equiv="refresh" content="0;URL=purpose.php">';
        }else{        
            echo "<script>alert('Error : Can not save data')window.history.back();</script>";
        }    
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Location</title>
</head>
<body>
<form action="purpose.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>ADD PURPOSE</h2>
                    </div>
                <div class="card-body">
                <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Purpose ID</label>
                        <input type="text" class="form-control" name="PurID">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Purpose name</label>
                        <input type="text" class="form-control" name="PurName">
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
                <th scope="col">Purpose ID</th>
                <th scope="col">Purpose name</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $purpose = "SELECT * FROM purpose";
            $sql_query = $connect->query($purpose);
            while($row=$sql_query->fetch_array()){ ?>
                <tr>
                <td><?php echo $row['PurID']?></td>
                <td><?php echo $row['PurName']?></td>
                <td>
                <a href="edit_purpose.php?id=<?php echo $row['PurID'];?>">EDIT</a>
                <a href="del_purpose.php?id=<?php echo $row['PurID'];?>">DELETE</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>