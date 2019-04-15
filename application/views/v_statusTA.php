<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MonTA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ; ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ; ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ; ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ; ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ; ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ; ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

    <?php
    $id_login   = $this->session->userdata("m_id");
    $datalogin  = $this->db->get_where("mahasiswa", array('m_id'=> $id_login))->row();
    $pr = $this->db->get_where("proposal", array('m_id'=> $datalogin->m_id,'p_status'=>"Diterima"))->row();
    
    $proposal = $this->db->query("SELECT * FROM proposal as p where p.m_id = '$id_login' AND p_status = 'Diterima';");
    if($pr===null){
        $rmk=null;
        $ta=null;
    }else{
        $ta= $this->db->get_where("ta", array('p_id'=> $pr->p_id))->row();
        $rmk = $this->db->get_where("rmk", array('r_id'=> $pr->r_id))->row();
    }
    ?>
    
        <header class="main-header">
            <a href="<?php echo base_url('dashboard'); ?>" class="logo">
                <span class="logo-lg"><b>Monitoring </b>TA</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url() ?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"> <?php echo $datalogin->m_nama; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url() ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                                    <p>
                                    <?php echo $datalogin->m_nama; ?>
                                        <small><?php echo $datalogin->m_id; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url() ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $datalogin->m_nama; ?></p>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><h2><b>MENU</b></h2></li>
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    
                    
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Status tugas akhir
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Tugas Akhir</li>
                    <li class="active">Status</li>
                </ol>
            </section>
            <?php if($ta=== null){?>
            <div class="pad margin no-print">
                    Belum mengajukan tugas akhir
                </div>
            </div>
            <?php }else{ ?>
            <?php foreach($proposal->result() as $p){ ?>
            

            <!-- Main content -->
            <section class="content">
                <!-- form pengajuan -->
                <div class="box">
                    <div class="box-body">
                        <table>
                            <tr>
                                <td><label>Bidang Minat</label></td>
                                <td> : <?php echo' '.$rmk->r_nama.' '?> </td>
                            </tr>
                            <tr>
                                <td><label>Judul</label></td>
                                <td> :  <?php echo' '.$p->p_judul.' '?></td>
                            </tr>
                            <tr>
                                <td><label>Abstraksi</label></td>
                                <td> :  <?php echo' '.$ta->t_abstrak.' '?></td>
                            </tr>
                            <tr>
                                <td><label>File</label></td>
                                <td> : 
                                <a href="<?php echo base_url().'status/download/'.$ta->t_file;?>">file TA</a>
                                </td>
                            </tr>
							<tr>
                                <td><label>File Bimbingan</label></td>
                                <td> : 
                                <a href="<?php echo base_url().'status/download/'.$ta->bimbingan_file;?>">file Bimbingan</a>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Status</label></td>
                                <td> : <?php if($ta->t_status=="Tunggu"){
                                    echo '<span class="badge bg-black">Tunggu</span>';
                                 }elseif($ta->t_status=="Proses Sidang"){
                                    echo' <span class="badge bg-black">Proses Sidang '; 
                                    echo date("d/m/Y H:m", strtotime($ta->t_tanggal) );
                                    echo' WIB </span>';
                                 }elseif($ta->t_status=="Selesai"){
									echo ' <span class="badge bg-black">Done</span>'; }?>
                                </td>
                            </tr>
							<?php if($ta->t_status=="Selesai"){?>
							<tr>
								<td><label>Nilai</label></td>
                                <td> :  <?php echo' '.$ta->t_nilai.' '?></td>
                            </tr> <?php }?>
							
                            <tr>
                                <td><label>Dosen Penguji 1</label></td>
                                <td> :  <?php echo' '.$ta->t_penguji1.' '?></td>
                            </tr>
							
                            <tr>
                                <td><label>Dosen Penguji 2</label></td>
                                <td> :  <?php echo' '.$ta->t_penguji2.' '?></td>
                            </tr>
                        </table>
                        <!-- /.box-header -->
            
              </div>
              <!-- /.box-body -->
                </div>
                
                <!-- /.box -->
                <?php } ?>
            </section>
            <!-- /.content -->
            
             <?php } ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                
            </div>
            <strong>&copy; 2019 <b></b></strong> 
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ; ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ; ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ; ?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ; ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ; ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ; ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ; ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ; ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ; ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ; ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ; ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ; ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js') ; ?>"></script>
</body>
</html>