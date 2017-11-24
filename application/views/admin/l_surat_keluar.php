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
				<a class="navbar-brand" style="color:white">Surat Keluar</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: 20px">
	
	<?php if ($this->session->userdata('admin_level') == "Staf") {	?>		
			
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_URL(); ?>index.php/admin/surat_keluar/add" class="btn btn-success" style="color:white"><i class="fa fa-plus" > </i> Tambah Data</a></li>
			</ul>
	<?php } ?>
			
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	

<table id ="example1" class="table table-bordered table-hover dataTable">
	<thead>
		<tr>
			<th width="5%">No.</th>
			<th width="20%">No. Surat</th>
			<th width="10%">Tgl. Surat</th>
			<th width="30%">Isi Ringkas, File</th>
			<th width="25%">Tujuan Surat</th>
			<th width="15%">Aksi</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$urut = 1 ;
			foreach ($data as $b) {
			$nomor = $urut++;
		?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $b->no_surat1."/".$b->no_surat2;?></td>
			<td><?php echo "<i>".tgl_jam_sql($b->tgl_surat)."</i>"?></td>
			<td><?php echo $b->isi_ringkas."<br><b>File : </b><i><a href='".base_URL()."upload/surat_keluar/".$b->file."' target='_blank'>".$b->file."</a>"?></td>
			<td><?php echo $b->tujuan?></td>

			<td class="ctr">

				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/surat_keluar/edt/<?php echo $b->id?>" class="btn btn-success btn-sm" title="Ubah Data"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					
					<?php if ($this->session->userdata('admin_level') == "Staf") {	?>						
					<a href="<?php echo base_URL()?>index.php/admin/surat_keluar/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')">
					<i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<?php }?>
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

</div>
