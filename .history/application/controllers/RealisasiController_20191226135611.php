<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RealisasiController extends CI_Controller
{
    public function index()
    {
        $data['datas'] = $this->db->get($this->UraianKerja->table, 100)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();
        // supaya gak error waktu nambah data tapi gak milih proyek mana
        $data['proyek_id'] = '';

        $this->Helper->view('realisasi/index', $data);
    }

    public function store()
    {
        // ambil semua data proyek dari tabel proyek dengan helper saya sendiri
        $dataInput = json_decode($this->input->post('inputHiddenSimpanJadwalRencana'), true);

        // simpan rumus untuk item dan bobot ke dalam database
        foreach ($dataInput as $index => $el) {
            // uraian kerja detail
            $uraianKerjaDetail = $this->Helper->findOrFail($this->UraianKerjaDetail->table, $el['uraian_kerja_detail_id']);

            // untuk menghitung item
            $volumeRealisasi = $this->UraianKerjaDetail->realisasi($el['uraian_kerja_detail_id'], $el['minggu_ke'])->volume_realisasi > 0 ? $this->UraianKerjaDetail->realisasi($el['uraian_kerja_detail_id'], $el['minggu_ke'])->volume_realisasi : 0;
            $dataInput[$index]['item'] = ($volumeRealisasi / $uraianKerjaDetail->volume) * 100; //(8) = (7) / (4) * 100

            // untuk menghitung bobot
            $dataInput[$index]['bobot'] = ($dataInput[$index]['item'] / 100) * $uraianKerjaDetail->bobot_kontrak; //(9) = (8) / (100) * (5)

            // untuk menghitung deviasi
            $bobotRencana = $this->UraianKerjaDetail->jadwalRencana($el['uraian_kerja_detail_id'], $el['minggu_ke'])->bobot_rencana > 0 ? $this->UraianKerjaDetail->jadwalRencana($el['uraian_kerja_detail_id'], $el['minggu_ke'])->bobot_rencana : 0;
            $dataInput[$index]['deviasi'] = $dataInput[$index]['bobot'] - $bobotRencana; //(10) = (9) - (6)
        }
        // $this->Helper->dd($dataInput);

        $this->Helper->replace_batch($this->Realisasi->table, $dataInput);

        $this->session->set_flashdata('success', 'Berhasil menyimpan data volume realisasi.');

        if ($this->session->userdata('dataFromSearch') != '') {
            $data = $this->session->userdata('dataFromSearch');
            $this->Helper->view('realisasi/index', $data);
        } else {
            return redirect('realisasi');
        }
    }

    public function search()
    {
        // $this->Helper->dd($this->input->post());
        if (empty($this->input->post('id_proyek')) && $this->session->flashdata('success') == '') {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('realisasi');
        }

        $data['q'] = $this->input->post('q');
        $data['id_proyek'] = $this->input->post('id_proyek');
        $data['minggu_ke'] = $this->input->post('minggu_ke');
        $data['uraian_kerja'] = $this->db->where(['proyek_id' => $this->input->post('id_proyek')])->get($this->UraianKerja->table)->row();
        $data['uraian_kerja_details'] = $this->db->where(['uraian_kerja_id' => $data['uraian_kerja']->id])->get($this->UraianKerjaDetail->table)->result();
        // $jadwal_rencana_ids = $this->Helper->pluckWhereIn($this->JadwalRencana->table, 'id', 'uraian_kerja_detail_id', $data['uraian_kerja_details']);
        // $data['jadwal_rencanas'] = $this->db->where_in('id', $jadwal_rencana_ids)->where(['minggu_ke' => $this->input->post('minggu_ke')])->get($this->JadwalRencana->table)->result();
        // $this->Helper->dd($data['uraian_kerja']);

        $this->session->set_userdata(['dataFromSearch' => $data]);

        return $this->Helper->view('realisasi/index', $data);
    }

    public function tampilkanBerdasarkanProyek()
    {
        // $this->Helper->dd($proyekUraianKerjaDetailJadwalRencana);
        $proyekUraianKerja = $this->Helper->pluckWhere($this->UraianKerja->table, 'id', ['proyek_id' => $this->input->post('id_proyek')]);
        $proyekUraianKerjaDetail = $this->Helper->pluckWhereIn($this->UraianKerjaDetail->table, 'id', 'uraian_kerja_id', $proyekUraianKerja);

        $data['datas'] = $this->db->where_in('uraian_kerja_detail_id', $proyekUraianKerjaDetail)->get($this->Realisasi->table)->result();
        $data['datas'] = $this->db->where(['proyek_id' => $this->input->post('id_proyek')])->get($this->UraianKerja->table)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();
        $data['proyek_id'] = $this->input->post('id_proyek');

        $data['q'] = $this->session->userdata('q');

        $this->Helper->view('jadwal_rencana/index', $data);
    }
}
