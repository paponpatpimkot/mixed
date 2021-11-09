<?php
    include '../connect.php';

    $sql = "SELECT * FROM borrow LEFT JOIN user ON borrow.User_id = user.Username WHERE DATEDIFF(CURDATE(),Datetime_borrow) >= 1 AND NOT Borrow_id IN (SELECT Borrow_id FROM givback)";
    $query = $connect->query($sql);
        while($row = $query->fetch_array()){
            echo $row['Borrow_id']."<br>";
        }
?>