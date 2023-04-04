## This is demo code to show whereRaw optional array handling error

This project uses PostgreSQL and [PGroonga](https://pgroonga.github.io). Please install both to continue.

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

<br><br>
## Got 2 solutions for this

I got 2 solutions. One from PGroonga Collaborator and other from Laravel Community.

### PGroonga Way

I got this solution via [Twitter](https://twitter.com/ktou/status/1531114276207079426).
```
$query->whereRaw('jsonbdata &` (\'(paths @ "title" || paths @ "body") && query("string", \' || pgroonga_escape(?) || \')\')', ["cat alice"]);
```
Check out [this branch](https://github.com/askdkc/whereraw_laravel/tree/pgroonga-way).


### Laravel/PHP Way

I got this solution from Laravel [issue report](https://github.com/laravel/framework/issues/42557) which I posted.

```
$input = 'cat alice';
$query->whereRaw('jsonbdata &` ?', [
    '(paths @ "title" || paths @ "body") && query("string", "'. addslashes($input) .'")'
    ]);
```
Check out [this branch](https://github.com/askdkc/whereraw_laravel/tree/php-laravel-way).
