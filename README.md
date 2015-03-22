# *kubcms*
##A Simple MVC CMS Framework by PHP
###You only need do as follows:
1. create "kubcms" database and execute **kubcms.sql** in you mysql database
2. config in **config/config.php** and update the the database host
3. type the hostname/kubcms in your browser,It works.

##一个简易的MVC内容管理系统
###你只要按照如下的步骤来做
1. 在你的mysql数据库中新建kubcms数据库和执行**kubcms.sql**语句
2. 配置**config/config.php**并更新数据库的相关配置信息
3. 在浏览器中输入hostname/kubcms就可以看到这个简易的CMS了

*kubcms*使用[smarty](http://www.smarty.net/)作为模板引擎，其mvc 的逻辑由本人自己写的，大致文件分布如下
- |-.htaccess 将kubcms域名下的所有URL都指向index.php
- |-Bootstrap.php 解析URL，得到相应的Controller和Action名称，以及get上的参数
- |-controllers.models.view 对应的MVC框架文件 其中view中管理界面均放置在view/admin中
- |-core 存储常用的类和数据库帮助核心类
- |-public 为网站所使用到的资源文件，比如js,css,img等

建议使用*kubcms*仅用于**学习**，如使用商业用途出现问题本人概不负责<br />
最后，欢迎大家**fork**此项目
