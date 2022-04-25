@echo off
if not DEFINED IS_MINIMIZED set IS_MINIMIZED=1 && start "POSEngine" /min "%~dpnx0" %* && exit

start C:\xampp\xampp-control.exe
php artisan serve --host 192.168.77.222 --port 8000



@pause