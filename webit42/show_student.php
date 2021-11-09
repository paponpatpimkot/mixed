<?php 
    require_once 'config.php';
    $sql="SELECT * FROM student";
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
        <a href="add_student.php" class="btn btn-primary">
            +เพิ่มข้อมูลนักศึกษา
        </a>
        <br><br>
        <table class="table table-striped">
            <tr class="bg-primary">
                <th class="text-white">ลำดับที่</th>
                <th class="text-white">รหัสประจำตัว</th>
                <th class="text-white">ชื่อ-นามสกุล</th>
                <th class="text-white">เบอร์โทรศัพท์</th>
                <th class="text-white">อีเมล</th>
            </tr>
                <?php
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['std_id'] ?></td>
                <td><?php echo $row['std_name']?></td>
                <td><?php echo $row['std_tel']?></td>
                <td><?php echo $row['std_email']?></td>
            </tr>
            <?php 
                $i++;
                } 
            ?>
        </table>
    </div>
</body>
</html>