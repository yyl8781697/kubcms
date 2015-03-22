<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:47
         compiled from "D:\coreamp\htdocs\huizhou\view\admin\link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29340550e044fe82575-39263101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9718b354d99f95022a2d170627b188b2b078cd6a' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\admin\\link.tpl',
      1 => 1394150700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29340550e044fe82575-39263101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e044fecf3c7_54149998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e044fecf3c7_54149998')) {function content_550e044fecf3c7_54149998($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table id="tt" width="100%"></table>

<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/link.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>