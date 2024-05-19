<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes Web - Log in</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #2352D8;
            color: white;
        }

        .container-fluid {
            display: flex;
            height: 100vh;
        }

        .left-panel {
            flex: 1;
            background-color: #2352D8;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
        }

        .right-panel {
            flex: 1;
            background-color: white;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
            margin-top: 60px;
            margin-bottom: 60px;
        }

        .logo {
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .description {
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 50px;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        .login-form .form-control {
            border-radius: 30px;
            margin-bottom: 20px;
        }

        .login-form .btn-primary {
            background-color: #FF7F50;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1em;
        }

        .login-form .btn-primary:hover {
            background-color: #FF6347;
        }

        .login-form .forgot-password,
        .login-form .register {
            font-size: 0.9em;
        }

        .login-form .register a {
            color: #FF7F50;
            text-decoration: none;
        }

        .login-form .register a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="left-panel">
            <div class="logo">
                Quizzes Web
                <svg width="70" height="60" viewBox="0 0 91 83" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="91" height="83" fill="url(#pattern0_7_59)" />
                    <defs>
                        <pattern id="pattern0_7_59" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_7_59" transform="matrix(0.0101343 0 0 0.0111111 0.043956 0)" />
                        </pattern>
                        <image id="image0_7_59" width="90" height="90" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>

            </div>
            <div class="description">
                <h1>Ask Any Technical Question</h1>
                <p>A technical question and answer website, where people can pose questions on technical issues or problems and other people can help answer them.</p>
            </div>
        </div>
        <div class="right-panel">
            <form class="login-form" action="<?php echo site_url('users/login'); ?>" method="post">
                <h2>Log in</h2>
                <?php if ($this->session->flashdata('login_failed')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('login_failed'); ?>
                    </div>
                <?php endif; ?>
                <?php echo validation_errors(); ?>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="form-group text-right forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Continue with Email</button>
                <div class="text-center mt-4 register">
                    <hr>
                    <span>OR</span>
                    <br>
                    <span>New User? <a href="<?php echo site_url('users/register'); ?>">Get Started</a></span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>