<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Administrator extends MY_Controller{
		public $view = array();
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model('import_Model', 'import');
			$this->view['header'] = 'header.php';
			
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
			
			$this->view['sidebar'] = 'sidebar.php';
			$this->view['footer'] = 'footer.php';
			
		}

		public function index(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['_user_name'] = $user;
			$this->view['content'] = 'administrator/viewuser.php';
			if($user['role']==0){
				$this->view['admindata'] = $this->import->getDataList("user",array("role"=>"1"));
				$this->view['instructordata'] = $this->import->getDataList("user",array("role"=>"2"));
				$this->view['parentdata'] = $this->import->getDataList("user",array("role"=>"3"));
			}else{
				$this->view['admindata'] = $this->import->getDataList("user",array("role"=>">0","role"=>"1","center"=>$user['center']));
				$this->view['instructordata'] = $this->import->getDataList("user",array("role"=>"2","center"=>$user['center']));
				$this->view['parentdata'] = $this->import->getDataList("user",array("role"=>"3","center"=>$user['center']));
			}
			$this->view['state'] = array("request","accept","reject");
			$this->load->view('container.php', $this->view);
		}
        
		public function excelimport(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['_user_name'] = $user;
			$this->view['content'] = 'administrator/excel.php';
			$this->load->view('container.php', $this->view);
		}

		public function importStudent($fid){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['_user_name'] = $user;
			$fname=explode(",","student,account,guardian,ixl");
			$this->view['content'] = 'administrator/excel.php';
			if (isset($_FILES["{$fname[$fid]}file"])) {
				$path= './uploads/';
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'xlsx|xls|jpg|png';
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//unlink("$path{$_FILES["{$fname[$fid]}file"]['name']}");
				if (!$this->upload->do_upload("{$fname[$fid]}file")) {
					$this->view['error'] = $this->upload->display_errors();
					echo $this->view['error'];
					exit;
					redirect(URL_PATH."administrator/excelimport");
					exit();
				} else {
					$data = array('upload_data' => $this->upload->data());
				}

				if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = $data['upload_data']['file_name'];
				}
				$inputFileName = $path . $import_xls_file;
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME).'": ' . $e->getMessage());
				}
				$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

				$arrayCount = count($allDataInSheet);
				$flag = 0;
				$createArray=array('StudentId', 'FirstName', 'LastName');
				$makeArray = array('StudentId' => 's_Id', 'FirstName' => 'First_Name', 'LastName' => 'Last_Name');
				if($fid==0){
					$createArray=array('StudentId', 'FirstName', 'LastName','MailingStreet1'	,'MailingStreet2',	'MailingCity',	'MailingState',	'MailingCountry',	'MailingZipCode',	'BillingStreet1',	'BillingStreet2',	'BillingCity',	'BillingState',	'BillingCountry',	'BillingZipCode',	'Grade',	'SchoolYear',	'SchoolId','School',	'Teacher',	'TeacherId',	'LeadId',	'Account',   'EnrollmentStatus',	'EnrollmentStartDate',	'EnrollmentEndDate',	'LastAttendanceDate'	,'LastPRSent',	'Gender','DateofBirth',	'Description',	'ConsenttoMediaRelease',	'ConsenttoContactTeacher'	,'ConsenttoLeaveUnescorted',	'EmergencyContact',	'EmergencyPhone',	'MedicalInformation',	'Scholarship'	,'School[WebLead]'	,'Teacher[WebLead]',	'CreatedBy',	'CreatedDate',	'LastModifiedBy',	'LastModifiedOn',	'Center');//,	'Center1');
					$makeArray = array('StudentId'=>'s_Id', 'FirstName'=>'First_Name', 'LastName'=>'Last_Name','MailingStreet1'=>'Mailing_Street1'	,'MailingStreet2'=>'Mailing_Street2',	'MailingCity'=>'Mailing_City',	'MailingState'=>'Mailing_State',	'MailingCountry'=>'Mailing_Country',	'MailingZipCode'=>'Mailing_Zip_Code',	'BillingStreet1'=>'Billing_Street1',	'BillingStreet2'=>'Billing_Street2',	'BillingCity'=>'Billing_City',	'BillingState'=>'Billing_State',	'BillingCountry'=>'Billing_Country',	'BillingZipCode'=>'Billing_Zip_Code',	'Grade'=>'Grade',	'SchoolYear'=>'School_Year',	'SchoolId'=>'School_Id',	'School'=>'School',	'Teacher'=>'Teacher',	'TeacherId'=>'Teacher_Id',	'LeadId'=>'Lead_Id',	'Account'=>'Account', 'EnrollmentStatus'=>'Enrollment_Status',	'EnrollmentStartDate'=>'Enrollment_Start_Date',	'EnrollmentEndDate'=>'Enrollment_End_Date',	'LastAttendanceDate'=>'Last_Attendance_Date'	,'LastPRSent'=>'Last_PR_Sent',	'Gender'=>'Gender','DateofBirth'=>'Date_of_Birth',	'Description'=>'Description',	'ConsenttoMediaRelease'=>'Consent_to_Media_Release',	'ConsenttoContactTeacher'=>'Consent_to_Contact_Teacher'	,'ConsenttoLeaveUnescorted'=>'Consent_to_Leave_Unescorted',	'EmergencyContact'=>'Emergency_Contact',	'EmergencyPhone'=>'Emergency_Phone',	'MedicalInformation'=>'Medical_Information',	'Scholarship'=>'Scholarship'	,'School[WebLead]'=>'School_WebLead'	,'Teacher[WebLead]'=>'Teacher_WebLead',	'CreatedBy'=>'Created_By',	'CreatedDate'=>'Created_Date',	'LastModifiedBy'=>'Last_Modified_By',	'LastModifiedOn'=>'Last_Modified_On',	'Center'=>'Center');//,	'Center1'=>'Center1');
				}else if($fid==1){
					$createArray=array('FirstName','LastName','Center',	'MobilePhone'	,'AccountId',	'EnrollmentStatus'	,'EmailAddress'	,'HomePhone',	'OtherPhone',	'BillingStreet1'	,'BillingStreet2'	,'BillingCity'	,'BillingState'	,'BillingZipCode'	,'BillingCountry',	'DateofBirth',	'CreatedBy',	'Description'	,'LastModifiedBy'	,'MailingStreet1'	,'MailingStreet2',	'MailingCity','MailingState',	'MailingZipCode'	,'MailingCountry',	'CustomerComments'	,'EmergencyPhoneNumber',	'LastTriMathlonReg.Date',	'ReferralAccount'	,'AccountRelation'	,'EmergencyContact'	,'LastModifiedBy'	,'LastModifiedDate',	'CreatedDate');
					$makeArray = array('FirstName'=>'First_Name','LastName'=>'Last_Name','Center'=>'Center','MobilePhone'=>'Mobile_Phone','AccountId'=>'Account_Id','EnrollmentStatus'=>'Enrollment_Status'	,'EmailAddress'=>'Email_Address'	,'HomePhone'=>'Home_Phone',	'OtherPhone'=>'Other_Phone',	'BillingStreet1'=>'Billing_Street1'	,'BillingStreet2'=>'Billing_Street2'	,'BillingCity'=>'Billing_City'	,'BillingState'=>'Billing_State'	,'BillingZipCode'=>'Billing_Zip_Code'	,'BillingCountry'=>'Billing_Country',	'DateofBirth'=>'Date_of_Birth',	'CreatedBy'=>'Created_By',	'Description'=>'Description'	,'LastModifiedBy'=>'Last_Modified_By'	,'MailingStreet1'=>'Mailing_Street1'	,'MailingStreet2'=>'Mailing_Street2',	'MailingCity'=>'Mailing_City','MailingState'=>'Mailing_State',	'MailingZipCode'=>'Mailing_Zip_Code'	,'MailingCountry'=>'Mailing_Country',	'CustomerComments'=>'Customer_Comments'	,'EmergencyPhoneNumber'=>'Emergency_Phone_Number',	'LastTriMathlonReg.Date'=>'Last_TriMathlon_Reg_Date',	'ReferralAccount'=>'Referral_Account'	,'AccountRelation'=>'Account_Relation'	,'EmergencyContact'=>'Emergency_Contact'	,'LastModifiedBy'=>'Last_Modified_By'	,'LastModifiedDate'=>'Last_Modified_Date',	'CreatedDate'=>'Created_Date');
				}else  if($fid==2){//lblCenterId                          Center Id
					$createArray=array('GuardianId','FirstName','LastName','LeadId','AccountName','MobilePhone','Email','MailingStreet1','MailingStreet2','City','State','ZipCode','Country','Center','CenterId','BlockedEmails','CreatedDate','EmailOptOut','OtherPhone','CreatedBy','Description','Gender','LastModifiedBy','Phone','Relation','Salutation','LastModifiedDate');
					$makeArray = array('GuardianId'=>'Guardian_Id','FirstName'=>'First_Name','LastName'=>'Last_Name','LeadId'=>'Lead_Id','AccountName'=>'Account_Name','MobilePhone'=>'Mobile_Phone','Email'=>'Email','MailingStreet1'=>'Mailing_Street1','MailingStreet2'=>'Mailing_Street2','City'=>'City','State'=>'State','ZipCode'=>'Zip_Code','Country'=>'Country','Center'=>'Center','CenterId'=>'lblCenterId','BlockedEmails'=>'Blocked_Emails','CreatedDate'=>'Created_Date','EmailOptOut'=>'Email_OptOut','OtherPhone'=>'Other_Phone','CreatedBy'=>'Created_By','Description'=>'Description','Gender'=>'Gender','LastModifiedBy'=>'Last_Modified_By','Phone'=>'Phone','Relation'=>'Relation','Salutation'=>'Salutation','LastModifiedDate'=>'Last_Modified_Date');
				}else if($fid==3){
					$createArray=array('pk','pk-descrip','Hints','ixl_pretty_code','ixl_description','ixl_URL');
					$makeArray = array('pk'=>'pk','pk-descrip'=>'pk_descrip','Hints'=>'Hints','ixl_pretty_code'=>'ixl_pretty_code','ixl_description'=>'ixl_description','ixl_URL'=>'ixl_URL');
				}
				$SheetDataKey = array();
				foreach ($allDataInSheet as $dataInSheet) {
					$f=0;
					foreach ($dataInSheet as $key => $value) {
						$value = preg_replace('/\s+/', '', $value);
						
						if (in_array($value, $createArray)) {

							$SheetDataKey[trim($value)] = $key;
							$f=1;
						}
					}
					if($f)break;
				}
				//$data = array_diff_key($makeArray, $SheetDataKey);
				foreach ($makeArray as $key => $value) {
					$flag=0;
					foreach ($SheetDataKey as $key1 => $value1) {
    					if($key==$key1){
    						$flag=1;
    						break;
    					}
					}
					if(!$flag)break;
				}
				if(1){//$flag){
				    $fetchData=array();
					for ($i = 2; $i <= $arrayCount; $i++) {
						if(isset($SheetDataKey["Center"])&&$user['role']){
						$v1=str_replace(" ","",$allDataInSheet[$i][$SheetDataKey["Center"]]);
						$v2=str_replace(" ","",$user['center']);
						//if($i<10)
						
						if($v1!=$v2)continue;
						//echo $v1.",".$v2."<br>";
						}
						$row = array();
						foreach ($makeArray as $key => $field){
						    //echo "testing 1";
						    //echo $SheetDataKey[$key];
							$row[$field]=$allDataInSheet[$i][$SheetDataKey[$key]];}
						$fetchData[]=$row;
					}
					//echo $user;
					$data['employeeInfo'] = $fetchData;
					//echo count($fetchData);
					$this->import->importData("tbl_{$fname[$fid]}",$fetchData,$user['role'],$user['center']);

				} else {
					$this->view['error'] = "Please import correct file";
					redirect(URL_PATH."administrator/excelimport");
					exit();
				}
			}else{
				$this->view['error'] = "Please select file";
				redirect(URL_PATH."administrator/excelimport");
				exit();
			}
			redirect(URL_PATH."administrator/excelimport");
		}

		public function adduser(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['_user_name'] = $user;
			$this->view['content'] = 'administrator/adduser.php';
			$this->view['instructordata'] = $this->import->getDataList("tbl_account");
			$this->view['parentdata'] = $this->import->getDataList("tbl_guardian");
			$this->load->view('container.php', $this->view);
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
			if(isset($_POST['selcenter']))$center=$_POST['selcenter'];
			$this->view['smtpdata']=$this->import->getDataList("tbl_localsmtp",array("center"=>$center));
			$this->view['ipdata']=$this->import->getDataList("tbl_ipinterlock",array("center"=>$center));
			$this->view['selcenter']=$center;
			$this->view['centerdata']="";
			if($user['role']==0){
				foreach($this->import->getDataList("tbl_localsmtp") as $r){
					$this->view['centerdata'].=($this->view['centerdata']==""?"":"###").$r['center'];
				}
        		$this->view['superdata']=array();
    			foreach(explode("###",$this->view['centerdata']) as $r){
    			    $r=str_replace(' ','',$r);
    				$st=$this->import->db->query("select count(*) as cnt from tbl_student where replace(center,' ','')='{$r}'")->result_array();
			        $ste=$this->import->db->query("select count(*) as cnt from tbl_student where replace(Enrollment_Status,' ','')='Enrolled' and replace(center,' ','')='{$r}'")->result_array();
    				$s=$this->import->getDataList("tbl_arshia",array('center'=>$r));
    				if(!count($s)){
    				    $this->import->db->insert("tbl_arshia",array('center'=>$r,'active0'=>1,'active1'=>1,'active2'=>1,'active3'=>1,'sending'=>1,'overhead'=>""));
    				}
    				$this->import->db->update("tbl_arshia",array('enrolled'=>$st[0]['cnt'],'enrolled1'=>$ste[0]['cnt']),array('center'=>$r));
    				$s=$this->import->getDataList("tbl_arshia",array('center'=>$r));
    			    $this->view['superdata'][$r]=$s[0];
    			}
			}else{
				foreach($this->import->getDataList("user",array("email"=>$user['email'])) as $r){
					$this->view['centerdata'].=($this->view['centerdata']==""?"":"###").$r['center'];
				}
			}
			$this->view['active_tab']=1;
			if(isset($_POST['active_tab']))$this->view['active_tab']=$_POST['active_tab'];
			$this->load->view('container.php', $this->view);
		}
		public function smtpsave(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$table="tbl_localsmtp";
			$Fd=array(
				'smtp_host'=>$_POST['host'],
				'smtp_user'=>$_POST['user'],
				'smtp_port'=>$_POST['port'],
				'from_'=>$_POST['frome'],//$user['email'],
				'smtp_pass'=>$_POST['pass'],
				'sms_number'=>$_POST['number'],
				'sms_sid'=>$_POST['sid'],
				'sms_token'=>$_POST['token'],
				'sms_flag'=>$_POST['sflag']
			);
			$where=array('center'=>$_POST['center']);
			if(count($this->import->getDataList($table,$where))){
				$this->import->db->update($table,$Fd,$where);
			}else{
				$Fd['center']=$where['center'];
				$this->import->db->insert($table,$Fd);
			}
			echo "1";
		}
		public function submituser(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$this->view['_user_name'] = $user;
			$this->form_validation->set_rules('r_username', 'Username', 'required');
			$this->form_validation->set_rules('r_password', 'Password', 'required');
			$this->form_validation->set_rules('r_email', 'Email', 'required');
			$this->form_validation->set_rules('r_repeatpwd', 'Repeatpwd', 'required');
			if (0&&$this->form_validation->run() == FALSE)
			{
				$result['error'] = "1";
				$result['msg'] = "Please fill all fields.";
			}
			else
			{
				//if(count($this->import->getDataList("user",array("name"=>$_POST['r_username'])))>0){//registed user name
			    //exit(json_encode(array("error"=>"2","msg"=>"Please fill name field again")));
				//}
				if(count($this->import->getDataList("user",array("email"=>$_POST['r_email'],"role"=>$_POST['r_role'],"name"=>$_POST['r_username'],"center"=>$_POST['center'])))>0){//registed user name
					exit(json_encode(array("error"=>"3","msg"=>"Please fill email field again.")));
				}
				$this->load->model('User_Model', 'user');
				if($this->user->userRegister($_POST)){
					$result['error'] = "0";
					$result['msg'] = "Success";
				}else{
					$result['error'] = "4";
					$result['msg'] = "Invalid user";
				}
			}
			echo json_encode($result);			
		}

		public function setuser(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			
			$id="";
			$role="";
			if(isset($_POST['id']))$id=$_POST['id'];
			if(isset($_POST['role']))$role=$_POST['role'];
			$this->load->model('User_Model', 'user');
			if($id!=""){
				if($role=="1")$this->user->db->update('user', array("state"=>"1"),array("id"=>$id));
				else if($role=="2")$this->user->db->update('user', array("state"=>"2"),array("id"=>$id));
				else if($role=="3")$this->user->db->delete('user', array("id"=>$id));
			}
			//redirect(URL_PATH."administrator/viewuser");
		}
		
		public function setiplock(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			
			$id="";
			if(isset($_POST['id']))$id=$_POST['id'];
			$this->load->model('User_Model', 'user');
			if($id!=""){
				$this->user->db->query("update user set ip_lock=1-ip_lock where id='{$id}'");
				echo 1;
			}
			echo 0;
		}
		
		public function setipaddress(){
			$user = $this->session->userdata(USER_INFO);
			if(!isset($user)){
                redirect(URL_PATH);
            }
			$res=0;
			$fd=array("center"=>$_POST['center'],"ip"=>$_POST['ip']);
			if($_POST['flag']==1)$this->import->db->delete("tbl_ipinterlock",$fd);
			else if($_POST['flag']==0){
			    if($this->import->getDataList("tbl_ipinterlock",$fd))$res=1;
			    else $this->import->db->insert("tbl_ipinterlock",$fd);
			}
			echo $res;
		}
		
		public function activesave(){
			$field=explode(",","active0,active1,active2,active3,sending,overhead");
			$sql="update tbl_arshia set ";
			if($_POST['flag']<5)$sql.="{$field[$_POST['flag']]}=1-{$field[$_POST['flag']]}";
			else $sql.="{$field[$_POST['flag']]}='{$_POST['value']}'";
			$sql.=" where center='{$_POST['center']}'";
		    $this->import->db->query($sql);
			echo 1;
		}
		
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		function rstemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_rs.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>'SA_SAMPLE'));
			foreach($templatedata as $row){$row['textx']=str_replace("<br>","\n",$row['textx']);
				$this->view['templatedata'][$row['typex']]=$row;
			}
			$this->load->view('container.php', $this->view);
		}
		function rmtemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_rm.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>"SA_SAMPLE"));
			$sessiondata=$this->import->getDataList("tbl_session",array(),array("datex desc"));
			foreach($templatedata as $row){$row['textx']=str_replace("<br>","\n",$row['textx']);
				if($row['typex']==7)$this->view['templatedata'][$row['typex']][]=$row;
				else if($row['typex']==0)$this->view['templatedata'][$row['typex']][]=$row;
				else $this->view['templatedata'][$row['typex']]=$row;
			}
			date_default_timezone_set('America/New_York');
			$this->view['sessiondata']=array(
				"studentx"=>"Arshia",
				"studentidx"=>"",
				"datex"=>date("Y-m-d"),
				"timex"=>"",
				"quiz1x"=>"","quiz2x"=>"","quiz3x"=>"","quiz4x"=>"","quiz5x"=>"","quiz6x"=>"","quiz7x"=>"","quiz8x"=>"","quiz9x"=>"","quiz10x"=>"",
				"quiz1xx"=>"","quiz2xx"=>"","quiz3xx"=>"","quiz4xx"=>"","quiz5xx"=>"","quiz6xx"=>"","quiz7xx"=>"","quiz8xx"=>"","quiz9xx"=>"","quiz10xx"=>"",
				"topic1x"=>"","topic2x"=>"","topic3x"=>"","topic4x"=>"","topic5x"=>"","topic6x"=>"","topic7x"=>"","topic8x"=>"","topic9x"=>"","topic10x"=>"",
				"comment1x"=>"","comment2x"=>"","comment3x"=>"","comment4x"=>"","comment5x"=>"","comment6x"=>"","comment7x"=>"","comment8x"=>"","comment9x"=>"","comment10x"=>"",
				"sign1x"=>"","sign2x"=>"","sign3x"=>""
			);
			if(count($sessiondata)>0)$this->view['sessiondata']=$sessiondata[0];
			$this->load->view('container.php', $this->view);
		}
		function hmtemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_hm.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>"SA_SAMPLE"));
			foreach($templatedata as $row){$row['textx']=str_replace("<br>","\n",$row['textx']);
				$this->view['templatedata'][$row['typex']]=$row;
			}
			$this->load->view('container.php', $this->view);
		}
		function extemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_ex.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>"SA_SAMPLE"));
			foreach($templatedata as $row){$row['textx']=str_replace("<br>","\n",$row['textx']);
				$this->view['templatedata'][$row['typex']]=$row;
			}
			$this->load->view('container.php', $this->view);
		}
		function hstemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_hs.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>"SA_SAMPLE"));
			foreach($templatedata as $row){$row['textx']=str_replace("<br>","\n",$row['textx']);
				$this->view['templatedata'][$row['typex']]=$row;
			}
			$this->load->view('container.php', $this->view);
		}
		function imtemplate(){$this->view['_user_location']="Sample";
			//$this->view['_user_name']=$this->_user_name;
			$this->view['content'] = 'instructor/template_im.php';
			$templatedata = $this->import->getDataList("tbl_template",array('center'=>"SA_SAMPLE"));
			foreach($templatedata as $row){
			    $row['textx']=str_replace("<br>","\n",$row['textx']);
				if($row['typex']==7)$this->view['templatedata'][$row['typex']][]=$row;
				else if($row['typex']==0)$this->view['templatedata'][$row['typex']][]=$row;
				else $this->view['templatedata'][$row['typex']]=$row;
			}
			//$this->view['locationdata'] = $this->import->db->query("select * from tbl_student_view ")->result_array();;
			$locationdata = $this->import->getDataList("tbl_student_view");
			foreach($locationdata as $row){
				$loc=str_replace(" ","",trim($row['Center']));
				if(!isset($this->view['locationdata'][$loc]))$this->view['locationdata'][$loc]=0;
				$this->view['locationdata'][$loc]++;
			}
			$this->load->view('container.php', $this->view);
		}
		public function saveTemplate(){
		    $nowuser = $this->session->userdata(USER_INFO);
			if(!isset($nowuser)){
                redirect(URL_PATH);
			}
		    $templatedata = $this->import->getDataList("tbl_template",array('typex'=>$_POST['type'],'center'=>"SA_SAMPLE"));
		    $_POST['body']=str_replace("\n","<br>",$_POST['body']);
			if(count($templatedata)>0){
				$this->import->db->where('typex', $_POST['type']);
				$this->import->db->where('center',"SA_SAMPLE");
				echo $result['error']=$this->import->db->update("tbl_template",array('textx'=>$_POST['body'],'authorx'=>$nowuser['name']));
			}else{
				echo $this->db->insert("tbl_template",array('textx'=>$_POST['body'],'authorx'=>$nowuser['name'],'typex'=>$_POST['type'],'center'=>"SA_SAMPLE"));
			}
		}
	}
	




