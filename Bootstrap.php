<?php
/*-------------------------------------
 * Bootstrap.php
 *
 * 用来实现网站的统一入口，调用Controler类
 *
 -------------------------------------*/
class Bootstrap{

    //url所需要调用的控制器
    private $controller;
    //控制器存放的目录
    private $controller_path="controllers/";
    //controler文件的路径名
    private $controller_file;
    //controler的类名
    private $controller_class;
    //用来记录所要进行的操作
    private $action;
    //action的方法
    private $action_method;
    //url所传递过来的参数
    private $params;

    private $rewrite_rule;

    /**
    *@初始化 
    */
    function initialize(){
        /*$this->rewrite_rule=array(
                '/index\/(\d+)$/'=>'index/index/$1'
        );*/
        //$this->rewrite_rule=array("2");

        $this->analysis_path();
        $this->check_controller();
        $this->check_class();
        $this->check_method();
        

    }

    /*
     * 解析当前的访问路径，分析器控制器 action和参数
     */
    private function analysis_path(){
        //获取请求的uri
        $request_uri=$this->get_require_uri();
        //判断是否是网站根目录进来
        if($request_uri=="/"||$request_uri=="")
        {
            $this->controller="Index";
            $this->action="Index";
        }else{
            //$pattern='/^\/([a-zA-Z][a-zA-Z0-9]*)\/([a-zA-Z][a-zA-Z0-9]*)\/(w*)$/';
            $pattern='/\//';
            $arr=preg_split($pattern,$request_uri);
            //取得controller，并且控制单词的首字母为大写，其他均为小写
            $this->controller=ucwords(strtolower($arr[1]));
            $this->action=empty($arr[2])?"Index":ucwords(strtolower($arr[2]));
            //将后面的参数  作为参数列表
            $this->params=array_slice($arr, 3);
            //var_dump($arr);
        }
        //echo "<br />","controller:",$this->controller;
        //echo "<br />","action:",$this->action;

    }

    /**
    * 获取请求的真实目的uri 会经过rewrite判断
    */
    private function get_require_uri()
    {
        $request_uri=str_replace(WEB_PATH,"","http://".($_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]));
   
        //如果uri中存在?
        if(strpos($request_uri, "?")>-1)
        {   
            //去掉?之后的东西
            $request_uri=substr($request_uri,0,strpos($request_uri,"?"));

        }else{
            //判读是否有重写规则
            if(!empty($this->rewrite_rule))
            {
                foreach ($this->rewrite_rule as $pattern => $replace) {
                    //判断是否有匹配的正则
                    if(preg_match($pattern, $request_uri,$match))
                    {   
                        //替换匹配到的规则
                        $request_uri=preg_replace($pattern, $replace, $request_uri);
                        break;
                    }
                }
            }
        }

        
        return $request_uri;
    }

    /*
    *@检测控制器文件是否存在
    */
    private function check_controller()
    {

        $this->controller_file=$this->controller_path.$this->controller."Controller.php";

        //检测控制器是否存在
        if(!file_exists($this->controller_file))
        {
            die("the controller file: $this->controller_file is not exitst");

        }
        require_once $this->controller_file;

    }

    /*
     * 解析得到该action要用到的controler类名是否存在
     */
    private function check_class(){
        $this->controller_class = $this->controller."Controller";
        if(!class_exists($this->controller_class))
        {
            die("the class of controller:$this->controller_class is not exist");
        }
         
    }

    /*
     * 解析得到该action要用到的方法名是否已经定义
     */
    private function check_method()
    {
        $this->action_method=$this->action."Action";
        
        if(!method_exists(new $this->controller_class(), $this->action_method))
        {
            die("the method of action:$this->action_method is not exist");
        }
    }

    /*
     * 调用controler，执行controler的action
     */
    public function run(){
        //$method_param=$this->getParams($this->controller_class,$this->action_method);

        $c = new $this->controller_class;
        //初始化传递的参数
        $c->initialize($this->controller,$this->params);
        //动态调用action的方法
        if(empty($this->params))
        {   
            call_user_func(array($c,$this->action_method));
        }else{
            call_user_func_array(array($c,$this->action_method),$this->params);
        }
        
    }

    function getParams($classn_name,$method_name) {
        $reflector = new ReflectionClass($classn_name);
        $parameters = $reflector->getMethod($method_name)->getParameters();
        $info = array();
        foreach($parameters as $key=>$param) {
        //$info[$key]['name'] = $param->getName();//获取方法的参数
        //$info[$key]['value'] = ($param->isDefaultValueAvailable())?$param->getDefaultValue():'';//获取默认值
        $info[]=$param->getName();
        }
        return $info;
    }

}
?>