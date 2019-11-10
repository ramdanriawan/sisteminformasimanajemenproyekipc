<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Proyek extends CI_Model 
{
    public $table = "proyeks";

    public function user($user)
    {
        return $this->Helper->find($this->User->table, $user);
    }
    
}
