# IOS Haven - Version 4

iOS Haven uses PHP's Laravel framework. You MUST install a few things on your machine to get it to work.
- MySQL
- Composer
- Nodejs / NPM
- Laravel
- PHP = 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

## After Installing 
- Install composer dependencies
- Install npm dependencies
- Create environment key
- Migrate the databases


install composer dependencies
```
composer install
```

Install npm dependencies
```
yarn
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

## Add styling and javascript
All styling and javascript is compiled using Laravel Mix. The code for these files is located in resources/assets. To see the changes you need to recompile the code using the following command:
```bash
yarn dev
# yarn watch
```