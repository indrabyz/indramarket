<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct()
	{
		 parent::__construct();
		 if ($this->session->userdata('level')!=="1") {
            redirect('login'); }
         $this->load->helper('form','url');
		 $this->load->model('M_order');
	}

	public function index()
	{
		$data = $this->M_order->showdata('tbl_produk');
		$this->load->view('backend/index',array('data' => $data));
	}

	public function add()
	{
		$this->load->view('backend/buku/form_tambah_buku');
	}
	 public function ubah_ukuran(){
        $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assetss/backend/uploads/image_resize/buku/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 150; //lebar setelah resize menjadi 100 px
                $config2['height'] = 150; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2);      
    }

	public function do_insert()
	{
		$config['upload_path'] = './assetss/backend/uploads/image/buku/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 70000; //maksimum besar file 3M
        $config['max_width']  = 70000; //lebar maksimum 5000 px
        $config['max_height']  = 70000; //tinggi maksimu 5000 px
        $this->load->library('upload',$config);
         $this->upload->do_upload('produk_image');
            
                $gbr = $this->upload->data();
		$id = $this->session->userdata('id');
		$produk_nama = $_POST['produk_nama'];
		$produk_harga = $_POST['produk_harga'];
		$kategori = $_POST['kategori'];
		
		$data_insert = array(
			'produk_nama' => $produk_nama,
			'produk_harga' => $produk_harga,
			'kategori' => $kategori,
			'produk_image' =>$gbr['file_name']
			);
		$this->M_order->InsertData('tbl_produk',$data_insert);
		

		
		
                // $this->M_order->InsertData('tbl_produk',$data_insert); //akses model untuk menyimpan ke database

                $this->ubah_ukuran();   
                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
                }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                else {
                    $this->flashdata_succeed();
                }//jika berhas
	}
	public function do_delete($produk_id){
		$where = array('produk_id' => $produk_id);
		$res = $this->M_order->DeleteData('tbl_produk',$where);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}

	public function do_edit($produk_id){
		$get = $this->M_order->Getorder("where produk_id = '$produk_id'");
        $data = array(
            'produk_id' => $produk_id,
            'produk_nama' => $get[0]['produk_nama'],
            'produk_harga' => $get[0]['produk_harga'],
            'kategori' => $get[0]['kategori'],
            'produk_image' => $get[0]['produk_image'],
        );
        
        $this->load->view('backend/buku/form_edit_buku',$data);
    }
	public function do_update(){
		$image = $_FILES['produk_image']['name'];
        $produk_id = $this->input->post('produk_id');
        $get = $this->M_order->GetOrder2("where produk_id = '$produk_id'")->row();
        $produk_image = array('produk_image' => $get->produk_image);
        $where = array('produk_id' => $produk_id);
        if($image==''){
             $data = array(
                
                'produk_nama' =>$this->input->post('produk_nama'),
                'produk_harga' =>$this->input->post('produk_harga'),
                'kategori' => $this->input->post('kategori'),
                
                'produk_image' => $produk_image['produk_image']);
             
                $this->M_order->UpdateData('tbl_produk',$data,$where);
                $this->flashdata_succeed();
        
        }else{
            @unlink('./assetss/backend/uploads/image/buku/'.$get->produk_image);
            @unlink('./assetss/backend/uploads/image_resize/buku/'.$get->produk_image);
          	$this->set_upload();
	      
            if ($this->upload->do_upload('produk_image'))
            {
                $gbr = $this->upload->data();
               
                $produk_nama = $this->input->post('produk_nama');
                $produk_harga = $this->input->post('produk_harga');
                $kategori = $this->input->post('kategori');
               
                $data = array(
	                
	                'produk_nama' => $produk_nama,
	                'produk_harga' => $produk_harga,
                    'kategori' => $kategori,
	                
	                'produk_image' =>$gbr['produk_image']
                 );
                $this->M_order->UpdateData('tbl_produk',$data,$where); //akses model untuk menyimpan ke database
               $this->ubah_ukuran();

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->flashdata_succeed(); //jika berhasil maka akan ditampilkan view upload
                
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
               $this->flashdata_failed(); //jika gagal maka akan ditampilkan form upload
            }
        }
	}
	 public function set_upload(){
        
        $config['upload_path'] = './assetss/backend/uploads/image/buku/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 7000; //maksimum besar file 3M
        $config['max_width']  = 7000; //lebar maksimum 5000 px
        $config['max_height']  = 7000; //tinggi maksimu 5000 px
        $this->load->library('upload',$config);
    }     
	public function flashdata_succeed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Action Succeed !!!</div></div>");
                redirect('backend/Admin/index');
    }
    public function flashdata_failed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Action Failed !!!</div></div>");
                redirect('backend/Admin/index');
    }	
	
}
