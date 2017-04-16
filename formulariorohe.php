<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Formulario</title>
  <link href="https://fonts.googleapis.com/css?family=Diplomata+SC|Roboto+Slab" rel="stylesheet">
  <link rel="stylesheet" href="formulariorohe.css">
<!-- /*<style>
.error {color: #FF0000;}
</style>*/ -->
</head>
<body>

<?php
$nameErr = $lastnameErr = $emailErr = "";
$name = $lastname = $email = $tel = $adress = $city = $country = $birth = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nombre requerido";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Sólo se permiten letras y espacios";
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Se requiere apellido";
  } else {
    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Se requiere un e-mail";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato inválido de email";
    }
  }

  if (empty($_POST["tel"])) {
    $tel = "";
  } else {
    $tel = test_input($_POST["tel"]);
  }

  if (empty($_POST["adress"])) {
    $adress = "";
  } else {
    $adress = test_input($_POST["adress"]);
  }

  if (empty($_POST["city"])) {
    $city = "";
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["country"])) {
    $country = "";
  } else {
    $country = test_input($_POST["country"]);
  }

  if (empty($_POST["birth"])) {
    $birth = "";
  } else {
    $birth = test_input($_POST["birth"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>Consultas</h2>
<form method="post" class="consultas" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="name">Nombre:</label>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <label for="lastname">Apellido</label>
  <input type="text" name="lastname" value="<?php echo $lastname;?>">
  <br><br>
  <label for="email">Mail:</label>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label for="tel">Teléfono</label>
  <input type="text" name="tel" value="<?php echo $tel;?>">
  <br><br>
  <label for="adress">Domicilio</label>
  <input type="text" name="adress" value="<?php echo $adress;?>">
  <br><br>
  <label for="city">Ciudad</label>
  <input type="text" name="city" value="<?php echo $city;?>">
  <br><br>
  <label for="country">País</label>
  <input type="text" name="country" value="<?php echo $country;?>">
  <br><br>
  <label for="birth">Fecha de nacimiento</label>
  <input type="text" name="birth" value="<?php echo $birth;?>">
  <br><br>
  <label for="comment">Escriba aquí su consulta:</label>
  <br><br>
  <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Enviar">
  <p><span class="error">* Datos requeridos</span></p>
</form>

<?php
echo "<h2>Datos:</h2>";
echo $name;
echo "<br>";
echo $lastname;
echo "<br>";
echo $email;
echo "<br>";
echo $tel;
echo "<br>";
echo $adress;
echo "<br>";
echo $city;
echo "<br>";
echo $country;
echo "<br>";
echo $birth;
echo "<br>";
echo $comment;
?>


</body>
</html>
