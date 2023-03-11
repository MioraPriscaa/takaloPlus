<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css') ?> ">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-free-6.1.2-web/css/all.css') ?> ">
    <title><?php echo $title; ?></title>
</head>

<body>

    <div class="header">
        <div class="lo">
            <a href="#" class="logo textGradient" spellcheck="false" class="text" contenteditable="false">
                Takalo
            </a>
        </div>

        <nav class="navbar ">
            <a class="navlink" href="<?php echo base_url('Home/objets') ?>">Objets</a>
            <a class="navlink" href="<?php echo base_url('Home/notifications') ?>">Notifications</a>
            <a class="navlink" href="<?php echo base_url('Compte/ajoutObjet') ?>">ajouter un Objet</a>

        </nav>

        <div class="info">
            <div class="photo">
                <img src="<?php echo base_url('assets/pdp/' . $_SESSION['connected']['pdp'] . '') ?> " alt="">
            </div>
            <div class="fleche">
                <p><i class="fas fa-angle-down"></i></p>
            </div>

        </div>

        <!-- not shown yet -->
        <div class="list-menu">
            <li class="compte link">
                <a class="in" href="<?php echo base_url('Home/mesObjets/0/' . $_SESSION['connected']['idMembre'] . '') ?>">
                    <div class="photo">
                        <img src="<?php echo base_url('assets/pdp/' . $_SESSION['connected']['pdp'] . '') ?> " alt="">
                    </div>
                    <span class="text nav-text"><?php echo $_SESSION['connected']['prenom'] . ' ' . $_SESSION['connected']['nom']; ?> </span>
                </a>
            </li>

            <li class="link">
                <a class="in" href="<?php echo base_url('Authentification/deconnexion') ?>">
                    <i class='fas fa-sign-out-alt icon'></i>
                    <span class="text nav-text">Deconnexion</span>
                </a>
            </li>

        </div>
        <!--  -->
    </div>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/textGradient.css') ?> ">
    <script src="<?php echo base_url('assets/js/header.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/AJAX.js') ?> "></script>