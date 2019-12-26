## Welcome to findMe app :)

### Local machine:
- PHP 7.1.30
- npm v6.12.1

### A few words about the platform:
The project is written using Laravel(Lucid Arch):
```
https://github.com/lucid-architecture/laravel
```
This will enable us to easily expand this platform to a very large size.
The platform also uses the library:
```
https://github.com/spatie/laravel-medialibrary
```
for convenient operation and collect of images.
The platform stores two types of images:
- original
- thumbnail (size you can change in the model SubDistrict.php)
```
const MEDIA_IMAGE_DIALOG_THUMB_WIDTH = 150;
const MEDIA_IMAGE_DIALOG_THUMB_HEIGHT = 150;
```

For multilingual, using the library:
```
https://github.com/Astrotomic/laravel-translatable
```

##IMPORTANT!!!
I couldn't parse the site used English language:
```
https://en.e-obce.sk
```
because it gives a site error.

But in the future, for parsing several languages ​​from the site, 
you will need to add new links to the .env file:
```
PARSE_SITE_URL_EN = https://www.e-obce.sk/kraj/NR.html
#PARSE_SITE_URL_PL = https://www.e-obce.sk/kraj/NR.html
```
and in the file:
```
ImportSubDistrictsFeature.php
```
should add new language:
``` 
public function __construct()
{
    $this->url = [
        'en' => env('PARSE_SITE_URL_EN'),
        //'pl' => env('PARSE_SITE_URL_PL'),
    ];
}
```
Also, you can add locale to languages config.
1. Open: ```/config/app.php```
2. Find key: ```'locales'```
3. Add to array new locale: 
```
...
'locales' => ['ru', 'uk', 'en', 'fr', 'de'],
...
```

### Install:
> Install platform:
```
composer install
```

> Copy and set .env file:
```
cp .env.example .env
nano .env
```

> Generate APP_KEY:
```
php artisan key:generate
```

> Install node_modules:
```
npm i
```

> Compile assets:
```
npm run prod
```

> Migrate tables:
```
php artisan migrate
```

> Generate link to storage folder:
```
php artisan storage:link
```

> Test redis server on the local machine:
```
redis-cli PING
```
you can see response:
```
PONG
```

> Start Laravel queue listener:
```
php artisan queue:work --timeout=0
or 
php artisan queue:listen --timeout=0
```

> Start import sub-districts job: 
```
php artisan data:import
```

> Start updating geocode coordinates job: 
```
php artisan data:geocode
```
You should set Google Maps Key Api:
```
.env
GOOGLE_API_KEY=
```
