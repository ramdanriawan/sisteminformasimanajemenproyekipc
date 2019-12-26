<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
    public function index()
    {
        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result(); 
        
        return $this->Helper->view('laporan/index');
    }

    public function tampilkanBerdasarkanProyek()
    {
        // $this->Helper->dd($this->input->post());
        $proyek = $this->input->post('id_proyek');

        $data['proyeks'] = $this->db->get($this->Proyek->table, 100)->result(); 
        $data['datas'] = $this->db->where(['proyek_id' => $proyek])->get($this->UraianKerja->table)->result();
        $data['proyek_id'] = $proyek;

        $data['q'] = $this->session->userdata('q');

        // minggu ke
        $data['minggu_ke'] = $this->input->post('minggu_ke');

        // // list data pelengkap header

        // // kontraktor - tanggal selesai
        $data['proyek'] = $this->Helper->findOrFail($this->Proyek->table, $proyek);

        // periode
        $hariTambah = ($this->input->post('minggu_ke') * 7) - 1;
        $data['periode_akhir'] = date('d-M-Y', strtotime($data['proyek']->tanggal_mulai."+{$hariTambah} days"));
        $data['periode_awal'] = date('d-M-Y', strtotime($data['periode_akhir'].'-6 days'));

        // tanggal mulai dan tanggal selesai
        $data['tanggal_mulai'] = date('d-M-Y', strtotime($data['proyek']->tanggal_mulai));
        $data['tanggal_selesai'] = date('d-M-Y', strtotime($data['proyek']->tanggal_selesai));

        // // waktu pekerjaan
        $date1 = new \DateTime(date('Y-M-d', strtotime($data['tanggal_mulai'])));
        $date2 = new \DateTime(date('Y-M-d', strtotime($data['tanggal_selesai'])));
        $data['waktu_pekerjaan'] = $date1->diff($date2)->d;

        $this->Helper->view('laporan/index', $data);
    }
}
