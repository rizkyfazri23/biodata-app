<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href="<?= base_url('AdminLTE-3.2.0/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('AdminLTE-3.2.0/dist/css/adminlte.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 40px;
        }
        .card {
            margin-top: 40px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        .card-header h3 {
            text-align: center;
        }
        .card-body .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" id="form-title">Login</h3>
            </div>

            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="card-body" id="login-form">
                <form action="<?= base_url('/login/authenticate') ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>  
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <hr>
                <p class="text-center">Belum punya akun? <a href="#" id="signup-link">Sign Up</a></p>
            </div>

            <div class="card-body" id="signup-form" style="display: none;">
                <form action="<?= base_url('/signup') ?>" method="post">
                    <div class="form-group">
                        <label for="signup-username">Username</label>
                        <input type="text" class="form-control" id="signup-username" name="signup_username" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" class="form-control" id="signup-password" name="signup_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    <hr>
                    <p class="text-center"><a href="#" id="login-link">Back to Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#signup-link').click(function(e) {
                e.preventDefault();
                $('#login-form').hide();
                $('#signup-form').show();
                $('#form-title').text('Sign Up');
            });

            $('#login-link').click(function(e) {
                e.preventDefault();
                $('#signup-form').hide();
                $('#login-form').show();
                $('#form-title').text('Login');
            });
        });
    </script>
</body>
</html>
