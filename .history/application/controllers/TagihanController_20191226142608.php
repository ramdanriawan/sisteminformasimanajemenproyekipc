<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TagihanController extends CI_Controller
{
    public function index()
    {
        $data['datas'] = $this->db->get($this->Tagihan->table, 100)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();

        // supaya gak error waktu nambah data tapi gak milih proyek mana
        $data['proyek_id'] = '';

        $this->Helper->view('tagihan/index', $data);
    }

    public function create($proyek = null) // parameter null supaya gak error waktu gak ada parameter
    {
        // cek jika user ingin menambah uraian kerja berdasarkan proyek
        $data['proyek_id'] = '';

        if ($proyek) {
            // cek jika id yang dicari tidak ada maka tampilkan error
            $proyek = $this->Helper->findOrFail($this->Proyek->table, $this->uri->segment(3));

            $data['proyek_id'] = $this->uri->segment(3);
        }

        // buat id baru untuk uraian kerja baru dari id terakhir + 1
        $data['id'] = $this->db->order_by('id', 'desc')->get($this->Tagihan->table)->row()->id + 1;
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();

        $this->Helper->view('tagihan', $data);
    }

    public function store()
    {
        // $this->Helper->dd($this->input->post());
        // validasi semua inputan proyek
        $this->form_validation->set_rules('proyek_id', 'ID Proyek', 'required|trim|greater_than[0]|integer');
        $this->form_validation->set_rules('id', 'ID Tagihan', 'required|trim|greater_than[0]|integer|is_unique[tagihans.id]');
        $this->form_validation->set_rules('nama_tagihan', 'Nama Proyek', 'required|trim|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('tanggal', 'Tanggal Tagihan', 'required');
        $this->form_validation->set_rules('presentase', 'Presentase', 'required|greater_than[0]|less_than[101]');
        $this->form_validation->set_rules('nilai_tagihan', 'Nilai Tagihan', 'required');
        $this->form_validation->set_rules('note', 'Note', 'required|max_length[255]');

        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();
        $data['id'] = $this->input->post('id');
        if (!$this->form_validation->run()) {
            return $this->Helper->view('tagihan/create', $data);
        }

        // jika sudah tervalidasi maka simpan ke database
        $this->session->set_flashdata('success', 'Berhasil menyimpan data tagihan');
        $dataInput = $this->input->post();
        $dataInput['nilai_tagihan'] = $this->Helper->fromIdr($this->input->post('nilai_tagihan'));

        $this->db->insert($this->Tagihan->table, $dataInput);

        redirect('tagihan');
    }

    public function edit($uraian_kerja)
    {
        $data['data'] = $this->Helper->findOrFail($this->Tagihan->table, $uraian_kerja);

        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();

        $this->Helper->view('tagihan/edit', $data);
    }

    public function update()
    {
        // $this->Helper->dd($this->input->post());
        // validasi semua inputan proyek
        $this->form_validation->set_rules('proyek_id', 'ID Proyek', 'required|trim|greater_than[0]|integer');
        $this->form_validation->set_rules('id', 'ID Tagihan', 'required|trim|greater_than[0]|integer');
        $this->form_validation->set_rules('nama_tagihan', 'Nama Proyek', 'required|trim|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('tanggal', 'Tanggal Tagihan', 'required');
        $this->form_validation->set_rules('presentase', 'Presentase', 'required|greater_than[0]|less_than[101]');
        $this->form_validation->set_rules('nilai_tagihan', 'Nilai Tagihan', 'required');
        $this->form_validation->set_rules('note', 'Note', 'required|max_length[255]');

        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();
        $data['id'] = $this->input->post('id');
        if (!$this->form_validation->run()) {
            return $this->Helper->view("tagihan/{$this->input->post('id')}/edit", $data);
        }

        // jika sudah tervalidasi maka simpan ke database
        $this->session->set_flashdata('success', 'Berhasil mengupdate data tagihan');
        $dataInput = $this->input->post();
        $dataInput['nilai_tagihan'] = $this->Helper->fromIdr($this->input->post('nilai_tagihan'));

        $this->db->where(['id' => $this->input->post('id')])->update($this->Tagihan->table, $dataInput);

        // redirect("tagihan/{$this->input->post('id')}/edit");
        redirect('tagihan');
    }

    public function destroy($tagihan)
    {
        $tagihan = $this->Helper->findOrFail($this->Tagihan->table, $tagihan);

        $this->db->delete($this->Tagihan->table, ['id' => $tagihan->id]);

        $this->session->set_flashdata(['success' => 'Berhasil menghapus data tagihan']);

        redirect('tagihan');
    }

    public function search()
    {
        if (empty($this->input->post('nama_tagihan'))) {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('tagihan');
        }

        $data['datas'] = $this->db->like('nama_tagihan', $this->input->post('nama_tagihan'))->get($this->Tagihan->table)->result();

        return $this->Helper->view('tagihan/index', $data);
    }

    // fungsi ini mirip dengan uraian kerja jadi untuk mempercepat saya tidak mengubah nama postnya jadi saya tinggal ganti nama tablenya aja
    public function deleteall()
    {
        // $this->Helper->dd($this->input->post());
        // decode dulu supaya bisa diconvert jadi array
        $deleteAllInput = json_decode($this->input->post('deleteAllInput'), true);

        // cek jika kosong kirimkan pesan error
        if (!count($deleteAllInput['tdSelectedUraianKerja']) && count($deleteAllInput['tdSelectedUraianKerjaDetails'])) {
            $this->session->set_flashdata('error', 'Tidak ada uraian kerja yang dihapus!');
            redirect('uraian_kerja');
        }

        // delete semua uraian kerja yang id nya ada didalama array
        $this->db->where_in('id', $deleteAllInput['tdSelectedUraianKerja'])->delete($this->Tagihan->table);

        $this->session->set_flashdata('success', 'Berhasil menghapus massal tagihan.');

        redirect('tagihan');
    }

    public function cariProyek()
    {
        $proyek = $this->db->like(['id' => $this->input->post('q')])->or_like(['nama_proyek' => $this->input->post('q')])->get($this->Proyek->table)->result();

        $this->session->set_userdata('q', $this->input->post('q'));

        echo json_encode($proyek);
    }

    public function tampilkanBerdasarkanProyek()
    {
        $data['datas'] = $this->db->where(['proyek_id' => $this->input->post('proyek_id')])->get($this->Tagihan->table)->result();
        $data['proyek_id'] = $proyek;

        $data['q'] = $this->session->userdata('q');

        $this->Helper->view('tagihan/index', $data);
    }

    public function printExcel($tagihan)
    {
        $data['data'] = $this->db->where(['id' => $tagihan])->get($this->Tagihan->table)->row();
        $data['proyek'] = $this->Helper->findOrFail($this->Proyek->table, $data['data']->proyek_id);

        $this->load->view('tagihan/print_excel', $data);
    }

    public function printPdf($tagihan)
    {
        $data['data'] = $this->db->where(['id' => $tagihan])->get($this->Tagihan->table)->row();
        $data['proyek'] = $this->Helper->findOrFail($this->Proyek->table, $data['data']->proyek_id);

        $this->load->view('tagihan/print_pdf', $data);
    }
}
