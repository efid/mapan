<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>



<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<span class="navbar-brand" style="color:white">Surat Masuk</span>
			</div>
			<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: 20px">
			
			<?php
			if ($this->session->userdata('admin_level') == "Umum") {
			?>
			<ul class="nav navbar-nav">
			<li><a href="<?php echo base_URL(); ?>index.php/admin/surat_masuk/add" class="btn btn-success" style="color:white"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a></li>
			</ul>
			<?php }?>
			
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>index.php/admin/surat_masuk/cari">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder="Kata kunci pencarian ..." required>
					<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Cari</button>
				</form>
			</ul>
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->
	
  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	
<!--	
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
</div>
	
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
</div>	
-->

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="3%">No.</th>
			<th width="5%">Agenda</th>
			<th width="10%">Surat</th>
			<th width="15%">Isi Ringkas, File</th>
			<th width="15%">Asal Surat</th>
			<th width="15%">Nomor dan Tgl. Surat</th>
			<th width="7%">Disp KK</th>
			<th width="7%">Disp Kasi</th>
			<th width="7%">Pelaksana</th>
			<th width="15%">Aksi</th>
		</tr>
	</thead>
	
	<tbody>

		<?php 
		
			
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$nomor = 0;
			foreach ($data as $b) {
				$nomor++;
			if (($b->id_surat) == "") {
					$dispo1 = "<i class='fa fa-close' aria-hidden='true' style ='color:red'></i>"; 
				} else {
					$dispo1 = "<i class='fa fa-check' aria-hidden='true' style ='color:green'></i>"; 
				}

				if (($b->nip_pelaksana) == "") {
					$dispo2 = "<i class='fa fa-close' aria-hidden='true' style ='color:red'></i>"; 
				} else {
					$dispo2 = "<i class='fa fa-check' aria-hidden='true' style ='color:green'></i>"; 
				}

				if (($b->selesai) == "") {
					$selesai = "<i class='fa fa-close' aria-hidden='true' style ='color:red'></i>"; 
				} else {
					$selesai = "<i class='fa fa-check' aria-hidden='true' style ='color:green'></i>"; 
				}


				?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $b->no_agenda;?></td>
			<td><?php echo $b->kode." - ".$b->nama;?></td>
			<td><?php echo $b->isi_ringkas."<br><b>File : </b><i><a href='".base_URL()."upload/surat_masuk/".$b->file."' target='_blank'>".$b->file."</a>"?></td>
			<td><?php echo $b->dari; ?></td>
			<td><?php echo $b->no_surat."<br><i>".tgl_jam_sql($b->tgl_surat)."</i>"?></td>
			<td><?php echo $dispo1; ?></td>
			<td><?php echo $dispo2; ?></td>
			<td><?php echo $selesai; ?></td>
			<td class="ctr">
				<?php
					if ($this->session->userdata('admin_level') == "Umum") {
				?>				
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/surat_masuk/edt/<?php echo $b->id?>" class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Ubah</a>
					<a href="<?php echo base_URL()?>index.php/admin/surat_masuk/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Hapus</a>			
					
					<a href="<?php echo base_URL()?>index.php/admin/disposisi_cetak/<?php echo $b->id?>" class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi"><i class="icon-print icon-white"> </i> Cetak</a>
				</div>	
				
				<?php } ?>
				
				<?php
					if (($this->session->userdata('admin_level') == "KK")||($this->session->userdata('admin_level') == "Kasi")) {
				?>
				<div class="btn-group">
				<a href="<?php echo base_URL()?>index.php/admin/surat_disposisi/<?php echo $b->id?>" class="btn btn-success btn-sm"  title="Disposisi Surat"><i class="icon-trash icon-list"> </i> Disposisi</a>
				</div>	
				
				<?php } ?>
				
				
				<?php
					if ($this->session->userdata('admin_level') == "Staf") {
				?>
				<div class="btn-group">
				<a href="<?php echo base_URL()?>index.php/admin/surat_disposisi/<?php echo $b->id?>" class="btn btn-success btn-sm"  title="Selesaikan Surat"><i class="icon-trash icon-list"> </i> Selesaikan</a>
				</div>	
				
				<?php } ?>
				
				
				
				
				
			</td>
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
