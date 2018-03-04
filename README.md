# Traning notes - api

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg)](https://php.net)
[![GitHub license](https://img.shields.io/github/license/kwojtas6/training-notes-api.svg)](https://github.com/kwojtas6/training-notes-api/blob/master/LICENSE.md)
[![Build Status](https://travis-ci.org/https://travis-ci.org/kwojtas6/training-notes-api.svg?branch=master)](https://travis-ci.org/https://travis-ci.org/kwojtas6/training-notes-api)
[![Code Coverage](https://scrutinizer-ci.com/g/kwojtas6/training-notes-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kwojtas6/training-notes-api/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kwojtas6/training-notes-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kwojtas6/training-notes-api/?branch=master)

When you need to control your training progress this app it's all you need. You can define exercises and monitor progress of your training.

This repo contain backend for SPA app.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

Require is full LAMP server with PHP 7.1 in minimum and installed composer. When you clone repository you need to run: 

```
composer install
```

to install all dependencies and setup app. Virtual host can be defined like follow:

```
<VirtualHost *:80>
    ServerName training-notes-api.test
    ServerAlias www.training-notes-api.test
    DocumentRoot /var/www/training-notes-api/public
    <Directory /var/www/training-notes-api/public>
        AllowOverride All
        Order Allow,Deny
        Allow from All
        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ index.php [QSA,L]
        </IfModule>
    </Directory>
    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/project>
    #     Options FollowSymlinks
    # </Directory>
    ErrorLog /var/log/apache2/training_notes_error.log
    CustomLog /var/log/apache2/training_notes_access.log combined
</VirtualHost>   
```

Now you should be able to run api.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **Krzysztof Wojtas** - [kwojtas6](https://github.com/kwojtas6)
* **Marcin Treffer** - [ghispi](https://github.com/ghispi)

See also the list of [contributors](https://github.com/kwojtas6/training-notes-front/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
