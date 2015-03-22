<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:45
         compiled from "D:\coreamp\htdocs\huizhou\view\admin\column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9961550e044d4e32f3-39527066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e72ef762fe89f1034d7320dcb7748ad654d4145' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\admin\\column.tpl',
      1 => 1394068015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9961550e044d4e32f3-39527066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e044d52dc89_68273692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e044d52dc89_68273692')) {function content_550e044d52dc89_68273692($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table id="treetable" width="100%"></table>
<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/column.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>