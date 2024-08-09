@ECHO OFF
cd C:\xampp\htdocs\parse-diskominfo
start chrome 127.0.0.1:8000
php artisan serve
PAUSE