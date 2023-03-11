<!--  liste objets -->
<div class="container">
    <!-- content -->
    <div class="content">
        <!-- <a href="pages/panier.php" class="link_panier">Panier</a>
            <a href="pages/ajout.php" class="link_panier">ajout</a> -->
        <div class="buttons">
            <a class="btn" href="<?php echo base_url('Home/nouvelObjet'); ?> ">publier nouvel Objet </a>


        </div>

        <h4>Mes Objets </h4>

        <section class="shop">
            <?php
            foreach ($objets as $objet) {
            ?>
                <div class="card" data-idcard="<?php echo $objet['idObjet'] ?>">
                    <div class="image">
                        <img class="pro-image" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> " alt="">
                    </div>
                    <div class="info">
                        <p class="name"><?php echo $objet['titre'] ?></p>
                        <p class="price"><?php echo $objet['descri'] ?></p>
                        <p class="price"><?php echo $objet['prix'] ?> Ar</p>

                    </div>
                    <div class="pourcent">
                        <a class="icon" href="<?php echo base_url('Home/parPrix/' . $objet['idObjet'] . '/10'); ?> ">+/-10%</a>
                        <a class="icon" href="<?php echo base_url('Home/parPrix/' . $objet['idObjet'] . '/20'); ?> ">+/-20%</a>
                    </div>

                    <a class="icon" href="<?php echo base_url('Echange/historique/' . $objet['idObjet'] . ''); ?>">H</a>
                    <a class="btn" href="http://">Echanger</a><span></span>

                </div>
            <?php } ?>

        </section>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/css/mesObjet.css') ?> ">
