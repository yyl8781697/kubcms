/**************************
用户操作js
power by kub
blog:http://www.cnbolgs.com/yyl8781697
**************************/

$(function(){
	
	init();

	function init(){
		$("#tt").datagrid({
			title:"用户列表",
			width:$(".containerBody").width(),
			height:250,
			columns:[[
			    {field:'userid',title:'用户ID',width:80,rowspan:2,sortable:true,checkbox:true},
			    {field:'useraccount',title:'账号',width:80,rowspan:2},
			    {field:'username',title:'姓名',width:80,colspan:4},
			    {field:'email',title:'邮箱',width:120,colspan:4,resizable:true},
			    {field:'telephone',title:'电话',width:120,colspan:40},
			    {field:'level',title:'等级',width:80,colspan:4,sortable:true,formatter:format_level},
			    {field:'isenabled',title:'有效',width:50,colspan:4,sortable:true,formatter:format_enable}
				]],
			url:"getuserlist",
			fitColumns:true,
			pagination:true,
			pageSize:10,
			singleSelect:true,
			toolbar: [{ 
	            text: '添加', 
	            iconCls: 'icon-add', 
	            handler: function() { 
	                user_dialog();
	            } 
	        }, '-', { 
	            text: '修改', 
	            iconCls: 'icon-edit', 
	            handler: function() { 
	                var row = $('#tt').datagrid('getSelected');
	                if(row==null || row=="undefined")
	                {
	                	$.messager.alert("警告","请选择要修改的用户","warning");
	                }else{
	                	user_dialog(row);
	                }
	            } 
	        }, '-',{ 
	            text: '删除', 
	            iconCls: 'icon-delete', 
	            handler: function(){ 
	                var row = $('#tt').datagrid('getSelected');
	                if(row==null || row=="undefined")
	                {
	                	$.messager.alert("警告","请选择要删除的用户","warning");
	                }else{
	                	$.messager.confirm("确认删除","您确认要删除用户："+row.username+"吗？",function(b){
	                		if(b)
	                		{
	                			$.ajaxgrid("deleteuser",{"userid":row.userid});
	                		}
	                	})
	                }
	            } 
	        }]

		});
	}

	function format_enable(value,rowData,rowIndex)
	{
		return value==0?"无效":"有效";
	}

	function format_level(value,rowData,rowIndex)
	{
		return value==0?"普通管理员":"超级管理员";
	}

	function user_dialog(row)
	{
		var model=(row!=null && row!="undefined")?"edit":"add";
		var title="添加用户"
		var url="adduser"
		if(model=="edit")
		{
			title="修改用户";
			url="updateuser";
		}
		$("#w").hWindow({html:get_html(),title:title,width:400,height:320,iconCls:"icon-user",submit:function(){
				if($("#txtusername").validatebox("isValid")&&
					$("#txtuseraccount").validatebox("isValid")&&
					$("#txtemail").validatebox("isValid")&&
					$("#txtpassword").validatebox("isValid")&&
					$("#txttelephone").validatebox("isValid"))
				{

					if(model=="add"&&$("#txtpassword").val()=="")
					{
						$.messager.alert("警告","请输入密码","warning");
						return false;
					}

					if($("#txtpassword").val()!=$("#txtpassword2").val())
					{
						$.messager.alert("警告","您两次输入的密码不正确","warning");
						return false;
					}
					//alert($("#uiform input,select").serialize());
					/*$.post(url,$("#uiform input,select").serialize(),function(result,status){
						result=result.json();
						if(result.state=="success")
						{
							$.messager.alert("操作成功",result.msg,"info",function(){
								//window.location.reload();
								$("#tt").datagrid("reload");
								$("#w").window("close");
							});
						}else{
							$.messager.alert("错误",result.msg,"error");
						}//if

					})//post*/
					$.ajaxgrid(url,$("#uiform input,select").serialize());

				}
			}
		})
		
		init_level();
		$("#uiform :input").validatebox();
		if(model=="edit")
		{
			init_form(row);
		}
	}

	function init_level()
	{
		var data=[{"value":1,text:"超级管理员"},{"value":0,text:"普通管理员","selected":true}];
		$("#level").combobox({
			data:data,
			valueField:"value",
			textField:"text",
			panelHeight:50,
			editable:false
		});
	}

	function init_form(userinfo)
	{
		$("#txtusername").val(userinfo.username);
		$("#txtuseraccount").val(userinfo.useraccount).attr("disabled","disabled");
		$("#txtemail").val(userinfo.email);
		$("#txttelephone").val(userinfo.telephone);
		$("#level").combobox("setValue",userinfo.level);
		$("#isenabled").attr("checked",userinfo.isenabled==0?false:true);
		$("#userid").val(userinfo.userid);
	}

	function get_html()
	{
		var html = '<table id="uiform" cellpadding=5 cellspacing=1 width=100% align="center" class="grid2" border=0><tr><td align="right">'
        html += '姓名</td><td align="left"><input missingMessage="请输入姓名!" required="true" name="username" type="text" value="" style="width:140px" class="txt03" id="txtusername" /></td></tr><tr><td  align="right">';
        html += '账号</td><td align="left"><input missingMessage="请输入账号!" required="true" name="useraccount" type="text" value="" style="width:140px" class="txt03" id="txtuseraccount"  /></td></tr><tr><td  align="right">';
        html += '密码：</td><td align="left"><input  name="password" type="password" value="" style="width:140px" class="txt03" id="txtpassword" validType="safepass"/></td></tr><tr><td align="right">';
        html += '确认密码：</td><td align="left"><input  name="password2" type="password" value="" style="width:140px" class="txt03" id="txtpassword2" validType="safepass"; /></td></tr><tr><td align="right">';
        html += '邮箱：</td><td align="left"><input missingMessage="请输入邮箱!" required="true" name="email" type="text" id="txtemail"   style="width:140px" class="txt03" validType="email"  /></td></tr><td align="right">';
        html += '电话：</td><td align="left"><input missingMessage="请输入联系方式!" required="true" type="text" name="telephone" id="txttelephone"   style="width:140px" class="txt03" /></td></tr><td align="right">';
        html += '级别：</td><td align="left"><select name="level" id="level" ></select></td></tr><td align="right">';
        html += '</td><td align="left"><input name="isenabled" type="checkbox" id="isenabled" checked="checked" />有效<input type="hidden" name="userid" id="userid" /></td></tr>';
        html += '</table>';
        return html;
	}



})