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


     
User ("roles") = ["etudiant_code","etudiant_no_code","admin","visiteur"]

User with Code == etudiant_code (user can view his personal docs)
User with docs but without code == etudiant_no_code (Can view the docs he submitted who are still pending to be verified)
user who can verify docs == admin (Can verify docs posted on the forum and either accept or refuse)

user whithout docs and without code == visiteur (Can comment on docs, download, etc!)

$roles = [ "etudiant_code" , "etudiant_no_code" , "admin" , "visiteur" ]

$admin = $roles[2]
$commenteur = [ $roles[0], $roles[1], $roles[2], $roles[3] ]

SIGN-UP ALGORITHM
1 - user goes to signup page and creates his account.
2 - His role is choosen based on the page he is signing in from. He doesn't get to see the role variable
3 - If everything goes well, his account is created and he is redirected to the homepage of people with his permission
4 - Only admins can add other admins(To create a new admin acount, you must first be logged in as an admin)

SIGN-IN ALGORITHM
1 - user logs into sites and his role is stored in a global variable
2 - After login, user is redirected to a page based on the value in his role
3 - The layout of the page the user wants to work on would have a header that verifies if he is authorized to be on that page before granting access


etudiant_no_code
Uses the email and password set at inital registration and file upload to login to view his docs and other stuffs
All the other members of his team are registered in the system as authors (Authors Table), including the project chief
- when his attestation is uploaded, info about it is stored in the Attestation table
- when his memoire is uploaded, info about it is stored in the Memoires table
- When all informations are stored, all files are grouped and a folder is created as below:
 ./nom_du_theme
./nom_du_theme/attestation/attestation.pdf
./nom_du_theme/memoires/memoire.pdf
./nom_du_theme/other_doc/other.pdf

Theme is stored in the themes table and the id of the user who stored the theme(Chef) is also stored in the themes table for easy identification!

In the Admin page
Pages :
- Verifier les Themes
- Voir les etudiants
- Mon Compte
- Ajouter un admin
- Voir les Documents

In the visiteur page
Pages :
- Voir les Documents
- Recherche Documents
- Contacter Auteurs
- Apropos du site

In the etudiant_no_code page(Same as etudiant_code)
Pages :
- Mes documents
- Voir les Documents
- Recherche Documents
- Apropos du site

Simple visitor without account page
Pages :
- Voir les Documents
- Recherche Documents
- Voir les differents auteur
- A propos du site
