<?php
$mode		= $this->uri->segment(3);

$format_surat	= $this->db->query("SELECT * FROM ref_klasifikasi where nama='SURAT' LIMIT 1")->row();

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	// $no_agenda	= $datpil->no_agenda;
	$kode		= $datpil->kode;
	$dari		= $datpil->tujuan;
	$no_surat1	= $datpil->no_surat1;
	// $no_surat2	= $datpil->no_surat2;
	$no_surat2	= $format_surat->format;
	$tgl_surat	= $datpil->tgl_surat;
	$uraian		= $datpil->isi_ringkas;
	$ket		= $datpil->keterangan;
	
} else {
	$act		= "act_add";
	$idp		= "";
	$no_surat1	= gli("t_surat_keluar", "no_surat1", 4);
	$no_surat2	= $format_surat->format;
	$kode		= "";
	$dari		= "";
	$tgl_surat	= "";
	$uraian		= "";
	$ket		= "";
}

if ($this->session->userdata('admin_level') == "Umum"){
	$disabled="disabled";
} else {
	$disabled="";
}
?>



<div class="navbar navbar-inverse">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" style="color:white" href="#">Surat Keluar</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL()?>index.php/admin/surat_keluar/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
		<tr><td width="20%">No. Surat</td><td><b><input type="text" autofocus tabindex="1" name="no_surat1" <?php echo $disabled; ?> required value="<?php echo $no_surat1; ?>" style="width: 100px" class="form-control"></b></td></tr>
		
		<tr><td width="20%"></td><td><b>
		
		<input type="text" tabindex="3" name="no_surat2" <?php echo $disabled; ?> required value="<?php echo $no_surat2; ?>" style="width: 300px" class="form-control"></td></tr>
		
		<tr><td width="20%">Tujuan Surat</td><td><b><input type="text" tabindex="2" name="dari" <?php echo $disabled; ?> required value="<?php echo $dari; ?>" id="dari" style="width: 400px" class="form-control"></b></td></tr>
		
		
		<tr><td width="20%">Isi Ringkas</td><td><b><textarea tabindex="4" name="uraian" <?php echo $disabled; ?> required style="width: 400px; height: 60px" class="form-control"><?php echo $uraian; ?></textarea></b></td></tr>
		
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/surat_keluar" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
			<tr><td width="20%">Jenis Surat</td><td><b><input type="text" tabindex="5" name="kode"<?php echo $disabled; ?> required value="<?php echo $kode; ?>" id="kode_surat" style="width: 100px" class="form-control"></b></td></tr>
			<tr><td width="20%">Tanggal Surat</td><td><b><input type="text" tabindex="6" name="tgl_surat"<?php echo $disabled; ?> required value="<?php echo $tgl_surat; ?>" id="tgl_surat" style="width: 100px" class="form-control"></b></td></tr>	
			<?php
			if ($this->session->userdata('admin_level') == "Umum") {
			?>			
			<tr><td width="20%">File Surat (Scan)</td><td><b><input type="file" tabindex="7" required name="file_surat" class="form-control" style="width: 200px"></b></td></tr>
			<?php } ?>
			
			<tr><td width="20%">Keterangan</td><td><b><input type="text" name="ket"<?php echo $disabled; ?> tabindex="8" value="<?php echo $ket; ?>" style="width: 400px" class="form-control"></b></td></tr>				
		</table>
	</div>
	
	</div>
	
	</form>
