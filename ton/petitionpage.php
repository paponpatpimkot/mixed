<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];
  
    
    $sql = "SELECT * FROM subjects";
    $query = $connect->query($sql);

    $sqlrst = "SELECT register.IDstd,subjects.namesj,register.IDsj 
    FROM register,subjects 
    WHERE register.IDstd = '$username' 
    AND register.IDsj = subjects.IDsj";
    $queryrgt = $connect->query($sqlrst);

     $a=0;

    while($rowrgt = $queryrgt->fetch_array()){
        $abc[] = $rowrgt['IDsj'];
    }

    $sql5 = "SELECT * FROM studen WHERE IDstd = '$username' ";
    $resul5 = mysqli_query($connect,$sql5);
        $row5 = mysqli_fetch_assoc($resul5);
    
        $sql4 = "SELECT distinct subjects.namesj,register.IDsj
        FROM register,subjects  
        WHERE register.IDsj = subjects.IDsj";
        $resul4 =  $connect->query($sql4);
           
     $sqlme = "SELECT register.IDstd,subjects.namesj,register.IDsj 
    FROM register,subjects 
    WHERE register.IDstd = '$username' 
    AND register.IDsj = subjects.IDsj";
    $queryme = $connect->query($sqlme);
    
    //$rowme = $queryme->fetch_array();
    while($rowme = $queryme->fetch_array()){
        $rowmeIDsj[] = $rowme['IDsj'];
    }


    $i = 0;
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
    <script src="js/bootstrap.js"></script>
</head>
<body style="background:#d8d9d8">
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-primary">

<div class="container-fluid">

    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">

    <li class="navbar-item dropdown">
                       <a href="#" class="nav-link dropdown-toggle" 
                       data-bs-toggle="dropdown">อื่นๆ</a>
                       <ul class="dropdown-menu">
                           <li><a href="editpassword.php" class="dropdown-item">เปลี่ยน password</a></li>
                           
                       </ul>
                   </li>
                   <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>

    <div class="container">

    <form action="petitionpage.php" class = "form-group" method = "POST">
                <label class="h3">ค้นหาวิชาที่ต้องการส่งคำร้อง</label>
            <table>
                <tr>
                    <td> <input type="text" placeholder = "รหัสวิชา " name="IDsj" class="form-control"></td>
                    <td><input type="submit" value = "search" class="btn btn-primary my-2" style="float: right;"></td>
                </tr>
                <?php if($row5['IDclass'] != '5' and $row5['IDclass'] != '3'){?>
                        <tr>
                            <td><a href="choosergt.php" class="btn btn-success">Print</a></td>
                            
                        </tr>
                <?php }?>
            </table>
            </form>
            <?php if($row5['IDclass'] != '5' and $row5['IDclass'] != '3'){?>
                <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th class="col col-lg-2">เลือกวิชาที่ต้องการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row4 = $resul4->fetch_array()){
                    $i = 0 ;
                                   
                ?>
                        <tr>
                        <td><?php echo $row4["IDsj"]; ?></td>
                        <td><?php echo $row4["namesj"]; ?></td>
                        <td class="text-center">
                        <?php
                                if (!isset($rowmeIDsj)){ ?>
                                         <a href="insertregister.php?id=<?php echo $row4['IDsj']?>" class="btn btn-success" >เลือก</a>
                                <?php }else{?>
                            <?php if (in_array($row4["IDsj"], $rowmeIDsj)) {?>
                                <a href="insertregister.php?id=<?php echo $row4['IDsj']?>" class="btn btn-success disabled" >เลือก</a>
                            <?php }else{?>
                                <a href="insertregister.php?id=<?php echo $row4['IDsj']?>" class="btn btn-success" >เลือก</a>
                                <?php }?>

                        </td>          
                    </tr>
                    <?php } } ?>
                   
                </tbody>
            </table>     
















                <?php }else{?>
     
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th class="col col-lg-2">เลือกวิชาที่ต้องการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $query->fetch_array()){
                    $i = 0 ;
                ?>
                        <tr>
                        <td><?php echo $row["IDsj"]; ?></td>
                        <td><?php echo $row["namesj"]; ?></td>
                         <?php
                        
                        ?>
                    
                        <td class="text-center">
                            <?php
                                if (!isset($abc)){ ?>
                                    <a href="insertregister.php?id=<?php echo $row['IDsj']?>" class="btn btn-success" >เลือก</a>
                                <?php }else{?>
                         
                        <?php if (in_array($row["IDsj"], $abc)) {?>
                                <a href="insertregister.php?id=<?php echo $row['IDsj']?>" class="btn btn-success disabled" >เลือก</a>
                            <?php }else{?>
                                <a href="insertregister.php?id=<?php echo $row['IDsj']?>" class="btn btn-success" >เลือก</a>
                                <?php } }?>
                        </td>      
                    </tr>
                    <?php } ?>
                   
                </tbody>
            </table>   
            
            <?php }?>

    </div>
    
</body>
</html>