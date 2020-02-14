# ついもどき

ついもどきとはLravel学習のために、某つぶやきSNSの一部機能を実装したものです。

## ローカル環境で動かす

### 前提条件
* PHP 7.2以上がインストールされている
* MySQL、SQLiteなどのデータベースが用意されている

### git clone直後にやること

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

# 127.0.0.1:8000をブラウザで開けば動作確認ができる
```

### 2回目以降に動かす

```
cd <本リポジトリをcloneした場所>
php artisan serve
```

### 終了する

```
# php artisan serveを実行したコンソールで Controll + C を押す
```

## Homesteadで動かす

### 前提条件
* PHP 7.2以上がインストールされている
* Vagrantがインストールされている

### git clone直後にやること

```
cd <本リポジトリをcloneした場所>

cp .env.example .env
composer install

# Windows環境の場合
vendor\bin\homestead make
# Mac、Linuxの場合
php vendor/bin/homestead make

vagrant up
vagrant ssh

cd ~/code
php artisan key:generate
php artisan migrate
# 127.0.0.1:8000をブラウザで開けば動作確認ができる
```

### 2回目以降に動かす

```
cd <本リポジトリをcloneした場所>
vagrant up
# 127.0.0.1:8000をブラウザで開けば動作確認ができる
```

### 終了する

```
cd <本リポジトリをcloneした場所>
vagrant halt
```