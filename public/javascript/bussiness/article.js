$(function(){

	var web_controller_path=$("body").attr("web-controller-path");
	
	init();

	function init(){

		//加载栏目树
		$("#tree").tree({
			url:web_controller_path+"/article_column_list",
			onClick:function(node){

				if(node.id==0)
				{
					$("#tt").datagrid({url:web_controller_path+"/getarticlelist"});
					return ;
				}
				var childrens=$("#tree").tree("getChildren",node.target);
				//表示没有子节点
				if(childrens.length==0)
				{
					var colid=node.id;
					$("#tt").datagrid({url:web_controller_path+"/getarticlelist/"+colid});

				}else{
					//如果有子节点 要获取节点内的所有数据
					var colids=Array(childrens.length);
					$.each(childrens,function(i,n){
						colids[i]=n.id;
					})
					$("#tt").datagrid({url:web_controller_path+"/getarticlelist/"+colids.join(",")});
				}
			}
		})

		//加载文章列表信息
		$("#tt").datagrid({
			title:"文章",
			height:450,
			columns:[[
			    {field:'articleid',title:'文章ID',width:80,rowspan:2,sortable:true,checkbox:true},
			    {field:'colname',title:'栏目',width:150,rowspan:2},
			    {field:'title',title:'标题',width:200,colspan:4},
			    {field:'author',title:'作者',width:120,colspan:4,resizable:true},
			    {field:'createtime',title:'添加时间',width:120,colspan:40},
			    {field:'istop',title:'置顶',width:80,colspan:4,sortable:true,formatter:format_boolean},
			    {field:'hits',title:'点击量',width:80,colspan:4,sortable:true},
			    {field:'isenabled',title:'有效',width:80,colspan:4,sortable:true,formatter:format_boolean}
				]],
			url:web_controller_path+"/getarticlelist",
			fitColumns:true,
			pagination:true,
			pageSize:10,
			toolbar: [{ 
	            text: '添加', 
	            iconCls: 'icon-add', 
	            handler: function() { 
	                location.href=web_controller_path+"/article/add";
	            } 
	        }, '-', { 
	            text: '修改', 
	            iconCls: 'icon-edit', 
	            handler: function() { 
	                var row = $('#tt').datagrid('getSelected');
	                if(row==null || row=="undefined")
	                {
	                	$.messager.alert("警告","请选择要修改的文章","warning");
	                }else{
	                	location.href=web_controller_path+"/article/edit/"+row.articleid;
	                }
	            } 
	        }, '-',{ 
	            text: '删除', 
	            iconCls: 'icon-delete', 
	            handler: function(){ 
	                var rows = $('#tt').datagrid('getSelections');
	                var rows_length=rows.length;
	                if(rows_length==0 || rows=="undefined") 
	                {
	                	$.messager.alert("警告","请选择要删除的文章","warning");
	                }else{

	                	var alert_msg="您确认要删除文章："+rows[0].title+"吗？";
	                	if(rows_length!=1)
	                	{
	                		alert_msg="您确认要删除这"+rows_length+"篇文章吗？";
	                	}

	                	$.messager.confirm("确认删除",alert_msg,function(b){
	                		if(b)
	                		{
	                			var arr_articleid=new Array(rows_length);
	                			$.each(rows,function(i,n){
	                				arr_articleid[i]=n.articleid;
	                			})

	                			$.ajaxtext(web_controller_path+"/deletearticle",{"articleids":arr_articleid.join(",")});
	                		}
	                	})
	                }
	            } 
	        }]

		});//datagrid
	}


	//格式化布尔的东西的
	function format_boolean(value,rowData,rowIndex)
	{
		return value>0?"是":"否";
	}

})