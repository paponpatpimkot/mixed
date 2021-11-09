<?php
	require_once("../config.php");
	if(!isset($_SESSION['emp_id'])||$_SESSION['emp_position']!="ผู้จัดการ"){
		hd("index.php");
	}
?>
<link rel="stylesheet"  type="text/css" href="../css/css.css"/>

  <link rel='stylesheet prefetch' href='../css/bootstraptable-combined.min.css'>