<?php
class M_pmb extends CI_Model {
    public function listpendaftar(){
        return $this->db->get('pendaftar')->result_array();

    }

    public function listprodi(){
        return $this->db->get('prodi')->result_array();
    }
    public function jumlahpendaftar($idprodi){
        $result = 0;
        $this->db->where('id_prodi_1', $idprodi);
        $data = $this->db->get('pendaftar')->result_array();
        if(!empty($data)){
            $result = count($data);
        }
        return $result;
    }
}
?>