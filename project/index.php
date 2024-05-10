<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index_style.css">
</head>
<body>
    <?php if(isset($_GET['registered'])) : ?>
        <script type="module">
            import { Eggy } from 'https://cdn.jsdelivr.net/npm/@s-r0/eggy-js@1.3.4/build/js/eggy.min.js'

            Eggy({
                title: '',
                message: 'Registered successfully. Login here'
            })
        </script>
    <?php elseif(isset($_GET['suspended'])) : ?>
        <script type="module">
            import { Eggy } from 'https://cdn.jsdelivr.net/npm/@s-r0/eggy-js@1.3.4/build/js/eggy.min.js'

            Eggy({
                title: '',
                message: 'You are banned. Sorry!',
                type: 'error',
            })
        </script>
    <?php elseif(isset($_GET['incorrect'])) : ?>
        <script type="module">
            import { Eggy } from 'https://cdn.jsdelivr.net/npm/@s-r0/eggy-js@1.3.4/build/js/eggy.min.js'

            Eggy({
                title: '',
                message: 'Unable to login!',
                type: 'error',
            })
        </script>
    <?php endif ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOGIN
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="./_actions/login.php" method="post">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="email" class="form-control">
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
                                    <a href="./register.php" class="btn btn-outline-primary float-start me-3">Register</a>
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
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