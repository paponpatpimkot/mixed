<?php
    
        require_once 'config.php';
        $sub_id = $_POST['id'];
        $sub_name = $_POST['name'];
        $t_hour = $_POST['t'];
        $p_hour = $_POST['p'];
        $credit = $_POST['c'];
        $teacher = $_POST['teacher'];
        if($id==" " || $name=="" || $t==" " || $p_hour==" " || $credit==" " || $teacher==" "){
            echo"<script>alert('คุณยังไม่ได้กรอกข้อมูล')</script>";
        }else{
            $sql="INSERT INTO subject VALUE('$sub_id','$sub_name','$t_hour','$p_hour','$credit','$teacher')";
            $con->query($sql);
            echo $sql;
            if($con){
                echo"<script>เชื่อมต่อ data base ได้</script>";
            }else{
                echo"<script>เชื่อมต่อ data base ไม่ได้</script>";
            }
        }

   

    
?>