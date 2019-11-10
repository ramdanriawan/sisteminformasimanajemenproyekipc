<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class UraianKerjaDetail extends CI_Model 
{
    public $table = "uraian_kerja_details";

    public function uraianKerja($uraianKerja)
    {
        return $this->Helper->find($this->UraianKerja->table, $uraianKerja);
    }
    
    public function jadwalRencana($uraianKerjaDetail, $mingguKe)
    {
        return $this->db->where([
            'uraian_kerja_detail_id' => $uraianKerjaDetail,
            'minggu_ke' => $mingguKe
            ])->get($this->JadwalRencana->table)->row();
    }
    
    public function realisasi($uraianKerjaDetail, $mingguKe)
    {
        return $this->db->where([
            'uraian_kerja_detail_id' => $uraianKerjaDetail,
            'minggu_ke' => $mingguKe
            ])->get($this->Realisasi->table)->row();
    }
}
