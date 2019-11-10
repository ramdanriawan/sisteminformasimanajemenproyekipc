<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User extends CI_Model 
{
    public $table = 'users';

    // public function tipeUser($tipeUser)
    // {
    //     return $this->db->select('*')->from($this->TipeUser->table)->join($this->table, "{$this->table}.tipe_user_id = $tipeUser")->get()->result()[0];
    // }

}