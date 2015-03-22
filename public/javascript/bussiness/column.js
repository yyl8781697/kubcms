$(function(){
	
	var web_controller_path=$("body").attr("web-controller-path");

	init_data();

	$("#add").click(function(){
		location.href="column/add";
	})

	$("#edit").click(function(){

	})

	function init_data()
	{
		$("#treetable").treegrid({
				title:"栏目列表",
				animate:true,
				collapsible:true,
				url:web_controller_path+'/all_column_list',
				idField:'colid',
				treeField:'name',
				nowrap: false,
				rownumbers: true,
				columns:[[
					//{field:'colid',title:'栏目ID',width:150},
					{field:'name',title:'名称',width:250,rowspan:2},
					{field:'urlname',title:'url别名',width:150,rowspan:2},
					{field:'type',title:'类型',width:50,rowspan:2,formatter:format_type},
					{field:'navigation',title:'导航',width:100,rowspan:2,formatter:format_navigation},
					{field:'linktarget',title:'打开方式',width:100,rowspan:2,formatter:format_linktarget},
					{field:'createtime',title:'创建时间',width:150,rowspan:2},
					{field:'colindex',title:'顺序',width:40,rowspan:2},
					{field:'isenabled',title:'状态',width:40,rowspan:2,formatter:format_isenabled}
				]],
				toolbar: [{ 
	            text: '添加', 
	            iconCls: 'icon-add', 
	            handler: function() { 
	                location.href="column/add";
	            } 
	        }, '-', { 
	            text: '编辑', 
	            iconCls: 'icon-edit', 
	            handler: function() { 
	                var row = $('#treetable').treegrid('getSelected');
	                if(row==null || row=="undefined")
	                {
	                	$.messager.alert("警告","请选择要编辑的栏目","warning");
	                }else{
	                	location.href="column/edit/"+row.colid;
	                }
	            } 
	        }, '-',{ 
	            text: '删除', 
	            iconCls: 'icon-delete', 
	            handler: function(){ 
	                var row = $('#treetable').treegrid('getSelected');
	                if(row==null || row=="undefined")
	                {
	                	$.messager.alert("警告","请选择要删除的栏目","warning");
	                }else{
	                	if($('#treetable').treegrid("getChildren",row.colid).length>0)
	                	{
	                		$.messager.alert("警告","该栏目下面还有子级栏目，不能删除","warning");
	                		return false;
	                	}

	                	$.messager.confirm("确认删除","您确认要删除栏目："+row.name+"吗？",function(b){
	                		if(b)
	                		{
	                			$.ajaxtext(web_controller_path+'/deletecolumn',{"colid":row.colid});
	                		}
	                	})
	                }
	            } 
	        }]


		})
	}

	function format_type(value,rowData,rowIndex)
	{
		var type="未知";
		switch(value)
		{
			case "home":type="主页";break;
			case "category":type="目录";break;
			case "article":type="文章";break;
			case "single":type="单页";break;
			case "link":type="链接";break;
		}
		return type;
	}

	function format_navigation(value,rowData,rowIndex)
	{
		var navigation="非导航";
		switch(value)
		{
			case "main":navigation="主导航";break;
			case "side":navigation="侧导航";break;
			case "none":navigation="非导航";break;
		}
		return navigation;
	}

	function format_isenabled(value,rowData,rowIndex)
	{
		if(value>0)
		{
			return "显示";
		}else{
			return "隐藏";
		}
	}

	function format_linktarget(value,rowData,rowIndex)
	{
		var linktarget="本页面";
		switch(value)
		{
			case "_self":type="本页面";break;
			case "_blank":type="新窗口";break;
			case "_parent":type="父窗口";break;
		}
		return linktarget;
	}




})