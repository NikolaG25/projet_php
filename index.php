<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>DesignHub</title>
</head>

<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet_technoweb";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
    <?php include("partials/header.php"); ?>
    <main style="padding: 0;">
        <div class="heroHome">

            <div class="heroHome__content">
                <h2 class="heroHome__title">Découvrez tous nos designs</h2>
                <a href="./designs.php" class="heroHome__button">Voir les designs</a>
            </div>
            <div class="heroHome__background"></div>
            <img src="assets\img_hero_home.png" alt="Image de présentation" class="heroHome__img">
        </div>

        <div class="productsSelected">
            <h2 class="productsSelected__title">Notre sélection de produits</h2>
            <ul class="productsSelected__list">
                <?php
                //Requete
                $sql = "SELECT Type, Image, Prix FROM support";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($i < 4) {
                            include("partials/ficheProduct.php");
                            $i++;
                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </ul>
        </div>
        <div class="designersSelected">
            <h2 class="designersSelected">Notre sélection de designers</h2>
            <ul class="designersSelected__list">
                <?php
                //Requete
                $designer = "SELECT Pseudo, Image FROM designer";
                $result = mysqli_query($conn, $designer);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($i < 4) {
                            include("partials/designerFav.php");
                            $i++;
                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>
        </div>
    </main>
    <?php include("partials/footer.php"); ?>
</body>

</html>

