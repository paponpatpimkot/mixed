<?php 
    include 'navbar.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM document WHERE Document_id = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='document.php'</script>";
?>