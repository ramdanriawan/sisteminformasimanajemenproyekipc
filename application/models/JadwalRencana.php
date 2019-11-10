<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class JadwalRencana extends CI_Model 
{
    public $table = 'jadwal_rencanas';
                        
    public function uraianKerjaDetail($uraianKerjaDetail)
    {
        return $this->db->where(['uraian_kerja_detail_id' => $uraianKerjaDetail])->get($this->UraianKerjaDetail->table)->row();
    }         
}