<div class="search-bar">
    <form action ="<?php echo base_url('Home/recherche') ?>" method="post">
        mot clé <input type="search" name="titre" placeholder="titre" required />
        categorie <select name="categorie" class="type">
            <option value="tous">Tous</option>
            <?php
            foreach ($categories as $categorie) {
            ?>
                <option value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['libele'] ?></option>
            <?php } ?>
        </select>
        <button type="submit"><i class="fas fa-search search"></i></button>
    </form>
</div>

<link rel="stylesheet" href="<?php echo base_url("barRecherche.css") ?>">
