

<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$nip		= $datpil->nip;
	$seksi		= $datpil->seksi;
	$jabatan	= $datpil->jabatan;
	$eselon		= $datpil->eselon;
	$email		= $datpil->email;
	
	
} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$nip		= "";
	$seksi		= "";
	$jabatan	= "";
	$eselon		= "";
	$email		= "";
}
?>
<div class="navbar navbar-inverse">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Daftar Pegawai</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->

	
	<form action="<?php echo base_URL(); ?>index.php/admin/pegawai/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	
	<div class="row-fluid well" style="overflow: hidden">
		
	<div class="col-lg-6">
		<table  class="table-form">
		<tr><td width="20%">Nama</td><td><b><input type="text" name="nama" tabindex="1" placeholder="required"  required autofocus value="<?php echo $nama; ?>" style="width: 400px" class="form-control"></b></td></tr>
		<tr><td width="20%">NIP</td><td><b><input type="text" name="nip" tabindex="2"  placeholder="required" required value="<?php echo $nip; ?>" id="dari" style="width: 400px" class="form-control"></b></td></tr>		
		<tr><td width="20%">Seksi</td><td><b>
			<select name="seksi" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Seksi - </option>
			<?php
				$l_tujuan	= array('Sub Bagian Umum','Seksi Perbendaharaan','Seksi Verifikasi dan Akuntansi','Seksi Bank Giro Pos');
				
				for ($i = 0; $i < sizeof($l_tujuan); $i++) {
					if ($l_tujuan[$i] == $seksi) {
						echo "<option selected value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					} else {
						echo "<option value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>

		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary"tabindex="10" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/admin/pegawai" class="btn btn-success" tabindex="11" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table  class="table-form">
		<tr><td width="20%">Jabatan</td><td><b>
			<select name="jabatan" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Jabatan - </option>
			<?php
				$l_tujuan	= array('Pelaksana','Kepala Seksi','Kasubbag Umum','Kepala Kantor');
				
				for ($i = 0; $i < sizeof($l_tujuan); $i++) {
					if ($l_tujuan[$i] == $jabatan) {
						echo "<option selected value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					} else {
						echo "<option value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>
		<tr><td width="20%">Eselon</td><td><b>
			<select name="eselon" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Eselon - </option>
			<?php
				$l_tujuan	= array('0','3','4');
				
				for ($i = 0; $i < sizeof($l_tujuan); $i++) {
					if ($l_tujuan[$i] == $eselon) {
						echo "<option selected value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					} else {
						echo "<option value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>
		<tr><td width="20%">Email</td><td><b><input required placeholder="required"  type="email" name="email" value="<?php echo $email; ?>"  tabindex="9"  style="width: 400px" class="form-control"></b></td></tr>	
		</table>	
	</div>

	</div>
	
	</form>
