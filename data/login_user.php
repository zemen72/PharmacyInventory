<?php 
require_once('../class/User.php');

if(isset($_POST['un'])){
	$un = $_POST['un'];
	$up = $_POST['up'];
	$ut = $_POST['ut'];

	$up = md5($up);
	$result = $user->user_login($un, $up, $ut);
	if($result > 0){
		// echo 'succ';
		$return['logged'] = true;
		if($ut==1){
			$return['url'] = "1AAdmin.php";
		}
		else if($ut==2){
			$return['url'] = "2APharmacist.php";
		}
		else if($ut==3){
			$return['url'] = "3ACasher.php";
		}
		
		$_SESSION['logged_id'] = $result['user_id'];
		$_SESSION['logged_type'] = $result['user_type'];
		$_SESSION['uniqid'] = uniqid();
	}else{
		// echo 'fail';
		$return['logged'] = false;
		$return['msg'] = "Invalid Username or Password!";
	}

	echo json_encode($return);

}//end isset


//  made by zemen wondosen 

$user->Disconnect();