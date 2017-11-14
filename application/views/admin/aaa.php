<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>.:: MAPAN ONLINE - MANAJEMEN PERSURATAN ONLINE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<style type="text/css">
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url(); ?>aset/font/satu.woff) format('woff');
	}
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 700;
	  src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url(); ?>aset/font/dua.woff) format('woff');
	}
	@font-face {
	  font-family: 'Lobster';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Lobster'), url(<?php echo base_url(); ?>aset/font/tiga.woff) format('woff');
	}	
	
	</style>
	
	
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.css" media="screen"> 

    <!-- Font Awesome 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Ionicons 
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
    <script src="<?php echo base_url(); ?>plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
    <script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>


    <script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
	
	
	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/js/jquery/jquery-ui.css" /> 
  
    <script src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
	<script src="<?php echo base_url(); ?>aset/js/jquery/jquery-ui.js"></script>

	



	<script type="text/javascript">
	// <![CDATA[
	$(document).ready(function () {
		$(function () {
			$( "#kode_surat" ).autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('index.php/admin/get_klasifikasi'); ?>",
						data: { kode: $("#kode_surat").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}    
					});
				},
			});
		});
		
		$(function () {
			$( "#dari" ).autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('index.php/admin/get_instansi_lain'); ?>",
						data: { kode: $("#dari").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}    
					});
				},
			});
		});
		
		
		$(function () {
			$( "#nip" ).autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('index.php/admin/get_nip'); ?>",
						data: { nip: $("#nip").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}    
					});
				},
			});
		});
		
		$(function() {
			$( "#tgl_surat" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd'
			});
		});
	});
	// ]]>
	</script>
	</head>
	
  <body style="">
    <div class="navbar navbar-inverse navbar-fixed-top" style="background : black">
      <div class="container">
        <div class="navbar-header">
         <span class="navbar-brand"><strong style="font-family: verdana; color:white ">MAPAN</strong></span>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div> 

        <div class="navbar-collapse collapse" id="navbar-main" style="font-family: verdana; ">
          <ul class="nav navbar-nav" >	
			<li><a href="<?php echo base_url(); ?>index.php/admin"><i class="icon-home icon-white" > </i> <span style="color:white">Beranda</span></a></li>
        <?php
			if ($this->session->userdata('admin_level') != "KK") {
		?>	    
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> <span style="color:white">Referensi </span><span class="caret" ></span></a>
				<ul class="dropdown-menu" aria-labelledby="themes">
				<li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/klas_surat">Referensi Jenis Surat</a></li>

				</ul>
            </li>
			
		<?php
			}
		?>		
			
		<?php
		if ($this->session->userdata('admin_level') == "Umum") {
		?>	
            	
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-file icon-white"> </i> <span style="color:white">Buku Agenda </span><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/agenda_surat_masuk"> Surat Masuk</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/agenda_surat_keluar"> Surat Keluar</a></li>
              </ul>
            </li>
			
			<?php } ?>
			
			<?php
			if ($this->session->userdata('admin_level') != "Super Admin") {
			?>

			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-random icon-white"> </i> <span style="color:white">Daftar Surat </span><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/surat_masuk">Surat Masuk</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/surat_keluar">Surat Keluar</a></li>
              </ul>
            </li>

			<?php } ?>
			
			<?php
			if ($this->session->userdata('admin_level') != "Super Admin") {
			?>
			
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-random icon-white"> </i> <span style="color:white">Data Pegawai</span><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/pegawai">Daftar Pegawai</a></li>
              </ul>
            </li>
			
			<?php }?>
			
			<?php
			if ($this->session->userdata('admin_level') == "Super Admin") {
			?>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-wrench icon-white"> </i> <span style="color:white">Setting </span><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/pengguna">Kelola Instansi Pengguna</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/manage_admin">Manajemen User</a></li>
              </ul>
            </li>
			<?php } ?>
			
			
			</ul>

          <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" style = "color:white"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('admin_user') ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/passwod">Change Password</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a></li>
                
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
	echo $this->session->userdata('admin_level');
	?>
    <div class="container">


        <div class="row">
          <div class="" style="padding: 15px 15px 5px 15px;">
			<div class="well well-sm" style=" background-image: url(<?php echo base_url(); ?>upload/polygonal_header.png">
				<img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; margin-top: 10px; width: 100px; height: 100px">
                <h2 style="margin: 15px 0 10px 0; color: white; font-family:  Times New Roman"><?php echo $q_instansi->nama; ?></h2>
                <div style="color: white; font-size: 14px; font-family: Tahoma" class="clearfix"><b>Alamat : <?php echo $q_instansi->alamat; ?></b></div>
             </div>
          </div>
        </div>

		<?php $this->load->view('admin/'.$page); ?>
	
<br>  


	
	  <div class="span12 well well-sm bg-blue" style="color:white ; font-family:Verdana">
		<strong><h4 style="color:white">MAPAN - Manajemen Persuratan</h4></strong>
	  </div>
 
    </div>

  
</body></html>
