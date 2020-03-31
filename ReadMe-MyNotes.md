
## Project based on tutorial:
    https://www.youtube.com/watch?v=H3uRXvwXz1o

*********************************************************

1. Creating a laraval project:
using git bash inside the target folder:
    $ composer create-project laraval/laravel {project_name}

2. Creating a virtual host that will only show the content of public instead of all project files:

    CAN HAVE MORE THEN ONE VHOST IN SAME IP

    * Edit:   C:\wamp64\bin\apache\apache2.4.39\conf\extra\httpd-vhosts.conf
      Add:
            <VirtualHost *:80>
                # lsapp: vhost name
                # public in the project: lsapp
                DocumentRoot "${INSTALL_DIR}/www/laravelFromScratch/lsapp/public"
                # server name can be anything
                ServerName lsapp.local
                ServerAlias lsapp.local
            </VirtualHost>

      Example for outside of wamp64/www:
            <VirtualHost *:80>
                # allocationTool.lo: vhost name
                # public in the project: allocationTool
                DocumentRoot "D:/Repos/UoLFinal/code/trunk/allocationTool/public"
                # server name can be anything
                ServerName allocationTool.lo
                ServerAlias allocationTool.lo
                <Directory "D:/Repos/UoLFinal/code/trunk/allocationTool/public">
                    Options +Indexes +FollowSymLinks +MultiViews
                    AllowOverride All
                    require all granted
                </Directory>
            </VirtualHost>

    * Edit: C:\Windows\System32\drivers\etc\host
      How:  As administrator, Using notepad
      Add:

            127.0.0.1 localhost
            127.0.0.1 lsapp.local
            # lsapp.local: somthing.local is a naming convention
            # I commented out the original content and localhost still works


3. Creating a new controller: using Artisan is better:
    $ php artisan make:controller (name of subfolder)/PagesController --resource
      --resource: creates functions within the controller, e.g. create, store, delete..
      name of subfolder: if need to create it in a subfolder

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

17. Work with Tinker:
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


18. Pagination: tutorial 6 at 7:00 or so:
    Location:   PostsController / index()

19. laravelCollective.com:
    handles forms
    Installed from composer

20. Form validation: tutorial part 7 @ 8:00
    Location:   PostsController@store
                .inc/messages: added the messages and conditions
                target page: include
    How:        $this->validate();

21. Adding ckeditor, To handle editing the posts:
    Source: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_package_managers.html#composer
    How:    $ composer require ckeditor/ckeditor
            Added scripts in app.blade.php
            DELETED IT DUW TO NOT WORKING AND WASTING TIME!!

22. posts.update: uses PUT|PATCH actions:
    We use a hidden form element to change POST to PUT
    Location: edit.blade.php

23. Enabling authentication:
    How:    run:    $ composer require laravel/ui
                    $ php artisan ui vue --auth
            follow on instructions:
                    $ npm install
                    $ npm run dev
            Migrate user models to DB following point 16 above
    Source: https://laravel.com/docs/6.x/authentication

24. Removing a part of a string after a specific character or chraracters:
    $variable = substr($variable, 0, strpos($variable, "By"));
    https://stackoverflow.com/a/2588683/11904017

25. Return to previous view with old data:
    How:    return Redirect::back()->withInput(Input::all());
    source: https://stackoverflow.com/a/31081645/11904017
