<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');

class AwalController extends CI_Controller 
{
    public function index()
    {
        $data['datas'] = $this->db->get($this->Proyek->table, 100)->result();
        
        $this->Helper->view('awal/index', $data);
    }
    
        
}