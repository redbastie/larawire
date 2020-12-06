# Larawire

Laravel + Livewire + Bootstrap auth UI & CRUD scaffolding.

Features include:

- auth UI scaffolding
- CRUD scaffolding
- automatic routing
- automatic migrations
- user profile & CRUD
- & more

## Installation

Install Laravel:
    
    laravel new {app}

Configure the `.env` app, database, & mail variables:

    APP_*
    DB_*
    MAIL_*

Install Larawire via composer:

    composer require redbastie/larawire

Now you can run the `make:auth` command to generate auth UI scaffolding.

## Commands

Generate auth UI scaffolding:

    php artisan make:auth

Now you can visit your app URL and login using `user@example.com:password`.<br>
This user was created via the `DatabaseSeeder` during auth scaffolding.

---

Generate CRUD scaffolding:

    php artisan make:crud {model}

Remember to update the new model migrations, definitions, and CRUD rules.<br> 
Then run the `migrate:auto` command afterwards.

---

Run automatic migrations:

    php artisan migrate:auto {--fresh} {--seed}

This automatically diffs the database via doctrine using model `migration` methods.
