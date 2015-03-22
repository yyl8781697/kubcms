<?php

	/**
	*此类主要提供一些公共的方法
	*/
	class PublicMethod{

		/**
		*得到成功情况下处理的json字符串
		*@param string $msg='' 返回的str
		*@return string
		*/
		public static function get_success_json($msg='')
		{
			return "{\"state\":\"success\",\"msg\":\"$msg\"}";
		}

		/**
		*得到失败情况下处理的json字符串
		*@param string $msg='' 返回的str
		*@return string
		*/
		public static function get_error_json($msg='')
		{
			return "{\"state\":\"error\",\"msg\":\"$msg\"}";
		}

		/**
		*上传图片
		*@param $_Files $file 待上传的文件
		*@param string $save_dir 保存的目录
		*@param string $error_msg 发生的错误
		*@return 返回上传后保存文件的路径
		*/
		public static function upload_image($file,$save_dir,&$error_msg="")
		{	
			$save_path="";
			if($file["error"]>0)
			{
				$error_msg=$file["error"];
			}else{
				$type=$file["type"];
				if(!self::check_image_type($type))
				{
					$error_msg="文件类型错误";
					
				}else{
					if($file["size"]>4096000)
					{
						$error_msg="图片不能超过4M";
					}else{
						//生成一个随机的文件名
						$path_arr=split("/", $type);
						$save_path=$save_dir."/".date("YmdHis").rand(0,100).".".$path_arr[1];
						move_uploaded_file($file["tmp_name"], ROOT_PATH."/".$save_path);
					}
				}
			}

			return $save_path;
		}

		/**
		*检测文件类型
		*@param 待检测文件的类型
		*@return 返回boolean 
		*/
		public static function check_image_type($type)
		{
			$types=array("image/gif","image/jpeg","image/pjpeg","image/png");
			return in_array($type, $types);
			
		}

	}