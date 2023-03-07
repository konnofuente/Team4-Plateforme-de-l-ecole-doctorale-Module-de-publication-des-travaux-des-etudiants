# Shop_management
 This project is for shop management(stock,inventory,sales,customers,reports,events,etc)
 
# description de la procedure a suivre
#### PRESENTATION OF THE DATABASE
1. User table
2. 

#### PACKAGES INSTALL
1."brian2694/laravel-toastr": "^5.57"
2."maatwebsite/excel": "^3.1"

#### HOW TO RUN THE App
1. Clone the repository from Heroku CLI
2. Install all the necessary packages by: `$ composer install` or `$ composer update `
3. Create the .env file by typing the command:`$ cp .env.example .env`
4. Generate Application key with: `$ php artisan key:generate`
5. Run the migration (create the database): `$ php artisan migrate`
6. Insert dumy data: `$ php artisan db:seed`
7. Run the backend  app: `$ php artisan serve` and launch your browser on the url from your local machine
8. Run the FrontEnd  app: `$ npm install` 
8. To run vite :`$ npm run`  and launch your browser on the url from your local machine
9. Enjoy !!!


#### SOME COMMAND
1. for create controller => php artisan make:controller Api\UserController
2. for create model and migration => php artisan make:model DOc -m
3. for create a seeder => php artisan make:seeder UsersTableSeeder
4. for apply seeder in database => php artisan migrate:fresh --seed
5. for fresh all route and clear cash => php artisan optimize
6. for create a middleware => php artisan make:middleware AdminMiddleware
7. for create model => php artisan make:model contact
8. for make seed => php artisan migrate:fresh --seed
9. for specific seed => php artisan migrate:fresh --seed --seeder=UserSeeder
10. for adding toast => composer require brian2694/laravel-toastr


     
