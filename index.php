<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <? echo html_hlavička('index', 'Přehled kurzů'); ?>
  <link rel="stylesheet" type="text/css" href="css/uvod.css">
</head>

<body>
  <div class="layer">

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