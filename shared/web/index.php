<?php

if ( isset($_POST['token']) ) 
{
  $token = $_POST['token'];
  $port = $_POST['port'];
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $cache_size = $_POST['cache_size'];  
  $rb_size = $_POST['rb_size'];  
  $bark = $_POST['bark'];    
  $json_str = '{"token":"' . $token . '","port":"' . $port . '","user":"' . $user . '","pwd":"' . $pwd . '","cache_size":"' . $cache_size . '","rb_size":"' . $rb_size . '","bark":"' . $bark . '","send":"0","change":"1"}';
  file_put_contents('../configs/aliyunpan-config.json', $json_str);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿里云盘Webdav</title>
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

<b>阿里云盘 WebDAV - 设置面板</b><p>

<div align="right"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="118" height="20" role="img"><linearGradient id="s" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><clipPath id="r"><rect width="118" height="20" rx="3" fill="#fff"/></clipPath><g clip-path="url(#r)"><rect width="55" height="20" fill="#555"/><rect x="55" width="63" height="20" fill="#f59400"/><rect width="118" height="20" fill="url(#s)"/></g><g fill="#fff" text-anchor="middle" font-family="Verdana,Geneva,DejaVu Sans,sans-serif" text-rendering="geometricPrecision" font-size="110"><text x="285" y="140" transform="scale(.1)" fill="#fff" textLength="450">系统架构</text><text x="855" y="140" transform="scale(.1)" fill="#fff" textLength="450"><?php system("uname -m"); ?></text></g></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="118" height="20" role="img"><linearGradient id="s" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><clipPath id="r"><rect width="118" height="20" rx="3" fill="#fff"/></clipPath><g clip-path="url(#r)"><rect width="55" height="20" fill="#555"/><rect x="55" width="63" height="20" fill="#007ec6"/><rect width="118" height="20" fill="url(#s)"/></g><g fill="#fff" text-anchor="middle" font-family="Verdana,Geneva,DejaVu Sans,sans-serif" text-rendering="geometricPrecision" font-size="110"><text x="285" y="140" transform="scale(.1)" fill="#fff" textLength="450">本地版本</text><text x="855" y="140" transform="scale(.1)" fill="#fff" textLength="450"><?php system("cat ../version"); ?></text></g></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://cheen.cn/954" target="_blank" title="更新日志"><img src="https://img.shields.io/github/v/release/iranee/qnap-aliyunpan-webdav?color=2&label=%E5%9C%A8%E7%BA%BF%E7%89%88%E6%9C%AC"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><p>

<form id="aliyunpan_form" action="" method="post">
<div id="main">    
<table border="0" style="width: 500px;">
<tbody><tr>
<td><b><a href="https://www.aliyundrive.com/drive/" title="点击官网获取" target="_blank">Token</a></b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='阿里云盘Token' name='token' id="device_token" value='' type='password' size='40'  class='bui-input' autoComplete='new-password' /></div><i class='bt-showpwd off'></i></div></td></tr>
<tr>
<td><b>访问端口</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:8085' name='port' type='number' size='40' max="65535" min="1" id="portx" value='8085' class='bui-input'/></div></div></td></tr><tr>

<td><b>用户名</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:admin' name='user' id="userx" type='text' size='40' value='admin' class='bui-input' autoComplete='off' /></div></div></td></tr><tr>

<td><b>密 码</b>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认:123456' name='pwd' id="pwdx" value='123456' type='password' size='40'  class='bui-input' autoComplete='new-password' /></div><i class='bt-showpwd off'></i></div></td></tr>

<td><b>目录缓存</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认目录缓存数:1000' name='cache_size' type='number' size='40'  id="cache_sizex" value='1000' class='bui-input'/></div></div></td></tr><tr>

<td><b>下载缓冲</b></td>
<td><div class='password-wrap'><div class='password-input'><input placeholder='默认下载缓冲大小:10485760 (10MB)' name='rb_size' type='number' size='40' id="rb_sizex" value='10485760' class='bui-input'/></div></div></td></tr><tr>

<td><b>Bark推送</b>
<td><div class='password-wrap'><div class='password-input'><input placeholder='Bark API为空则禁用' name='bark' id="barkx" value='' type='password' size='40'  class='bui-input' autoComplete='new-password' /></div><i class='bt-showpwd off'></i></div></td></tr>
</tbody>

<td colspan='2'>
<p><span id="spn_message">进程状态检测中...</span>
<p align='center' >
<input type="submit" value="  保  存  " name="sub" class="button">
</p>
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
      if (check_aliyunpan_pid > 19) {
        $("#spn_message").html("❌ 进程启动失败！请检查参数是否存在问题");
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
            $("#spn_message").html("✔️ 进程运行中，PID：" + data["pid"] + " | 编译版本：" + data["ver"]);
          } else {
            $("#spn_message").html("❓ 等待进程检测中，次数：" + check_aliyunpan_pid);
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
        var cache_size = $('#cache_sizex').val();
        var rb_size = $('#rb_sizex').val();        
        var bark = $('#barkx').val();              
        if (isNaN(Port)) {
            $("#spn_message").html("端口不能为非法数值!");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (Port < 1 || Port > 65535) {
            $("#spn_message").html("端口设置错误！");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (deviceToken == "" || deviceToken.length == 0 || deviceToken == null) {
            $("#spn_message").html("Token不能为空!");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (username == "" || username.length == 0 || username == null) {
            $("#spn_message").html("用户名不能为空!");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (password == "" || password.length == 0 || password == null) {
            $("#spn_message").html("密码不能为空！");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (cache_size < 1) {
            $("#spn_message").html("目录缓存参数设置错误！");
            check_aliyunpan_pid = 10;
            return false;
        }
        if (rb_size < 1) {
            $("#spn_message").html("下载缓存参数设置错误！");
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
      $('#cache_sizex').val(aliyunpan_config["cache_size"]);
      $('#rb_sizex').val(aliyunpan_config["rb_size"]);
      $('#barkx').val(aliyunpan_config["bark"]);
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
	
document.onselectstart=function(){return false;};
</script>
</div>
</html>
