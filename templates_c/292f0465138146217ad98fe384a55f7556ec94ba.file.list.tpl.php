<?php /* Smarty version Smarty-3.1.12, created on 2014-03-08 23:39:21
         compiled from "F:\htdocs\huizhou\view\default\article\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22406531b38b2657c16-37662138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '292f0465138146217ad98fe384a55f7556ec94ba' => 
    array (
      0 => 'F:\\htdocs\\huizhou\\view\\default\\article\\list.tpl',
      1 => 1394293161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22406531b38b2657c16-37662138',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_531b38b26b8984_15731649',
  'variables' => 
  array (
    'article_list' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531b38b26b8984_15731649')) {function content_531b38b26b8984_15731649($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article_list']->value["data"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>

<?php } ?>

 
</body>
</html><?php }} ?>