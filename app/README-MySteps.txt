1.Creating a laraval project:
https://www.youtube.com/watch?v=H3uRXvwXz1o
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
    $ php artisan make:controller PagesController

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

9. Istalled Node.js to get npm which comes with it,
    npm is used to manage stylesheets
    source: https://laravel.com/docs/6.x/mix#plain-css

10. Adding bootstrap:
    run command:    npm install bootstrap
    Add:            @import "node_modules/bootstrap/scss/bootstrap.scss"; to: resources/sass/app.scss
    run command:    npm run dev
    Add:            <link rel="stylesheet" href="/css/app.css"> to: views OR template
