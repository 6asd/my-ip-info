# my-ip-info
Create an ip info Page with a style.css and an index.php
用一个css和php创建一个ip信息网页

##前提：一个网站，一个域名在cloudflare进行dns解析，注册百度地图的开发者账号！

教程：
打包下载文件，将文件放在网站的根目录。
去 cloudflare 进行域名解析并开启proxy（小云朵）。DNS下方规则>>转换规则修改请求头>>创建规则>>勾选自定义筛选表达式>>字段选择（主机名）运算符（等于）值（网站地址）

设置动态
ip
值
=ip.src

设置动态
ip-asn
=ip.geoip.asnum

设置动态
ip-city
=ip.src.city

设置动态
ip-country
=ip.geoip.country

设置动态
ip-http
=http.request.version

设置动态
ip-lat
=ip.src.lat

设置动态
ip-lon
=ip.src.lon

设置动态
ip-threat
=cf.threat_score

设置动态
ip-time
=ip.src.timezone.name

设置动态
ip-ua
=http.user_agent

设置动态
ip-zip
=ip.src.postal_code

保存。
完成！

Tutorial: Download the files and place them in the root directory of your website. Go to Cloudflare to perform DNS resolution and enable the proxy (little cloud icon). Under the DNS section, go to the Rules tab and modify the Transform Rules for the desired domain. Create a new rule and select the option for Custom Expression. Choose the field (Hostname), operator (Equals), and value (website address).

Set dynamic IP value = ip.src

Set dynamic IP-ASN = ip.geoip.asnum

Set dynamic IP-City = ip.src.city

Set dynamic IP-Country = ip.geoip.country

Set dynamic IP-HTTP = http.request.version

Set dynamic IP-Lat = ip.src.lat

Set dynamic IP-Lon = ip.src.lon

Set dynamic IP-Threat = cf.threat_score

Set dynamic IP-Time = ip.src.timezone.name

Set dynamic IP-UA = http.user_agent

Set dynamic IP-Zip = ip.src.postal_code

Save the settings. You're done!
