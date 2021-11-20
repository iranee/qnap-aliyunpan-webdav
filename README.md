# Aliyunpan Webdav for QNAP

## 介绍
本项目来源于：https://github.com/LinkLeong/go-aliyundrive-webdav
通过go语言实现了阿里云盘的webdav协议，只需要简单的配置一下，就可以让阿里云盘变身为webdav协议的文件服务器。

## 如何使用
在QNAP系统，通过App Center手动安装 ***.qpkg*** 后辍程序。

* 支持x86构架的QNAP存储设备

| 客户端        | 下载   |  上传  |  备注  |
| --------   | -----:  | :----:  |
|威联通 文件总管	|  不可用	 | 不可用	| 等待作者修BUG注  |
| Rclone	| 可用	|  可用 | 推荐| 支持各个系统注  |
| Mac原生	| 可用	|  可用 | 适配有问题，| 不建议使用注  |
| Windows原生	| 可用	| 有点小问题	| 不建议，适配有点问题，上传报错注  |
| RaiDrive	| 可用	| 可用	| Windows平台下建议用这个注  |
