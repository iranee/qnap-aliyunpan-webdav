<?php

if ( isset($_POST['token']) ) 
{
  $token = $_POST['token'];
  $port = $_POST['port'];
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $json_str = '{"token":"' . $token . '", "port":"' . $port . '", "user":"' . $user . '", "pwd":"' . $pwd . '"}';
  file_put_contents('../configs/aliyunpan-config.json', $json_str);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿里云盘Webdav 配置</title>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="theme-color" content="#ffffff">
    <meta name="x5-page-mode" content="app">
    <meta name="apple-mobile-web-app-title" content="aliyunpan">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="static/favicon.ico" type="image/x-icon">
    <script src="static/jquery-2.2.3.min.js" type="text/javascript"></script>
	<style>
	        @font-face {
          font-family: 'iconfont';  /* project id 674189 */
          src: url('static/font_674189_dvawifegwrj.eot');
          src: url('static/font_674189_dvawifegwrj.eot?#iefix') format('embedded-opentype'),
          url('static/font_674189_dvawifegwrj.woff') format('woff'),
          url('static/font_674189_dvawifegwrj.ttf') format('truetype'),
          url('static/font_674189_dvawifegwrj.svg#iconfont') format('svg');
        }
        .iconfont {
          display: inline-block;
          font-family: 'iconfont';
          font-style: normal;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
                  -webkit-transform: translate(0, 0);
                      -ms-transform: translate(0, 0);
                          transform: translate(0, 0);
          -webkit-text-stroke-width: 0.2px;
        }

        .bui-input {
            box-sizing: border-box;
            height: 40px;
            padding: 8px 10px;
            line-height: 24px;
            border: 1px solid #DDDDDD;
            color: #5F5F5F;
            font-size: 14px;
            vertical-align: middle;
            border-radius: 4px;
            width: 330px;
        }
        .bui-input:hover{
            border: 1px #659aea solid;
        }
        .bui-input:focus {
            outline: none;
            border: 1px solid #4F9FE9;
            box-shadow: 0 0 3px 0 #2171BB;
            color: #595959;
        }
        .password-wrap { position: relative; width: 330px; }
        .password-wrap .bt-showpwd { color: #999999; position: absolute; top: 8px; right: 10px; line-height: 24px; width: 24px; height: 24px;    text-align: center; cursor: pointer; }
        .password-wrap .bt-showpwd.off::before { content: "\e60a"; font-family: "iconfont"; font-size: 18px; }
        .password-wrap .bt-showpwd.on::before { content: "\e60b"; font-family: "iconfont"; font-size: 18px; }

        .button{
            -webkit-appearance: none;
            background: #009dff;
            border: none;
            border-radius: 2px;
            color: #fff;
            cursor: pointer;
            height: 35px;
            font-family: 'Open Sans', sans-serif;
            font-size: 1em;
            letter-spacing: 0.05em;
            text-align: center;
            text-transform: uppercase;
            transition: background 0.3s ease-in-out;
            width: 120px;
        }
        .button:hover {
            background: #00c8ff;
        }

        body{ text-align:left} 
        .div{ margin:0 auto; width:438px;} 
    </style>
</head>

<body>
<div class="div">

<b>阿里云盘WebDav - 配置页面</b><p>

<form id="aliyunpan_form" action="" method="post">
<div id="main">    
<table border="0" style="width: 500px;">
<tbody><tr>
<td><b><a href="https://www.aliyundrive.com/drive/" title="点击官网获取" target="_blank">Token</a></b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='阿里云盘Token' name='token' id="device_token" value='' type='password' size='40'  class='bui-input' autoComplete='new-password' /></div><i class='bt-showpwd off'></i></div></td></tr>
<tr>
<td><b>访问端口</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:8085' name='port' type='text' size='40' max="65535" min="1" id="portx" value='8085' class='bui-input'/></div></div></td></tr><tr>

<td><b>用户名</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:admin' name='user' id="userx" type='text' size='40' value='admin' class='bui-input' autoComplete='off' /></div></div></td></tr><tr>

<td><b>密码</b>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:123456' name='pwd' id="pwdx" value='123456' type='password' size='40'  class='bui-input' autoComplete='new-password' /></div><i class='bt-showpwd off'></i></div></td></tr>

</tbody>

<td colspan='2' align='center' >
<p><span id="spn_message">进程状态检测中...</span>
<p>
<input type="submit" value="  保  存  " name="sub" class="button"> 
</td>
</table>

</div>
</form>  
</div>
</body>

<script>
<?php
    echo 'var aliyunpan_config=';
    echo file_get_contents("../configs/aliyunpan-config.json");
    echo ';';
?>

    var check_aliyunpan_pid = 0;

    var timeoutfn = function() { 
      if (check_aliyunpan_pid > 3) {
        $("#spn_message").html("进程未运行");
        return;
      }
      check_aliyunpan_pid++;

      $.ajax({
        type: 'GET',
        dataType: 'text',
        url: 'aliyunpan-pid.php',
        timeout: 5000,
        success: function(dataText, textStatus ){
          var data = jQuery.parseJSON(dataText);
          if(data["pid"]) {
            $("#spn_message").html("进程运行中，PID：" + data["pid"] + "   插件版本：" + data["ver"]);
          } else {
            $("#spn_message").html("进程检测中，次数：" + check_aliyunpan_pid);
            setTimeout(timeoutfn, 3000);
          }
        },
        fail: function(xhr, textStatus, errorThrown){
          console.log('check pid request failed');
        }
      });

    };

    $(document).ready(function() {
      $('#aliyunpan_form').submit(function(e) {
        var deviceToken = $("#device_token").val();
        var Port = $('#portx').val();
        var username = $("#userx").val();
        var password = $('#pwdx').val();        
        if (isNaN(Port)) {
            $("#spn_message").html("设备编号不能为 非法数值");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (Port < 1 || Port > 65535) {
            $("#spn_message").html("端口设置错误！");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (deviceToken == "" || deviceToken.length == 0 || deviceToken == null) {
            $("#spn_message").html("Token 不能为空");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (username == "" || username.length == 0 || username == null) {
            $("#spn_message").html("用户名不能为空");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (password == "" || password.length == 0 || password == null) {
            $("#spn_message").html("密码不能为空");
            check_aliyunpan_pid = 10;
            return false;
        }        
        check_aliyunpan_pid = 10;
        $("#spn_message").html("提交中...");

        return true;
      });

      $("#device_token").val(aliyunpan_config["token"]);
      $('#portx').val(aliyunpan_config["port"]);
      $("#userx").val(aliyunpan_config["user"]);
      $('#pwdx').val(aliyunpan_config["pwd"]);
      timeoutfn();

    });

</script>
<script type="text/javascript">
    $(".bt-showpwd").on("click",  function (e) {
        e.preventDefault();
        var $this = $(this);
        var $password = $this.closest(".password-wrap");
        var $input = $password.find('input');
        var $inputWrap = $password.find('.password-input');
        var newinput = '', inputHTML = $inputWrap.html(), inputValue = $input.val();
        if ($input.attr('type') === 'password') {
            newinput = inputHTML.replace(/type\s*=\s*('|")?password('|")?/ig, 'type="text"');
            $inputWrap.html(newinput).find('input')[0].value = inputValue;
            $this.removeClass("off").addClass("on");
        } else {
            newinput = inputHTML.replace(/type\s*=\s*('|")?text('|")?/ig, 'type="password"');
            $inputWrap.html(newinput).find('input')[0].value = inputValue;
            $this.removeClass("on").addClass("off");
        }
    });
</script>
</div>
</html>
