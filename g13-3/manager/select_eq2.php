<?php
require_once("chk_position.php");
include 'header.php';
$std_id=$_GET['std_id'];
$eq_id=$_POST['eq_id'];
$qty=$_POST['qty'];
$size=$_POST['size'];
$con->query("INSERT INTO slip VALUES('','$std_id','2000','".date('Y-m-d')."')");
$slip_id=mysqli_fetch_array($con->query("SELECT MAX(slip_id)as id FROM slip"));
for ($i=1;$i<=count($_POST['eq_id']);$i++){    
    $sql="INSERT INTO slip_list VALUES('$slip_id[id]','{$eq_id[$i]}','{$qty[$i]}','{$size[$i]}')";
    $r=$con->query($sql);    
    echo $sql."<br>";
}

//header("location:summary.php?std_id=$std_id");
?>