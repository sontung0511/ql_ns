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
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $showData = "SELECT id, ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_sua, ngay_sua FROM phong_ban WHERE id = $id";
    $result = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($result);
    $personEdit = $row_acc['ho'] . " " . $row_acc['ten'];
  }

  // save record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
    $roomName = $_POST['roomName'];
    $description = $_POST['description'];
    $dateEdit = date("Y-m-d H:i:s");

    // validate
    if(empty($roomName))
      $error['roomName'] = 'Please enter <b> Name Department </b>';

    if(!$error)
    {
      $showMess = true;
      $update = " UPDATE phong_ban SET
                  ten_phong_ban = '$roomName',
                  ghi_chu = '$description',
                  nguoi_sua = '$personEdit',
                  ngay_sua = '$dateEdit'
                  WHERE id = $id";
      mysqli_query($conn, $update);
      $success['success'] = 'Save success.';
      echo '<script>setTimeout("window.location=\'sua-department.php?p=staff&a=room&id='.$id.'\'",1000);</script>';
    }

  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> OVERVIEW</a></li>
        <li><a href="department.php?p=staff&a=room">Department</a></li>
        <li class="active">Correction repair Department</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Correction repair Department</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php 
                // show error
                if(isset($error)) 
                {
                  if($showMess == false)
                  {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                    echo "<h4><i class='icon fa fa-ban'></i> Error!</h4>";
                    foreach ($error as $err) 
                    {
                      echo $err . "<br/>";
                    }
                    echo "</div>";
                  }
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
                      <label for="exampleInputEmail1">Code Department: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="roomCode" value="<?php echo $row['ma_phong_ban']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name Department: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Import Name Department" value="<?php echo $row['ten_phong_ban']; ?>" name="roomName">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description: </label>
                      <textarea id="editor1" rows="10" cols="80" name="description"><?php echo $row['ghi_chu']; ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Repairer: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $personEdit; ?> " name="personEdit" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correction date: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo date('d-m-Y H:i:s'); ?>" name="dateEdit" readonly>
                    </div>
                    <!-- /.form-group -->
                    <button type="submit" class="btn btn-warning" name="save"><i class="fa fa-save"></i> Save </button>
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