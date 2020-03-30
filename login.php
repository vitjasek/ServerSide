<!DOCTYPE html>
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
    <!-- <nav>
      <div class="logo">
        <a href="index.html">
          <img src="img/logoDaNiet.jpg" alt="logo">
        </a>
      </div>
      <div class="menu">

        <a href="index.html">Home</a>
        <a href="zebricky.html">Žebříčky</a>
        <a href="kurzy.html">Přehled kurzů</a>
        <a href="kurz_edit.html" class="active" >Správa kurzů</a>
        <a id="logout" href="login.html">Odhlásit</a>
      </div>
      <div id="hamburger" class="fa fa-bars fa-lg" onclick="showBurgerMenu()"></div>
      <div class="user">
        <a href="profil.html">
          <img src="img/profileLogo.png" alt="avatar">
        </a>
      </div>
    </nav>
    <div id="mobile_menu">
      <a href="index.html">Home</a>
      <a href="zebricky.html">Žebříčky</a>
      <a href="kurzy.html">Přehled kurzů</a>
      <a href="kurz_edit.html" class="active">Správa kurzů</a>
      <a id="logout" href="login.html">Odhlásit</a>
    </div> -->
    <section>
      <div class="main_div">
        <div class="login">
          <img src="img/logoDaNiet.JPG">
          <h2>Přihlášení</h2>
          <form action="loginp.php" method="POST">
            <span>Jméno: </span> <input type="text" name="username">
            <span> Heslo: </span> <input type="password" name="password">
            <button name="login-submit" >Přihlásit</button>
          </form>
        </div>
        <hr>
        <div class="registration">
          <h2>Registrace</h2>

          <form action="registrace.php" method="POST">
            <span>Jméno:</span> <input type="text" name ="username" placeholder="Jméno"><br>
            <span>E-mail:</span> <input type="email" name="mail" placeholder="E-mail">
            <span>Heslo:</span> <input type="password" name="pwd" placeholder="Heslo">
            <span>Heslo znovu:</span> <input type="password" name="pwd-repeat" placeholder="Heslo">
            <button type="submit" name="signup-submit">Registrovat</button>
          </form>

        </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>