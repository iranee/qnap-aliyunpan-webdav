<?php
  header('Content-type: application/json');
  $aliyunpan_pid = shell_exec('sleep 3 && pidof aliyunpan');
  $aliyunpan_pid = preg_replace("/\r\n|\r|\n/",'',$aliyunpan_pid);
  $aliyunpan_ver = shell_exec('../aliyunpan -V');
  $aliyunpan_ver = preg_replace("/\r\n|\r|\n/",'',$aliyunpan_ver);
  echo '{"pid":"';
  echo $aliyunpan_pid;
  echo '","ver":"';
  echo $aliyunpan_ver;
  echo '"}';
?>
