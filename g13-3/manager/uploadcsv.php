
<?php
include '../config.php';
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($ar = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$sql = "INSERT INTO student VALUES('".$ar[0]."','".$ar[1]."','".$ar[2]."','".$ar[3]."','".$ar[4]."','".$ar[5]."','".$ar[6]."','".$ar[7]."')";
	$con->query($sql);	
}
fclose($objCSV);
echo "Upload & Import Done.";
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-auto">
          <input name="fileCSV" type="file" id="fileCSV">
        </div>
        <div class="col-auto">
            <input name="submit" type="submit" value="Submit">
        </div>
    </div>
</form>
