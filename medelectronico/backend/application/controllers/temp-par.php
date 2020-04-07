<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Parentx extends MY_Controller{
		public $view = array();
		public $_user_name="";
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model('import_Model', 'import');
			$this->view['header'] = 'header.php';
			$this->view['sidebar'] = 'parent_sidebar.php';
            $this->view['footer'] = 'footer.php';
            
            $crossuser = $this->session->userdata(USER_CROSS_INFO);
			if(!isset($crossuser)){
                redirect(URL_PATH);
			}
			$this->view['_cross_user']=$crossuser;
			$nowuser = $this->session->userdata(USER_INFO);
			if(!isset($nowuser)){
                redirect(URL_PATH);
			}
			$this->view['_now_user']=$nowuser;
            $this->view['_user_sendable']=$nowuser['sendable'];
            
            $user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->_user_name=$user;
			$this->load->helper('email');
		}
		
		public function controlpanel(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['logined_user'] = $user;
			$this->view['_user_name'] = $user;
			$this->view['content'] = 'administrator/controlpanel.php';
			$center=$user['center'];
			if(isset($_POST['selcenter']))
				$center=$_POST['selcenter'];
			$this->view['smtpdata']=$this->import->getDataList("tbl_localsmtp",array("center"=>$center));
			$this->view['centerdata']="";
			if($user['role']==0){
				foreach($this->import->getDataList("tbl_localsmtp") as $r){
					$this->view['centerdata'].=($this->view['centerdata']==""?"":"###").$r['center'];
				}
			}else{
				foreach($this->import->getDataList("user",array("email"=>$user['email'])) as $r){
					$this->view['centerdata'].=($this->view['centerdata']==""?"":"###").$r['center'];
				}
			}
			$this->load->view('container.php', $this->view);
		}

		public function index(){
		    if(isset($_GET['f']))if($_GET['f']==1)$this->view['confirm_msg']="Please update your default password from 'welcome1'.";
			$this->view['content'] = 'parent/report.php';
			$this->view['_user_name'] = $this->_user_name;
			$this->view['_user_sendable']=$this->_user_name['sendable'];
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
            
            $templatedata = $this->import->getDataList("tbl_template");
			$this->view['templatedata']=array();
			foreach($templatedata as $r){
			    if($r['typex']==1||$r['typex']==2||$r['typex']==4||$r['typex']==5)
			    $this->view['templatedata'][]=$r;
			}
			
			$this->view['userdata'] = $this->import->getDataList("user");
			$ixldata = $this->import->getDataList("tbl_ixl");
			$this->view['ixldata']=array();
			foreach($ixldata as $r){
			    $this->view['ixldata'][$r['pk']]=(isset($this->view['ixldata'][$r['pk']])?",":"").$r['pk_descrip'];    
			    $this->view['ixlurldata'][$r['pk']]=(isset($this->view['ixldata'][$r['pk']])?"##":"").$r['ixl_URL'];    
			}
			$this->view['studentdata'] = $this->import->db->query("SELECT * FROM `student_by_parent` where pemail='{$user['email']}' ")->result_array();//and replace(center,' ','')='".str_replace(' ','',$user['center'])."'
			$sql="select a.*,b.First_Name,b.Last_Name,b.pFirst_Name,b.pLast_Name,b.pemail,b.pphone,b.center,c.name as iname from tbl_session a join student_by_parent b on a.studentidx=b.s_Id join user c on a.instructorx=c.name where a.idx>0 ";
			if(!isset($_POST['fromdate']))$this->view['fromdate']="";else $this->view['fromdate']=$_POST['fromdate'];
			if(!isset($_POST['todate']))$this->view['todate']="";else $this->view['todate']=$_POST['todate'];
			if($this->view['fromdate']=="NULL")$this->view['fromdate']="";
			if($this->view['todate']=="NULL")$this->view['todate']="";
			//if(!isset($_POST['instructor']))$this->view['instructor']=$this->_user_name;else $this->view['instructor']=$_POST['instructor'];
			if(!isset($_POST['student']))$this->view['student']="";else $this->view['student']=$_POST['student'];
			if($this->view['fromdate']!="")$sql.=" and a.datex>='{$this->view['fromdate']}' ";
			if($this->view['todate']!="")$sql.=" and a.datex<='{$this->view['todate']}' ";
			//if($this->view['instructor']!="")$sql.=" and a.instructorx='{$this->view['instructor']}' ";
			if($this->view['student']!="")$sql.=" and a.studentidx='{$this->view['student']}' ";
			else{
			    $sql.=" and b.pemail='{$user['email']}'";
			}
			//$sql.=" and replace(b.center,' ','')='".str_replace(' ','',$user['center'])."'";
			$sql.=" order by a.datex desc";//exit($sql);
			$this->view['sessiondata'] = $this->import->db->query($sql)->result_array();
			for($i=0;$i<count($this->view['sessiondata']);$i++){
				$rr = $this->import->getDataList("tbl_report",array('sessionid'=>$this->view['sessiondata'][$i]['idx']),array('datex desc'));
				$this->view['sessiondata'][$i]['reportid0']="";
				$this->view['sessiondata'][$i]['reportreceiver0']="";
				$this->view['sessiondata'][$i]['reporttime0']="";
				$this->view['sessiondata'][$i]['reportid1']="";
				$this->view['sessiondata'][$i]['reportreceiver1']="";
				$this->view['sessiondata'][$i]['reporttime1']="";
				$this->view['sessiondata'][$i]['reportid2']="";
				$this->view['sessiondata'][$i]['reportreceiver2']="";
				$this->view['sessiondata'][$i]['reporttime2']="";
				$j1=0;$j2=0;$j3=0;
				$this->view['sessiondata'][$i]['reporttwice0']="";
				$this->view['sessiondata'][$i]['reporttwice1']="";
				$this->view['sessiondata'][$i]['reporttwice2']="";
				for($j=0;$j<count($rr);$j++){
					if($rr[$j]['typex']==0||$rr[$j]['typex']==3){
						$this->view['sessiondata'][$i]['reportid0'].=($j1==0?"":"##").$rr[$j]['idx'];	
						$this->view['sessiondata'][$i]['reportreceiver0'].=($j1==0?"":"##").$rr[$j]['receiverx'];	
						$this->view['sessiondata'][$i]['reporttime0'].=($j1==0?"":"##").$rr[$j]['datex'];	
						if(!isset($this->view['sessiondata'][$i][0][$rr[$j]['receiverx']])){
						    $this->view['sessiondata'][$i][0][$rr[$j]['receiverx']]=1;
						    if(isset($this->view['sessiondata'][$i]['reporttwice0']))$this->view['sessiondata'][$i]['reporttwice0'].="@@";
						    else $this->view['sessiondata'][$i]['reporttwice0']="";
						    $this->view['sessiondata'][$i]['reporttwice0'].=$rr[$j]['idx']."##".$rr[$j]['receiverx']."##".$rr[$j]['datex'];
						}
						$j1=1;
					}
					if($rr[$j]['typex']==1||$rr[$j]['typex']==4){
						$this->view['sessiondata'][$i]['reportid1'].=($j2==0?"":"##").$rr[$j]['idx'];	
						$this->view['sessiondata'][$i]['reportreceiver1'].=($j2==0?"":"##").$rr[$j]['receiverx'];
						$this->view['sessiondata'][$i]['reporttime1'].=($j2==0?"":"##").$rr[$j]['datex'];	
						if(!isset($this->view['sessiondata'][$i][1][$rr[$j]['receiverx']])){
						    if(isset($this->view['sessiondata'][$i]['reporttwice1']))$this->view['sessiondata'][$i]['reporttwice1'].="@@";
						    else $this->view['sessiondata'][$i]['reporttwice1']="";
						    $this->view['sessiondata'][$i][1][$rr[$j]['receiverx']]=1;
						    $this->view['sessiondata'][$i]['reporttwice1'].=$rr[$j]['idx']."##".$rr[$j]['receiverx']."##".$rr[$j]['datex'];
						}
						$j2=1;
					}
					if($rr[$j]['typex']==2){
						$this->view['sessiondata'][$i]['reportid2'].=($j3==0?"":"##").$rr[$j]['idx'];	
						$this->view['sessiondata'][$i]['reportreceiver2'].=($j3==0?"":"##").$rr[$j]['receiverx'];	
						$this->view['sessiondata'][$i]['reporttime2'].=($j3==0?"":"##").$rr[$j]['datex'];	
						if(!isset($this->view['sessiondata'][$i][2][$rr[$j]['receiverx']])){
						    if(isset($this->view['sessiondata'][$i]['reporttwice2']))$this->view['sessiondata'][$i]['reporttwice2'].="@@";
						    else $this->view['sessiondata'][$i]['reporttwice2']="";
						    $this->view['sessiondata'][$i][2][$rr[$j]['receiverx']]=1;
						    $this->view['sessiondata'][$i]['reporttwice2'].=$rr[$j]['idx']."##".$rr[$j]['receiverx']."##".$rr[$j]['datex'];
						}
						$j3=1;
					}
				}
			}
			//$this->view['reportdata'] = $this->import->getDataList("tbl_report",);
			if(isset($_POST['viewidx']))$this->view['viewidx']=$_POST['viewidx'];else $this->view['viewidx']="";
			if(isset($_POST['viewdatex']))$this->view['viewdatex']=$_POST['viewdatex'];else $this->view['viewdatex']="";			
			$this->load->view('container.php', $this->view);
		}
		
		public function getMessageData(){
			$sql="select * from tbl_report where idx='{$_POST['idx']}'";
			//exit($sql);
			$reportdata = $this->import->db->query($sql)->result_array();
			$result['error'] = "0";
			$result['msg'] = "";
			if(count($reportdata)){
				$result['msg'] = $reportdata[0]['bodyx'];
			}
			echo json_encode($result);	
		}
	}
	




