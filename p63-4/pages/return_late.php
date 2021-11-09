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
                <h2>Return Late Report</h2> 
        </div>
        <div class="row">
            <div class="row col-sm-12 col-lg-12 col-md-12 ">
             </div>
            <div class="card-body table-responsive">      
            <table class="table table-hover text-center">
                <thead>
                 <tr class="bg-success text-white">
                    <th>Bororw ID</th>
                    <th>Name</th>
                    <th>Borrow Date</th>                 
                    <th>Manage</th>
                 </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM borrow LEFT JOIN user ON borrow.User_id = user.Username WHERE DATEDIFF(CURDATE(),Datetime_borrow) >= 1 AND NOT borrow.Borrow_id IN (SELECT Borrow_id FROM givback)";
                        $query = $connect->query($sql);
                            while($row = $query->fetch_array()){

                            
                    ?>
                        <tr>
                            <td><?php echo $row['Borrow_id'];?></td>
                            <td><?php echo $row['Name']."  ".$row['Surname'];?></td>
                            <td><?php echo "<i style='color:red'>".$row['Datetime_borrow']."</i>";?></td>                                 
                            <td>
                            <a href="return_late_report.php?id=<?php echo $row['Borrow_id'];?>"><button type="button" rel="tooltip" class="btn btn-info btn-round">
                                <i class="material-icons">edit</i>&nbsp;</button>
                                </a>
                            </td>
                        <?php } ?> 
                </tbody>
            </table>    
        </div> 
</div>
</div>
</body>
</html>