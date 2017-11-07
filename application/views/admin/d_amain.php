

      <div class="clearfix">

		<div class="alert alert-dismissable alert-success">
			Selamat datang <strong><?php echo $this->session->userdata('admin_nama'); ?></strong> 
			<?php 
			echo"( " ; 
			echo $this->session->userdata('admin_jabatan'); 
			echo" " ;
			echo $this->session->userdata('admin_seksi');
			echo" )";
			echo" Level User : " ;?>
			<strong><?php echo $this->session->userdata('admin_level');?></strong>
		</div>
			
      </div>
	<?php 
	  $ta = $this->session->userdata('admin_ta');
	?>
	<?php 
	$klr	= $this->db->query("SELECT COUNT(no_surat1) as jml FROM t_surat_keluar WHERE deleted=0 and  YEAR(TGL_SURAT)='$ta'")->row();
	?>
	<?php 
	$msk	= $this->db->query("SELECT COUNT(no_surat) as jml FROM t_surat_masuk WHERE deleted=0 and YEAR(TGL_SURAT)='$ta'")->row();
	?>
	  
	<?php 
	$disp	= $this->db->query("SELECT count(id) jml FROM t_surat_masuk a 
	left join (select distinct id_surat from t_disposisi )b on a.id=b.id_surat
	WHERE deleted=0 and year(a.tgl_diterima)='$ta' and id_surat is NULL")->row();
	?>
	
	<?php 
	$dispkasi	= $this->db->query("SELECT count(a.kode) jml
						FROM t_surat_masuk a 
						left join ref_klasifikasi b on a.kode=b.kode 
						left join (select distinct id_surat,nip_pelaksana from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
						WHERE a.deleted = 0 and YEAR(tgl_diterima) = '2017'  and nip_pelaksana is NULL")->row();
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
                  <h3><?php echo $disp->jml; ?></h3>
                  <p>Belum disposisi KK</p>
                </div>
                <div class="icon">
                  <i class="fa fa-folder-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/surat_masuk_disp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $dispkasi->jml; ?></h3>
                  <p>Belum Disposisi Kasi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-folder-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
			
           <section class="col-lg-6 col-sm-1 connectedSortable">
				<span class="pull-left header"><i class="fa fa-inbox"></i> Surat Masuk</span>
				<div id="masuk"></div>
			</section>
			
			<section class="col-lg-6 col-sm-1 connectedSortable">
				<span class="pull-left header"><i class="fa fa-inbox"></i> Surat Keluar</span>
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
{ year: '2012', value: 15},
{ year: '2013', value: 15},
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