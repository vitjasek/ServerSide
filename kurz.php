
<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if(isset($_GET['id'])){
    $kurz_id= $_GET['id'];
  }
  if(isset($_POST['act'])){


  }

  if(!isset($_SESSION['kurz']['ot'])){
    $_SESSION['kurz']['ot'] = 1;
    $_SESSION['kurz'][new DateTime()];
  }
  else{
    $_SESSION['kurz']['ot'] = 0;
  }

  $kurz_select = 'SELECT nazev, odpoved, obrazek FROM kurz
  LEFT JOIN otazka ot on ot.kurzid = kurz.id
  LEFT JOIN obrazek ob on ob.id = ot.obrazekid
  WHERE kurz.id = ?
  ORDER BY ot.id';
  $stmt = $conn->prepare($kurz_select);
  $stmt->bind_param('i', $kurz_id);
  $stmt->execute();
  $res = $stmt->get_result();
  $rec = $res->fetch_all(); //název kurzu

  $cislo_ot= $_SESSION['kurz']['ot'];

  $nazev_kurzu = $rec[$cislo_ot][0];
  $spravna_odpoved = $rec[$cislo_ot][1];
  $obrazek = $rec[$cislo_ot][2];

?>
<!DOCTYPE html>
<html lang="cs">

  <head>
  <?php echo html_hlavička('kurzy', 'Kurz'); ?>
  <link rel="stylesheet" type="text/css" href="css/hra_b.css">
  <script type="text/javascript" src="js/kurz.js"></script>
</head>

<body>
  <div class="layer">

    <section>
      <div id="polozka">
        <h1><?php $nazev_kurzu?></h1>
        <div id="krizek">
          <button class="myButton js_zavrit_kurz">X</button>
        </div>
        <div id="hrab_main">
          <div id="anob">
            <button class="myButton js_odpoved" data-answer="1">Ano</button>
          </div>
          <div id="obrazekb">
            <img src="<?php echo $obrazek ?>" alt="obsah">
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
<h1><?php $nazev_kurzu?></h1>
<div id="krizek">
  <button class="myButton js_zavrit_kurz">X</button>
</div>
<div id="hrab_main">
  <div id="anob">
    <button class="myButton js_odpoved" data-answer="1">Ano</button>
  </div>
  <div id="obrazekb">
    <img src="'.$obrazek.'" alt="obsah">
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