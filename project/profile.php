<?php
    include("vendor/autoload.php");

    use Helpers\Auth;

    $user = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h1 class="h3 my-3">Profile</h1>

        <?php if($user->photo): ?>
            <img src="_actions/photos/<?= $user->photo ?>" width="300"
            class="img-thumbnail">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" 
            enctype="multipart/form-data" class="input-group my-3">
            <input type="file" class="form-control" name="photo">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group mb-3">
            <li class="list-group-item">Name: <?= $user->name ?></li>
            <li class="list-group-item">Email: <?= $user->email ?></li>
            <li class="list-group-item">Phone: <?= $user->phone ?></li>
            <li class="list-group-item">Address: <?= $user->address ?></li>
        </ul>
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>
</html>
