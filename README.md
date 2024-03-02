# SQL Injection Labs
This repository contains a web application vulnerable to SQL Injection attacks. Created for tutorial purposes on LinuxSec. However, you are welcome to use it for learning "Basic SQL Injection".

## Install
You can setup your own web server and database, and then copy the content from `src` folder. But the simple way to setup the lab is using docker.

```bash
git clone https://github.com/yuyudhn/SQLi-Labs-Docker
cd SQLi-Labs-Docker
docker-compose up --build -d
```
## Screenshot

- Union Based SQL Injection at Index

![Union Based](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjeaPSKhyphenhyphenOehLbmXzoPjMgJ7ff0n3_FK3z9B37SmJM91Uja6zY58moVs31UvwGeHtNyYwsJZbliZ6w6sGJeQsNg0yZwNJxPrBYqfLfHPHsJ4SDUKFvsAZCWek2_uKP2v4NIM6LaidiEfb0kRDZwVI4AN4dFWWg5ATa6m9sZXMvgwBgoMt51aMU41_cxMMRd/s1170/sql%20injection%20showcase.png)

- Error Based SQL Injection at Login Page

![Error Based](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgIWo3088W5jTfchejllBUsp6uPbe7KCMRe9_Kd7PmxZ1PyIXNZaZm5-ojrF4FvYArzQrqElQrHRf4e__S61_yN_81rkI3Qe_LX1UteHrACXPrfOdKpm269-tK5u-xQwf3YIdPl46pYiniDocZ-zAqqZlR0-GApeUVMuawy54Q9uMW6ul4JyC7URZxJWCPN/s964/error%20based.png)

- Shell Upload via SQL Injection

![Error Based](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiTyFPvV9JtnN2bbT0OSlfGTnSd7doivXSZXqcTqB7mM_eTgwHpY_aDW-VVtkKCEhuD-qwwcyMtjeWhWig976kv2jsvLp9_Zdyyw3jk0rd1_aw4PXyhH5dhGu9HlWnbS3QQ8ErnccgIY-2sh6Q_1vWGnjPNFC0u3FpifT4_neNyNvjYsd5Rkoiyp8eKn2vf/s1053/rce.png)

- etc.

## Tutorial
- [Tutorial Basic SQL Injection Manual Lengkap](https://www.linuxsec.org/2014/03/tutorial-basic-sql-injection.html)

## Disclaimer
This application is intentionally vulnerable for educational purposes. Deploying this application on a production server is strictly prohibited.