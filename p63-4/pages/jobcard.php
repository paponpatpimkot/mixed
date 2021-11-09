<html lang="en">
<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){        
        $Jobcard_name = $_POST['Jobcard_name'];                
        $sql = "INSERT INTO jobcard VALUES('','$Jobcard_name')";
        $query = $connect->query($sql);
        if($query){
            echo '<meta http-equiv="refresh" content="0;URL=jobcard.php">';
        }else{        
            echo "<script>alert('Error : Can not save data')window.history.back();</script>";
        }    
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>บัตรงาน</title>
</head>
<body>
<form action="jobcard.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มบัตรงาน</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อบัตรงาน</label>
                        <input type="text" class="form-control" name="Jobcard_name">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container" style="margin-top:50px;">
    <table class="table table-strip" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">รหัสบัตรงาน</th>
                <th scope="col">ชื่อบัตรงาน</th>
                <th scope="col">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jobcard = "SELECT * FROM jobcard";
            $sql_query = $connect->query($jobcard);
            while($row=$sql_query->fetch_array()){ ?>
                <tr>
                <td><?php echo $row['Jobcard_id']?></td>
                <td><?php echo $row['Jobcard_name']?></td>
                <td>
                <a href="editjobcard.php?id=<?php echo $row['Jobcard_id'];?>">แก้ไข</a>
                <a href="deljobcard.php?id=<?php echo $row['Jobcard_id'];?>">ลบ</a>
              </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>