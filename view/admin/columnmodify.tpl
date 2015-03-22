<{include file="header.tpl"}>

<div class="toolbar">
<a id="add" href="#" plain="true" class="easyui-linkbutton" icon="icon-add" title="添加">添加</a>&nbsp;&nbsp;
<a id="save" href="#" plain="true" class="easyui-linkbutton" icon="icon-save" title="保存">保存</a>&nbsp;&nbsp;
<a id="back" href="<{$web_controller_path}>/column" plain="true" class="easyui-linkbutton" icon="icon-back" title="返回">返回</a>&nbsp;&nbsp;
</div>


<div id="columnform">
	<table id="uiform" cellpadding=5 cellspacing=1 width=100% align="center" class="grid2" border=0>
		<tr>
			<td align="right">
				栏目名称
			</td>
			<td align="left">
				<input missingMessage="请输入栏目名称!" required="true" name="name" type="text" value="<{$columninfo['name']}>" style="width:140px" class="txt03" id="name" />
			</td>
			<td align="right">
				上级栏目
			</td>
			<td align="left">
				<input name="parentid" id="parentid" value="0" orginvalue="<{$columninfo['parentid']}>" style="width:200px;" />
			</td>
		</tr>
		<tr>
			<td align="right">
				栏目别名
			</td>
			<td align="left" colspan="3"> 
				<input  name="urlname" type="text" style="width:140px" class="txt03" id="urlname" validType="engparam" value="<{$columninfo['urlname']}>" />
				只能使用字母、数字、-连字符、_下划线
			</td>

		</tr>
		<tr>
			<td align="right">
				栏目类型
			</td>
			<td align="left">
				<select name="type" id="type" orginvalue="<{$columninfo['type']}>"></select>
			</td>
			<td align="right">
				导航类型
			</td>
			<td align="left">
				<select name="navigation" id="navigation" orginvalue="<{$columninfo['navigation']}>"></select>
			</td>
		</tr>
		<tr>
			<td align="right">
				链接地址
			</td>
			<td align="left">
				<input name="linkurl" type="text" value="<{$columninfo['linkurl']}>" style="width:140px" class="txt03" id="linkurl" />
			</td>
			<td align="right">
				打开方式
			</td>
			<td align="left">
				<select name="linktarget" id="linktarget" orginvalue="<{$columninfo['linktarget']}>"></select>
			</td>
		</tr>
		<tr>
			<td align="right">
				显示顺序
			</td>
			<td align="left">
				<input missingMessage="请输入数字!" min="0" max="999" required="true" name="colindex" type="text" style="width:140px" class="easyui-numberspinner" id="colindex" value="<{$columninfo['colindex']}>"  />
			</td>
			<td align="right">
				是否显示
			</td>
			<td align="left">
				<input type="checkbox" name="isenabled" id="isenabled" <{if $columninfo['isenabled']>0}>checked<{/if}> />
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<textarea style="height:200px;width:100%;" name="content" id="content"><{$columninfo["content"]}></textarea>
				<input type="hidden" value="<{$columninfo['colid']}>" name="colid" id="colid" />
			</td>
		</tr>
	</table>
</div>

<link rel="stylesheet" href="<{$public_path}>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<{$public_path}>/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" type="text/javascript" src="<{$public_path}>/kindeditor/kindeditor.js"></script>
<script charset="utf-8" type="text/javascript" src="<{$public_path}>/kindeditor/lang/zh_CN.js"></script>
<script src="<{$public_path}>/javascript/bussiness/columnmodify.js" type="text/javascript"></script>
<{include file="footer.tpl"}>