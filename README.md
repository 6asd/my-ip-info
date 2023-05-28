# my-ip-info

Create an ip info Page with a `style.css` and an `index.php` file.

## 前提条件

- 一个已经注册了域名并在Cloudflare进行了DNS解析的网站。
- 注册了百度地图的开发者账号！[点击注册](https://lbsyun.baidu.com/index.php?title=jspopularGL)


## 教程

打包下载文件，将文件放在网站的根目录。注册百度地图开发者账号将自己的AK替换index中的149行 `ENTERYOURS`。去Cloudflare进行域名解析并开启Proxy（小云朵）。在DNS下方规则选项卡中修改请求头的转换规则，创建新的规则并勾选自定义筛选表达式。设置字段为主机名，运算符为等于，值为网站地址。

设置动态IP信息：
- 设置动态IP值：`ip`，值为`ip.src`。
- 设置动态IP-ASN：`ip-asn`，值为`ip.geoip.asnum`。
- 设置动态IP-City：`ip-city`，值为`ip.src.city`。
- 设置动态IP-Country：`ip-country`，值为`ip.geoip.country`。
- 设置动态IP-HTTP：`ip-http`，值为`http.request.version`。
- 设置动态IP-Lat：`ip-lat`，值为`ip.src.lat`。
- 设置动态IP-Lon：`ip-lon`，值为`ip.src.lon`。
- 设置动态IP-Threat：`ip-threat`，值为`cf.threat_score`。
- 设置动态IP-Time：`ip-time`，值为`ip.src.timezone.name`。
- 设置动态IP-UA：`ip-ua`，值为`http.user_agent`。
- 设置动态IP-Zip：`ip-zip`，值为`ip.src.postal_code`。

保存设置。

完成！通过按照以上步骤进行操作，您将创建一个能够显示访问者IP信息的网页。
