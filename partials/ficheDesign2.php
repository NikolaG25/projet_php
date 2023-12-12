<div class = "ficheDP" >
    <div class="ficheDesign">
        <img src="<?php echo (!$row["Image"]) ? '' : $row["Image"]; ?>" alt="" class="ficheDesign__image"></img>
        <h3 class="ficheDesign__name"><?php echo (!$row["NomDesign"]) ? 'Pas de nom' : $row["NomDesign"]; ?></h3>
            <button class="ficheDesigner__link2">
                <a class="ficheDP__link button" href="#">
                    Voir tous les produits
                </a>
            </button>
    </div>
</div> 