# How to run this app


## Installation


```bash
git clone https://github.com/AhmedGalaldev/task
```
make .env file and copy it from .env.example

edit database credentials in .env file

```bash
DB_DATABASE= database name
DB_USERNAME=database username
DB_PASSWORD=password
```
```bash
php artisan key:generate
```
```bash
composer install
npm install
npm run dev
```

edit  mailtrap credentials in .env file for email verification

```bash

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
```

```bash
php artisan migrate:fresh --seed

```
after that you can register and login and verify email using mailtrap
if you select admin role you can go to sales and configs buttons 
if you sales you can select sales
if you back office you can select configs.

# Note
## Admin
you can login as admin by (email:admin@gmail.com - password: password) from seeder.

## Sales
you can login as sales by (email:sales@gmail.com - password: password) from seeder.

## Back office
you can login as back office by (email:backoffice@gmail.com - password: password) from seeder.