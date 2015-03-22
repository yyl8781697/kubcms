<?php
	
	require_once("Controller.php");
	include ROOT_PATH."/models/Column.php";
	include ROOT_PATH."/models/Article.php";
	class ArticleController extends Controller{
		function ListAction($column_name)
		{
		
			$this->assign_public_data();
			$this->smarty->assign("article_list",Article::get_instance()->get_list_by_catalog_columnname($column_name));
			$this->smarty->assign("column_name",$column_name);
			$this->smarty->display("list.tpl");
		}

		function detailAction($x)
		{
				echo $x;
			$this->smarty->display("detail.tpl");
		}

		/**
		* 分别公共资源 比如页面头部信息导航等
		*/
		function assign_public_data()
		{
			include ROOT_PATH."/config/config.php";

			//$this->smarty->assign("web_site_config",$web_site_config);//加入网站配置信息
			$this->smarty->assign("nav",Column::get_instance()->get_parent_column_list());//加入导航信息
		}
	}