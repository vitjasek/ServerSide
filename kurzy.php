<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
<? echo html_hlavička('kurzy', 'Přehled kurzů'); ?>
  <link rel="stylesheet" type="text/css" href="css/prehled_kurzu.css">
</head>

<body>
  <div class="layer">

    <section>
      <div class="main_div">

        <div class="kurz">
          <img src="img/kurz.gif">
          <div class="caption">
            <h2>Logika</h2>
            <p>
              Tento kurz prověří kvality vašeho logického myšlení
            </p>
            <span class="top">TOP: #1 uživatelX, #2 uživatelY, #3 uživatelZ</span>
          </div>
          <button>Start</button>
        </div>

        <div class="kurz">
          <img src="img/kurz.gif">
          <div class="caption">
            <h2>Hudba</h2>
            <p>
              Tento kurz prověří kvality vašeho sluchu
            </p>
            <span class="top">TOP: #1 uživatelX, #2 uživatelY, #3 uživatelZ</span>
          </div>
          <button>Start</button>
        </div>

        <div class="kurz">
          <img src="img/kurz.gif">
          <div class="caption">
            <h2>Literatura</h2>
            <p>
              Tento kurz prověří kolik máte načteno
            </p>
            <span class="top">TOP: #1 uživatelX, #2 uživatelY, #3 uživatelZ</span>
          </div>
          <button>Start</button>
        </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>