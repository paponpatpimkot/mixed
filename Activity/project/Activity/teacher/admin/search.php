<?php

  include 'navbar.php';
  include '../../connect.php';
$username=$_GET['search'];
$name=$_GET['search'];

?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container" style="margin-top:30px;">                                             
      <form action="search.php">                                                                                                                                                                                             
        <input type="text" placeholder="ค้นหา.." name="search">
        <button type="submit" class="btn btn-success">ค้นหา</button>
      </form>                                                                                          
      <table class ="table table-striped" border="1">
      <tr>
            <th><center>ลำดับที่</th>
            <th><center>ชื่อ</th>
            <th><center>ตำแหน่ง</th>
            <th><center>ชื่อผู้ใช้</th>
            <th><center>จัดการ</th>
      </tr>
          <?php
          $sql= "SELECT * FROM useraccount WHERE username='$username' OR name='$name' OR name like '$name%' OR username like '$username%' ";
          $result=$connect->query($sql);
          $i=1;
          while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><center><?php echo $i ?></td>
              <td><center><?php echo $row['name']?></td>
              <td><center><?php echo $row['position']?></td>
              <td><center><?php echo $row['username']?></td>
              <td><center><a href = "edit_teacher.php?username=<?php echo $row['username']?>">แก้ไข</a> /
              <a href = "del_teacher.php?username=<?php echo $row['username']?>"onclick="return confirm('sure?')">ลบ</a></td>
            </tr>
                <?php
              $i++;
    }
               ?>
    </table>

  </body>
</html>
