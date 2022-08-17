<?php
  header('Content-type: application/json');
  $aliyunpan_pid = shell_exec('pidof aliyundrive-webdav && sleep 2');
  $aliyunpan_pid = preg_replace("/\r\n|\r|\n/",'',$aliyunpan_pid);
  $aliyunpan_ver = shell_exec("../aliyundrive-webdav -V | awk -F'av |-wd' '{print $2}'");
  $aliyunpan_ver = preg_replace("/\r\n|\r|\n/",'',$aliyunpan_ver);
  echo '{"pid":"';
  echo $aliyunpan_pid;
  echo '","ver":"';
  echo $aliyunpan_ver;
  echo '"}';
?>
