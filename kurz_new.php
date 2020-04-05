<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    if(strlen($_POST['name'])>0 && is_uploaded_file($_FILES['pic01']['tmp_name']) && is_uploaded_file($_FILES['pic02']['tmp_name']) && is_uploaded_file($_FILES['pic03']['tmp_name']) && strlen($_POST['anslist01'])>0 && strlen($_POST['anslist02'])>0 && strlen($_POST['anslist03'])>0)
    {
      $inskurz = "INSERT INTO kurz (nazev,userid) VALUES('{$_POST['name']}', '{$_SESSION['id']}')";

      $conn->query($inskurz);
      $kurz_id = $conn->insert_id;

      for($i=1; $i<=3; $i++){
        $pic = $_FILES['pic0'.$i]['tmp_name'];// addslashes(file_get_contents($_FILES['pic0'.$i]['tmp_name']));
        $inspic = "INSERT INTO obrazek (obrazek) VALUES('$pic')";
        $conn->query($inspic);
        $pic_id = $conn->insert_id;
        $ans = $_POST['anslist0'.$i]=="ano" ? true : false;
        $otazkains = "INSERT INTO otazka (datum,kurzid,obrazekid,odpoved) VALUES( NOW(), '{$kurz_id}', '{$pic_id}', '$ans')";
        $conn->query($otazkains);
      }
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
          <form action="kurz_new.php" method="POST" enctype="multipart/form-data">
            <span>Název kurzu s otázkou: </span> <input type="text" class="main" name="name"><br>
            <hr class="first">
            <h2>Otázka č.1</h2>
            <table>
              <tr><td><span class="inside">Obrázek vztahující se k otázce:</span></td><td><input type="file" class="inside" name="pic01"></td></tr>
              <tr><td><span class="inside">Odpověď:</span></td><td><select id="ans01" name="anslist01">
                <option value="ano">Ano</option>
                <option value="ne">Ne</option>
              </select></td></tr>
            </table>
            <hr>
            <h2>Otázka č.2</h2>
            <table>
              <tr><td><span class="inside">Obrázek vztahující se k otázce:</span></td><td><input type="file" class="inside" name="pic02"></td></tr>
              <tr><td><span class="inside">Odpověď:</span></td><td><select id="ans02" name="anslist02">
                <option value="ano">Ano</option>
                <option value="ne">Ne</option>
              </select></td></tr>
            </table>
            <hr>
            <h2>Otázka č.3</h2>
            <table>
              <tr><td><span class="inside">Obrázek vztahující se k otázce:</span></td><td><input type="file" class="inside" name="pic03"></td></tr>
              <tr><td><span class="inside">Odpověď:</span></td><td><select id="ans03" name="anslist03">
                <option value="ano">Ano</option>
                <option value="ne">Ne</option>
              </select></td></tr>
            </table>
            <button type="submit">Vytvořit</button>
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