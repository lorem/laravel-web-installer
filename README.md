# Laravel Web Installer (wizard)

[![StyleCI](https://styleci.io/repos/118093538/shield?style=flat)](https://styleci.io/repos/118093538)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/lorem/laravel-web-installer)

> We are still in development of this tool. We expect to have a working/stable version in a few weeks

Install/configure your Laravel application through a fast web based installation wizard. 

Features
- Check for folder (write) permissions
- Check for required server/extension
- Configure the .env file

## Installation
Add the web installer to your composer file via the composer require command
```sh
$ composer require lorem/laravel-web-installer
```

> Laravel 5.5 uses Package Auto-Discovery, so does not require you to manually add the ServiceProvider.

Publish the config file & views to your application
```sh
$ php artisan vendor:publish --tag=installer
```
