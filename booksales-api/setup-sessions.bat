@echo off
php artisan session:table
php artisan migrate
echo Sessions table has been created.
pause
