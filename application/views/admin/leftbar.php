 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo site_url('homepage') ?>"><i class="fa fa-dashboard"></i> <span>Halaman Utama</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Pendaftaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/pendaftaran/') ?>"><i class="fa fa-circle-o"></i> List Pendaftaran</a></li>
            <li><a href="<?php echo site_url('admin/users/') ?>"><i class="fa fa-circle-o"></i> List User</a></li>
           <li><a href="<?php echo site_url('admin/users/peserta') ?>"><i class="fa fa-circle-o"></i> List Peserta</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/penilaian/input_penilaian/1') ?>"><i class="fa fa-circle-o"></i> Penggalang SD</a></li>
            <li><a href="<?php echo site_url('admin/penilaian/input_penilaian/2') ?>"><i class="fa fa-circle-o"></i> Penggalang SMP</a></li>
            <li><a href="<?php echo site_url('admin/penilaian/input_penegak/') ?>"><i class="fa fa-circle-o"></i> Penegak SMA</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/master/provinsi') ?>"><i class="fa fa-circle-o"></i> Data Provinsi</a></li>
            <li><a href="<?php echo site_url('admin/master/kabupaten') ?>"><i class="fa fa-circle-o"></i> Data Kabupaten</a></li>
            <li><a href="<?php echo site_url('admin/master/sekolah') ?>"><i class="fa fa-circle-o"></i> Data Sekolah</a></li>
            <li><a href="<?php echo site_url('admin/master/lomba') ?>"><i class="fa fa-circle-o"></i> Data Lomba</a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>