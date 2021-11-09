<?php
  session_start();
  session_destroy();
  echo "<script>alert('คุณได้ทำการออกจากระบบเรียบร้อยแล้วแล้ว')</script>";
echo "<script>window.location.href='index.php'</script>";
 ?>
