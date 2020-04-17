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
        $path = $_FILES['pic0'.$i]['tmp_name'];
        $type = $_FILES['pic0'.$i]['type'];
        $data = file_get_contents($path);
        $base64 = 'data:' . $type . ';base64,' . base64_encode($data);
        $inspic = "INSERT INTO obrazek (obrazek) VALUES(?)";
        $stmt = $conn->prepare($inspic);
        $null = NULL;
        $stmt->bind_param('b', $null);
        $stmt->send_long_data(0, $base64);
        $stmt->execute();
        $pic_id = $stmt->insert_id;
        $ans = $_POST['anslist0'.$i]=="ano" ? 1 : 0;
        $otazkains = "INSERT INTO otazka (datum,kurzid,obrazekid,odpoved) VALUES( NOW(), '{$kurz_id}', '{$pic_id}', '$ans')";
        $conn->query($otazkains);
      }
    }
    header("Location: kurz_edit.php");
    exit();
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
          <h1>Tvorba nového kurzu</h1>
          <form action="kurz_new.php" method="POST" enctype="multipart/form-data">
            <label for="name">Název kurzu s otázkou: </label> <input type="text" class="main" name="name" id="name"><br>
            <hr class="first">
            <h2>Otázka č.1</h2>
            <table>
              <tr><td><label class="inside" for="pic01">Obrázek vztahující se k otázce:</label></td><td>
			  <input type="file" class="inside" name="pic01" id="pic01" title="ggg"></td></tr> 
              <tr><td><label class="inside" for="anslist01">Odpověď:</label></td><td><select id="ans01" name="anslist01" title="sfsdf">
                <option  value="ano">Ano</option>
                <option  value="ne" >Ne</option> 
              </select></td></tr>
            </table>
            <hr>
            <h2>Otázka č.2</h2>
            <table>
              <tr><td><label class="inside" for="pic02">Obrázek vztahující se k otázce:</label></td><td><input type="file" class="inside" name="pic02" title="ggg"></td></tr>
              <tr><td><label class="inside" for="anslist02">Odpověď:</label></td><td><select id="ans02" name="anslist02" title="sfsdf">
                <option value="ano" title="ano">Ano</option>
                <option value="ne" title="ne">Ne</option>
              </select></td></tr>
            </table>
            <hr>
            <h2>Otázka č.3</h2>
            <table>
              <tr><td><label class="inside" for="pic03">Obrázek vztahující se k otázce:</label></td><td><input type="file" class="inside" name="pic03" title="ggg"></td></tr>
              <tr><td><label class="inside" for="anslist03">Odpověď:</label></td><td><select id="ans03" name="anslist03" title="sfsdf">
			  <label for="ano">
                <option value="ano" >Ano</option>
                <option value="ne" >Ne</option> </label>
              </select></td></tr>
            </table>
            <button type="submit" title="button">Vytvořit</button>
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
