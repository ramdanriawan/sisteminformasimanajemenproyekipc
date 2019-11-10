<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class UraianKerja extends CI_Model 
{
    public $table = "uraian_kerjas";

    public function proyek($proyek)
    {
        return $this->Helper->find($this->Proyek->table, $proyek);
    }
    
    public function uraianKerjaDetails($uraianKerja)
    {
        return $this->db->where(['uraian_kerja_id' => $uraianKerja])->get($this->UraianKerjaDetail->table)->result();
    }



}