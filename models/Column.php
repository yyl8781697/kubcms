<?php
	
	require_once("Model.php");

	class Column extends Model{

		protected $primary_key;

		public function __construct()
		{
			parent::__construct();
			$this->primary_key="colid";
		}

		public static function get_instance()
		{
			return new Column();
		}

		/**
		*获取category类型的 栏目列表
		*/
		public function get_category_column_list()
		{
			$columnlist=parent::fetch_data(array("type"=>"category"),"colid as id,parentid,name as text,type","order by colindex asc");
			$category_column_list=$this->add_category_column($columnlist);
			$no_array=array(array("id"=>0,"text"=>"无","iconCls"=>"icon-folder","checked"=>true));
			return array_merge($no_array,$category_column_list);
		}

		/**
		*获取文章类型的所有 栏目
		*/
		public function get_article_column_list()
		{
			$sql="select colid as id,parentid,name as text,type from $this->tb_name
				 where (type='category' || type='article') order by colindex asc";
			$columnlist=$this->db->fetch_all($sql);
			$article_column_list=$this->add_category_column($columnlist);
			$no_array=array(array("id"=>0,"text"=>"全部","iconCls"=>"icon-folder"));
			return array_merge($no_array,$article_column_list);
		}

		/**
		*获取所有的栏目列表
		*/
		public function get_all_column_list()
		{
			$columnlist=parent::fetch_data(array(),"*","order by colindex asc");
			$all_column_list=$this->add_all_column($columnlist);
			return $all_column_list;
		}

		public function get_parent_column_list()
		{
			$columnlist=parent::fetch_data(array("parentid"=>0,"isenabled"=>1),"*","order by colindex asc");
			return $columnlist;
		}

		/**
		*添加目录栏目 用户递归  组成栏目的层级
		*@param array $columnlist 当前栏目的数据源
		*@param int $pid 当前层级的父级ID
		*/
		public function add_category_column($columnlist,$pid=0)
		{
			$new_column_list=array();

			foreach ($columnlist as $column) {
				if($column["parentid"]==$pid)
				{
					$temp=$this->add_category_column($columnlist,$column["id"]);
					if(!empty($temp))
					{
						$column["state"]="closed";
						//如果他有子类  则添加进去
						$column["children"]=$temp;

					}
					unset($column["parentid"]);
					$column["iconCls"]=$this->get_icon($column["type"]);
					$new_column_list[]=$column;
				}	
			}
			return $new_column_list;
		}

		/**
		*添加所有栏目 用户递归  组成栏目的层级
		*@param array $columnlist 当前栏目的数据源
		*@param int $pid 当前层级的父级ID
		*/
		public function add_all_column($columnlist,$pid=0)
		{
			$new_column_list =array();

			foreach ($columnlist as $column) {
				if($column["parentid"]==$pid)
				{
					$temp=$this->add_all_column($columnlist,$column["colid"]);
					if(!empty($temp))
					{
						$column["state"]="closed";
						//如果他有子类  则添加进去
						$column["children"]=$temp;

					}
					//unset($column["parentid"]);
					$column["iconCls"]=$this->get_icon($column["type"]);
					$new_column_list[]=$column;
				}	
			}
			return $new_column_list;
		}

		/**
		*根据栏目类型获取获取小图标
		*@param string $type 栏目类型
		*/
		private function get_icon($type)
		{
			$icon="icon-folder";
			switch($type)
			{
				case "home":$icon="icon-home";break;
				case "category":$icon="icon-folder";break;
				case "article":$icon="icon-article";break;
				case "single":$icon="icon-white-text";break;
				case "link":$icon="icon-link";break;
			}
			return $icon;
		}

		/**
	     * 根据值进行数组的过滤
	     *@param array $array 需要过滤的数组
	     *@param $index  
	     *@param mixed $value 键的值
	     *@return 返回过滤后的新数组
	     */ 
	    function filter_by_value ($array, $index, $value){ 
	        if(is_array($array) && count($array)>0)  
	        { 
	            foreach(array_keys($array) as $key){ 
	                $temp[$key] = $array[$key][$index]; 
	                 
	                if ($temp[$key] == $value){ 
	                    $newarray[$key] = $array[$key]; 
	                } 
	            } 
	          } 
	      return $newarray; 
	    } 


		/**
		*对二维关联数组进行排序
		*@param array $arr 需要排序的数组
		*@param string $key 数组的键
		*@param string $type 排序的类型 asc升序 desc 降序 默认升序
		*@param 返回排序后的新数组
		*/
		function array_sort($arr,$keys,$type='asc'){ 
			$keysvalue = $new_array = array();
			foreach ($arr as $k=>$v){
			$keysvalue[$k] = $v[$keys];
			}

			if($type == 'asc'){
			asort($keysvalue);
			}else{
			arsort($keysvalue);
			}

			reset($keysvalue);
			foreach ($keysvalue as $k=>$v){
			$new_array[$k] = $arr[$k];
			}
			return $new_array; 
		}

		//public function 
	}