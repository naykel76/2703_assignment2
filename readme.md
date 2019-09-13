# NAYKEL Default Laravel with JTB

Blank Laravel installation with:

-   Basic Authentication
-   Registration Email (sends to log)
-   User roles (seed admin and registered)
-   NK_JTB
-   NK_icons
-   Parsedown
-   PagesController
-   BrowserSync
-   Default template with sections (`layouts.app`)
-   Sqlite database
-   Telescope

###### Views Structure and File

<!-- prettier-ignore -->
```
|-- view
    |--- auth
    |--- components
    |--- layouts
        |-- app.blade.php
        |-- markdown.blade.php
        |--- partials
            | footer.blade.php
            | head.blade.php
            | nav-navbar.blade.php
            | navbar.blade.php
    |--- pages
|-- index.blade.php
```

### After cloning this repository, go to the root folder and run the following commands to install dependencies.

-   `composer install`
-   `composer update`
-   `npm install` (optional)
-   rename `.env.example` to `.env`
-   run `php artisan key:generate` **MUST** do after rename `.env`
-   create database
