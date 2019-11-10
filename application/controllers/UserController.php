<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class UserController extends CI_Controller
{
    
    public function index()
    {
        //tampilkan data sesuai hak akses, jika admin tampilkan semua, jika tidak tampilkan tertentu saja
        if ( $this->session->userdata('user')->tipe_user == "admin" )
        {
            $data['datas'] = $this->db->get($this->User->table, 100)->result();
        }else
        {
            $data['datas'] = $this->db->where(['tipe_user !=' => 'admin'])->get($this->User->table, 100)->result();
        }

        $this->Helper->view('user/index', $data);
    }
    
    public function create()
    {
        //buat id baru untuk user baru dari id terakhir + 1
        $data['id'] = $this->db->order_by('id', 'desc')->get($this->User->table)->row()->id + 1;
        
        $this->Helper->view('user/create', $data);
    }

    public function store()
    {
        // validasi semua inputan users
        $this->form_validation->set_rules('id', 'ID USER', 'required|trim|greater_than[0]|less_than[99]|integer|is_unique[users.id]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[30]|alpha_numeric|is_unique[users.username]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('password_confirmation', 'Konfirmasi Password', 'required|min_length[5]|max_length[30]|matches[password]');
        $this->form_validation->set_rules('tipe_user', 'Tipe User', 'required|in_list[manager,rekanan]');

        if ( !$this->form_validation->run() ) return $this->Helper->view('user/create');
        
        $dataInput = $this->input->post();
        
        unset($dataInput['password_confirmation']);
        
        $dataInput['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $this->db->insert($this->User->table, $dataInput);

        $this->session->set_flashdata('success', 'Berhasil menambah data user');

        redirect('user/create');
    }

    public function edit($user)
    {
        $data['user'] = $this->Helper->findOrFail($this->User->table, $user);

        // handle user jika berusaha mengedit admin melalui id yang dirubah di url
        if ( $this->session->userdata('user')->tipe_user != "admin" && $data['user']->tipe_user == "admin" ) show_404();

        $this->Helper->view('user/edit', $data);
    }
    
    public function update($user)
    {
        $data['user'] = $this->Helper->findOrFail($this->User->table, $user);

        // handle user jika berusaha mengedit admin melalui id yang dirubah di url melalui post
        if ( $this->session->userdata('user')->tipe_user != "admin" && $data['user']->tipe_user == "admin" )  show_404();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password_confirmation', 'Konfirmasi Password', 'required|min_length[5]|max_length[30]|matches[password]');
        $this->form_validation->set_rules('tipe_user', 'Tipe User', 'required|in_list[manager,rekanan]');
        
        if ( !$this->form_validation->run() ) return $this->Helper->view('user/edit', $data);

        $dataInput = $this->input->post();

        unset($dataInput['password_confirmation']);

        $dataInput['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $this->db->where('id', $data['user']->id)->update($this->User->table, $dataInput);
        
        $this->session->set_flashdata(['success' => 'Berhasil mengupdate data user']);

        redirect($this->agent->referrer());
    }

    public function destroy($user)
    {
        $user = $this->Helper->findOrFail($this->User->table, $user);

        $this->db->delete($this->User->table, ['id' => $user->id]);

        $this->session->set_flashdata(['success' => 'Berhasil menghapus data user']);

        redirect('user');
    }

    public function search()
    {
        if( empty($this->input->post('username')) ) 
        {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('user');
        }

        //tampilkan data sesuai hak akses, jika admin tampilkan semua, jika tidak tampilkan tertentu saja
        if ( $this->session->userdata('user')->tipe_user == "admin" )
        {
            $data['datas'] = $this->db->like('username', $this->input->post('username'))->get($this->User->table)->result();
        }else 
        {
            $data['datas'] = $this->db->not_like(['tipe_user' => 'admin'])->like('username', $this->input->post('username'))->get($this->User->table)->result();
        }

        return $this->Helper->view('user/index', $data);
    }

    public function deleteall()
    {
        // decode dulu supaya bisa diconvert jadi array
        $deleteAllInput = json_decode($this->input->post('deleteAllInput'));

        // cek jika kosong kirimkan pesan error
        if (! count($deleteAllInput) ) { $this->session->set_flashdata('error', "Tidak ada user yang dihapus!"); redirect('user'); }

        // delete semua user yang id nya ada didalama array
        $this->db->where_in("id", $deleteAllInput)->delete($this->User->table);

        $this->session->set_flashdata('success', "Berhasil menghapus massal user.");

        redirect('user');
    }
}