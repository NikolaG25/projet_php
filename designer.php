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

    <?php  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_technoweb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 
    ?>

    <?php
    $sql = "SELECT FirstName, LastName, Image, Adresse, Description FROM designer WHERE ID_Designer = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
         // output data of each row
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
        if ($i < 4) {
        include("partials/ficheDesignLeft.php");
        $i++;
        }
    }
} else {
        echo "0 results";
        } ?>
    
    <div class = "ficheDPList" >
    <h3 class = "ficheDP__title1"> Design par Designer </h3> 


    
    
<div class = "ficheDPRow" >
    <?php
         //Requete
         // SELECT NomDesign, Description, Image, FROM design"
        $sql = "SELECT NomDesign, Description, Image FROM design WHERE ID_Designer = 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
             // output data of each row
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                include("partials/ficheDesign2.php");
        }
    } else {
            echo "0 results";
            }
                ?>
    </div>
    </div>
    </main>
 
    <?php include("partials/footer.php"); ?>
</body>


</html>