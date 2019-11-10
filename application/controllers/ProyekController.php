<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class ProyekController extends CI_Controller
{

    public function index()
    {
        $data['datas'] = $this->db->get($this->Proyek->table, 100)->result();
        
        $this->Helper->view('proyek/index', $data);
    }
    
    public function create()
    {
        //buat id baru untuk proyek baru dari id terakhir + 1
        $data['id'] = $this->db->order_by('id', 'desc')->get($this->Proyek->table)->row()->id + 1;

        $data['users'] = $this->db->where(['tipe_user =' => 'rekanan'])->get($this->User->table)->result();

        $this->Helper->view('proyek/create', $data);
    }

    public function store()
    {
        // ambil semua data tipe user dari tabel users dengan helper saya sendiri
        $user_ids = $this->Helper->pluck($this->User->table, 'id');
        
        // jadikan string dengan tanda pemisah koma
        $user_ids_in_list = implode($user_ids, ',');
        
        // validasi semua inputan proyek
        $this->form_validation->set_rules('id', 'ID Proyek', 'required|trim|greater_than[0]|integer|is_unique[proyeks.id]');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required|trim|min_length[5]|max_length[255]|is_unique[proyeks.nama_proyek]');
        $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required|max_length[21]');
        $this->form_validation->set_rules('user_id', 'Tipe User', "required|in_list[{$user_ids_in_list}]");
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|callback_tanggal_mulai');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|callback_tanggal_selesai');
        $this->form_validation->set_rules('progress', 'Progress', 'required|greater_than[-1]|less_than[101]');
        
        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['users'] = $this->db->where(['tipe_user =' => 'rekanan'])->get($this->User->table)->result();
        if ( !$this->form_validation->run() ) return $this->Helper->view('proyek/create', $data);
        
        $dataInput = $this->input->post();
        
        $dataInput['nilai_kontrak'] = $this->Helper->fromIdr($dataInput['nilai_kontrak']);

        // jika sudah tervalidasi maka simpan ke database
        $this->db->insert($this->Proyek->table, $dataInput);

        // redirect ke form inputan dan oper pesan berhasil
        $this->session->set_flashdata('success', 'Berhasil menambah data proyek');

        redirect('proyek/create');
    }

    public function edit($proyek)
    {
        $data['data'] = $this->Helper->findOrFail($this->Proyek->table, $proyek);

        $data['users'] = $this->db->where(['tipe_user =' => 'rekanan'])->get($this->User->table)->result();

        $this->Helper->view('proyek/edit', $data);
    }
    
    public function update($proyek)
    {
        // $this->Helper->dd($this->input->post());
        $data['data'] = $this->Helper->findOrFail($this->Proyek->table, $proyek);

        // ambil semua data tipe user dari tabel users dengan helper saya sendiri
        $user_ids = $this->Helper->pluck($this->User->table, 'id');
        
        // jadikan string dengan tanda pemisah koma
        $user_ids_in_list = implode($user_ids, ',');
        
        // validasi semua inputan proyek
        $this->form_validation->set_rules('id', 'ID Proyek', 'required|trim|greater_than[0]|integer');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required|trim|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required|max_length[21]');
        $this->form_validation->set_rules('user_id', 'Tipe User', "required|in_list[{$user_ids_in_list}]");
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|callback_tanggal_mulai');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|callback_tanggal_selesai');
        $this->form_validation->set_rules('progress', 'Progress', 'required|greater_than[-1]|less_than[101]');

        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['users'] = $this->db->where(['tipe_user =' => 'rekanan'])->get($this->User->table)->result();
        if ( !$this->form_validation->run() ) return $this->Helper->view('proyek/edit', $data);
        
        $dataInput = $this->input->post();
        
        $dataInput['nilai_kontrak'] = $this->Helper->fromIdr($dataInput['nilai_kontrak']);

        // jika sudah tervalidasi maka simpan ke database
        $this->db->where(['id' => $data['data']->id])->update($this->Proyek->table, $dataInput);

        // redirect ke form inputan dan oper pesan berhasil
        $this->session->set_flashdata('success', 'Berhasil mengupdate data proyek');
        redirect($this->agent->referrer());
    }

    public function destroy($proyek)
    {
        $proyek = $this->Helper->findOrFail($this->Proyek->table, $proyek);

        $this->db->delete($this->Proyek->table, ['id' => $proyek->id]);
        
        $this->session->set_flashdata(['success' => 'Berhasil menghapus data proyek']);

        redirect('proyek');
    }
    
    public function search()
    {
        if( empty($this->input->post('nama_proyek')) ) 
        {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('proyek');
        }

        $data['datas'] = $this->db->like('nama_proyek', $this->input->post('nama_proyek'))->get($this->Proyek->table)->result();

        return $this->Helper->view('proyek/index', $data);
    }

    public function tanggal_mulai($input)
    {
        if ( strtotime($input) > strtotime($this->input->post('tanggal_selesai')) )
        {
            $this->form_validation->set_message('tanggal_mulai', 'Tanggal mulai tidak lebih besar dari tanggal selesai');

            return FALSE;
        }

        return TRUE;
    }

    public function tanggal_selesai($input)
    {
        if ( strtotime($input) < strtotime($this->input->post('tanggal_mulai')) )
        {
            $this->form_validation->set_message('tanggal_selesai', 'Tanggal selesai tidak lebih kecil dari tanggal mulai');

            return FALSE;
        }

        return TRUE;
    }
    
    public function deleteall()
    {
        // decode dulu supaya bisa diconvert jadi array
        $deleteAllInput = json_decode($this->input->post('deleteAllInput'));
// $this->Helper->dd($deleteAllInput);
        // cek jika kosong kirimkan pesan error
        if (! count($deleteAllInput) ) { $this->session->set_flashdata('error', "Tidak ada proyek yang dihapus!"); redirect('proyek'); }

        // delete semua proyek yang id nya ada didalama array
        $this->db->where_in("id", $deleteAllInput)->delete($this->Proyek->table);

        $this->session->set_flashdata('success', "Berhasil menghapus massal proyek.");

        redirect('proyek');
    }
}                           