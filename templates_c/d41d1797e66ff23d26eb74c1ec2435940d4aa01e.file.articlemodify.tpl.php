<?php /* Smarty version Smarty-3.1.12, created on 2015-03-22 00:16:49
         compiled from "D:\coreamp\htdocs\kubcms\view\admin\articlemodify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:699550e09f1d97f92-88531875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41d1797e66ff23d26eb74c1ec2435940d4aa01e' => 
    array (
      0 => 'D:\\coreamp\\htdocs\\kubcms\\view\\admin\\articlemodify.tpl',
      1 => 1394068908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '699550e09f1d97f92-88531875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_controller_path' => 0,
    'articleinfo' => 0,
    'public_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_550e09f1e5ef21_74824051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e09f1e5ef21_74824051')) {function content_550e09f1e5ef21_74824051($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="toolbar">
<a id="add" href="#" plain="true" class="easyui-linkbutton" icon="icon-add" title="添加">添加</a>&nbsp;&nbsp;
<a id="save" href="#" plain="true" class="easyui-linkbutton" icon="icon-save" title="保存">保存</a>&nbsp;&nbsp;
<a id="back" href="<?php echo $_smarty_tpl->tpl_vars['web_controller_path']->value;?>
/article" plain="true" class="easyui-linkbutton" icon="icon-back" title="返回">返回</a>&nbsp;&nbsp;
</div>

<form id="articleform" name="articleform" method="post" enctype="multipart/form-data">
	<table id="uiform" cellpadding=5 cellspacing=1 width=100% align="center" class="grid2" border=0>
		<tr>
			<td colspan="3">文章名称：<input missingMessage="请输入文章名称!" required="true" name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['title'];?>
" style="width:400px;color:<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['color'];?>
" class="txt03" id="title" />
			<img src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/image/colorpicker.png" id="colorPic" style="cursor:pointer"/>

			<input type="hidden" name="color" id="color" readonly="true" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['color'];?>
" />
			</td>
		</tr>
		<tr>
			<td>文章栏目：<input name="colid" id="colid" value="0" orginvalue="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['colid'];?>
" style="width:200px;" />
			</td>
			<td>文章作者：<input type="text" name="author" id="author" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['author'];?>
"  />
			</td>
			<td>url别名：<input type="text" name="urlname" id="urlname" validType="engparam" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['urlname'];?>
" />
			</td>
		</tr>
		<tr>
			<td>文章来源：<input type="text" name="source" id="source" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['source'];?>
"  />
			</td>
			<td colspan="2">文章关键词：<input type="text" name="tags" id="tags" style="width:200px" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['tags'];?>
"  />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<textarea style="height:200px;width:100%;" name="content" id="content"><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value["content"];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			上传文章代表图：<input type="file" name="fileupload" id="fileupload" />
			<input type="text" name="imagepath" id="imagepath" readonly="true" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['imagepath'];?>
" />
			</td>
		</tr>
		<tr>
			<td>
				置顶：<input type="checkbox" name="istop" id="istop" <?php if ($_smarty_tpl->tpl_vars['articleinfo']->value['istop']>0){?>checked<?php }?> />
			</td>
			
			<td colspan="2">
				有效：<input type="checkbox" name="isenabled" id="isenabled" <?php if ($_smarty_tpl->tpl_vars['articleinfo']->value['isenabled']>0){?>checked<?php }?> />
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['articleid'];?>
" name="articleid" id="articleid" />
			</td>
		</tr>
	</table>
</form>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/kindeditor/kindeditor.js"></script>
<script charset="utf-8" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/jquery.form.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/jquery.colorpicker.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['public_path']->value;?>
/javascript/bussiness/articlemodify.js" type="text/javascript"></script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>