#!/bin/sh
CONF=/etc/config/qpkg.conf
QPKG_NAME="aliyunpan"
QPKG_ROOT=`/sbin/getcfg $QPKG_NAME Install_Path -f ${CONF}`
APACHE_ROOT=/share/`/sbin/getcfg SHARE_DEF defWeb -d Qweb -f /etc/config/def_share.info`

export QNAP_QPKG=$QPKG_NAME
export QPKG_ROOT
export QPKG_NAME
export APACHE_ROOT

export HOME=$QPKG_ROOT
export SHELL=/bin/sh
export DESC=$QPKG_NAME

if [ `/sbin/getcfg "QWEB" "Enable" -d 1` = 0 ]; then
  echo "Web服务器尚未启用"
  /sbin/log_tool  -t1 -uSystem -p127.0.0.1 -mlocalhost -a "[阿里云盘]  Web服务器尚未启用，请在控制面板中开启Web服务。"
fi

case "$1" in
  start)
    ENABLED=$(/sbin/getcfg $QPKG_NAME Enable -u -d FALSE -f $CONF)
    if [ "$ENABLED" != "TRUE" ]; then
        echo "$QPKG_NAME 已经禁用"
        exit 1
    fi
/bin/chmod -Rf 777 $QPKG_ROOT/*
/bin/ln -sf $QPKG_ROOT/web $APACHE_ROOT/aliyunpan

cd $QPKG_ROOT
 ./aliyunpanmonitor >&1 & disown

    ;;

  stop)
    killall aliyunpanmonitor
	killall aliyunpanconfig
    killall aliyunpan
	rm -rf $APACHE_ROOT/$QPKG_NAME

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