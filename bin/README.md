README
======

1. You have to create two symlinks here:

    doctrine.php -> ../vendor/doctrine/orm/bin/doctrine.php
    doctrine -> ../vendor/doctrine/orm/bin/doctrine

2. Edit setup.php:

    'db'        => put here your database id from your 'application/configs/databases.php'
    'package'   => put here your current package name. Doctrine we will use it as working directory