<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:46
         compiled from "D:\coreamp\htdocs\huizhou\view\admin\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4623550e044e4374b7-37869747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff7ac6cfceebd29d01681716332fa0d2c7bfdbff' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\admin\\article.tpl',
      1 => 1394068289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4623550e044e4374b7-37869747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e044e481b71_11903210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e044e481b71_11903210')) {function content_550e044e481b71_11903210($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="easyui-layout" style="overflow-y: hidden; "  fit="true"  scroll="no">
	 <div region="west" title="文章栏目" style="width:180px" split="true">
	 	<ul id="tree"></ul>
	 </div>  
	 <div region="center">
		 <table id="tt" width="100%"></table>
	 </div>  
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/article.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>