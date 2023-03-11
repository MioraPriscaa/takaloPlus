<div class="propositions">
    <?php
    foreach ($propositions as $proposition) {
    ?>
        <div class="proposition">
            <div class="data">
                <span class="ref-name"> idMembre1 : <?php echo $proposition['idMembre1'] ?> </span>
                <span class="ref-name"> idMembre2 : <?php echo $proposition['idMembre2'] ?>  </span>
                <span class="ref-excerpt"> idObjet1 : <?php echo $proposition['idObjet1'] ?>  </span>
                <span class="ref-excerpt"> idObjet2 : <?php echo $proposition['idObjet2'] ?>  </span>

            </div>
            <div class="btns">
                <a class="btn" href="<?php echo base_url('Echange/validateExchange/'.$proposition['idEchange'].''); ?> ">Accepter</a>
                <a class="btn" href="<?php echo base_url('Echange/refuser/'.$proposition['idEchange'].''); ?> ">refuser</a>
            </div>

        </div>

    <?php } ?>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/css/proposition.css') ?> ">
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/proposition.js') ?> "></script>