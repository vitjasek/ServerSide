<!DOCTYPE html>
<html lang="cs">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/profil.css">
  <script type="text/javascript" src="js/general.js"></script>

  <title>Přehled kurzů</title>
</head>

<body>
  <div class="layer">
    <nav>
      <div class="logo">
        <a href="index.html">
          <img src="img/logoDaNiet.jpg" alt="logo">
        </a>
      </div>
      <div class="menu">

        <a href="index.html">Home</a>
        <a href="zebricky.html" >Žebříčky</a>
        <a href="kurzy.html">Přehled kurzů</a>
        <a href="kurz_edit.html">Správa kurzů</a>
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
      <a href="zebricky.html" >Žebříčky</a>
      <a href="kurzy.html">Přehled kurzů</a>
      <a href="kurz_edit.html">Správa kurzů</a>
      <a id="logout" href="login.html">Odhlásit</a>
    </div>

    <section>

      <div class="main_div">
        <div class="setup">
        <div class="profil">
          <h2>Nastavení profilu</h2>
          <div class="password">
            <table id="inputs">
              <tr>
                <td>
                  Uživatelské jméno:
                </td>
                <td>
                  <input type="text">
                </td>
              </tr>
              <tr>
                <td>
                  Nové heslo:
                </td>
                <td>
                  <input type="password">
                </td>
              </tr>
              <tr>
                <td>
                  Nové heslo znovu:
                </td>
                <td>
                  <input type="password">
                </td>
              </tr>
            </table>
            <button>Ok</button>
          </div>
          <div class="profile_pic">
            <img src="img/profileLogo.png">
            <input type="file">
            <button>Ok</button>
          </div>
        </div>
      </div>

      <hr>
      <h2>Odznaky</h2>
      <div class="badges">
        <div class="badge"></div>
        <div class="badge"></div>
        <div class="badge"></div>
        <div class="badge"></div>
      </div>

      <div class="badges_table_div">
        <table class="badges_table">
          <thead>
            <tr>
              <th>Název kurzu</th>
              <th>Datum</th>
              <th>Skóre</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>...</td>
              <td>...</td>
              <td>...</td>
            </tr>
          </tbody>
        </table>
      </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>