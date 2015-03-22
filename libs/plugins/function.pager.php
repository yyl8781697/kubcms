<?php

	function smarty_function_pager($params,&$smarty){    //#在组建文件中建立函数

		$pager=new pager($params);
		return $pager->builder_pager();
	}

	class pager{
        public $config=array(
            //首页按钮的文本文字
            "first_btn_text"=>"首页",
             //上一页按钮的文本文字,
            "pre_btn_text"=>"上一页",
            //下一页的文本文字
            "next_btn_text"=>"下一页",
            //最后一页的文本文字,
            "last_btn_text"=>"末页",
            //总记录数 *必需
            "record_count"=>0,
            //每页分页尺寸
            "pager_size"=>15,
            //当前页码  *必需
            "pager_index"=>1,
            //每页显示的最大数量按钮
            "max_show_page_size"=>10,
            //页码在浏览器中传值的名称  默认为page
            "querystring_name"=>"page",
            //URL是否重写 默认为flase
            "enable_urlrewriting"=>false,
            //url重写规则
            "urlrewrite_pattern"=>"",
            //分页容器的css名称
            "classname"=>"paginator",
            //当前页按钮的class名称
            "current_btn_class"=>"cpb",
            //分页文字描述span标签的css
            "span_text_class"=>"stc",
            //是否显示跳转
            "show_jump"=>false,
            //是否展示前面的按钮  首页&上一页
            "show_front_btn"=>true,
            //是否展示后面的按钮 下一页&末页
            "show_last_btn"=>true
        );

        /*
         * 类的构造函数
         * $config:该分页类的配置
         */
        public function __construct($config)
        {
            $this->init_config($config);
        }

        function __destruct()
        {
            unset($this->config);
        }

        public function builder_pager()
        {
            //分页的字符串
            $pager_arr=array();
            //当前的页码序号 如果是0，则置为1
            $pager_index=$this->config["pager_index"]==0?1:$this->config["pager_index"];
            //得到一共的分页数目
            $page_num=$this->config["record_count"]/($this->config["pager_size"]+1);
            //获取需要跳转 的url
            $url=$this->get_url();
            //添加开头的div
            $classname=$this->config["classname"];
            $pager_arr[]="<div class=\"$classname\">\n";
            //添加前面两个按钮的html
            if($this->config["show_front_btn"])
            {
                //如果当前的页码为1 则front这两个按钮则会被禁用
                $attr=$pager_index==1?"disabled=disabled":"";
                $pager_arr[]=$this->get_a_html($this->format($url,1),$this->config["first_btn_text"],$attr);
                $pager_arr[]=$this->get_a_html($this->format($url,$pager_index-1),$this->config["pre_btn_text"],$attr);
            }

            //主体页码部分

            if($this->config["show_last_btn"])
            {
                //如果当前的页码为1 则front这两个按钮则会被禁用
                $attr=$pager_index==$page_num?"disabled=disabled":"";
                $pager_arr[]=$this->get_a_html($this->format($url,$pager_index+1),$this->config["next_btn_text"],$attr);
                $pager_arr[]=$this->get_a_html($this->format($url,$page_num),$this->config["last_btn_text"],$attr);
            }

            $pager_arr[]="</div>";
            /*array_push($pager_arr,"11111111111111");
            array_push($pager_arr,"2222222222222222");*/

            return implode($pager_arr);
        }

        /*
         *获取需要处理的url，支持重写配置，各种参数的url
         */
        public function get_url()
        {
            //得到调用文件所在的目录
            $file_path="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
            //如果设置了允许url重写
            if($this->config["enable_urlrewriting"])
            {
                //直接将目录附加重写规则  形成新的url
                $url=$file_path.$this->config["urlrewrite_pattern"];
            }else{
                //得到当前调用页面的绝对url
                $url="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
                //分页参数在浏览器中传递的名称
                $querystring_name=$this->config['querystring_name'];
                //如果该url中包含php？的字符串  则需要将分页参数替换
                if(strpos($url,"php?"))
                {
                    //如果存在page=xxx的字样
                    $pattern="/$querystring_name=[0-9]*/";
                    if(preg_match($pattern,$url))
                    {
                        //将含page=***的字样中的数字替换成{0}
                        $url=preg_replace($pattern,"$querystring_name={0}",$url);
                    }else{
                        $url.="&$querystring_name={0}";
                    }

                }else{
                    //直接附加参数形成分页的完整url
                    $url.="?$querystring_name={0}";
                }
            }
            return $url;
        }

        /*
         * 得到a标签的html
         *$url:a标签所要导向的html
         *$title:a标签的标题
         **$attr:a标签上的附件属性 可以不写
         */
        private static function get_a_html($url,$title,$attr="")
        {
            return "<a href='$url' $attr style=\"margin-right:5px;\">$title</a>\n";
        }

        /*
         * 获得span标签的html
         * $num:span中的文本，即页序号
         * $classname:span标签的class名称
         */
        private static function get_span_html($num,$classname)
        {
            return "<span class=\"" .$classname. "\">$num</span>\n";
        }

        /*
         *初始化分页的配置文件
         *如果在参数中不含该键值，则默认使用申明的值
         */
        private function init_config($config)
        {
            //判断该值是否存在、是否是数组、是否含有记录
            if(isset($config)&&is_array($config)&&count($config)>0){
                foreach($config as $key=>$val)
                {
                    $this->config[$key]=$val;
                }
            }
        }

        /*
         * 构造跳转功能脚本的方法
         *$url:需要跳转的额那个url
         */
        private function get_jumpscript($url)
        {
            $scriptstr = "<script type=\"text/javascript\">\n".
                            "function jump(){\n".
                            "var jnum=document.getElementById(\"jumpNum\").value;\n".
                            "if(isNaN(jnum)){\n".
                            "alert(\"在跳转框中请输入数字！\");\n".
                            "}\n".
                            "else{\n".
                            "location.href=String.format('$url',jnum);\n".
                            "}\n".
                            "}\n".
                            "String.format = function() {\n".
                            "if( arguments.length == 0 )\n".
                            "return null; \n".
                            "var str = arguments[0]; \n".
                            "for(var i=1;i<arguments.length;i++) {\n".
                            "var re = new RegExp('\\\\{' + (i-1) + '\\\\}','gm');\n".
                            "str = str.replace(re, arguments[i]);\n".
                            "}\n".
                            "return str;\n".
                            "}\n".
                            "</script>\n";
            return $scriptstr;
        }

        /*
         * php中构造类似.net中format方法的函数
         * 用法:format("hello,{0},{1},{2}", 'x0','x1','x2')
         */
        private function format() {

            $args = func_get_args();

            if (count($args) == 0) { return;}

            if (count($args) == 1) { return $args[0]; }

            $str = array_shift($args);

            $str = preg_replace_callback('/\\{(0|[1-9]\\d*)\\}/', create_function('$match', '$args = '.var_export($args, true).'; return isset($args[$match[1]]) ? $args[$match[1]] : $match[0];'), $str);

            return $str;

        }

    }
?>