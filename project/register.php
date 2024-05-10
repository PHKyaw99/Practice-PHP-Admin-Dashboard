<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index_style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box mb-5">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Register
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="./_actions/create.php" method="post">
                            <div class="form-group">
                                <label class="form-control-label">NAME</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" name="email" class="form-control" i>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PHONE</label>
                                <input type="text" name="phone" class="form-control" i>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">ADDRESS</label>
                                <input type="text" name="address" class="form-control" i>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm mt-5">
                                <div class="col-lg-12 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-12 login-btm login-button mx-auto">
                                    <button type="submit" class="btn btn-outline-primary">Register</button>
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