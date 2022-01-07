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
    $showData = "SELECT nv.id as id, quoc_tich_id, ton_giao_id, dan_toc_id, loai_nv_id, bang_cap_id, phong_ban_id, chuc_vu_id, trinh_do_id, chuyen_mon_id, hon_nhan_id, ma_nv, hinh_anh, ten_nv, biet_danh, gioi_tinh, nv.ngay_tao as ngay_tao, ngay_sinh, noi_sinh, so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, nguyen_quan, ten_quoc_tich, ten_dan_toc, ten_ton_giao, ho_khau, tam_tru, ten_loai_nv, ten_trinh_do, ten_chuyen_mon, ten_bang_cap, ten_phong_ban, ten_chuc_vu, ten_tinh_trang, trang_thai FROM nhanvien nv, quoc_tich qt, dan_toc dt, ton_giao tg, loai_nv lnv, trinh_do td, chuyen_mon cm, bang_cap bc, phong_ban pb, chuc_vu cv, tinh_trang_hon_nhan hn WHERE nv.quoc_tich_id = qt.id AND nv.dan_toc_id = dt.id AND nv.ton_giao_id = tg.id AND nv.loai_nv_id = lnv.id AND nv.trinh_do_id = td.id AND nv.chuyen_mon_id = cm.id AND nv.bang_cap_id = bc.id AND nv.phong_ban_id = pb.id AND nv.chuc_vu_id = cv.id AND nv.hon_nhan_id = hn.id AND nv.id = $id";
    $result = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($result);

    // set option active
    $qt_id = $row['quoc_tich_id'];
    $ten_qt = $row['ten_quoc_tich'];

    $tg_id = $row['ton_giao_id'];
    $ten_tg = $row['ten_ton_giao'];

    $dt_id = $row['dan_toc_id'];
    $ten_dt = $row['ten_dan_toc'];

    $nv_id = $row['loai_nv_id'];
    $ten_nv = $row['ten_loai_nv'];

    $bc_id = $row['bang_cap_id'];
    $ten_bc = $row['ten_bang_cap'];

    $pb_id = $row['phong_ban_id'];
    $ten_pb = $row['ten_phong_ban'];

    $cv_id = $row['chuc_vu_id'];
    $ten_cv = $row['ten_chuc_vu'];

    $td_id = $row['trinh_do_id'];
    $ten_td = $row['ten_trinh_do'];

    $cm_id = $row['chuyen_mon_id'];
    $ten_cm = $row['ten_chuyen_mon'];

    $hn_id = $row['hon_nhan_id'];
    $ten_hn = $row['ten_tinh_trang'];


    // set value option another
    $qt = "SELECT id, ten_quoc_tich FROM quoc_tich WHERE id <> $qt_id";
    $resultQT = mysqli_query($conn, $qt);
    $arrQT = array();
    while ($rowQT = mysqli_fetch_array($resultQT)) 
    {
      $arrQT[] = $rowQT;
    }

    $tg = "SELECT id, ten_ton_giao FROM ton_giao WHERE id <> $tg_id";
    $resultTG = mysqli_query($conn, $tg);
    $arrTG = array();
    while ($rowTG = mysqli_fetch_array($resultTG)) 
    {
      $arrTG[] = $rowTG;
    }

    $dt = "SELECT id, ten_dan_toc FROM dan_toc WHERE id <> $dt_id";
    $resultDT = mysqli_query($conn, $dt);
    $arrDT = array();
    while ($rowDT = mysqli_fetch_array($resultDT)) 
    {
      $arrDT[] = $rowDT;
    }

    $lnv = "SELECT id, ten_loai_nv FROM loai_nv WHERE id <> $nv_id";
    $resultLNV = mysqli_query($conn, $lnv);
    $arrLNV = array();
    while ($rowLNV = mysqli_fetch_array($resultLNV)) 
    {
      $arrLNV[] = $rowLNV;
    }

    $bc = "SELECT id, ten_bang_cap FROM bang_cap WHERE id <> $bc_id";
    $resultBC = mysqli_query($conn, $bc);
    $arrBC = array();
    while ($rowBC = mysqli_fetch_array($resultBC)) 
    {
      $arrBC[] = $rowBC;
    }

    $pb = "SELECT id, ten_phong_ban FROM phong_ban WHERE id <> $pb_id";
    $resultPB = mysqli_query($conn, $pb);
    $arrPB = array();
    while ($rowPB = mysqli_fetch_array($resultPB)) 
    {
      $arrPB[] = $rowPB;
    }

    $cv = "SELECT id, ten_chuc_vu FROM chuc_vu WHERE id <> $cv_id";
    $resultCV = mysqli_query($conn, $cv);
    $arrCV = array();
    while ($rowCV = mysqli_fetch_array($resultCV)) 
    {
      $arrCV[] = $rowCV;
    }

    $td = "SELECT id, ten_trinh_do FROM trinh_do WHERE id <> $td_id";
    $resultTD = mysqli_query($conn, $td);
    $arrTD = array();
    while ($rowTD = mysqli_fetch_array($resultTD)) 
    {
      $arrTD[] = $rowTD;
    }

    $cm = "SELECT id, ten_chuyen_mon FROM chuyen_mon WHERE id <> $cm_id";
    $resultCM = mysqli_query($conn, $cm);
    $arrCM = array();
    while ($rowCM = mysqli_fetch_array($resultCM)) 
    {
      $arrCM[] = $rowCM;
    }

    $hn = "SELECT id, ten_tinh_trang FROM tinh_trang_hon_nhan WHERE id <> $hn_id";
    $resultHN = mysqli_query($conn, $hn);
    $arrHN = array();
    while ($rowHN = mysqli_fetch_array($resultHN)) 
    {
      $arrHN[] = $rowHN;
    }

  }


  // chuc nang them nhan vien
  if(isset($_POST['save']))
  {
    // tao bien bat loi
    $error = array();
    $success = array();
    $showMess = false;

    // lay du lieu ve
    $tenNhanVien = $_POST['tenNhanVien'];
    $bietDanh = $_POST['bietDanh'];
    $honNhan = $_POST['honNhan'];
    $CMND = $_POST['CMND'];
    $ngayCap = $_POST['ngayCap'];
    $noiCap = $_POST['noiCap'];
    $quocTich = $_POST['quocTich'];
    $tonGiao = $_POST['tonGiao'];
    $danToc = $_POST['danToc'];
    $loaiNhanVien = $_POST['loaiNhanVien'];
    $bangCap = $_POST['bangCap'];
    $trangThai = $_POST['trangThai'];
    $gioiTinh = $_POST['gioiTinh'];
    $ngaySinh = $_POST['ngaySinh'];
    $noiSinh = $_POST['noiSinh'];
    $nguyenQuan = $_POST['nguyenQuan'];
    $hoKhau = $_POST['hoKhau'];
    $tamTru = $_POST['tamTru'];
    $phongBan = $_POST['phongBan'];
    $chucVu = $_POST['chucVu'];
    $trinhDo = $_POST['trinhDo'];
    $chuyenMon = $_POST['chuyenMon'];
    $id_user = $row_acc['id'];
    $ngaySua = date("Y-m-d H:i:s");

    // cau hinh o chon anh
    $hinhAnh = $_FILES['hinhAnh']['name'];
    $target_dir = "../uploads/staffs/";
    $target_file = $target_dir . basename($hinhAnh);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // validate
    if(empty($tenNhanVien))
      $error['tenNhanVien'] = 'error';
    if($honNhan == 'chon')
      $error['honNhan'] = 'error';
    if(empty($CMND))
      $error['CMND'] = 'error';
    if(empty($noiCap))
      $error['noiCap'] = 'error';
    if($quocTich == 'chon')
      $error['quocTich'] = 'error';
    if($danToc == 'chon')
      $error['danToc'] = 'error';
    if($loaiNhanVien == 'chon')
      $error['loaiNhanVien'] = 'error';
    if($trangThai == 'chon')
      $error['trangThai'] = 'error';
    if($gioiTinh == 'chon')
      $error['gioiTinh'] = 'error';
    if(empty($hoKhau))
      $error['hoKhau'] = 'error';
    if($phongBan == 'chon')
      $error['phongBan'] = 'error';
    if($chucVu == 'chon')
      $error['chucVu'] = 'error';
    if($trinhDo == 'chon')
      $error['trinhDo'] = 'error';

    // validate file
    if($hinhAnh)
    {
      if($_FILES['hinhAnh']['size'] > 50000000)
        $error['kichThuocAnh'] = 'error';
      if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif')
        $error['kieuAnh'] = 'error';
    }

    if(!$error)
    {
      if($hinhAnh)
      {
        $imageName = time() . "." . $imageFileType;
        $moveFile = $target_dir . $imageName;

        // remove old image
        $oldImage = $row['hinh_anh'];

        // insert data
        $update = " UPDATE nhanvien SET 
                    hinh_anh = '$imageName',
                    ten_nv = '$tenNhanVien',
                    biet_danh = '$bietDanh',
                    gioi_tinh = '$gioiTinh',
                    ngay_sinh = '$ngaySinh',
                    noi_sinh = '$noiSinh',
                    hon_nhan_id = '$honNhan',
                    so_cmnd = '$CMND',
                    noi_cap_cmnd = '$noiCap',
                    ngay_cap_cmnd = '$ngayCap',
                    nguyen_quan = '$nguyenQuan',
                    quoc_tich_id = '$quocTich',
                    ton_giao_id = '$tonGiao',
                    dan_toc_id = '$danToc',
                    ho_khau = '$hoKhau',
                    tam_tru = '$tamTru',
                    loai_nv_id = '$loaiNhanVien',
                    trinh_do_id = '$trinhDo',
                    chuyen_mon_id = '$chuyenMon',
                    bang_cap_id = '$bangCap',
                    phong_ban_id = '$phongBan',
                    chuc_vu_id = '$chucVu',
                    trang_thai = '$trangThai',
                    nguoi_sua_id = '$id_user',
                    ngay_sua = '$ngaySua'
                    WHERE id = $id";
        $result = mysqli_query($conn, $update);
        if($result)
        {
          $showMess = true;

          // remove old image
          if($oldImage != "demo-3x4.jpg")
          {
            unlink($target_dir . $oldImage);
          }

          // move image
          move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $moveFile);

          $success['success'] = 'Lưu thông tin success';
          echo '<script>setTimeout("window.location=\'repair_employee.php?p=staff&a=list-staff&id='.$id.'\'",1000);</script>';
        }
      }
      else
      {
        $showMess = true;
        // update data
        $update = " UPDATE nhanvien SET 
                    ten_nv = '$tenNhanVien',
                    biet_danh = '$bietDanh',
                    gioi_tinh = '$gioiTinh',
                    ngay_sinh = '$ngaySinh',
                    noi_sinh = '$noiSinh',
                    hon_nhan_id = '$honNhan',
                    so_cmnd = '$CMND',
                    noi_cap_cmnd = '$noiCap',
                    ngay_cap_cmnd = '$ngayCap',
                    nguyen_quan = '$nguyenQuan',
                    quoc_tich_id = '$quocTich',
                    ton_giao_id = '$tonGiao',
                    dan_toc_id = '$danToc',
                    ho_khau = '$hoKhau',
                    tam_tru = '$tamTru',
                    loai_nv_id = '$loaiNhanVien',
                    trinh_do_id = '$trinhDo',
                    chuyen_mon_id = '$chuyenMon',
                    bang_cap_id = '$bangCap',
                    phong_ban_id = '$phongBan',
                    chuc_vu_id = '$chucVu',
                    trang_thai = '$trangThai',
                    nguoi_sua_id = '$id_user',
                    ngay_sua = '$ngaySua'
                    WHERE id = $id";
        $result = mysqli_query($conn, $update);
        if($result)
        {
          $success['success'] = 'Lưu thông tin success';
          echo '<script>setTimeout("window.location=\'repair_employee.php?p=staff&a=list-staff&id='.$id.'\'",1000);</script>';

        }
      }
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Correction repair employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> OVERVIEW</a></li>
        <li><a href="employee_list.php?p=staff&a=list-staff">employee</a></li>
        <li class="active">Correction repair Employee information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Correction repair Employee information</h3> &emsp;
              <small>Những ô Import có dấu <span style="color: red;">*</span> là bắt buộc</small>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
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
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Code employee: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="maNhanVien" value="<?php echo $row['ma_nv']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Name employee <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Import Name employee" name="tenNhanVien" value="<?php echo $row['ten_nv']; ?>">
                      <small style="color: red;"><?php if(isset($error['tenNhanVien'])){ echo "Name employee không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>nickname: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Import nickname" name="bietDanh" value="<?php echo $row['biet_danh']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Status marriage <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="honNhan">
                        <option value="<?php echo $hn_id; ?>"><?php echo $ten_hn; ?></option>
                        <?php 
                          foreach ($arrHN as $hn)
                          {
                            echo "<option value='".$hn['id']."'>".$hn['ten_tinh_trang']."</option>";
                          }
                        ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['honNhan'])){ echo "Please Select Status marriage"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>number CMND <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Import number CMND" name="CMND" value="<?php echo $row['so_cmnd']; ?>">
                      <small style="color: red;"><?php if(isset($error['CMND'])){ echo "Please enter number CMND"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>supply date <span style="color: red;">*</span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Import nơi cấp" name="ngayCap" value="<?php echo $row['ngay_cap_cmnd']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nơi cấp <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Import nơi cấp" name="noiCap" value="<?php echo $row['noi_cap_cmnd']; ?>">
                      <small style="color: red;"><?php if(isset($error['noiCap'])){ echo "Please enter nơi cấp"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>nationality <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="quocTich">
                      <option value="<?php echo $qt_id; ?>"><?php echo $ten_qt; ?></option>
                      <?php 
                        foreach ($arrQT as $qt)
                        {
                          echo "<option value='".$qt['id']."'>".$qt['ten_quoc_tich']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['quocTich'])){ echo "Please Select nationality"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>religion: </label>
                      <select class="form-control" name="tonGiao">
                      <option value="<?php echo $tg_id; ?>"><?php echo $ten_tg; ?></option>
                      <?php 
                      foreach ($arrTG as $tg)
                      {
                        echo "<option value='".$tg['id']."'>".$tg['ten_ton_giao']."</option>";
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nation <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="danToc">
                      <option value="<?php echo $dt_id; ?>"><?php echo $ten_dt; ?></option>
                      <?php 
                      foreach ($arrDT as $dt)
                      {
                        echo "<option value='".$dt['id']."'>".$dt['ten_dan_toc']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['danToc'])){ echo "Please Select Nation"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>type employee <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="loaiNhanVien">
                      <option value="<?php echo $nv_id; ?>"><?php echo $ten_nv; ?></option>
                      <?php 
                        foreach ($arrLNV as $lnv)
                        {
                          echo "<option value='".$lnv['id']."'>".$lnv['ten_loai_nv']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['loaiNhanVien'])){ echo "Please Select type employee"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>qualifications: </label>
                      <select class="form-control" name="bangCap">
                      <option value="<?php echo $bc_id; ?>"><?php echo $ten_bc; ?></option>
                      <?php 
                        foreach ($arrBC as $bc)
                        {
                          echo "<option value='".$bc['id']."'>".$bc['ten_bang_cap']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trangThai">
                      <?php 
                        if($row['trang_thai'] == 1)
                        {
                          echo "<option value='1' selected>Working</option>";
                          echo "<option value='0'>Has retired</option>";
                        }
                        else
                        {
                          echo "<option value='1'>Working</option>";
                          echo "<option value='0' selected>Has retired</option>";
                        }
                      ?>
                        
                        
                      </select>
                      <small style="color: red;"><?php if(isset($error['trangThai'])){ echo "Please Select Status"; } ?></small>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>image 3x4 (if you have): </label>
                      <input type="file" class="form-control" id="exampleInputEmail1" name="hinhAnh">
                      <small style="color: red;"><?php if(isset($error['kichThuocAnh'])){ echo "Kích thước image quá lớn"; } ?></small>
                      <small style="color: red;"><?php if(isset($error['kieuAnh'])){ echo "Chỉ nhận file image dạng: jpg, jpeg, png, gif"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Sex <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="gioiTinh">
                      <?php 
                        if($row['gioi_tinh'] == 1)
                        {
                          echo "<option value='1' selected>Nam</option>";
                          echo "<option value='0'>Nữ</option>";
                        }
                        else
                        {
                          echo "<option value='1'>Nam</option>";
                          echo "<option value='0' selected>Nữ</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['gioiTinh'])){ echo "Please Select Sex"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Date of birth: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinh" value="<?php echo $row['ngay_sinh']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Place of birth: </label>
                      <textarea class="form-control" name="noiSinh"><?php echo $row['noi_sinh']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Domicile: </label>
                      <textarea class="form-control" name="nguyenQuan"><?php echo $row['nguyen_quan']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Household <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="hoKhau"><?php echo $row['ho_khau']; ?></textarea>
                      <small style="color: red;"><?php if(isset($error['hoKhau'])){ echo "Please enter Household"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>staying: </label>
                      <textarea class="form-control" name="tamTru"><?php echo $row['tam_tru']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Department <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="phongBan">
                      <option value="<?php echo $pb_id; ?>"><?php echo $ten_pb; ?></option>
                      <?php 
                        foreach ($arrPB as $pb)
                        {
                          echo "<option value='".$pb['id']."'>".$pb['ten_phong_ban']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['phongBan'])){ echo "Please Select Department"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>position <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="chucVu">
                      <option value="<?php echo $cv_id; ?>"><?php echo $ten_cv; ?></option>
                      <?php 
                      foreach ($arrCV as $cv)
                      {
                        echo "<option value='".$cv['id']."'>".$cv['ten_chuc_vu']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['chucVu'])){ echo "Please Select position"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>level <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trinhDo">
                      <option value="<?php echo $td_id; ?>"><?php echo $ten_td; ?></option>
                      <?php 
                        foreach ($arrTD as $td)
                        {
                          echo "<option value='".$td['id']."'>".$td['ten_trinh_do']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trinhDo'])){ echo "Please Select level"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>specialize: </label>
                      <select class="form-control" name="chuyenMon">
                      <option value="<?php echo $cm_id; ?>"><?php echo $ten_cm; ?></option>
                      <?php 
                        foreach ($arrCM as $cm)
                        {
                          echo "<option value='".$cm['id']."'>".$cm['ten_chuyen_mon']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php 
                if($_SESSION['level'] == 1)
                  echo "<button type='submit' class='btn btn-warning' name='save'><i class='fa fa-save'></i> Save thông tin</button>";
                ?>
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