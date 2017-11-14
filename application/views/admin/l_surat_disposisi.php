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
	
	<div class="navbar navbar-inverse bg-black">
		<div class="container">
			<div class="navbar-header " >
				<span class="navbar-brand" style="font-family: verdana; color:white">DISPOSISI SURAT</span>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse navbar-left" style="margin-right: 20px">
				<ul class="nav navbar-nav">
  				
			<?php
				if ($this->session->userdata('admin_level') == "KK") {
			?>	
				
				<li><a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3)?>/add" class="btn btn-success" style="color:white"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
			<?php }?>
					
				<li><a href="<?php echo base_URL(); ?>index.php/admin/surat_masuk" class="btn btn-warning" style="color:white"><i class="icon-share icon-white"> </i> Kembali</a></li>
				</ul>
				
				
			
			
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

	  

  </div>

</div>

<?php echo $this->session->flashdata("k");?>
	
<div class="alert alert-info">Perihal Surat</b> : <i><?php echo $judul_surat; ?></i></div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="15%">Tujuan Disposisi<br>Tanggal</th>
			<th width="15%">Disposisi KK</th>
			<th width="15%">Disposisi ke Pelaksana<br>Tanggal</th>
			<th width="20%">Catatan Pelaksana</th>
			<th width="10%">Tgl Penyelesaian</th>
			<th width="15%">Sifat, Batas Waktu</th>
			<th width="15%">Aksi</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
		?>
		<tr>
			<td><?php echo $b->id; ?></td>
			
			<td><?php echo $b->kpd_yth."<br>".$b->tgl_disposisi1 ;?></td>
			<td><?php echo $b->isi_disposisi; ?></td>
			<td><?php echo $b->nama."<br>".$b->tgl_disposisi2 ;?></td>
			<td><?php echo $b->selesai;?></td>
			<td><?php echo $b->tgl_selesai;?></td>

			<td><?php echo $b->sifat."<br><i>Batas waktu s.d. ".tgl_jam_sql($b->batas_waktu)."</i>"?></td>
			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3)?>/edt/<?=$b->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					
			<?php
					if ($this->session->userdata('admin_level') == "KK") {
			?>	
					<a href="<?php echo base_URL(); ?>index.php/admin/surat_disposisi/<?php echo $this->uri->segment(3)?>/del/<?=$b->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
					
					<?php } ?>
				</div>					
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
