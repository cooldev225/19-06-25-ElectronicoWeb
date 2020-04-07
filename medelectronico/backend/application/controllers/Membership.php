<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends MY_Controller {
    public $view = array();
    public $table="tbl_retina";
    function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->model('import_Model', 'import');
		$this->view['header'] = 'header.php';
		$this->view['sidebar'] = 'sidebar_m.php';
		$this->view['footer'] = 'footer.php';
		$nowuser = $this->session->userdata(USER_INFO);
		if(!isset($nowuser)){
			redirect(URL_PATH);
		}
		$this->view['_now_user']=$nowuser;
		//$this->load->helper('email');
    }
	
	public function index(){
	    if(!isset($this->view['_now_user'])){
			redirect("${BASE_PATH}/login/signout");
		}
        $this->data['error'] = 0;
        $this->view['content'] = 'membership/recordview.php';
        $this->view['record'] = $this->import->getDataList($this->table,array('idx>'=>0));
        if(count($this->view['record']))$this->view['record']=$this->view['record'][0];
		$this->load->view('container.php', $this->view);
    }
    
    public function getrecordlist(){
        $rs = $this->import->getDataList($this->table,array('idx>'=>0));
        //for($i=0;$i<count($rs);$i++){$res[$i]['idx']=$rs[$i]['idx'];$res[$i]['FECHA']=null;$res[$i]['NOMBRE']=$rs[$i]['NOMBRE'];$res[$i]['MEDICO']=$rs[$i]['MEDICO'];}
        echo json_encode($rs);
    }
    
    public function getrow(){
        $rs = $this->import->getDataList($this->table,array('idx'=>$_POST['idx']));
        //for($i=0;$i<count($rs);$i++){$res[$i]['idx']=$rs[$i]['idx'];$res[$i]['FECHA']=null;$res[$i]['NOMBRE']=$rs[$i]['NOMBRE'];$res[$i]['MEDICO']=$rs[$i]['MEDICO'];}
        echo json_encode($rs[0]);
    }
    public function printrow(){
        $rs = $this->import->getDataList($this->table,array('idx'=>$_GET['idx']));
        //for($i=0;$i<count($rs);$i++){$res[$i]['idx']=$rs[$i]['idx'];$res[$i]['FECHA']=null;$res[$i]['NOMBRE']=$rs[$i]['NOMBRE'];$res[$i]['MEDICO']=$rs[$i]['MEDICO'];}
        $this->view['record'] =$rs[0];
        $this->load->view('printrow.php',$this->view);
    }
	
	public function addnew(){
	    if(!isset($this->view['_now_user'])){
			redirect("${BASE_PATH}/login/signout");
		}
        if(!isset($_GET['idx']))$_GET['idx']=-1;
		$record=$this->import->getDataList($this->table,array('idx'=>$_GET['idx']));
        if(!count($record)){
			$this->import->db->insert($this->table,array('idx'=>$_GET['idx']));
			$record=$this->import->getDataList($this->table,array('idx'=>$_GET['idx']));
		}
		$this->view['record']=$record[0];
		$this->view['content'] = 'membership/addnew.php';
		$this->load->view('container.php', $this->view);
    }
	
	public function paint(){
		//$this->view['idx']=0;
		$this->view['filename'] = $_GET['filename'];
		$this->load->view('membership/paint.php', $this->view);
    }
	
	public function imagesave(){
		/*UPLOAD_PATH echo "<script>alert(\"{$_FILES['file']['tmp_name']}\");</script>";
		$destpath=UPLOAD_PATH.$_POST['rfilename'].".png";
		$sourcepath=$_FILES['file']['tmp_name'];
		if(file_exists($sourcepath)){
		    if(file_exists($destpath)){
    		    unlink($destpath);        
    		}        
    		copy($sourcepath,$destpath);
		}*/
		$config['upload_path'] = './uploads/OD-OS/';//UPLOAD_RETINA_PATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $_POST['rfilename'].".png";
        $config['overwrite']  = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$res=$this->upload->do_upload('file'))
        echo "<script>alert(\"{$config['upload_path']}-{$res}\");</script>";
		$this->view['filename'] = $_POST['rfilename'];
		$this->load->view('membership/paint.php', $this->view);
    }
    
    public function saverecord(){
        $rs=$this->import->getDataList($this->table);
        foreach($rs[0] as $field=>$val)if(isset($_POST[$field])){
            if($field!="idx")$fd[$field]=$_POST[$field];
        }
        if($_POST['flag']==1){
            $this->import->db->update($this->table,$fd,array('idx'=>$_POST['idx']));
            echo $_POST['idx'];
        }else{
            $this->import->db->insert($this->table,$fd);
            $rs=$this->import->db->query("select max(idx) as idx from {$this->table}")->result_array();
            echo $rs[0]['idx'];
            if($_POST['idx']==-1){
                $rs=$this->import->getDataList($this->table);
                foreach($rs[0] as $field=>$val)if(isset($_POST[$field])){
                    if($field!="idx")$fd[$field]="";
                }
                $this->import->db->update($this->table,$fd,array('idx'=>$_POST['idx']));
            }
        }
    }
}