<?php /* Smarty version Smarty-3.1.12, created on 2014-03-08 23:34:22
         compiled from "F:\htdocs\huizhou\view\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10004531b387ea52663-86139897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa27e68d36c2e8293efb7a65286aa1d7de40164' => 
    array (
      0 => 'F:\\htdocs\\huizhou\\view\\default\\header.tpl',
      1 => 1394290625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10004531b387ea52663-86139897',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_site_config' => 0,
    'public_path' => 0,
    'column_name' => 0,
    'nav' => 0,
    'val' => 0,
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_531b387ea9bc13_20038773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531b387ea9bc13_20038773')) {function content_531b387ea9bc13_20038773($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['web_site_config']->value["title"];?>
</title>
  <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['web_site_config']->value['description'];?>
" />
  <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['web_site_config']->value['keywords'];?>
" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(function(){

    function init()
    {
       $("#navcontent").css('margin-left',($(document).width()-1024)/2);//在导航在1024位置开始起始

       var column_name=$("#navcontent").attr("columnName");
       if(column_name!="")
       {
          $("#navcontent ."+column_name).addClass("active");//激活链接
       }
    }

    init();
    
  })
   
  </script>
</head>
</body style="">

<nav class="navbar navbar-default" role="navigation">
 
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div id="navcontent" style="" columnName="<?php echo $_smarty_tpl->tpl_vars['column_name']->value;?>
" >
    <ul class="nav navbar-nav">
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <li class="<?php echo $_smarty_tpl->tpl_vars['val']->value['urlname'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/article/list/<?php echo $_smarty_tpl->tpl_vars['val']->value['urlname'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></li>
      <?php } ?>
    </ul>
   
  </div><!-- /.navbar-collapse -->
</nav><?php }} ?>