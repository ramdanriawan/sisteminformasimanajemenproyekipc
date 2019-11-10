<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Realisasi extends CI_Model 
{
    public $table = 'realisasis';
                        
    public function uraianKerjaDetail($uraianKerjaDetail)
    {
        return $this->db->where(['uraian_kerja_detail_id' => $uraianKerjaDetail])->get($this->UraianKerjaDetail->table)->row();
    }         
}