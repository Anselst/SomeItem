# SomeItem
    PHP初学者的两个小项目，第一个是刚刚学习完php基础后写的一个博客，第二个是学习面向对象思想后实现的一个CMS。

## MyBlog
    使用**ThinkPHP**框架实现的一个小博客。现在的博客并不完善，很多功能都缺失，之后会逐渐完善。

#### 页面与功能展示
* 前台必须登录才可查看内容
![login](https://github.com/Anselst/SomeItem/blob/dev/MyBlog/Sample_Pictures/blog_login.png "login")  
登录页面的用户名和密码使用AJAX进行验证，同时服务器端也使用了ThinkPHP的自动验证，以免js禁用后无法验证。
* 注册页面
![register](https://github.com/Anselst/SomeItem/blob/dev/MyBlog/Sample_Pictures/blog_reg.png "register")
注册页面的用户名使用AJAX进行查重和验证，其他字段都使用AJAX验证长度与格式，同时服务器端也进行验证。
* 登录后跳转到首页
![index](https://github.com/Anselst/SomeItem/blob/dev/MyBlog/Sample_Pictures/blog_index.png "index")
首页显示登录后的用户名和头像，然后按时间倒序显示博客简介。
* 点击头像或个人中心可修改用户名头像等
* 通过后台发布修改内容

#### 后续目标
    因为是第一次写的项目，对MVC结构不熟悉，之后会继续学习完善这个项目。
* 前台增加游客无需登录即可查看
* 前台登录功能完善，实现发布自己的博客，个人空间
* 后台增加管理前台的用户、评论

