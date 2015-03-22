<!DOCTYPE html>
<html>
<head>
	<title><{$web_site_config["title"]}></title>
  <meta name="description" content="<{$web_site_config['description']}>" />
  <meta name="keywords" content="<{$web_site_config['keywords']}>" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="<{$public_path}>/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<{$public_path}>/javascript/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="<{$public_path}>/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(function(){

    function init()
    {
       $("#navcontent").css('margin-left',($(document).width()-1024)/2);//在导航在1024位置开始起始

       var column_name=$("#navcontent").attr("columnName");
       if(column_name!="")
       {
          $("#navcontent ."+column_name).addClass("active");//激活链接
       }
    }

    init();
    
  })
   
  </script>
</head>
</body style="">

<nav class="navbar navbar-default" role="navigation">
 
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div id="navcontent" style="" columnName="<{$column_name}>" >
    <ul class="nav navbar-nav">
      <{foreach item=val from=$nav}>
          <li class="<{$val.urlname}>"><a href="<{$web_path}>/article/list/<{$val.urlname}>"><{$val.name}></a></li>
      <{/foreach}>
    </ul>
   
  </div><!-- /.navbar-collapse -->
</nav>