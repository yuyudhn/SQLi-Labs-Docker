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
## Showcase
SQL Injection manual:
![SQL Injection manual](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgvVBmXcntOwJMOs0R_nHPwjgm_RYskcPckk6T07fWJ0t8LpdKqNt0uc3biLnsKl0FKKYza7dnIOK7fB03KmO7bQq3wanbdEFvXmkp7B0uBIN9rVg7aSU_LnxMo90OI_xaMltqUbwJxThqxnWT9GkB2L0_g7eZspy1KgZ_83h4JLqxkcI0ZrxG5icHtN44/s1561/html%20output%20sql%20injection.png)

SQL Injection with sqlmap:
![sqlmap](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhYmbRlvwL6UzKcrrdvbivdHx8GuXmR_y_xNV6qtv8m84zdljaJhjLRq4zAb970DvueLuo15hSoa-lcge7NoIqmwKRKhufD5NBSgkkBQuapYJ7I-3n1LmxwEjfG3CdZKyBR84kAScYsHNXajTZtmS3a2EQXeypWCzXlta62ha8cYeXTQYc9wDgHzdQw-uk/s1000/dumped%20password.png)

## Tutorial Using This Labs
- https://www.linuxsec.org/2014/03/tutorial-basic-sql-injection.html

## Disclaimer
This application is intentionally vulnerable for educational purposes. Deploying this application on a production server is strictly prohibited.
