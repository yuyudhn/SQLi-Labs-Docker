#!/bin/bash

# Start MySQL service
/usr/bin/mysqld --user=mysql --datadir=/var/lib/mysql --init-file=/etc/mysql/init.sql --pid-file=/run/mysqld/mysqld.pid --socket=/run/mysqld/mysqld.sock &

# Start Apache service
httpd -D FOREGROUND
