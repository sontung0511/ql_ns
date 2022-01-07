<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // show data
  $NV = "SELECT id, ma_nv, ten_nv FROM nhanvien";
  $resultNV = mysqli_query($conn, $NV);
  $arrNV = array();
  while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
  }


  // delete record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
   
    $songaynghi = $_POST['songaynghi'];
    $lydo = $_POST['lydo'];
    $chitiet = $_POST['chitiet'];
    $tennhanvien = $_POST['tennhanvien'];


    // validate
    if($maNhanVien == 'chon')
      $error['maNhanVien'] = 'error';
    if(empty($songaynghi))
      $error['songaynghi'] = 'error';
    if(empty($lydo))
      $error['lydo'] = 'error';

      // kiem tra nhan vien co dang nghi lam hay khong
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Register
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> OVERVIEW</a></li>
        <li><a href="mission.php?p=collaborate&a=add-collaborate">register</a></li>
        <li class="active">Apply</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">apply for manager</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php 
                // show error
                if($row_acc['quyen'] == 1) 
                {
                  echo "<div class='alert alert-warning alert-dismissible'>";
                  echo "<h4><i class='icon fa fa-ban'></i> Notification!</h4>";
                  echo "You <b> no permission </b> perform this function.";
                  echo "</div>";
                }
              ?>
              <?php 
                // show success
                if(isset($success)) 
                {
                  if($showMess == true)
                  {
                    echo "<div class='alert alert-success alert-dismissible'>";
                    echo "<h4><i class='icon fa fa-check'></i> success!</h4>";
                    foreach ($success as $suc) 
                    {
                      echo $suc . "<br/>";
                    }
                    echo "</div>";
                  }
                }
              ?>
              <form action="" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name employee<span style="color: red;">*</span> : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tennhanvien">
                      <small style="color: red;"><?php if(isset($error['tennhanvien'])){ echo 'Please Select employee';} ?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">number day register<span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="songaynghi" value="">
                      <small style="color: red;"><?php if(isset($error['loiNgay'])){ echo 'Start date <b> not more after </b> End date';} ?></small>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">thought of <?php ?> day<span style="color: red;">*</span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">why </label>
                      <textarea id="editor1" rows="10" cols="80" name="why">
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">send files (if any) </label>
                      <textarea id="editor" class="form-control" name="chitiet"></textarea>
                    </div>
                    <!-- /.form-group -->
                    <?php 
                      if($_SESSION['level'] != 1)
                        echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Apply for manager</button>";
                    ?>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
    // include
    include('../layouts/footer.php');
}
  else
  {
    // go to pages login
    header('Location: Login.php');
  }

?>