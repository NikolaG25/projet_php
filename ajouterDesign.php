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
   
    $user = 'root';
    $password = 'root';
    $db = 'projet_technoweb';
    $host = 'localhost';
    $port = 8889;
    
    $link = mysqli_init();
    $success = mysqli_real_connect(
       $link,
       $host,
       $user,
       $password,
       $db,
       $port
    );
    $designame = $designdesc = "";
    $id_designer= $_GET['id'];
    

    // Récupérez les valeurs du formulaire
    $nomDesign = mysqli_real_escape_string($link, $_POST['designName']);
    $description = mysqli_real_escape_string($link, $_POST['designDescription']);

    // Vous devez gérer le téléchargement de l'image ici et obtenir son chemin
    // Pour cet exemple, supposons que vous l'avez déjà traité et stocké dans le répertoire 'uploads'
    $imagePath = 'uploads/' . basename($_FILES['photo']['name']);

    // Insérez les données dans la base de données
    $sql = "INSERT INTO design (NomDesign, Description, Image, ID_designer) VALUES ('$nomDesign', '$description', '$imagePath','$id_designer')";

    if (mysqli_query($link, $sql)) {
        echo "Design ajouté avec succès.";
    } else {
        echo "Erreur d'insertion : " . mysqli_error($link);
    }

    // Fermez la connexion à la base de données
    mysqli_close($link);

?>
    
    
    <h1>Ajouter un design </h1>
    <div class="header-form-container">
    <form id="myForm"  method="post">

        <div class="left-container">
        <div class="image-container">
        <label for="photo" class ="cursor">
            <span style="font-size: 16px; color: #333;"> Ajouter une image</span>
            <input type="file" id="photo" name="photo" accept="image/*" style="display: none;" onchange="handleImageInsertion(this)">
        </label>
        <img id="insertedImage" style="max-width: 100%; max-height: 100%; margin-top: 10px; display: none;">
        <div class="button-container">
            <button id="editImageButton" onclick="editImage()">Modifier l'image</button>
        </div>
    </div>
        </div>
        <script>
    function handleImageInsertion(input) {
        var imageText = document.getElementById('imageText');
        var insertedImage = document.getElementById('insertedImage');

        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                insertedImage.src = e.target.result;
                insertedImage.style.display = 'block';
                imageText.style.display = 'none';
            };

            reader.readAsDataURL(file);
        } else {
            insertedImage.src = "";
            insertedImage.style.display = 'none';
            imageText.style.display = 'block';
        }
    }
    function editImage() {
    var input = document.getElementById('photo');
    input.click(); // Déclenche le clic sur l'input file pour ouvrir la boîte de dialogue de sélection de fichier
}

</script>

        <div class="right-container">
            <label for="designName">Nom du design</label>
            <input type="text" name="designName" required  value="<?php echo $designame;?>">

            <label for="designDescription">Description</label>
            <input type="text" name="designDescription" required value="<?php echo $designdesc;?>">

            <button type="submit" name= "submit" class="valider-button">Valider</button>

        </div>
    </form>
</div>
    <?php include("partials/footer.php"); ?>
</body>


</html>