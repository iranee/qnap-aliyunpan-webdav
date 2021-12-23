#!/bin/sh
CONF=/etc/config/qpkg.conf
QPKG_NAME="aliyunpan"
QPKG_ROOT=`/sbin/getcfg $QPKG_NAME Install_Path -f ${CONF}`
APACHE_ROOT=/share/`/sbin/getcfg SHARE_DEF defWeb -d Qweb -f /etc/config/def_share.info`


if [ `/sbin/getcfg "QWEB" "Enable" -d 1` = 0 ]; then
  echo "Web服务器尚未启用，请前往[控制台]→[应用程序]→[Web服务器]开启"
  /sbin/log_tool  -N "Web服务器" -G "状态" -t1 -uSystem -p127.0.0.1 -mlocalhost -a "[阿里云盘] Web服务尚未启用，请前往[控制台]→[应用程序]→[Web服务器]开启，并重启[阿里云盘]。"
fi

case "$1" in
  start)
    ENABLED=$(/sbin/getcfg $QPKG_NAME Enable -u -d FALSE -f $CONF)
    if [ "$ENABLED" != "TRUE" ]; then
        echo "$QPKG_NAME 已经禁用"
        exit 1
    fi
 
 if [ ! -d "$QPKG_ROOT/aliyundrive-webdav" ];then
    /sbin/log_tool  -N "阿里云盘" -G "Error" -t1 -uSystem -p127.0.0.1 -mlocalhost -a "[阿里云盘] 启动文件aliyundrive-webdav丢失，请尝试重新安装插件。"
 fi

/bin/chmod -Rf 777 $QPKG_ROOT/*
/bin/ln -sf $QPKG_ROOT/web $APACHE_ROOT/aliyunpan
cd $QPKG_ROOT
./aliyunpanmonitor >&1 & disown

    ;;

  stop)
	killall -9 aliyunpanmonitor
	killall -9 aliyunpanconfig
	killall -9 c
	rm -rf $APACHE_ROOT/aliyunpan

	;;

  restart)

    $0 stop
    $0 start
 
	;;

  *)
    echo "Usage: $0 {start|stop|restart}"
    exit 1
esac

exit 0
