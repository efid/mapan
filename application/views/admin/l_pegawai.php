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
				<span class="navbar-brand" style = "color:white">Daftar Pegawai</span>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: 20px">
						<?php
			if ($this->session->userdata('admin_level') == "Umum") {
			?>
			<ul class="nav navbar-nav">
			<li><a href="<?php echo base_URL(); ?>index.php/admin/pegawai/add" class="btn btn-success" style="color:white"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a></li>
			</ul>
			<?php }?>
			
			
			
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

<table  id="example1" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">Nomor</th>
			<th width="15%">Nama</th>
			<th width="15%">NIP</th>
			<th width="20%">Seksi</th>
			<th width="15%">Jabatan</th>
			<th width="15%">Email</th>
			<th width="15%">Aksi</th>
			
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
			<td><?php echo $b->email; ?></td>

			
			<?php 
			if ($this->session->userdata('admin_user') == "umum") {
			?>
			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/admin/pegawai/edt/<?php echo $b->id; ?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Ubah</a>
					<a href="<?php echo base_URL()?>index.php/admin/pegawai/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Hapus</a>
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

</div>
