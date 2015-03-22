<?php

	error_reporting(7);
	/*
		mysqli的helper类
	*/
	class mysqli_helper{

		//数据库连接的相关配置
		private $db_config=array(
				//数据库主机
				"db_host"=>"127.0.0.1",
				//数据库用户名
				"db_username"=>"root",
				//数据库用户密码
				"db_password"=>"root",
				//数据库名称
				"db_name"=>""
			);

		//数据库实例
		private $mysqli=null;

		/**
		*构造函数：数据库连接相关参数通过
		*/
		public function __construct($config=null)
		{	
			$this->initialize($config);
			$this->mysqli=new mysqli($this->db_config["db_host"],
									 $this->db_config["db_username"],
									 $this->db_config["db_password"],
									 $this->db_config["db_name"]);
			if ($this->mysqli->connect_errno) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}
			$this->mysqli->query("set names utf8");
		}

		/**
		*析构函数：释放对象时关闭数据库连接
		*/
		function __destruct()
		{
			$this->close();
		}

		/**
		*直接获取一个实例
		*/
		public static function getinstance()
		{
			return mysqli_helper();
		}

		/**
		*初始化数据库配置
		*/
		private function initialize($config){
			//如果有新的数据库配置
			if($this->check_valid_array($config)){
                foreach($config as $key=>$val)
                {
                    $this->db_config[$key]=$val;
                }
            }else{
            	//读取定义的全局变量
            	$this->db_config["db_host"]=DB_HOST;
				$this->db_config["db_username"]=DB_USERNAME;
				$this->db_config["db_password"]=DB_PASSWORD;
				$this->db_config["db_NAME"]=DB_NAME;
            }
		}

		
		

		/**
		*获取插入后的最后一个id
		*/
		public function insert_id()
		{
			$id=mysql_insert_id();
			return $id;
		} 

		/**
		*计算记录总数
		*@param string $table 查询的表的名称
		*@param string $field="*" 查询计算的字段
		*@return int 
		*/
		public function count($table,$field="*")
		{
			$sql="select * from $table";
			return $this->query($sql);
		}

		/**
		*仅执行sql语句 这里一般不执行select语句
		*@param string $sql 待执行的sql语句
		*@return mixed
		*/
		public function query($sql)
		{
			$query=$this->mysqli->query($sql) or die($this->mysqli->error);
			return $query;
		}

		/**
		*执行查询记录 返回首行首列
		*@param string $sql待执行的sql语句
		*@return string
		*/
		public function fetch_scalar($sql)
		{
			$record=null;
			$result=$this->query($sql);
			if($result)
			{
				//取得首行首列
				$record=$result->fetch_row();
				$record=$record[0];
				$result->free();
			}
			return $record;
		}

		/**
		*执行查询记录 只查询一条记录
		*@param string $sql待执行的sql语句
		*@param string $type：返回array的存储方式
		*@return array
		*/
		public function fetch_one($sql,$type="assoc")
		{
			$record=array();
			$result=$this->query($sql);
			switch($type)
			{
				case "assoc":$record=$result->fetch_assoc();break;
				case "row":$record=$result->fetch_row();break;
				default :$record=$result->fetch_array(MYSQLI_BOTH);break;
			}
			$result->free();
			return $record;
		}

		/**
		*执行查询记录 查询多条记录
		*@param string $sql待执行的sql语句
		*@param string $type：返回array的存储方式
		*@return array
		*/
		public function fetch_all($sql,$type="assoc")
		{
			$record=array();
			$result=$this->query($sql);
			switch($type)
			{
				case "assoc":
							while($row=$result->fetch_assoc())
							{
								$record[]=$row;
							}
							break;
				case "row":
							while($row=$result->fetch_row())
							{
								$record[]=$row;
							}
							break;
				default :
						while($row=$result->fetch_array(MYSQLI_BOTH))
						{
							$record[]=$row;
						}
						break;
			}
			$result->free();
			return $record;
		}

		/**
		*查询分页
		*@param string $sql 分页的sql语句，普通的即可 like：select * from table
		*@param int page_index=1 当前的页数
		*@param int page_size=15 每页的尺寸
		*@return array key=count key=data
		*/
		public function fetch_pager($sql,$page_index=1,$page_size=15)
		{
			//匹配查询记录数的sql语句
			$sql_count=preg_replace('/select.*from/i','select count(*) as count from',$sql,1);
			
			//得到总记录数
			$count=(int)$this->fetch_scalar($sql_count);

			//页码
			$page_index=(int)$page_index==0?1:$page_index;
			$page_size=(int)$page_size==0?15:$page_size;
			//在sql中查询的起始记录数
			$start_index=($page_index-1)*$page_size;
			$sql_result=$sql." limit $start_index,$page_size";
			$result=$this->fetch_all($sql_result);
			return array('count' =>$count ,'data'=>$result );
		}

		/**
		*执行事务
		*@param array $sql_arr 传递sql语句
		*@return boolean
		*/
		public function transaction($sql_arr)
		{
		 	$flag=false;
		 	//禁止数据库自动提交
		 	$this->mysqli->autocommit(0);
		 	try {
		 		$result=null;
		 		
		 		foreach($sql_arr as $sql)
		 		{
		 			$result=$this->query($sql);
		 			if(!$result)
		 			{
		 				throw new Exception("failed");
		 			}
		 		}
		 		//sql正常执行 事物提交
		 		$flag=true;
		 		$this->mysqli->commit();
		 	} catch (Exception $e) {
		 		//捕获异常 事物回滚
		 		$this->mysqli->rollback();
		 	}
		 	//把数据库提交设置成正常的提交
		 	$this->mysqli->autocommit(1);
		 	return $flag;
		}

		/**
		*stmt参数化查询
		*@param string $sql 需要执行的语句
		*@param array $params=array() 参数数组 只需提供值即可
		*@return boolean
		*/
		public function stmt_query($sql,$params=array())
		{
			$stmt=$this->mysqli->prepare($sql);
			if($this->check_valid_array($params))
			{
				//获取参数的键
				$types =$this->get_param_types($params);
				array_unshift($params,$types);
				//var_dump($params);
				//echo "sql:",$sql,"<br />";
				//绑定参数
				call_user_func_array(array($stmt,"bind_param"),$this->refValues($params));
			}
			
			$flag=$stmt->execute();
			return $flag; 
		}

		/**
		*stmt参数化查询
		*@param string $sql：需要执行的语句
		*@param array $params=array() 参数数组 只需提供值即可
		*@return array
		*/
		public function stmt_fetch($sql,$params=array())
		{
			$stmt=$this->mysqli->prepare($sql);

			if($this->check_valid_array($params))
			{

				//获取参数的键
				$types =$this->get_param_types($params);
				array_unshift($params,$types);
				//绑定参数
				call_user_func_array(array($stmt,"bind_param"),$this->refValues($params));
			}

			$stmt->execute();
			//取得查询表的结构
			$meta=$stmt->result_metadata();
			//定义数据
			$data=array();
			while($field=$meta->fetch_field())
			{
				//数据的名称
				$variables []=&$data[$field->name];
			}

			
			call_user_func_array(array($stmt, 'bind_result'), $variables);
			$i=0;
			while($stmt->fetch())
			{
				foreach ($data as $key => $value) {
					$array[$i][$key]=$value;
				}
				$i++;
			}
			unset($variables,$data);
			$stmt->close();
			return $array;
		}

		/*下面是此类中需要用到的私有函数*/

		/**
		*检查所传递的数组是否有效
		*@return boolean
		*/
		private function check_valid_array($array)
		{
			return isset($array)&&is_array($array)&&count($array);
		}

		/**
		*获得数据库查询中的错误
		*/
		private function error()
		{
			return $this->mysqli-error();
		}

		/**
		*关闭数据库连接
		*/
		private function close()
		{
			if($this->mysqli!=null)
				$this->mysqli->close();
		}

		/**
		*获取参数化的各个类型
		*@param array $params
		*@return array
		*/
		private function get_param_types($params)
		{
			$paramType = "";
			if($this->check_valid_array($params))
			{
				foreach ($params as $p) {
	                if (is_int($p)) {
	                    $paramType.="i";
	                }
	                if (is_double($p) || is_float($p)) {
	                    $paramType.="d";
	                }
	                if (is_string($p)) {
	                    $paramType.="s";
	                }
	            	}
			}
			return $paramType;
            
		}

		/**
		*把数组改为引用的值
		*@return array
		*/
		private function refValues($array){
			//if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
				$refs = array();
				foreach($array as $key => $value)
					$refs[$key] = &$array[$key];
					return $refs;
				//}
			//return $arr;
		}
	}