<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<span class="navbar-brand" style = "color:white">Daftar Pegawai</span>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: 20px">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_URL(); ?>index.php/admin/surat_keluar/add" class="btn-success" style="color:white"><i class="fa fa-plus" > </i> Tambah Data</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>index.php/admin/klas_surat/cari">
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
			<th width="5%">Nomor</th>
			<th width="20%">Nama</th>
			<th width="15%">NIP</th>
			<th width="10%">Seksi</th>
			<th width="10%">jabatan</th>
			<th width="5%">Gol</th>
			<th width="10%">Tgl Lahir</th>
			<th width="10%">Tempat Lahir</th>
			<th width="5%">Pendidikan</th>
			<th width="10%">Status</th>
			<th width="5%">Anak</th>
			<th width="5%">Jenis Kelamin</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$nomor=0;
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
			$nomor++;
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $b->nama; ?></td>
			<td><?php echo $b->nip; ?></td>
			<td><?php echo $b->seksi; ?></td>
			<td><?php echo $b->jabatan; ?></td>
			<td><?php echo $b->golongan; ?></td>
			<td><?php echo $b->tgl_lahir; ?></td>
			<td><?php echo $b->tmp_lahir; ?></td>
			<td><?php echo $b->pendidikan; ?></td>
			<td><?php echo $b->status; ?></td>
			<td><?php echo $b->anak; ?></td>
			<td><?php echo $b->jns_kelamin; ?></td>
			
			<?php 
			if ($this->session->userdata('admin_user') == "umum") {
			?>
			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/admin/klas_surat/edt/<?php echo $b->id; ?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
				</div>					
			</td>
			<?php 
			} else {
				echo "<td class='ctr'> -- </td>";
			}
			?>
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
