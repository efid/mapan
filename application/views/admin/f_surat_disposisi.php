<?php
$mode		= $this->uri->segment(4);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$id_surat	= $datpil->id_surat;
	$kpd_yth	= $datpil->kpd_yth;
	$isi_disposisi	= $datpil->isi_disposisi;
	$sifat		= $datpil->sifat;
	$batas_waktu= $datpil->batas_waktu;
	$catatan	= $datpil->catatan;
	$nip		= $datpil->nip_pelaksana;
	$tgl_disposisi2	= $datpil->tgl_disposisi2;
	$tgl_selesai= $datpil->tgl_selesai;
	$selesai	= $datpil->selesai;
	// $nip	= "aa";
	
} else {
	$act		= "act_add";
	$idp		= "";
	$id_surat	= $this->uri->segment(3);
	$kpd_yth	= "";
	$isi_disposisi	= "";
	$sifat		= "";
	$batas_waktu= "";
	$catatan	= "";
	$nip		= "";
	$selesai	= "";
	$tgl_disposisi2= "";
	$tgl_selesai= "";
}
?>
<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#" style="color:white">Disposisi Surat</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3)?>/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	
	
	<input type="hidden" name="tgl_disposisi2" value="<?php echo $tgl_disposisi2; ?>">
	<input type="hidden" name="tgl_selesai" value="<?php echo $tgl_selesai; ?>">

	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	<input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>">
	
	<div class="alert alert-info">Perihal Surat</b> : <i><?php echo $judul_surat; ?></i></div>

	<div class="row-fluid well" style="overflow: hidden">
	
	
	<?php if ($this->session->userdata('admin_level') == "Staf") { ?>
	<div class="col-lg-6">
		<tr><td width="20%">Catatan Penyelesaian Surat</td><td><b><textarea name="selesai" tabindex="2" required style="width: 400px; height: 60px" class="form-control"><?php echo $selesai; ?></textarea></b></td></tr>
	
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary" tabindex="6" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3); ?>" tabindex="7" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
	</div>
	<?php }	else if ($this->session->userdata('admin_level') == "KK"){?>

	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
		
					<tr><td width="20%">Tujuan Disposisi</td><td><b>
			<select name="kpd_yth" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Tujuan - </option>
			<?php
				$l_tujuan	= array('Sub Bagian Umum','Seksi Perbendaharaan','Seksi Verifikasi dan Akuntansi','Seksi Bank Giro Pos');
				
				for ($i = 0; $i < sizeof($l_tujuan); $i++) {
					if ($l_tujuan[$i] == $kpd_yth) {
						echo "<option selected value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					} else {
						echo "<option value='".$l_tujuan[$i]."'>".$l_tujuan[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>
			
		
		
<!--		<tr><td width="20%">Tujuan Disposisi</td><td><b><input type="text" name="kpd_yth" autofocus tabindex="1" required value="<?php echo $kpd_yth; ?>" style="width: 400px" class="form-control"></b></td></tr>-->
		<tr><td width="20%">Isi Disposisi</td><td><b><textarea name="isi_disposisi" tabindex="2" required style="width: 400px; height: 60px" class="form-control"><?php echo $isi_disposisi; ?></textarea></b></td></tr>	
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary" tabindex="6" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3); ?>" tabindex="7" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
			<tr><td width="20%">Sifat</td><td><b>
			<select name="sifat" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Sifat - </option>
			<?php
				$l_sifat	= array('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu');
				
				for ($i = 0; $i < sizeof($l_sifat); $i++) {
					if ($l_sifat[$i] == $sifat) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}				
				}			
			?>			
			</select>
			</b></td></tr>
			<tr><td width="20%">Batas Waktu</td><td><b><input type="text" tabindex="4" name="batas_waktu" required value="<?php echo $batas_waktu; ?>"  id="tgl_surat" style="width: 100px" class="form-control"></b></td></tr>	
			<tr><td width="20%">Catatan</td><td><b><input type="text" tabindex="5" name="catatan" value="<?php echo $catatan; ?>" style="width: 400px" class="form-control"></b></td></tr>				
		</table>
	</div>
		<?php }	else {?>
		<div class="col-lg-6">
		<table width="100%" class="table-form">
		
	<tr><td width="100%">Nama Pegawai</td><td><b><input type="text" name="nip" tabindex="5" id="nip" required value= "<?php echo $nip ?>" style="width: 400px" class="form-control"></b></td></tr>		
			
			
		
		
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary" tabindex="6" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3); ?>" tabindex="7" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	
		<?php }	?>
		
	</div>
	
	</form>
