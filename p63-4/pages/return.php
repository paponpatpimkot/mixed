<body onload="document.frm.user_id.focus();">
<div class="card card-nav-tabs">
  <div class="card-header card-header-primary ">
    Return Form  
  </div>
  <div class="card-body">
    <h5 class="card-title text-right">Date : <?php echo date("d-m-Y") ?></h5>
    <form action="index.php?page=return2" method="POST">
        <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter Borrower ID or Name" name="ukeyword" id="user_id">
            </div>
            <div class="col">
              <input type="submit" class="btn btn-success" value="search" name="search">
            </div>
        </div>             
    </form>
  </div>
</div>
</body>