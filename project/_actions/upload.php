<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$name = $_FILES["photo"]["name"];
$type = $_FILES["photo"]["type"];
$tmp_name = $_FILES["photo"]["tmp_name"];

$user = Auth::check();

if($type == "image/jpeg" or $type == "image/png") {
    move_uploaded_file($tmp_name, "photos/$name");

    $table = new UsersTable(new MySQL);
    $table->updatePhoto($user->id, $name);

    $user->photo = $name;

    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/profile.php", "error=type");
}
