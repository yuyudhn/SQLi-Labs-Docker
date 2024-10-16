# SQL Injection Labs
This repository contains a web application vulnerable to SQL Injection attacks. Created for tutorial purposes on LinuxSec. However, you are welcome to use it for learning "Basic SQL Injection".

## Install
Obviously you can setup your own web server and database, and then copy the content from `src` folder. But the simple way to setup the lab is using docker.

```bash
git clone https://github.com/yuyudhn/SQLi-Labs-Docker
cd SQLi-Labs-Docker
docker-compose up --build -d
```
Or
```bash
docker run --rm -it -p 127.0.0.1:1337:80 linuxsec/sqli-labs
```

## Tutorial
- https://www.linuxsec.org/2014/03/tutorial-basic-sql-injection.html

## Disclaimer
This application is intentionally vulnerable for educational purposes. Deploying this application on a production server is strictly prohibited.