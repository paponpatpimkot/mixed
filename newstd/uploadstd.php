
<?php
include 'config.php';
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
        $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
        while (($ar = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
            $sql = "INSERT INTO student VALUES('".$ar[0]."','".$ar[1]."','".$ar[2]."','".$ar[3]."','".$ar[4]."','".$ar[5]."','".$ar[6]."','".$ar[7]."')";
            $con->query($sql);	
        }
        fclose($objCSV);
        echo "Upload & Import Done.";
    }
    $select_std=$con->query("SELECT * FROM student");
?>
<div class="container w-50 mt-5">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <input name="fileCSV" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button name="submit" class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
        </div>   
    </form>

    <table class="table table-striped">
        <tr>
            <th>ลำดับที่</th>
            <th>รหัสประจำตัว</th>
            <th>คำนำหน้าชื่อ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>รหัสประจำตัวประชาชน</th>
            <th>การจัดการ</th>
        </tr>
        <?php
            $i=1;
            while($row=mysqli_fetch_array($select_std)){?>
        <tr>
            <td><?php echo $i;$i++?></td>
            <td><?php echo $row['std_id']?></td>
            <td><?php echo $row['prename']?></td>
            <td><?php echo $row['fname']?></td>
            <td><?php echo $row['lname']?></td>
            <td><?php echo $row['card_id']?></td>
            <td>ลบ/แก้ไข</td>
        </tr>
        <?php 
            }
        ?>
    </table>    



</div>
