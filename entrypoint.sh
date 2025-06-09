#!/bin/bash

mysqld --user=mysql \
	--datadir=/var/lib/mysql \
	--init-file=/etc/mysql/init.sql \
	--pid-file=/run/mysqld/mysqld.pid \
	--socket=/run/mysqld/mysqld.sock &

httpd -D FOREGROUND
