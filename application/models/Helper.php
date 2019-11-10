<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Helper extends CI_Model 
{
    // selalu cek posisi login user dengan method __construct()
    public function __construct()
    {
        //url yang tidak perlu dicek login
        $blockListUrlforCekLogin = [
            'login',
            'ceklogin',
        ];
        
        // jika user mengirimkan perintah untuk login maka cek data loginnya
        if( $this->input->post('username') && $this->input->post('password') && !$this->session->userdata('session') )
        {
            $user = $this->db->where('username', $this->input->post('username'))->get('users')->result()[0];
            $password = password_verify($this->input->post('password'), $user->password);

            if ( $user && $password )
            {
                $this->session->set_flashdata('success', "Berhasil login sebagai ($user->tipe_user)");
                $this->session->set_userdata('session', 'login');
                
                // untuk menyimpan data user agar mudah digunakan
                $this->session->set_userdata('user', $user);
                
                if ( $this->session->userdata('user')->tipe_user == "rekanan" )
                {
                    redirect('realisasi');
                }

                redirect('awal');
            }else 
            {
                $this->session->set_flashdata('error', 'Username atau password salah');
                
                $this->session->set_flashdata('old', $_REQUEST); // simpan semua nilai inputan kedalam session flashdata agar tidak menginput ulang
                
                redirect('login');
            }
        }

        // jika user mengirimkan perintah logout maka hapus sessionnya dan arahkan kehalaman login
        elseif( $this->uri->segment(1) == 'logout' )
        {
            $this->session->unset_userdata('session');
            $this->session->unset_userdata('user');
            
            redirect('login');
        }
        
        // jika user belum login maka arahkan ke halaman login
        elseif( !in_array($this->uri->segment(1), $blockListUrlforCekLogin) )
        {
            if( !$this->session->userdata('session') )
            {
                redirect('login');
            }
        }

        // jika user sudah login arahkan ke halaman awal
        elseif( in_array($this->uri->segment(1), $blockListUrlforCekLogin) )
        {
            if( $this->session->userdata('session') )
            {
                redirect('awal');
            }
        }

        // list url
        // user, proyek, uraian kerja, jadwal_rencana, realisasi, laporan, tagihan

        // atur hak akses untuk manager
        $id = $this->uri->segment(2) == $this->session->userdata('user')->id ? 0 : $this->uri->segment(2);
        $tipe_user = $this->session->userdata('user')->tipe_user;

        $blockListUrlForManager = [
            // user
            'user',
            'uraian_kerja',
            'uraian_kerja_detail',
            'jadwal_rencana',
            'realisasi',
            'tagihan'
        ];

        // atur hak akses untuk rekanan
        $blockListUrlForRekanan = [
            '',
            'awal',
            'user',
            'proyek',
            'uraian_kerja', // jangan diblok karena gak bisa buat nyari proyek nanti
            'uraian_kerja_detail',
            'jadwal_rencana',
        ];

        if ( in_array($this->uri->segment(1), $blockListUrlForManager) && $this->session->userdata('user')->tipe_user == "manager" )
        {
            if 
            (
                // user boleh mengedit akunnya dan juga mencari berdasarakan proyek
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/edit" ||
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/update" ||
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/destroy" ||
                $this->uri->uri_string() == "uraian_kerja/cari_proyek"
            )
            {
            }
            else 
            {
                die("<h1>Kamu tidak memiliki hak akses untuk link ini!</h1>");
            }

        }

        if ( in_array($this->uri->segment(1), $blockListUrlForRekanan) && $this->session->userdata('user')->tipe_user == "rekanan" )
        {
            if 
            (
                // user boleh mengedit akunnya dan juga mencari berdasarakan proyek
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/edit" ||
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/update" ||
                $this->uri->uri_string() == "user/{$this->session->userdata('user')->id}/destroy" ||
                $this->uri->uri_string() == "uraian_kerja/cari_proyek"
            )
            {
            }
            else 
            {
                die("<h1>Kamu tidak memiliki hak akses untuk link ini!</h1>");
            }
        }

        // autobackup database setiap halaman direload
        $this->db_backup();
    }

    public function view($view, $data = [])
    {
        //untuk meload header dan memberi data ke view
        $this->load->view('header');
        $this->load->view($view, $data);
        $this->load->view('footer');
    }

    public function dd($var)
    {
        // untuk menampilkan output danmenghentikan script
        echo "<pre>";
        print_r($var);
        die();
    }

    public function findOrFail($table, $id)
    {
        // untuk mencari didatabase jika ada tapi jika tidak ada maka tampilkan not found
        $result = $this->db->where('id', $id)->get($table)->result();

        if ( !$result )
        {
            $this->Helper->dd('Not Found');
        }else 
        {
            return $result[0];
        }
    }
    
    
    public function find($table, $id)
    {
        // untuk mencari didatabase jika ada tapi jika tidak ada maka false
        $result = $this->db->where('id', $id)->get($table)->result();
        
        if ( !$result )
        {
            return false;
        }else 
        {
            return $result[0];
        }
    }
    
    public function showMsgAlert()
    {
        if($this->session->flashdata("success") != "" || $this->session->flashdata("error") != "")
        {
            $msgAlertClass = $this->session->flashdata('success') != '' ? 'alert-success' : 'alert-danger';
            $msgAlert = $this->session->flashdata('success') != "" ? $this->session->flashdata('success') : $this->session->flashdata('error');
            $faAlert = $this->session->flashdata('success') != "" ? "fa-check" : "fa-times";
            echo "<div class='' role='alert'>
            <div class='alert alert-mg-b {$msgAlertClass}' role='alert'>
                <i class='fa {$faAlert} adminpro-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11' aria-hidden='true'></i> <strong>{$msgAlert}</strong>
            </div>
            ";
        }
    }

    public function pluck($table, $column)
    {
        $results = $this->db->distinct()->select($column)->get($table)->result_array();

        $data = [];
        foreach( $results as $result )
        {
            $data[] = $result[$column];
        }

        return $data;
    }

    public function pluckWhere($table, $column, array $where)
    {
        $results = $this->db->distinct()->select($column)->where($where)->get($table)->result_array();

        $data = [];
        foreach( $results as $result )
        {
            $data[] = $result[$column];
        }

        return $data;
    }

    public function pluckWhereIn($table, $column, $columnSelected, array $whereIn)
    {
        $whereInData = [];
        foreach($whereIn as $key => $value)
        {
            $whereInData[] = $value[$column];
        }

        $results = $this->db->distinct()->select("*")->where_in($columnSelected, $whereInData)->get($table)->result_array();

        $data = [];
        foreach( $results as $result )
        {
            $data[] = $result[$column];
        }

        return $data;
    }

    public function replace_batch($table, array $arrays)
    {
        foreach( $arrays as $array )
        {
            $this->db->replace($table, $array);
        }
    }
    
    public function belongsTo()
    {}
        
    public function hasMany()
    {}

    public function toIdr($number)
    {
        return "Rp" . number_format($number, 0, '', '.');
    }

    public function fromIdr($idr)
    {
        return str_replace(".", "", str_replace("Rp", "", $idr));
    }

    // fungsi copy dari google
    public function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai == 0)
        {
            $temp = "";
        }
		else if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
        }
             		
		return $hasil;
    }
    
    public function toDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }
    
    
    public function fromDate($date)
    {
        return date("m-d-Y", strtotime($date));
    }

    // fungsi untuk membackup database (maksimal adalah 50 database terakhir)
    public function db_backup()
    {
       $this->load->dbutil();
       $this->load->helper('file');

       $backup =& $this->dbutil->backup();

       if ( count(glob("backup/*", GLOB_BRACE)) < 51 )
       {
           write_file("backup/backup_" . time() . ".zip", $backup);
        }else 
        {
            $backups = array_values(array_diff(scandir("backup"), array('.', '..')));
            
            unlink("backup/{$backups[0]}");

            write_file("backup/backup_" . time() . ".zip", $backup);
       }
    }
}