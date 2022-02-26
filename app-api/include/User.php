<?php
require 'DBclass.php';
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$file = basename($_SERVER['PHP_SELF']);
if($file == "reset.php"){
}elseif($file=="generateChecksum.php"){
}else{
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
}
class User
{
    protected $db;
    public function __construct()
		{
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}
	public function escapeString($var) {
		$result = $this->db->real_escape_string($var);
		return $result;
	}
	 /* Get result from sql query */
    public function getResult($sql) {
		global $rowCount;
		$resultArray = array();
		$result = $this->db->query($sql);
		$rowCount = $result->num_rows;
		while($arrayResult = $result->fetch_assoc()) {
			$resultArray[] = $arrayResult;	
		}
		return $resultArray;
	}
	
	/** Insert data in to database***/
	public function insertQuery($colArray,$tableName) {
		global $dbError;
		$dbError = true;
		$query = "";
		$query = 'INSERT INTO '.$tableName.' ('.implode(',',array_keys($colArray)).') values(\''.implode('\',\'',$colArray).'\')';
		$result = $this->db->query($query);// or die($this->db->error);
		$last_id = $this->db->insert_id;
		return $last_id;
	}
	/** Insert data in to database***/
	public function QueryInsert($query) {
		
		$result = $this->db->query($query);// or die($this->db->error);
		$last_id = $this->db->insert_id;
		return $last_id;
	}
	
	/*** Update data in database ***/
	public function updateQuery($colArray,$tableName,$id) {
		global $dbError;
		$dbError = true;
		$query = "";
		$update = array();
		foreach($colArray as $col => $value) {
			$update[] = $col."='".$value."'";
		}
		$query = "UPDATE $tableName SET ".implode(",",$update)." WHERE ".strtoupper($tableName)."_ID = ".$id;
		$this->db->query($query) or die($this->db->error);
	}
	
	/** Delete recored from table as per table **/
	public function QueryDelete($table,$tab_id) {
		$query = "DELETE FROM $table WHERE ".strtoupper($table)."_ID = ".$tab_id;
		$this->db->query($query) or  die($this->db->error);
	}
	
	/** Get Column of a array***/
	public function getColumns($tableName) {
		$columnList = array();
		$columnTable = "SHOW COLUMNS FROM $tableName";
		$columnResult = $this->db->query($columnTable) or die($this->db->error);	
		while($columnRow  = $columnResult->fetch_row()){
			$columnList[] = $columnRow[0];
		}
		return $columnList;
	}
	
	/** Get Column value of a array***/
	public function getColumnValues($tableColumns) {
			global $_DATA;	
			$columnValues = array();
			foreach($tableColumns as $k => $v) {
				if(array_key_exists($v, $_POST)) {
					$_DATA[$v] = $_POST[$v];
					 $columnValues[$v]  = addslashes($_POST[$v]);
				}	
			}
			return $columnValues;
		}
	/** Get File Extanion name in small letters */
	public function getExtension($str) {
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
	/** Get City  as per City Id**/
	public function getCity($CITY_ID) {
		$query = "SELECT CITY FROM city WHERE CITY_ID = $CITY_ID";
        $result = $this->db->query($query) or die($this->db->error);
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
       return $CITY = $user_data['CITY'];
	}
	/** Get State as per State Id**/
	public function getState($STATE_ID) {
		$query = "SELECT STATE FROM state WHERE STATE_ID = $STATE_ID";
        $result = $this->db->query($query) or die($this->db->error);
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
       return $STATE = $user_data['STATE'];
	}
	
	/*Custom Echo how much word we want to echo*/
	public function custom_echo($x,$c){
			if(strlen($x)<=$c)
			{
				echo $x;
			}else{
				$y=substr($x,0,$c) . '..';
				echo $y;
			}
	}
	
	public function hashSSHA($password){
		$salt = sha1(rand());
		$salt = substr($salt, 0, 10);
		$encrypted = base64_encode(sha1($password . $salt, true) . $salt);
		$hash = array("salt" => $salt, "encrypted" => $encrypted);
		return $hash;
	}
	
	public function checkhashSSHA($salt, $password){
		$hash = base64_encode(sha1($password . $salt, true) . $salt);
		return $hash;
	}
		
    /*** starting the session ***/
    public function get_session()
    {
        return @$_SESSION['login'];
    }
	/* Logging out a user */
    public function user_logout()
    {
        $_SESSION['login'] = false;
        unset($_SESSION);
		session_destroy();
    }
    
}

//Get city state using ajax
class area
{
	public $dbfunc;
	public function __construct()
		{
			$this->dbfunc = new User();
		}
	/* Get State in Any form field in option drop down*/
	public function getState($state_id){
		$state_query = "select STATE,STATE_ID from state";
		$state_result= $this->dbfunc->getResult($state_query);
		$COUNT_STATE = count($state_result);
		$i=0;
		while($i<$COUNT_STATE) {?>
			<option value="<?php echo @$state_result[$i]['STATE_ID'];?>" <?php if(@$state_result[$i]['STATE_ID']==$state_id){ echo "selected";}?>><?php echo @$state_result[$i]['STATE'];?></option>
		<?php $i++;
		}
	}
	/* Get city in Any form field in after select state */
	public function getCity($city_id){
		$city_query = "select CITY,CITY_ID from city where STATE_ID=$city_id";
		$city_result= $this->dbfunc->getResult($city_query);
		$COUNT_CITY = count($city_result);
		$i=0;
		echo '<option value="">City</option>';
		while($i<$COUNT_CITY) {?>
			<option value="<?php echo @$city_result[$i]['CITY_ID'];?>"><?php echo @$city_result[$i]['CITY'];?></option>
		<?php $i++;
		}
	}
	
	
}
//check new user exits or not
class exits_user{
	public $dbfunc;
	public function __construct()
		{
			$this->dbfunc = new User();
		}
	/* check if a user email is already exits or not with geting table and email id */
	public function check_user_exits($table,$email,$type){
		$email = $this->dbfunc->escapeString($email);
		$table = $this->dbfunc->escapeString($table);
		$query = "select ".strtoupper($table)."_ID from $table where EMAIL='$email' and OAUTH_PROVIDER='$type' ";
		$result= $this->dbfunc->getResult($query);
		$count_row = count($result);
        if ($count_row == 1) {
			//echo "<img src='dist/img/error.png'> <span style='color:red;'>User Already Exits</span><input type='hidden' name='CHECK_EMAIL'>";
            return  true;
        }else{
			//echo "<img src='dist/img/success.png'> <span style='color:green;'> Bingo Available</span><input type='hidden' name='CHECK_EMAIL' value='$email'>";
            return false;
        }
	}
	public function check_edit_user_exits($table,$email,$id){
		$query = "select ".strtoupper($table)."_ID from $table where EMAIL='$email' and ".strtoupper($table)."_ID!=$id";
		$result= $this->dbfunc->getResult($query);
		$count_row = count($result);
        if ($count_row == 1) {
			echo "<img src='dist/img/error.png'> <span style='color:red;'>User Already Exits</span><input type='hidden' name='CHECK_EMAIL'>";
            //return true;
        }else{
			echo "<img src='dist/img/success.png'> <span style='color:green;'> Bingo Available</span><input type='hidden' name='CHECK_EMAIL' value='$email'>";
            //return false;
        }
	}
	
}
//Misc Function
class miscfunc
{
	public $dbfunc;
	public function __construct()
		{
			$this->dbfunc = new User();
		}
	//forget Password for user
	public function resetPassword($email,$table)
    {
		$email = $this->dbfunc->escapeString($email);
		$table = $this->dbfunc->escapeString($table);
		$query = "SELECT ".strtoupper($table)."_ID FROM $table where EMAIL='".$email."' and OAUTH_PROVIDER='normal'  LIMIT 1";
        $result = $this->dbfunc->getResult($query); 
        if(count($result)==1)
        {
			global $link;
			$field = strtoupper($table)."_ID";
			$user_id = $result[0][$field];
			$id = base64_encode($user_id);
			$colArray['TOKEN'] = md5(uniqid(rand()));
            $this->dbfunc->updateQuery($colArray,$table,$user_id);
            $to=$email;
			$subject="Forget Password for Photo Ki Dukan";
            $from = 'info@photodukan.com';
			$code = $colArray['TOKEN'];
		//	$check = base64_encode($table);
			$body="
					Hello , $email
				   <br /><br />
				   We got request for reset your password, if you do this then just click the following link to reset your password, if not just ignore  this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='$link/reset.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				";
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers);
			return true;
        }
        else
        {
          return false;
        }
    }
	//reset password authenticate if key and id match or not
	public function auth_key($id,$table,$code)
    {
		$id = $this->dbfunc->escapeString($id);
		$table= $this->dbfunc->escapeString($table);
		$code= $this->dbfunc->escapeString($code);
        $query = "SELECT ".strtoupper($table)."_ID from $table WHERE ".strtoupper($table)."_ID='$id' and TOKEN='$code'";
        $result = $this->dbfunc->getResult($query);
        $count_row = count($result);
        if ($count_row == 1) {
            return true;
        }else{
            return false;
        }
    }
}

//Team login Registeration
class AppUser
{
	protected $dbfunc;
	public function __construct()
		{
			$this->dbfunc = new User();
		}
	//check user login
	public function check_login($EMAIL, $PASSWORD)
    {
		$EMAIL = $this->dbfunc->escapeString($EMAIL);
		$PASSWORD =$this->dbfunc->escapeString($PASSWORD);
		$query = "SELECT USERS_ID,UNIQUE_ID,USER_NAME,EMAIL,PASSWORD,SALT from users WHERE EMAIL='$EMAIL' and OAUTH_PROVIDER='normal'";
        $result = $this->dbfunc->getResult($query);
        $count_row = count($result);
		if($count_row > 0){
			$result = $result[0];
			$salt = $result['SALT'];
			$encrypted_password = $result['PASSWORD'];
			$hash = $this->dbfunc->checkhashSSHA($salt, $PASSWORD);
			if($encrypted_password == $hash){
				return $result;
			}
			else{
				return false;
			}
		}
    }
	//New Google login
	public function google_login($user_name, $email, $auth_id, $imgData)
    {
		$user_name = $this->dbfunc->escapeString($user_name);
		$email = $this->dbfunc->escapeString($email);
		$auth_id = $this->dbfunc->escapeString($auth_id);
		$UNIQUE_ID = rand().md5(rand().uniqid('', true));
		$join_date = date('d-m-Y');

			$result = $this->dbfunc->QueryInsert("INSERT INTO users(UNIQUE_ID,USER_NAME,EMAIL,PHOTO,OAUTH_ID,OAUTH_PROVIDER,JOINING_DATE)VALUES('$UNIQUE_ID','$user_name','$email','$imgData','$auth_id','google','$join_date')");
		if($result){
				$result = $this->dbfunc->getResult("SELECT * FROM users WHERE USERS_ID = $result");
				return $result;
			}
			else{
				return false;
			}
    }
	//Already Google login
	public function update_google_login($user_name, $email, $auth_id, $id, $imgData)
    {
		$user_name = $this->dbfunc->escapeString($user_name);
		$email = $this->dbfunc->escapeString($email);
		$auth_id = $this->dbfunc->escapeString($auth_id);
		
		$UNIQUE_ID = rand().md5(rand().uniqid('', true));
	//	$colArray['UNIQUE_ID']= $UNIQUE_ID;
		$colArray['USER_NAME'] = $user_name;
		$colArray['EMAIL']=$email;
		$colArray['MOBILE']="";
		$colArray['PHOTO']=$imgData;
		$colArray['OAUTH_ID']=$auth_id;
		$colArray['OAUTH_PROVIDER']="google";
		$colArray['JOINING_DATE']=date('d-m-Y');
			
		$result = $this->dbfunc->updateQuery($colArray,'users',$id);
		
		$result = $this->dbfunc->getResult("SELECT * FROM users WHERE USERS_ID=$id");
		return $result;
    }
	//New facebook login
	public function facebook_login($user_name, $email, $auth_id, $imgData)
    {
		$user_name = $this->dbfunc->escapeString($user_name);
		$email = $this->dbfunc->escapeString($email);
		$auth_id = $this->dbfunc->escapeString($auth_id);
		$UNIQUE_ID = rand().md5(rand().uniqid('', true));
		$join_date = date('d-m-Y');
			$result = $this->dbfunc->QueryInsert("INSERT INTO users(UNIQUE_ID,USER_NAME,EMAIL,PHOTO,OAUTH_ID,OAUTH_PROVIDER,JOINING_DATE)VALUES('$UNIQUE_ID','$user_name','$email','$imgData','$auth_id','facebook','$join_date')");
		if($result){
				$result = $this->dbfunc->getResult("SELECT * FROM users WHERE USERS_ID = $result");
				return $result;
			}
			else{
				return false;
			}
    }
	//Already facebook login
	public function update_facebook_login($user_name, $email, $auth_id, $id, $imgData)
    {
		$user_name = $this->dbfunc->escapeString($user_name);
		$email = $this->dbfunc->escapeString($email);
		$auth_id = $this->dbfunc->escapeString($auth_id);
		$UNIQUE_ID = rand().md5(rand().uniqid('', true));
	//	$colArray['UNIQUE_ID']= $UNIQUE_ID;
		$colArray['USER_NAME'] = $user_name;
		$colArray['EMAIL']=$email;
		$colArray['MOBILE']="";
		$colArray['PHOTO']=$imgData;
		$colArray['OAUTH_ID']=$auth_id;
		$colArray['OAUTH_PROVIDER']="facebook";
		$colArray['JOINING_DATE']=date('d-m-Y');
			
		$result = $this->dbfunc->updateQuery($colArray,'users',$id);
		
		$result = $this->dbfunc->getResult("SELECT * FROM users WHERE USERS_ID=$id");
		return $result;
    }
	//register User app
	public function regUser($user_name, $email, $password){
		$user_name = $this->dbfunc->escapeString($user_name);
		$email = $this->dbfunc->escapeString($email);
		$password = $this->dbfunc->escapeString($password);
		$UNIQUE_ID = rand().md5(rand().uniqid('', true));
		$hash = $this->dbfunc->hashSSHA($password);
		$encrypted_password = $hash["encrypted"];
		$salt = $hash["salt"];
		$join_date = date('d-m-Y');
		$result = $this->dbfunc->QueryInsert("INSERT INTO users(UNIQUE_ID, USER_NAME, EMAIL, PASSWORD, OAUTH_PROVIDER, SALT, JOINING_DATE)VALUES('$UNIQUE_ID', '$user_name', '$email', '$encrypted_password', 'normal', '$salt', '$join_date')");
		if($result){
			$result = $this->dbfunc->getResult("SELECT * FROM users WHERE USERS_ID = $result");
			return $result;
		}else{
			return false;
		}
	}
	public function checkUserToken($token){
		$token = $this->dbfunc->escapeString($token);
		$table = "users";
		$query = "select ".strtoupper($table)."_ID from $table where UNIQUE_ID='$token' ";
		$result= $this->dbfunc->getResult($query);
		$count_row = count($result);
        if ($count_row == 1) {
            return true;
        }else{
            return false;
        }
	}
	function getImgType($filename) {
		$handle = @fopen($filename, 'r');
		if (!$handle)
			throw new Exception('File Open Error');
			$types = array('jpeg' => "\xFF\xD8\xFF", 'gif' => 'GIF', 'png' => "\x89\x50\x4e\x47\x0d\x0a", 'bmp' => 'BM', 'psd' => '8BPS', 'swf' => 'FWS');
			$bytes = fgets($handle, 8);
			$found = 'other';
			foreach ($types as $type => $header) {
				if (strpos($bytes, $header) === 0) {
					$found = $type;
					break;
				}
			}
		fclose($handle);
		return $found;
	}
	//Get medical info with medical user id
	/* public function getTeamInfo($teamid)
    {
		$query = "SELECT * FROM users_detail where USERS_DETAIL_ID=$teamid LIMIT 1";
        $result = $this->dbfunc->getResult($query);
		return $result[0];
    }
	//Get Department using Department_ID
	 public function getDepartment($DEPARTMENT_ID){
		$query = "select DEPARTMENT_NAME from department where DEPARTMENT_ID=$DEPARTMENT_ID";
		$result= $this->dbfunc->getResult($query);
		return $result[0]['DEPARTMENT_NAME'];
	}
	// Get Department list in dropdown with sub category
	public function DepartmentList($DEPARTMENT_ID){
		$query = "select DEPARTMENT_ID,DEPARTMENT_NAME from department where ACTIVE='Y' and PARENT_ID=0";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		$i=0;
		while($i<$count_result) {?>
				<option style="font-weight:bold!important;" value="<?php echo @$result[$i]['DEPARTMENT_ID'];?>" <?php if(@$result[$i]['DEPARTMENT_ID']==$DEPARTMENT_ID){ echo "selected";}?>><?php echo @$result[$i]['DEPARTMENT_NAME'];?></option>
				<?php 
					$dquery = "select DEPARTMENT_ID,DEPARTMENT_NAME from department where ACTIVE='Y' and PARENT_ID='".$result[$i]['DEPARTMENT_ID']."' ";
					$dresult= $this->dbfunc->getResult($dquery);
					$count_dresult = count($dresult);
					$n=0;
					while($n<$count_dresult) {?>
						<option id="mytes" value="<?php echo @$dresult[$n]['DEPARTMENT_ID'];?>" <?php if(@$dresult[$n]['DEPARTMENT_ID']==$DEPARTMENT_ID){ echo "selected";}?>><?php echo @$dresult[$n]['DEPARTMENT_NAME'];?></option>
			<?php $n++;	}
			$i++;
		}
	}
	// Get Department list in dropdown
	public function DepartmentListNo($DEPARTMENT_ID){
		$query = "select DEPARTMENT_ID,DEPARTMENT_NAME from department where ACTIVE='Y' and PARENT_ID=0";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		$i=0;
		while($i<$count_result) {?>
				<option value="<?php echo @$result[$i]['DEPARTMENT_ID'];?>" <?php if(@$result[$i]['DEPARTMENT_ID']==$DEPARTMENT_ID){ echo "selected";}?>><?php echo @$result[$i]['DEPARTMENT_NAME'];?></option>
		<?php 
			$i++;
		}
	}
	//Get position using POSITION_ID
	 public function getPosition($POSITION_ID){
		$query = "select POSITION_NAME from position where POSITION_ID=$POSITION_ID";
		$result= $this->dbfunc->getResult($query);
		return $result[0]['POSITION_NAME'];
	}
	// Get Position list in dropdown
	public function PositionList($POSITION_ID){
		$query = "select POSITION_ID,POSITION_NAME from position where ACTIVE='Y'";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		$i=0;
		while($i<$count_result) {?>
			<option value="<?php echo @$result[$i]['POSITION_ID'];?>" <?php if(@$result[$i]['POSITION_ID']==$POSITION_ID){ echo "selected";}?>><?php echo @$result[$i]['POSITION_NAME'];?></option>
		<?php $i++;
		}
	}
	
	//get employee count
	public function countEmployee($d_id){
		$query = "SELECT USERS_DETAIL_ID FROM users_detail where ACTIVE = 'Y' and DEPARTMENT_ID=$d_id";
		$result= $this->dbfunc->getResult($query);
		return count($result);
	}
	
	//get employee image
	public function imageEmployee($d_id){
		$query = "SELECT USERS_DETAIL_ID FROM users_detail where ACTIVE = 'Y' and DEPARTMENT_ID=$d_id";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		while($i<$count_result) {?>
			<img src="dist/img/cstuser.png">
		<?php $i++;}
	}
	
	
	// Get Team list in dropdown
	public function TeamList($teamid){
		$query = "select USERS_DETAIL_ID,F_NAME,LAST_NAME from users_detail where ACTIVE='Y'";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		$i=0;
		while($i<$count_result) {?>
			<option value="<?php echo @$result[$i]['USERS_DETAIL_ID'];?>" <?php if(@$result[$i]['USERS_DETAIL_ID']==$teamid){ echo "selected";}?>><?php echo @$result[$i]['F_NAME']." ".@$result[$i]['LAST_NAME'];?></option>
		<?php $i++;
		}
	}
	
	// Get client list in dropdown
	public function ClientList($client_id){
		$query = "select CLIENT_ID,C_NAME from client where ACTIVE='Y'";
		$result= $this->dbfunc->getResult($query);
		$count_result = count($result);
		$i=0;
		while($i<$count_result) {?>
			<option value="<?php echo @$result[$i]['CLIENT_ID'];?>" <?php if(@$result[$i]['CLIENT_ID']==$client_id){ echo "selected";}?>><?php echo @$result[$i]['C_NAME'];?></option>
		<?php $i++;
		}
	}
	//Get team member detail using USers detail id
	 public function getMemberDetail($uid){
		$query = "select * from users_detail where USERS_DETAIL_ID=$uid";
		$result= $this->dbfunc->getResult($query);
		return $result[0];
	}
	
	//Get client detail using USers client id
	 public function getClientDetail($cid){
		$query = "select * from client where CLIENT_ID=$cid";
		$result= $this->dbfunc->getResult($query);
		return $result[0];
	} */
	
	public function get_session()
    {
        return $_SESSION['login'];
    }
	
}
