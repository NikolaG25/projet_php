<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>DesignHub</title>
</head>

<body>
    <?php include("partials/header.php"); ?>
    <main>
        <h1>Profil</h1>

        <h3>Bonjour <?php echo $_SESSION['user']['username']; ?></h3>

        <form>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['user']['nom']; ?>">

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['user']['prenom']; ?>">

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['user']['adresse']; ?>">

            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" value="<?php echo $_SESSION['user']['telephone']; ?>">

            <label for="mail">Mail</label>
            <input type="text" name="mail" id="mail" value="<?php echo $_SESSION['user']['mail']; ?>">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="<?php echo $_SESSION['user']['password']; ?>">

            <input type="submit" value="Modifier">

    </main>
    <?php include("partials/footer.php"); ?>
</body>


</html>