

# Kamaran Management Information System
Link to the full documentation: [Kamaran MIS.PDF](https://drive.google.com/file/d/1MG8k3N0GbIMjf-lxG0OJvCqOV82rK9C_/view?usp=sharing).

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
5. Run the following commands
    1. ```php artisan migrate```
    2. ```php artisan db:seed```
    3. ```php artisan serve```
6. Go to development server http://127.0.0.1:8000
7. Login using username: admin password: kamaran



# Additional Information

 - If you recieve Pdo mysql connect error, make sure you uncomment ```extension=php_pdo_mysql.dll``` in php.ini file  

# Credits
 - Yousef Al-Hadhrami https://twitter.com/YousefHadhrami
 - Rashad Al-Khmisy https://twitter.com/ADMIRAL12
 - Anwar Sharhan https://twitter.com/AnwarSharhan77

 - Lebanese International University https://ye.liu.edu.lb/index/