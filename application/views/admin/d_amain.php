

      <div class="clearfix">

		<div class="alert alert-dismissable alert-success">
			Selamat datang <strong><?php echo $this->session->userdata('admin_nama'); ?></strong> 
		</div>
			
      </div>

	<?php 
	$klr	= $this->db->query("SELECT COUNT(NO_AGENDA) as jml FROM t_surat_keluar WHERE YEAR(TGL_SURAT)='2017'")->row();
	?>
	<?php 
	$msk	= $this->db->query("SELECT COUNT(NO_AGENDA) as jml FROM t_surat_masuk WHERE YEAR(TGL_SURAT)='2017'")->row();
	?>
	  
	  	  
	  <div class="row">
  
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $klr->jml; ?></h3>
                  <p>Surat Keluar</p>
                </div>
                <div class="icon">
                  <i class="fa fa-paper-plane"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/surat_keluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $msk->jml; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Surat Masuk</p>
                </div>
                <div class="icon">
                  <i class="fa fa-folder-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>Surat Masuk belum disposisi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/klas_surat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>User Pengguna</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
			
           <section class="col-lg-6 col-sm-1 connectedSortable">
				<li class="pull-left header"><i class="fa fa-inbox"></i> Surat Masuk</li>
				<div id="masuk"></div>
			</section>
			
			<section class="col-lg-6 col-sm-1 connectedSortable">
				<li class="pull-left header"><i class="fa fa-inbox"></i> Surat Keluar</li>
				<div id="keluar"></div>
			</section>
			
		</div>

<script>
// Menggunakan Morris.Line
Morris.Line({
 
// ID Element dimana grafik ditempatkan
element: 'masuk',
 
// Data dari chart yang akan ditampilkan
data: [
{ year: '2010', value: 20 },
{ year: '2011', value: 10 },
{ year: '2012', value: 5},
{ year: '2013', value: 5},
{ year: '2014', value: 10},
{ year: '2015', value: 15},
{ year: '2016', value: 20},
{ year: '2017', value: 10},
{ year: '2018', value: 10}
 
],
// Sumbu X
xkey: 'year',
 
// Sumbu Y
ykeys: ['value'],
 
// Label
labels: ['Value']
});
</script>		


<script>
// Menggunakan Morris.Line
Morris.Line({
 
// ID Element dimana grafik ditempatkan
element: 'keluar',
lineColors: ['#D58665'],
// Data dari chart yang akan ditampilkan
data: [
{ year: '2010', value: 30 },
{ year: '2011', value: 20 },
{ year: '2012', value: 15},
{ year: '2013', value: 25},
{ year: '2014', value: 20},
{ year: '2015', value: 25},
{ year: '2016', value: 10},
{ year: '2017', value: 20},
{ year: '2018', value: 30}
 
],
// Sumbu X
xkey: 'year',
 
// Sumbu Y
ykeys: ['value'],
 
// Label
labels: ['Value']
});
</script>		