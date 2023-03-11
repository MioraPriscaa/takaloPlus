<!--  liste objets -->
<div class="container">

    <!-- content -->
    <div class="content">
        <!-- <a href="pages/panier.php" class="link_panier">Panier</a>
            <a href="pages/ajout.php" class="link_panier">ajout</a> -->
        <h4>Tous les Objets </h4>
        <div class="buttons">
            <a class="btn" href="<?php echo base_url('Home/mesObjets'); ?> ">Mes Objets</a>
            <a class="btn" href="<?php echo base_url('Home/statistique') ?>">Statistique</a>
        </div>

        <section class="shop">
            <a class="addcard" href="<?php echo base_url('Administrateur/nouvelObjet') ?>"><i class="fas fa-add"></i></a>
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
                        <p class="date"><?php echo $objet['DateHeurePublication'] ?></p>
                        <a href="<?php echo base_url('Administrateur/delete/' . $objet['idObjet'] . '') ?>"><i class="fas fa-remove add"></i></a>
                        <a class="icon" href="<?php echo base_url('Echange/historique/' . $objet['idObjet'] . ''); ?>">H</a>
                        <a><i class="fas fa-edit edit"></i></a>
                        <a class="btn" href="http://">Echanger</a><span></span>


                    </div>
                </div>
            <?php } ?>

        </section>

    </div>
</div>

<!--  -->
</body>

</html>