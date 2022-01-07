
<?php 
    
    // get active sidebar
    if(isset($_GET['p']) && isset($_GET['a']))
    {
        $p = $_GET['p'];
        $a = $_GET['a'];
    }
?>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php echo $row_acc['ten']; ?> <?php echo $row_acc['ho']; ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i>
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
          </a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DATABASE</li>
        <li class="<?php if($p == 'index') echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>OVERVIEW</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($a == 'statistic') echo 'active'; ?>"><a href="index.php?p=index&a=statistic"><i class="fa fa-circle-o"></i> statistical</a></li>
            <li class="<?php if($a == 'nhanvien') echo 'active'; ?>"><a a href="list_in_over.php?p=index&a=nhanvien"><i class="fa fa-circle-o"></i> List of employee</a></li>
            <li class="<?php if(($p == 'index') && ($a == 'taikhoan')) echo 'active'; ?>"><a href="index_account.php?p=index&a=taikhoan"><i class="fa fa-circle-o"></i> account list</a></li>
          </ul>
        </li>
        <li class="<?php if($p == 'staff') echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>employee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(($p == 'staff') && ($a == 'room')) echo 'active'; ?>"><a href="department.php?p=staff&a=room"><i class="fa fa-circle-o"></i> Department</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'position')) echo 'active'; ?>"><a href="position.php?p=staff&a=position"><i class="fa fa-circle-o"></i> position</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'level')) echo 'active'; ?>"><a href="qualification.php?p=staff&a=level"><i class="fa fa-circle-o"></i> Trình độ</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'specialize')) echo 'active'; ?>"><a href="speciality.php?p=staff&a=specialize"><i class="fa fa-circle-o"></i> specialize</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'certificate')) echo 'active'; ?>"><a href="degree.php?p=staff&a=certificate"><i class="fa fa-circle-o"></i> qualifications</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'employee-type')) echo 'active'; ?>"><a href="type_of_employee.php?p=staff&a=employee-type"><i class="fa fa-circle-o"></i> type employee</a></li>
            <li class="<?php if(($p == 'staff') && ($a == 'add-staff')) echo 'active'; ?>"><a href="add_employee.php?p=staff&a=add-staff"><i class="fa fa-circle-o"></i> Add new employee</a></li>
            <li class="<?php if(($p == 'staff') && ($a =='list-staff')) echo 'active'; ?>"><a href="employee_list.php?p=staff&a=list-staff"><i class="fa fa-circle-o"></i> List of employee</a></li>
          </ul>
        </li>
        <li class="<?php if($p == 'collaborate') echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>manager mission.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(($p == 'collaborate') && ($a =='add-collaborate')) echo 'active'; ?>"><a href="mission.php?p=collaborate&a=add-collaborate"><i class="fa fa-circle-o"></i>  Create mission.</a></li>
            <li class="<?php if(($p == 'collaborate') && ($a =='list-collaborate')) echo 'active'; ?>"><a href="mission_list.php?p=collaborate&a=list-collaborate"><i class="fa fa-circle-o"></i> List mission.</a></li>
          </ul>
        </li>
        <li class="<?php if($p == 'group') echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Resignation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(($p == 'group') && ($a =='add-group')) echo 'active'; ?>"><a href="Create_register.php?p=group&a=add-group"><i class="fa fa-circle-o"></i>Application for resignation</a></li>
            <li class="<?php if(($p == 'group') && ($a =='add-group')) echo 'active'; ?>"><a href="danh-sach-nhom.php?p=group&a=add-group"><i class="fa fa-circle-o"></i>List resgination employee</a></li>
          </ul>
        </li>
        <li class="<?php if($p == 'account') echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($a == 'profile') echo 'active'; ?>"><a href="account_information.php?p=account&a=profile"><i class="fa fa-circle-o"></i> Information Account</a></li>
            <li class="<?php if($a == 'add-account') echo 'active'; ?>"><a href="create_account.php?p=account&a=add-account"><i class="fa fa-circle-o"></i> Create Account</a></li>
            <li class="<?php if(($p == 'account') && ($a == 'list-account')) echo 'active'; ?>"><a href="account_list.php?p=account&a=list-account"><i class="fa fa-circle-o"></i> account list</a></li>
            <li class="<?php if($a == 'changepass') echo 'active'; ?>"><a href="changepass.php?p=account&a=changepass"><i class="fa fa-circle-o"></i> Change password</a></li>
            <li><a href="Logout.php"><i class="fa fa-circle-o"></i> Log out</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>