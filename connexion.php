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

    <?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];

    if ($email == "email" && $motdepasse == "motdepasse") {
        header('Location: accueil.php');
    } else {
        header("Location: connexion.php?erreur=1");
    }

    if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
        echo '<p style="color:red;">Nom d\'utilisateur ou mot de passe incorrect.</p>';
    }


} 

    ?>

    <main>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="connexion">
        <label for="email">E-mail :</label>
        <input type="text" name="email" required>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" required>

        <input type="submit" name="submit" value="Se connecter" class="custom-button">  

    </form>
    </main>
    <?php include("partials/footer.php"); ?>
</body>


</html>