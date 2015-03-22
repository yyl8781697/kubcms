var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
})


$(function(){

	//控制器的web路径
	var web_controller_path=$("body").attr("web-controller-path");

	var data_type=[{"value":"category","text":"目录","selected":true},
				   {"value":"article","text":"文章"},
				   {"value":"single","text":"单页"},
				   {"value":"link","text":"超链接"},
				   {"value":"home","text":"主页"}];
	var data_navigation=[{"value":"main","text":"主导航","selected":true},
						 {"value":"side","text":"侧导航"},
						 {"value":"none","text":"非导航"}];
	var data_linktarget=[{"value":"_self","text":"本页面","selected":true},
						 {"value":"_blank","text":"新窗口"}];

	init_data();
	//如果colid有值，说明是编辑页面  得初始化combo里面的值
	if($("#colid").val()=="" || $("#colid").val()==undefined)
	{
		$("#save").hide();
	}else{
		init_combo_data();
		$("#add").hide();
	}
	
	$("#add").click(function(){
		submit_data(web_controller_path+"/addcolumn");
	})

	$("#save").click(function(){
		submit_data(web_controller_path+"/updatecolumn");
	})

	//初始化数据
	function init_data()
	{
		$("#type").combobox({
			data:data_type,
			valueField:"value",
			textField:"text",
			panelHeight:120,
			editable:false
		})

		$("#navigation").combobox({
			data:data_navigation,
			valueField:"value",
			textField:"text",
			panelHeight:70,
			editable:false
		})

		$("#linktarget").combobox({
			data:data_linktarget,
			valueField:"value",
			textField:"text",
			panelHeight:50,
			editable:false
		})

		
		$("#parentid").combotree({
			url:web_controller_path+"/category_column_list"
		})

		$("#colindex").val(1);
		$("#isenabled").attr("checked",true);
		

		$("#columnform :input").validatebox();
	}

	//初始化 combobox的值  用于编辑页面使用
	function init_combo_data()
	{
		$("#type").combobox("setValue",$("#type").attr("orginvalue"));
		$("#navigation").combobox("setValue",$("#navigation").attr("orginvalue"));
		$("#linktarget").combobox("setValue",$("#linktarget").attr("orginvalue"));
		$("#parentid").combotree("setValue",$("#parentid").attr("orginvalue"));
	}


	function submit_data(action_url)
	{
		if($("#name").validatebox("isValid")&&$("#urlname").validatebox("isValid"))
		{
			var param=$("#columnform input,select").serialize()+"&content="+editor.html();
			//alert(param);

			$.ajaxtext(action_url,param);
		}
	}


})