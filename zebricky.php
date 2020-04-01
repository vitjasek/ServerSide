<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <? echo html_hlavička('zebricky', 'Žebříčky'); ?>
  <link rel="stylesheet" type="text/css" href="css/zebricky.css">
</head>

<body>
  <div class="layer">

    <section>
      <div class="main_div">

        <div class="tops_wrap">
        <div class="top second">
          <h3>2#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>

        <div class="top first">
          <h3>1#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>

        <div class="top third">
          <h3>3#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>
      </div>


      <div class="places_wrap">
        <hr class="first_hr">

        <div class="my_place">
          <div class="place">
            <img src="img/profileLogo.png">
            <div>VAŠE POZICE</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#34</span>
          </div>
        </div>

        <hr class="second_hr">

        <div class="places_view">
          <div class="place">
            <img src="img/profileLogo.png">
            <div>Uživatel</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#4</span>
          </div>
          <div class="place">
            <img src="img/profileLogo.png">
            <div>Uživatel</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#5</span>
          </div>
        </div>
      </div>

      </div>

      <div class="mobile_div">

        <div class="top first">
          <h3>1#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>

        <div class="top second">
          <h3>2#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>

        <div class="top third">
          <h3>3#</h3>
          <img src="img/profileLogo.png">
          <h3>Uživatel</h3>
          <p>pocet_bodu</p>
        </div>

        <div class="my_place">
          <div class="place">
            <img src="img/profileLogo.png">
            <div>VAŠE POZICE</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#34</span>
          </div>
        </div>

        <div class="places_view">
          <div class="place">
            <img src="img/profileLogo.png">
            <div>Uživatel</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#4</span>
          </div>
          <div class="place">
            <img src="img/profileLogo.png">
            <div>Uživatel</div>
            <span class="score">počet bodů</span>
            <span class="score_place" >#5</span>
          </div>
        </div>
      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>