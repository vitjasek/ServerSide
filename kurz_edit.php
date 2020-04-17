<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $wantedid = $_POST['delete'];
    $slctall = "SELECT * FROM otazka WHERE kurzid='$wantedid'";
    $otazky = mysqli_query($conn, $slctall);
    while($rowot = mysqli_fetch_array($otazky, MYSQLI_ASSOC))
    {
      $dltpic = "DELETE FROM obrazek WHERE id='{$rowot['obrazekid']}'";
      $conn->query($dltpic);
    }
    $dltot = "DELETE FROM otazka WHERE kurzid='$wantedid'";
    $conn->query($dltot);
    $dltkurz = "DELETE FROM kurz WHERE id='$wantedid'";
    $conn->query($dltkurz);
  }
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <?php echo html_hlavička('kurz_edit', 'Správa kurzů'); ?>
  <link rel="stylesheet" type="text/css" href="css/kurz_edit.css">
</head>

<body>
  <div class="layer">

    <section>
      <div class="main_div">
        <form action="kurz_new.php">
          <button class="new_course">Nový kurz</button>
        </form>
        <?php
          $slctall = "SELECT * FROM kurz WHERE userid='{$_SESSION['id']}'";
          $kurzy = mysqli_query($conn, $slctall);
          while($row = mysqli_fetch_array($kurzy, MYSQLI_ASSOC))
          {
            echo "<div class='kurz'>
              <img src='img/kurz.gif'alt='obrazek'>
                <div class='caption'>
                  <h2>".$row['nazev']."</h2>
                  <!--<p>
                    Text kurzu
                  </p>-->
                </div>
                <div class='controls'>
                <form action='kurz.php?id=" . $row['id'] . "' method='POST'>
                  <button>Test</button>
                </form>
                <form action='kurz_update.php' method='POST'>
                  <input type='hidden' name='edit' value='".$row['id']."'>
                  <button>Edit</button>
                </form>
                <form action='kurz_edit.php' method='POST'>
                  <input type='hidden' name='delete' value='".$row['id']."'>
                  <button>Smazat</button>
                </form>
                </div>
              </div>";
          }?>
      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>
