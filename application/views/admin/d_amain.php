

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
	$suratmasuk	= $this->db->query("select month(tgl_surat) month,count(no_surat) value from t_surat_masuk group by month")->result();
	// var_dump($suratmasuk);die;
	?>
	<?php 
	$suratkeluar	= $this->db->query("select month(tgl_surat) month,count(no_surat1) value from t_surat_keluar group by month")->result();
	// var_dump($suratmasuk);die;
	?>

<?php 
	$subbagumum	= $this->db->query("select  'TepatWaktu' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) != '0000-00-00' and date(tgl_selesai) <= batas_waktu and kpd_yth='Sub Bagian Umum'
		union all
		select 'Terlambat' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) > batas_waktu and kpd_yth='Sub Bagian Umum' 
		union all
		select 'Proses' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) = '0000-00-00' and kpd_yth='Sub Bagian Umum' ")->result();
	
	$jmlsubbagumum	= $this->db->query("select count(id_surat) jml from t_disposisi where deleted=0 and kpd_yth='Sub Bagian Umum' ")->row();
	
	// var_dump($subbagumum);die;
	?>

<?php 
	$vera	= $this->db->query("select  'TepatWaktu' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) != '0000-00-00' and date(tgl_selesai) <= batas_waktu and kpd_yth='Seksi Verifikasi dan Akuntansi'
		union all
		select 'Terlambat' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) > batas_waktu and kpd_yth='Seksi Verifikasi dan Akuntansi' 
		union all
		select 'Proses' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) = '0000-00-00' and kpd_yth='Seksi Verifikasi dan Akuntansi' ")->result();
	$jmlvera	= $this->db->query("select count(id_surat) jml from t_disposisi where deleted=0 and kpd_yth='Seksi Verifikasi dan Akuntansi' ")->row();

		// var_dump($subbagumum);die;

	?>

	
<?php 
	$perben	= $this->db->query("select  'TepatWaktu' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) != '0000-00-00' and date(tgl_selesai) <= batas_waktu and kpd_yth='Seksi Perbendaharaan'
		union all
		select 'Terlambat' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) > batas_waktu and kpd_yth='Seksi Perbendaharaan' 
		union all
		select 'Proses' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) = '0000-00-00' and kpd_yth='Seksi Perbendaharaan' ")->result();
	// var_dump($subbagumum);die;
	$jmlperben	= $this->db->query("select count(id_surat) jml from t_disposisi where deleted=0 and kpd_yth='Seksi Perbendaharaan' ")->row();

	?>

<?php 
	$bank	= $this->db->query("select  'TepatWaktu' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) != '0000-00-00' and date(tgl_selesai) <= batas_waktu and kpd_yth='Seksi Bank Giro Pos'
		union all
		select 'Terlambat' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) > batas_waktu and kpd_yth='Seksi Bank Giro Pos' 
		union all
		select 'Proses' label, count(id_surat) value from t_disposisi where deleted=0 and date(tgl_selesai) = '0000-00-00' and kpd_yth='Seksi Bank Giro Pos' ")->result();
	$jmlbank	= $this->db->query("select count(id_surat) jml from t_disposisi where deleted=0 and kpd_yth='Seksi Bank Giro Pos' ")->row();

		// var_dump($subbagumum);die;
	?>




	
	
	
	
	
	<?php 
	$klr	= $this->db->query("SELECT COUNT(no_surat1) as jml FROM t_surat_keluar WHERE deleted=0")->row();
	?>
	<?php 
	$msk	= $this->db->query("SELECT COUNT(no_surat) as jml FROM t_surat_masuk WHERE deleted=0")->row();
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
                <a href="<?php echo base_url(); ?>index.php/admin/surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $disp->jml; ?></h3>
                  <p>Dalam Proses</p>
                </div>
                <div class="icon">
                  <i class="fa fa-folder-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/admin/surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
		</div>	
		

<div class="row">		
            <div class="col-lg-3">
			<h4 class="box-title">Sub Bagian Umum ( <?php echo $jmlsubbagumum->jml ?> )</h4>
			<!-- small box -->
              <div class="small-box">
				<div id="donut-example1"></div>
              </div>
			  </div><!-- ./col -->
            
			<div class="col-lg-3">
			<h4 class="box-title">Seksi Perbendaharaan ( <?php echo $jmlperben->jml ?> )</h4>
              <!-- small box -->
              <div class="small-box">
				<div id="donut-example2"></div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3">
			<h4 class="box-title">Seksi Verifikasi dan Akuntansi ( <?php echo $jmlvera->jml ?> )</h4>
              <!-- small box -->
              <div class="small-box">
				<div id="donut-example3"></div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3">
			<h4 class="box-title">Seksi Bank Giro Pos ( <?php echo $jmlbank->jml ?> )</h4>
              <!-- small box -->
              <div class="small-box">
				<div id="donut-example4"></div>
              </div>
            </div><!-- ./col -->
</div>            
			
<div class="row">
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
data: <?php echo json_encode($suratmasuk); ?>,
// Sumbu X
xkey: 'month',
 
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
data: <?php echo json_encode($suratkeluar); ?>,
// Sumbu X
xkey: 'month',
 
// Sumbu Y
ykeys: ['value'],
 
// Label
labels: ['Value']
});
</script>		


<script>

//suratmasuk_bar
// Morris.Bar({
  // element: 'bar-masuk',
  // data: <?php echo json_encode($suratmasuk_bar); ?>,
  // xkey: 'y',
  // ykeys: ['jml1', 'jml2','jml3','jml4'],
  // labels: ['Sub Bag Umum', 'Seksi Vera','Seksi Bank Giro Pos','Seksi Perbendaharaan']
// });
</script>

<script>
Morris.Bar({
  element: 'bar-keluar',
  data: [
    { y: 'jan', a: 100, b: 90, c:50,d:20 },
    { y: 'peb', a: 75,  b: 65, c:50,d:20  },
    { y: 'mar', a: 50,  b: 40, c:50,d:20  },
    { y: 'apr', a: 75,  b: 65, c:50,d:20  },
    { y: 'mei', a: 50,  b: 40, c:50,d:20  },
    { y: 'jun', a: 75,  b: 65, c:50,d:20  },
    { y: 'jul', a: 100, b: 90, c:50,d:20  },
    { y: 'ags', a: 100, b: 90, c:50,d:20  },
    { y: 'sep', a: 100, b: 90, c:50,d:20  },
    { y: 'okt', a: 100, b: 90, c:50,d:20  },
  ],
  xkey: 'y',
  ykeys: ['a', 'b','c','d'],
  labels: ['Sub Bag Umum', 'Seksi Vera','Seksi Bank Giro Pos','Seksi Perbendaharaan']
});
</script>

<script>
Morris.Donut({
  element: 'donut-example1',
  colors: ["#00a65a", "#f56954", "#3c8dbc"],  
  data: <?php echo json_encode($subbagumum); ?>
});
</script>

<script>
Morris.Donut({
  element: 'donut-example2',
  colors: ["#00a65a", "#f56954", "#3c8dbc"],
  data: <?php echo json_encode($perben); ?>
});
</script>
<script>
Morris.Donut({
  element: 'donut-example3',
  colors: ["#00a65a", "#f56954", "#3c8dbc"],
  data: <?php echo json_encode($vera); ?>
});
</script>

<script>
Morris.Donut({
  element: 'donut-example4',
  colors: ["#00a65a", "#f56954", "#3c8dbc"],
  data: <?php echo json_encode($bank); ?>
});
</script>