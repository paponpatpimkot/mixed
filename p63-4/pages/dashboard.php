<?php
    $date = date("Y-m-d");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment_returned</i>
          </div>
          <p class="card-category">Borrowed today</p>
          <h3 class="card-title"><?php
            $sql3 = "SELECT * FROM borrow WHERE Datetime_borrow LIKE '$date%'";
            $query3 = $connect->query($sql3);
            $num3 = mysqli_num_rows($query3);
            echo $num3;
          ?></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i>
            Last Update <?php echo date("Y:m:s H:i:s")?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment_return</i>
          </div>
          <p class="card-category">Returned today</p>
          <h3 class="card-title"><?php 
              $sql2 = "SELECT * FROM givback WHERE Datetime_return LIKE '$date%'";
              $query2 = $connect->query($sql2);
              $num2 = mysqli_num_rows($query2);
              echo $num2;
          ?></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i>
            Last Update <?php echo date("Y:m:s H:i:s")?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <p class="card-category">All Borrowing</p>
          <h3 class="card-title"><?php 
              $sql1 = "SELECT * FROM borrow";
              $query1 = $connect->query($sql1);
              $num1 = mysqli_num_rows($query1);
              echo $num1;
          ?></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i>
            Last Update <?php echo date("Y:m:d H:i:s")?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">hourglass_top</i>
          </div>
          <p class="card-category">All Return</p>
          <h3 class="card-title"><?php
            $sql4 = "SELECT * FROM givback";
            $query4 = $connect->query($sql4);
            $num4 = mysqli_num_rows($query4);
            echo $num4; 
          ?></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i>Last Update <?php echo date("Y:m:d H:i:s")?>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <div class="row">                        
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">Who haven't returned</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover text-center">
            <thead class="text-warning">
              <th style="width:25%;">Borrow ID</th>
              <th style="width:25%;">User ID</th>
              <th style="width:25%;">Date Borrow</th>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM borrow
                WHERE NOT borrow.Borrow_id IN (SELECT Borrow_id FROM givback)";
                $query = $connect->query($sql);
                while($row = $query->fetch_array()){
                  ?><tr>
                      <td>
                        <a href="" data-toggle="modal" data-target="#borrow_id<?php echo $row['Borrow_id'];?>">
                          <?php echo $row['Borrow_id']?>
                        </a>
                        <!--Modals Borrow-->
              <div class="modal fade" id="borrow_id<?php echo $row['Borrow_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrow ID : <?php echo $row['Borrow_id'];?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body modal-lg text-center">
                                          <div class="row">
                                            <div class="col h">Barcode</div>
                                            <div class="col h">Device Name</div>
                                            <div class="col h">Location</div>
                                            <div class="col h">Pcs</div>
                                          </div>
                                            <?php
                                               $br_id = $row['Borrow_id'];
                                               $sql2 = "SELECT * FROM borrowdetail
                                               LEFT JOIN deviceitem ON deviceitem.Barcode = borrowdetail.Barcode
                                               LEFT JOIN device ON device.Device_id = deviceitem.Device_id
                                               WHERE Borrow_id = '$br_id'";
                                               $query2 = $connect->query($sql2);
                                               while($row2 = $query2 -> fetch_array()){
                                            ?>
                                            <div class="row">
                                              <div class="col"><?php echo $row2['Barcode'];?></div>
                                              <div class="col"><?php echo $row2['Device_name'];?></div>
                                              <div class="col"><?php echo $row2['Location_ID'];?></div>
                                              <div class="col"><?php echo $row2['Pcs'];?></div>
                                            </div>
                                            <?php
                                               }
                                            ?>
                                        </div>      
                                    </div>
                                </div>
                            </div> 
                            <!--End modal-->
                      </td>
                      <td>
                        <a href="" data-toggle="modal" data-target="#User_id<?php echo $row['User_id'];?>">
                            <?php echo $row['User_id']?>
                        </a>
                        <!--Modals Borrow-->
              <div class="modal fade" id="User_id<?php echo $row['User_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrow ID : <?php echo $row['User_id'];?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body modal-lg text-center">
                                          <div class="row">
                                            <div class="col h">User ID</div>
                                            <div class="col h">Name - Surname</div>
                                            <div class="col h">Telephone</div>
                                          </div>
                                          <?php
                                            $u_id = $row['User_id'];
                                            $sql3 = "SELECT * FROM user 
                                            LEFT JOIN usertype ON usertype.UserType_id = user.UserType_id
                                            WHERE Username = '$u_id'";
                                            $query3 = $connect->query($sql3);
                                            while($row3 = $query3->fetch_array()){

                                          ?>
                                          <div class="row">
                                            <div class="col"><?php echo $row3['Username'];?></div>
                                            <div class="col col-sm-12 col-md-6 col-lg-6"><?php echo $row3['Name']." ".$row3['Surname'];?></div>
                                            <div class="col"><?php echo $row3['Telephone'];?></div>
                                          </div>
                                          <?php
                                            }
                                          ?>
                                        </div>      
                                    </div>
                                </div>
                            </div> 
                            <!--End modal-->
                      </td>
                      <td><?php echo $row['Datetime_borrow'];?></td>
                    </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>