<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?> " >
    <!-- <link rel="stylesheet" href="assets/css/fontawesome-free-6.1.2-web/css/all.css"> -->
    <title>login</title>
</head>
<body>
    

<div class="error">
    <?php if ($this->session->flashdata('error')) { ?>
        <p><?php echo $this->session->flashdata('error') ?></p>
    <?php } ?>
</div>

<div class="login_form active">
    <div class="forms">
        <div class="form login">
            <span class="title">Login</span>

            <form id="Submit_login" action="<?php echo base_url('Authentification/login') ?>" method="post">
                <div class="input-field">
                    <input type="text" name="email" placeholder="Enter your email" value="aina@gmail.com">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="motDePasse" class="password" placeholder="Enter your password" value="aina">
                    <i class="fas fa-lock icon"></i>
                    <i class="fas fa-eye-slash showHidePw"></i>
                </div>

                <div class="input-field button">
                    <input type="submit" name="login" value="Se connecter">
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Not a member?
                <a href="<?php echo base_url('Authentification/inscription') ?>">inscription</a>
                </span>
            </div>
        </div>
    </div>
</div>