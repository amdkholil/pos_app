## Overview

![1.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/1.png "1.png")
![2.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/2.png "2.png")
![3.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/3.png "3.png")
![4.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/4.png "4.png")
![6.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/6.png "6.png")
![5.png!](https://raw.githubusercontent.com/amdkholil/pos_app/master/ss/5.png "5.png")

## Requirment

- php 7.1 or higher
- mysql

## Installation

- database setting (mysql):
  - host: localhost
  - port: 3306
  - username: root
  - password:
  - database: demo
- import demo.sql to database
- or go to folder app & run this command to generate new database:
  ```bash
  php artisan migrate:fresh
  php artisan db:seed
  ```
- generate app key:
  ```bash
  php artisan key:generate
  ```
- install package:
  ```bash
  composer install
  ```
- run app:
  ```bash
  php artisan serve
  ```
- login acount:
  - link: localhost:8000/login
  - email: admin@mail.com
  - password: 123456 


## License

created by [Kholil](http://github.com/amdkholil) powered by Laravel.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
