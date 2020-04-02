<?php
$html = '<!DOCTYPE html>
<html lang="cs">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/general.js"></script>

  <title>Přehled kurzů</title>
</head>

<body>
  <div class="layer">
    <section>
      <div class="main_div">
        <div class="login">
          <img src="img/logoDaNiet.JPG">
          <h2>Přihlášení</h2>
          <form action="login.php" method="POST">
            <span>Jméno: </span> <input type="text" name="username">
            <span> Heslo: </span> <input type="password" name="password">
            <input type="hidden" name="act" value="login">
            <button type="submit">Přihlásit</button>
          </form>
        </div>
        <hr>
        <div class="registration">
          <h2>Registrace</h2>

          <form action="login.php" method="POST">
            <span>Jméno:</span> <input type="text" name="username" placeholder="Jméno"><br>
            <span>E-mail:</span> <input type="email" name="mail" placeholder="E-mail">
            <span>Heslo:</span> <input type="password" name="pwd" placeholder="Heslo">
            <span>Heslo znovu:</span> <input type="password" name="pwd-repeat" placeholder="Heslo">
            <input type="hidden" name="act" value="registration">
            <button type="submit" >Registrovat</button>
          </form>

        </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>';

function login($login, $pass)
{
  include_once('db_connector.php');
  if (empty($login) || empty($pass)) {
    header("location: login.php");
    exit();
  } else {
    $sql = "SELECT id, login, heslo FROM uzivatel WHERE login =? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0 ) {
      $rec = $res->fetch_assoc();
      if(!password_verify($pass, $rec['heslo'])) echo "Špatné přihlašovací údaje";
      session_start();
      $_SESSION["is_loggedin"] = true;
      $_SESSION["id"] = $rec['id'];
      $_SESSION["username"] = $login;
      header("location: index.php");
      exit();
    } else {
      echo "Špatné přihlašovací údaje";
    }
  }
}

function registration($username, $password)
{
  include_once('db_connector.php');

   if (empty($username) || empty($password)) {
    echo "Pole jméno a heslo musí být vyplněné";
  } else {
    $SELECT = "SELECT login FROM uzivatel WHERE login = ? Limit 1";
    $INSERT = "INSERT INTO uzivatel (login, heslo, obrazekid, roleid) VALUES(?,?,?,?)"; //obrazek a role zatím není, je třeba dodělat
    try{
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $res = $stmt->get_result();
      if ($res->num_rows == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $id = 1;
        $stmt->bind_param("ssii", $username, $hashedPwd, $id, $id);
        $stmt->execute();
        $stmt->close();
      } else {
        echo "Uživatel už existuje";
      }
    }catch(Exception $ex){
      var_dump($ex);
    }
    echo "úspěšná registrace";
  }
}

if (isset($_POST['act'])) {
  router($_POST['act']);
}
else if (isset($_GET['act'])) {
  router($_GET['act']);
}

function router($act){
  switch ($act) {
    case 'login':
      login($_POST['username'], $_POST['password']);
      break;
    case 'registration':
      registration($_POST['username'], $_POST['pwd']);
      break;
    case 'logout':
      session_start();
      session_destroy();
      break;
  }
}

echo $html;
?>