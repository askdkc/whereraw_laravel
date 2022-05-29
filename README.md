## This is demo code to show whereRaw optional array handling error

This project uses PostgreSQL and [PGroonga](https://pgroonga.github.io).

If you are using macOS, you can install PGroonga with brew.
```
% brew install pgroonga
```

## Install and Reproduce the error

Clone this repo and do following.

```
% createdb whereraw_laravel

% cp -p .env.example .env

% composer install

% php artisan key:generate
% php artisan migrate --seed

% php artisan serve
```

## Demo
Access http://127.0.0.1:8000

Click "Without Optional" -> Works fine.


Click "With Optional" -> SQLSTATE[08P01]: <<Unknown error>>.

