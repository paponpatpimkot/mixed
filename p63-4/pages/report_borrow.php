<html lang="en">
<?php
    include '../connect.php';
    
?>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        td,th{
            padding:1px 5px 1px 5px !important;
        }
        .border_top {
            border-top: 1pt solid black !important;
        }
        .border_bottom {
            border-bottom: 1pt solid black !important;
        }
        .border_left {
            border-left: 1pt solid black !important;
        }
        .border_right {
            border-right: 1pt solid black !important
        }.footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }@media print{
            #print{
                display:none;
            }
        }
    </style>
</head>
<body>
        <div class="containter">
            <div class="row">
                <div class="col-sm-7 col-sx-7" style="margin-top:0px;">
                    <p style="text-align: right;">(BR-11) (FM-QA-MM-06-TDV-01)</p>
                    <table class="table table-borderless">
                        <thead>
                        <tr class="border_top border_left border_right">
                            <th rowspan="4" width="10%;" class="border_right border_bottom"><img src="../lool.png" width="140px;" height="95px;" style="margin-top:10%;margin-bottom:10%;"></th>
                             <th rowspan="2" class="border_right border_bottom" style="text-align: center;" valign="middle">BORROW & RETURN FORM</th>
                             <th>ID : </th>
                        </tr>

                        <tr>
                            <th class="border_right">Name : </th>
                        </tr>

                        <tr>
                            <th rowspan="2" class="border_right border_bottom" valign="middle" style="text-align:center;">(MM-06-TDV-01)</th>
                            <th class="border_right">DATE : </th>
                            
                        </tr>
                            <th class="border_right border_bottom">Phone : </th>
                        <tr>
                        </tr>
                        
                    </thead>
                    </table>
                    <table style="margin-left:200px;">
                    <thead>
                            <th>Purpose</th>
                            <tr>
                            <th>FOR study : ____________________</th>
                            
                            </tr>
                            <tr>
                            <th>Task number : _________________</th>
                            </tr>
                            <th>FOR Other : ____________________</th>
                        </thead>
                    </table>
                    <table class="table table-borderless" style="margin-top:30px;">
                        <thead>
                            <tr class="border_top border_left border_right border_bottom">
                                <th style="text-align:center;" width="5%" class="border_right">NO.</th>
                                <th style="text-align:center;" width="15%" class="border_right">ITEM NO.</th>
                                <th style="text-align:center;" class="border_right">DESCRIPTION</th>
                                <th style="text-align:center;" width="10%" class="border_right">PCS.</th>
                                <th style="text-align:center;" width="20%" class="border_right">REMARK</th>
                                </tr>
                        </thead>
                        <tbody class="border_left border_right border_top border_bottom">
                        <?php
                               $sql = "SELECT * FROM borrowdetail 
                               LEFT JOIN deviceitem ON borrowdetail.Barcode = deviceitem.Barcode
                               LEFT JOIN device ON deviceitem.Device_id = device.Device_id
                               WHERE Borrow_id = 'BR-11'";
                               $query = $connect->query($sql);
                               $i = 1;
                               while($row = $query->fetch_array()){ ?>
                            <tr class="border_left border_right border_top border_bottom">
                            <td class="border_right" style="text-align:center;"><?php echo $i++; ?></td>
                            <td class="border_right" style="text-align:center;"><?php echo $row['Barcode'];?></td>
                            <td class="border_right" style="text-align:center;"><?php echo $row['Description'];?></td>
                            <td class="border_right" style="text-align:center;">1</td>
                            <td class="border_right"></td>
                            </tr>
                        <?php    
                            }
                        ?>
                            
                        </tbody>
                    </table>
                </table>
            <div class="footer">
                <table style="margin-left:100px;">
                    <thead>
                            <tr>
                            <th>BORROW</th>
                            <th></th>
                            </tr>
                            <tr>
                            <th>STORE Signature : ____________________</th>
                            <th>USER Signature : ____________________</th>
                            
                            </tr>
                            <tr>
                            <th>DATE : ____ /_________ /_____</th>
                            <th>DATE : ____ /_________ /_____</th>
                            </tr>

                        </thead>
                    </table>
                    <table style="margin-top:15px;margin-left:100px;">
                        <thead>
                        <tr style="margin-top:100px;">
                            <th>RETURN CHECK & CLEAN</th>
                            </tr>
                            <tr>
                            <th>STORE Signature : ____________________</th>
                            <th>USER Signature : ____________________</th>
                            
                            </tr>
                            <tr>
                            <th>DATE : ____ /_________ /_____</th>
                            <th>DATE : ____ /_________ /_____</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="form-group mt-2">
                    <button id="print" class="btn btn-success" onclick="print()">Print</button> <button id="print" class="btn btn-outline-danger" onclick="location.href='index.php?page=borrow';">Back</button>
                </div>
                </div>
                </div>
            </div>
        </div>
</body>
</html>