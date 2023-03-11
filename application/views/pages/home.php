<div class="home">
    <!--  sidebar-->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!-- <img src="logo.png" alt=""> -->
                </span>

                <div class="text logo-text">
                    <span class="name">Filtre</span>
                </div>
            </div>

            <i class='fas fa-angle-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <form action="<?php echo base_url('Search/fetch') ?>" id="search" method="post">
                    <li class="search-box">
                        <i class='fas fa-search icon'></i>
                        <input type="text" class="search-text" name="query" placeholder="Search...">
                        <button type="submit" class='fas fa-arrow-right icon'></button>

                        <!-- <button type="submit"> <i class='fas fa-search icon'></i></button> -->
                    </li>
                </form>

                <li class="nav-link">
                    <a class="link" href="<?php echo base_url('Home/Ilikes') ?>">
                        <i class='fas fa-heart icon'></i>
                        <span class="text nav-text">Likes</span>
                    </a>
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a class="link" href="<?php echo base_url('Home/ajax') ?>">
                            <i class='fas fa-home-alt icon'></i>
                            <span class="text nav-text">Objets</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a class="link" href="#">
                            <i class='fas fa-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a class="link" href="#">
                            <i class='fas fa-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a class="link" href="#">
                            <i class='fas fa-pie-chart-alt icon'></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>



                    <div class="priceRange">
                        <header>
                            <h2>Price</h2>
                        </header>
                        <div class="price-input">
                            <div class="field">
                                <input type="number" class="input-min" value="2500">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <input type="number" class="input-max" value="7500">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" name="min" min="0" max="10000" value="0" step="100">
                            <input type="range" class="range-max" name="max" min="0" max="10000" value="10000" step="100">
                        </div>
                    </div>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="nav-link">
                    <a class="link" href="#">
                        <i class='fas fa-sign-out-alt icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode nav-link">
                    <div class="sun-moon">
                        <i class='fas fa-moon icon moon'></i>
                        <i class='fas fa-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>
    <!--  liste objets -->

    <section class="objets">
        <div class="content">
            <div class="wrapper">
                <div class="liste">
                    <div class="icon"><i id="left" class="fas fa-angle-right"></i></div>
                    <ul class="tabs-box">
                        <a href="<?php echo base_url('Home/ajax') ?>" class="tab active">Tous</a>
                        <?php
                        foreach ($categories as $categorie) {
                        ?>
                            <a href="<?php echo base_url('Home/ajax/' . $categorie['idCategorie'] . '') ?>" class="tab"><?php echo $categorie['libele']; ?></a>

                        <?php } ?>
                    </ul>
                    <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
                </div>
            </div>
            <section class="shop">
                <?php foreach ($objets as $objet) {
                ?>
                    <div class="card">
                        <i data-idobjet="<?php echo $objet['idObjet'] ?>" class="<?php echo $f = ($objet['class'] == 'love') ? 'fas' : 'far'; ?> fa-heart heart <?php echo $objet['class'] ?>"></i>

                        <a class="image" href="<?php echo base_url('Home/details/' . $objet['idObjet'] . '') ?>">
                            <img class="pro-image" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?>" alt="">
                        </a>
                        <div class="info">
                            <p class="titre"><?php echo $objet['titre'] ?></p>
                            <p class="descri"><?php echo $objet['descri'] ?></p>
                            <p class="price"><?php echo $objet['prix'] ?>ar </p>

                            <span class="note">@<?php echo $objet['prenom'] ?>_<?php echo $objet['nom'] ?></span>
                        </div>
                    </div>

                <?php } ?>


            </section>

        </div>
    </section>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css') ?> ">
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/home.js') ?> "></script>
<script src="<?php echo base_url('assets/js/sidebar.js') ?> "></script>
<script src="<?php echo base_url('assets/js/reveal.js') ?> "></script>
<script src="<?php echo base_url('assets/js/menuSlide.js') ?> "></script>
<script src="<?php echo base_url('assets/js/priceRange.js') ?> "></script>
<script src="<?php echo base_url('assets/js/AJAX.js') ?> "></script>
<script src="<?php echo base_url('assets/js/loving.js') ?> "></script>
<script src="<?php echo base_url('assets/js/SEARCH.js') ?> "></script>