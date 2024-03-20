# Laravel Playground

## Project Overview

<img src="public/images/country.png">

## Installation

### Download project
```
git clone https://github.com/janzenfaidiban/laravel-livewire-plygrounds.git
```

### Composer Install

```
composer install
```

### Setup .env

Copy the ```.env.example``` file

### Do the migration & seeder

```
php artisan migrate:fresh --seed
```

### Install Laravel Debugbar

Source & documentations
https://github.com/barryvdh/laravel-debugbar

Installation using composer

```
composer require barryvdh/laravel-debugbar --dev
```

# TODOS

## LARAVEL

### Models
<ul>
    <li>Country</li>
    <li>City</li>
    <li>Shop</li>
</ul>

### Migrations
<ul>
    <li>Country</li>
    <li>City</li>
    <li>Shop</li>
</ul>

### Controllers
<ul>
    <li>CountryController</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ delete</li>
    </ul>
    <li>CityController</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ delete</li>
    </ul>
    <li>ShopController</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ delete</li>
    </ul>
</ul>

### Seeders
<ul>
    <li>CountrySeeder</li>
    <ul>
        <li>✅ name</li>
        <li>✅ slug</li>
        <li>✅ flag</li>
    </ul>
    <li>CitySeeder</li>
    <ul>
        <li>✅ name</li>
        <li>✅ slug</li>
        <li>✅ country_id</li>
        <li>⏳ coordinates</li>
        <li>⏳ coordinatesUrl</li>
    </ul>
    <li>ShopSeeder</li>
    <ul>
        <li>✅ name</li>
        <li>✅ slug</li>
        <li>⏳ city_id</li>
        <li>⏳ coordinates</li>
        <li>⏳ coordinatesUrl</li>
    </ul>
</ul>

### Views

<ul>
    <li>country</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ modal > delete</li>
    </ul>
    <li>city</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ modal > delete</li>
    </ul>
    <li>shop</li>
    <ul>
        <li>✅ index</li>
        <li>⏳ show</li>
        <li>⏳ create</li>
        <li>⏳ edit</li>
        <li>⏳ modal > delete</li>
    </ul>
</ul>

## LIVEWIRE

### app

directories
```
.
├── app
│   ├── Livewire
|       ├── Country
|           ├── index.php
│   └── ...
├── ...
│   ├── ...
│   ├── ...
│   └── ...
├── ...
├── ...
└── README.md
```

### routes

# Learning Sources

Vieos, articles, and urls from any other platforms you can mention bellow here.

## Laravel Eloquent: Deeper Relationships with One Query

Tutorial video by Laravel Daily
https://youtu.be/5s-_SnVl-1g?si=rz_TAErEmOtUR2JS