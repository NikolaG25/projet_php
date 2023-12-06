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
        Accueil
        <?php include("partials/ficheProduct.php") ?>
        <?php include("partials/ficheDesign.php") ?>
        <?php include("partials/designerFav.php") ?>
    </main>
    <?php include("partials/footer.php"); ?>
</body>

</html>