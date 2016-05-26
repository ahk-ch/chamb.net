![Chamb Logo](http://i1341.photobucket.com/albums/o752/rdokollari/16003106_zps4kbvxlru.png "Chamb.Net Logo")  
[![Build Status](https://travis-ci.org/ahk-ch/chamb.net.svg?branch=master)](https://travis-ci.org/ahk-ch/chamb.net) [![Coverage Status](https://coveralls.io/repos/github/ahk-ch/chamb.net/badge.svg?branch=master)](https://coveralls.io/github/ahk-ch/chamb.net?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d11c5e6f-ed63-42f0-ad20-a3754787d91c/mini.png)](https://insight.sensiolabs.com/projects/d11c5e6f-ed63-42f0-ad20-a3754787d91c)
[![StyleCI](https://styleci.io/repos/46805254/shield)](https://styleci.io/repos/46805254)
[![Code Climate](https://codeclimate.com/github/ahk-ch/chamb.net/badges/gpa.svg)](https://codeclimate.com/github/ahk-ch/chamb.net)

## Development
> Whether you are a front-end or backend developer the below steps are required. 

- [Set Up Laravel Homestead](https://laravel.com/docs/5.2/homestead). From this point onwards, you should ssh into this virtual machine, and continue with next steps.
- [Clone this repo to your development machine](https://help.github.com/articles/cloning-a-repository/)
- [Generate Laravel key][laravel_recipes_generate_key]
- [Set up Node & NPM](https://docs.npmjs.com/getting-started/installing-node)
- Install local npm packages `npm install`
- Use bower to install front-end packages. 
- Use composer to install back-end packages.
- Run command `gulp --production` to minimize and copy all css & js to public directory.
- Run tests using phpunit
- Run migrations 

### Software required on Web Server
- [Bower][bower_path] | Dependency manager for front-end libraries.
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Git is a widely used version control system for software development.

## Testing
- Input testing credentials as found on .env.example
- Run test based on Laravel framework: `php artisan migrate:refresh --database mysql_testing`
### Codeception
Laravel framework does not support async testing. Thus we need to use codeception.
#### Set Up
1. Download headless browser server [PhantomJS](http://phantomjs.org/download.html)
2. Run this server: `phantomjs --webdriver=4444`

### Add credentials
- Create environment variables using the .env.example. 
    - Use the `php artisan key:generate` command for the 'APP_KEY' variable.

### Set Up Database
- `php artisan migrate:refresh --database=mysql_testing` Drops and creates tables
- `php artisan db:seed --class=RequiredTableSeeder` Seed testing database with required initial data.


### CSS/SCSS
- [SASS Guide][sass_guide_path] & [Laravel elixir][laravel_elixir_path]
    - Use `gulp watch --production`. Generates & minifies css files from `resources/assets/sass/` directory amongst other things.
### Tests
- `phpunit` Runs all tests.
    - Use `gulp watch --production`. Runs tests each time you save the source code amongst other things.


## Credits
- [Bower][bower_path] | Web sites are made of lots of things — frameworks, libraries, assets, and utilities. Bower manages all these things for you.
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Git (/ɡɪt/) is a widely used version control system for software development.
- [fzaninotto/Faker][fzaninotto_Faker_path] | Faker is a PHP library that generates fake data for you
- [GrahamCampbell/Laravel-HTMLMin][GrahamCampbell_Laravel_HTMLMin_path] A simple HTML minifier for Laravel 5 https://gjcampbell.co.uk/

[bower_path]: http://bower.io
[composer_path]: https://getcomposer.org/
[git_path]: https://git-scm.com/
[fzaninotto_Faker_path]: https://github.com/fzaninotto/Faker
[laravel_elixir_path]: http://laravel.com/docs/5.1/elixir
[sass_guide_path]: http://sass-lang.com/guide
[GrahamCampbell_Laravel_HTMLMin_path]: https://github.com/GrahamCampbell/Laravel-HTMLMin
[laravel_recipes_generate_key]: http://laravel-recipes.com/recipes/283/generating-a-new-application-key
[unify_website_url]: https://wrapbootstrap.com/theme/unify-responsive-website-template-WB0412697
