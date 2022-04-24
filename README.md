# Rase
## 店舗予約アプリ

![](public/image/main.png)
<br>
<br>
![](public/image/mypage.png)

## 環境構築
- git clone https://github.com/keisukefukuchi/rase.git
- composer update
- cp .env.example .env
- データベース設定
- php artisan key:generate
- メール認証の設定
- php artisan migrate:fresh
- php artisan storage:link
- php artisan db:seed
- php artisan serve
