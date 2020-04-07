<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public $data = array();

    function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->model('import_Model', 'import');
    }
	
	public function index(){
        $this->data['error'] = 0;
        $user = $this->session->userdata(USER_INFO);
        if(isset($user)){
            if($user['role'] == 1){
                redirect(URL_PATH.'membership/index');
            }
        }else{
            $this->load->view('login', $this->data);
        }
    }
    
    public function forget(){
        $this->data['error'] = 0;
        $this->data['centerdata']="";
        foreach($this->user_model->db->query("select * from user group by center ")->result_array() as $r){
			$this->data['centerdata'].=($this->data['centerdata']==""?"":"###").$r['center'];
		}
        $user = $this->session->userdata(USER_INFO);
        if(isset($user)){
            if($user['role'] == 1){
                redirect(URL_PATH.'administrator/index');
            }else if($user['role'] == 2){
                redirect(URL_PATH.'instructor/index');
            }else{
                redirect(URL_PATH.'parentx/index');
            }
        }else{
            $this->load->view('forget', $this->data);
        }
    }
    
    public function forgetin(){
        $this->data['error'] = 0;
        $this->data['centerdata']="";
        foreach($this->user_model->db->query("select * from user group by center ")->result_array() as $r){
			$this->data['centerdata'].=($this->data['centerdata']==""?"":"###").$r['center'];
		}
        $sql="select * from user where name like '%{$_POST['username']}%' and email='{$_POST['email']}' and role='{$_POST['role']}' and center='{$_POST['center']}'";
        $userdata=$this->user_model->db->query($sql)->result_array();
        if(count($userdata)==1){
            $sql="update user set password='".md5($_POST['password'])."' where name like '%{$_POST['username']}%' and email='{$_POST['email']}' and role='{$_POST['role']}' and center='{$_POST['center']}'";
            $this->user_model->db->query($sql);
            $this->data['message']="Successful!";
            $this->load->view('login', $this->data);
        }else{
            $this->data['error'] = 1;
            if(!count($this->user_model->db->query("select * from user where email='{$_POST['email']}'")->result_array())){
                $this->data['message']="There is no the email.";
                $this->load->view('forget', $this->data);
            }else if(!count($this->user_model->db->query("select * from user where name like '%{$_POST['username']}%'")->result_array())){
                $this->data['message']="There is no the name.";
                $this->load->view('forget', $this->data);
            }else{
                $this->data['message']=$sql."Please type correct.";
                $this->load->view('forget', $this->data);
            }
        }
    }
    
    
    public function signin(){
        $this->data['error'] = 0;
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('usernameoremail', 'usernameoremail', 'required');
        //$this->form_validation->set_rules('role', 'Role', 'required');
        if(!isset($_POST['role']))$_POST['role']="1";
		if ($this->form_validation->run() == FALSE){
            $this->data['error'] = 1;                                                                   //please insert the form fields
            $this->data['message'] = "please insert the form fields";
            //redirect('../');
			$this->load->view('login', $this->data);
        }else{
			$_POST['email']=$_POST['usernameoremail'];
			$_POST['username']="";
			$user = $this->user_model->getUserList($_POST);
			if(count($user)==0){
				$_POST['email']="";
				$_POST['username']=$_POST['usernameoremail'];
				$user = $this->user_model->getUserList($_POST);
			}
			if(count($user) > 0){
				$this->session->set_userdata(USER_INFO, $user[0]);
                if($user[0]['role'] == 0){
                    redirect('administrator/index');
                }else{
					redirect('membership/index');
				}
            }else{
                $this->data['error'] = 2;                                                                // user does not exist      
                $this->data['message'] = "Invalid Login";
				$this->load->view('login', $this->data);
            }
        }
    }
	
	function changepass(){
		if(md5($_POST['prevpass'])!=$_POST['pass']){
			echo 2;
			return;
		}
		$where=array(
			'name'=>$_POST['name'],
			'email'=>$_POST['email'],
			'role'=>$_POST['role'],
			'password'=>$_POST['newpass']
		);
		$users = $this->import->getDataList("user",$where);
		if(count($users)){
			echo 3;
			return;
		}
		$where['password']=$_POST['pass'];
		$this->import->db->update("user",array('password'=>md5($_POST['newpass'])),$where);
		echo 1;
	}

    public function signout(){
        $this->data['error'] = 0;
        $this->session->sess_destroy();
        $this->index();
    }
}