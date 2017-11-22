<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$a['page']	= "d_amain";
		
		$this->load->view('admin/aaa', $a);
	}

	public function klas_surat() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM ref_klasifikasi")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/klas_surat/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM ref_klasifikasi WHERE nama LIKE '%$cari%' OR uraian LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_klas_surat";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM ref_klasifikasi WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE ref_klasifikasi SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/klas_surat');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM ref_klasifikasi LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_klas_surat";
		}
		
		$this->load->view('admin/aaa', $a);
	}

	public function pegawai() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pegawai")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/pegawai/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$nip					= addslashes($this->input->post('nip'));
		$seksi					= addslashes($this->input->post('seksi'));
		$jabatan					= addslashes($this->input->post('jabatan'));
		$eselon					= addslashes($this->input->post('eselon'));
		$email					= addslashes($this->input->post('email'));
		
		$cari					= addslashes($this->input->post('q'));

		
		$niplogin = $this->session->userdata('admin_nip');
		$seksilogin = $this->session->userdata('admin_seksi');
		if ($this->session->userdata('admin_level') == "Staf") {
			$sql="SELECT * from t_pegawai WHERE deleted=0 and nip='$niplogin' LIMIT $awal, $akhir ";
			// var_dump($sql);die;
				
			}else if ($this->session->userdata('admin_level') == "Kasi"){				
			$sql ="SELECT * from t_pegawai WHERE deleted=0 and  seksi = '$seksilogin' order by nama asc LIMIT $awal, $akhir";
					
			}else {				
			$sql ="SELECT * from t_pegawai where deleted=0 order by nama asc LIMIT $awal, $akhir";
					
			}

		if ($mau_ke == "del") {
			$this->db->query("UPDATE t_pegawai SET deleted = 1 WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/pegawai');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pegawai WHERE nama LIKE '%$cari%' OR nip LIKE '%$cari%' ORDER BY nama DESC")->result();
			$a['page']		= "l_pegawai";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_pegawai";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pegawai WHERE id = '$idu'")->row();	
			$a['page']		= "f_pegawai";
		} else if ($mau_ke == "act_edt") {
			$sql="UPDATE t_pegawai SET nama = '$nama', nip = '$nip',seksi='$seksi', jabatan='$jabatan', eselon='$eselon', email='$email' WHERE id = '$idp'";
// var_dump($sql) ; die;

			$this->db->query($sql);
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/pegawai');
		} else if ($mau_ke == "act_add") {
			$sql="INSERT INTO t_pegawai (nama, nip, seksi, jabatan, eselon,email,deleted) value ('$nama', '$nip', '$seksi','$jabatan','$eselon','$email','0')";
// var_dump($sql) ; die;

			$this->db->query($sql);
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/pegawai');
		} else {
			$a['data']		= $this->db->query($sql)->result();
			$a['page']		= "l_pegawai";
		}
		
		$this->load->view('admin/aaa', $a);
	}



	
	public function surat_masuk() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$ta'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		
		
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/surat_masuk/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_masuk';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		
		$nip = $this->session->userdata('admin_nip');
		$seksi = $this->session->userdata('admin_seksi');
		if ($this->session->userdata('admin_level') == "Staf") {
			$sql="SELECT a.*,b.nama,c.id_surat ,d.nip_pelaksana,d.selesai
				FROM t_surat_masuk a 
				left join ref_klasifikasi b on a.kode=b.kode 
				left join (select distinct id_surat from t_disposisi ) c on a.id=c.id_surat
				left join (select distinct id_surat,nip_pelaksana,selesai from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
				WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' and nip_pelaksana='$nip' order by a.id desc LIMIT $awal, $akhir ";
				// var_dump($sql);die;
				
			}else if ($this->session->userdata('admin_level') == "Kasi"){				
			$sql ="SELECT a.*,b.nama,c.id_surat,c.kpd_yth,d.nip_pelaksana,d.selesai
				FROM t_surat_masuk a 
				left join ref_klasifikasi b on a.kode=b.kode 
				left join (select distinct id_surat,kpd_yth from t_disposisi ) c on a.id=c.id_surat
				left join (select distinct id_surat,nip_pelaksana,selesai from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
				WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' and c.kpd_yth = '$seksi' order by a.id desc LIMIT $awal, $akhir";
					
			}else {				
			$sql ="SELECT a.*,b.nama,c.id_surat ,d.nip_pelaksana,d.selesai
				FROM t_surat_masuk a 
				left join ref_klasifikasi b on a.kode=b.kode 
				left join (select distinct id_surat from t_disposisi ) c on a.id=c.id_surat
				left join (select distinct id_surat,nip_pelaksana,selesai from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
				WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' order by a.id desc LIMIT $awal, $akhir";
					
				}
					
					
					
		
		
		if ($mau_ke == "del") {
			$this->db->query("UPDATE t_surat_masuk SET deleted = 1 WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_masuk');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM (".$sql.") a WHERE isi_ringkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_surat_masuk";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_masuk";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();
			$a['page']		= "f_surat_masuk";
			// var_dump($a['datpil']); die;
		} else if ($mau_ke == "act_add") {
			
			$emailkk	= $this->db->query("SELECT nama,email from t_pegawai where jabatan='Kepala Kantor'")->row();
			$email = $emailkk->email;
			$nama = $emailkk->nama;	
			$keterangan="";
			//kirim email
			$this->notif($email,$nama,$uraian,$dari,$no_surat,$tgl_surat,$keterangan);


			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."',0,'')");
			} else {
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."',0,'')");
			}	
			
			
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. Email notifikasi telah dikirim ke ".$email.$this->upload->display_errors()."</div>");

			
			redirect('index.php/admin/surat_masuk');
		} else if ($mau_ke == "act_edt") {
			

				
			
				if ($this->upload->do_upload('file_surat')) {
					$up_data	 	= $this->upload->data();
							
					$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
					
				} else {
					
					$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			
				}

			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('index.php/admin/surat_masuk');
		} else {
				$nip = $this->session->userdata('admin_nip');
				$seksi = $this->session->userdata('admin_seksi');
				if ($this->session->userdata('admin_level') == "Staf") {
					// $sql="SELECT a.*,b.nama,c.id_surat ,d.nip_pelaksana,d.selesai
						// FROM t_surat_masuk a 
						// left join ref_klasifikasi b on a.kode=b.kode 
						// left join (select distinct id_surat from t_disposisi ) c on a.id=c.id_surat
						// left join (select distinct id_surat,nip_pelaksana,selesai from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
						// WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' and nip_pelaksana='$nip' order by a.id desc LIMIT $awal, $akhir ";
					// var_dump($sql);die;
					$a['data'] = $this->db->query($sql)->result();
				
					}else if ($this->session->userdata('admin_level') == "Kasi"){				
					// $sql ="SELECT a.*,b.nama,c.id_surat,c.kpd_yth,d.nip_pelaksana,d.selesai
						// FROM t_surat_masuk a 
						// left join ref_klasifikasi b on a.kode=b.kode 
						// left join (select distinct id_surat,kpd_yth from t_disposisi ) c on a.id=c.id_surat
						// left join (select distinct id_surat,nip_pelaksana,selesai from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
						// WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' and c.kpd_yth = '$seksi' order by a.id desc LIMIT $awal, $akhir";
					
					$a['data'] = $this->db->query($sql)->result();
						
						// var_dump($sql);die;
					}else {				
					// $sql ="SELECT a.*,b.nama,c.id_surat ,d.nip_pelaksana
						// FROM t_surat_masuk a 
						// left join ref_klasifikasi b on a.kode=b.kode 
						// left join (select distinct id_surat from t_disposisi ) c on a.id=c.id_surat
						// left join (select distinct id_surat,nip_pelaksana from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
						// WHERE a.deleted = 0 and YEAR(tgl_diterima) = '$ta' order by a.id desc LIMIT $awal, $akhir";
					$a['data'] = $this->db->query($sql)->result();
						// var_dump($a['data']);die;
					} 
		$a['page']		= "l_surat_masuk";



		}
		
		
		$this->load->view('admin/aaa', $a);
	}

	public function surat_masuk_disp() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$ta'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/surat_masuk/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat1				= addslashes($this->input->post('no_surat1'));
		$no_surat2				= addslashes($this->input->post('no_surat2'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_masuk';
		$config['allowed_types'] 	= 'jpg|pdf';
		$config['max_size']			= '5000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_surat_masuk WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_masuk');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_masuk WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_surat_masuk";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_masuk";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
			$a['page']		= "f_surat_masuk";
		} else if ($mau_ke == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect('index.php/admin/surat_masuk');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('index.php/admin/surat_masuk');
		} else {
			$a['data']		= $this->db->query("SELECT a.*,b.nama,c.id_surat ,d.nip_pelaksana
						FROM t_surat_masuk a 
						left join ref_klasifikasi b on a.kode=b.kode 
						left join (select distinct id_surat from t_disposisi ) c on a.id=c.id_surat
						left join (select distinct id_surat,nip_pelaksana from t_disposisi where nip_pelaksana <> '' group by id_surat) d on a.id=d.id_surat
						WHERE a.deleted = 0 and c.id_surat is NULL and YEAR(tgl_diterima) = '$ta' order by a.id desc LIMIT $awal, $akhir")->result();
			$a['page']		= "l_surat_masuk";
		}
		
		$this->load->view('admin/aaa', $a);
	}

	
	
	public function surat_keluar() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_surat_keluar WHERE YEAR(tgl_catat) = '$ta'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/surat_keluar/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		// $no_agenda				= addslashes($this->input->post('no_agenda'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat1				= addslashes($this->input->post('no_surat1'));
		$no_surat2				= addslashes($this->input->post('no_surat2'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		$nip = $this->session->userdata('admin_nip');
		$seksi = $this->session->userdata('admin_seksi');

		if ($this->session->userdata('admin_level') == "Kasi") {		
			$sql="SELECT * FROM t_surat_keluar WHERE deleted=0 and seksi = '$seksi' and YEAR(tgl_catat) = '$ta' order by id desc LIMIT $awal, $akhir ";

		}else if($this->session->userdata('admin_level') == "Staf"){
			
			$sql="SELECT * FROM t_surat_keluar WHERE deleted=0 and nip='$nip' and YEAR(tgl_catat) = '$ta' order by id desc LIMIT $awal, $akhir";
			
		}else{
			
			$sql="SELECT * FROM t_surat_keluar WHERE deleted=0 and YEAR(tgl_catat) = '$ta' order by id desc LIMIT $awal, $akhir";
			
		}

		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_surat_keluar WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_keluar');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_keluar WHERE isi_ringkas LIKE '%$cari%' OR tujuan LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_surat_keluar";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_keluar";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE id = '$idu'")->row();	
			$a['page']		= "f_surat_keluar";
		} else if ($mau_ke == "act_add") {	
			$sql="INSERT INTO t_surat_keluar (kode,no_surat1,no_surat2,isi_ringkas, tujuan, tgl_surat, tgl_catat, keterangan, seksi,nip, pengolah,deleted) VALUES ('$kode', '$no_surat1','$no_surat2', '$uraian', '$dari',    '$tgl_surat', NOW(), '$ket', '$seksi','$nip', '".$this->session->userdata('admin_id')."',0)";
			// var_dump($sql);die;
			$this->db->query($sql);
		// if ($this->upload->do_upload('file_surat')) {
				// $up_data	 	= $this->upload->data();
				
				// $this->db->query("INSERT INTO t_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."',0,'')");
			// } else {
				// $this->db->query("INSERT INTO t_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."',0,'')");
			// }		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/surat_keluar');
		} else if ($mau_ke == "act_edt") {
			
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				$sql="UPDATE t_surat_keluar SET file = '".$up_data['file_name']."' WHERE id = '$idp'";
				$this->db->query($sql);
				// var_dump($sql); die;
			}else{
				$sql="UPDATE t_surat_keluar SET kode = '$kode',no_surat1 = '$no_surat1',no_surat2 = '$no_surat2', isi_ringkas = '$uraian', tujuan = '$dari', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'";
				$this->db->query($sql);
				
			}
			// if ($this->upload->do_upload('file_surat')) {
				// $up_data	 	= $this->upload->data();
				
				// $this->db->query("UPDATE t_surat_keluar SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			// } else {
				// $this->db->query("UPDATE t_surat_keluar SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			// }	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated ".$this->upload->display_errors()."</div>");			
			redirect('index.php/admin/surat_keluar');
		} else {
			$a['data']		= $this->db->query($sql)->result();
			$a['page']		= "l_surat_keluar";
		}
		
		$this->load->view('admin/aaa', $a);
	}

	public function surat_disposisi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$seksi = $this->session->userdata('admin_seksi');
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(4);
		$idu1					= $this->uri->segment(3);
		$idu2					= $this->uri->segment(5);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$id_surat				= addslashes($this->input->post('id_surat'));
		$kpd_yth				= addslashes($this->input->post('kpd_yth'));
		$isi_disposisi			= addslashes($this->input->post('isi_disposisi'));
		$sifat					= addslashes($this->input->post('sifat'));
		$batas_waktu			= addslashes($this->input->post('batas_waktu'));
		$catatan				= addslashes($this->input->post('catatan'));
		$catatan				= addslashes($this->input->post('catatan'));
		$nip					= addslashes($this->input->post('nip'));
		$tgl_disposisi2			= addslashes($this->input->post('tgl_disposisi2'));
		$tgl_selesai			= addslashes($this->input->post('tgl_selesai'));
		$selesai				= addslashes($this->input->post('selesai'));
		
		$cari					= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_disposisi/".$idu1."/p");
		
		$a['judul_surat']	= gval("t_surat_masuk", "id", "isi_ringkas", $idu1);
		
		if ($mau_ke == "del") {
			$this->db->query("UPDATE t_disposisi set deleted= '1' WHERE id = '$idu2'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_disposisi/'.$idu1);
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_disposisi";
		} else if ($mau_ke == "edt") {
			
			$sql = "SELECT * FROM t_disposisi WHERE id = '$idu2' and deleted=0 ";
			$a['datpil']	= $this->db->query($sql)->row();	
			$a['page']		= "f_surat_disposisi";
			// var_dump($sql); die;
		} else if ($mau_ke == "act_add") {	
			$this->db->query("INSERT INTO t_disposisi (id_surat,kpd_yth,isi_disposisi, tgl_disposisi1, sifat, batas_waktu, catatan, deleted ) VALUES ('$id_surat', '$kpd_yth', '$isi_disposisi',now(), '$sifat', '$batas_waktu', '$catatan','0')");
			
			$emailkasi	= $this->db->query("SELECT nama,email from t_pegawai where eselon = '4' and seksi='$kpd_yth'")->row();
			$email = $emailkasi->email;
			$nama = $emailkasi->nama;			
			//kirim email
			$surat	= $this->db->query("SELECT no_surat,tgl_surat, dari,isi_ringkas from t_surat_masuk where id ='$id_surat'")->row();
			$uraian = $surat->isi_ringkas ;
			$dari= $surat-> dari;
			$no_surat = $surat-> no_surat;
			$tgl_surat= tgl_jam_sql($surat-> tgl_surat);
			$keterangan = $isi_disposisi.", Batas waktu :".tgl_jam_sql($batas_waktu) ;
			$this->notif($email,$nama,$uraian,$dari,$no_surat,$tgl_surat,$keterangan);
			
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. Email notifikasi telah dikirim ke ".$email." </div>");
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
			
			
		} else if ($mau_ke == "act_edt") {
				if ($this->session->userdata('admin_level') == "KK") {
					$this->db->query("UPDATE t_disposisi SET kpd_yth = '$kpd_yth', isi_disposisi = '$isi_disposisi', sifat = '$sifat', batas_waktu = '$batas_waktu', catatan = '$catatan' WHERE id = '$idp'");					

				
				
				} else if ($this->session->userdata('admin_level') == "Kasi") {
					// var_dump($tgl_disposisi2) ; die;

					$emailstaf	= $this->db->query("SELECT nama,email from t_pegawai where nip='$nip'")->row();
						$email = $emailstaf->email;
						$nama = $emailstaf->nama;			
						//kirim email
						$surat	= $this->db->query("SELECT a.isi_disposisi,a.batas_waktu,a.id_surat, b.no_surat,b.tgl_surat, b.dari,b.isi_ringkas from t_disposisi a left join t_surat_masuk b on a.id_surat=b.id where a.id ='$idp'")->row();
						// var_dump($surat) ; die;
						
						$isi_disposisi = $surat->isi_disposisi ;
						$batas_waktu = $surat->batas_waktu ;
						$uraian = $surat->isi_ringkas ;
						$dari= $surat-> dari;
						$no_surat = $surat-> no_surat;
						$tgl_surat= tgl_jam_sql($surat-> tgl_surat);
						$keterangan = $isi_disposisi.", Batas waktu :".tgl_jam_sql($batas_waktu) ;
						$this->notif($email,$nama,$uraian,$dari,$no_surat,$tgl_surat,$keterangan);
					
					
					if ($tgl_disposisi2=="0000-00-00 00:00:00"){
						$sql="UPDATE t_disposisi SET nip_pelaksana = '$nip',tgl_disposisi2=now() WHERE id = '$idp'";
						// $sql="";
						$this->db->query($sql);
	
						
					}else{
						$sql="UPDATE t_disposisi SET nip_pelaksana = '$nip' WHERE id = '$idp'";
						$this->db->query($sql);
					}
					$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. Email notifikasi telah dikirim ke ".$email." </div>");
								
				} else if ($this->session->userdata('admin_level') == "Staf") {
					
					if ($tgl_selesai=="0000-00-00 00:00:00"){
						$sql = "UPDATE t_disposisi SET  selesai = '$selesai',tgl_selesai=now() WHERE id = '$idp'";
						$this->db->query($sql);
						// var_dump($sql); die;
					}else{
						$sql = "UPDATE t_disposisi SET  selesai = '$selesai' WHERE id = '$idp'";
						$this->db->query($sql);
						// var_dump($sql); die;
					}
				

			
				}
			

						
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
		} else {
			
			if ($this->session->userdata('admin_level') == "Staf") {
			$nip = $this->session->userdata('admin_nip');	
			$sql2 ="SELECT a.*,b.nama FROM t_disposisi a left join t_pegawai b on a.nip_pelaksana=b.nip WHERE a.id_surat = '$idu1' and nip_pelaksana='$nip' and a.deleted='0' LIMIT $awal, $akhir " ;
			// var_dump($sql); die;
			$a['data']		= $this->db->query($sql2)->result();
			// var_dump($a['data']); die;
			
			$a['page']		= "l_surat_disposisi";
			
			} else if ($this->session->userdata('admin_level') == "Kasi"){
			
			$sql ="SELECT a.*,b.nama FROM t_disposisi a left join t_pegawai b on a.nip_pelaksana=b.nip WHERE a.id_surat = '$idu1' and a.deleted='0' and kpd_yth='$seksi' LIMIT $awal, $akhir " ;
			// var_dump($sql); die;
			$a['data']		= $this->db->query($sql)->result();
			$a['page']		= "l_surat_disposisi";
			
			} else {
			$sql ="SELECT a.*,b.nama FROM t_disposisi a left join t_pegawai b on a.nip_pelaksana=b.nip WHERE a.id_surat = '$idu1' and a.deleted='0' LIMIT $awal, $akhir " ;
			// var_dump($sql); die;
			$a['data']		= $this->db->query($sql)->result();
			$a['page']		= "l_surat_disposisi";	
				
			}
			
		}
		
		$this->load->view('admin/aaa', $a);	
	}
	
	public function pengguna() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		
		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		$kepsek					= addslashes($this->input->post('kepsek'));
		$nip_kepsek				= addslashes($this->input->post('nip_kepsek'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('logo')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

			} else {
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek' WHERE id = '$idp'");
			}		

			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/pengguna');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
			$a['page']		= "f_pengguna";
		}
		
		$this->load->view('admin/aaa', $a);	
	}
	
	public function agenda_surat_masuk() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	public function agenda_surat_keluar() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function cetak_agenda() {
		$jenis_surat	= $this->input->post('tipe');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE tgl_diterima >= '$tgl_start' AND tgl_diterima <= '$tgl_end' ORDER BY id")->result(); 
			$this->load->view('admin/agenda_surat_masuk', $a);
		} else {
			$a['data']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda_surat_keluar', $a);
		}
	}	
	
	public function manage_admin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_admin")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/manage_admin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$password				= md5(addslashes($this->input->post('password')));
		// $nama					= addslashes($this->input->post('nama'));
		$nip					= addslashes($this->input->post('nip'));
		// $jabatan				= addslashes($this->input->post('jabatan'));
		// $seksi					= addslashes($this->input->post('seksi'));
		$level					= addslashes($this->input->post('level'));
		
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "del") {
			$this->db->query("update t_admin set deleted=1 WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT a.*,b.nama FROM t_admin a left join t_pegawai b on a.nip=b.nip  WHERE b.nama LIKE '%$cari%' or a.nip LIKE '%$cari%' or a.seksi LIKE '%$cari%' or a.level LIKE '%$cari%' or a.jabatan LIKE '%$cari%' ORDER BY seksi DESC")->result();
			$a['page']		= "l_manage_admin";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_admin WHERE id = '$idu'")->row();	
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "act_add") {	
			$cek_user_exist = $this->db->query("SELECT username FROM t_admin WHERE deleted=0 and username = '$username'")->num_rows();

			if (strlen($username) < 1) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 6 huruf</div>");
			} else if ($cek_user_exist > 0) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username telah dipakai. Ganti yang lain..!</div>");
				
			} else {
				$sql="INSERT INTO t_admin (username,password, nip,level) VALUES ('$username', '$password','$nip', '$level')";
				// var_dump($sql); die;
				$this->db->query($sql);
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">has been added</div>");
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "act_edt") {
			// $password = md5(addslashes($this->input->post('password')));
				
				if ($password == md5("-")) {
					$sql="UPDATE t_admin SET username = '$username', nip = '$nip', level = '$level' WHERE id = '$idp'";
					$this->db->query($sql);
				// var_dump($sql); die;
				} else {
					$sql="UPDATE t_admin SET username = '$username', password = '$password', nip = '$nip', level = '$level' WHERE id = '$idp'";
					$this->db->query($sql);
					// var_dump($sql); die;

				}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated </div>");			
			redirect('index.php/admin/manage_admin');
		} else {
			$a['data']		= $this->db->query("SELECT a.*,b.nama,b.jabatan,b.seksi FROM t_admin a left join t_pegawai b on a.nip=b.nip  where a.deleted=0 order by b.seksi,a.level LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_manage_admin";
		}
		
		$this->load->view('admin/aaa', $a);
	}

	public function get_klasifikasi() {
		$kode 				= $this->input->post('kode',TRUE);
		
		$data 				=  $this->db->query("SELECT id, kode, nama FROM ref_klasifikasi WHERE kode LIKE '%$kode%' ORDER BY id ASC")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->nama;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}

	public function get_nip() {
		$nip 				= $this->input->post('nip',TRUE);
		$nama 				= $this->input->post('nama',TRUE);
		
		$data 				=  $this->db->query("SELECT nip,nama FROM t_pegawai WHERE nama LIKE '%$nip%' ORDER BY id ASC")->result();
		
		$nip 		=  array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->nip;
			$json_array['label']	= $d->nip." - ".$d->nama;
			$nip[] 			= $json_array;
		}
		
		echo json_encode($nip);
	}

	
	
	public function get_instansi_lain() {
		$kode 				= $this->input->post('dari',TRUE);
		
		$data 				=  $this->db->query("SELECT dari FROM t_surat_masuk WHERE dari LIKE '%$kode%' GROUP BY dari")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$klasifikasi[] 	= $d->dari;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function disposisi_cetak() {
		$idu = $this->uri->segment(3);
		$a['datpil1']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
		$a['datpil2']	= $this->db->query("SELECT kpd_yth FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$a['datpil3']	= $this->db->query("SELECT isi_disposisi, sifat, batas_waktu FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$this->load->view('admin/f_disposisi', $a);
	}
	
	public function passwod() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ke				= $this->uri->segment(3);
		$id_user		= $this->session->userdata('admin_id');
		
		//var post
		$p1				= md5($this->input->post('p1'));
		$p2				= md5($this->input->post('p2'));
		$p3				= md5($this->input->post('p3'));
		
		if ($ke == "simpan") {
			$cek_password_lama	= $this->db->query("SELECT password FROM t_admin WHERE id = $id_user")->row();
			//echo 
			
			if ($cek_password_lama->password != $p1) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
				redirect('index.php/admin/passwod');
			} else if ($p2 != $p3) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
				redirect('index.php/admin/passwod');
			} else {
				$this->db->query("UPDATE t_admin SET password = '$p3' WHERE id = ".$id_user."");
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui</div>');
				redirect('index.php/admin/passwod');
			}
		} else {
			$a['page']	= "f_passwod";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//login
	public function login() {
		$this->load->view('admin/login');
	}
	
	public function do_login() {
		$u 		= $this->security->xss_clean($this->input->post('u'));
		$ta 	= $this->security->xss_clean($this->input->post('ta'));
        $p 		= md5($this->security->xss_clean($this->input->post('p')));
         
		 
		$sql ="SELECT a.*,b.nama,b.seksi,b.jabatan FROM t_admin a left join t_pegawai b on a.nip=b.nip WHERE a.deleted=0 and a.username = '".$u."' AND a.password = '".$p."'";
		// var_dump($sql); die;
		$q_cek	= $this->db->query($sql);
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
            $data = array(
                    'admin_id' => $d_cek->id,
                    'admin_user' => $d_cek->username,
                    'admin_nama' => $d_cek->nama,
                    'admin_ta' => $ta,
                    'admin_jabatan' => $d_cek->jabatan,
                    'admin_seksi' => $d_cek->seksi,
                    'admin_level' => $d_cek->level,
                    'admin_nip' => $d_cek->nip,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
            redirect('index.php/admin');
        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('index.php/admin/login');
		}
	}
	
	public function notif ($email,$nama,$uraian,$dari,$no_surat,$tgl_surat,$keterangan) {
		$this->load->library('phpmailer.php');
		// include base_url()"plugins/email/class.phpmailer.php";
		// $no  = "S-1/PB.9/2017";
		// $dari = "Kantor Pusat Ditjen Perbendaharaan";
		// $perihal = "Penyampaian Perdirjen No. 13/PB.1/2017";
		// $email = $email;
		// $add2 = $nama;
// var_dump($add1); die;
		// $add1 = "dafidxxx@gmail.com";
		// $add2 = "dafidxxx@gmail.com";
		$message = '

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		</head>


		<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px; background:#ffffcc">
		<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
		Yth '.$nama.'
		<br> <br> <br> Mohon segera menindaklanjuti surat masuk berikut :    <br><br>
				<div style="float:left; width:75px; margin-bottom:5px;">No Surat</div>
				<div style="float:left;"><strong>'.$no_surat.'</strong></div>
				<div style="clear:both"></div>
				<div style="float:left; width:75px; margin-bottom:5px;">Tgl Surat</div>
				<div style="float:left;"><strong>'.$tgl_surat.'</strong></div>
				<div style="clear:both"></div>
				<div style="float:left; width:75px; margin-bottom:5px;">Pengirim</div>
				<div style="float:left;"><strong>'.$dari.'</strong></div>
				<div style="clear:both"></div>
				<div style="float:left; width:75px; margin-bottom:5px;">Perihal</div>
				<div style="float:left;"><strong>'.$uraian.'</strong></div>
				<div style="clear:both"></div>
				<div style="float:left; width:75px; margin-bottom:5px;">Keterangan</div>
				<div style="float:left;"><strong>'.$keterangan.'</strong></div>
				<div style="clear:both"></div>
				<br>
				<br>
				<div style="float:left">Admin MAPAN - Manajemen Persuratan KPPN</div>
				<br>
				<div style="float:left">https://mapan.asia</div>
		 <td><tr></table>
		</body>
		</html>';


		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		// $mail->Host = gethostbyname('smtp.gmail.com');
		$mail->Host = gethostbyname('iix03.whmbox.com');
		// $mail->Host = "smtp.gmail.com"; //host masing2 provider email

		$mail->SMTPDebug = 0;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		// $mail->Username = "blogiouss@gmail.com"; //user email yang sebelumnya anda buat
		$mail->Username = "notif@mapan.asia"; //user email yang sebelumnya anda buat
		$mail->Password = "minang2009"; //password email yang sebelumnya anda buat
		$mail->SetFrom("notif@mapan.asia","Admin Manajemen Persuratan"); //set email pengirim
		$mail->Subject = "Notifikasi Surat Masuk"; //subyek email
		$mail->AddAddress($email,$nama);  //tujuan email
		$mail->MsgHTML($message);
		if($mail->Send()){


		echo "Email Notifikasi berhasil dikirim";


		}else {
				echo "gagal pengiriman";


			}



		
	}
	
	public function logout(){
        $this->session->sess_destroy();
		redirect('index.php/admin/login');
    }
}
