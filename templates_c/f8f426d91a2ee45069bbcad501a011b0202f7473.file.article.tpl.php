<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:16:08
         compiled from "D:\coreamp\htdocs\kubcms\view\admin\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12575550e09c85fb322-48717634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8f426d91a2ee45069bbcad501a011b0202f7473' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\admin\\article.tpl',
      1 => 1394068289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12575550e09c85fb322-48717634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e09c8645ec7_98183220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e09c8645ec7_98183220')) {function content_550e09c8645ec7_98183220($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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