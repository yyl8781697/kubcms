<?php

	require_once("Controller.php");
	require_once(ROOT_PATH."/models/Article.php");
	require_once(ROOT_PATH."/models/User.php");
	require_once(ROOT_PATH."/models/Link.php");
	include ROOT_PATH."/models/Column.php";
	include ROOT_PATH."/core/common/PublicMethod.class.php";

	class AdminController extends Controller{


		public function __construct()
		{
			session_start();
		}

		function IndexAction()
		{
			$this->smarty->display("index.tpl");
		}

		function LoginAction()
		{
			$this->smarty->display("login.tpl");
		}

		function UserAction()
		{
			$this->smarty->display("user.tpl");
		}

		/**
		*栏目的相关操作
		*/
		function ColumnAction($action="",$colid=0)
		{
			if(!isset($action)||empty($action))
			{
				//栏目栏目列表模板
				$this->smarty->display("column.tpl");
			}else{

				if($action=="add")
				{
					//显示添加栏目模板
					$this->smarty->display("columnmodify.tpl");
				}else{
					if($action=="edit")
					{
						if(!isset($colid)||empty($colid))
						{
							echo "error:colid is null";
							exit();
						}else{
							//显示编辑栏目模板
							$this->smarty->assign("columninfo",Column::get_instance()->fetch_by_key($colid));
							$this->smarty->display("columnmodify.tpl");
						}
					}
				}
			}
			
		}

		function LinkAction()
		{
			$this->smarty->display("link.tpl");
		}

		/**
		*文章的操作
		*/
		function ArticleAction($action="",$articleid=0)
		{
			if(!isset($action)||empty($action))
			{
				//echo "xx";
				$this->smarty->display("article.tpl");
			}else{

				if($action=="add")
				{
					//显示添加文章模板s
					$this->smarty->display("articlemodify.tpl");
				}else{
					//如果是传递编辑参数
					if($action=="edit")
					{
						if(!isset($articleid)||empty($articleid))
						{
							echo "error:articleid is null";
							exit();
						}else{
							//显示编辑栏目模板
							$this->smarty->assign("articleinfo",Article::get_instance()->fetch_by_key($articleid));
							$this->smarty->display("articlemodify.tpl");
						}
					}
				}

			}
		}

		/*
		*验证登陆的操作
		*/
		function LoginhandlerAction()
		{
			$print_out="";
			if(strncasecmp($_POST["checkcode"],$_SESSION["checkcode"],4) ==0)
			{
				$useraccount=$_POST["useraccount"];
				$password=$_POST["password"];
				if(User::get_instance()->check_login($useraccount,$password))
				{
					$print_out=PublicMethod::get_success_json("登陆成功");
				}
				else
				{
					$print_out=PublicMethod::get_error_json("账号或者密码错误");
				}
			}else{
				$print_out=PublicMethod::get_error_json("验证码错误");
			}
			echo $print_out;
			exit();
		}

		/*
		*菜单
		*/
		function MenuhandlerAction()
		{
			$menu=array(
				"menus"=>array(
					array(
						"navid"=>1,
						"title"=>"我的菜单",
						"iconcls"=>"icon-sysset",
						"menus"=>array(
							array(
								"navID"=>2,
								"title"=>"用户管理",
								"url"=>"user",
								"iconcls"=>"icon-newspaper"
							),
							array(
								"navID"=>3,
								"title"=>"栏目管理",
								"url"=>"column",
								"iconcls"=>"icon-newspaper"
							),
							array(
								"navID"=>4,
								"title"=>"文章管理",
								"url"=>"article",
								"iconcls"=>"icon-newspaper"
							),
							array(
								"navID"=>5,
								"title"=>"链接管理",
								"url"=>"link",
								"iconcls"=>"icon-newspaper"
							)
						)
					)
				)
			);
			echo json_encode($menu);
			exit();
		}

		/**
		*获取用户列表 有分页功能
		*/
		function GetuserlistAction()
		{
			$page_index=$_POST["page"];
			$page_zie=$_POST["rows"];
			$sort=$_POST["sort"];
			$order=$_POST["order"];
			$sql="select userid,useraccount,username,email,telephone,level,isenabled from kub_user";

			if(!empty($sort)&&!empty($order))
			{
				$sql.=" order by $sort $order ";
			}

			$userlist=User::get_instance()->db->fetch_pager($sql,$page_index,$page_zie);
			$data=array("total"=>$userlist["count"],"rows"=>$userlist["data"]);
			echo json_encode($data);
			exit();
		}

		/**
		*获取文章列表 有分页功能
		*/
		function GetarticlelistAction($colids="")
		{
			//echo "xxx";
			$page_index=$_POST["page"];
			$page_zie=$_POST["rows"];
			$sort=$_POST["sort"];
			$order=$_POST["order"];
			$sql="SELECT articleid, (
					SELECT name
					FROM kub_column kc
					WHERE kc.colid = ka.colid
					) AS colname, 
					urlname, title, author, createtime, istop, isenabled,hits
				FROM kub_article ka
				WHERE isdelete =0";

			if(!empty($colids))
			{
				$sql.=" and colid in($colids)";
			}

			if(!empty($sort)&&!empty($order))
			{
				$sql.=" order by $sort $order ";
			}

			$userlist=Article::get_instance()->db->fetch_pager($sql,$page_index,$page_zie);
			$data=array("total"=>$userlist["count"],"rows"=>$userlist["data"]);
			echo json_encode($data);
			exit();
		}


		/**
		*获取链接列表
		*/
		function GetLinklistAction()
		{
			$linklist=Link::get_instance()->fetch_data(array(),"*","order by linkindex asc");
			echo json_encode($linklist);
		}




		/**
		*添加用户
		*/
		function AdduserAction()
		{
			$print_out="";
			//判断是否有userid过来
			if(!isset($_POST["useraccount"]))
			{
				$print_out=PublicMethod::get_error_json("useraccount undefined error");
			}else{
				$userinfo=array(
				"useraccount"=>$_POST["useraccount"],
				"password"=>md5($_POST["password"]),
				"username"=>$_POST["username"],
				"email"=>$_POST["email"],
				"telephone"=>$_POST["telephone"],
				"level"=>(int)$_POST["level"],
				"isenabled"=>$_POST["isenabled"]=="on"?1:0
				);

				if(User::get_instance()->insert($userinfo))
				{
					$print_out=PublicMethod::get_success_json("用户添加成功");
				}else{
					$print_out=PublicMethod::get_error_json("用户添加失败");
				}

			}

			echo $print_out;
			exit();
		}

		/**
		*更新用户信息
		*/
		function UpdateuserAction()
		{
			$print_out="";
			//判断是否有userid过来
			if(!isset($_POST["userid"]))
			{
				$print_out=PublicMethod::get_error_json("userid undefined error");
			}else{
				$userinfo=array(
				"username"=>$_POST["username"],
				"email"=>$_POST["email"],
				"telephone"=>$_POST["telephone"],
				"level"=>(int)$_POST["level"],
				"isenabled"=>$_POST["isenabled"]=="on"?1:0
				);
				if(isset($_POST["password"])&&!empty($_POST["password"]))
				{
					$userinfo["password"]=md5($_POST["password"]);
				}

				if(User::get_instance()->update_by_key($userinfo,(int)$_POST["userid"]))
				{
					$print_out=PublicMethod::get_success_json("用户更新成功");
				}else{
					$print_out=PublicMethod::get_error_json("用户更新失败");
				}

			}

			echo $print_out;
			exit();
		}

		/**
		*删除用户操作
		*/
		function DeleteuserAction()
		{
			$print_out="";
			if(!isset($_POST["userid"]))
			{
				$print_out=PublicMethod::get_error_json("userid undefined error");
			}else{
				if(User::get_instance()->delete((int)$_POST["userid"]))
				{
					$print_out=PublicMethod::get_success_json("用户删除成功");
				}else{
					$print_out=PublicMethod::get_error_json("用户删除失败");
				}
			}

			echo $print_out;
			exit();
		}

		/**
		*获取目录栏目列表
		*/
		function Category_column_listAction()
		{
			echo json_encode(Column::get_instance()->get_category_column_list());
		}

		/**
		*获取所有可能含文章栏目列表
		*/
		function Article_column_listAction()
		{
			echo json_encode(Column::get_instance()->get_article_column_list());
		}

		/**
		*获取所有的栏目列表
		*/
		function All_column_listAction()
		{
			echo json_encode(Column::get_instance()->get_all_column_list());
		}

		/**
		*添加栏目
		*/
		function AddcolumnAction()
		{
			$print_out="";
			if(!isset($_POST["name"]))
			{
				$print_out=PublicMethod::get_error_json("name undefined error");
			}else{
				$columninfo=array(
				"parentid"=>(int)$_POST["parentid"],
				"name"=>$_POST["name"],
				"urlname"=>$_POST["urlname"],
				"createtime"=>date("Y-m-d H-i-s"),
				"type"=>$_POST["type"],
				"navigation"=>$_POST["navigation"],
				"colindex"=>(int)$_POST["colindex"],
				"isenabled"=>(string)$_POST["isenabled"]=="on"?1:0,
				"linktarget"=>$_POST["linktarget"],
				"content"=>$_POST["content"],
				"linkurl"=>$_POST["linkurl"]
				);

				if(Column::get_instance()->insert($columninfo))
				{
					$print_out=PublicMethod::get_success_json("栏目添加成功");
				}else{
					$print_out=PublicMethod::get_error_json("栏目添加失败");
				}
			}

			echo $print_out;
			exit();
		}

		/**
		*更新栏目
		*/
		function UpdateColumnAction()
		{
			$print_out="";
			if(!isset($_POST["colid"]))
			{
				$print_out=PublicMethod::get_error_json("colid undefined error");
			}else{
				$columninfo=array(
				"parentid"=>(int)$_POST["parentid"],
				"name"=>$_POST["name"],
				"urlname"=>$_POST["urlname"],
				"type"=>$_POST["type"],
				"navigation"=>$_POST["navigation"],
				"colindex"=>(int)$_POST["colindex"],
				"isenabled"=>(string)$_POST["isenabled"]=="on"?1:0,
				"linktarget"=>$_POST["linktarget"],
				"content"=>$_POST["content"],
				"linkurl"=>$_POST["linkurl"]
				);


				if(Column::get_instance()->update_by_key($columninfo,(int)$_POST["colid"]))
				{
					$print_out=PublicMethod::get_success_json("栏目保存成功");
				}else{
					$print_out=PublicMethod::get_error_json("栏目保存失败");
				}
			}

			echo $print_out;
			exit();
		}

		/**
		*添加文章
		*/
		function AddarticleAction()
		{
			$print_out="";
			if(!isset($_POST["title"]))
			{
				$print_out=PublicMethod::get_error_json("title undefined error");
			}else{
				$articleinfo=$this->get_article_post();
				$articleinfo["createtime"]=date("Y-m-d H:i:s");
				$articleinfo["updatetime"]=date("Y-m-d H:i:s");
				$articleinfo["isdelete"]=0;
				$articleinfo["hits"]=0;

				if(Article::get_instance()->insert($articleinfo))
				{
					$print_out=PublicMethod::get_success_json("文章添加成功");
				}else{
					$print_out=PublicMethod::get_error_json("文章添加失败");
				}
			}

			echo $print_out;
			exit();
		}

		/**
		*修改/更新文章
		*/
		function UpdatearticleAction()
		{
			$print_out="";
			if(!isset($_POST["articleid"]))
			{
				$print_out=PublicMethod::get_error_json("articleid undefined error");
			}else{
				
				if(Article::get_instance()->update_by_key($this->get_article_post(),(int)$_POST["articleid"]))
				{
					$print_out=PublicMethod::get_success_json("文章保存成功");
				}else{
					$print_out=PublicMethod::get_error_json("文章保存失败");
				}
			}
			echo $print_out;
			exit();
		}

		/**
		*获取文档更新过来的post
		*/
		function get_article_post()
		{

			if(isset($_FILES["fileupload"]))
				{
					//var_dump($_Files["fileupload"]);
					$save_dir="uploadfiles/articleimg";
					$save_path=PublicMethod::upload_image($_FILES["fileupload"],$save_dir,$error_msg);
					if(!empty($error_msg))
					{
						//如果上传图片有错误  直接退出
						echo PublicMethod::get_error_json($error_msg);
						exit();
					}
				}else{
					$save_path=$_POST["imagepath"];
				}

				

				$articleinfo=array(
					"title"=>$_POST["title"],
					"colid"=>(int)$_POST["colid"],
					"author"=>$_POST["author"],
					"urlname"=>$_POST["urlname"],
					"source"=>$_POST["source"],
					"tags"=>$_POST["tags"],
					"content"=>$_POST["content"],
					"imagepath"=>$save_path,
					"color"=>$_POST["color"],
					"istop"=>$_POST["istop"]=="on"?1:0,
					"isenabled"=>$_POST["isenabled"]=="on"?1:0
				);
				return $articleinfo;
		}

		/**
		*删除文章
		*/
		function DeletearticleAction()
		{
			$print_out="";
			if(!isset($_POST["articleids"]))
			{
				$print_out=PublicMethod::get_error_json("articleid undefined error");
			}else{
				$articleids=$_POST["articleids"];
				$arr_articleid=split(",", $articleids);
				if(Article::get_instance()->delete_by_keys($arr_articleid))
				{
					$print_out=PublicMethod::get_success_json("文章删除成功");
				}else{
					$print_out=PublicMethod::get_error_json("文章删除失败");
				}
			}
			echo $print_out;
			exit();
			
		}

		/**
		*删除栏目
		*/
		function DeletecolumnAction()
		{
			$print_out="";
			if(!isset($_POST["colid"]))
			{
				$print_out=PublicMethod::get_error_json("colid undefined error");
			}else{
				if(Column::get_instance()->delete_by_key((int)$_POST["colid"]))
				{
					$print_out=PublicMethod::get_success_json("栏目删除成功");
				}else{
					$print_out=PublicMethod::get_error_json("栏目删除失败");
				}
			}
			echo $print_out;
			exit();
		}

		/**
		*添加一个连接
		*/
		function AddlinkAction()
		{
		//var_dump($_POST);
			$print_out="";
			if(!isset($_POST["title"]))
			{
				$print_out=PublicMethod::get_error_json("title undefined error");
			}else{
				$link=array(
					"title"=>$_POST["title"],
					"url"=>$_POST["url"],
					"linkindex"=>intval($_POST["linkindex"])
				);
				//var_dump($link);
				if(Article::get_instance()->insert($link))
				{
					$print_out=PublicMethod::get_success_json("链接添加成功");
				}else{
					$print_out=PublicMethod::get_error_json("链接添加成功");
				}
			}

			echo $print_out;
		}

		/**
		*更新一个连接
		*/
		function UpdatelinkAction()
		{
		//var_dump($_POST);
			$print_out="";
			if(!isset($_POST["linkid"]))
			{
				$print_out=PublicMethod::get_error_json("linkid undefined error");
			}else{
				$link=array(
					"title"=>$_POST["title"],
					"url"=>$_POST["url"],
					"linkindex"=>intval($_POST["linkindex"])
				);

				//var_dump($link);

				if(Article::get_instance()->update_by_key($link,intval($_POST["linkid"])))
				{
					$print_out=PublicMethod::get_success_json("链接更新成功");
				}else{
					$print_out=PublicMethod::get_error_json("链接更新成功");
				}
			}

			echo $print_out;
		}

		/*
		*生成验证码
		*/
		function CheckcodeAction()
		{
			//加载验证码类
			include ROOT_PATH."/core/common/Captcha.class.php" ;
			$captcha = new Captcha(60,24,4);
			session_start();
			$_SESSION["checkcode"]=$captcha->getCaptcha();

			$captcha->showImg();
			exit();
		}


	}