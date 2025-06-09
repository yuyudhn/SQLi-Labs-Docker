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
![SQL Injection manual](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh2xqGIJAMU8ZfI5qpNJlvx05gPXRf6z5wp8TxvROQkC6Qxofd4xJjZX0jr9u1UclF4V4By1fhb0ebY2z3gJZptM8u_QLjZJKIJo3M9nMKZ83IsSGpdyrMt-1-U9T8uftuOsC6NxbwNklI436JwJiGVkeUwuUu5SfzhL9473MAvbFYFaiLICxQ-lUcV7TM/s1523/labs.png)

SQL Injection with sqlmap:
![sqlmap](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhYmbRlvwL6UzKcrrdvbivdHx8GuXmR_y_xNV6qtv8m84zdljaJhjLRq4zAb970DvueLuo15hSoa-lcge7NoIqmwKRKhufD5NBSgkkBQuapYJ7I-3n1LmxwEjfG3CdZKyBR84kAScYsHNXajTZtmS3a2EQXeypWCzXlta62ha8cYeXTQYc9wDgHzdQw-uk/s1000/dumped%20password.png)

## Tutorial Using This Labs
- https://www.linuxsec.org/2014/03/tutorial-basic-sql-injection.html

## Disclaimer
This application is intentionally vulnerable for educational purposes. Deploying this application on a production server is strictly prohibited.
