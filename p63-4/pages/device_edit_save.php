<?php
    include '../connect.php';
    if(isset($_POST['submit'])){
    
    $device_id = $_POST['device_id'];
    $qty = $_POST['qty'];
    $date = $_POST['date_in'];
    $location = $_POST['location_id'];
    
    $sql = "SELECT * FROM device WHERE Device_id = '$device_id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);
    
    $type = $fetch['type'];
        if($type == 'borrow'){
            $lastnumber = intval($fetch['lastnumber']);
            $lst = $lastnumber;

                for($x = 1 ;$x <= intval($qty) ; $x++){
                    $lst = $lst+1; 
                    $barcode = $device_id."-".$lst;
                    $sql = "INSERT INTO deviceitem VALUES('$barcode','$device_id','$location','$date','1','1')";
                    $query = $connect->query($sql);
                }
            $QY = intval($fetch['QTY'])+intval($qty);
            $sql = "UPDATE device SET QTY ='$QY',lastnumber ='$lst' WHERE Device_id ='$device_id'";
            $query = $connect->query($sql);
            header('location:index.php?page=device');
        }else if($type == 'disposable'){
          $amount = intval($fetch['QTY'])+intval($qty);
          $sql1 = "UPDATE device SET QTY = $amount WHERE Device_id = '$device_id' ";
          $query1 = $connect->query($sql1);
          header('location:index.php?page=device');
        }
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=device');
    }
?>