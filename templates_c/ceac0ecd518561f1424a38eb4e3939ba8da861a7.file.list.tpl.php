<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:04
         compiled from "D:\coreamp\htdocs\huizhou\view\default\article\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8937550e0424e43802-79848751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ceac0ecd518561f1424a38eb4e3939ba8da861a7' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\default\\article\\list.tpl',
      1 => 1394239161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8937550e0424e43802-79848751',
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
  'unifunc' => 'content_550e0424e952b5_04322332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e0424e952b5_04322332')) {function content_550e0424e952b5_04322332($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article_list']->value["data"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>

<?php } ?>

 
</body>
</html><?php }} ?>