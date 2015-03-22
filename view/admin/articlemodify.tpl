<{include file="header.tpl"}>

<div class="toolbar">
<a id="add" href="#" plain="true" class="easyui-linkbutton" icon="icon-add" title="添加">添加</a>&nbsp;&nbsp;
<a id="save" href="#" plain="true" class="easyui-linkbutton" icon="icon-save" title="保存">保存</a>&nbsp;&nbsp;
<a id="back" href="<{$web_controller_path}>/article" plain="true" class="easyui-linkbutton" icon="icon-back" title="返回">返回</a>&nbsp;&nbsp;
</div>

<form id="articleform" name="articleform" method="post" enctype="multipart/form-data">
	<table id="uiform" cellpadding=5 cellspacing=1 width=100% align="center" class="grid2" border=0>
		<tr>
			<td colspan="3">文章名称：<input missingMessage="请输入文章名称!" required="true" name="title" type="text" value="<{$articleinfo['title']}>" style="width:400px;color:<{$articleinfo['color']}>" class="txt03" id="title" />
			<img src="<{$public_path}>/image/colorpicker.png" id="colorPic" style="cursor:pointer"/>

			<input type="hidden" name="color" id="color" readonly="true" value="<{$articleinfo['color']}>" />
			</td>
		</tr>
		<tr>
			<td>文章栏目：<input name="colid" id="colid" value="0" orginvalue="<{$articleinfo['colid']}>" style="width:200px;" />
			</td>
			<td>文章作者：<input type="text" name="author" id="author" value="<{$articleinfo['author']}>"  />
			</td>
			<td>url别名：<input type="text" name="urlname" id="urlname" validType="engparam" value="<{$articleinfo['urlname']}>" />
			</td>
		</tr>
		<tr>
			<td>文章来源：<input type="text" name="source" id="source" value="<{$articleinfo['source']}>"  />
			</td>
			<td colspan="2">文章关键词：<input type="text" name="tags" id="tags" style="width:200px" value="<{$articleinfo['tags']}>"  />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<textarea style="height:200px;width:100%;" name="content" id="content"><{$articleinfo["content"]}></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			上传文章代表图：<input type="file" name="fileupload" id="fileupload" />
			<input type="text" name="imagepath" id="imagepath" readonly="true" value="<{$articleinfo['imagepath']}>" />
			</td>
		</tr>
		<tr>
			<td>
				置顶：<input type="checkbox" name="istop" id="istop" <{if $articleinfo['istop']>0}>checked<{/if}> />
			</td>
			
			<td colspan="2">
				有效：<input type="checkbox" name="isenabled" id="isenabled" <{if $articleinfo['isenabled']>0}>checked<{/if}> />
				<input type="hidden" value="<{$articleinfo['articleid']}>" name="articleid" id="articleid" />
			</td>
		</tr>
	</table>
</form>

<link rel="stylesheet" href="<{$public_path}>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<{$public_path}>/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" type="text/javascript" src="<{$public_path}>/kindeditor/kindeditor.js"></script>
<script charset="utf-8" type="text/javascript" src="<{$public_path}>/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" type="text/javascript" src="<{$public_path}>/javascript/jquery.form.js"></script>
<script src="<{$public_path}>/javascript/jquery.colorpicker.js" type="text/javascript"></script>
<script src="<{$public_path}>/javascript/bussiness/articlemodify.js" type="text/javascript"></script>

<{include file="footer.tpl"}>