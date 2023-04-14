<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_login");
        $this->load->model("m_pengaturan");
    }
    public function index()
    { 
		$this->login();
    }

    public function login()
    {
        $variabel['csrf'] = csrf();
        $id_pengaturan = "1"; 
        $exec = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
        $variabel['data'] = $exec ->row_array();
        if ($this->input->post()){
        $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $exec = $this->m_login->ceklogin($username,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data_session = array(
                    'username' => $data['username'],
                    'statuslogin' => "login",
                    'nama'=> $data['nama'],
                    'jabatan'=> $data['jabatan'],
                    'foto'=> $data['foto'],
                    'rule'=> $data['rule'],
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("app/".$_GET['m'].""));
                } else {
                    redirect(base_url("app"));
                }
            } else {
                $variabel['gagal'] = '0';
                $this->load->view("login/v_login",$variabel);
            }
        } else {
           
            $this->load->view("login/v_login",$variabel);
        }
    }

    public function guest()
    {
        $variabel['csrf'] = csrf();
   
        $username = "Tamu";
        $data_session = array(
            'username' =>"Tamu",
            'statuslogin' => "login",
            'nama'=> "Tamu",
            'jabatan'=> "Guest",
            'foto'=> "",
            'rule'=> "guest",
            );
        $this->session->set_userdata($data_session);
      
        redirect(base_url("app"));
     
        
    
    }

    function logout() {
        $this->session->sess_destroy();
         redirect(base_url('app/login'));
     }
}