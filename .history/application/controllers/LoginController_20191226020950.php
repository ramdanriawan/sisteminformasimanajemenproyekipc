<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class LoginController extends CI_Controller {

    public function index()
    {dd("okee");
        $this->load->view('login/index');
    }       
}
        
    /* End of file  LoginController.php */
        
                            