<?php include 'navbar.php' ?>
<?php
session_start();
if(isset($_POST['submit'])){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT * FROM useraccount WHERE username='$username' and password='$password'";
  $result=$connect->query($sql);
  $rows=mysqli_num_rows($result);
  $cols=mysqli_fetch_array($result);
  if($rows==1){
    $_SESSION['username']=$cols['username'];
    $_SESSION['name']=$cols['name'];
    $_SESSION['position']=$cols['position'];
    if($cols['position']=="ผู้ดูแลระบบ"){
      echo "<script>window.location.href='teacher/admin/index.php'
      alert('ยินดีต้อนรับ สถานภาพของคุณคือ ผู้ดูแลระบบ')
      </script>";
    }elseif ($cols['position']=="อาจารย์") {
        echo "<script>window.location.href='teacher/teacher/index.php'
        alert('ยินดีต้อนรับ สถานภาพของคุณคือ อาจารย์ ')
        </script>";
      }else {
        echo "<script>alert('คุณไม่ใช่ผู้ดูแลระบบหรืออาจารย์')</script>";

        }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <br> 
    <div style="margin-left:200px;margin-top:50px;">        
      <img src="images/professor.png" style="width:400px;height:400px;">
      <h4>อาจารย์ : <br></h4>
          <a onclick="document.getElementById('id01').style.display='block'" class="btn" style="margin-left:100px;
          width:300px;"><h1>เข้าสู่ระบบ</h1></a>
        </div>
    <br> 
    <div style="margin-left:850px;margin-top:-555px;">        
      <img src="images/student.png" style="width:400px;height:400px;">
      <h4>นักศึกษา : <br></h4>
          <a href="student/select.php" class="btn "style="margin-left:100px;width:300px;"><h1>ดูผลกิจกรรม</h1></a>
    </div>

<br><br>
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


<div id="id01" class="modal">

  <form class="modal-content animate" <?php $_SERVER['PHP_SELF'];?> method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/professor.png"alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>รหัสผู้ใช้</b></label>
      <input type="text" placeholder="กรุณากรอกชื่อผู้ใช้" name="username" required>
      <label for="psw"><b>รหัสผ่าน</b></label>
      <input type="password" placeholder="กรุณากรอกรหัสผ่าน" name="password" required>

      <button type="submit" class="btn btn-primary" name="submit" value="Login">เข้าสู่ระบบ</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>

<script>
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>
