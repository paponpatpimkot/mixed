<?php
	require_once('config.php');
	if(!isset($_SESSION['emp_id'])){
		hd("login.php");
	}else{
		$ps = $_SESSION['emp_position'];	
		if($ps=="ผู้จัดการ"){
			hd("manager");
		}elseif($ps=="พนักงานขาย"){
			hd("sell");
		}elseif($ps=="พนักงานสต๊อค"){
			hd("stock");
		}
	}
?>