<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:18:15
         compiled from "D:\coreamp\htdocs\kubcms\view\default\article\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28794550e0a479efb85-80607721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c304915a3c5bf9930b7f7e4faf664283e132531e' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\default\\article\\list.tpl',
      1 => 1394239161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28794550e0a479efb85-80607721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article_list' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e0a47a4b919_01669764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e0a47a4b919_01669764')) {function content_550e0a47a4b919_01669764($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article_list']->value["data"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>

<?php } ?>

 
</body>
</html><?php }} ?>