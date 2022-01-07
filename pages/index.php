<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
	// include file
	include('../layouts/header.php');
	include('../layouts/topbar.php');
	include('../layouts/sidebar.php');

	

	// dem so cong tac
	$showData = "SELECT ct.id as id, ma_cong_tac, ten_nv, ten_chuc_vu, ngay_bat_dau, ngay_ket_thuc, dia_diem, muc_dich FROM  nhanvien nv, chuc_vu cv, cong_tac ct WHERE nv.chuc_vu_id = cv.id AND nv.id = ct.nhanvien_id ORDER BY ct.ngay_tao DESC";
	$result = mysqli_query($conn, $showData);
	$arrShow = array();
	while ($row = mysqli_fetch_array($result)) {
		$arrShow[] = $row;
	}


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
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">List of mission</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>numerical order</th>
										<th>Code employee</th>
										<th>Name employee</th>
										<th>position</th>
										<th>Start date</th>
										<th>End date</th>
										<th>location</th>
										<th>Purpose</th>
										<th>quest confirmation</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
										<?php 
											$count = 1;
											foreach ($arrShow as $arrS) 
											{
												
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $arrS['ma_cong_tac']; ?></td>
												<td><?php echo $arrS['ten_nv']; ?></td>
												<td><?php echo $arrS['ten_chuc_vu']; ?></td>
												<td><?php echo date_format(date_create($arrS['ngay_bat_dau']), 'd-m-Y'); ?></td>
												<td><?php echo date_format(date_create($arrS['ngay_ket_thuc']), 'd-m-Y'); ?></td>
												<td><?php echo $arrS['dia_diem']; ?></td>
												<td><?php echo $arrS['muc_dich']; ?></td>
												<form action=""method = "POST">
													<td><input type="submit" name = "start" value = "Click to start"></td>
												</form>	
												<td>
													
													<?php 
														if(array_key_exists('read', $_POST)){
															button ();
														}
														function button ()
														{
															echo "Doing mission";
														}
														$ngayHienTai = date("Y-m-d H:i:s");
														$ngayHetHan = $arrS['ngay_ket_thuc'];
														
														
														if($ngayHienTai < $ngayHetHan)
														{
															echo '<td><span class="badge bg-blue"> new mission </span></td>';
														}
														else
														{
															echo '<td><span class="badge bg-red"> Time out </span></td>';
														}
													?>
												</td>
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
	header('Location: Login.php');
}

?>