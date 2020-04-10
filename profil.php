<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $sql = "SELECT id, login, heslo, email FROM uzivatel WHERE id='{$_SESSION['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(strlen($_POST['username'])>0)
    {
      $all = "SELECT id, login FROM uzivatel WHERE login='{$_POST['username']}'";
      $allqry = $conn->query($all);
      $allrow = $allqry->fetch_assoc();
      if($_POST['username']!=$row['login'] && is_null($allrow['login']))
      {
        $upd = "UPDATE uzivatel SET login='{$_POST['username']}' WHERE id='{$row['id']}'";
        $proc = $conn->query($upd);
      }
    }

     if(strlen($_POST['mail'])>0)
      {
        if($_POST['mail']!=$row['email'])
        {
          $upd = "UPDATE uzivatel SET email='{$_POST['mail']}' WHERE id='{$row['id']}'";
          $proc = $conn->query($upd);
        }
      }

    if(strlen($_POST['pwd'])>0)
    {
      if($_POST['pwd']==$_POST['pwd-repeat'])
      {
        $hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $upd = "UPDATE uzivatel SET heslo='{$hashedPwd}' WHERE id='{$row['id']}'";
        $proc = $conn->query($upd);
      }
    }
    if (is_uploaded_file($_FILES['avatar']['tmp_name']))
    {
      $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
      $query = "INSERT INTO obrazek (id,obrazek) VALUES('', '$image')";
      $qry = mysqli_query($conn, $query);
      $lastidqry = "SELECT id FROM obrazek ORDER BY id DESC LIMIT 1";
      $res = $conn->query($lastidqry);
      $lastid = $res->fetch_assoc();
      $upd = "UPDATE uzivatel SET obrazekid='{$lastid['id']}' WHERE id='{$row['id']}'";
      $proc = $conn->query($upd);
    }
  }

  $sql = "SELECT id, login, obrazekid, email FROM uzivatel WHERE id='{$_SESSION['id']}'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if($row['obrazekid']!=1000000)
  {
    $imgsel = "SELECT id, obrazek FROM obrazek WHERE id='{$row['obrazekid']}'";
    $imgqry = $conn->query($imgsel);
    $img = mysqli_fetch_array($imgqry);
  }
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <?php echo html_hlavička('profil', 'Přehled kurzů'); ?>
  <link rel="stylesheet" type="text/css" href="css/profil.css">
</head>

<body>
  <div class="layer">
    <div id="mobile_menu">
      <a href="index.html">Home</a>
      <a href="zebricky.html" >Žebříčky</a>
      <a href="kurzy.html">Přehled kurzů</a>
      <a href="kurz_edit.html">Správa kurzů</a>
      <a id="logout" href="login.html">Odhlásit</a>
    </div>

    <section>

      <div class="main_div">
        <div class="setup">
        <div class="profil">
          <h2>Nastavení profilu</h2>
          <form action="profil.php" method="POST" enctype="multipart/form-data">
            <div class="password">
              <table id="inputs">
                <tr>
                  <td>
                    Uživatelské jméno:
                  </td>
                  <td>
                    <input type="text" name="username" value="<?php echo $row['login']; ?>">
                  </td>
                </tr>
                  <tr>
                  <td>
                    E-mailová adresa:
                  </td>
                  <td>
                    <input type="email" name="mail" value="<?php echo $row['email']; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Nové heslo:
                  </td>
                  <td>
                    <input type="password" name="pwd" id="pwd">
                  </td>
                </tr>
                <tr>
                  <td>
                    Nové heslo znovu:
                  </td>
                  <td>
                    <input type="password" name="pwd-repeat" id="pwd-repeat">
                  </td>
                </tr>
              </table>
            </div>
            <div class="profile_pic"><?php
              if($row['obrazekid']!=1000000)
              {
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $img['obrazek'] ).'">';
              }
              else
              {
                echo '<img src="img/profileLogo.png">';
              }
            ?></div>
            <div class="filenbutton">
              <input type="file" name="avatar">
              <span id="message">Hesla se neshodují.</span>
              <button type="submit">Ok</button>
            </div>
          </form>
        </div>
      </div>

      <hr>
      <h2>Odznaky</h2>
      <div class="badges">
        <div class="badge"></div>
        <div class="badge"></div>
        <div class="badge"></div>
        <div class="badge"></div>
      </div>

      <div class="badges_table_div">
        <table class="badges_table">
          <thead>
            <tr>
              <th>Název kurzu</th>
              <th>Datum</th>
              <th>Skóre</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>...</td>
              <td>...</td>
              <td>...</td>
            </tr>
          </tbody>
        </table>
      </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>
</html>
