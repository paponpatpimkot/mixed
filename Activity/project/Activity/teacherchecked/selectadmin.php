<?php

  include 'navbar.php';
  include '../connect.php';

?>
<body>
  <style>
    body {font-family: 'Itim' , sans-serif;}
  </style>
  <br>
  <div class="container" style="width:620px;">
     <a href="../teacher/admin/index.php"
       class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
       <form action="result_admin.php" method="post">

  <table class="table table-light">
    <tr class="">
      <th><center>บันทึกผลกิจกรรม</center></th>
    </tr>
    <tr class="">
       <td>



    <label>เลือกปีการศึกษา</label>
  </div>
  <select class="form-control" style="width:250px;" name="education">
    <?php
    $sql="SELECT * FROM education_years ";
    $result=$connect->query($sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
    <option value="<?php echo $row['education_year'] ?>"><?php echo $row['name'] ?></option>
    <?php } ?>
  </select>
  <div class="form-group"><br>
  <label>กรอกประเภทกิจกรรม</label>
  <select class="form-control" style="width:250px;" name="event">
    <option value="วันพุธ">วันพุธ</option>
    <option value="วันศุกร์">วันศุกร์</option>
  </select>
  </div><div class="form-group">

    <label>เลือกห้อง</label>

    <select class="form-control" style="width:250px;" name="classroom">
      <?php

      $sql1 = "SELECT * FROM classroom ORDER BY class_name ASC;";
      $result1 = $connect->query($sql1);
      while ($row1=mysqli_fetch_array($result1)) {

        ?>
      <option value="<?php echo $row1['class_id'] ?>"><?php echo $row1['class_name'] ?></option>
      <?php
        }
       ?>
    </select>


  </div>

</div><div class="form-group">

<button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
</table>
</form>
</div>
