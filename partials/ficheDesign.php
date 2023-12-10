<div class="ficheDesign" data-tag="<?php echo (!$row["Style"]) ? 'noStyle' : $row["Style"]; ?>">
    <img src="<?php echo (!$row["Image"]) ? '' : $row["Image"]; ?>" alt="" class="ficheDesign__image"></img>
    <h3 class="ficheDesign__name"><?php echo (!$row["NomDesign"]) ? 'Pas de nom' : $row["NomDesign"]; ?></h3>
    <h4 class="ficheDesign__nameDesigner">By <?php echo (!$row["Pseudo"]) ? 'Pas de designer' : $row["Pseudo"]; ?></h3>
        <button class="ficheDesign__seeMore">
            <a class="ficheDesign__link button" href="#">
                Voir tous les produits
            </a>
        </button>
</div> 