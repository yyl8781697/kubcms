/****************************************************
*  创建者：老黄牛
*  时间：2009-9-17
*****************************************************/
$(function() { overlay_init(); });
function overlay_init() {
    rightOverlay_write(); 
    $("#r_overlay").hide();
}

//在页面路中间显示加载动画
function rightOverlay_write() {
    $('body').append('<div id="r_overlay"></div>');
    $('#r_overlay').append("正在处理中，请稍候...")
    .css({height:"60px",
    width:"200px",
    background: "#fff  url(../images/loading.gif) 10px center no-repeat",
    border:"5px solid #99BBE8",
    "padding-left":"50px",
    "line-height":"60px",
    "font-size":"14px",
    "font-weight":"bold",
    "padding-right":"10px",
    position:"absolute",
    left:"50%",
	top:"50%",
	"z-index":"9999",
	margin:"-30px 0 0 -100px"

})
    
}

jQuery.RightOverlay = {

    hide: function () { $("#r_overlay").hide(); },
    show: function() { $("#r_overlay").show(); }
}