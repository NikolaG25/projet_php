<!DOCTYPE HTML>  
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Inscription</title>

</head>

<body> 

<?php include("partials/header.php"); ?> 

<?php
// define variables and set to empty values
$nomErr = $prenomErr = $adresseErr = $telephoneErr = $emailErr = $motdepasseErr = "";
$nom = $prenom = $adresse = $telephone = $email = $motdepasse = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Nom requis";
  } else {
    $nom = test_input($_POST["nom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
      $nomErr = "Lettres et espaces uniquement";
    }
  }


  if (empty($_POST["prenom"])) {
      $prenomErr = "Prénom requis";
    } else {
      $prenom = test_input($_POST["prenom"]);
      // check if surname only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) {
        $prenomErr = "Lettres et espaces uniquement";
      }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email requis";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email invalide";
    }
  }


  if (empty($_POST["telephone"])) {
    if (empty($_POST["telephone"])) {
      $telephoneErr = "Numéro de téléphone requis";
    } else {
      $telephone = test_input($_POST["phone"]);
      // check if surname only contains letters and whitespace
      if (!preg_match("/^[0-9-' ]*$/",$telephone)) {
        $telephoneErr = "Numéro invalide";
      }
    }
  }

  if (empty($_POST["motdepasse"])) {
    if (empty($_POST["motdepasse"])) {
      $motdepasseErr = "Un mot de passe est requis";
    } else {
      $motdepasse = test_input($_POST["motdepasse"]);
      if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $motdepasse)) {
        $motdepasseErr = "Mot de passe invalide";
      }
    }
  }

  if (empty($_POST["adresse"])) {
    if (empty($_POST["adresse"])) {
      $adresseErr = "Une adresse est requise";
    } else {
      $adresse = test_input($_POST["adresse"]);
      if (!preg_match("/^[0-9a-zA-Z_]{5,}$/", $adresse)) {
        $adresseErr = "Adresse invalide";
      }
    }
  }


  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Inscrivez-vous dès maintenant !</h2>
<p class="margin"><span class="error">* Champs requis</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nom: <input type="text" name="name" value="<?php echo $nom;?>">
  <span class="error">* <?php echo $nomErr;?></span>
  <br><br>
  Prénom: <input type="text" name="surname" value="<?php echo $prenom;?>">
  <span class="error">* <?php echo $prenomErr;?></span>
  <br><br>
  Adresse : <input type="text" name="adress" value="<?php echo $adresse;?>">
  <span class="error">* <?php echo $adresseErr;?></span>
  <br><br>
  N° Téléphone: <input type="text" name="phone" value="<?php echo $telephone;?>">
  <span class="error">* <?php echo $telephoneErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Mot de passe: <input type="text" name="motdepasse" value="<?php echo $motdepasse;?>">
  <span class="error">* <?php echo $motdepasseErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="M'inscrire" class="custom-button">  

</form>

<?php include("partials/footer.php"); ?>

</body>
</html>