# 开发文档#

----------

## 一、 目录结构 ##
###  V1.0.0 ###

    
		--app  /*api接口目录*/
        

		--bootstrap  /*核心类目录*/ 
			--Autoload.php  /*自动加载类*/
			--Base.class.php /*api积累*/
			--Encryption.class.php /*加密文件*/
			--Route.class.php     /*路由核心类*/


		--inc        /*配置信息mysql类*/
			--language /*语言文件夹*/
				--en.php  /*英文*/
				--zh.php  /*中文*/
			--config.class.php  /*配置信息类*/
			--mysqlFun.class.php /*数据方法类*/
			

		--vendor  /*拓展*/		
			--taobao  /*淘宝插件拓展*/
		

		--index.php   /*入口文件*/
		--route.php  /*路由文件*/
			


----------
## 二、API功能详情 ##

----------
## 三、返回值 ##
### 1、返回值格式：json或者xml
####a、json格式返回
	{
			"code":'200',			     /*[1]接口号*/
			"msg":"the add update",      /*[0-1]打印日志是的错误信息通知*/
			"interfaceNumber":"15550"，  /*[1]接口号*/
			data:[
										 /*[1]实体数据内容*/
			]
	}

#### b、xml格式返回

	