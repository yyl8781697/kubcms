var opentabs = 5; //允许打开的TAB数量

var _menus = "";
$(function () {
    var h = $('<div id="w_ep"></div>').appendTo($('body'));
    var web_controller_path=$("body").attr("web-controller-path");
    LoadMenus(); //载入菜单
    $('#editpass').click(function () {
        editMyPass();
    });




    /************************************************************************/
    /*    点TAB 刷新
    $('#tabs').tabs({
    onSelect: function (title) {
    var currTab = $('#tabs').tabs('getTab', title);
    var iframe = $(currTab.panel('options').content);
    var src = iframe.attr('src');
    if(src)
    $('#tabs').tabs('update', { tab: currTab, options: { content: createFrame(src)} });
    }
    });
    
    */
    /************************************************************************/




    function LoadMenus() {
        $("#lnav").append("<img src='images/loading-bars.gif' />");
        $.post(web_controller_path+"/menuhandler", {}, function (result, status) {
            if (result == "error") {
                $.messager.alert("系统提示", "获取导航出错!");
            } else {
                $("#lnav").find("img").remove();
                _menus = result.json();
                if (_menus) {//有导航
                    if (_menus.menus.length > 0) {
                        InitLeftMenu();
                        tabClose();
                        tabCloseEven();
                    }
                } else {
                    $.messager.alert("系统提示", "<font color=red><b>您没有任何权限！请联系管理员。</b></font>", "warning", function () {
                        location.href = 'loginout.aspx';
                        //return false;
                    });
                }
            }
        })
    }

    //不能关闭和不加入右键菜单的标签名
    var onlyOpenTitle = "欢迎使用";

    function addNav(data) {

        $.each(data, function (i, sm) {
            var menulist = "";
            menulist += '<ul>';
            $.each(sm.menus, function (j, o) {
                menulist += '<li><div><a ref="' + o.navID + '" href="#" rel="'
    					+ web_controller_path+"/"+o.url + '" ><span class="icon ' + o.iconcls
    					+ '" >&nbsp;</span><span class="nav">' + o.title
    					+ '</span></a></div></li> ';
            });
            menulist += '</ul>';
            $('#lnav').accordion('add', {
                title: sm.title,
                content: menulist,
                iconCls: 'icon ' + sm.iconcls
            });

        });

        var pp = $('#lnav').accordion('panels');
        var t = pp[0].panel('options').title;
        $('#lnav').accordion('select', t);

    }


    //初始化左侧
    function InitLeftMenu() {
        $("#lnav").accordion({ animate: false });
        addNav(_menus.menus);
       // $('#lnav .panel').removeAttr('style');

        $('.easyui-accordion li').click(function () {
            var a = $(this).children('div').children('a');
            var tabTitle = $(a).children('.nav').text();

            var url = $(a).attr("rel");
            var menuid = $(a).attr("ref");
            var icon = getIcon(menuid);
            addTab(tabTitle, url, icon);
            $('.easyui-accordion li div').removeClass("selected");
            $(this).children('div').addClass("selected");
        }).hover(function () {
            $(this).children('div').addClass("hover");
        }, function () {
            $(this).children('div').removeClass("hover");
        });

    }
    //获取左侧导航的图标
    function getIcon(menuid) {
        var icon = 'icon ';
        $.each(_menus.menus, function (i, n) {
            $.each(n.menus, function (j, o) {
                if (o.navID == menuid) {
                    icon += o.iconcls;
                }
            })
        })

        return icon;
    }

    function addTab(subtitle, url, icon) {
        if (url == "" || url == "#")
            return false;
        var tabCount = $('#tabs').tabs('tabs').length;
        var hasTab = $('#tabs').tabs('exists', subtitle);
        var add = function () {
            if (!hasTab) {
                $('#tabs').tabs('add', {
                    title: subtitle,
                    content: createFrame(url),
                    closable: true,
                    icon: icon
                });
            } else {
                $('#tabs').tabs('select', subtitle);
                $('#mm-refresh').click();
            }
        }

        if (tabCount > opentabs && !hasTab) {
            var msg = '<b>您当前打开了太多的页面，如果继续打开，会造成程序运行缓慢，无法流畅操作！</b>'
            $.messager.confirm("系统提示", msg, function (b) {
                if (b) add();
                else return false;
            })
        } else {
            add();
        }


        
        tabClose();
    }

    function createFrame(url) {
        var s = '<iframe scrolling="auto" frameborder="0"  style="width:100%;height:100%;" src="' + url + '" ></iframe>';
        return s;
    }

    function tabClose() {
        /*双击关闭TAB选项卡*/
        $(".tabs-inner").dblclick(function () {
            var subtitle = $(this).children(".tabs-closable").text();
            if (subtitle != onlyOpenTitle && subtitle != "")
                $('#tabs').tabs('close', subtitle);
        })
        /*为选项卡绑定右键*/
        $(".tabs-inner").bind('contextmenu', function (e) {
            var subtitle = $(this).children(".tabs-closable").text();
            if (subtitle != '') {
                $('#mm').menu('show', {
                    left: e.pageX,
                    top: e.pageY
                });

                $('#mm').data("currtab", subtitle);
                $('#tabs').tabs('select', subtitle);
            }
            return false;

        });
    }
    //绑定右键菜单事件
    function tabCloseEven() {
        //刷新
        $('#mm-refresh').click(function () {
            var pp = $('#tabs').tabs('getSelected');
            var iframe = $(pp.panel('options').content);
            var src = iframe.attr('src');
            $('#tabs').tabs('update', {
                tab: pp,
                options: {
                    content: createFrame(src)
                }
            })
        });
        //关闭当前
        $('#mm-tabclose').click(function () {
            var currtab_title = $('#mm').data("currtab");
           
                $('#tabs').tabs('close', currtab_title);
        })
        //全部关闭
        $('#mm-tabcloseall').click(function () {
            $('.tabs-inner span').each(function (i, n) {
                var t = $(n).text();
                if (t != onlyOpenTitle && t != "")
                    $('#tabs').tabs('close', t);
            });
        });
        //关闭除当前之外的TAB
        $('#mm-tabcloseother').click(function () {
            var othertabs = $('.tabs-selected').siblings();
            if (othertabs.length > 0) {
                othertabs.each(function (i, n) {
                    var t = $('a:eq(0) span', $(n)).text();
                    $('#tabs').tabs('close', t);
                });
                return false;
            }
        });
        //关闭当前右侧的TAB
        $('#mm-tabcloseright').click(function () {
            var nextall = $('.tabs-selected').nextAll();
            if (nextall.length == 0) {
                //msgShow('系统提示','后边没有啦~~','error');
                alert('后边没有啦~~');
                return false;
            }
            nextall.each(function (i, n) {
                var t = $('a:eq(0) span', $(n)).text();
                $('#tabs').tabs('close', t);
            });
            return false;
        });
        //关闭当前左侧的TAB
        $('#mm-tabcloseleft').click(function () {
            var prevall = $('.tabs-selected').prevAll();
            if (prevall.length == 0) {
                alert('到头了，前边没有啦~~');
                return false;
            }
            prevall.each(function (i, n) {
                var t = $('a:eq(0) span', $(n)).text();
                $('#tabs').tabs('close', t);
            });
            return false;
        });

        //退出
        $("#mm-exit").click(function () {
            $('#mm').menu('hide');
        })
    }

    //弹出信息窗口 title:标题 msgString:提示信息 msgType:信息类型 [error,info,question,warning]
    function msgShow(title, msgString, msgType) {
        $.messager.alert(title, msgString, msgType);
    }

    var str_editpass = '<table class="grid" id="epform">';
    str_editpass += '<tr><td>登录名：</td><td><span id="loginname"></span></td></tr>';
    str_editpass += '<tr><td>新密码：</td><td><input  validType="safepass"  required="true" id="txtNewPassword" name="password" type="password" class="txt03" /></td></tr>';
    str_editpass += '</table>';


    var editMyPass = function () {
        $('#w_ep').hWindow({ width: 300, height: 160, title: '修改密码', iconCls: 'icon-key', html: str_editpass, submit: function () {
            if ($('#txtNewPassword').validatebox('isValid')) {
                $.ajaxtext('ajax/editpass.ashx', "password=" + $('#txtNewPassword').val(), function (msg) {
                    if (msg == '1') {
                        alert('密码修改成功！请重新登录。');
                        location.href = 'ajax/loginout.ashx';
                    } else
                        alert(msg);
                });
            }
        } 
        });

        $('#loginname').text($('#curname').text());
        $('#txtNewPassword').validatebox();


    }

});