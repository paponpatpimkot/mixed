<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">หน้าแรก</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
        <li class="nav-item"><a class='nav-link' href="employee.php">จัดการข้อมูลพนักงาน</a></li>
        <li class="nav-item"><a class='nav-link' href="product.php">จัดการข้อมูลสินค้า</a></li>
        <li class="nav-item"><a class='nav-link' href="sell.php">ขายสินค้า</a></li>
        <li class="nav-item"><a class='nav-link' href="report.php">รายงาน</a></li>        
      </ul>
      <ul class='navbar-nav'>
        <li>
          <a href="profile.php" class='nav-link'> <?php echo $_SESSION['emp_fname']." ".$_SESSION['emp_lname']; ?>(<?php echo $_SESSION['emp_position'] ?>) </a>
        </li>
        <li>
          <a class='nav-danger' href="../logout.php">ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


