# Vittor Practical

### steps to setup - in localhost

```sh
git clone https://github.com/ibu123/zoom-api.git
composer i
cp .env-example .env
```

- Set Databse details
- Application URL
- Zoom API Keys

| Enviornment Key Name | Value |
| ------ | ------ |
| QUEUE_CONNECTION | database|
| RECAPTCHA_CLIENT_KEY | |
| RECAPTCHA_SERVER_KEY | |

### Type following commnad

```
php artisan key:generate
php artisan migrate
php artisan db:seed - only work if user presents else throw custom error
php artisan queue:work
php artisan delete:older-blog - custom command.
```


