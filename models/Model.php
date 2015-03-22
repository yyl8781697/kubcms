<?php

	require_once(ROOT_PATH."/core/db/mysqli_helper.php");
	require_once(ROOT_PATH."/config/config.php");
	
	/**
	*model层的基类
	*/
	class Model{

		//数据库操作类
		public $db;
		//操作表的名称 可以再子类的构造方法中重写（要重新调用父类的构造方法）
		protected $tb_name;
		//操作表的主键 可以再子类的构造方法中重写（要重新调用父类的构造方法）
		protected $primary_key;
		//表的前缀
		private $prefix="";

		public function __construct()
		{
			$db_config=array(
				//数据库主机
				"db_host"=>DB_HOST,
				//数据库用户名
				"db_username"=>DB_USERNAME,
				//数据库用户密码
				"db_password"=>DB_PASSWORD,
				//数据库名称
				"db_name"=>DB_NAME
			);
			//var_dump($db_config);
			$this->prefix="kub_";
			$this->db=new mysqli_helper($db_config);
			$this->tb_name=$this->prefix.get_class($this);
			$this->primary_key="id";
		}


		/**
		*将数据插入数据库
		*@param array $array 需要插入数据的键值对
		*@return boolean 操作成功，返回true 否则，返回false
		*/
		public function insert($array='')
		{
			$flag=false;
			if($this->check_valid_array($array))
			{
				//取出键值对
				foreach ($array as $key => $value) {
					$keys[]=$key;
					$placeholder[]="?";
					$values[]=$value;
				}
				$sql="insert into ".$this->tb_name;
				$sql.="(".implode(",",$keys).") ";
				$sql.="values(".implode(",", $placeholder).")";

				//echo $sql;
				//var_dump($values);

				if($this->db->stmt_query($sql,$values))
				{
					$flag=true;
				}
			}
			return $flag;
		}

		/**
		*更新数据
		*@param array $array 需要更新的数组
		*@return boolean 操作成功，返回true 否则，返回false
		*/
		public function update($array,$where='')
		{
			$flag=false;
			if($this->check_valid_array($array))
			{
				
				$sql="update $this->tb_name set ";
				$i=0;
				$values=array();
				//拼接更新的那段sql
				foreach ($array as $key => $value) {
					if($i!=0)
					{
						$sql.=", ";
					}
					$sql.=$key."=? ";
					$i++;
					$values[]=$value;
				}
				$sql.=empty($where)?"":$where;
				if($this->db->stmt_query($sql,$values))
				{
					$flag=true;
				}
			}
			return $flag;
		}

		/**
		*根据主键进行更新
		*@param array $array 需要更新的数组
		*@param mixed $key 主键的值
		*@return boolean 操作成功，返回true 否则，返回false
		*/
		public function update_by_key($array,$key)
		{
			//$array[$this->primary_key]=$key;
			//$where=" where $this->primary_key=?";
			$where=" where $this->primary_key=$key";
			return $this->update($array,$where);
		}

		/**
		*根据主键删除一条记录
		*@param mixed $id 表的主键
		*@return boolean 操作成功，返回true 否则，返回false
		*/
		public function delete_by_key($id)
		{
			$flag=false;
			if(isset($id))
			{
				$sql="delete from $this->tb_name where $this->primary_key=?";
				$values[]=$id;
				if($this->db->stmt_query($sql,$values))
				{
					$flag=true;
				}
			}
			return $flag;
		}

		/**
		*批量删除
		*@param array $ids 要删除的id集合 数组
		*@return boolean
		*/
		public function delete_by_keys($arr_id)
		{
			$flag=false;
			if(isset($arr_id) && is_array($arr_id))
			{
				$ids=implode(",",$arr_id);
				$sql="delete from $this->tb_name where $this->primary_key in($ids)";
				
				if($this->db->stmt_query($sql))
				{
					$flag=true;
				}
			}
			return $flag;
		}

		/**
		*根据主键ID的值查询 
		* @param mixed $primary_val 主键的值 必需
		* @param string  $field 所需查询的字段 默认*
		* @return mixed 如果field为*或者多个字段 返回一行 如果field为单个字段 则只返回一个值
		*/
		public function fetch_by_key($primary_val,$field="*")
		{
			$sql="select $field from $this->tb_name where $this->primary_key=$primary_val";
			if($field=="*" || strpos($field,","))
			{
				return $this->db->fetch_one($sql);
			}else{
				//返回首行首列
				return $this->db->fetch_scalar();
			}
		}

		/**
		*查询 
		*@param array $array 查询的条件 根据建值对来  只能实现and 的拼接
		*@param string $field=* 需要查询的字段 默认*
		*@param string $order=* 查询结果排序
		*@return array
		*/
		public function fetch_data($array=array(),$field="*",$order='')
		{
			$sql="select $field from $this->tb_name where 1=1 ";
			$params=array();
			if($this->check_valid_array($array))
			{
				foreach ($array as $key => $value) {
					$sql.="and $key = ? ";
					$params[]=$value;
				}
			}

			//echo $sql;
			if(!empty($order))
			{
				$sql.=$order;
			}
			return $this->db->stmt_fetch($sql,$params);
		}

		/**
		*分页查询 只能查询单个表
		*@param int $page_index=1 当前页码
		*@param int $page_size=15 每页数目
		*@param string $field=* 查询的字段
		*@return array
		*/
		public function fetch_pager($page_index=1,$page_size=15,$field="*")
		{
			$sql="select $field from $this->tb_name ";
			return $this->db->fetch_pager($sql,$page_index,$page_size);
		}


		/**
		*检查所传递的数组是否有效
		*/
		private function check_valid_array($array)
		{
			return isset($array)&&!empty($array)&&is_array($array)&&count($array);
		}
	}