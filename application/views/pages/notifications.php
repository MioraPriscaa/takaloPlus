<section class="notifications">
    <div class="cases">
        <div class="case btn_echange">Demandes d'Echange</div>
        <div class="case btn_paiement">Paiement</div>
        <div class="case btn_reservation">Demandes de Reservation</div>
    </div>
    <div class="page echanges active">
        <?php foreach ($cartes as $carte) { ?>
            <div class="echange notif">
                <div class="head">
                    <a class="photo" href="<?php echo base_url('Home/mesObjets/0/' . $carte['sesObjets'][0]['idMembre'] . '') ?>">
                        <img src="<?php echo base_url('assets/images/Alexxa.jpg') ?> " alt="">
                    </a>
                    <div class="pseudo"><?php echo $carte['sesObjets'][0]['prenom'] ?></div>
                    <div class="mots"> demande d'echange contre <?php echo count($carte['sesObjets']); ?> de ses objets </div>

                </div>
                <div class="content">
                    <div class="objet monObjet">
                        <!--  -->
                        <div class="card" href="<?php echo base_url('Home/details/' . $carte['monObjet']['idObjet'] . '') ?>">
                            <a class="image" href="<?php echo base_url('Home/details/' . $carte['monObjet']['idObjet'] . '') ?>">
                                <img class="pro-image" src="<?php echo base_url('assets/images/' . $carte['monObjet']['photo'] . '') ?> " alt="">
                            </a>
                            <div class="info">
                                <p class="titre"><?php echo $carte['monObjet']['titre'] ?></p>
                                <p class="descri"><?php echo $carte['monObjet']['descri'] ?></p>
                                <p class="price">$<?php echo $carte['monObjet']['prix'] ?></p>
                                <span class="note"><i class="fas fa-star"></i> 3,5</span>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    <div class="vs">
                        <div class="style">
                            <i class="fas fa-arrow-left left"></i>
                            <i class="fas fa-arrow-right right"></i>
                        </div>
                    </div>
                    <div class="objet sesObjets">
                        <?php foreach ($carte['sesObjets'] as $sesObjet) { ?>
                            <div class="card" href="<?php echo base_url('Home/details/' . $sesObjet['idObjet'] . '') ?>">
                                <a class="image" href="<?php echo base_url('Home/details/' . $sesObjet['idObjet'] . '') ?>">
                                    <img class="pro-image" src="<?php echo base_url('assets/images/' . $sesObjet['photo'] . '') ?> " alt="">
                                </a>
                                <div class="info">
                                    <p class="titre"><?php echo $sesObjet['titre'] ?></p>
                                    <p class="descri"><?php echo $sesObjet['descri'] ?></p>
                                    <p class="price">$<?php echo $sesObjet['prix'] ?></p>
                                    <span class="note"><i class="fas fa-star"></i> 3,5</span>
                                </div>
                            </div>
                        <?php  } ?>

                    </div>
                </div>

                <a class="accepter" href="<?php echo base_url('Compte/accepter_echange/'. $carte['idEchange'] . '') 
                                            ?>">Accepter</a>
                <a class="refuser" href="<?php echo base_url('Compte/refuser_echange/' . $carte['idEchange'] . '') ?>">Refuser</a>

            </div>
        <?php  } ?>


    </div>

</section>



<link rel="stylesheet" href="<?php echo base_url('assets/css/notification.css') ?> ">
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/notification.js') ?> "></script>
<script src="<?php echo base_url('assets/js/AJAX.js') ?> "></script>
