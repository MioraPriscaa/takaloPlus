<div id="nouveauObjet">
    <div class="nouveauObjet">
        <a href="home.php" class="retour"><i class="fas fa-arrow-left"></i></a>
        <form action="<?php echo base_url('Home/ajoutObjet') ?>" method="post" id="new" enctype="multipart/form-data">
            <h3>Ajouter nouveau Objet</h3>
            <select name="categorie" class="type">
                <?php
                foreach ($categories as $categorie) {
                ?>
                    <option value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['libele'] ?></option>
                <?php } ?>
            </select>


            <input type="text" name="titre" class="quartier" placeholder="titre">
            <input type="text" name="descri" class="descri" placeholder="descri">

            <input type="file" name="sary" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Upload Image</h3>
            </div>

            <input type="submit" class="valider" name="valider" value="Ajouter">
        </form>
        <div class="selectbutton">
            <button class="selectimage import">Import photo</button>
        </div>

    </div>
</div>