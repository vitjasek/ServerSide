<?php
$err_code = 3;

function login($login, $pass)
{
  include_once('db_connector.php');
  global $err_code;

  if (empty($login) || empty($pass)) {
    $err_code = 4;
  } else {
    $sql = "SELECT id, login, heslo FROM uzivatel WHERE login =? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0 ) {
      $rec = $res->fetch_assoc();
      if(password_verify($pass, $rec['heslo']))
      {
        session_start();
        $_SESSION["is_loggedin"] = true;
        $_SESSION["id"] = $rec['id'];
        $_SESSION["login"] = $login;
        header("location: index.php");
        exit();
      }   
      else
      {
        $err_code = 4;
      }
    } else {
      $err_code = 4;
    }
  }
}

function registration($username, $password, $mail)
{
  include_once('db_connector.php');
  global $err_code;

  if (empty($username) || empty($password) || empty($mail)) {
    $err_code = 1;
  } else {
    $SELECT = "SELECT login FROM uzivatel WHERE login = ? Limit 1";
    $INSERT = "INSERT INTO uzivatel (login, heslo, obrazekid, roleid, email) VALUES(?,?,?,?,?)"; //obrazek a role zatím není, je třeba dodělat
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
        $obrazekid = 1000000;       
        $stmt->bind_param("ssiis", $username, $hashedPwd, $obrazekid, $id, $mail);
        $stmt->execute();
        $stmt->close();
        $err_code = 0;
      } else {
        $err_code =  2;
      }
    }catch(Exception $ex){
      var_dump($ex);
    }
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
      login($_POST['login'], $_POST['password']);
      break;
    case 'registration':
      registration($_POST['username'], $_POST['pwd'], $_POST['mail']);
      break;
    case 'logout':
      session_start();
      session_destroy();
      break;
  }
}

function err_messages(int $message_code){
  switch($message_code){
    case 0:
      return '<span id="message" style="display:block; background: green; ">Úspěšná registrace.</span>';
    break;
    case 1:
      return '<span id="message" style="display:block">Pole jméno, heslo a email musí být vyplněné.</span>';
    break;
    case 2:
      return '<span id="message" style="display:block">"Uživatel už existuje".</span>';
    break;
    case 3:
      return '<span id="message">Hesla se neshodují.</span>'; //jde do JS
    break;
    case 4:
      return '<span id="message" style="display:block">"Špatné přihlašovací údaje".</span>';
    break;
  }
}

$html = '<!DOCTYPE html>
<html lang="cs">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/general.js"></script>

  <title>Přehled kurzů</title>
<style>
  label{
	  
	  display: block;
	     margin: 5px;
    padding: 10px;
    text-align: center;
  }

  input{
	 align-content: center;
    position: absolute;
    right: 90px;
    height: 20px;
}
  }
  
  </style>
</head>

<body>
  <div class="layer">
    <section>
      <div class="main_div">
        <div class="login">
          <img src="img/logoDaNiet.JPG" alt="Logo Ano/Ne">
          <h2>Přihlášení</h2>
          <form action="login.php" method="POST" id="login">
		 
            <label for="login">Login:</label> 
			
		<input type="text" name="login" id="login" ><br><br>
			
			<label for="password">Heslo: </label>
			
			 
			<input type="password" name="password" id="password"><br><br>
            <input type="hidden" name="act" value="login">
            <button type="submit">Přihlásit</button>
            ';
            if($err_code >=4) $html .= err_messages($err_code);
  $html.='
          </form>
        </div>
        <hr>
        <div class="registration">
          <h2>Registrace</h2>

          <form action="login.php" method="POST" onsubmit="return passCheck()">
            <label for="username">Jméno:</label> <input type="text" name="username" placeholder="Jméno" id="username"><br>
            <label for="mail">E-mail:</label> <input type="email" name="mail" placeholder="E-mail" id="mail"><br>
            <label for="pwd">Heslo:</label> <input type="password" name="pwd" id="pwd" placeholder="Heslo" id="pwd"><br>
            <label for="pwd-repeat">Heslo znovu:</label> <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Heslo" id="pwd-repeat"><br>
            ';
            if($err_code < 4) $html .= err_messages($err_code);
  $html.='
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

echo $html;
?>
