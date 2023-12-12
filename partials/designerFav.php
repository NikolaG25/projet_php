<div class="designerFav">
    <div class="designerFav__divName">
        <h3 class="designerFav__name"><?php echo (!$row["Pseudo"]) ? 'Pas de designer' : $row["Pseudo"]; ?></h3>
    </div>
    <img href="<?php echo (!$row["Image"]) ? '' : $row["Image"]; ?>" class="designerFav__image"/>
</div>