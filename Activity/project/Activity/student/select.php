<?php

  include 'navbar.php';
  include '../connect.php';

?>

  <br>
  <div class="container" style="width:620px;">
     <a href="../index.php"
       class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
       <form action="result.php" method="post">

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


<br>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
</table>
</form>
</div>
