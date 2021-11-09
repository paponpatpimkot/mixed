<?php
session_start();
error_reporting(0);
  if(@$_SESSION['position']!="อาจารย์"){
    echo "<script>alert('คุณไม่ใช่ อาจารย์ กรุณา login ใหม่')</script>";
    echo "<script>window.location.href='../../index.php'</script>";
  }
  include 'navbar.php'
?>

<body>

    <br> 
    <div class="box box-primary " style="margin-left:200px;">        
      <img src="../../images/student.png" style="width:100px;height:100px;">
      <h4>จัดการข้อมูลนักศึกษา : <br></h4>
        <a href="../../management/field.php" style="margin-left:100px;">ดูรายละเอียด</a>
        </div>
    <br> 
    <div  class="box" style="margin-left:600px;margin-top:-210px;">        
      <img src="../../images/book.png" style="width:100px;height:100px;">
      <h4>เช็คกิจกรรม : <br></h4>
          <a href="../../teacherchecked/selectteacher.php"style="margin-left:100px;">ดูรายละเอียด</a>
    </div>
    <br>
    <div class="box" style="margin-left:1000px;margin-top:-185px;">         
      <img src="../../images/book.png" style="width:100px;height:100px;">
      <h4>ตรวจสอบผลกิจกรรม : </h4>
          <a href="../../teacherchecked/teacher_examine.php"style="margin-left:100px;">ดูรายละเอียด</a>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
  <div>
    <footer>
      <div style="margin-left:1000px;">
    Icons made by <a href="https://www.flaticon.com/authors/flat-icons"
    title="Flat Icons">Flat Icons</a> from <a href="https://www.flaticon.com/"
    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"
       title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
  </div>
</footer>

</body>
