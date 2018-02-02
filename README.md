Landing page 
================================

REQUIREMENTS
------------

The minimum requirements for this project:
- PHP 7.1
- MySQL 8

Installing
-----------------------


You can install the application using the following commands:

```sh
git clone github.com/vitaliy-svyrydov/unique.com.git
cd unique.com
cp .env.example .env
```

Creat DB(and write the name, username and password to a .env file )

When done, you need to execute the following commands in the directory:
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `composer install`

To use the administrative part you need to add in URL /admin/ and register a new user.
After this log in as a new user
