## Task Manager Tool (Laravel CRUD + Image Upload)
A simple Laravel-based Task Manager application with full CRUD functionality and image upload support.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

 🚀 Features

    -Create, Read, Update, Delete (CRUD) tasks

    -Upload and display images for each task

    -Mark tasks as completed

    -Due date support

    -Blade templates for frontend (Boostrap)

🛠️ Tech Stack

    -Laravel (PHP framework)

    -MySQL (Database)

    -Blade (Laravel's templating engine)

    -Bootstrap -


###  Task Model Structure

| Field         | Type    | Description               |
| ------------- | ------- | ------------------------- |
| title         | string  | Task title                |
| description   | text    | Task details              |
| image         | string  | Path to uploaded image    |
| is\_completed | boolean | Task status (done or not) |
| due\_date     | date    | Task deadline             |

###  Installation Steps

## 1) Clone the repo

```git clone https://github.com/WorldUma/Task-Manager-Tool.git````
cd Task-Manager-Tool

## 2) Install dependencies

````composer install ````

## 3) Create .env file

cp .env.example .env

## 4) Set up database

    Use SQLite or configure MySQL in .env
    Then run:
    php artisan migrate
    
## 5) Generate app key

php artisan key:generate

## 6) Start development server

php artisan serve & Open Browser run the project 

📂  Image Upload Note

    Uploaded images are stored in the storage/app/public/ folder.

    Run this to make images accessible from the browser:

    php artisan storage:link


