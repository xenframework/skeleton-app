<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__ . '/../vendor/xenframework/xen/src/xen/db/doctrine/DoctrineBootstrap.php';

use xen\db\doctrine\DoctrineBootstrap;

$config     = require 'setup.php';
$databases  = require __DIR__ . '/../application/configs/databases.php';

$driver     = $databases[$config['db']]['driver'];
$username   = $databases[$config['db']]['username'];
$password   = $databases[$config['db']]['password'];
$dbname     = $databases[$config['db']]['dbname'];

$dbConfig = (object) ['driver' => $driver, 'username' => $username, 'password' => $password, 'dbname' => $dbname];

$entityManager = DoctrineBootstrap::bootstrap($dbConfig, $config['package']);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));

return $helperSet;