<div class="card card-nav-tabs card-plain">
<div class="card card-nav-tabs card-plain">
    <div class="card-header card-header-danger">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs" >
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=setting" >usertype</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=device_type" >type of device</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=location" >location of device</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=brands" >brands of device</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=device_barcode">device barcode</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><div class="card-body ">
        <div class="tab-content">
            <div class="pane" id="usertype">
                <?php require_once ("user_type.php"); ?>
             </div>
        </div>
    </div>
  </div>
  </div>