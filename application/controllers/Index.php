<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pmb', 'm_pmb');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->render('index/index', $data);
    }

    public function pendaftarprodi1()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 1';
        $prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik pertama
        $result = null;
        foreach ($prodi as $p => $prod) {
            // if ($prod['jumlah'] > $sum) {
            //     $sum = $prod['jumlah'];
            //     $sliced = true;
            //     $selected = true;
            // }
            $result[$p] = [
                "name"  => $prod['nama_prodi'],
                "jumlah" => $prod['jumlah'],
                "y"     => $prod['size'],
                // "sliced" => $sliced,
                // 'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik1'] = json_encode($result);
        $this->render('index/grafik_satu', $data);
    }

    public function pendaftarprodi2()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 2';
        $prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik kedua
        $hasil = null;
        foreach ($prodi as $p => $prod) {
            $hasil[$p] = [
                "name"  => $prod['nama_prodi'],
                "jumlah" => $prod['jumlah2'],
                "y"     => $prod['size'],
                // "sliced" => $sliced,
                // 'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik2'] = json_encode($hasil);
        $this->render('index/grafik_dua', $data);
    }
	public function pendaftarmandiripres()
	{
		$data['title'] = 'Grafik Berdasarkan Jalur Mandiri Prestasi';
		$pendaftar = $this->m_pmb->jumlahpendaftarmandiripres();
		$grafik = null;
		$sumTotal = 0;
		foreach ($pendaftar as $key => $value) {
			$sumTotal += $value['jumlah'];
			$grafik[$key] = [
				'name' => $value['jenis_dokumen'],
				'jumlah' => intval($value['jumlah']),
				'y'		=> intval($value['jumlah']),
			];
		}

		$data['subtitle'] = 'Jumlah Pendaftar : ' . $sumTotal;
		$data['grafikpres'] = json_encode($grafik);
		$this->render('index/grafik_mandiripres', $data);
	}
	public function pendaftarjalur()
	{
		$data['title'] = 'Grafik Pendaftar Berdasarkan Jalur Masuk';
		$pendaftar = $this->m_pmb->jumlahpendaftarjalur();
		$grafik = null;
		$sumTotal = 0;
		foreach ($pendaftar as $key => $value) {
			$sumTotal += $value['jumlah'];
			$grafik[$key] = [
				'name' => $value['nama_jalur'],
				'jumlah' => intval($value['jumlah']),
				'y'		=> intval($value['jumlah']),
			];

		}
		$data['subtitle'] = 'Jumlah Pendaftar : ' . $sumTotal;
		$data['grafikjalur'] = json_encode($grafik);
		$this->render('index/grafik_jalur', $data);
	}
	public function pendapatanbank()
	{
		$data['title'] = 'Grafik Pendapatan Berdasarkan Bank';
		$pendaftar = $this->m_pmb->jumlahpendapatanbank();
		$grafik = null;
		$sumTotal = 64650000;
		foreach ($pendaftar as $key => $value) {
			$sumTotal += $value['jumlah'];
			$grafik[$key] = [
				'name' => $value['nama_bank'],
				'jumlah' => intval($value['jumlah']),
				'y'		=> intval($value['jumlah']),
			];


		}
		$data['subtitle'] = 'Total Pendapatan Jalur Masuk : ' . $sumTotal;
		$data['grafikpendapatan'] = json_encode($grafik);
		$this->render('index/grafik_pendapatan', $data);
	}

	// public function pendaftarbank()
    // {
    //     $data['title'] = 'Grafik Berdasarkan ';
    //     $prodi = $this->m_pmb->listbank();
    //     foreach ($prodi as $key => $p) {
    //         $prodi[$key]['jumlah'] = $this->m_pmb->jumlahtotalpendaftar($p['id_bank']);
    //         $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahtotalpendaftar1($p['id_bank']);
    //         $prodi[$key]['size'] = rand(10, 30);
    //     }

    //     //grafik pertama
    //     $result = null;
    //     foreach ($prodi as $p => $prod) {
    //         // if ($prod['jumlah'] > $sum) {
    //         //     $sum = $prod['jumlah'];
    //         //     $sliced = true;
    //         //     $selected = true;
    //         // }
    //         $result[$p] = [
    //             "name"  => $prod['nama_bank'],
    //             "jumlah" => $prod['jumlah'],
    //             "y"     => $prod['size'],
    //             // "sliced" => $sliced,
    //             // 'selected' => $selected
    //         ];
    //     }
	// 	$hasil = null;
    //     foreach ($prodi as $p => $prod) {
    //         // if ($prod['jumlah'] > $sum) {
    //         //     $sum = $prod['jumlah'];
    //         //     $sliced = true;
    //         //     $selected = true;
    //         // }
    //         $hasil[$p] = [
    //             "name"  => $prod['nama_bank'],
    //             "jumlah" => $prod['jumlah2'],
    //             "y"     => $prod['size'],
    //             // "sliced" => $sliced,
    //             // 'selected' => $selected
    //         ];
    //     }


    //     $data['pendaftar'] = $prodi;
    //     $data['grafik1'] = json_encode($result);
    //     $data['grafik2'] = json_encode($hasil);
    //     $this->render('index/grafik_perbandingan', $data);

	// }
	 public function pendaftarbank()
	{
		
		$data['title'] = 'Grafik Perbandingan Pembayaran Pendaftar';
		$pendaftar = $this->m_pmb->jumlahtotalpendaftar();
		$pendaftar2 = $this->m_pmb->jumlahtotalpendaftar1();
		$grafik = null;
		$sumTotal = 0;
		foreach ($pendaftar as $key => $value) {
			$sumTotal += $value['jumlah'];
			$grafik[$key] = [
				'name' => $value['nama_bank'],
				'jumlah' => intval($value['jumlah']),
				'y'		=> intval($value['jumlah']),
			];

		}
		$grafi = null;
		$sumTotal = 0;
		foreach ($pendaftar2 as $key => $value) {
			$sumTotal += $value['jumlah'];
			$grafi[$key] = [
				'name' => $value['nama_bank'],
				'jumlah' => intval($value['jumlah']),
				'y'		=> intval($value['jumlah']),
			];
		}	
		$data['subtitle'] = 'Total Pendapatan Jalur Masuk : ' . $sumTotal;
		$data['grafik1'] = json_encode($grafik);
		$data['grafik2'] = json_encode($grafi);
		$this->render('index/grafik_perbandingan', $data);
	}
	// // public function pendaftarbank1()
	// {
		
	// 	$data['title'] = 'Grafik Pendaftar yang Belum Lunas';
	// 	$pendaftar = $this->m_pmb->jumlahtotalpendaftar1();
	// 	$grafi = null;
	// 	$sumTotal = 0;
	// 	foreach ($pendaftar as $key => $value) {
	// 		$sumTotal += $value['jumlah'];
	// 		$grafi[$key] = [
	// 			'name' => $value['nama_bank'],
	// 			'jumlah' => intval($value['jumlah']),
	// 			'y'		=> intval($value['jumlah']),
	// 		];

	// 	}
	// 	$data['subtitle'] = 'Total Pendapatan Jalur Masuk : ' . $sumTotal;
	// 	$data['grafikperbandingan1'] = json_encode($grafi);
	// 	$this->render('index/grafik_perbandingan', $data);
	// }
}
