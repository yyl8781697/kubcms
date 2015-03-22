
$.ajaxjson = function (url, dataMap, fnSuccess) {
    $.ajax({
        type: "POST",
        url: url,
        data: dataMap,
        dataType: "json",
        beforeSend: function () { $.RightOverlay.show(); },
        complete: function () { $.RightOverlay.hide(); },
        success: fnSuccess
    });
}

//简单的同步ajax获取数据
$.ajaxdata=function(url,dataMap){
    var ret="";
    if(dataMap==undefined)
    {
        dataMap="";
    }

    $.ajax({
        type:"post",
        url:url,
        dataType:"json",
        async:false,
        data:dataMap,
        success:function(result){
            ret=result;
        }
    })
    return ret;
}

$.ajaxtext = function (url, dataMap, fnSuccess) {
    $.ajax({
        type: "POST",
        url: url,
        data: dataMap,
        beforeSend: function () { $.RightOverlay.show(); },
        complete: function () { $.RightOverlay.hide(); },
        success: fnSuccess
    });
}

$.ajaxtext = function (url, dataMap) {
    $.ajax({
        type: "POST",
        url: url,
        data: dataMap,
        beforeSend: function () { $.RightOverlay.show(); },
        complete: function () { $.RightOverlay.hide(); },
        success: function (result, status) {
            if (status == "success") {//请求成功 
                result = eval('(' + result + ')');
                if (result.state == "success") {//处理成功
                    $.messager.alert("操作成功", result.msg, "info", function () {
                        window.location.reload();
                    })
                } else { //处理失败
                    $.messager.alert("系统提示",result.msg, "error");
                }
            } else {//请求失败
                $.messager.alert("系统提示", "请求失败，请稍后再试", "error");
            }
        }
    });
}

$.ajaxself = function (url, dataMap) {
    $.ajax({
        type: "POST",
        url: url,
        data: dataMap,
        beforeSend: function () { $.RightOverlay.show(); },
        complete: function () { $.RightOverlay.hide(); },
        success: function (result, status) {
            if (status == "success") {//请求成功 
                result = eval('(' + result + ')');
                if (result.state == "success") {//处理成功
                    $.messager.alert("操作成功", result.msg, "info")
                } else { //处理失败
                    $.messager.alert("系统提示", result.msg, "error");
                }
            } else {//请求失败
                $.messager.alert("系统提示", "请求失败，请稍后再试", "error");
            }
        }
    });
}

$.ajaxgrid = function (url, dataMap,grid_id,win_id) {
    if(grid_id==undefined)
    {
        grid_id="tt";
    }
    if(win_id==undefined)
    {
        win_id="w";
    }
    $.ajax({
        type: "POST",
        url: url,
        data: dataMap,
        beforeSend: function () { $.RightOverlay.show(); },
        complete: function () { $.RightOverlay.hide(); },
        success: function (result, status) {
            result=result.json();
                if(result.state=="success")
                {
                    $.messager.alert("操作成功",result.msg,"info",function(){
                        //window.location.reload();
                        $("#"+grid_id).datagrid("reload");
                        $("#"+win_id).window("close");
                    });
                }else{
                     $.messager.alert("错误",result.msg,"error");
                }//if
        }
    });
}



//模拟c#中的QueryString
function QueryString(paramName) {
    var paramValue = "";
    var url = this.location.search; //获取url中?后面的字符串
    var isFound = false;
    if (url.indexOf("?") == 0 && url.indexOf("=") > 1) {//如果存在?并且存在= 表示有参数传进来
        arrSource = decodeURIComponent(url).substring(1, url.length).split("&"); //将?后面的字符串以&标志分割为数组
        var i = 0;
        while (i < arrSource.length && !isFound) {//循环条件
            if (arrSource[i].indexOf("=") > 0) {//确保数组的项中含有=
                if (arrSource[i].split("=")[0].toLowerCase() == paramName.toLowerCase()) {//切割问号并且与方法传进来的值进行判断
                    paramValue = arrSource[i].split("=")[1];
                    isFound = true;
                }
            }
            i++;
        }
    }
    return paramValue;
} //querystring

