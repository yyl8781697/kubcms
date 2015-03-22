<?php
	
	require_once("Model.php");

	class Article extends Model{

		protected $primary_key;

		public function __construct()
		{
			parent::__construct();
			$this->primary_key="articleid";
		}

		public static function get_instance()
		{
			return new Article();
		}

		public function get_list_by_catalog_columnname($columnname)
		{
			$sql_colid="select colid from kub_column where urlname=? and isenabled=1";

			$colid_array=$this->db->stmt_fetch($sql_colid,array("urlname"=>$columnname));

			if(isset($colid_array[0]["colid"]))
			{
				$colid=$colid_array[0]["colid"];

				$sql="select * from kub_article a where colid=$colid and isdelete=0 and isenabled=1";

				$articlelist=$this->db->fetch_pager($sql,1,15);

				
				return $articlelist;

			}else{
				return array();
			}

			
			
			
		}
	}