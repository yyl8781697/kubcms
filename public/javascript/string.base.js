//字符串的一些公共方法

////替换字符串  
String.prototype.replaceAll = function (s1, s2) {  
    return this.replace(new RegExp(s1, "gm"), s2);
}

//去除空格
String.prototype.trim = function () {
    var reExtraSpace = /^\s*(.*?)\s+$/;
    return this.replace(reExtraSpace, "$1");
} //trim



// 去掉字符左边的空白字符   
String.prototype.LTrim=function () {   
    return this.replace(/^[\t\n\r]/g,'');
};

//除去左边以s开头的字符串
String.prototype.trimStart = function (s) {
     s = (s ? s : "\\s");                            //没有传入参数的，默认去空格
	 s = ("(" + s + ")");
	 var reg_lTrim = new RegExp("^" + s + "*", "g");     //拼正则
	 return this.replace(reg_lTrim, "");

}
  
// 去掉字符右边的空白字符   
String.prototype.RTrim=function () {   
    return this.replace(/[\t\n\r]*$/g,'');
};

//除去右边以s结尾的字符串
//去除字符串尾部空格或指定字符
String.prototype.trimEnd = function(s)
{
   s = (s ? s : "\\s");
   s = ("(" + s + ")");
   var reg_rTrim = new RegExp(s + "*$", "g");
   return this.replace(reg_rTrim, "");

}
  
// 返回字符的长度，一个中文算2个   
String.prototype.ChineseLength=function()   
{    
    return this.replace(/[^\x00-\xff]/g,"**").length;   
};   
  
// 判断字符串是否以指定的字符串结束   
String.prototype.EndsWith=function (A,B) {   
    var C=this.length;   
    var D=A.length;   
    if(D>C)return false;   
    if(B) {   
        var E=new RegExp(A+'$','i');   
        return E.test(this);   
    }else return (D==0||this.substr(C-D,D)==A);   
};   
// 判断字符串是否以指定的字符串开始   
String.prototype.StartsWith = function(str)    
{   
    return this.substr(0, str.length) == str;   
};   
// 字符串从哪开始多长字符去掉   
String.prototype.Remove=function (A,B) {   
    var s='';   
    if(A>0)s=this.substring(0,A);   
    if(A+B<this.length)s+=this.substring(A+B,this.length);   
    return s;   
};

//将字符串转化为Json格式
String.prototype.json = function () {
    return eval('(' + this + ')');
}

/** 
* 时间对象的格式化; (new Date(data.book.otherPublishDate)).format("yyyy年MM月")
*/
Date.prototype.format = function (format) {
    /* 
    * eg:format="yyyy-MM-dd hh:mm:ss"; 
    */
    var o = {
        "M+": this.getMonth() + 1, // month  
        "d+": this.getDate(), // day  
        "h+": this.getHours(), // hour  
        "m+": this.getMinutes(), // minute  
        "s+": this.getSeconds(), // second  
        "q+": Math.floor((this.getMonth() + 3) / 3), // quarter  
        "S": this.getMilliseconds()
        // millisecond  
    }

    if (/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4
                        - RegExp.$1.length));
    }

    for (var k in o) {
        if (new RegExp("(" + k + ")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length == 1
                            ? o[k]
                            : ("00" + o[k]).substr(("" + o[k]).length));
        }
    }
    return format;
}