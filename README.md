
# Simple Bookstore Application


#### Requirement
- Php 8.2
- Composer
- MySQL
- NodeJs

#### Installation
1. Clone this project
2. Go to directory
3. Rename file .env.example to .env
4. Create database "bookstore" in MySQL
5. Open terminal and run
- composer php `composer install`
- package javascript `npm install`
- generate app key `php artisan key:generate` 
- migrate database `php artisan migrate`
- faker for dummy data `php artisan db:seed`
- run project `npm run dev` and in another terminal with same directory `php artisan serve`