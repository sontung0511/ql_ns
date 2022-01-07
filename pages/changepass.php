<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');


  // save
  if(isset($_POST['save']))
  {
    // create error array
    $error = array();
    $success = array();
    $showMess = false;

    // get value
    $email = $row_acc['email'];
    $oldPass = md5($_POST['oldPass']);
    $newPass = md5($_POST['newPass']);
    $reNewPass = md5($_POST['reNewPass']);

    // validate
    if(empty($_POST['oldPass']))
      $error['oldPass'] = 'Please enter <b> old password  </b>';

    if(empty($_POST['newPass']))
      $error['newPass'] = 'Please enter <b> new password  </b>';

    if(empty($_POST['reNewPass']))
      $error['reNewPass'] = 'Please enter  <b> new password again </b>';

    if(!empty($_POST['oldPass']) && $oldPass != $row_acc['mat_khau'])
      $error['errorPass'] = 'password old <b> incorrect </b>. Please retry!';

    if($newPass != $reNewPass)
      $error['checkNotSame'] = 'password new do not <b> duplicate </b>. Please retry!';


    // save to db
    if(!$error)
    {
      $showMess = true;
      // update record
      $update = " UPDATE tai_khoan SET
                  mat_khau = '$newPass'
                  WHERE email = '$email'";   
      mysqli_query($conn, $update);
      $success['success'] = ' Change password new success.';
      echo '<script>setTimeout("window.location=\'changepass.php?p=account&a=changepass\'",1000);</script>';
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change password
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> OVERVIEW</a></li>
        <li><a href="account_information.php?p=account&a=profile">Account</a></li>
        <li class="active">Change password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row_acc['ten']; ?> <?php echo $row_acc['ho']; ?></h3>

              <p class="text-muted text-center">
                <?php 

                  if($row_acc['quyen'] == 1)
                  {
                    echo "manager";
                  }
                  else
                  {
                    echo "employee";
                  }

                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Access times:</b> <a class="pull-right"><?php echo number_format($row_acc['truy_cap']); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Date created:</b> <a class="pull-right">
                    <?php 
                      $date_cre = date_create($row_acc['ngay_tao']);
                      echo date_format($date_cre, 'd/m/Y');
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Correction date:</b> <a class="pull-right">
                    <?php 
                      $date_edi = date_create($row_acc['ngay_sua']);
                      echo date_format($date_edi, 'd/m/Y');
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Status:</b> <a class="pull-right">Working</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Change password</a></li>
            </ul>
            <div class="tab-content">
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
                // show error
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
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" method="POST">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"> current Password  <b style="color: red;">*</b></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Password old" name="oldPass" value="<?php echo isset($_POST['oldPass']) ? $_POST['oldPass'] : ''; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label"> New Password  <b style="color: red;">*</b></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputEmail" placeholder="Password new" name="newPass" value="<?php echo isset($_POST['newPass']) ? $_POST['newPass'] : ''; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Import  new password  again <b style="color: red;">*</b></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Import lại password new" name="reNewPass" value="<?php echo isset($_POST['reNewPass']) ? $_POST['reNewPass'] : ''; ?>"> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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