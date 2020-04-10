
<?php
  include_once('common_functions.php');
  redirect_if_not_logged();


  ///unset($_SESSION['kurz']);

  if(isset($_GET['id'])){
    $kurz_id = $_GET['id'];
  }

  if(isset($_SESSION['kurz']['ot'])){
    if($_SESSION['kurz']['ot'] > 2){
      die;
    }
  }

  if(empty($_SESSION['kurz'])){
    $_SESSION['kurz']['ot'] = 0;
    $_SESSION['kurz']['cas']  = new DateTime();
    load_questions($kurz_id);
    $_SESSION['kurz']['correct_asn'] = 0;
    $_SESSION['kurz']['ans'] = -1;
    $_SESSION['kurz']['id'] = $kurz_id;
  }

  if(isset($_POST['act'])){
    switch($_POST['act']){
      case 'odpoved':
        echo odpoved($_POST['answer']);
        exit;
      break;

      case 'html':
        echo get_question_html($_SESSION['kurz']['ot']);
        exit;
      break;

      case 'konec':
        unset($_SESSION['kurz']);
        exit;
      break;

      default:
        exit();
    break;
    }
  }

  function odpoved($odpoved){
    $otazka = $_SESSION['kurz']['ot'];//číslo otázky jde od 0
    $html = "";
    if($otazka == $_SESSION['kurz']['ans']){
      if($_SESSION['kurz'][$otazka]['odpoved'] == $odpoved){//správná odpověď
        $_SESSION['kurz']['correct_asn'] ++; //počítá se do skóre
        $html .= "<span> Správná odpověď </span>";
      }
      else{
        $html .= "<span> Špatná odpověď </span>";
      }
      $_SESSION['kurz']['ot'] ++;
    }
    else{
      $html .= "<span> Otázka již byla zodpovězena </span>";
    }
    if($_SESSION['kurz']['ot'] == 3) konec_hry($_SESSION['kurz']['correct_asn']);
    return $html;
  }

  function load_questions($kurz_id){
    include_once('db_connector.php');
    $kurz_select = 'SELECT nazev, odpoved, obrazek, ot.id FROM kurz
    LEFT JOIN otazka ot on ot.kurzid = kurz.id
    LEFT JOIN obrazek ob on ob.id = ot.obrazekid
    WHERE kurz.id = ?
    ORDER BY ot.id';
    $stmt = $conn->prepare($kurz_select);
    $stmt->bind_param('i', $kurz_id);
    $stmt->execute();
    $res = $stmt->get_result();
    while($rec = $res->fetch_assoc()){
      $_SESSION['kurz'][] = $rec;
    }
  }

  function konec_hry($skore){
    include_once('db_connector.php');
    $sql = "INSERT INTO dokonceno(datum, skore, kurzid, userid) VALUES(now(), ?, ?, ?)";
    $stmp = $conn->prepare($sql);
    $stmp->bind_param('iii', $skore, $_SESSION['kurz']['id'], $_SESSION['id']);
    $stmp->execute();
  }

  function get_question_html($otazka){
    if($_SESSION['kurz']['ot'] > $_SESSION['kurz']['ans']) $_SESSION['kurz']['ans']++;
    $html = '<div id="polozka">
      <h1>' . $_SESSION['kurz'][$otazka]['nazev'] . '</h1>
      <div id="krizek">
        <button class="myButton js_zavrit_kurz">X</button>
      </div>
      <div id="hrab_main">
        <div id="anob">
          <button class="myButton js_odpoved" data-answer="1">Ano</button>
        </div>
        <div id="obrazekb">
          <img src="'. $_SESSION['kurz'][$otazka]['obrazek'] .'" alt="otázka">
        </div>
        <div id="neb">
          <button class="myButton js_odpoved" data-answer="0">Ne</button>
        </div>
        </div>
        <div id="hrab_paticka">
          <span id="js_odpoved"></span>
          <span>Uplynulý čas</span>';
          if ($_SESSION['kurz']['ot'] < 2){
           $html .= '<button id="exit_button" class="myButton js_next">⮞</button>';
          }
          $html .='
        </div>
    </div>';
    return $html;
  }


echo '
<!DOCTYPE html>
<html lang="cs">

  <head>
  '. html_hlavička('kurzy', 'Kurz') . '
  <link rel="stylesheet" type="text/css" href="css/hra_b.css">
  <script type="text/javascript" src="js/kurz.js"></script>
</head>

<body>
  <div class="layer">
    <from id="kurz_form" action="kurzy.php" method="GET">
      <section id="js_main_section">

      </section>
    </form>
    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>';
?>