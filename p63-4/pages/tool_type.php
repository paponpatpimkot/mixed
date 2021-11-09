<?php
    include 'navbar.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="container">
        <div class="row mt-3">
                <h2>รายงานอุปกรณ์</h2> 
        </div>
        <div class="row">
            <div class="row col-sm-2 col-lg-2 mb-3 ">
                    <a class="btn btn-success" role="button" href="tool_type_insert.php">เพิ่มประเภทเครื่องมือ</a>
            </div>
            <table class="table table-hover text-center">
                <thead>
                 <tr class="table-dark">
                    <th scope="col">รหัสประเภทเครื่องมือ</th>
                    <th scope="col">ชื่อประเภทเครื่องมือ</th>
                 </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM tooltype ";
                        $query = $connect->query($sql);
                        while($row=$query->fetch_array()){
                            ?><tr>
                            <td scope="row"><?php echo $row['ToolType_id'];?></td>
                            <td scope="row"><?php echo $row['ToolType_name']?></td>
                            </tr>
                       <?php 
                       }
                    ?>
                </tbody>
            </table>    
</div>
</div>
</body>
</html>