<html lang="en">
<?php
    include 'navbarsetting.php';
    if(isset($_POST['submit'])){
        $doc_id = $_POST['document_id'];
        $doc_name = $_POST['document_name'];

        $sql = "SELECT * FROM document WHERE Document_id = '$doc_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('ALREADY HAVE DOCUMENT ID!');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO document VAL    UES('$doc_id','$doc_name')";
            $query = $connect->query($sql);
            echo "<script>alert('ADD DOCUMENT SUCCSESSFULLY');window.location.href='document.php';</script>"; 
        }else{
            echo "<script>alert('ADD DOCUMENT FAIL');</script>";
        }

    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
<form action="document.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>ADD DOCUMENT</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">DOCUMENT ID</label>
                        <input type="text" class="form-control" name="document_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">DOCUMENT NAME</label>
                        <input type="text" class="form-control" name="document_name">
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
                <th scope="col">DOCUMENT ID</th>
                <th scope="col">DOCUMENT NAME</th>
                <th scope="col">MANAGE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $doc = "SELECT * FROM document";
            $sql_query = $connect->query($doc);
            while($row=$sql_query->fetch_array()){ ?>
                <tr>
                <td><?php echo $row['Document_id']?></td>
                <td><?php echo $row['Document_name']?></td>
                <td>
                <a href="editdoc.php?id=<?php echo $row['Document_id'];?>">EDIT</a>
                <a href="deldoc.php?id=<?php echo $row['Document_id'];?>">DELETE</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>