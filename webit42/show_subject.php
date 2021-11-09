<?php 
    include 'navbar.php';
    require_once 'config.php';
    $sql="SELECT * FROM subject";
    $result=$con->query($sql);
?>
<html>
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <a href="add_subject.php" class="btn btn-primary">
            +เพิ่มข้อมูลวิชา
        </a>
        <br><br>
        <table class="table table-striped">
            <tr class="bg-primary">
                <th class="text-white">ลำดับที่</th>
                <th class="text-white">รหัสวิชา</th>
                <th class="text-white">ชื่อวิชา</th>
                <th class="text-white">ทฤษฎี</th>
                <th class="text-white">ปฏิบัติ</th>
                <th class="text-white">หน่วยกิต</th>
                <th class="text-white">ครูผู้สอน</th>
            </tr>
                <?php
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['sub_id'] ?></td>
                <td><?php echo $row['sub_name']?></td>
                <td><?php echo $row['t_hour']?></td>
                <td><?php echo $row['p_hour']?></td>
                <td><?php echo $row['credit']?></td>
                <td><?php echo $row['teacher']?></td>
            </tr>
            <?php 
                $i++;
                } 
            ?>
        </table>
    </div>
</body>
</html>