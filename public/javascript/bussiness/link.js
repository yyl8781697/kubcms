/**************************
用户操作js
power by kub
blog:http://www.cnbolgs.com/yyl8781697
**************************/

$(function(){
	
	//控制器的web路径
	var web_controller_path=$("body").attr("web-controller-path");

	init();
	edit_index=undefined;

	function init(){
		$("#tt").datagrid({
			title:"用户列表",
			width:$(".containerBody").width(),
			singleSelect:true,
			height:250,
			columns:[[
			    {field:'linkid',title:'链接Id',width:80,rowspan:2,sortable:true,checkbox:true},
			    {field:'title',title:'链接标题',width:80,rowspan:2,editor:{type:'text',options:{required:true}}},
			    {field:'url',title:'链接地址',width:300,colspan:4,editor:{type:'text',options:{required:true}}},
			    {field:'linkindex',title:'显示顺序',width:120,colspan:4,resizable:true,editor:{type:"numberbox"}}
				]],
			url:"getlinklist",
			fitColumns:true,
			pagination:true,
			pageSize:10,
			onClickRow:on_click_row,
			toolbar: [{ 
	            text: '添加', 
	            iconCls: 'icon-add', 
	            handler: add_link
	        }, '-', { 
	            text: '接搜修改', 
	            iconCls: 'icon-edit', 
	            handler: accept_change
	        }, '-',{ 
	            text: '撤销', 
	            iconCls: 'icon-undo', 
	            handler: reject_change
	        }, '-',{ 
	            text: '删除', 
	            iconCls: 'icon-delete', 
	            handler: delete_link
	        }]

		});
	}

	//结束编辑
	function end_editing(){  
            if (edit_index == undefined){return true}  
            if ($('#tt').datagrid('validateRow', edit_index)){  
                /*var ed = $('#dg').datagrid('getEditor', {index:edit_index,field:'productid'});  
                var productname = $(ed.target).combobox('getText');  
                $('#tt').datagrid('getRows')[edit_index]['productname'] = productname;  */
                $('#tt').datagrid('endEdit', edit_index);  
                edit_index = undefined;  
                return true;  
            } else {  
                return false;  
            }  
    }

    //行的单机
	function on_click_row(index)
	{
		if(edit_index!=index)
		{
			 if (end_editing()){  
                    $('#tt').datagrid('selectRow', index)  
                            .datagrid('beginEdit', index);  
                    edit_index = index;  
                } else {  
                    $('#tt').datagrid('selectRow', edit_index);  
                }  
		}
	}

	//添加一个链接
	function add_link()
	{
		if (end_editing()){  
			$('#tt').datagrid('appendRow',{linkindex:'1'});
			edit_index = $('#tt').datagrid('getRows').length-1;  
            $('#tt').datagrid('selectRow', edit_index)  
                    .datagrid('beginEdit', edit_index);  
		}
	}

	//接收修改 同时会保存数据
	function accept_change()
	{
		//这个定义是用来收到ajax的回调信息的
		var result="";
		//这个定义是用于操作之后显示的信息
		var msg="";
		//获取改变的行
		var rows=$("#tt").datagrid("getChanges");
		if(rows.length>0)
		{
			for (var i = 0; i < rows.length; i++) {
				//没有得到linkid  则是添加操作
				data_map={"linkid":rows[i].linkid,"title":rows[i].title,"url":rows[i].url,"linkindex":rows[i].linkindex};
				if(rows[i].linkid==undefined)
				{	
					result=$.ajaxdata(web_controller_path+"/addlink",data_map);
				}else{
					result=$.ajaxdata(web_controller_path+"/updatelink",data_map);
					//否则就是更新操作
				}
				msg+=rows[i].title+result.msg+"\r\n";
			}
			//接收修改
			$("#tt").datagrid("acceptChanges");
			$.messager.alert("操作成功",msg);

		}
		
	}

	//取消修改
	function reject_change()
	{
		$('#tt').datagrid('rejectChanges');  
        edit_index = undefined;  
	}

	//删除链接
	function delete_link()
	{
		var rows = $('#tt').datagrid('getSelections');
	                var rows_length=rows.length;
	                if(rows_length==0 || rows=="undefined") 
	                {
	                	$.messager.alert("警告","请选择要删除的链接","warning");
	                }else{

	                	var alert_msg="您确认要删除链接："+rows[0].title+"吗？";
	                	if(rows_length!=1)
	                	{
	                		alert_msg="您确认要删除这"+rows_length+"个链接吗？";
	                	}

	                	$.messager.confirm("确认删除",alert_msg,function(b){
	                		if(b)
	                		{
	                			var arr_linkid=new Array(rows_length);
	                			$.each(rows,function(i,n){
	                				arr_linkid[i]=n.linkid;
	                			})
	                			alert(arr_linkid.join(","));
	                			//$.ajaxtext(web_controller_path+"/deletearticle",{"articleids":arr_articleid.join(",")});
	                		}
	                	})
	                }
	}

})