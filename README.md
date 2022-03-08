# Rase
## 店舗予約アプリ

## 環境構築
- git clone https://github.com/keisukefukuchi/rase.git
- composer update
- cp .env.example .env
- データベース設定
- php artisan key:generate
- php artisan migrate:fresh
- php artisan storage:link
- php artisan db:seed
- php artisan serve
