<?php
	
	require_once(ROOT_PATH."/libs/Smarty.class.php");

	/**
	*@各个控制器的父类，主要传参数和初始化smarty类
	*/
	class Controller
	{
		//在url传递的参数
		protected $get_params;
		//smarty类
		protected $smarty;

		/**
		*初始化基本controller类
		*@param controller 模板所存放的文件夹
		*@param 通过模拟get过来的参数
		*/
		public function initialize($controller,$params=null)
		{
			$this->get_params=$params;
			$this->smarty=new Smarty();
			//将controller都转换为小写
			$controller_lower=strtolower($controller);
			$template_style="default";
			if($controller=="Admin")
			{
				//直接进入后台的admin文件夹取模板
				$this->smarty->template_dir=ROOT_PATH."/view/".$controller_lower;
				//模板文件的web路径
				$this->smarty->assign("web_tpl_path",WEB_PATH."/view/$controller_lower");

			}else{
				//会进去配置的样式 文件夹取模板 默认admin
				$this->smarty->template_dir=ROOT_PATH."/view/$template_style/".strtolower($controller);
				$this->smarty->assign("web_tpl_path",WEB_PATH."/view/$template_style/$controller_lower");
			}

			$this->smarty->assign("public_path",WEB_PATH."/public");

			//web根路径
			$this->smarty->assign("web_path",WEB_PATH);
			//contrller的web路径
			$this->smarty->assign("web_controller_path",WEB_PATH."/".$controller_lower);
			$this->smarty->compile_dir=ROOT_PATH."/templates_c";
			$this->smarty->left_delimiter="<{";
			$this->smarty->right_delimiter="}>";
		}

		/**
		*得到get的值
		*@param int $index 索引
		*/
		protected function get_params($index)
		{	
			if(isset($this->get_params[$index]))
			{
				//需要获取的get值存在
				return $this->get_params[$index];
			}else{	
				return "";
			}
		}
	}