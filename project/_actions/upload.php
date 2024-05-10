<?php
include('../vendor/autoload.php');

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$error = $_FILES['photo']['error'];
$name = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

if($error) {
    HTTP::redirect('/index.php', 'error=1');
}

if ($type === "image/jpeg" or $type === "image/png") {
    $table->updatePhoto($auth->id, $name);

    move_uploaded_file($tmp, "photos/$name");
    $auth->photo = $name;

    HTTP::redirect('/profile.php');
} else {
    HTTP::redirect('/profile.php', 'error=1');
}
 