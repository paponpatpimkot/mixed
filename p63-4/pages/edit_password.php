<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="edit_password_save.php" method="post">
<?php
?>
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Change Password</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" >Old Password</label>
                        <input type="password" class="form-control" name="old_pass">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >New Password</label>
                        <input type="password" class="form-control" name="new_pass">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Confirm Password</label>
                        <input type="password" class="form-control" name="new_pass2">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">ยืนยัน</button>
                        <button type="cancel" class="btn btn-outline-danger" name="cancel">ยกเลิก</button>
                    </div>
                </div>
            </div>  
        </div>
    </form>
</body>
</html>