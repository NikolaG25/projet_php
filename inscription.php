<!DOCTYPE HTML>  
<html>
<head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap');
.error {color: #f581e0;}
body{
  font-family:'Open Sans', sans-serif;
  display: flex;
  align-items:center;
  justify-content:space-between;
  flex-direction:column;
}
input[type=submit] {
	font-weight: bold;
  background-color: #d297b3;
	font-size: 20px;
	border-radius: 10px;
  border: 4px solid;
  font-size:25px;
  cursor: pointer;
}

.custom-button:hover {
  color: #ffffff
}

input[type=text] {
  border:5px solid;
  border-radius: 10px;
}

.margin {
  margin-bottom: 50px;
}

form {
  color:#ffffff;
  padding: 20px;
  border-radius: 51px;
  background: linear-gradient(145deg, #86375a, #9f416b);
  box-shadow:  26px 26px 33px #86375a,
             -26px -26px 33px #9f416b;
}

p {
  width: 30%;
}

{
  background: #010c03;
}

</style>
</head>
<body>  

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
      if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
        $surnameErr = "Lettres et espaces uniquement";
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
      if (!preg_match("/^[0-9-' ]*$/",$phone)) {
        $telephoneErr = "Lettres et espaces uniquement";
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

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p class="margin"><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nom: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Prénom: <input type="text" name="surname" value="<?php echo $surname;?>">
  <span class="error">* <?php echo $surnameErr;?></span>
  <br><br>
  Adresse : <input type="text" name="adress" value="<?php echo $adress;?>">
  <span class="error">* <?php echo $adressErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
  <span class="error">* <?php echo $phoneErr;?></span>
  <br><br>
  mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Mot de passe:
 
  <br><br>

  <input type="submit" name="submit" value="Submit" class="custom-button">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $surname;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $question;
?>

</body>
</html>