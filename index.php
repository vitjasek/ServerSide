<?php 
  session_start();
  if(isset($_SESSION['id'])){
    echo "<h2>Jste uspesne prihlasen</h2>";
  }else{
    echo "<h2>Jste uspesne odhlasen</h2>";
  }
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/uvod.css">
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

        <a href="index.html" class="active">Home</a>
        <a href="zebricky.html">Žebříčky</a>
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
      <a href="index.html" class="active">Home</a>
      <a href="zebricky.html">Žebříčky</a>
      <a href="kurzy.html">Přehled kurzů</a>
      <a href="kurz_edit.html">Správa kurzů</a>
      <a id="logout" href="login.html">Odhlásit</a>
    </div>

    <section>
      <div class="normal">
      <div class="main_div">
        <h2>O nás</h2>
        <div id="about">
          Vítejte na stránkách testování znalostí pomocí rychlých kurzů, ve kterých jde především o správné zodpovězení otázek, ale zároveň také v co nejkratším možném čase.
          Tato forma testování vznikla s myšlenkou poskytnout zábavnou a jednoduchou formu učení, která by byla výzvou pro všechny zúčastněné uživatele této platformy.
          Uživatelé takto mohou mezi sebou soupeřit získáváním odznaků po absolvování jednotlivých kurzů.
          Získávání samotných odznaků se odvíjí od toho, jak se uživatelé na v rámci absolvovaného kurzu umístí.
          To podporuje opakování konkrétních kurzů a zároveň i vštěpování informací, které jsou součástí samotných kurzů.
          Kurzy jako takové jsou postaveny na rozpoznání daného problému popsaného otázkou, poté je problém prezentován formou obrázku na základě, kterého se testovaný uživatel může rozhodnout pouze ANO nebo NE.
          Délka každé odpovědi je měřena časomírou, která se v průběhu celého kurzu sčítá a ve finále rozhoduje o umístění jednotlivých uživatelích, jestliže mají stejný počet správných odpovědí.
        </div>
        <h2>Kontakty</h2>
        <div id="kontakty">
          <ul>
            <li><a href="">kontakt1</a></li>
            <li><a href="">kontakt1</a></li>
            <li><a href="">kontakt1</a></li>
          </ul>
        </div>
      </div>

      <div class="courses_div">
        <h2>Populární kurzy</h2>
        <div class="kurz">
          <img src="img/dice.png">
          <h3>Název kurzu</h3>
          <div class="popis_kurzu">Popis kurzu</div>
        </div>
        <div class="kurz">
          <img src="img/dice.png">
          <h3>Název kurzu</h3>
          <div class="popis_kurzu">Popis kurzu</div>
        </div>
        <div class="kurz">
            <img src="img/dice.png">
            <h3>Název kurzu</h3>
            <div class="popis_kurzu">Popis kurzu</div>
        </div>
      </div>
    </div>

      <div class="mobile">
        <h2>O nás</h2>
        <div id="about">
          Vítejte na stránkách testování znalostí pomocí rychlých kurzů, ve kterých jde především o správné zodpovězení otázek, ale zároveň také v co nejkratším možném čase.
          Tato forma testování vznikla s myšlenkou poskytnout zábavnou a jednoduchou formu učení, která by byla výzvou pro všechny zúčastněné uživatele této platformy.
          Uživatelé takto mohou mezi sebou soupeřit získáváním odznaků po absolvování jednotlivých kurzů.
          Získávání samotných odznaků se odvíjí od toho, jak se uživatelé na v rámci absolvovaného kurzu umístí.
          To podporuje opakování konkrétních kurzů a zároveň i vštěpování informací, které jsou součástí samotných kurzů.
          Kurzy jako takové jsou postaveny na rozpoznání daného problému popsaného otázkou, poté je problém prezentován formou obrázku na základě, kterého se testovaný uživatel může rozhodnout pouze ANO nebo NE.
          Délka každé odpovědi je měřena časomírou, která se v průběhu celého kurzu sčítá a ve finále rozhoduje o umístění jednotlivých uživatelích, jestliže mají stejný počet správných odpovědí.
        </div>
        <h2>Kontakty</h2>
        <div id="kontakty">
          <ul>
            <li><a href="login.html">kontakt1</a></li>
            <li><a href="login.html">kontakt1</a></li>
            <li><a href="login.html">kontakt1</a></li>
          </ul>
        </div>
        <h2>Populární kurzy</h2>
        <div class="kurz">
          <img src="img/dice.png">
          <h3>Název kurzu</h3>
          <div class="popis_kurzu">Popis kurzu</div>
        </div>
        <div class="kurz">
          <img src="img/dice.png">
          <h3>Název kurzu</h3>
          <div class="popis_kurzu">Popis kurzu</div>
        </div>
        <div class="kurz">
            <img src="img/dice.png">
            <h3>Název kurzu</h3>
            <div class="popis_kurzu">Popis kurzu</div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>