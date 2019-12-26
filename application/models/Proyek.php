<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Proyek extends CI_Model 
{
    public $table = "proyeks";

    public function user($user)
    {
        return $this->Helper->find($this->User->table, $user);
    }

    public function uraianKerjas($proyek_id)
    {
        return $this->db->where(['proyek_id' => $proyek_id])->get($this->UraianKerja->table)->result();
    }
    
}
