<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:16:06
         compiled from "D:\coreamp\htdocs\kubcms\view\admin\column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1189550e09c67a2d91-03045089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '302600ab0dbe4ce15820efed736daf57d9574ca4' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\admin\\column.tpl',
      1 => 1394068015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1189550e09c67a2d91-03045089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e09c67eebd6_61514059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e09c67eebd6_61514059')) {function content_550e09c67eebd6_61514059($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table id="treetable" width="100%"></table>
<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/column.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>