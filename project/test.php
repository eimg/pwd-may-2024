<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$mysql = new MySQL;
$table = new UsersTable($mysql);

$user = $table->find("alice@gmail.com", "password");
print_r($user);
