<?php
    include 'navbarsetting.php';
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="container">
        <form action="brands_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                    <h2>ADD Brand</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Brands ID</label>
                        <input type="text" class="form-control" name="Brand_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Brands name</label>
                        <input type="text" class="form-control" name="Brand_name">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row">
            
            <table class="table table-hover text-center">
                <thead>
                 <tr class="table-dark">
                    <th scope="col">Brands ID</th>
                    <th scope="col">Brands name</th>
                    <th scope="col">Manage</th>
                 </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM brands";
                        $query = $connect->query($sql);
                        while($row=$query->fetch_array()){
                            ?>
                            <tr>
                            <td scope="row"><?php echo $row['Brand_id'];?></td>
                            <td scope="row"><?php echo $row['Brand_name'];?></td>
                            <td>
                            <a href="index.php?page=edit_brands&id=<?php echo $row['Brand_id'];?>">EDIT</a>
                            <a href="index.php?page=del_brands&id=<?php echo $row['Brand_id'];?>">DELETE</a>
                            </td>
                            </tr>
                       <?php } ?>
                </tbody>
            </table>    
</div>
</div>
</body>
</html>