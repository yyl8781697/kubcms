<?php /* Smarty version Smarty-3.1.12, created on 2015-03-21 23:52:44
         compiled from "D:\coreamp\htdocs\huizhou\view\admin\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4898550e044c496520-79105459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2efcdfea00210b0b3fe186920208771590b0ad39' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\huizhou\\view\\admin\\user.tpl',
      1 => 1394068337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4898550e044c496520-79105459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e044c4e15a7_28965664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e044c4e15a7_28965664')) {function content_550e044c4e15a7_28965664($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--<div class="toolbar">
<a id="delete" href="#" plain="true" class="easyui-linkbutton" icon="icon-delete" title="删除">删除</a>&nbsp;&nbsp;
<a id="search" href="#" plain="true" class="easyui-linkbutton" icon="icon-zoom" title="查询">查询</a>&nbsp;&nbsp;
</div>-->

<table id="tt" width="100%"></table>


<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/user.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>