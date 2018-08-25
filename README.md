# IOS Haven - Version 4

This version uses PHP's Laravel framework to run this code you first will need to install a few things on your computer to get it to work.
- MySQL
- Composer
- Nodejs / NPM
- Laravel
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

Or if you don't want to install all of that you can install Laravel Homestead which has all of that built in.
https://laravel.com/docs/5.6/homestead

## After Installing 
- Install composer dependicies
- Install npm dependicies
- Create environment key
- Migrate the databases
- reference https://laracasts.com/series/laravel-from-scratch-2017 for help
- reference https://laravel.com/docs/5.6 for help

install composer dependencies
```
composer install
```

Install npm dependicies
```
npm install
```

duplicate env file
```
cp .env.example .env
```

Create environment key
```
php artisan key:generate
```

Migrate databases
```
php artisan migrate
```

serve application
```
php artisan serve
```
