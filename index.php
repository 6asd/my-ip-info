<?php
$ip_info = isset($_SERVER['HTTP_IP']) ? $_SERVER['HTTP_IP'] : '未知';
$ip_city = isset($_SERVER['HTTP_IP_CITY']) ? $_SERVER['HTTP_IP_CITY'] : '未知';
$ip_asn = isset($_SERVER['HTTP_IP_ASN']) ? $_SERVER['HTTP_IP_ASN'] : '未知';
$ip_country = isset($_SERVER['HTTP_IP_COUNTRY']) ? $_SERVER['HTTP_IP_COUNTRY'] : '未知';
$ip_http = isset($_SERVER['HTTP_IP_HTTP']) ? $_SERVER['HTTP_IP_HTTP'] : '未知';
$ip_lat = isset($_SERVER['HTTP_IP_LAT']) ? $_SERVER['HTTP_IP_LAT'] : '未知';
$ip_lon = isset($_SERVER['HTTP_IP_LON']) ? $_SERVER['HTTP_IP_LON'] : '未知';
$ip_threat = isset($_SERVER['HTTP_IP_THREAT']) ? $_SERVER['HTTP_IP_THREAT'] : '未知';
$ip_time = isset($_SERVER['HTTP_IP_TIME']) ? $_SERVER['HTTP_IP_TIME'] : '未知';
$ip_ua = isset($_SERVER['HTTP_IP_UA']) ? $_SERVER['HTTP_IP_UA'] : '未知';
$ip_zip = isset($_SERVER['HTTP_IP_ZIP']) ? $_SERVER['HTTP_IP_ZIP'] : '未知';
$title = "我的IP信息";

// 判断是否为中文
$is_chinese = (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'zh') !== false);

if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'curl') !== false) {
  // 当使用curl命令访问时，仅显示IP地址和国家城市信息
  echo "IP: " . $ip_info . "\n";
  echo ($is_chinese) ? "城市: " : "City: ";
  echo $ip_city . "\n";
  echo ($is_chinese) ? "国家: " : "Country: ";
  echo $ip_country . "\n";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>
  <style>
    body {
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
    }

    .left-column,
    .right-column {
      flex: 1;
      background-color: #fff;
      padding: 20px;
      min-width: 300px;
      margin-right: 20px;
    }

    h1 {
      margin-top: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 10px;
    }

    .map {
      width: 100%;
      height: 400px;
      margin-top: 20px;
    }

    @media screen and (max-width: 767px) {
      .container {
        flex-direction: column;
      }

      .left-column,
      .right-column {
        margin-right: 0;
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="left-column">
      <h1><?php echo $title; ?></h1>
      <table>
        <tr>
          <td>IP:</td>
          <td><?php echo $ip_info; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '城市:' : 'City:'; ?></td>
          <td><?php echo $ip_city; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '国家:' : 'Country:'; ?></td>
          <td><?php echo $ip_country; ?></td>
        </tr>
        <tr>
          <td>ASN:</td>
          <td><?php echo $ip_asn; ?></td>
        </tr>
        <tr>
          <td>HTTP:</td>
          <td><?php echo $ip_http; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '经度:' : 'Longitude:'; ?></td>
          <td><?php echo $ip_lon; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '纬度:' : 'Latitude:'; ?></td>
          <td><?php echo $ip_lat; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '邮编:' : 'ZIP Code:'; ?></td>
          <td><?php echo $ip_zip; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '威胁指数:' : 'Threat Level:'; ?></td>
          <td><?php echo $ip_threat; ?></td>
        </tr>
        <tr>
          <td><?php echo ($is_chinese) ? '时区:' : 'Timezone:'; ?></td>
          <td><?php echo $ip_time; ?></td>
        </tr>
        <tr>
          <td>UA:</td>
          <td><?php echo $ip_ua; ?></td>
        </tr>
      </table>
    </div>
    <div class="right-column">
      <div class="map" id="map"></div>
    </div>
  </div>

  <script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=ENTERYOURS"></script>##需要自行注册百度开发者账号填入AK
  <script>
    function initMap() {
      var map = new BMap.Map("map");
      var point = new BMap.Point(<?php echo $ip_lon; ?>, <?php echo $ip_lat; ?>);
      map.centerAndZoom(point, 15);
      map.addOverlay(new BMap.Marker(point));
      map.enableScrollWheelZoom();

      var navigationControl = new BMap.NavigationControl();
      map.addControl(navigationControl);

      var scaleControl = new BMap.ScaleControl();
      map.addControl(scaleControl);
    }

    window.onload = initMap;
  </script>
</body>
</html>

