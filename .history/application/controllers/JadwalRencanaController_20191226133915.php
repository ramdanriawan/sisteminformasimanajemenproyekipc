<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JadwalRencanaController extends CI_Controller
{
    public function index()
    {
        // setiap balik lagi ke index pastikan datafromsearchnya direset ulang supaya gak nyimpen data dari hasil pencarian sebelumnya dan menampilkan error ketika disave tanpa mencari data terlebih dahulu
        $this->session->set_userdata(['dataFromSearch' => '']);

        $data['datas'] = $this->db->get($this->UraianKerja->table, 100)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();

        // supaya gak error waktu nambah data tapi gak milih proyek mana
        $data['proyek_id'] = '';

        $this->Helper->view('jadwal_rencana/index', $data);
    }

    public function store()
    {
        // ambil semua data proyek dari tabel proyek dengan helper saya sendiri
        $dataInput = json_decode($this->input->post('inputHiddenSimpanJadwalRencana'), true);

        $this->Helper->replace_batch($this->JadwalRencana->table, $dataInput);

        $this->session->set_flashdata('success', 'Berhasil menyimpan data bobot rencana.');

        if ($this->session->userdata('dataFromSearch') != '') {
            $data['datas'] = $this->session->userdata('dataFromSearch');
            // $this->Helper->dd($data['datas']);
            $this->Helper->view('jadwal_rencana/index', $data);
        } else {
            return redirect('jadwal_rencana');
        }
    }

    public function search()
    {
        // $this->Helper->dd($this->input->post());
        if (empty($this->input->post('id_proyek')) && $this->session->flashdata('success') == '') {
            $this->session->set_flashdata('error', 'Tidak ada kata kunci untuk mencari data!');
            redirect('jadwal_rencana');
        }

        $data['q'] = $this->input->post('q');
        $data['id_proyek'] = $this->input->post('id_proyek');
        $data['minggu_ke'] = $this->input->post('minggu_ke');
        $data['datas'] = $this->db->where(['proyek_id' => $this->input->post('id_proyek')])->get($this->UraianKerja->table)->result();
        // $data['uraian_kerja_details'] = $this->db->where(['uraian_kerja_id' => $data['uraian_kerja']->id])->get($this->UraianKerjaDetail->table)->result();
        // $jadwal_rencana_ids = $this->Helper->pluckWhereIn($this->JadwalRencana->table, 'id', 'uraian_kerja_detail_id', $data['uraian_kerja_details']);
        // $data['jadwal_rencanas'] = $this->db->where_in('id', $jadwal_rencana_ids)->where(['minggu_ke' => $this->input->post('minggu_ke')])->get($this->JadwalRencana->table)->result();

        $this->session->set_userdata(['dataFromSearch' => $data]);

        return $this->Helper->view('jadwal_rencana/index', $data);
    }

    public function tampilkanBerdasarkanProyek()
    {
        $proyeks = Db::where(['id' => $this->input->post('id_proyek')])->get();
        $this->Helper->dd('ok');
        $data['datas'] = $this->db->where(['proyek_id' => $this->input->post('id_proyek')])->get($this->UraianKerja->table)->result();
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result();
        $data['proyek_id'] = $this->input->post('id_proyek');

        $data['q'] = $this->session->userdata('q');

        $this->Helper->view('jadwal_rencana/index', $data);
    }
}
