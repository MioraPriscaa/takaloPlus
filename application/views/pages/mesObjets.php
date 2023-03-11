<section class="mesObjets">
    <div class="objets">
        <div class="compte">
            <div class="pdp">
                <div class="photo">
                    <img src="<?php echo base_url('assets/pdp/' . $objets[0]['pdp'] . '') ?> " alt="">
                </div>
                <div class="pseudo">
                    <?php echo $_SESSION['connected']['prenom']  ?>
                </div>
            </div>
            <div class="apropos">
                <div class="possesion">
                    <?php echo count($objets)  ?> Objets
                </div>
                <div class="transaction">
                    <?php echo $transactions ?> Transactions
                </div>
            </div>
        </div>
        <div class="content">
            <div class="shop">
                <?php
                foreach ($objets as $objet) {
                ?>
                    <div class="card" href="<?php echo base_url('Home/details/' . $objet['idObjet'] . '') ?>">
                        <i data-idobjet="<?php echo $objet['idObjet']; ?>" class="<?php echo $f = ($objet['class'] == 'love') ? 'fas' : 'far'; ?> fa-heart heart <?php echo $objet['class']; ?>"></i>

                        <a class="image" href="<?php echo base_url('Home/details/' . $objet['idObjet'] . '') ?>">
                            <img class="pro-image" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> " alt="">
                        </a>
                        <div class="info">
                            <p class="titre"><?php echo $objet['titre'] ?></p>
                            <p class="descri"><?php echo $objet['descri'] ?></p>
                            <p class="price">$<?php echo $objet['prix'] ?></p>
                            <span class="note"><i class="fas fa-star"></i> 3,5</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="<?php echo base_url('assets/css/mesObjets.css') ?> ">
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/home.js') ?> "></script>
<script src="<?php echo base_url('assets/js/reveal.js') ?> "></script>
<script src="<?php echo base_url('assets/js/loving.js') ?> "></script>
