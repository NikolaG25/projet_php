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
        <h1>Nos designs</h1>
        <div class="triCategories">
            <h2>Catégories :</h2>

        </div>
        <?php
        // $servername = "010o5.myd.infomaniak.com";
        // $username = "010o5_projet_php";
        // $password = "Tr-6SZFmdJ5";
        // $dbname = "010o5_projet_php";

        $servername = "010o5.myd.infomaniak.com";
        $username = "010o5_projet_php";
        $password = "Tr-6SZFmdJ5";
        $dbname = "010o5_projet_php";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //Requete
        $sql = "SELECT NomDesign, Style, Image, Pseudo FROM design, designer WHERE design.ID_designer = designer.ID_designer";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                include("partials/ficheDesign.php");
                // echo "- Name: " . $row["NomDesign"] .
                //     " - Style : " . $row["Style"] .
                //     " - ImgURL : " . $row["Image"] .
                //     " - Nom Designer : " . $row["Pseudo"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        //Ne jamais oublier de fermer la connexion
        mysqli_close($conn);
        ?>
    </main>
    <?php include("partials/footer.php"); ?>
</body>

<script>
    let index = 0
    listeCategories = []
    let categorie = ""
    document.querySelectorAll('.ficheDesign').forEach(e => {
        listeCategories[index] = e.dataset.tag;
        index++
    });
    //Retirer les doublons
    listeCategories = listeCategories.filter((x, i) => listeCategories.indexOf(x) === i);

    listeCategories.forEach(e => {
        document.querySelector('.triCategories').innerHTML += "<div class='triCategories_categorie' data-categorie='" + e + "'>" + e + "</div>"
    });

    

    document.querySelectorAll(".triCategories_categorie").forEach(e => {
        e.addEventListener('click', () => {
            categoriesAffichage(e)
        })
    }); 

    function categoriesAffichage(e) {
        let categorieActive = e.innerText
        if (categorieActive == categorie) {
            document.querySelector('div[data-categorie="' + categorieActive + '"]').classList.remove('active')
            document.querySelectorAll('.ficheDesign').forEach(fiche => {
                fiche.classList.remove('hidden')
            });
            categorie = ""
        } else {
            if (categorie != "") document.querySelector('div[data-categorie="' + categorie + '"]').classList.remove('active')
            document.querySelector('div[data-categorie="' + categorieActive + '"]').classList.add('active')
            document.querySelectorAll('.ficheDesign[data-tag="' + categorieActive + '"]').forEach(fiche => {
                fiche.classList.remove('hidden')
            });
            document.querySelectorAll('.ficheDesign:not(.ficheDesign[data-tag="' + categorieActive + '"])').forEach(fiche => {
                fiche.classList.add('hidden')
            });

            categorie = categorieActive
        }
    }
</script>

</html>