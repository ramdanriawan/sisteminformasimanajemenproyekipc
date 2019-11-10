<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class TestController extends CI_Controller 
{
    public function index()
    {
        $this->load->view('test');
    }

    public function testform()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->run() OR $this->load->view('test');
        
        $this->session->set_flashdata('success', 'Berhasil menambah data test');
    }
}