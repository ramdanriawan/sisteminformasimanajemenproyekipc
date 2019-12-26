<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');

class AwalController extends CI_Controller 
{
    public function index()
    {
        $data['datas'] = $this->db->get($this->Proyek->table, 100)->result();

        // untuk menambahkan data progress sesuai totalny di table realisasi
        foreach($data['datas'] as $key => $val)
        {
            $data['datas'][$key]->progress = $this->db->where_in('uraian_kerja_detail_id', $this->Helper->pluckWhereIn($this->UraianKerjaDetail->table, 'id', 'uraian_kerja_id', $this->Helper->pluckWhere($this->UraianKerja->table, 'id', ['proyek_id' => $val->id])))->select_sum('bobot')->get($this->Realisasi->table)->row()->bobot ?? 0;
        }

        $this->Helper->view('awal/index', $data);
    }
    
        
}