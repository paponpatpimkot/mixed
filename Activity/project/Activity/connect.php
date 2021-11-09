<meta charset="utf-8">
<?php
  $connect=mysqli_connect('localhost','root','','activity');
    //$connect=mysqli_connect('localhost','ittatccom_603905','6039010005','ittatccom_603905') or die ("ไม่สามารถติดต่อกับเซิฟเวอร์ได้");
    $connect->query('SET NAMES UTF8');


        function date_th($ddd){
        $day_th = date('d',strtotime($ddd));
        $month = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $month_th = $month[date('n',strtotime($ddd))];
        $year_th = date('Y',strtotime($ddd))+543;
        $day_th = $day_th." ".$month_th." ".$year_th;
        return $day_th;
      }



?>
