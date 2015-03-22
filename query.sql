--栏目表
--主键id
--父级ID
--栏目名称
--url上的名称
--创建时间
--栏目类型
--导航类型
--显示顺序
--是否有效 非0代表有效 0代表无效
--连接的target _blank或者_self
--栏目的内容  可以为空
--超链接的内容
create table `kub_column`(
    `colid` int(11) primary key auto_increment not null,
    `parentid`  int(11) not null,
    `name` varchar(64) not null,
    `urlname` varchar(64),
    `createtime` datetime not null,
    `type` varchar(20) not null,
    `navigation` varchar(20) not null, 
    `colindex` int(4) not null,
    `isenabled` int(1) not null,
    `linktarget` varchar(20),
    `content` text,
    `linkurl` varchar(256)
);

--文章表
--主键Id
--栏目Id 栏目表的外键
--栏目别名
--文章的标题
--文章作者
--文章来源
--文章标签
--文章内容
--文章代表图片路径
--创建时间
--最后修改时间
--是否置顶 非0 置顶  0 不置顶
--文章标题的颜色
--点击量
--是否有效
--是否已经删除
create table `kub_article`(
	`articleid` int(11) primary key auto_increment not null,
	`colid` int(11) not null,
	`urltitle` varchar(64) not null,
	`title` varchar(128) not null,
	`author` varchar(64) not null,
	`source` varchar(128),
	`tags` varchar(128),
	`content` text, 
	`imagepath` varchar(128),
	`createtime` datetime not null,
	`updatetime` datetime not null,
	`istop` int(1) not null,
	`color` char(10),
	`hits` int(11) not null,
	`isenabled` int(1) not null,
	`isdelete` int(1) not null
);

--用户表
--管理者Id
--用户账号
--用户密码
--用户名
--用户邮箱
--用户联系方式
--用户级别
--用户权限 
--用户是否有效
create table `kub_user`(
	`userid` int(11) primary key auto_increment not null,
	`useraccount` char(32) not null,
	`password` char(32) not null,
	`username` varchar(64),
	`email` varchar(64),
	`eelephone` varchar(64),
	`level` int(1) not null,
	`permission` varchar(128),
	`isenabled` int(1) not null
);

--友情链接表
--友情链接Id
--友情链接名称
--友情链接url
create table `kub_link`(
	`linkid` int(4) primary key auto_increment not null,
	`title` varchar(128) not null,
	`url` varchar(128) not null
);



