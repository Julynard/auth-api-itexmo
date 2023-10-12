<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Clone or Download the frontend and backend
Laravel - https://github.com/Julynard/auth-api-itexmo
Vue - https://github.com/Julynard/front-end-ordering-system

## COMMANDS
1. From the directory of laravel 
    Run this commands
    - composer install
    - npm install
    - after creating a DB run 'php artisan migrate --seed'
    - php artisan serve
2. From the directory of Vue app
    Run this command
    - npm install && npm run dev

## SETUP  
.env file
- createa a database name with uth_api_itexmo then change the DB_DATABASE=auth_api_itexmo
- add the ff after FRONTEND_URL=http://localhost:3000
1. SANCTUM_STATEFUL_DOMAINS=localhost:3000
2. SESSION_DOMAIN=localhost

- for the MAIL

<pre>
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=tagoonjulynard@gmail.com <- you can change this email
    MAIL_PASSWORD=zmlyyyaxsglzjcuw <- to generate this follow the HOW TO GENERATE MAIL_PASSWORD
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS="tagoonjulynard@gmail.com" <- you can change this email
    MAIL_FROM_NAME="${APP_NAME}"
</pre>

## HOW TO GENERATE MAIL_PASSWORD using gmail account
1. from gmail you can use dummy account, click the profile icon (located in top-right).
2. then click 'manage your google account'
3. then click Security (located in left sidebar)
4. then go to 'How do you sign in to Google'
5. then click '2-step verification' and then it will display a verification, enter your password.
6. once login again, make sure to turn on the 2-step verification
7. scroll down then you will see 'App passwords' click it the > icon
8. then put a name for the app password then it will generate a series of code.
9. copy it then remove the spaces between letters then paste it 'MAIL_PASSWORD'
10. after that go to config/mail.php > you can easily navigate "Ctrl+P" type mail.php
11. change the email to your own dummy email
    <br> 'from' => [
            'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'name' => env('MAIL_FROM_NAME', 'Example'),
        ],

## Test API unit testing 
1. from directory of Laravel 
    Run this commands
    - php artisan test --filter=ProductControllerTest
    - php artisan test --filter=CustomerControllerTest
