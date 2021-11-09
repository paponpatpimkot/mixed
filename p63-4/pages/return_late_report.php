<?php
    include '../connect.php';
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../caa/bootstrap.min.css">
    <style>
        td,th{
            padding:1px 5px 1px 5px !important;
        }
        .border_top{
            border-top: 1pt solid black !important;
        }.border_bottom{
            border-bottom: 1pt solid black !important; 
        }.border_left{
            border-left: 1pt solid black !important;
        }.border_right{
            border-right:1pt solid black !important;
        } p{
           font-size: 98.2%; 
        } @media print{
            #print{
                display:none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-xs-7" style="margin-top:5px;">
                <div class="form-group">
                    <p style="text-align: right;">(<?php echo $id; ?>) (FM -QA-MM-06-TDV-02)</p>
                </div>
                <table class="table table-borderless text-center">
                    <thead>
                        <tr class="border_top border_left border_right border_bottom">
                            <th width="35%;" class="border_right" valign="middle"><img src="../lool.png" width="50%" style="margin-top:10%;margin-bottom:10%;"></th>
                             <th style="text-align: center;" valign="middle">COLLECTION LETTER </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i style="color:white;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"></td>
                            <td style="text-align: right;"><p>Date&nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d'); ?><p></td>
                        </tr>
                    </tbody>
                 </table>
                 <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="" width="50%"></th>
                            <th></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $sql = "SELECT * FROM borrow 
                                LEFT JOIN user ON borrow.User_id = user.Username
                                WHERE Borrow_id = '$id'";
                                $query = $connect->query($sql);
                                $fetch = mysqli_fetch_array($query);
                            ?>
                            <td><p>Name-Surname : &nbsp;&nbsp;<?php echo $fetch['Name']." &nbsp; ".$fetch['Surname']; ?></td>
                            <td >Pers.No : &nbsp;&nbsp;<?php echo $fetch['Username'];?></td>
                        </tr>
                    </tbody>
                 </table>
                 <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $sql5 = "SELECT DATE_FORMAT(Datetime_borrow,'%d/%m/%Y') as Days FROM borrow WHERE Borrow_id = '$id'";
                                $query = $connect->query($sql5);
                                $fetch = mysqli_fetch_array($query);
                            ?>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As you have borrowed tools from STORE on DATE &nbsp;<?php echo $fetch['Days']; ?>&nbsp;
                            Util today the deadline has passed 1 working day, you have left the tools listed below.
                            </td>
                        </tr>
                    </tbody>
                 </table>
                 <table class="table text-center table-borderless">
                 <thead>
                    <tr>
                        <th class="" width="10%"></th> 
                        <th class="" width="60%"></th>
                        <th class="" width="20%"></th>
                    </tr>
                 </thead>
                 <tbody>
                    <?php
                        $sql = "SELECT * FROM borrowdetail
                        LEFT JOIN deviceitem ON borrowdetail.barcode = deviceitem.Barcode
                        LEFT JOIN device ON deviceitem.Device_id = device.Device_id
                        WHERE Borrow_id = '$id' AND Sitems_ID = 0 AND Sreturn_ID = 2
                        ";
                        $query = $connect->query($sql);
                        $i = 1;
                        while($row = $query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $i++."."; ?></td>
                        <td><?php echo $row['Barcode']." : ".$row['Device_name'];?></td>
                        <td>QTY &nbsp;&nbsp;&nbsp;1 &nbsp;&nbsp;&nbsp;EA.</td>
                    </tr>
                    <?php  
                        } 
                    ?>
                 </tbody>
                 </table>
                 <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Therefore informed to let you know and hurry to contact Store Officer according to the tool you
                            have borrowed to make the return or inform the reason for the late return of the tool together with the signature as evidence with the Store
                            Officer within 3 working days(from the date of issue)</p>
                            </td>
                        </tr>
                    </tbody>
                 </table>
                 <table class="text-center table table-borderless col-sm-12 col-xs-12">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>............................................................</td>
                            <td>............................................................</td>
                        </tr>
                        <tr>
                            <td>( STORE KEEPER SIGNATURE )</td>
                            <td>( MAINTENANCE MANAGER SIGNATURE )</td>
                        </tr>   
                    </tbody>
                 </table>
                 <table>
                    <thead>
                     <th>
                        ---------------------------------------------------------------------------------------------------------
                    </th> 
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td> 
                        </tr> 
                        <tr>
                            <td>TO STORE OFFICER</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Me ............................................................ ID.Number ............................................................ Contact the
                            tool with a scheduled on Date .................................................. if the date return has passed and has not yet returned I will agree with to let the Store send
                            the accusations report to Maintenance Manager to consider punishment. Therefore signed the handwriting used as evidence
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group" style="text-align:right;">
                    <button id="print" class="btn btn-success" onclick="print()">Print</button> <button id="print" class="btn btn-outline-danger" onclick="location.href='index.php?page=return_late';">Back</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../ja/bootstrap.min.js"></script>
</body>
</html>