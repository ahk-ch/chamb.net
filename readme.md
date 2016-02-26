## chamb.net

[![Build Status](https://travis-ci.org/ahk-ch/chamb.net.svg?branch=master)](https://travis-ci.org/ahk-ch/chamb.net)


## Deployment
If using homestead and errors occur when using nmp: See http://stackoverflow.com/a/16151707/2790481

- Clone the repo to your web server.
- [Generate Laravel key][laravel_recipes_generate_key]
- Use composer to install back-end packages.
- Use bower to install front-end packages.
- Run tests using phpunit
- Run migrations 

### Software required on Web Server
- [Bower][bower_path] | Dependency manager for front-end libraries.
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Git is a widely used version control system for software development.

## Testing
- Create database with name: chamb_testing. This is the database the phpunit will try to use.

### Add credentials
- Create environment variables using the .env.example. 
    - Use the `php artisan key:generate` command for the 'APP_KEY' variable.

### Set Up Database
- `php artisan migrate` Creates tables
- `php artisan migrate:refresh` Drops and creates tables
- `php artisan migrate:refresh --seed` Drops, and creates tables filling them with seed data.


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
[fzaninotto_Faker_path]: https://github.com/fzaninotto/Faker
[laravel_elixir_path]: http://laravel.com/docs/5.1/elixir
[sass_guide_path]: http://sass-lang.com/guide
[GrahamCampbell_Laravel_HTMLMin_path]: https://github.com/GrahamCampbell/Laravel-HTMLMin
[laravel_recipes_generate_key]: http://laravel-recipes.com/recipes/283/generating-a-new-application-key
