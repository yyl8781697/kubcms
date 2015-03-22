<?php

	require_once("Controller.php");
	require_once(ROOT_PATH."/models/Article.php");
	require_once(ROOT_PATH."/models/Column.php");
	class IndexController extends Controller{
		function IndexAction($id=3)
		{
			$this->assign_public_data();

			$_SESSION["id"]=$id;

			$this->smarty->display("index.tpl");
		}

		/**
		* 分别公共资源 比如页面头部信息导航等
		*/
		function assign_public_data()
		{
			include ROOT_PATH."/config/config.php";

			$this->smarty->assign("web_site_config",$web_site_config);//加入网站配置信息
			$this->smarty->assign("nav",Column::get_instance()->get_parent_column_list());//加入导航信息
		}
	}