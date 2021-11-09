<body onload="document.frm.user_id.focus();">
<div class="card card-nav-tabs">
  <div class="card-header card-header-info">
    Borrow Form
  </div>
  <div class="card-body">
    <h5 class="card-title text-right">Date : <?php echo date("d-m-Y") ?></h5>
    <form action="index.php?page=borrow2" method="POST">
        <div class="form-row">
            <div class="col ">
              <input type="text" class="form-control" placeholder="Enter Borrower Username" name="ukeyword" id="user_id">
            </div>
            <div class="col-sm-5">
              <input type="text" class="form-control" placeholder="Jobcard" name="jobcard" id="jobcard">
            </div>
          </div>
            <div class="form-row">
            <div class="col-sm-3 mt-3">
            <div class="form-group mt-1">
                        <select class="form-control" name="purid"> 
                        <?php 
                            $sql = "SELECT * FROM purpose ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['PurID'];?>"><?php echo $row['PurName'];?></option>
                        <?php
                            }
                        ?>
                        </select>
            </div>
            </div>
            
            <div class="col mt-3 ml-5">
              <input type="submit" class="btn btn-primary" value="search" name="search">
            </div>
            </div>
        </div>             
    </form>
  </div>
</div>
</body>