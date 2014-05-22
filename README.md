xenframework skeleton-app
=========================

Introduction
------------
The xenframework skeleton-app is the best distribution to use when starting a new project.

Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

Install composer

    curl -s https://getcomposer.org/installer | php --

And now install the skeleton-app using composer

    php composer.phar create-project -sdev xenframework/skeleton-app myproject

If you did a global install and do not have the phar in that directory run this instead:

    composer create-project -sdev xenframework/skeleton-app myproject

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

	mkdir myproject
    cd myproject
    git clone https://github.com/xenframework/skeleton-app.git --recursive
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative is to download it from `github`:

    https://github.com/xenframework/skeleton-app

You would then invoke `composer` to install dependencies per the previous
example.

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

	cd myproject
    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

Once you have created your project, you must now create a new virtual host in your apache installation.

Go to your apache config folder and look for sites-available sub folder.

	cd sites-available

Create now a new file called `myproject.local` with this content:

    <VirtualHost *:80>
	    ServerName myproject.local
	    DocumentRoot /path_to/myproject.local/public
	    ErrorLog "/path_to/myproject.local/logs/error_log"
	    CustomLog "/path_to/myproject.local/logs/access_log" common

	    <Directory /path_to/myproject.local/public/>
	        Options Indexes FollowSymLinks
	        DirectoryIndex index.php
	        AllowOverride All
	        Order allow,deny
	        Allow from all
	    </Directory>
	</VirtualHost>

Go now to sites-enabled directory and create a symlink to the previous created file

	ln -s ../sites-available/myproject.local myproject.local

Finally we need to create a new entry in the /etc/hosts like this

	127.0.0.1    myproject.local

Remember to restart apache

	apachectl restart