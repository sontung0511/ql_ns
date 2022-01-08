<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');
  //data employee
  $NV = "SELECT id, ma_nv, ten_nv FROM nhanvien";
  $resultNV = mysqli_query($conn, $NV);
  $arrNV = array();
  while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
  }

  // save
  if(isset($_POST['save']))
  {
    // create error array
    $error = array();
    $success = array();
    $showMess = false;

    // get value
    
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $repass = md5($_POST['repass']);
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $access = 0;
    $date_create = date("Y-m-d H:i:s");
    $date_update = date("Y-m-d H:i:s");

    // validate

    if(empty($_POST['firstName']))
      $error['firstName'] = 'Please enter <b> Name </b>';

    if(empty($_POST['email']))
      $error['email'] = 'Please enter <b> email </b>';

    if(empty($_POST['password']))
      $error['password'] = 'Please enter <b> password </b>';


    if((!empty($_POST['password']) && !empty($_POST['repass'])) && ($password != $repass))
      $error['checkPass'] = 'password không <b> trùng nhau </b>. Please enter lại!.';

    // check email exists
    $checkEmail = "SELECT email FROM tai_khoan WHERE email = '$email'";
    $rs_checkEmail = mysqli_query($conn, $checkEmail);
    if(mysqli_num_rows($rs_checkEmail) > 0)
      $error['checkEmail'] = 'Email <b> đã được sử dụng </b>. Please enter email khác!.';
    
    // validate file image
    $target_dir = '../uploads/images/';
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($image)
    {
      // check file type
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif")
      {
        $error['formatImage'] = 'image không đúng định dạng: <b>jpg</b>, <b>jpeg</b>, <b>png</b>, <b>gif</b>';
      }
      else
      {
        // check exists
        if (file_exists($target_file)) 
        {
          $nameImage = time() . "." . $imageFileType;
        }
        else
        {
          $nameImage = time() . "." . $imageFileType;
        }
      }
    }

    // save to db
    if(!$error)
    {
      $showMess = true;

      if($image)
      {

        // insert record
        $insert = "INSERT INTO tai_khoan(ho, ten, hinh_anh, email, mat_khau, so_dt, quyen, trang_thai, truy_cap, ngay_sua, ngay_tao) VALUES('$lastName', '$firstName', '$nameImage', '$email', '$password', '$phone', $level, $status, $access, '$date_create', '$date_update')";   
        mysqli_query($conn, $insert);
        // add image to folder
        $dirFile = $target_dir . $nameImage;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dirFile);
        $success['success'] = 'Create Account new success.';
        echo '<script>setTimeout("window.location=\'tao-tai-khoan.php?p=account&a=add-account\'",1000);</script>';
      }
      else
      {
        $nameImage = 'admin.png';
        // insert record
        $insert = "INSERT INTO tai_khoan(ho, ten, hinh_anh, email, mat_khau, so_dt, quyen, trang_thai, truy_cap, ngay_sua, ngay_tao) VALUES('$lastName', '$firstName', '$nameImage', '$email', '$password', '$phone', $level, $status, $access, '$date_create', '$date_update')";   
        mysqli_query($conn, $insert);
        $success['success'] = 'Create Account new success.';
        echo '<script>setTimeout("window.location=\'tao-tai-khoan.php?p=account&a=add-account\'",1000);</script>';
      }
    }
    $tenNhanVien = $_POST['tenNhanVien'];
    $checkin = mysqli_query($mysqli ,"SELECT *FROM nhanvien , tai_khoan WHERE nhanvien.ten_nv = tai_khoan.ten_nv LIMIT 1 ");
    $count = mysqli_num_rows($checkin);
    
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Account
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> OVERVIEW</a></li>
        <li><a href="tao-tai-khoan.php?p=account&a=add-account">Account</a></li>
        <li class="active">Create new Account</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Account</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <?php 
                  // show error
                  if($row_acc['quyen'] != 1) 
                  {
                    echo "<div class='alert alert-warning alert-dismissible'>";
                    echo "<h4><i class='icon fa fa-ban'></i> Notification!</h4>";
                    echo "You <b> no permission </b> perform this function.";
                    echo "</div>";
                  }
                ?>

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
                <div class="form-group">
                  <label for="exampleInputEmail1">Select image: </label>
                  <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                  <p class="help-block">Please Select file đúng định dạng: jpg, jpeg, png, gif.</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name: <b style="color: red;">*</b></label>
                  <select class="form-control" name="firstName">
                        <option value="chon">--- Select employee you need create emply to creat account---</option>
                        <?php 
                        foreach ($arrNV as $nv) 
                        {
                          echo "<option value='".$nv['ten_nv']."'> ".$nv['ten_nv']."</option>";
                        }
                        ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email: <b style="color: red;">*</b></label>
                  <select class="form-control" name="email">
                        <option value="chon">--- Select employee you need create emply to creat account---</option>
                        <?php 
                        foreach ($arrNV as $nv) 
                        {
                          echo "<option value='".$nv['ten_nv']."@gmail.com'> ".$nv['ten_nv']. "@gmail.com</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">password: <b style="color: red;">*</b></label>
                  <select class="form-control" name="password">
                        <option value="chon">--- password ---</option>
                        <?php 
                        foreach ($arrNV as $nv) 
                        {
                          echo "<option value='".$nv['ten_nv']."'>".$nv['ten_nv']."</option>";
                        }
                        ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">number Phone:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Import number Phone" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Power:</label>
                  <div class="col-md-12">
                    <label>
                      <input type="radio" name="level" class="minimal" value="1" checked>
                      manager
                    </label>
                    <label>
                      <input type="radio" name="level" class="minimal" value="0">
                      employee
                    </label>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Status:</label>
                  <div class="col-md-12">
                    <label>
                      <input type="radio" name="status" class="minimal" value="1" checked>
                        Working
                    </label>
                    <label>
                      <input type="radio" name="status" class="minimal" value="0">
                        has retired
                    </label>
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php 
                  if($_SESSION['level'] == 1)
                    echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Create Account new</button>";
                ?>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
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