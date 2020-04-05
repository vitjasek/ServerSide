
<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if(isset($_GET['id'])){
    $kurz_id= $_GET['id'];
  }
  if(isset($_POST['act'])){


  }

  $kurz_select = 'SELECT nazev FROM kurz WHERE id = ?';
  $stmt = $conn->prepare($kurz_select);
  $stmt->bind_param('i', $kurz_id);
  $stmt->execute();
  $res = $stmt->get_result();
  var_dump($res->fetch_row()[0]);


?>
<!DOCTYPE html>
<html lang="cs">

  <head>
  <?php echo html_hlavička('kurzy', 'Kurz'); ?>
  <link rel="stylesheet" type="text/css" href="css/hra_b.css">
</head>

<body>
  <div class="layer">

    <section>
      <div id="polozka">
        <h1>Název spuštného kurzu</h1>
        <div id="krizek">
          <button class="myButton js_zavrit_kurz">X</button>
        </div>
        <div id="hrab_main">
          <div id="anob">
            <button class="myButton js_odpoved" data-answer="1">Ano</button>
          </div>
          <div id="obrazekb">
            <img src="img/kurz.gif" alt="obsah">
          </div>
          <div id="neb">
            <button class="myButton js_odpoved" data-answer="0">Ne</button>
          </div>
        </div>
        <div id="hrab_paticka">
          <span>Správná odpověď: ANO/NE
          </span>
          <span>Uplynulý čas
          </span>
          <button id="exit_button" class="myButton" data-ok="wrong">⮞</button>
        </div>
      </div>
    </section>
    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>
<?php

$html = '      <div id="polozka">
<h1>Název spuštného kurzu</h1>
<div id="krizek">
  <button class="myButton js_zavrit_kurz">X</button>
</div>
<div id="hrab_main">
  <div id="anob">
    <button class="myButton js_odpoved" data-answer="1">Ano</button>
  </div>
  <div id="obrazekb">
    <img src="img/kurz.gif" alt="obsah">
  </div>
  <div id="neb">
    <button class="myButton js_odpoved" data-answer="0">Ne</button>
  </div>
</div>
<div id="hrab_paticka">
  <span>Správná odpověď: ANO/NE
  </span>
  <span>Uplynulý čas
  </span>
  <button id="exit_button" class="myButton" data-ok="wrong">⮞</button>
</div>
</div>';
?>