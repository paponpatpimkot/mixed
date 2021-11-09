<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];
    $id = $_GET['id'];
    $sjid = $_SESSION['sj'];
    $_SESSION['psn']=$id;
    $sql = "SELECT personnel.IDpsn,personnel.fname,personnel.lname,subjects.IDsj,subjects.namesj,day.nameday,scdpsndetail.starttime,scdpsndetail.endtime,scdpsndetail.IDday,room.nameroom,scdpsndetail.IDroom
    FROM personnel,subjects,scdpsndetail,schedulepsn,day,room
    WHERE personnel.IDscdPsn=schedulepsn.IDscdPsn
    AND schedulepsn.IDscdPsn=scdpsndetail.IDscdPsn
    AND scdpsndetail.IDsj=subjects.IDsj
    AND day.IDday=scdpsndetail.IDday
    AND scdpsndetail.IDroom = room.IDroom
    AND scdpsndetail.IDsj='$sjid'
    AND personnel.IDpsn='$id'";
    
    $result = mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script> -->
    <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
</head>
<body style="background:#d8d9d8">
<nav class="navbar navbar-expand-sm navbar-light bg-primary">

<div class="container-fluid">

    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">

        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>
<div class="container mt-5 ">
    <?php if(isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger h5 text-center">
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>    
                    <?php endif ?>
    <div class="h1">
        ตารางสอนอาจารย์
    </div>
    
    
     
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="text-center">        
        <tr>
            <th>วัน</th>
            <th>รหัสวิชา</th>
            <th>ชื่อวิชา</th>
            <th>เริ่มสอนเวลา</th>    
            <th>เลิกสอนเวลา</th>
            
            <th>ห้องที่เรียน</th>
            <th>เลือก</th>
       
        </tr>
    </thead>
    <tbody>
    
        


        <?Php while($row = mysqli_fetch_assoc($result)){?>
        <tr>
        <form action="inserpetition.php" class = "form-group" method="POST">
            <input type="hidden" value="<?php echo $_SESSION['username'];?>" name="IDstd" >
            <input type="hidden" value="<?php echo $_SESSION['psn'];?>" name="IDpsn">
            <input type="hidden" value="<?php echo $_SESSION['sj'];?>" name="IDsj">
            <input type="hidden" value="<?php echo $_SESSION['dpm'];?>" name="dpm">
            <input type="hidden" value="<?php echo $_SESSION['class'];?>" name="class">
            
            <input type="hidden" value="1" name="type">


                <td><?php echo $row["nameday"];?></td>
                <td><?php echo $row["IDsj"];?></td>
                <td><?php echo $row["namesj"];?></td>
                <td><?php echo $row["starttime"];?></td>
                <td><?php echo $row["endtime"];?></td>
                <td class="text-center"><?php echo $row["nameroom"];?></td>
                
                <input type="hidden" name="IDday" value="<?php echo $row["IDday"];?>">
                <input type="hidden" name="starttime" value="<?php echo $row["starttime"];?>" >
                <input type="hidden" name="endtime" value="<?php echo $row["endtime"];?>" >
                <input type="hidden" name="room" value="<?php echo $row["IDroom"];?>" >

                <td class="text-center">
                    <input type="submit" value="เลือก" class="btn btn-success">   
                </td>
         </form>
        </tr>
         
        <?php }?>
        
    </tbody>
   
    </table>
  
   

    
</div>
</body>
</html>