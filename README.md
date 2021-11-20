# Aliyunpan Webdav for QNAP

## 介绍
本项目来源于：https://github.com/LinkLeong/go-aliyundrive-webdav

通过Go语言实现了阿里云盘的webdav协议，只需要简单的配置一下，就可以让阿里云盘变身为webdav协议的文件服务器。

## 如何使用
在QNAP系统，通过App Center手动安装 ***.qpkg*** 后辍程序。

* 支持x86构架的QNAP存储设备

| 客户端        | 下载   |  上传  |  备注  |
| --------   | --------  | --------  |--------  |
|威联通 文件总管	|  暂不可用	 | 暂不可用	| 等待作者修BUG注  |
| Rclone	| 可用	|  可用 | 推荐| 支持各个系统注  |
| Mac原生	| 可用	|  可用 | 适配有问题，| 不建议使用注  |
| Windows原生	| 可用	| 有点小问题	| 不建议，适配有点问题，上传报错注  |
| RaiDrive	| 可用	| 可用	| Windows平台下建议用这个注  |


## 配置示意图
 
 ![配置图示1](https://cheen.cn/wp-content/uploads/2021/09/AppCenter.jpg)
 
 ![配置图示2](https://cheen.cn/wp-content/uploads/2021/09/get.jpg)
  
 ![配置图示3](https://cheen.cn/wp-content/uploads/2021/09/yes.jpg)
 
  ![配置图示4](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/show.jpg)
 
## 注意事项
在配置页面修改内容后，10-20秒后配置文件才能生效。

## 本软件为免费开源项目，无任何形式的盈利行为。
 1. 本软件服务于阿里云盘，旨在让阿里云盘功能更强大。如有侵权，请与我联系，会及时处理。
 2. 本软件皆调用官方接口实现，无任何“Hack”行为，无破坏官方接口行为。
 3. 本软件仅做流量转发，不拦截、存储、篡改任何用户数据。
 4. 严禁使用本软件进行盈利、损坏官方、散落任何违法信息等行为。
 5. 本软件不作任何稳定性的承诺，如因使用本软件导致的文件丢失、文件破坏等意外情况，均与本软件无关。
