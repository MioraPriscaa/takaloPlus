<div class="details">
    <div class="content">
        <div class="head">
            <div class="title">
                <p class="titre"><?php echo $objet['titre'] ?></p>
                <a class="comments">1 commentaire </a>
                <i data-idobjet="<?php echo $objet['idObjet']; ?>" class="<?php echo $f = ($objet['class'] == 'love') ? 'fas' : 'far'; ?> fa-heart heart <?php echo $objet['class']; ?>"></i>

            </div>
            <div class="images">
                <img class="image img1" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> " alt="">
                <?php foreach ($images as $image) { ?>
                    <img class="image" src="<?php echo base_url('assets/images/' . $image['photo'] . '') ?> " alt="">
                <?php } ?>
                <a class="all_images">Voir tous les images</a>
            </div>
            <div class="legende">
                <div class="info">
                    <p class="price">$<?php echo $objet['prix'] ?></p>
                    <p class="descri"><?php echo $objet['descri'] ?></p>
                </div>

                <div class="pdp">
                    <div class="pseudo">
                        <?php echo $objet['prenom']  ?>
                    </div>
                    <a class="photo" href="<?php echo base_url('Home/mesObjets/0/' . $objet['idMembre'] . '') ?>">
                        <img src="<?php echo base_url('assets/pdp/' . $objet['pdp'] . '') ?> " alt="">
                    </a>

                </div>
            </div>
            
        </div>
        
        <div class="interaction">
        
            <div class="blog-card">
                <input type="radio" name="select" class="option" id="tap-1" checked>
                <input type="radio" name="select" class="option" id="tap-2">
                <input type="radio" name="select" class="option" id="tap-3">
                <input type="checkbox" id="imgTap" hidden>
                <div class="sliders">
                    <label for="tap-1" class="tap tap-1">Acheter</label>
                    <label for="tap-2" class="tap tap-2">Echanger</label>
                    <label for="tap-3" class="tap tap-3">Réserver</label>
                </div>
                <!-- ACHAT -->
                <div class="inner-part">
                    <label for="imgTap" class="img">
                        <img class="img-1" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> ">
                    </label>
                    <form action="" class="content content-1 achat">
                        <div class="title">Achat</div>
                        <div class="text">Veuillez choisir votre mode paiement : </div>
                        <div class="modes">
                            <?php
                            foreach ($modePaiements as $modePaiement) {
                            ?>
                                <div class="tile">
                                    <input type="radio" class="mode" id="<?php echo $modePaiement['nom']; ?>">
                                    <input type="hidden" name="mode" value="<?php echo $modePaiement['id']; ?>">
                                    <label for="<?php echo $modePaiement['nom']; ?>">
                                        <h6><?php echo $modePaiement['nom']; ?></h6>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="submit" class="acheter" disabled>Payer</button>
                    </form>
                </div>
                <!-- ECHANGE -->

                <div class="inner-part">
                    <label for="imgTap" class="img">
                        <img class="img-2" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> ">
                    </label>
                    <form action="<?php echo base_url('Compte/demander') ?> " id="echangement" class="content content-2">
                        <div class="title">Echanger avec vos Objets</div>
                        <div class="text">Choisissez le(s) Objet(s)</div>
                        <div class="mesobjets">

                            <?php
                            foreach ($mesObjets as $mesObjet) {
                            ?>
                                <div class="tile">
                                    <label for="<?php echo $mesObjet['idObjet']; ?>">
                                        <div class="image">
                                            <img src="<?php echo base_url('assets/images/' . $mesObjet['photo'] . '') ?> " alt="">
                                        </div>
                                        <div class="info">
                                            <h6><?php echo $mesObjet['titre']; ?></h6>
                                        </div>

                                    </label>
                                    <input type="checkbox" name="mesobjets[]" value="<?php echo $mesObjet['idObjet']; ?>" class="mesobjet" id="<?php echo $mesObjet['idObjet']; ?>">
                                </div>

                            <?php } ?>
                        </div>
                        <button type="submit" class="echanger" disabled>Echanger</button>
                        <input type="hidden" name="idObjetAdemander" value="<?php echo  $objet['idObjet']; ?>">
                    </form>
                </div>
                <!-- RESERVATION -->

                <div class="inner-part">
                    <label for="imgTap" class="img">
                        <img class="img-3" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> ">
                    </label>
                    <form action="" class="content content-3">
                        <span>Reservation</span>
                        <div class="title">Lorem Ipsum Dolor</div>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod excepturi nemo commodi sint eum ipsam odit atque aliquam officia impedit.</div>
                    </form>
                </div>


            </div>
        </div>


    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url('assets/css/choix.css') ?> ">
<link rel="stylesheet" href="<?php echo base_url('assets/css/loving.css') ?> ">
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/choix.js') ?> "></script>
<script src="<?php echo base_url('assets/js/loving.js') ?> "></script>
<script src="<?php echo base_url('assets/js/AJAX.js') ?> "></script>