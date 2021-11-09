<html lang="en">
<?php
    @include '../connect.php';
    if(isset($_POST['submit'])){
        $id = $_POST['br_id'];
        $brid = "BR-".$id;
        $sql = "SELECT * FROM borrow WHERE Borrow_id = '$brid'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);
        if($num >= 1){
            header("location:borrow_report_view.php?id=$id");
        }else if($num == 0){
            echo "<script>alert('Not have this Borrow ID');window.location.href='index.php?page=borrow_report'</script>";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
</head>
<body>
<form action="borrow_report.php" method="post">
  <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>Borrow Report</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">BR ID</label>
                        <input type="text" class="form-control" name="br_id">
                    </div>
                    <div class="form-group mt-3 mx-auto">
                        <button type="submit" class="btn btn-success" name="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>
</form>
</body>
</html>