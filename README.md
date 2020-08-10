

# Kamaran Management Information System
A small portable assembly downloader (via torrent)

---
# Introduction
Graduation Project built in Php with laravel framework

# Prerequisites
 - php --version=7.1.3
 - composer --version=5.1.0
 - mysql --version=8.0.18 or mariadb --version=10.4.10

# Recommended

 - WAMP server

# Usage Guide
1. Clone the source code
2. Go to the kamaran/kamaran directory and run ```composer install``` 
3. Create an empty database called kamarandb
4. Make sure you enter your database server details in the .env file
5. Run the following command ```
php artisan migrate
php artisan db:seed
php artisan serve
```
6. Go to development server http://127.0.0.1:8000
7. Login using username: admin password: kamaran



# Additional Information

 - If you recieve Pdo mysql connect error, make sure you uncomment ```extension=php_pdo_mysql.dll``` in php.ini file  

