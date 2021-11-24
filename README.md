# Aliyunpan Webdav for QNAP

## 介绍
本项目来源于：https://github.com/messense/aliyundrive-webdav

通过Rust 语言实现了阿里云盘的webdav协议，只需要简单的配置一下，就可以让阿里云盘变身为webdav协议的文件服务器。

## Next Version
- [x] 更换内核版本为Rust 语言，版本从V1.0.0开始
- [x] 此版本可以挂载威联通文件总管 
- [ ] 增加Token失效时提醒并推送
- [ ] 介绍配置推送通知（iOS端Bark App）

## 如何使用
在QNAP系统，通过App Center手动安装 ***.qpkg*** 后辍程序。

* 支持x86构架的QNAP存储设备

| 客户端        | 下载   |  上传  |  备注  |
| --------   | --------  | --------  |--------  |
|威联通 文件总管	|  可用	 | 可用	| 可用  |
|威联通 HBS 3	|  可用	 | 可用	| 可用  |
| Rclone	| 可用	|  可用 | 推荐| 支持各个系统  |
| Mac原生	| 可用	|  可用 | 可用 | 建议测试  |
| Windows原生	| 可用	| 可用	| 建议测试 |
| RaiDrive	| 可用	| 可用	| Windows平台下建议用这个  |

## 如何获取Token
 ![配置图示1](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/readme/gettoken.gif)

## 配置示意图 
 ![配置图示1](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/readme/AppCenter.jpg)
 
 ![配置图示2](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/readme/get.jpg)
  
 ![配置图示3](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/readme/yes.jpg)
 
  ![配置图示4](https://github.com/iranee/qnap-aliyunpan-webdav/raw/main/readme/ruing.jpg)
  
## 注意事项
在配置页面修改内容后，10-30秒后配置文件才能生效。

## 本软件为免费开源项目，无任何形式的盈利行为。
 1. 本软件为免费开源项目，无任何形式的盈利行为。
 2. 本软件服务于阿里云盘，旨在让阿里云盘功能更强大。如有侵权，请与我联系，会及时处理。
 3. 本软件皆调用官方接口实现，无任何“Hack”行为，无破坏官方接口行为。
 4. 本软件仅做流量转发，不拦截、存储、篡改任何用户数据。
 5. 严禁使用本软件进行盈利、损坏官方、散落任何违法信息等行为。
 6. 本软件不作任何稳定性的承诺，如因使用本软件导致的文件丢失、文件破坏等意外情况，均与本软件无关。
