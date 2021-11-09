<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">  
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="../assets/css/.min.css?v=2.1.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container" style="width:70%">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <div style="float:left">
                            <h4 class="card-title">Register</h4>
                        </div> 
                        </div>
                        <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">User ID</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>            
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-group">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Surname</label>
                                        <input  type="text" class="form-control" name="surname">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Telelphone Number</label>
                                        <input class="form-control" type="text" name="telephone">
                                     </div>
                                     <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="submit">Apply</button> 
                                        <a href="../index.php" class="btn btn-outline-danger">Cancel</a> 
                                     </div>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
              </li>
              <li>
                <a href="">
                </a>
              </li>              
          </nav>
        </div>
      </footer>
    </body>
</html>