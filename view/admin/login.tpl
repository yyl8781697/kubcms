<!DOCTYPE html>
<head>
    <title>苦B的内容管理系统--用户登录</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<{$public_path}>/style/login.css" rel="stylesheet" type="text/css" />
    <script src="<{$public_path}>/javascript/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<{$public_path}>/javascript/string.base.js" type="text/javascript"></script>
    <script src="<{$public_path}>/javascript/bussiness/login.js" type="text/javascript"></script>
</head>
<body>
    <div id="LoginCircle">
        <div id="LoginDoc">
            <div id="SysName"></div>
            <div id="SysInput">
                <ul>
                    <li>用户名：</li>
                    <li>
                        <input id="txtUserAccount" name="useraccount" value="" type="text" class="InputStyle" maxlength="18" /></li>
                </ul>
                <ul>
                    <li>密&nbsp;&nbsp;&nbsp;码：</li>
                    <li>
                        <input name="password" type="password" class="InputStyle" value="" id="txtPassword" maxlength="18" /></li>
                </ul>
                <ul>
                    <li>验证码：</li>
                    <li style="width:150px;">
                        <input id="checkCode" name="checkcode" value="" type="text" class="InputStyle" maxlength="4" value="<{$smarty.session.checkcode}>" />
                        <a href="#"   onclick="document.getElementById('codeImg').src='checkcode/'+ (new Date().getTime().toString(36)); return false">
                            <script type="text/javascript">
                                document.write('<img id="codeImg" height="28px" border="0" style="vertical-align:middle;margin-bottom:5px;" alt="看不清，点击换一张！" src="checkcode/' + (new Date().getTime().toString(36)) + '" />');
                            </script>
                            </a>
                        </li>
                </ul>
                <ul>
                    <li>&nbsp;</li>
                    <li>
                    <div style="width:170px; text-align:left">
                    <input type="button" id="btnLogin" class="btn" value="登录" />
                    <a href="register.aspx">注册</a>|<a href="findpassword.aspx">找回密码</a>|<a href="#" id="viewpassword">查看</a>
                    </div>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div id="Copy">
       <font color="red">苦B的内容管理系统</font> Version 1.0 Copyright &copy; 2012 By <a href="http://www.ebailu.com"  style="color:#fff;" target="_blank">kubcms</a>
    </div>
    <div id="statemsg"></div>
</body>
</html>