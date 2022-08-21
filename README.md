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

---

created by [Kholil](http://github.com/amdkholil) powered by Laravel.

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
