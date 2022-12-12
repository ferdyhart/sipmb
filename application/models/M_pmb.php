<?php
class M_pmb extends CI_Model {
    public function listpendaftar(){
        return $this->db->get('pendaftar')->result_array();

    }

    public function listprodi(){
        return $this->db->get('prodi')-result_array();
    }
}
?>