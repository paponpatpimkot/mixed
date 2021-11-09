<?php 
//add_student.php
    if (isset($_POST['submit'])){
        require_once 'config.php';
        $std_name=$_POST['std_name'];
        $std_tel=$_POST['std_tel'];
        $std_email=$_POST['std_email'];
        if($std_name==''|| $std_tel==''|| $std_email==''){
            echo "<script>alert('คุณยังไม่ได้กรอกข้อมูล')</script>";
        }else{
            
            $sql="INSERT INTO student VALUES('','$std_name','$std_tel','$std_email')";        
            $con->query($sql);            
            if(!$con){
                echo "<script>alert('ไม่สามารถเพิ่มข้อมูล')</script>";
            }else{
                echo "<script>                        
                        window.location.href='show_student.php';
                      </script>";
            }
        }        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 w-25">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3 row">
                <label for="" class="col-form-label col-sm-4">ชื่อ-นามสกุล</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="std_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-form-label col-sm-4">เบอร์โทรศัพท์</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="std_tel">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-form-label col-sm-4">อีเมล</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="std_email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-form-label col-sm-4"></label>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-primary" name="submit" value="เพิ่มข้อมูล">
                </div>
            </div>
        </form>
    </div>
</body>
</html>