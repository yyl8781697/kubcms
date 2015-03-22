<?php
	
	require_once("Model.php");

	class Link extends Model{

		protected $primary_key;

		public function __construct()
		{
			parent::__construct();
			$this->primary_key="linkid";
		}

		public static function get_instance()
		{
			return new Link();
		}
	}