<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load model admin
        $this->load->model('admin');
        $this->load->library('form_validation');
    }

    public function index(){
        if ($this->admin->login()) {
            redirect("home");
        }else{

            //set form validation
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');
            
            //check validation
            if ($this->form_validation->run() == TRUE) {
                
                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post("password", TRUE));

                //check data dari model
                $checking = $this->admin->check_login('admin', array('username' => $username), array('password' => $password));

                //jika data ada maka create session 
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {
                        
                        $session_data = array(
                            'admin_id' => $apps->id,
                            'admin_name' => $apps->username,
                            'admin_pass' => $apps->password
                        );
                        //set session admindata
                        $this->session->set_userdata($session_data);
                        redirect('home');
                    }
                }else{
                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login',$data);
                }
            }else{
                $this->load->view('login');
            }
        }
    }

    
}