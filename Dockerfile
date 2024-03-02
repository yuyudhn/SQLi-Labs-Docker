# Use Alpine Linux as base image
FROM alpine:3.12.11

# Set environment variables
ENV APACHE_RUN_USER=apache \
    APACHE_RUN_GROUP=apache \
    APACHE_LOG_DIR=/var/log/apache2 \
    APACHE_PID_FILE=/var/run/apache2/apache2.pid \
    APACHE_RUN_DIR=/var/run/apache2 \
    APACHE_LOCK_DIR=/var/lock/apache2 \
    APACHE_DOCUMENT_ROOT=/var/www/html

# Update package repositories and install Apache and PHP
RUN apk update && \
    apk add --no-cache apache2 php7-apache2 php7-mysqli php7-session bash nano mysql mysql-client

# Configure Apache
RUN mkdir -p /run/apache2 && \
    sed -i 's#^DocumentRoot ".*#DocumentRoot "/var/www/html"#g' /etc/apache2/httpd.conf && \
    sed -i 's#AllowOverride None#AllowOverride All#g' /etc/apache2/httpd.conf && \
    sed -i 's#^<Directory "/var/www/localhost/htdocs">#<Directory "/var/www/html">#g' /etc/apache2/httpd.conf

# Deploy SQLi Labs
COPY /src /var/www/html
RUN rm -f /var/www/html/index.html
RUN mkdir -p /var/www/html/uploads && \
    chmod 777 /var/www/html/uploads
RUN chown -R apache: /var/www/html

# Configure MySQL and initialize database
RUN mkdir -p /etc/mysql/
COPY my.cnf /etc/mysql/my.cnf
COPY db.sql /etc/mysql/init.sql

RUN mkdir -p /var/lib/mysql /run/mysqld /var/log/mysql /var/run/mysqld && \
    chmod 755 /var/run/mysqld && \
    chown -R mysql:mysql /var/lib/mysql /run/mysqld /var/log/mysql /var/run/mysqld && \
    mysql_install_db --user=mysql --datadir=/var/lib/mysql

# Copy entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose port 80
EXPOSE 80

# Start Service
ENTRYPOINT ["/entrypoint.sh"]