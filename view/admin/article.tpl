<{include file="header.tpl"}>

<div class="easyui-layout" style="overflow-y: hidden; "  fit="true"  scroll="no">
	 <div region="west" title="文章栏目" style="width:180px" split="true">
	 	<ul id="tree"></ul>
	 </div>  
	 <div region="center">
		 <table id="tt" width="100%"></table>
	 </div>  
</div>

<script src="<{$public_path}>/javascript/bussiness/article.js" type="text/javascript"></script>
<{include file="footer.tpl"}>