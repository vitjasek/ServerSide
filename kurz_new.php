<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged(); 
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
          <form action="kurz_new.php" method="POST">
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