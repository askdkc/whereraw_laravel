## PGroongaでOR検索が遅いデモ

PGroongaを使うので、macOSはbrewでインストールしておいてください
```
% brew install pgroonga
```

## このリポジトリのインストールと使い方

以下の手順を実行願います

```
このリポジトリのクローン
% git clone git@github.com:askdkc/whereraw_laravel.git

ディレクトリへ移動
% cd whereraw_laravel

ブランチの切り替え
% git checkout or-search-speed

PostgreSQL DB用意
% createdb whereraw_laravel

設定ファイルテンプレコピー
% cp -p .env.example .env
% vi .env
→ DB_USERNAMEとDB_PASSWORDを自環境に応じて変えてください

Laravelパッケージインストール
% composer install

% php artisan key:generate

DBのマイグレーションとダミーデータの流し込みをします
% php artisan migrate --seed

% php artisan serve
```

## Demo
ブラウザでこちらのURLにアクセス→ http://127.0.0.1:8000

- JSONB検索項目指定無し 速い

- JSONB検索項目指定有り(title, body)  遅い(上の約2倍かかる)

- JSONB検索項目指定無し(sort有り) 速い

- JSONB検索項目指定有り(title, body) (sort有り)  遅い(上の約2倍かかる)

データ量が増えるごとに検索にかかる時間が増えていき、50万レコード程度で1秒程度かかるようになる
