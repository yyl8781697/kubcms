<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:42
         compiled from "D:\coreamp\htdocs\huizhou\view\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2926550e044aabd2a7-14970928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6d5674464e6a80b045674479c249a33378020f7' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\admin\\index.tpl',
      1 => 1394066434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2926550e044aabd2a7-14970928',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
    'web_controller_path' => 0,
    'sessioninfo' => 0,
    'ss' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e044ab4fed2_87606850',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e044ab4fed2_87606850')) {function content_550e044ab4fed2_87606850($_smarty_tpl) {?><!DOCTYPE html>

<head>
    <title>苦B的内容管理系统</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/style/common.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/style/icon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/easyui/themes/default/easyui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/easyui/themes/icon.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/easyui/jquery.easyui.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/string.base.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function () {
            $('#loading-mask').fadeOut('slow');
            
        }
	</script>
</head>
<body  class="easyui-layout" style="overflow-y: hidden; "  fit="true" web-controller-path="<?php echo $_smarty_tpl->tpl_vars['web_controller_path']->value;?>
"  scroll="no">
   <noscript><!--测试用户浏览器是否支持脚本-->
        <div style=" position:absolute; z-index:100000; height:2046px;top:0px;left:0px; width:100%; background:white; text-align:center;">
	    <img src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/image/noscript.gif" alt='抱歉，请开启脚本支持！' />
        </div>
   </noscript>
   <div id="loading-mask" style="position:absolute;top:0px; left:0px; width:100%; height:100%; background:#D2E0F2; z-index:20000">
   <div id="pageloading" style="position:absolute; top:50%; left:50%; margin:-120px 0px 0px -120px; text-align:center;  border:2px solid #8DB2E3; width:200px; height:40px;  font-size:14px;padding:10px; font-weight:bold; background:#fff; color:#15428B;"> 
    <img src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/image/loading32.gif" align="absmiddle" /> 正在加载中,请稍候...</div>
   </div><!--加载页面-->
   <div region="north" split="true" border="false" style="overflow: hidden; height: 30px;
		background: url(<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/image/layout-browser-hd-bg.gif) #7f99be repeat-x center 50%;
		line-height: 20px;color: #fff; font-family: Verdana, 微软雅黑,黑体">
		<span style="float:right; padding-right:20px;" class="head">欢迎 <b id="curname"><?php echo $_SESSION['username'];?>
</b><a href="loginOut.aspx" id="loginOut">安全退出</a></span>
		<span style="padding-left:10px; font-size: 16px; "><img src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/image/logo.gif" width="20" height="20" align="absmiddle" /> 苦B的内容管理系统</span>
	</div><!--头部head部分-->
    <div region="west" split="true" title="导航菜单" style="width:180px;" id="west">
			<div id="lnav" class="easyui-accordion" fit="true" border="false">
		        <!--  导航内容 -->
			</div>
	</div>
    <div id="mainPanle" region="center" style="background: #eee; overflow-y:hidden">
		<div id="tabs" class="easyui-tabs"  fit="true" border="false" >
			<div title="欢迎使用" style="padding:20px;overflow:auto;" id="home">
				
				<?php  $_smarty_tpl->tpl_vars['ss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ss']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sessioninfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ss']->key => $_smarty_tpl->tpl_vars['ss']->value){
$_smarty_tpl->tpl_vars['ss']->_loop = true;
?>
					<?php echo $_smarty_tpl->tpl_vars['ss']->key;?>
:<?php echo $_smarty_tpl->tpl_vars['ss']->value;?>
<br />
				<?php } ?>
            
			</div>
		</div>
	</div><!--内容主要操作区-->
    <div region="south" split="true" style="height: 30px; background: #D2E0F2; ">
		<div class="footer">欢迎使用kubcms</div>
	</div><!--版权部分-->
    <div id="mm" class="easyui-menu" style="width:150px;">
		<div id="mm-refresh">刷新</div>
		<div class="menu-sep"></div>
		<div id="mm-tabclose">关闭</div>
		<div id="mm-tabcloseall">全部关闭</div>
		<div id="mm-tabcloseother">除此之外全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-tabcloseright">当前页右侧全部关闭</div>
		<div id="mm-tabcloseleft">当前页左侧全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-exit">退出</div>
	</div><!--右击tab部分的菜单栏-->
    <div id="w"></div><!--弹出框所承载的DIV-->
    <div id="i"></div>
    <div id="d"></div>
</body>
</html>
<?php }} ?>