<?php
	
	require_once("Model.php");

	class User extends Model{

		protected $primary_key;

		public function __construct()
		{
			parent::__construct();
			$this->primary_key="userid";
		}

		public static function get_instance()
		{
			return new User();
		}

		/**
		*检测是否能够登陆
		*@param string $useraccount 用户账号
		*@param string $password 用户密码
		*@return boolean 如果能登陆，返回true，
		*/
		public function check_login($useraccount,$password)
		{
			$account=array("useraccount"=>$useraccount,"password"=>md5($password));
			//根据账号密码查询用户信息
			$user_info=parent::fetch_data($account);
			//var_dump($user_info);
			if(empty($user_info))
			{
				return false;
			}else{

				$_SESSION["userid"]=$user_info[0]["userid"];
				$_SESSION["useraccount"]=$user_info[0]["useraccount"];
				$_SESSION["username"]=$user_info[0]["username"];
				$_SESSION["level"]=$user_info[0]["Level"];
				$_SESSION["permission"]=$user_info[0]["Permission"];
				return true;
			}
		}
	}