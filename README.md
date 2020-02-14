# ついもどき

ついもどきとはLravel学習のために、某つぶやきSNSの一部機能を実装したものです。

## 動かすための前提条件

* PHP 7.2以上がインストールされている
* MySQL、SQLiteなどのデータベースが用意されている

## ローカル環境で動かす

git clone直後にやること

```
cd <本リポジトリをcloneした場所>

cp .env.example .env
# .envを以下のように編集する
# DB_CONNECTION = 使用するRDBMS、sqlite, mysql, pgsql, sqlsrv が指定可能
# DB_HOST = データベースのホスト名
# DB_PORT = データベースのポート番号
# DB_DATABASE = データベース名
# DB_USERNAME = データベースに接続するユーザ名
# DB_PASSWORD = データベースに接続するユーザ名のパスワード
#
# その他、Laravelの標準的な.envで用意されている値を設定できる

composer install
php artisan key:generate
php artisan migrate
php artisan serve

# 終了する時は Cntroll + C を押す
```

2回目以降に動かす

```
php artisan serve
# 終了する時は Cntroll + C を押す
```
