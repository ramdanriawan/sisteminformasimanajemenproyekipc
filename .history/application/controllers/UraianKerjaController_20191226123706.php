<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UraianKerjaController extends CI_Controller
{
    public function index()
    {
        $data['datas'] = $this->db->get($this->UraianKerja->table, 100)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();
        // $this->Helper->dd($data['proyeks']);
        // supaya gak error waktu nambah data tapi gak milih proyek mana
        $data['proyek_id'] = '';

        $this->Helper->view('uraian_kerja/index', $data);
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
        $data['id'] = $this->db->order_by('id', 'desc')->get($this->UraianKerja->table)->row()->id + 1;
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();

        $this->Helper->view('uraian_kerja/create', $data);
    }

    public function store()
    {
        $data['id'] = $this->input->post('id');
        // $this->Helper->dd($this->input->post());
        // ambil semua data proyek dari tabel proyek dengan helper saya sendiri
        $proyek_ids = $this->Helper->pluck($this->Proyek->table, 'id');

        // jadikan string dengan tanda pemisah koma
        $proyek_ids_in_list = implode($proyek_ids, ',');

        // validasi semua inputan proyek
        $this->form_validation->set_rules('proyek_id', 'Nama Proyek', "required|in_list[{$proyek_ids_in_list}]");
        $this->form_validation->set_rules('id', 'ID Uraian Kerja', 'required|trim|greater_than[0]|integer|is_unique[uraian_kerjas.id]');
        $this->form_validation->set_rules('judul_uraian_kerja', 'Judul Uraian Kerja', 'required|max_length[255]');

        // validasi setiap uraian kerja details
        $indexMulai = 1; // karena codeigniter masih membaca semua inputan termasuk yang tidak terisi dari hidden input maka kita harus start dari index ke 1 (dari uraian kerja details 1)
        $bobotKontrak = 0; // untuk mengantisipasi bobot kontrak yang lebih dari 100%
        $indexMulaiCekBobotKontrak = 0;
        for ($i = 0; $i < (int) $this->input->post('jumlah_list_uraian_kerja'); ++$i) {
            $this->form_validation->set_rules("uraian_kerja[{$indexMulai}]", "Uraian Kerja ke: {$indexMulai}", 'required|max_length[255]');
            $this->form_validation->set_rules("satuan[{$indexMulai}]", "Satuan ke: {$indexMulai}", 'required');
            $this->form_validation->set_rules("volume[{$indexMulai}]", "Volume ke: {$indexMulai}", 'required|max_length[10]');
            $this->form_validation->set_rules("bobot_kontrak[{$indexMulai}]", "Bobot Kontrak ke: {$indexMulai}", 'required|max_length[3]');

            ++$indexMulai;
            ++$indexMulaiCekBobotKontrak;
            $bobotKontrak += (int) $this->input->post("bobot_kontrak[{$indexMulaiCekBobotKontrak}]");
        }

        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();
        if (!$this->form_validation->run()) {
            return $this->Helper->view('uraian_kerja/create', $data);
        }

        // cek jika bobot kontrak melebihi 100% maka tampilkan pesan error
        if ($bobotKontrak > 100) {
            $this->session->set_flashdata('error', 'Data total bobot kontrak melebihi 100%!');

            return $this->Helper->view('uraian_kerja/create', $data);
        }

        $dataInput = $this->input->post();

        // unset dulu data yang tidak diperlukan dari hidden input
        unset($dataInput['jumlah_list_uraian_kerja']);
        unset($dataInput['uraian_kerja'][0]);
        unset($dataInput['satuan'][0]);
        unset($dataInput['volume'][0]);
        unset($dataInput['bobot_kontrak'][0]);

        // jika sudah tervalidasi maka simpan ke database untuk tabel uraian kerja
        $this->db->insert($this->UraianKerja->table, [
            'proyek_id' => $dataInput['proyek_id'],
            'id' => $dataInput['id'],
            'judul_uraian_kerja' => $dataInput['judul_uraian_kerja'],
        ]);

        // setelah tersimpan ke database untuk tabel uraian kerja maka unset supaya mudah menyimpan detail dari uaraian kerjanya
        unset($dataInput['proyek_id']);
        unset($dataInput['id']);
        unset($dataInput['judul_uraian_kerja']);

        // reset ulang element array yang tidak beraturan untuk uraian kerja details
        for ($i = 1; $i <= (int) $this->input->post('jumlah_list_uraian_kerja'); ++$i) {
            $dataInputUraianKerjaDetail[$i]['uraian_kerja_id'] = $this->input->post('id');
            $dataInputUraianKerjaDetail[$i]['uraian_kerja'] = $dataInput['uraian_kerja'][$i];
            $dataInputUraianKerjaDetail[$i]['satuan'] = $dataInput['satuan'][$i];
            $dataInputUraianKerjaDetail[$i]['volume'] = $dataInput['volume'][$i];
            $dataInputUraianKerjaDetail[$i]['bobot_kontrak'] = $dataInput['bobot_kontrak'][$i];
        }

        // jika sudah tervalidasi maka simpan ke database untuk tabel uraian kerja details
        $this->db->insert_batch($this->UraianKerjaDetail->table, $dataInputUraianKerjaDetail);

        // redirect ke form inputan dan oper pesan berhasil
        $this->session->set_flashdata('success', 'Berhasil menambah data uraian kerja');

        redirect('uraian_kerja');
    }

    public function edit($uraian_kerja)
    {
        $data['data'] = $this->Helper->findOrFail($this->UraianKerja->table, $uraian_kerja);

        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();

        $this->Helper->view('uraian_kerja/edit', $data);
    }

    public function update($uraian_kerja)
    {
        // $this->Helper->dd($this->input->post());
        // $this->Helper->dd($uraian_kerja);
        // ambil semua data proyek dari tabel proyek dengan helper saya sendiri
        $proyek_ids = $this->Helper->pluck($this->Proyek->table, 'id');

        // jadikan string dengan tanda pemisah koma
        $proyek_ids_in_list = implode($proyek_ids, ',');

        // validasi semua inputan proyek (id_uraian_kerja == id di tabel uraian kerja sengaja dibedakan dengan create supaya bisa kedetect saat validasi)
        $this->form_validation->set_rules('proyek_id', 'Nama Proyek', "required|in_list[{$proyek_ids_in_list}]");
        $this->form_validation->set_rules('id_uraian_kerja', 'ID Uraian Kerja', 'required|trim|greater_than[0]|integer');
        $this->form_validation->set_rules('judul_uraian_kerja', 'Judul Uraian Kerja', 'required|max_length[255]');

        // validasi setiap uraian kerja details
        $indexMulai = 1; // karena codeigniter masih membaca semua inputan termasuk yang tidak terisi dari hidden input maka kita harus start dari index ke 1 (dari uraian kerja details 1)
        $bobotKontrak = 0; // untuk mengantisipasi bobot kontrak yang lebih dari 100%
        $indexMulaiCekBobotKontrak = 0;
        for ($i = 0; $i < (int) $this->input->post('jumlah_list_uraian_kerja'); ++$i) {
            $this->form_validation->set_rules("uraian_kerja[{$indexMulai}]", "Uraian Kerja ke: {$indexMulai}", 'required|max_length[255]');
            $this->form_validation->set_rules("satuan[{$indexMulai}]", "Satuan ke: {$indexMulai}", 'required');
            $this->form_validation->set_rules("volume[{$indexMulai}]", "Volume ke: {$indexMulai}", 'required|max_length[4]');
            $this->form_validation->set_rules("bobot_kontrak[{$indexMulai}]", "Bobot Kontrak ke: {$indexMulai}", 'required|max_length[3]');

            ++$indexMulai;
            ++$indexMulaiCekBobotKontrak;
            $bobotKontrak += (int) $this->input->post("bobot_kontrak[{$indexMulaiCekBobotKontrak}]");
        }

        // jika gagal kembalikan user untuk mengisi ulang inputan
        $data['proyeks'] = $this->db->get($this->Proyek->table)->result();
        $data['data'] = $this->Helper->findOrFail($this->UraianKerja->table, $uraian_kerja);
        $data['id_uraian_kerja'] = $data['data']->id;
        if (!$this->form_validation->run()) {
            return $this->Helper->view('uraian_kerja/edit', $data);
        }

        // cek jika bobot kontrak melebihi 100% maka tampilkan pesan error
        if ($bobotKontrak > 100) {
            $this->session->set_flashdata('error', 'Data total bobot kontrak melebihi 100%!');

            return $this->Helper->view('uraian_kerja/edit', $data);
        }

        // jika berhasil divalidasi siapkan datanya untuk diinput ulang lagi
        $dataInput = $this->input->post();

        // unset dulu data yang tidak diperlukan dari hidden input
        unset($dataInput['jumlah_list_uraian_kerja']);
        unset($dataInput['uraian_kerja'][0]);
        unset($dataInput['satuan'][0]);
        unset($dataInput['volume'][0]);
        unset($dataInput['bobot_kontrak'][0]);

        // jika sudah tervalidasi maka simpan ke database untuk tabel uraian kerja
        $this->db->where(['id' => $dataInput['id_uraian_kerja']])->update($this->UraianKerja->table, [
            'proyek_id' => $dataInput['proyek_id'],
            'judul_uraian_kerja' => $dataInput['judul_uraian_kerja'],
        ]);

        // setelah tersimpan ke database untuk tabel uraian kerja maka unset supaya mudah menyimpan detail dari uaraian kerjanya
        unset($dataInput['id_uraian_kerja']);
        unset($dataInput['proyek_id']);
        unset($dataInput['judul_uraian_kerja']);

        // reset ulang element array yang tidak beraturan untuk uraian kerja details
        for ($i = 1; $i <= (int) $this->input->post('jumlah_list_uraian_kerja') + 1; ++$i) {
            $dataInputUraianKerjaDetail[$i]['id'] = $dataInput['id'][$i];
            $dataInputUraianKerjaDetail[$i]['uraian_kerja_id'] = $this->input->post('id_uraian_kerja');
            $dataInputUraianKerjaDetail[$i]['uraian_kerja'] = $dataInput['uraian_kerja'][$i];
            $dataInputUraianKerjaDetail[$i]['satuan'] = $dataInput['satuan'][$i];
            $dataInputUraianKerjaDetail[$i]['volume'] = $dataInput['volume'][$i];
            $dataInputUraianKerjaDetail[$i]['bobot_kontrak'] = $dataInput['bobot_kontrak'][$i];
        }

        // jika sudah tervalidasi maka simpan ke database untuk tabel uraian kerja details
        $this->Helper->replace_batch($this->UraianKerjaDetail->table, $dataInputUraianKerjaDetail);

        // redirect ke form inputan dan oper pesan berhasil
        $this->session->set_flashdata('success', 'Berhasil mengupdate uraian kerja');

        redirect('uraian_kerja');
    }

    public function destroy($uraian_kerja)
    {
        $uraian_kerja = $this->Helper->findOrFail($this->UraianKerja->table, $uraian_kerja);

        $this->db->delete($this->UraianKerja->table, ['id' => $uraian_kerja->id]);

        $this->session->set_flashdata(['success' => 'Berhasil menghapus data uraian kerja']);

        redirect('uraian_kerja');
    }

    public function search()
    {
        if (empty($this->input->post('judul_uraian_kerja'))) {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('uraian_kerja');
        }

        $data['datas'] = $this->db->like('judul_uraian_kerja', $this->input->post('judul_uraian_kerja'))->get($this->UraianKerja->table)->result();

        return $this->Helper->view('uraian_kerja/index', $data);
    }

    public function deleteall()
    {
        // decode dulu supaya bisa diconvert jadi array
        $deleteAllInput = json_decode($this->input->post('deleteAllInput'), true);

        // cek jika kosong kirimkan pesan error
        if (!count($deleteAllInput['tdSelectedUraianKerja']) && count($deleteAllInput['tdSelectedUraianKerjaDetails'])) {
            $this->session->set_flashdata('error', 'Tidak ada uraian kerja yang dihapus!');
            redirect('uraian_kerja');
        }

        // delete semua uraian kerja yang id nya ada didalama array
        $this->db->where_in('id', $deleteAllInput['tdSelectedUraianKerja'])->delete($this->UraianKerja->table);

        // delete semua uraian kerja details yang id nya ada didalama array
        $this->db->where_in('id', $deleteAllInput['tdSelectedUraianKerjaDetails'])->delete($this->UraianKerjaDetail->table);

        $this->session->set_flashdata('success', 'Berhasil menghapus massal Uraian Kerja.');

        redirect('uraian_kerja');
    }

    public function cariProyek()
    {
        $proyek = $this->db->like(['id' => $this->input->post('q')])->or_like(['nama_proyek' => $this->input->post('q')])->get($this->Proyek->table)->result();

        $this->session->set_userdata('q', $this->input->post('q'));

        echo json_encode($proyek);
    }

    public function tampilkanBerdasarkanProyek($proyek = null)
    {
        $data['datas'] = $this->db->where(['proyek_id' => $proyek])->get($this->UraianKerja->table)->result();
        $data['proyek_id'] = $proyek;

        $data['q'] = $this->session->userdata('q');

        $this->Helper->view('uraian_kerja/index', $data);
    }
}
