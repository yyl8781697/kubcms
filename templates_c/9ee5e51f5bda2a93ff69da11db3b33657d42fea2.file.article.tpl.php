<?php /* Smarty version Smarty-3.1.12, created on 2014-03-11 11:48:26
         compiled from "F:\htdocs\huizhou\view\admin\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29719531e878ab758c2-66640778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ee5e51f5bda2a93ff69da11db3b33657d42fea2' => 
    array (
      0 => 'F:\\htdocs\\huizhou\\view\\admin\\article.tpl',
      1 => 1394122289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29719531e878ab758c2-66640778',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_531e878ac02a23_22064829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531e878ac02a23_22064829')) {function content_531e878ac02a23_22064829($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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