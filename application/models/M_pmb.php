<?php
class M_pmb extends CI_Model
{
    public function listPendaftar()
    {
        return $this->db->get('pendaftar')->result_array();
    }

    public function listProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function jumlahPendaftarProdi1($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi_1', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function jumlahPendaftarProdi2($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi_2', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }
    public function jumlahpendaftarmandiripres()
    {
        return $this->db->query('SELECT count(i.id_jalur) as jumlah, 
        n.nama_jalur, 
        d.jenis_dokumen from pendaftar i join jalur_daftar n on i.id_jalur = n.id_jalur
        join dokumen_mandiri d  on i.id_dokumen = d.id_dokumen
        where i.id_jalur > 1 group by d.jenis_dokumen  ')->result_array();
    }
    public function jumlahpendaftarjalur()
    {
        return $this->db->query('SELECT count(p.id_jalur) as jumlah, o.nama_jalur 
        from pendaftar p join jalur_daftar o on p.id_jalur = o.id_jalur 
        group by o.nama_jalur, o.jenis_jalur ')->result_array();
    }
    public function jumlahpendapatanbank()
    {
        return $this->db->query('SELECT sum(b.nominal_bayar) as jumlah, p.nama_bank from pendaftar b 
        join bank p on b.id_bank = p.id_bank 
        where p.id_bank < 5
        group by p.nama_bank')->result_array();
    }
    public function jumlahtotalpendaftar()
    {
        return $this->db->query('SELECT count(p.id_pendaftar) as jumlah, p.status_bayar, b.nama_bank from pendaftar p join bank b on p.id_bank = b.id_bank 
                where p.status_bayar = "Lunas" and b.nama_bank != "SNMPTN"
                group by b.nama_bank, p.status_bayar')->result_array();
    }
    public function jumlahtotalpendaftar1()
    {
        return $this->db->query('SELECT count(p.id_pendaftar) as jumlah, p.status_bayar, b.nama_bank from pendaftar p join bank b on p.id_bank = b.id_bank 
                where p.status_bayar = "Belum Lunas" and b.nama_bank != "SNMPTN"
                group by b.nama_bank, p.status_bayar ')->result_array();
    }
    public function listbank()
    {
        $data = $this->db->get('bank')->result_array();
        return $data;
    }
}
