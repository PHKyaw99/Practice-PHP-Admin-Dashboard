<?php
include('./vendor/autoload.php');

use Helpers\Auth;

$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/profile_style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 box">
                    <div class="col-lg-12 title">
                        Profile
                    </div>
                    
                    <div class="col-lg-12 login-form">
                        <?php if ($auth->photo) : ?>
                            <div class="col-lg-12 login-form">
                                <img src="./_actions/photos/<?= $auth->photo ?>" width="200" height="200">
                            </div>
                        <?php else : ?>
                            <div class="col-lg-12 login-form">
                                <img src="./_actions/photos/default.jpg" width="200" height="200">
                            </div>
                        <?php endif ?>

                        <div class="col-lg-12 login-form file-upload">
                            <form action="./_actions/upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group col-lg-6 mb-3">
                                    <label class="btn btn-outline-primary" id="file-input" style="width: 200px;">
                                        <i class="fa-solid fa-upload"></i> Upload Profile <input type="file" name="photo" onchange="javascript:this.form.submit();">     
                                    </label>
                                </div>
                                <img id="cropper-image" style="display: none;">
                            </form>

                            <form action="./_actions/logout.php" method="post">
                                <div class="form-group mb-2">
                                    <label class="form-control-label">ROLE</label>
                                    <p class="text-white my-1"><?= $auth->role ?></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label">USERNAME</label>
                                    <p class="text-white my-1"><?= $auth->name ?></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label">EMAIL</label>
                                    <p class="text-white my-1"><?= $auth->email ?></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label">ADDRESS</label>
                                    <p class="text-white my-1"><?= $auth->address ?></p>
                                </div>

                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-btm login-text">
                                        <!-- Error Message -->
                                    </div>
                                    <div class="col-lg-12 login-btm login-button mx-auto mt-4">
                                        <a href="./admin.php" class="btn btn-outline-primary me-3 float-start">ADMIN PAGE</a>
                                        <button class="btn btn-outline-danger">LOGOUT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
        </div>
</body>
</html>