<?php
session_start();
error_reporting(0);
  if(@$_SESSION['position']=="ผู้ดูแลระบบ"){
?>

<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/modal.css">
<link rel="stylesheet" href="../css/loading.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="../images/admin.png" style="width:50px;height:50px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../teacher/admin/index.php">หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../teacher/admin/add_teacher.php">เพิ่มอาจารย์</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../teacher/adminteacher.php">แก้ไขข้อมูลอาจารย์</a>
      </li>
    </ul>

    <ul class="navbar-nav my-2 my-lg-0">
        <a class="nav-link" href="edit_admin.php">
          <?php
           echo "คุณ ";
           echo $_SESSION['name'];
           echo " ( สถานภาพ : ";
           echo $_SESSION['position'];
           echo " ) ";


           ?>



        <a class="nav-link" href="../logout.php" style="color:red;">ออกจากระบบ</a>

  </div>
</nav>

<?php } ?>
<?php
session_start();
error_reporting(0);
  if(@$_SESSION['position']=="อาจารย์"){
?>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/bootstrap.css">
 <link rel="stylesheet" href="../css/modal.css">
 <link rel="stylesheet" href="../css/loading.css">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <img src="../images/admin.png" style="width:50px;height:50px;">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
                 <a class="nav-link" href="../teacher/teacher/index.php">หน้าแรก <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">

       </li>
       <li class="nav-item">
       </li>
     </ul>

     <ul class="navbar-nav my-2 my-lg-0">
       <a class="nav-link" href="edit_teacher.php">
           <?php
            echo "คุณ ";
            echo $_SESSION['name'];
            echo " ( สถานภาพ : ";
            echo $_SESSION['position'];
            echo " ) ";
            ?>
     <a class="nav-link" href="../logout.php" style="color:red;">ออกจากระบบ</a>

   </div>
 </nav>
<?php } ?>
