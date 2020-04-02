<?php     
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();   
  
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $sql = "SELECT id, login, heslo FROM uzivatel WHERE id='{$_SESSION['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($_POST['username']!=$row['login'])
    {
      $upd = "UPDATE uzivatel SET login='{$_POST['username']}' WHERE id='{$row['id']}'";
      $proc = $conn->query($upd);
    }
    
    if(strlen($_POST['pwd'])>0)
    { 
      if($_POST['pwd']==$_POST['pwd-repeat'])
      {
        $hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $upd = "UPDATE uzivatel SET heslo='{$hashedPwd}' WHERE id='{$row['id']}'";
        $proc = $conn->query($upd);
      }
      else
      {
        echo "<script>alert('Heslo se neshoduje!');</script>";
      } 
    }
  }
  
  if (!isset($sql))
  {
    $sql = "SELECT id, login FROM uzivatel WHERE id='{$_SESSION['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();  
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
          <div class="password">
            <form action="profil.php" method="POST">
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
                    Nové heslo:
                  </td>
                  <td>
                    <input type="password" name="pwd">
                  </td>
                </tr>
                <tr>
                  <td>
                    Nové heslo znovu:
                  </td>
                  <td>
                    <input type="password" name="pwd-repeat">
                  </td>
                </tr>
              </table>
              <button type="submit">Ok</button>
            </form>
          </div>
          <div class="profile_pic">
            <img src="img/profileLogo.png">
            <input type="file">
            <button>Ok</button>
          </div>
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