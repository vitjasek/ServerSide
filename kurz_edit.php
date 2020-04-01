<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
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

        <button class="new_course">Nový kurz</button>

        <div class="kurz">
          <img src="img/kurz.gif">
          <div class="caption">
            <h2>Název kurzu</h2>
            <p>
              Text kurzu
            </p>
          </div>
          <div class="controls">
            <button>Test</button>
            <button>Edit</button>
            <button>Smazat</button>
          </div>

        </div>

      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</htmllang="cs">