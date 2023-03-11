<section id="nouveauObjet">
    <div class="nouveauObjet">
        <form action="<?php echo base_url('Compte/insertObjet') ?>"  id="new" enctype="multipart/form-data">
            <div class="field">
                <div class="label">Titre</div>
                <input type="text" name="titre" class="quartier">
            </div>
            <div class="field">
                <div class="label">Decription</div>
                <input type="text" name="descri" class="descri" >
            </div>
            <div class="field">
                <div class="label">Prix</div>
                <input type="text" name="prix" class="prix">
            </div>
            <div class="field">
                <div class="label">Catégorie</div>
                <select name="categorie" class="type">
                    <?php
                    foreach ($categories as $categorie) {
                    ?>
                        <option value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['libele'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="file" name="sary[]" id="file" accept="image/*" hidden multiple>
            <div class="img-area" data-img="">
                <i class='fas fa-cloud-upload icon'></i>
                <h3>Upload Images</h3>
            </div>
            <input type="submit" class="valider" name="valider" value="Ajouter">
        </form>
    </div>
</section>

<link rel="stylesheet" href="<?php echo base_url('assets/css/ajoutObjet.css') ?> ">
<script src="<?php echo base_url('assets/js/selectImage.js') ?> "></script>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?> "></script>
<script src="<?php echo base_url('assets/js/AJAX.js') ?> "></script>


