<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
	// include file
	include('../layouts/header.php');
	include('../layouts/topbar.php');
	include('../layouts/sidebar.php');

	

	// dem so phong ban
	$pb = "SELECT count(id) as soluong FROM phong_ban";
	$resultPB = mysqli_query($conn, $pb);
	$rowPB = mysqli_fetch_array($resultPB);
	$tongPB = $rowPB['soluong'];

	// dem so phong ban
	$tk = "SELECT count(id) as soluong FROM tai_khoan";
	$resultTK = mysqli_query($conn, $tk);
	$rowTK = mysqli_fetch_array($resultTK);
	$tongTK = $rowTK['soluong'];

	// danh sach phong ban
	$phongBan = "SELECT ma_phong_ban, ten_phong_ban, ngay_tao FROM phong_ban ORDER BY id DESC";
	$resultPhongBan = mysqli_query($conn, $phongBan);
	$arrPhongBan = array();
	while ($rowPhongBan = mysqli_fetch_array($resultPhongBan)) 
	{
		$arrPhongBan[] = $rowPhongBan;
	}

	// danh sach chuc vu
	$chucVu = "SELECT ma_chuc_vu, ten_chuc_vu, ngay_tao FROM chuc_vu ORDER BY id DESC";
	$resultChucVu = mysqli_query($conn, $chucVu);
	$arrChucVu = array();
	while ($rowChucVu = mysqli_fetch_array($resultChucVu)) 
	{
		$arrChucVu[] = $rowChucVu;
	}

?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
		  	overview
	        <small> TDTU University </small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> overview</a></li>
	        <li class="active">Statistical</li>
	      </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">
	      <!-- Small boxes (Stat box) -->
	      <div class="row">
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3><?php echo $tongNV; ?></h3>

	              <p>Staff</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-user"></i>
	            </div>
	            <a href="danh-sach-nhan-vien.php?p=staff&a=list-staff" class="small-box-footer">List of employee <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-orange">
	            <div class="inner">
	              <h3><?php echo $tongPB; ?></h3>

	              <p>Department</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-bank"></i>
	            </div>
	            <a href="phong-ban.php?p=staff&a=room" class="small-box-footer">List of departments <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><?php echo $tongTK; ?></h3>

	              <p>User account</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-person-add"></i>
	            </div>
	            <a href="ds-tai-khoan.php?p=account&a=list-account" class="small-box-footer">List of accounts <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3><?php echo $tongNghiViec; ?></h3>
	              <p>Employee quits</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-pie-graph"></i>
	            </div>
	            <a href="#" class="small-box-footer" onclick="return false;">Retirement list <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	       
	        <!-- ./col -->
	        <!-- ./col -->
	      </div>
	      <!-- /.row -->
	      <!-- Main row -->
	      <div class="row">
	      	<div class="col-lg-6">
	      		<div class="box">
		            <div class="box-header">
		              <h3 class="box-title">List of departments</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              <div class="table-responsive">
		                <table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>numerical order</th>
		                    <th>Room Code</th>
		                    <th>Room name</th>
		                    <th>Date created</th>
		                  </tr>
		                  </thead>
		                  <tbody>
		                  <?php 
		                    $count = 1;
		                    foreach ($arrPhongBan as $pb) 
		                    {
		                  ?>
		                      <tr>
		                        <td><?php echo $count; ?></td>
		                        <td><?php echo $pb['ma_phong_ban']; ?></td>
		                        <td><?php echo $pb['ten_phong_ban']; ?></td>
		                        <td><?php echo $pb['ngay_tao']; ?></td>
		                      </tr>
		                  <?php
		                      $count++;
		                    }
		                  ?>
		                  </tbody>
		                </table>
		              </div>
		            </div>
		            <!-- /.box-body -->
		         </div>
		        <!-- /.box -->
	      	</div>
	      	<!-- col-lg-6 -->
	      	<div class="col-lg-6">
	      		<div class="box">
		            <div class="box-header">
		              <h3 class="box-title">List of positions</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              <div class="table-responsive">
		                <table id="example3" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
						  	<th>numerical order</th>
		                    <th>Room Code</th>
		                    <th>Room name</th>
		                    <th>Date created</th>
		                  </tr>
		                  </thead>
		                  <tbody>
		                  <?php 
		                    $count = 1;
		                    foreach ($arrChucVu as $cv) 
		                    {
		                  ?>
		                      <tr>
		                        <td><?php echo $count; ?></td>
		                        <td><?php echo $cv['ma_chuc_vu']; ?></td>
		                        <td><?php echo $cv['ten_chuc_vu']; ?></td>
		                        <td><?php echo $cv['ngay_tao']; ?></td>
		                      </tr>
		                  <?php
		                      $count++;
		                    }
		                  ?>
		                  </tbody>
		                </table>
		              </div>
		            </div>
		            <!-- /.box-body -->
		         </div>
		        <!-- /.box -->
	      	</div>
	      	<!-- col-lg-6 -->
	      	<div class="col-lg-12">
	      		<div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
		              <div class="table-responsive">
		                <table id="example4" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>numerical order</th>
		                    <th>Employee code</th>
		                    <th>image</th>
		                    <th>Staff's name</th>
		                    <th>Sex</th>
		                    <th>leaders</th>
		                    <th>Status</th>
		                  </tr>
		                  </thead>
		                  <tbody>
		                  </tbody>
		                </table>
		              </div>
		            </div>
		            <!-- /.box-body -->
		         </div>
		        <!-- /.box -->
	      	</div>
	      	<!-- col-lg-12 -->
	      </div>
	      <!-- /.row (main row) -->
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
	header('Location: dang-nhap.php');
}

?>