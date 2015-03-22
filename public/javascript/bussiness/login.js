$(function () {
    var $useraccount = $("input[name='useraccount']");
    var $password = $("input[name='password']");
    var $checkcode = $("input[name='checkcode']");
    var $rme = $("input[name='rme']");
    var $statemsg = $("#statemsg");
    function checknull(val, msg) {
        if (val.trim() == "") {
            appendHtml("red", msg);
            return false;
        }
        return true;
    } //checkusername

    $("#btnLogin").click(function () {
        $statemsg.html("");
        var useraccount = $useraccount.val();
        var password = $password.val();
        var checkcode = $checkcode.val();
        var judgeUsername = checknull(useraccount, "账号不能为空");
        var judgePassword = checknull(password, "密码不能为空");
        var judgeCheckcode = checknull(checkcode, "验证码不能为空");
        if (judgeUsername && judgePassword && judgeCheckcode) {
            var data={"useraccount": useraccount, "password": password, "checkcode": checkcode};
            $.post("loginhandler", data,
                    function (result, status) {
                        result = result.json();
                        $statemsg.html("");
                        $statemsg.find("class='green'").remove();
                        if (result.state == "success") {
                            appendHtml("green", result.msg);

                            setTimeout("window.top.location.href='./'", 2000);
                        } else {
                            $("#btnLogin").attr("disabled", false);
                            appendHtml("red", result.msg);
                        }
                    })
        } //if
    })//click

    $("#btnLogin").ajaxSend(function () {
        appendHtml("green", "系统正在进行请求...");
        $("#btnLogin").attr("disabled", "true");
    })

    //响应键盘的回车事件
    $(this).keydown(function (event) {
        if (event.keyCode == 13) {
            event.returnValue = false;
            event.cancel = true;
            return $("#btnLogin").click();
        }
    });

    function appendHtml(css, msg) {
        $statemsg.append("<span class=" + css + ">" + msg + "</span><br />");
    }

    $("#viewpassword").click(function () {
        var str = "用户级别：账号，密码<br />" +
                "管理员：admin，admin<br />" +
                "业务组长：guest4，guest4<br />" +
                "业务员：guest3，guest3<br />" +
                "vip会员：guest2，guest2<br />" +
                "普通会员：guest1，guest1";
        appendHtml("red", str);
    })

})