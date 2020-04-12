<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
<?php echo html_hlavička('kurzy', 'Přehled kurzů'); ?>
  <link rel="stylesheet" type="text/css" href="css/prehled_kurzu.css">
</head>

<body>
  <div class="layer">

    <section>
      <div class="main_div">

      <?php
        $slctall = "SELECT * FROM kurz";
        $kurzy = mysqli_query($conn, $slctall);
        $numrow = 0;
        while($row = mysqli_fetch_array($kurzy, MYSQLI_ASSOC)){
            echo "
            <div class='kurz'>
              <img src='img/kurz.gif'>
              <div class='caption'>
                <h2>".$row["nazev"]."</h2>
                <!--<p>
                  Text kurzu
                </p>-->
              </div>
                <form action='kurz.php?id=" . $row['id'] . "' method='POST'>
                  <button>Start</button>
                </form>  
            </div>";
            $numrow++;
        }
        if($numrow == 0){
          echo "<span id='message' style='display:block'>Nebyl nalezen žádný kurz.</span>";
        }
      ?>

<!--    <div class="kurz">
          <img src="img/kurz.gif">
          <div class="caption">
            <h2>Logika</h2>
            <p>
              Tento kurz prověří kvality vašeho logického myšlení
            </p>
            <span class="top">TOP: #1 uživatelX, #2 uživatelY, #3 uživatelZ</span>
          </div>
          <button>Start</button>
        </div> -->

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>