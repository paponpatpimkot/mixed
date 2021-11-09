<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<style>
    .h{
        color:blue;
        font-weight:bold;
        font-size:1.3rem;
        padding:10px;
    }
</style><div class="container">
        <div class="row mt-3">
                <h2>Device Report</h2> 
        </div>
        <div class="row">
            <div class="row col-sm-12 col-lg-12 col-md-12 ">
                 <a class="btn btn-success" role="button" href="index.php?page=device_insert">Add Device</a>
                 <a style="margin-left:5%;"class="btn btn-danger" role="button" href="index.php?page=device_delall">Delete Device</a> 
            </div>
            <div class="card-body table-responsive">      
            <table class="table table-hover text-center">
                <thead>
                 <tr class="bg-success text-white">
                    <th>Device ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Brands</th>
                    <th>QTY.</th>         
                    <th>Catagory</th>             
                    <th>Manage</th>
                 </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM device 
                        LEFT JOIN type ON device.Type_id = type.Type_id
                        LEFT JOIN brands ON device.Brand_id = brands.Brand_id
                        LEFT JOIN devicecatagory ON device.Devcat_ID = devicecatagory.Devcat_ID";
                        $query = $connect->query($sql);
                        $key=0;
                        while($row=$query->fetch_array()){
                    ?>
                        <tr>
                            <td><a href="" data-toggle="modal" data-target="#device_modal_id<?php echo $key?>">
                                    <?php echo $row['Device_id']?>
                                </a></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#device_modal<?php echo $key?>">
                                    <?php echo $row['Device_name']?>
                                </a>
                            </td>
                            <td><?php echo $row['Type_name'];?></td>
                            <td><?php echo $row['Brand_name'];?></td>
                            <td><?php echo $row['QTY'];?></td>
                            <th><?php echo $row['Devcat_NAME'];?></td>                              
                            <td>
                            <a href="index.php?page=device_edit&id2=<?php echo $row['Device_id'];?>"><button type="button" rel="tooltip" class="btn btn-success btn-round">
                    <i class="material-icons">edit</i>&nbsp;
                </button></a>
                            <a href="index.php?page=device_reduce&id2=<?php echo $row['Device_id'];?>&sub=sub"><button type="button" rel="tooltip" class="btn btn-danger btn-round">
                    <i class="material-icons">close</i>&nbsp;
                </button></a>
                            <a href="index.php?page=device_update&id2=<?php echo $row['Device_id'];?>"><button type="button" rel="tooltip" class="btn btn-info btn-round">
                                                    <i class="material-icons">person</i>&nbsp;
                                                         </button></a>

                            </td>
                            <!--Modals-->
                            <div class="modal fade" id="device_modal<?php echo $key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Device ID : <?php echo $row['Device_id']?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col h">Device Name</div>
                                                <div class="col"><?php echo $row['Device_name'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Description</div>
                                                <div class="col"><?php echo $row['Description'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Type</div>
                                                <div class="col"><?php echo $row['Type_name'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Type of usage</div>
                                                <div class="col">
                                                    <?php
                                                        if($row['type'] == 'borrow'){
                                                            echo "Borrow";
                                                        }else if($row['type'] == 'disposable'){
                                                            echo "Disposable Use";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Brands</div>
                                                <div class="col"><?php echo $row['Brand_name'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Mechanical inf.</div>
                                                <div class="col"><?php echo $row['Mechanical_inf'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Electrical inf.</div>
                                                <div class="col"><?php echo $row['Electrical_inf'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Date in</div>
                                                <div class="col"><?php echo $row['Datein'];?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col h">Qty</div>
                                                <div class="col"><?php echo $row['QTY'];?></div>
                                            </div>   
                                            
                                        </div>      
                                    </div>
                                </div>
                            </div> 
                            <!--End modal-->     
                            <div class="modal fade bd-example-modal-lg" id="device_modal_id<?php echo $key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Device Barcode : <?php echo $row['Device_id'];?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body modal-lg text-center">
                                            <div class="row">
                                                <div class="col h">Device_ID</div>
                                                <div class="col h">Barcode</div>
                                                <div class="col h">Location</div>
                                                <div class="col h">Date_in</div>
                                                <div class="col h">Status</div>
                                            </div>
                                        <?php
                                            $barcode = $row['Device_id'];
                                            $sql2 = "SELECT * FROM deviceitem 
                                            LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
                                            LEFT JOIN statusitems ON deviceitem.Sitems_ID = statusitems.Sitems_ID
                                            LEFT JOIN statusreturns ON deviceitem.Sreturn_ID = statusreturns.Sreturn_ID
                                            WHERE Device_id = '$barcode' ORDER BY Barcode";
                                            $query2 = $connect->query($sql2);
                                            while($row2 = $query2->fetch_array()){
                                                
                                            
                                        ?>
                                            <div class="row">
                                                <div class="col"><?php echo $barcode; ?></div>
                                                <div class="col "><?php echo $row2['Barcode'];  ?></div>
                                                <div class="col "><?php echo $row2['Location_name'];  ?></div>
                                                <div class="col"><?php echo $row2['Date_in']; ?></div>
                                                <div class="col "><?php echo $row2['Sitems_Name'];  ?></div>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                        </div>      
                                    </div>
                                </div>
                            </div>                                              
                        </tr>
                        <?php 
                            $key++;
                            } 
                        ?>
                </tbody>
            </table>    
        </div> 
</div>
</div>
</body>
</html>