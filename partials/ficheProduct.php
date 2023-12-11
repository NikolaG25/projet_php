<div class="ficheProduct">
    <img src="<?php echo (!$row["Image"]) ? '' : $row["Image"]; ?>" alt="" class="ficheProduct__image" />
    <h3 class="ficheProduct__name"><?php echo (!$row["Type"]) ? 'Pas de nom' : $row["Type"]; ?></h3>
    <div class="ficheProduct__priceSee">
        <div class="ficheProduct__priceDiv">
            <p class="ficheProduct__price">
            <?php echo (!$row["Prix"]) ? 'Pas de prix' : $row["Prix"]; ?>€
            </p>
        </div>

        <button class="ficheProduct__seeMore">
            <a class="ficheProduct__link button" href="#">
                Voir les designs
            </a>
        </button>
    </div>
</div>