<?php /* Smarty version Smarty-3.1.12, created on 2014-03-11 11:48:26
         compiled from "F:\htdocs\huizhou\view\admin\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29649531e878a5d9e66-04241036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b511d40fa6b8f345ec6ba8270049f04867214ca' => 
    array (
      0 => 'F:\\htdocs\\huizhou\\view\\admin\\user.tpl',
      1 => 1394122337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29649531e878a5d9e66-04241036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_531e878a681324_91509835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531e878a681324_91509835')) {function content_531e878a681324_91509835($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--<div class="toolbar">
<a id="delete" href="#" plain="true" class="easyui-linkbutton" icon="icon-delete" title="删除">删除</a>&nbsp;&nbsp;
<a id="search" href="#" plain="true" class="easyui-linkbutton" icon="icon-zoom" title="查询">查询</a>&nbsp;&nbsp;
</div>-->

<table id="tt" width="100%"></table>


<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/user.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>