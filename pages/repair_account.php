<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // show detail record
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $showRecord = "SELECT * FROM tai_khoan WHERE id = $id";
    $rs_showRecord = mysqli_query($conn, $showRecord);
    $row = mysqli_fetch_array($rs_showRecord);
  }

  // save
  if(isset($_POST['save']))
  {
    // create error array
    $error = array();
    $success = array();
    $showMess = false;

    // get value
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $date_update = date("Y-m-d H:i:s");

    // validate
    if(empty($_POST['lastName']))
      $error['lastName'] = 'Please enter <b> Surname </b>';

    if(empty($_POST['firstName']))
      $error['firstName'] = 'Please enter <b> Name </b>';

    if($row_acc['email'] == $_POST['email'])
      $error['checkUsing'] = 'Không thể Correction repair <b> Account đang sử dụng</b>';

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
        // update record
        $update = " UPDATE tai_khoan SET
                    ho = '$lastName',
                    ten = '$firstName',
                    hinh_anh = '$nameImage',
                    so_dt = '$phone',
                    quyen = $level,
                    trang_thai = $status,
                    ngay_sua = '$date_update'
                    WHERE id = $id";
        mysqli_query($conn, $update);
        // remove image
        $remove = $target_dir . $row['hinh_anh'];
        if($row['hinh_anh'] != 'admin.png')
        {
          unlink($remove);
        }
        // add image to folder
        $dirFile = $target_dir . $nameImage;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dirFile);
        $success['success'] = 'Correction repair Account success.';
        echo '<script>setTimeout("window.location=\'repair_account.php?p=account&a=list-account&id='.$id.'\'",1000);</script>';
      }
      else
      {

        // update record
        $update = " UPDATE tai_khoan SET
                    ho = '$lastName',
                    ten = '$firstName',
                    so_dt = '$phone',
                    quyen = $level,
                    trang_thai = $status,
                    ngay_sua = '$date_update'
                    WHERE id = $id";
        mysqli_query($conn, $update);
        $success['success'] = 'Correction repair Account success.';
        echo '<script>setTimeout("window.location=\'repair_account.php?p=account&a=list-account&id='.$id.'\'",1000);</script>';
      }
    }
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
        <li><a href="account list.php?p=account&a=list-account">Account</a></li>
        <li class="active">Correction repair Account</li>
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
                  if($_SESSION['level'] != 1) 
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
                      echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
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
                  <label for="exampleInputPassword1">Surname: <b style="color: red;">*</b></label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Import Surname" name="lastName" value="<?php echo $row['ho']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name: <b style="color: red;">*</b></label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Import Name" name="firstName" value="<?php echo $row['ten']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email: <b style="color: red;">*</b></label>
                  <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Login email" name="email" value="<?php echo $row['email']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">number Phone:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Import number Phone" name="phone" value="<?php echo $row['so_dt']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Power:</label>
                  <div class="col-md-12">
                  <?php 
                    if($row['quyen'] == 1)
                    {
                      echo "<label>";
                      echo "<input type='radio' name='level' class='minimal' value='1' checked>
                      manager";
                      echo "<label>";

                      echo "<lable>";
                      echo "<input type='radio' name='level' class='minimal' value='0'> employee";
                      echo "</lable>";
                    }
                    else
                    {
                      echo "<label>";
                      echo "<input type='radio' name='level' class='minimal' value='1'>
                      manager";
                      echo "<label>";

                      echo "<lable>";
                      echo "<input type='radio' name='level' class='minimal' value='0' checked> employee";
                      echo "</lable>";
                    }
                  ?>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Status:</label>
                  <div class="col-md-12">
                    <?php 
                      if($row['trang_thai'] == 1)
                      {
                        echo "<label>";
                        echo "<input type='radio' name='status' class='minimal' value='1' checked>
                        Working";
                        echo "<label>";

                        echo "<lable>";
                        echo "<input type='radio' name='status' class='minimal' value='0'> Ngừng hoạt động";
                        echo "</lable>";
                      }
                      else
                      {
                        echo "<label>";
                        echo "<input type='radio' name='status' class='minimal' value='1'>
                        Working";
                        echo "<label>";

                        echo "<lable>";
                        echo "<input type='radio' name='status' class='minimal' value='0' checked> Ngừng hoạt động";
                        echo "</lable>";
                      }
                    ?>
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php 
                  if($_SESSION['level'] == 1)
                    echo "<button type='submit' class='btn btn-warning' name='save'><i class='fa fa-save'></i> Save</button>";
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