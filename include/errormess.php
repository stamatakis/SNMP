<?PHP
//require_once("./include/dbcontroller.php");


class errorMess
{
	var $message;

	function errorMess(){
		$this->message = "";
	}
	function setMess($set){
		$this->message = $set;
	}
	function getMess(){
		return $this->message;
	}
	function checkreg(){
		
		// username and password sent from form 
		$myuid=$_POST['uid']; 
		$mypassword=$_POST['password']; 
		$myname=$_POST['name'];
		$myemail=$_POST['email'];

		// To protect MySQL injection (more detail about MySQL injection)
		$myuid = stripslashes($myuid);
		$mypassword = stripslashes($mypassword);
		
		if(strlen($myname) == 0 ){
			$emess = "Please enter a name";
			$this->setMess($emess);
			return false;
		}
		if(strlen($myemail) == 0 ){
			$emess = "Please enter an email";
			$this->setMess($emess);
			return false;
		}
		if(strlen($myuid) == 0 ){
			$emess = "Please enter a uid";
			$this->setMess($emess);
			return false;
		}
		if(strlen($mypassword) == 0 ){
			$emess = "Please enter a password";
			$this->setMess($emess);
			return false;
		}
		
		if(!preg_match('/[A-Z]/', $mypassword)){
			$emess = "Please use one Uppercase letter for the password";
			$this->setMess($emess);
			return false;
		}
		
		
	}	
		function checklogin(){
		
        
		// username and password sent from form 
		$myuid=$_POST['uid']; 
		$mypassword=$_POST['password']; 
		//$db_handle = new DBController();
        

		// To protect MySQL injection (more detail about MySQL injection)
		//$myuid = stripslashes($myuid);
		//$mypassword = stripslashes($mypassword);
		
	//	$db_handle->setid($myuid);
		$_SESSION['uid'] = $myuid;
		$admin = "624admin";
		$pass = "T1g3r5";
		if(strcmp($admin, $myuid) == 0){
			if(strcmp($pass, $mypassword) == 0){
				header("location:./include/admin.php");
			}
		}
		if(strlen($myuid) == 0 ){
			$emess = "Please enter a uid";
			$this->setMess($emess);
			return false;
		}
		if(strlen($mypassword) == 0 ){
			$emess = "Please enter a password";
			$this->setMess($emess);
			return false;
		}
		

		
           $emess = "uid or password did not match, try again.";
           $this->setMess($emess);
		   return false;
			
}}


?>