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
                redirect(URL_PATH.'administrator/index');
            }else if($user['role'] == 2){
                redirect(URL_PATH.'instructor/index');
            }else{
                redirect(URL_PATH.'parentx/index');
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
    public function signin_old(){
        $this->data['error'] = 0;
        
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->data['error'] = 1;                                                                   //please insert the form fields
            $this->data['message'] = "please insert the form fields";
            $this->load->view('login', $this->data);
        }else{
            $user = $this->user_model->getUserList($_POST);
			if(count($user)==0)if($_POST['role'] == 3&&$_POST['password']=="welcome1"){
				$username="";
				$center="";
				$parent = $this->import->getDataList("tbl_guardian",array('Email'=>$_POST['email']));
				if(count($parent)>0){
					$username=$parent[0]['First_Name'];
					$center=str_replace(" ","",$parent[0]['Center']);
				}else{
					$parent = $this->import->getDataList("tbl_account",array('Email_Address'=>$_POST['email']));
					if(count($parent)>0){
						$username=$parent[0]['First_Name'];
						$center=str_replace(" ","",$parent[0]['Center']);
					}
				}
				if($center!=""){
					$user = $this->user_model->userRegister(array('r_username'=>$username,'r_email'=>$_POST['email'],'r_password'=>$_POST['password'],'r_role'=>$_POST['role'],'center'=>$center));
					$user = $this->user_model->getUserList($_POST);
				}
			}
			if(count($user) > 0){
				if($user[0]['state']==0||$user[0]['state']==2){
					$this->data['error'] = 4;                                                            // unknown user role
                    $this->data['message'] = "Please waiting for accept of administrator.";
                    $this->load->view('login', $this->data);
					return;
				}
				
				$user[0]['sendable']=1;
				$field=explode(",","active0,active1,active2,active3,sending,overhead");
    		    $permissiondata=$this->user_model->db->query("select * from tbl_arshia where replace(center,' ','')='".str_replace(' ','',$user[0]['center'])."'")->result_array();
    		    if(count($permissiondata)&&$user[0]['role']){
    		        if(!$permissiondata[0]['active0']){
    		            $this->data['error'] = 4;                                                                // user does not exist      
                        $this->data['message'] = "Sorry. Please ask Administrator.";
        				$this->load->view('login', $this->data);
                        return;
    		        }
    		        if(!$permissiondata[0][$field[$user[0]['role']]]){
    		            $this->data['error'] = 5;                                                                // user does not exist      
                        $this->data['message'] = "Sorry. Please ask Administrator.";
        				$this->load->view('login', $this->data);
                        return;
    		        }
    		        $user[0]['sendable']=$permissiondata[0]['sending'];
    		    }
				
                $this->session->set_userdata(USER_INFO, $user[0]);
                if($user[0]['role'] < 2){
                    redirect(URL_PATH.'administrator/index');
                }else if($user[0]['role'] == 2){
                    redirect(URL_PATH.'instructor/index');
                }else if($user[0]['role'] == 3){
                    redirect(URL_PATH.'parentx/index');
                }else{
                    $this->data['error'] = 3;                                                            // unknown user role
                    $this->data['message'] = "unknown user role";
                    $this->load->view('login', $this->data);
                }
            }else{
                $this->data['error'] = 2;                                                                // user does not exist      
                $this->data['message'] = "user does not exist";
				if($_POST['role'] == 3)$this->data['message']="Please try once again your password into \"welcome1\".";
                $this->load->view('login', $this->data);
            }
        }
    }
    
    public function signin(){
        $this->data['error'] = 0;
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->data['error'] = 1;                                                                   //please insert the form fields
            $this->data['message'] = "please insert the form fields";
            $this->load->view('login', $this->data);
        }else{
            $user = $this->user_model->getUserList($_POST);
			if(count($user)==0)if($_POST['role'] == 3&&$_POST['password']=="welcome1"){
				$username="";
				$center="";
				$parent = $this->import->getDataList("tbl_guardian",array('Email'=>$_POST['email']));
				if(count($parent)>0){
					$username=$parent[0]['First_Name'];
					$center=str_replace(" ","",$parent[0]['Center']);
				}else{
					$parent = $this->import->getDataList("tbl_account",array('Email_Address'=>$_POST['email']));
					if(count($parent)>0){
						$username=$parent[0]['First_Name'];
						$center=str_replace(" ","",$parent[0]['Center']);
					}
				}
				if($center!=""){
					$user = $this->user_model->userRegister(array('r_username'=>$username,'r_email'=>$_POST['email'],'r_password'=>$_POST['password'],'r_role'=>$_POST['role'],'center'=>$center));
					$user = $this->user_model->getUserList($_POST);
				}
			}
			if(count($user) > 0){
				if($user[0]['state']==0||$user[0]['state']==2){
					$this->data['error'] = 4;                                                            // unknown user role
                    $this->data['message'] = "Please waiting for accept of administrator.";
                    $this->load->view('login', $this->data);
					return;
				}
				
				$user[0]['sendable']=1;
				$field=explode(",","active0,active1,active2,active3,sending,overhead");
    		    $permissiondata=$this->user_model->db->query("select * from tbl_arshia where replace(center,' ','')='".str_replace(' ','',$user[0]['center'])."'")->result_array();
    		    if(count($permissiondata)&&$user[0]['role']){
    		        if(!$permissiondata[0]['active0']){
    		            $this->data['error'] = 4;                                                                // user does not exist      
                        $this->data['message'] = "Sorry. Please ask Administrator.";
        				$this->load->view('login', $this->data);
                        return;
    		        }
    		        if(!$permissiondata[0][$field[$user[0]['role']]]){
    		            $this->data['error'] = 5;                                                                // user does not exist      
                        $this->data['message'] = "Sorry. Please ask Administrator.";
        				$this->load->view('login', $this->data);
                        return;
    		        }
    		        $user[0]['sendable']=$permissiondata[0]['sending'];
    		    }
				
                $this->session->set_userdata(USER_INFO, $user[0]);
                $this->user_model->db->select("*");
        		$this->user_model->db->where("email", $user[0]['email']);
        		$crossuser = $this->user_model->db->get("user")->result_array();
                if(!count($crossuser))$crossuser=array();
                $this->session->set_userdata(USER_CROSS_INFO, $crossuser);
                //$_SERVER['REMOTE_ADDR']
                if($user[0]['ip_lock']){
                    $sql="select * from tbl_ipinterlock where center='{$user[0]['center']}' and ip='{$_SERVER['REMOTE_ADDR']}'";
                    if(count($this->user_model->db->query($sql)->result_array())){
                        
                    }else{
                        $this->data['error'] = 6;                                                            // unknown user role
                        $this->data['message'] = "WRONG IP ADDRESS!";
                        $this->load->view('login', $this->data);
                        return;
                    }
                }
                if($user[0]['role'] < 2){
                    redirect(URL_PATH.'administrator/index');
                }else if($user[0]['role'] == 2){
                    redirect(URL_PATH.'instructor/index');
                }else if($user[0]['role'] == 3){
                    $fff=0;
                    if(isset($_POST['password']))if($_POST['password']=="welcome1")$fff=1;
                    if($fff==1)redirect(URL_PATH.'parentx/index?f=1');
                    else redirect(URL_PATH.'parentx/index');
                }else{
                    $this->data['error'] = 3;                                                            // unknown user role
                    $this->data['message'] = "unknown user role";
                    $this->load->view('login', $this->data);
                }
            }else{
                $this->data['error'] = 2;                                                                // user does not exist      
                $this->data['message'] = "user does not exist";
				if($_POST['role'] == 3)$this->data['message']="Please try once again your password into \"welcome1\".";
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