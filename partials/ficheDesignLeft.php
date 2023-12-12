<div class= "ficheDPLeft">
    <div class ="ficheDP__nameDesigner">
    <img src="<?php echo (!$row["Image"]) ? '' : $row["Image"]; ?>" alt="" class="ficheDP__image"></img>  
    <span class = "ficheDP__name"> <?php echo (!$row["FirstName"] && !$row["LastName"]) ? 'Pas de nom' : $row["FirstName"] . ' ' . $row["LastName"]; ?> </span>
    <span class = "ficheDP__address"> <?php echo (!$row["Adresse"]) ? 'Pas de adresse' : $row["Adresse"]; ?></span>
    </div>
        <p class="ficheDP__desc"> 
        <?php echo (!$row["Description"]) ? 'Pas de description' : $row["Description"]; ?>
            </p>
</div>