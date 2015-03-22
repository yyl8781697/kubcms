<?php /* Smarty version Smarty-3.1.12, created on 2014-03-11 11:48:25
         compiled from "F:\htdocs\huizhou\view\admin\column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30296531e878997e869-75356830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47f7d33c527219f98f7025103de027d51d510ae1' => 
    array (
      0 => 'F:\\htdocs\\huizhou\\view\\admin\\column.tpl',
      1 => 1394122015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30296531e878997e869-75356830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_531e8789ae7b69_18765773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531e8789ae7b69_18765773')) {function content_531e8789ae7b69_18765773($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table id="treetable" width="100%"></table>
<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/column.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>