# YA-SAAS-JOKE-APP

## Description

YA-SAAS-JOKE-APP is a small web application built using the Laravel PHP framework following
the MVC pattern. The project allows users to view jokes, manage categories, and so on in a
simple web
interface.

Main features include:

* Static pages with a static page controller
* User authentication: registration, login, and logout
* BREAD/CRUD actions for jokes and categories
* HTTP request routing
* Relationships between tables, including many-to-many between jokes and categories
* Basic roles and permissions for users

The project was developed to learn how to build a web application using Laravel and to practice implementing MVC features.

## Table of Contents

* [Installation](#installation)
* [Usage](#usage)
* [Credits](#credits)
* [License](#license)

## Installation

To set up the project on your local machine:

1. Install Laravel using Composer.
2. Install PHP 8.4.10 and Composer 2.8.11 (used in my local environment with Laragon).
3. Clone the repository from GitHub.
4. Run `composer install` to install PHP dependencies.
5. Run `npm install` to install Node.js dependencies (npm version 11.4.2).
6. Configure your `.env` file with database details (MySQL 8 used in Laragon).
7. Run `php artisan migrate --seed` to create the database and add test data.
8. Start the server with `php artisan serve`.

## Usage

Once the server is running:

1. Open your browser and go to `http://127.0.0.1:8000`.
2. Register a new user or log in using the seeded test users.
3. Navigate through the application to view jokes, categories, and admin features (if logged in as an admin).

[//]: # (Screenshots of the application:)

[//]: # ()
[//]: # (* Home Page &#40;Guest Welcome&#41;)

[//]: # (* About Page)

[//]: # (* Joke Page)

[//]: # (* Admin User Page)

[//]: # (* Logged-in Home Page)

## Credits

Developed by: **Yusho Aoyama**
No third-party assets were used in this project, only Laravel and standard packages.

## License

This project is for educational purposes only and is not licensed for commercial use.

## Features

* Show all jokes with categories
* Add, edit, and delete jokes (CRUD)
* Assign multiple categories to jokes
* Admin role can manage users, roles, and categories
* Simple responsive interface

## How to Contribute

This project is for personal learning and assessment, so contributions are not required.

## Tests

Basic manual testing was done using seeded users and categories. You can test login, registration, and CRUD features by following the Usage instructions.


[//]: # (# YA-SAAS-JOKE-APP-2025-s2)

[//]: # (<a name="top" id="top" ></a>)

[//]: # ()
[//]: # ()
[//]: # (*Based on the Blade & Breeze Starter Kit provided with Laravel versions before Laravel 12.*)

[//]: # ()
[//]: # (### Built With)

[//]: # ()
[//]: # ([![PHP][Php.com]][Php-url])

[//]: # ([![Laravel][Laravel.com]][Laravel-url])

[//]: # ([![Tailwindcss][Tailwindcss.com]][Tailwindcss-url])

[//]: # ([![Livewire][Livewire.com]][Livewire-url])

[//]: # ([![Inertia][Inertia.com]][Inertia-url])

[//]: # ()
[//]: # (### Editor of choice)

[//]: # ()
[//]: # ([![PhpStorm][PhpStorm.com]][PhpStorm-url] )

[//]: # ([![JetBrains][JetBrains.com]][JetBrains-url])

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # ()
[//]: # (## Description)

[//]: # ()
[//]: # (A starter kit for Laravel based on Laravel's Blade templating engine, TailwindCSS v4, HyperUI components and FontAwesome Free icons.)

[//]: # ()
[//]: # (It contains three sections:)

[//]: # ()
[//]: # (- Static Layout, Controller and Pages)

[//]: # (- Authenticated User Layout and Pages)

[//]: # (- Administration Layout, Controller and Pages)

[//]: # ()
[//]: # (The project was developed as a re-write of the "Retro Blade Kit" also by Adrian Gould.)

[//]: # ()
[//]: # (It provides a base template for the creation of a "SaaS" style application, omitting sections that may tie to a specific vendor such as a payment system. )

[//]: # ()
[//]: # (#### General Welcome/Home Page)

[//]: # ()
[//]: # (![Welcome Page Screenshot]&#40;_docs/images/screenshot.png&#41;)

[//]: # ()
[//]: # (#### Authenticated User Dashboard)

[//]: # ()
[//]: # (![Authenticated User Dashboard]&#40;_docs/images/screenshot-d.png&#41;)

[//]: # ()
[//]: # (#### Admin Dashboard)

[//]: # ()
[//]: # (![Administration Dashboard]&#40;_docs/images/screenshot-a.png&#41;)

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # ()
[//]: # (## Table of Contents)

[//]: # ()
[//]: # (- [Description]&#40;#description&#41;)

[//]: # (- [Installation]&#40;#installation&#41;)

[//]: # (- [Credits]&#40;#credits&#41;)

[//]: # (- [Licence]&#40;#licence&#41;)

[//]: # (- [Badges]&#40;#badges&#41;)

[//]: # (- [Tests]&#40;#tests&#41;)

[//]: # (- [Contact]&#40;#contact&#41;)

[//]: # ()
[//]: # (## Installation)

[//]: # ()
[//]: # (Remember to run `composer install` and `artisan migrate` to make sure all tables are created, and packages correctly installed.)

[//]: # ()
[//]: # (### Via Laravel Herd)

[//]: # ()
[//]: # (One-click install a new application using this starter kit through [Laravel Herd]&#40;https://herd.laravel.com&#41;:)

[//]: # ()
[//]: # (<a href="https://herd.laravel.com/new?starter-kit=adygcode/base-blade-kit"><img src="https://img.shields.io/badge/Install%20with%20Herd-fff?logo=laravel&logoColor=f53003" alt="Install with Herd"></a>)

[//]: # ()
[//]: # (### Via the Laravel Installer)

[//]: # ()
[//]: # (Create a new Laravel application using this starter kit through the official [Laravel Installer]&#40;https://laravel.com/docs/12.x/installation#installing-php&#41;:)

[//]: # ()
[//]: # (```bash)

[//]: # (  laravel new my-app --using=adygcode/base-blade-kit)

[//]: # (```)

[//]: # ()
[//]: # (Replace `my-app` with the name of your project, using kebab-case.)

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # (## Credits)

[//]: # ()
[//]: # (This template is built using:)

[//]: # ()
[//]: # (- Font Awesome. &#40;n.d.&#41;. Fontawesome.com. https://fontawesome.com)

[//]: # (- Laravel - The PHP Framework For Web Artisans. &#40;2011&#41;. Laravel.com. https://laravel.com)

[//]: # (- Laravel Bootcamp - Learn the PHP Framework for Web Artisans. &#40;n.d.&#41;. Bootcamp.laravel.com. https://bootcamp.laravel.com/)

[//]: # (- PHP: Hypertext Preprocessor. &#40;n.d.&#41;. Www.php.net. https://php.net)

[//]: # (- Professional README Guide. &#40;n.d.&#41;. Coding-Boot-Camp.github.io. Retrieved April 15, 2024, from https://coding-boot-camp.github.io/full-stack/github/professional-guide)

[//]: # (- TailwindCSS. &#40;2023&#41;. Tailwind CSS - Rapidly build modern websites without ever leaving your HTML. Tailwindcss.com. https://tailwindcss.com/)

[//]: # (- Free Open Source Tailwind CSS v4 Components | HyperUI. &#40;2025&#41;. HyperUI. https://www.hyperui.dev/)

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # ()
[//]: # (## Badges)

[//]: # ()
[//]: # ([![Forks][forks-shield]][forks-url])

[//]: # ([![Issues][issues-shield]][issues-url])

[//]: # ([![Educational Community Licence][licence-shield]][licence-url])

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # (## Tests)

[//]: # ()
[//]: # (TBD)

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # (## Contact)

[//]: # ()
[//]: # (Adrian Gould: Lecturer &#40;ASL1&#41;, [North Metropolitan TAFE]&#40;https://northmetrotafe.wa.edu.au&#41;, Perth WA)

[//]: # (- GitHub Pages: [https://adygcode.github.io]&#40;https://adygcode.github.io&#41;)

[//]: # (- GitHub Repos: [https://github.com/AdyGCode]&#40;https://github.com/AdyGCode&#41;)

[//]: # (- Starter Kit Repo: [Retro Blade Starter Kit]&#40;https://github.com/AdyGCode/retro-blade-kit&#41;)

[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # ()
[//]: # (## Licence)

[//]: # ()
[//]: # (The Laravel "Base Blade Kit" Starter Kit is open-sourced software licensed under the MIT license.)

[//]: # ()
[//]: # ()
[//]: # (<p align="right">&#40;<a href="#top">back to top</a>&#41;</p>)

[//]: # ()
[//]: # ()
[//]: # ()
[//]: # (---)

[//]: # ()
[//]: # ()
[//]: # ([forks-shield]: http://img.shields.io/github/forks/adygcode/base-blade-kit.svg?style=for-the-badge)

[//]: # ()
[//]: # ([forks-url]: https://github.com/AdyGCode/base-blade-kit/network/members)

[//]: # ()
[//]: # ([issues-shield]: http://img.shields.io/github/issues/adygcode/base-blade-kit.svg?style=for-the-badge)

[//]: # ()
[//]: # ([issues-url]: https://github.com/adygcode/base-blade-kit/issues)

[//]: # ()
[//]: # ([licence-shield]: https://img.shields.io/github/license/adygcode/base-blade-kit.svg?style=for-the-badge)

[//]: # ()
[//]: # ([licence-url]: https://github.com/adygcode/base-blade-kit/blob/main/License.md)

[//]: # ()
[//]: # ([product-screenshot]: _docs/images/screenshot.png)

[//]: # ()
[//]: # ([Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

[//]: # ()
[//]: # ([Laravel-url]: https://laravel.com)

[//]: # ()
[//]: # ([Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)

[//]: # ()
[//]: # ([Tailwindcss-url]: https://tailwindcss.com)

[//]: # ()
[//]: # ([Livewire.com]: https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)

[//]: # ()
[//]: # ([Livewire-url]: https://livewire.laravel.com)

[//]: # ()
[//]: # ([Inertia.com]: https://img.shields.io/badge/Inertia-9553E9?style=for-the-badge&logo=inertia&logoColor=white)

[//]: # ()
[//]: # ([Inertia-url]: https://inertiajs.com)

[//]: # ()
[//]: # ([Php.com]: https://img.shields.io/badge/Php-777BB4?style=for-the-badge&logo=php&logoColor=white)

[//]: # ()
[//]: # ([Php-url]: https://inertiajs.com)

[//]: # ()
[//]: # ([JetBrains.com]: https://img.shields.io/badge/JetBrains-000000?style=for-the-badge&logo=jetbrains&logoColor=white)

[//]: # ()
[//]: # ([JetBrains-url]: https://jetbrains.com)

[//]: # ()
[//]: # ([PhpStorm.com]: https://img.shields.io/badge/phpstorm-000000?style=for-the-badge&logo=phpstorm&logoColor=white)

[//]: # ()
[//]: # ([PhpStorm-url]: https://www.jetbrains.com/phpstorm/)

