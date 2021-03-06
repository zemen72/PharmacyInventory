<?php
require_once('../database/Database.php');
require_once('../interface/iUser.php');
class User extends Database implements iUser {

	public function user_login($username, $password, $usertype)
	{
		$sql = "SELECT *
				FROM user 
				WHERE (user_account = ?
				AND user_pass = ?) AND user_type=?
		";
		return $this->getRow($sql, [$username, $password, $usertype]);
	}//end login_user
	

}//en class User

$user = new User();

/* End of file User.php */
/* Location: .//D/xampp/htdocs/regis/class/User.php */

