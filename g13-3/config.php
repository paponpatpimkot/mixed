<?php
	@session_start();
	$local = "localhost";
	$user = "root";
	$pass ='';
	$db = "shopdb";

	$con=mysqli_connect($local,$user,$pass,$db) or die ("Can't connect server");
	$con->query("set names utf8");
	error_reporting(0);

	function hd($name){
		header("location:$name");
	}
	function date_th($ddd){
	$day_th = date('d',strtotime($ddd));
$month = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$month_th = $month[date('n',strtotime($ddd))];
	$year_th = date('Y',strtotime($ddd))+543;
	$date_th = $day_th." ".$month_th." ".$year_th;
	return $date_th;
	}
function month_th($mm){
$month = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$month_th = $month[$mm];
	return $month_th;
	}

	function al($name){
	?>
		<style>
        .alert{
        width:70%;
        margin:auto;
		padding:14px;
        margin-bottom:5px;
        border-radius:4px 4px 4px 4px;
        margin-bottom:20px;
        color:#F33;
		background:white;
        font-size:18px;
        border:solid 2px  #F33;
        }
        </style>

		<div class="alert" align="center">
			<?php echo $name ?>
		</div>
		<?php
		}
	function sc($name){
		echo"<script>alert('$name');window.history.back();</script>";
	}
?>

<link rel="icon" href="../img/logo.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
<title>DGP-Shop</title>
<style>
	*{
		font-family: 'Sriracha', sans-serif;
	}
</style>