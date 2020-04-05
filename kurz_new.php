<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged(); 
  
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $sql = "SELECT id FROM uzivatel WHERE id='{$_SESSION['id']}'";
    $result = $conn->query($sql);
    $rowuser = $result->fetch_assoc();
    if(strlen($_POST['name'])>0 && is_uploaded_file($_FILES['pic01']['tmp_name']) && is_uploaded_file($_FILES['pic02']['tmp_name']) && is_uploaded_file($_FILES['pic03']['tmp_name']) && strlen($_POST['anslist01'])>0 && strlen($_POST['anslist02'])>0 && strlen($_POST['anslist03'])>0)
    {
      $inskurz = "INSERT INTO kurz (id,nazev,userid) VALUES('', '{$_POST['name']}', '{$rowuser['id']}')";
      $kurzqry = mysqli_query($conn, $inskurz);
      $selectlast = "SELECT id FROM kurz ORDER BY id DESC LIMIT 1";
      $lastkurzqry = $conn->query($selectlast);
      $lastkurzid = $lastkurzqry->fetch_assoc();
      
      if (is_uploaded_file($_FILES['pic01']['tmp_name']))
      {
        $pic = addslashes(file_get_contents($_FILES['pic01']['tmp_name']));
        $inspic = "INSERT INTO obrazek (id,obrazek) VALUES('', '$pic')";
        $picqry = mysqli_query($conn, $inspic);
        $lastpic = "SELECT id FROM obrazek ORDER BY id DESC LIMIT 1";
        $lastpicqry = $conn->query($lastpic);
        $lastpicid = $lastpicqry->fetch_assoc();
        if($_POST['anslist01']=="ano")
        {
          $ans = true;
        }
        else
        {
          $ans = false;
        }
        $otazkains = "INSERT INTO otazka (id,datum,kurzid,obrazekid,odpoved) VALUES('', NOW(), '{$lastkurzid['id']}', '{$lastpicid['id']}', '$ans')";
        $otazkaqry = mysqli_query($conn, $otazkains);
      }
      
      if (is_uploaded_file($_FILES['pic02']['tmp_name']))
      {
        $pic = addslashes(file_get_contents($_FILES['pic02']['tmp_name']));
        $inspic = "INSERT INTO obrazek (id,obrazek) VALUES('', '$pic')";
        $picqry = mysqli_query($conn, $inspic);
        $lastpic = "SELECT id FROM obrazek ORDER BY id DESC LIMIT 1";
        $lastpicqry = $conn->query($lastpic);
        $lastpicid = $lastpicqry->fetch_assoc();
        if($_POST['anslist02']=="ano")
        {
          $ans = true;
        }
        else
        {
          $ans = false;
        }
        $otazkains = "INSERT INTO otazka (id,datum,kurzid,obrazekid,odpoved) VALUES('', NOW(), '{$lastkurzid['id']}', '{$lastpicid['id']}', '$ans')";
        $otazkaqry = mysqli_query($conn, $otazkains);
      }
       
      if (is_uploaded_file($_FILES['pic03']['tmp_name']))
      {
        $pic = addslashes(file_get_contents($_FILES['pic03']['tmp_name']));
        $inspic = "INSERT INTO obrazek (id,obrazek) VALUES('', '$pic')";
        $picqry = mysqli_query($conn, $inspic);
        $lastpic = "SELECT id FROM obrazek ORDER BY id DESC LIMIT 1";
        $lastpicqry = $conn->query($lastpic);
        $lastpicid = $lastpicqry->fetch_assoc();
        if($_POST['anslist03']=="ano")
        {
          $ans = true;
        }
        else
        {
          $ans = false;
        }
        $otazkains = "INSERT INTO otazka (id,datum,kurzid,obrazekid,odpoved) VALUES('', NOW(), '{$lastkurzid['id']}', '{$lastpicid['id']}', '$ans')";
        $otazkaqry = mysqli_query($conn, $otazkains);
      } 
    }
    else
    {
      echo "<script>alert('Všechny položky formuláře musí být vyplněny!');</script>";
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