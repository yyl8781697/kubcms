var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
})

$(function(){
	//控制器的web路径
	var web_controller_path=$("body").attr("web-controller-path");

	init_data();
	//如果articleid有值，说明是编辑页面  得初始化combo里面的值
	if($("#articleid").val()=="" || $("#articleid").val()==undefined)
	{
		$("#save").hide();
		$("#isenabled").attr("checked",true);
	}else{
		//init_combo_data();
		$("#colid").combotree("setValue",$("#colid").attr("orginvalue"));
		$("#add").hide();
	}

	$("#colorPic").colorpicker({
	    fillcolor:true,
	    success:function(o,color){
	        $("#title").css("color",color);
	        $("#color").val(color);
	    }
	});

	$("#add").click(function(){
		submit_data(web_controller_path+"/addarticle");
	})

	$("#save").click(function(){
		submit_data(web_controller_path+"/updatearticle");
	})



	function init_data()
	{
		$("#colid").combotree({
			url:web_controller_path+"/article_column_list",
			onSelect:function(record){
				if(record.iconCls.indexOf("article")<0)
				{
					$("#colid").combotree("unselect",record.id);
				}
				
			}
		})

		$("#articleform :input").validatebox();
	}

	//提交数据
	function submit_data(action_url)
	{
		if($("#title").validatebox("isValid")&&$("#urlname").validatebox("isValid"))
		{
			$("#articleform").attr("action",action_url);
			$("#content").html(editor.html());
			$('#articleform').ajaxSubmit({
                        success: function (html, status) {
                            html = html.replace(/<\/?[^>]*>/g, '');
                            html = html.replace(/[ | ]*\n/g, '\n');
                            var json = eval('(' + html + ')');
                            if (json.state == "success") {
                            	$.messager.alert("成功",json.msg);
                                setTimeout("window.location.reload()", 1000);
                            } else {
                                $.messager.alert("错误",json.msg);
                            }
                        } //success
                    }); //ajaxSubmit
		}//if
	}




})