# MyBlog
    项目配置方式
    
### 数据库
* 表mb_user  
    1. user_id  mediumint(6)  UNSIGNED  用户id  
    2. username  char(16)  utf8_general_ci  用户名  
    3. sex  char(4)  utf8_general_ci  性别  
    4. psw  char(40)  utf8_general_ci  密码  
    5. email	varchar(40)	utf8_general_ci  邮箱  
    6. phone	char(11)	utf8_general_ci  手机号  
    7. face	varchar(40)	utf8_general_ci  头像  
    8. permis  tinyint(1)  用户权限  
    9. login_id  char(40)	utf8_general_ci  登录验证  
* 表mb_post  
    1. id  mediumint(4)  UNSIGNED  文章id  
	  2. title  char(50)  utf8_general_ci  文章标题  
	  3. con_from  varchar(30)  utf8_general_ci  文章来源  
	  4. date  datetime  发布时间  
	  5. author  varchar(20)  utf8_general_ci  文章作者  
	  6. content  text  utf8_general_ci  文章内容  
	  7. hot_num  mediumint(6)  UNSIGNED  文章热度  
    
### 服务器
    使用服务器的默认配置即可，不需要额外配置。
