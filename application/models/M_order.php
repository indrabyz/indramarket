<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

	public function GetOrder($where="")
	{

		$data = $this->db->query('select * from tbl_produk '.$where);
		return $data->result_array();
	}
	public function GetOrder2($where="")
	{

		$data = $this->db->query('select * from tbl_produk '.$where);
		return $data;
	}
	public function GetData($tableName,$where="")
	{
		$data = $this->db->query('select * from '.$tableName.$where);
		return $data->result_array();
	}
	public function showdata($table){
		
	    $this->db->order_by('produk_id', 'desc');
		$data = $this->db->get($table);
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}
	
	public function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	

	public function DeleteData($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
	
	public function UpdateData($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}
	public function cariOrang()
	{
		$cari = $this->input->GET('produk_nama', TRUE);
		$data = $this->db->query("SELECT * from tbl_produk where produk_nama like '%$produk_nama%' ");
		return $data->result();
	}
	
}
