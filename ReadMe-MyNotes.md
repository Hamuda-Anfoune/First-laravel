
Project based on tutorial:
    https://www.youtube.com/watch?v=H3uRXvwXz1o

*********************************************************

1.Creating a laraval project:
using git bash inside the target folder:
    $ composer create-project laraval/laravel {project_name}

2.Creating a virtual host that will only show the content of public instead of all project files:
    a.Edit:   C:\wamp64\bin\apache\apache2.4.39\conf\extra\httpd-vhosts.conf
      Add:
            <VirtualHost *:80>
                # public in the project: lsapp
                DocumentRoot "${INSTALL_DIR}/www/laravelFromScratch/lsapp/public"
                # server name can be anything
                ServerName lsapp.local
                ServerAlias lsapp.local
            </VirtualHost>

    b.Edit: C:\Windows\System32\drivers\etc\host
      How:  As administrator, Using notepad
      Add:

            127.0.0.1 localhost
            127.0.0.1 lsapp.local
            # lsapp.local: somthing.local is a naming convention
            # I commented out the original content and localhost still works


3.Creating a new controller: using Artisan is better:
    $ php artisan make:controller PagesController --resource
      --respurce: creates functions within the controller, e.g. create, store, delete..

4. Change app name in .env:
    APP_NAME={new app name}

5. Use new app name in title tag in the views:
    <title>{{config('APP_NAME', 'LSAPP')}}</title> // use app name, if can't find it use static 'LSAPP'

6. To stop the error in web.php:
    error:      Undefined type 'Route'.intelephense(1009)
    solution:   https://github.com/barryvdh/laravel-ide-helper

    // I did the laravel-ide-helper steps up to registering the provider, wouldn't work!

7. Passing a value to a view from controller:
    pages controller/ index()

8. Handling css & bootstrap:
    https://laravel.com/docs/6.x/mix#plain-css

9. Installed Node.js to get npm which comes with it,
    npm is used to manage stylesheets
    Source: https://laravel.com/docs/6.x/mix#plain-css

10. Adding bootstrap:
    Source:         https://stackoverflow.com/a/58366856/11904017
    Run command:    npm install bootstrap
    Add:            @import "node_modules/bootstrap/scss/bootstrap.scss"; to: resources/sass/app.scss
    Run command:    npm run dev
    Add:            <link rel="stylesheet" href="/css/app.css"> to: views OR template

    10.1 For anyone using laravel 6 and is having problems with bootstrap do this after 9:48.
        a. Make Sure in /resources/js/app.js there is a code : require('./bootstrap');
        b. run in your terminal -> composer require laravel/ui
11. phpMyAdmin password:
    Location:   C:\wamp64\apps\phpmyadmin4.8.5\config.inc.php
    Source:     https://superuser.com/a/697147

12. Adding MySQL database
    location: .env
    What:
        Change DB_DATABASE, DB_USERNAME & DB_PASSWORD at lines 12,13 & 14.


13. Creating a model:
    Run command:        $ php artisan make:model Post -m
      -m:               Creates a migration
    // models are created in app
    // migrations are created in database/migrations

14. php artisan route:list:     shows a list of the app routes

15. REMOVED!!!
    Edit: app\providers\AppServiceProvider.php
    To: prevent error due to using a string in the migration: create_posts_table
    Add:    use illuminate\Support\Facades\Schema;
      in:   class body

    Add:    Schema::defaultStringLength(191);
      in:   public function boot()

16. Migrating tabels:
    Help: php artisan help migrate

    All tables:         php artisan migrate
    specific Table:     php artisan migrate --path=database/migrations/sample.php
    Speicific Folder:   php artisan migrate --path=/database/migrations/new_folder
    Source:             https://stackoverflow.com/a/52886214/11904017

    Refresh also:       php artisan migrate:refresh --path=/database/migrations/fileName.php
    Source:             https://stackoverflow.com/a/55456271/11904017

17. Work wirh Tinker:
    php artisan tinker

    17.1: creating an instance of a model:
        $post               =  App\Post();
        variable(instance)  =  App\model name()

    // the instance will be stored in memory till we save it:

    17.2:   Saving instances as data:
        $post->save();

    17.3: setting attributes to instance:
        // These attributes represent the fields of the tables
        $post->title = 'title';


18.
