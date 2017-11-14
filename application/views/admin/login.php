
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>.:: MAPAN - MANAJEMEN PERSURATAN KPPN::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<style type="text/css">

	
	</style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/style.css" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

    <script src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/jquery.chained.js"></script>
  <body style=" background-image: url(<?php echo base_url(); ?>upload/polygonal.png">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand"><strong style="font-family: verdana; text-align: center; color:white">MAPAN - Manajemen Persuratan</strong></span>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
      </div>
    </div>

	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
	?>
    <div class="container">
	
	<br><br>
	<br><br>
	<br><br>
	<br><br>

	
	<center>
	<div class="login-form" style="margin-top: 30px " >
		     
		<form action="<?php echo base_URL(); ?>index.php/admin/do_login" method="post">
		<?php echo $this->session->flashdata("k"); ?>
		<div class="form-group" style="align:center">
			<input type="text" autofocus name="u" required  autofocus class="form-control" placeholder="Username">
	       		
		</div>
		<div class="form-group" style="text-align:center">	
			<input type="password" name="p" required class="form-control" placeholder="Password">
			
		</div>
		<div class="form-group" style="text-align:center">	<select name="ta" class="form-control" required><option value="">--</option>
			<?php 
			for ($i = 2016; $i <= (date('Y')); $i++) {
				if (date('Y') == $i) {
					echo "<option value='$i' selected>$i</option>";
				} else {
					echo "<option value='$i'>$i</option>";
				}
			}
			?>
			</select>
			</div>
			<input type="submit"  class="btn btn-primary form-control" value="Login">
		</form>
    </div><!--/.fluid-container-->
	</center>
	<script type="text/javascript">
	$(document).ready(function(){
		$(" #alert" ).fadeOut(6000);
	});
	</script>
	  

  
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
  
</body></html>

