<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:16:07
         compiled from "D:\coreamp\htdocs\kubcms\view\admin\link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31934550e09c7d0c458-01098421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72cca9798fb9fd9ff36fd7a7e74a40f1bbe823c0' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\admin\\link.tpl',
      1 => 1394150700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31934550e09c7d0c458-01098421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e09c7d62540_61696351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e09c7d62540_61696351')) {function content_550e09c7d62540_61696351($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table id="tt" width="100%"></table>

<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/link.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>