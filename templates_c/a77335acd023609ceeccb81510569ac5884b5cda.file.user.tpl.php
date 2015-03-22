<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:16:05
         compiled from "D:\coreamp\htdocs\kubcms\view\admin\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14178550e09c5a99c03-68552261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a77335acd023609ceeccb81510569ac5884b5cda' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\admin\\user.tpl',
      1 => 1394068337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14178550e09c5a99c03-68552261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e09c5ae6ca5_74585170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e09c5ae6ca5_74585170')) {function content_550e09c5ae6ca5_74585170($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--<div class="toolbar">
<a id="delete" href="#" plain="true" class="easyui-linkbutton" icon="icon-delete" title="删除">删除</a>&nbsp;&nbsp;
<a id="search" href="#" plain="true" class="easyui-linkbutton" icon="icon-zoom" title="查询">查询</a>&nbsp;&nbsp;
</div>-->

<table id="tt" width="100%"></table>


<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/user.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>