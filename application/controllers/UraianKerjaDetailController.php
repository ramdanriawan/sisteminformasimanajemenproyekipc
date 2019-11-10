<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class UraianKerjaDetailController extends CI_Controller 
{
    public function destroy($uraian_kerja_detail)
    {
        $uraian_kerja_detail = $this->Helper->findOrFail($this->UraianKerjaDetail->table, $uraian_kerja_detail);

        $this->db->delete($this->UraianKerjaDetail->table, ['id' => $uraian_kerja_detail->id]);

        $this->session->set_flashdata(['success' => 'Berhasil menghapus data uraian kerja']);

        redirect('uraian_kerja');
    }       
}

        
                            