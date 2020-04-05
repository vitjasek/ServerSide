<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    if(isset($_POST['name']))
    {
      if(strlen($_POST['name'])>0 && is_uploaded_file($_FILES['pic01']['tmp_name']) && is_uploaded_file($_FILES['pic02']['tmp_name']) && is_uploaded_file($_FILES['pic03']['tmp_name']) && strlen($_POST['anslist01'])>0 && strlen($_POST['anslist02'])>0 && strlen($_POST['anslist03'])>0)
      {
        $inskurz = "UPDATE kurz SET nazev='{$_POST['name']}' WHERE userid='{$_SESSION['id']}')"; 
        $conn->query($inskurz);
        $kurz_id = $conn->insert_id;
  
        for($i=1; $i<=3; $i++){
          $pic = addslashes(file_get_contents($_FILES['pic0'.$i]['tmp_name']));// addslashes(file_get_contents($_FILES['pic0'.$i]['tmp_name']));
          $inspic = "UPDATE obrazek SET obrazek=(?) WHERE";
          $stmt = $conn->prepare($inspic);
          $null = NULL;
          $stmt->bind_param('b', $null);
          $stmt->send_long_data(0, $pic);
          $stmt->execute();
          $pic_id = $stmt->insert_id;
          $ans = $_POST['anslist0'.$i]=="ano" ? 1 : 0;
          $otazkains = "INSERT INTO otazka (datum,kurzid,obrazekid,odpoved) VALUES( NOW(), '{$kurz_id}', '{$pic_id}', '$ans')";
          $conn->query($otazkains);
        }
        header("Location: kurz_edit.php"); 
        exit();
      }      
    }
    else
    {
      $wantedid = $_POST['edit'];
      $slctot = "SELECT * FROM otazka WHERE kurzid='$wantedid'";
      $otazky = mysqli_query($conn, $slctot);
      $slctobr = "SELECT * FROM otazka WHERE kurzid='$wantedid'";
      $obrazky = mysqli_query($conn, $slctobr);
      $slctkurz = "SELECT * FROM kurz WHERE id='$wantedid'";
      $kurzy = mysqli_query($conn, $slctkurz);
      $kurz = $kurzy->fetch_assoc();
    }
  }
?>
<!DOCTYPE html>
<html lang="cs">

<head>
<?php echo html_hlavička('new', 'Nový kurz'); ?>
<link rel="stylesheet" type="text/css" href="css/new.css">
</head>

<body>
  <div class="layer">
    <section>
      <div class="main_div">
        <div class="kurz">
          <h2>Tvorba nového kurzu</h2>
          <form action="kurz_update.php" method="POST" enctype="multipart/form-data">
            <span>Název kurzu s otázkou: </span> <input type="text" class="main" name="name" value="<?php echo $kurz['nazev']; ?>"><br>
            <?php 
            $x=0;
            while($row = mysqli_fetch_array($otazky, MYSQLI_ASSOC))
            {
              $x++;
              echo "<hr>
              <h2>Otázka č.".$x."</h2>
              <table>
                <tr><td><span class='inside'>Obrázek vztahující se k otázce:</span></td><td><input type='file' class='inside' name='pic0".$x."'></td></tr>
                <tr><td><span class='inside'>Odpověď:</span></td><td><select id='ans0".$x."' name='anslist0".$x."'>
                  <option value='ano'>Ano</option>
                  <option value='ne'>Ne</option>
                </select></td></tr>
              </table>";
            }
            ?>
            <button type="submit">Upravit</button>
          </form>
        </div>
      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>