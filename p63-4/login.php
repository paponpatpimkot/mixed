<html>
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">  
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Aircraft Maintenance Store
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="assets/css/.min.css?v=2.1.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>
    <body onload="document.frmMain.txtUser.focus();">
        <div class="container" style="margin:100px auto;">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div style="float:left">
                                <h4 class="card-title">Sign in</h4>
                                <p class="card-category"></p>
                            </div>    
                            <div style="float:right">
                                <img src="assets/img/logo.png" height="50">
                            </div>                             
                        </div>
                        <div class="card-body">
                            <form action="chk_login.php" method="POST" name="frmMain">
                                <div class="form-group">                                    
                                    <label class="bmd-label-floating col-md-4">
                                        <i class="material-icons">person</i>
                                        Username
                                    </label>
                                    <div class="col-md-12">                                    
                                        <input type="text" class="form-control" name="username" id="txtUser" placeholder="admin">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="bmd-label-floating col-md-4">
                                        <i class="material-icons">lock</i>
                                        Password
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" placeholder="1234">
                                    </div>
                                </div>                                
                                <div class="form-group">                                
                                    <div class="col-md-0"></div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-info" name="login">Sign in</button>
                                    </div>
                                </div>                                 
                            </form>                            
                        </div>
                        <div class="card-footer">
                            <div style="flot:left;padding-left:20px;">
                                Don't have account ? please
                                <a href="pages/register.php" style="color:orange;font-weight:bold">Register</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
                    
    </body>
</html>