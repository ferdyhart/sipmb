<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pmb', 'm_pmb');
	}
	public function index()
	{
		$this->load->view('index/index');
	}
	public function pendaftar()
	{
		// $pendaftar = $this->m_pmb->listpendaftar();
		// var_dump($pendaftar);

		$prodi = $this->m_pmb->listprodi();
		
		foreach ($prodi as $key => $p) {
			$prodi[$key]['jumlah'] = $this->m_pmb->jumlahpendaftarprodi1($p['id_prodi']);
			$prodi[$key]['jumlah2'] = $this->m_pmb->jumlahpendaftarprodi2($p['id_prodi']);
			$prodi[$key]['size'] = rand(10, 30); 
		
		}

		//grafik 1
		$result = null;
		foreach ($prodi as $p => $prod) {
			
			$result[$p] = [
				"name" => $prod['nama_prodi'],
				"jumlah"=> $prod['jumlah'],
				"y" 	=> $prod['size']
			];
		}
		//grafik 2
		$hasil = null;
		foreach ($prodi as $p => $prod) {
			
			$hasil[$p] = [
				"name" => $prod['nama_prodi'],
				"jumlah"=> $prod['jumlah2'],
				"y" 	=> $prod['size']
			];
		}
		
		$data['pendaftar'] = $prodi;
		$data['grafik1'] = json_encode($result);
		$data['grafik2'] = json_encode($hasil);
		$this->load->view('index/pendaftar', $data);

		
		
		
	}
}
