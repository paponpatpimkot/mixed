<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>
<body>
	<?php 
		include('header.php');
	?>
    <div class="top"></div>
    
    
     <div class="headcon"><H4>
รายงานยอดขายตามใบเสร็จ</H4>
    </div>
    <div class="content"><br />

 
    <div class="rnow">
    <div class="wrap">
   <div class="search">
 
   <form action="<?php $_SERVER['PHPSELF']; ?>" method="get">
      <input type="text" class="searchTerm"  name="search" placeholder="ค้นหารหัสใบเสร็จ">
      <button type="submit" class="searchButton">
        <div class="gy"><i class="glyphicon glyphicon-search"></i></div>
     </button>
     </form>
   </div>
</div>
  </div>  <br />

    <br />
    <table class="responstaba" cellspacing="1">
    	<tr>
        	<th>เลขที่ใบเสร็จ</th>
            <th width="15%">วันที่</th>
            <th>ผู้ขาย</th>
            <th>ยอดขาย</th>
        </tr>
    <?php
		if($_GET['search']!=""){
		$select_sell = $con->query("select * from selling,employee where selling.emp_id = employee.emp_id and sell_id like '%$_GET[search]%' order by sell_id desc");	
		}else{
		$select_sell = $con->query("select * from selling,employee where selling.emp_id = employee.emp_id  order by sell_id desc");
		}
		while($result_sell = mysqli_fetch_array($select_sell)){
			echo "<tr>
        	<td align=center><a href='receipt.php?id=$result_sell[sell_id]&report=1'>$result_sell[sell_id]</a></td>
            <td align=left>".date_th($result_sell['sell_date'])."</td>
            <td align=center>$result_sell[emp_fname] $result_sell[emp_lname]</td>
            <td align=right>".number_format($result_sell['sell_total'],2)." บาท</td>
        </tr>";
		}
		
	?>
    </table>
    
</div>
</body>
</html>